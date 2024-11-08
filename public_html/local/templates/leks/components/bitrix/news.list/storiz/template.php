<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>
<? if ($arResult['ITEMS']) : ?>
    <div class="storiz">
        <div class="full full_section">
            <div class="container_section storiz-container">
                <? if ($arParams['TITLE']): ?>
                    <div class="storiz__title"><?= $arParams['TITLE'] ?></div>
                <? endif; ?>
                <div class="storiz-slider swiper">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult["ITEMS"] as $itemIndex => $arItem): ?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="storiz-slide swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                <? if ($arItem["PREVIEW_PICTURE"]): ?>
                                    <?
                                    $preview = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], ['width' => 200, 'height' => 200], BX_RESIZE_IMAGE_EXACT);
                                    $src = $preview ? $preview['src'] : $arItem['PREVIEW_PICTURE']['SRC'];
                                    ?>
                                    <div class="storiz-slide-preview-wrapper">
                                        <div class="storiz-slide-preview">
                                            <img class="storiz-slide-preview__img"
                                                 src="<?= $src ?>"
                                                 alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?: $arItem['NAME'] ?>"
                                                 loading="lazy"/>
                                        </div>
                                    </div>
                                <? endif ?>

                                <? if ($arItem['DISPLAY_PROPERTIES']['GALLERY']['VALUE'] || !empty($arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE'])) : ?>
                                    <a href="#storiz-modal" class="link-as-card"
                                       data-fancybox
                                       data-index="<?= $itemIndex ?>"></a>
                                <? endif; ?>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>

                <div class="storiz-modal" id="storiz-modal">
                    <div class="storiz-modal-container">
                        <div class="storiz-modal-wrapper">
                            <div class="storiz-modal-inner">
                                <div class="storiz-modal-slider swiper">
                                    <div class="swiper-wrapper">
                                        <? foreach ($arResult["ITEMS"] as $itemIndex => $arItem): ?>
                                            <?
                                            $gallery = [];

                                            if ($arItem['DISPLAY_PROPERTIES']['GALLERY']['VALUE']) {
                                                if (count($arItem['DISPLAY_PROPERTIES']['GALLERY']['VALUE']) > 1) {
                                                    $images = $arItem['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'];
                                                } else {
                                                    $images = [$arItem['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE']];
                                                }

                                                foreach ($images as $image) {
                                                    $resizedImage = CFile::ResizeImageGet($image, ['width' => 820, 'height' => 820], BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
                                                    $gallery[] = [
                                                        'src' => $resizedImage ? $resizedImage['src'] : $image['SRC'],
                                                        'alt' => $arItem['NAME'],
                                                    ];
                                                }
                                            }

                                            $video = !empty($arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']) ? $arItem['DISPLAY_PROPERTIES']['VIDEO']['FILE_VALUE']['SRC'] : null;
                                            ?>
                                            <? if ($gallery || $video) : ?>
                                                <div class="storiz-modal-slide swiper-slide">
                                                    <? if ($gallery) : ?>
                                                        <div class="storiz-modal-gallery swiper">
                                                            <button class="storiz-modal-gallery__arrow storiz-modal-gallery__arrow_prev"
                                                                    type="button">
                                                                <svg width="36" height="36" viewBox="0 0 36 36"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M20.743 28.5C20.305 28.5 19.87 28.3095 19.573 27.9405L12.331 18.9405C11.884 18.384 11.89 17.589 12.3475 17.04L19.8475 8.03998C20.377 7.40398 21.3235 7.31848 21.961 7.84798C22.597 8.37748 22.6825 9.32398 22.1515 9.95998L15.439 18.0165L21.9115 26.0595C22.4305 26.7045 22.3285 27.6495 21.682 28.1685C21.406 28.392 21.073 28.5 20.743 28.5Z"
                                                                          fill="currentColor"></path>
                                                                </svg>
                                                            </button>
                                                            <div class="swiper-wrapper">
                                                                <? foreach ($gallery as $galleryIndex => $galleryImage): ?>
                                                                    <div class="storiz-modal-gallery-slide swiper-slide">
                                                                        <img class="storiz-modal-gallery-slide__img"
                                                                             src="<?= $galleryImage['src'] ?>"
                                                                             alt="<?= $galleryImage['alt'] ?>"
                                                                             loading="lazy">
                                                                    </div>
                                                                <? endforeach; ?>
                                                            </div>
                                                            <div class="slider__progress storiz-modal-gallery-progress"></div>
                                                            <div class="storiz-modal-controls">
                                                                <button class="storiz-modal__control"
                                                                        data-fancybox-close
                                                                        type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24"><path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m18 18-6-6m0 0L6 6m6 6 6-6m-6 6-6 6"/></svg>
                                                                </button>
                                                            </div>
                                                            <button class="storiz-modal-gallery__arrow storiz-modal-gallery__arrow_next"
                                                                    type="button">
                                                                <svg width="36" height="36" viewBox="0 0 36 36"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M14.9992 28.4999C14.6602 28.4999 14.3197 28.3859 14.0392 28.1519C13.4032 27.6224 13.3177 26.6759 13.8472 26.0399L20.5612 17.9834L14.0887 9.94043C13.5697 9.29543 13.6717 8.35043 14.3167 7.83143C14.9632 7.31243 15.9067 7.41443 16.4272 8.05943L23.6692 17.0594C24.1162 17.6159 24.1102 18.4109 23.6527 18.9599L16.1527 27.9599C15.8557 28.3154 15.4297 28.4999 14.9992 28.4999Z"
                                                                          fill="currentColor"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    <? elseif ($video): ?>
                                                        <div class="storiz-modal-video-wrapper">
                                                            <video src="<?= $video ?>" playsinline
                                                                   class="storiz-modal__video"></video>
                                                            <div class="storiz-modal-video-progress">
                                                                <div class="storiz-modal-video-progress__bar"></div>
                                                            </div>
                                                            <div class="storiz-modal-controls">
                                                                <? if (false) : ?>
                                                                    <button class="storiz-modal__control storiz-modal-video__pause"
                                                                            type="button">
                                                                <span class="storiz-modal__control-icon storiz-modal__control-icon_pause">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                         height="16" viewBox="0 0 32 32"><path
                                                                                d="M5.92 24.096q0 .832.576 1.408t1.44.608h4.032q.832 0 1.44-.608t.576-1.408V7.936q0-.832-.576-1.44t-1.44-.576H7.936q-.832 0-1.44.576t-.576 1.44v16.16zm12.096 0q0 .832.608 1.408t1.408.608h4.032q.832 0 1.44-.608t.576-1.408V7.936q0-.832-.576-1.44t-1.44-.576h-4.032q-.832 0-1.408.576t-.608 1.44v16.16z"/></svg>
                                                                </span>
                                                                        <span class="storiz-modal__control-icon storiz-modal__control-icon_play">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                         height="16" fill="none" viewBox="0 0 24 24"><path
                                                                                fill="#1F1F1F"
                                                                                d="M18.761 9.63c1.26.776 1.89 1.165 2.101 1.673.184.444.184.95 0 1.394-.21.508-.84.897-2.1 1.673l-8.976 5.534c-1.243.766-1.865 1.15-2.375 1.09a1.563 1.563 0 0 1-1.11-.695C6 19.85 6 19.079 6 17.533V6.467c0-1.545 0-2.318.3-2.766.263-.39.667-.643 1.111-.695.51-.06 1.132.324 2.375 1.09L18.76 9.63Z"/></svg>
                                                                </span>
                                                                    </button>
                                                                <? endif; ?>
                                                                <button class="storiz-modal__control storiz-modal-video__muted"
                                                                        type="button">
                                                            <span class="storiz-modal__control-icon storiz-modal__control-icon_muted">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" viewBox="0 -3 30 30"><path fill="#000"
                                                                                                            fill-rule="evenodd"
                                                                                                            d="m25.444 12 4.173-4.173c.45-.45.492-1.139.094-1.538-.399-.398-1.088-.356-1.538.094L24 10.556l-4.173-4.173c-.45-.45-1.139-.492-1.538-.094-.398.399-.356 1.088.094 1.538L22.556 12l-4.173 4.173c-.45.45-.492 1.139-.094 1.538.399.398 1.088.356 1.538-.094L24 13.444l4.173 4.173c.45.45 1.139.492 1.538.094.398-.399.356-1.088-.094-1.538L25.444 12ZM14 0 7 4.667v14.666L14 24a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM0 8v8a2 2 0 0 0 2 2h3V6H2a2 2 0 0 0-2 2Z"/></svg>
                                                            </span>
                                                                    <span class="storiz-modal__control-icon storiz-modal__control-icon_full">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" viewBox="0 -1.5 31 31"><path
                                                                            fill="#000" fill-rule="evenodd"
                                                                            d="M19 .015v2.053C24.872 3.199 29 7.988 29 14c0 5.978-4 10.609-10 11.932v2.054c6.776-.992 12-6.843 12-13.986C31 6.857 25.776 1.006 19 .015ZM14 2 7 6.667v14.666L14 26a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2Zm11 12c0-3.523-2.612-6.41-6-6.899v2a5 5 0 0 1 0 9.798v2c3.388-.489 6-3.376 6-6.899ZM0 10v8a2 2 0 0 0 2 2h3V8H2a2 2 0 0 0-2 2Z"/></svg>
                                                            </span>
                                                                </button>
                                                                <button class="storiz-modal__control"
                                                                        data-fancybox-close
                                                                        type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24"><path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m18 18-6-6m0 0L6 6m6 6 6-6m-6 6-6 6"/></svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="storiz-modal-slider__button storiz-modal-slider__button_prev" type="button"></div>
                    <div class="storiz-modal-slider__button storiz-modal-slider__button_next" type="button"></div>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>