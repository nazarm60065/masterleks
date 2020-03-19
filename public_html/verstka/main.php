<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/local/assets/mustache/')
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="/local/icons/icomoon/style.css">
    <link rel="stylesheet" href="/local/frontend/local/style/style.css">
    <link rel="stylesheet" href="/local/frontend/local/main/main.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900i|Roboto:400,500,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/local/js/jquery.slick/slick.css"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="Leks"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <script type="text/javascript" src="/local/js/jquery2/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="/local/js/jquery.slick/slick.min.js"></script>
    <script type="text/javascript" src="/local/frontend/local/main/main.js"></script>
    <script type="text/javascript" src="/local/frontend/local/style/style.js"></script>
    <script type="text/javascript" src="/local/assets/local/main/main.js" defer></script>
</head>
<body>
<header>
    <div class="full_section">
        <div class="container container_flex header__container">
            <div class="mobil-menu__block-button" onclick="toggle_menu(true)">
                <span class="mobil-menu__button"></span>
            </div>
            <div class="logo">
                <a href="#" class="logo__link"><img src="/local/images/logo.png" alt="логотип" class="logo__img"></a>
            </div>
            <menu class="top-menu">
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Каталог</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Наши проекты</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Отследить заказ</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Блог</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">О нас</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Контакты</a></li>
            </menu>
            <div class="search">
                <a href="#" class="search__link"><span class="input-i icon-search"></span></a>
                <div class="input_search_area">
                    <input type="text">
                </div>
            </div>
        </div>
    </div>
</header>
<main class="main ">
<!--top-block-->
    <div class="main-blackout "></div>
    <section class="main-slider-section">
            <?php
                echo $mustache->render(
                    'main-slider',
                    include $_SERVER['DOCUMENT_ROOT'] . '/verstka/context/main/main-slider.php'
                );
            ?>
    </section>
    <section class="slider-1 slider section">
        <div class="container">
        <div class="section__sub-title section__sub-title_mobile-center">
            Каталог
        </div>
        <div class="slider__block-slider"><div class="container">
            <div class="slider-slick">


                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_кухни.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Кухни</span>
                            </div>
                        </div>

                    </div>
                </div>


                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_шкафы.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Шкафы</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_прихожие.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Прихожие</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_детские.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Детские</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_кухни.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Кухни</span>
                            </div>
                        </div>

                    </div>
                </div>


                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_шкафы.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Шкафы</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_прихожие.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Прихожие</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_детские.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Детские</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_шкафы.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Шкафы</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_прихожие.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Прихожие</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="slider-slick__container" style="background-image: url('/local/images/main/каталог_детские.jpg')">
                        <a href="#" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text">Детские</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div></div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="category">
                <div class="block-50">
                    <div class="category-block">
                        <a href="#" class="link-absolute"></a>
                        <div class="category__title">Кухни</div>
                        <div class="category__block-price"><span class="category__price">от 123456 руб.</span></div>
                        <div class="category__block-img"><img src="/local/images/main/кухня.jpg" alt="" class="category_img"></div>
                        <div class="category__block-link"><a href="#" class="category__link">Подробнее</a></div>
                    </div>
                </div>
                <div class="block-50">
                    <div class="category-block">
                        <a href="#" class="link-absolute"></a>
                        <div class="category__title">Шкафы</div>
                        <div class="category__block-price"><span class="category__price">от 123456 руб.</span></div>
                        <div class="category__block-img"><img src="/local/images/main/шкафы.jpg" alt="" class="category_img"></div>
                        <div class="category__block-link"><a href="#" class="category__link">Подробнее</a></div>
                    </div>
                </div>
                
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="section__sub-title section__sub-title_right">
                Наши проекты
            </div>


            <div class="slider__block-slider">
                <div class="container">
                    <div class="slider-slick">


                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_кухни.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Кухни</span>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_шкафы.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Шкафы</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_прихожие.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Прихожие</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_детские.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Детские</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_кухни.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Кухни</span>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_шкафы.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Шкафы</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_прихожие.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Прихожие</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_детские.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Детские</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_шкафы.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Шкафы</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_прихожие.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Прихожие</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div class="slider-slick__container"
                                 style="background-image: url('/local/images/main/каталог_детские.jpg')">
                                <a href="#" class="link-absolute"></a>
                                <div class="slick-slider__blackout">
                                    <div class="slider-slick__block-text">
                                        <span class="slider-slick__text">Детские</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="height: 600px">
        <div class="container">
            <div class="section__sub-title">
                Отзывы
            </div>

        </div>
    </section>

<!--top-block-->
</main>
<footer>
    <div class="footer-block">
        <div class="container">
            <div class="flex-container">
                <div class="col-desk-25 d-tablet-mobile-none">
                    <div class="footer_title"><a href="#" class="footer__title-link">Каталог</a></div>
                    <div class="footer__nav">
                        <ul class="footer__block-nav text-uppercase">
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-desk-25 d-tablet-mobile-none">
                    <div class="footer_title"><a href="#" class="footer__title-link">Наши проекты</a></div>
                    <div class="footer__nav">
                        <ul class="footer__block-nav text-uppercase">
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-desk-25 d-tablet-mobile-none">
                    <div class="footer_title"><a href="#" class="footer__title-link">Блог</a></div>
                    <div class="footer__nav">
                        <ul class="footer__block-nav text-uppercase">
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                            <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-desk-25 col-tab-100">
                    <div class="footer_title d-tablet-mobile-none"><a href="#" class="footer__title-link">Контакты</a></div>
                    <div class="footer__nav">
                        <ul class="footer__block-nav">
                            <li class="footer__nav-element footer__nav-element_text-big">Адресс</li>
                            <li class="footer__nav-element footer__nav-element_text-big"><a href="tel: +00000000" class="footer__nav-link ">+999 999 99 99</a></li>
                            <li class="footer__nav-element footer__nav-element_text-big"><a href="mailto:email@mail.ru" class="footer__nav-link ">email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="mobile_menu" id="mobile_menu" onclick="toggle_menu(false)">
    <div class="menu_sidebar">
        <ul class="menu-list">
            <li class="menu-list-item"><a href="#" class="menu-list-item__link">Услуги</a></li>
            <li class="menu-list-item"><a href="#" class="menu-list-item__link">Каталог</a></li>
            <li class="menu-list-item"><a href="#" class="menu-list-item__link">Отследить заказ</a></li>
            <li class="menu-list-item"><a href="#" class="menu-list-item__link">Блог</a></li>
            <li class="menu-list-item"><a href="#" class="menu-list-item__link">Контакты</a></li>
        </ul>
    </div>
</div>
</body>
</html>