<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);?>

<div class="container">
    <div class="category">
        <? foreach ($arResult['SECTIONS'] as $key => $arSection) :?>
            <div class="block-50">
                <div class="category-block">
                    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="link-absolute"></a>
                    <div class="category__title"><?=$arSection['NAME']?></div>
                    <div class="category__block-price"><span class="category__price">от 123456 руб.</span></div>
                    <div class="category__block-img"><img src="<?=$arSection['RESIZE_DETAIL_IMAGE']['src']?>" alt="<?=$arSection['NAME']?>" class="category_img"></div>
                    <div class="category__block-link">
                        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="category__link">Подробнее</a>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>
