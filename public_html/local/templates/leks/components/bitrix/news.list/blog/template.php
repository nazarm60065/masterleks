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
$this->setFrameMode(true);
?>

<div class="blog_list">

    <?foreach($arResult["ITEMS"] as $arItem):?>

        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="blog_item">
            <?if (!empty($arItem['PREVIEW_PICTURE'])):?>
                <span class="image" style="background-image: url('<?=$arItem["RESIZE_IMAGE"]['src']?>')"></span>
            <?endif;?>
            <span class="blog_title"><?=$arItem['NAME']?></span>
            <span class="blog_date"><?=$arItem["ACTIVE_FROM"]?></span>
        </a>

    <?endforeach;?>
    <div style="clear:both"></div>
</div>
