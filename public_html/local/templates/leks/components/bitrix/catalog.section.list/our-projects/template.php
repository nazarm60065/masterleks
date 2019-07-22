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
$this->setFrameMode(true); ?>

<div class="section__sub-title section__sub-title_right">
    <?= $arParams['HEADLINE'] ?>
</div>


<div class="slider__block-slider">
    <div class="container">
        <div class="slider-slick">
            <? foreach ($arResult['SECTIONS'] as $key => $arSection) : ?>
                <div>
                    <div class="slider-slick__container"
                         style="background-image: url('<?= $arSection['RESIZE_IMAGE']['src'] ?>')">
                        <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="link-absolute"></a>
                        <div class="slick-slider__blackout">
                            <div class="slider-slick__block-text">
                                <span class="slider-slick__text"><?= $arSection['NAME'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
