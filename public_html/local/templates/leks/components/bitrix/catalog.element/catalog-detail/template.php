<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->SetAdditionalCSS('/local/frontend/local/kitchen/kitchen.css');
$APPLICATION->AddHeadScript('/local/frontend/local/kitchen/kitchen.js');

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true); ?>

<div class="flex-container">
    <div class="block-65">
        <div class="block-category">
            <a class="block-category__link" data-fancybox="gallery" href="<?=$arResult['RESIZE_DETAIL_PICTURE']['src']?>"><img
                        class="block-category__img" src="<?=$arResult['RESIZE_DETAIL_PICTURE']['src']?>"></a>
        </div>
    </div>

    <div class="block-30 flex-vertical">
        <div class="flex-container flex-container_vertical">
            <? foreach ($arResult['RESIZE_GALLERY_IMAGES'] as $key => $arImages) :?>
                <div class="block-100">
                    <div class="block-category block-category_min">
                        <a class="block-category__link" data-fancybox="gallery" href="<?=$arImages['src']?>"><img
                                    class="block-category__img" src="<?=$arImages['src']?>"></a>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>
<div class="flex-container">
    <div class="block-65">
        <div class="flex-container">
            <div class="detail-element detail-element__title">
                <?= $arResult['NAME'] ?>
            </div>
            <div class="detail-element detail-element__price">
                <?= $arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE'] ?> руб.
            </div>


            <div class="detail-element detail-element__description">
                <?= $arResult['DETAIL_TEXT'] ?>
            </div>
        </div>
    </div>
    <div class="block-30 text-right">
        <a href="#" class="button">Заказать</a>
    </div>
</div>