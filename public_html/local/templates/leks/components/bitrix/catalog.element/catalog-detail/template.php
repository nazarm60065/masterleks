<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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

$this->setFrameMode(true);

global $goodName;
$goodName = $arResult['NAME'];

$countImages = count($arResult['RESIZE_GALLERY_IMAGES']);
?>

<div class="flex-container">
    <div class="block-65">
        <div class="block-category">
            <a class="block-category__link" data-fancybox="gallery"
               href="<?= $arResult['RESIZE_DETAIL_PICTURE']['src'] ?>"><img
                        class="block-category__img" src="<?= $arResult['RESIZE_DETAIL_PICTURE']['src'] ?>"></a>
        </div>
    </div>

    <div class="block-30 flex-vertical">
        <div class="flex-container flex-container_vertical">
            <? foreach ($arResult['RESIZE_GALLERY_IMAGES'] as $key => $arImages) : ?>
                <div class="block-100">
                    <? if ($key == 1 && $countImages > 2): ?>
                        <div class="block-category block-category_min">
                            <a class="block-category__link more-photos" data-fancybox="gallery"
                               href="<?= $arImages['src'] ?>">
                                <span class="more-photos_text">Еще <?= $countImages - 2 ?></span>
                            </a>
                            <img class="block-category__img" src="<?= $arImages['src'] ?>">
                        </div>
                    <? else: ?>
                        <div class="block-category block-category_min">
                            <a class="block-category__link" data-fancybox="gallery" href="<?= $arImages['src'] ?>">
                                <img class="block-category__img" src="<?= $arImages['src'] ?>">
                            </a>
                        </div>
                    <? endif; ?>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
<div class="flex-container margin-bottom">
    <div class="block-65">
        <div class="flex-container">
            <h1 class="detail-element detail-element__title">
                <?= $arResult['NAME'] ?>
            </h1>
            <? if (!empty($arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE'])): ?>
                <div class="detail-element detail-element__price">
                    <?= $arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE'] ?> руб.
                </div>
            <? endif; ?>

            <? if (!empty($arResult['DETAIL_TEXT'])): ?>
                <div class="detail-element detail-element__description">
                    <?= $arResult['DETAIL_TEXT'] ?>
                </div>
            <? endif; ?>

        </div>
    </div>
    <div class="block-30 text-right">
        <a href="#catalog_modal_form" class="button feedback-form-link" data-yandex-goals="[&quot;order_start&quot;]">Заказать</a>
    </div>
</div>