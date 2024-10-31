$.fancybox.defaults.hash = false

document.addEventListener('DOMContentLoaded', () => {
  const mainSlider = document.querySelector('.storiz-slider'),
    $slideLinks = $('.storiz-slide>.link-as-card'),
    STORIZ_DURATION = 3000,
    SLIDER_SPEED = 300

  let modalSliderObj, slideTimer, activeSliderObj, activeVideoObj

  document.addEventListener('click', docClickHandler)

  if (window.Swiper && mainSlider) {
    new window.Swiper(mainSlider, {
      spaceBetween: 16,
      slidesPerView: "auto",
      centerInsufficientSlides: true,
      slideToClickedSlide: true,
    })
  }

  if ($slideLinks.length && $.fn.fancybox) {
    $slideLinks.fancybox({
      loop: false,
      margin: 0,
      infobar: false,
      buttons: false,
      slideShow: false,
      fullScreen: false,
      thumbs: false,
      closeBtn: false,
      smallBtn: false,
      touch: false,

      afterLoad: (instance, slide) => {
        const modalSlider = slide.$content[0].querySelector('.storiz-modal-slider'),
          index = +event.target.dataset['index']

        if (!modalSliderObj && modalSlider) {
          initModalSlider(modalSlider, !isNaN(index) ? index : 0)
        }
      },
      afterShow: (instance) => {
        // fix video autoplay
        setTimeout(() => {
          instance.current.$slide.find( '.storiz-modal-slide:not(.swiper-slide-active) video,audio' ).first().trigger( 'pause' );
        })
      },
      afterClose: (instance) => {
        if (modalSliderObj) {
          clearTimeout(slideTimer)
          animationEnd()
          modalSliderObj.destroy(true)
          modalSliderObj = null
        }
      }
    })
  }

  function initModalSlider(modalSlider, initialIndex = 0) {
    const container = modalSlider.closest('.storiz-modal'),
      prevEl = container.querySelector('.storiz-modal-slider__button_prev'),
      nextEl = container.querySelector('.storiz-modal-slider__button_next')

    modalSliderObj = new Swiper(modalSlider, {
      slidesPerView: 1,
      spaceBetween: 120,
      centerInsufficientSlides: true,
      slideToClickedSlide: true,
      initialSlide: initialIndex,
      effect: 'coverflow',
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      navigation: {
        prevEl,
        nextEl
      },
      on: {
        init: (swiper) => {
          //console.log('init')
          if (swiper.isBeginning) animationStart(swiper.slides[swiper.activeIndex])
        },
        transitionStart: (swiper) => {
          //console.log('transitionStart')
          clearTimeout(slideTimer)
        },
        transitionEnd: (swiper) => {
          //console.log('transitionEnd')
          animationEnd()
          animationStart(swiper.slides[swiper.activeIndex])
        },
      }
    })
  }

  function animationStart(slide) {
    //console.log('animationStart')

    const gallery = slide.querySelector('.storiz-modal-gallery'),
      video = slide.querySelector('.storiz-modal__video')

    let duration = 0

    if (gallery) {
      initGallerySlider(gallery)
      setGalleryTimeout()
    } else if (video) {
      const container = video.closest('.storiz-modal-video-wrapper'),
        progress = container.querySelector('.storiz-modal-video-progress'),
        progressBar = progress.querySelector('.storiz-modal-video-progress__bar')

      activeVideoObj = video
      duration = video.duration
      video.currentTime = 0
      video.play()

      if (progress && progressBar) {
        progress.classList.add('storiz-modal-video-progress_active')
        progressBar.style.animationDuration = `${duration}s`
      }

      slideTimer = setTimeout(() => {
        if (modalSliderObj.isEnd) {
          modalClose()
        } else {
          modalSliderObj.slideNext()
        }
      }, duration * 1000)
    }
  }

  function initGallerySlider(gallery) {
    const pagination = gallery.querySelector('.storiz-modal-gallery-progress'),
      prevEl = gallery.querySelector('.storiz-modal-gallery__arrow_prev'),
      nextEl = gallery.querySelector('.storiz-modal-gallery__arrow_next')

    activeSliderObj = new Swiper(gallery, {
      slidesPerView: 1,
      spaceBetween: 16,
      speed: SLIDER_SPEED,
      nested: true,
      allowTouchMove: false,
      autoplay: {
        delay: STORIZ_DURATION,
        stopOnLastSlide: true,
      },
      pagination: {
        el: pagination,
        type: 'bullets',
        clickable: true,
        lockClass: 'storiz-modal-gallery-progress_lock',
      },
      navigation: {
        prevEl,
        nextEl,
        disabledClass: 'storiz-modal-gallery__arrow_disabled',
        lockClass: 'storiz-modal-gallery__arrow_lock',
      },
      on: {
        transitionStart: (swiper) => {
          //console.log('galleryTransitionStart')
          clearTimeout(slideTimer)
          swiper.pagination.bullets.forEach((bullet, index) => {
            if (index < swiper.activeIndex) {
              bullet.classList.add('swiper-pagination-bullet-prev')
              bullet.classList.remove('swiper-pagination-bullet-next')
            } else if (index > swiper.activeIndex) {
              bullet.classList.remove('swiper-pagination-bullet-prev')
              bullet.classList.add('swiper-pagination-bullet-next')
            }
          })
        },
        transitionEnd: (swiper) => {
          //console.log('galleryTransitionEnd')
          setGalleryTimeout()
        },
      }
    })
  }

  function setGalleryTimeout() {
    slideTimer = setTimeout(() => {
      if (activeSliderObj.isEnd) {
        animationEnd()

        if (modalSliderObj.isEnd) {
          modalClose()
        } else {
          modalSliderObj.slideNext()
        }
      } else {
        activeSliderObj.slideNext()
        setGalleryTimeout()
      }
    }, STORIZ_DURATION)
  }

  function animationEnd() {
    //console.log('animationEnd')
    if (activeSliderObj) {
      activeSliderObj.destroy(true)
      activeSliderObj = null
    }

    if (activeVideoObj) {
      const container = activeVideoObj.closest('.storiz-modal-video-wrapper'),
        progress = container.querySelector('.storiz-modal-video-progress'),
        progressBar = progress.querySelector('.storiz-modal-video-progress__bar')

      activeVideoObj.currentTime = 0
      activeVideoObj.pause()
      activeVideoObj = null

      if (progress && progressBar) {
        progress.classList.remove('storiz-modal-video-progress_active')
        progressBar.style.animationDuration = ``
      }
    }
  }

  function modalClose() {
    $.fancybox.close()
  }

  // not finished
  function docClickHandler(event) {
    if (activeVideoObj) {
      const pauseBtn = event.target.closest('.storiz-modal-video__pause'),
        muteBnt = event.target.closest('.storiz-modal-video__muted')

      if (pauseBtn) {
        if (pauseBtn.classList.contains('storiz-modal-video__pause_active')) {
          pauseBtn.classList.remove('storiz-modal-video__pause_active')
        } else {
          pauseBtn.classList.add('storiz-modal-video__pause_active')
          activeVideoObj.pause()
        }
      }

      if (muteBnt) {
        if (activeVideoObj.muted) {
          muteBnt.classList.remove('storiz-modal-video__muted_active')
          activeVideoObj.muted = false
        } else {
          muteBnt.classList.add('storiz-modal-video__muted_active')
          activeVideoObj.muted = true
        }
      }
    }
  }

  function videoPause() {

  }

  function videoPlay() {

  }
})