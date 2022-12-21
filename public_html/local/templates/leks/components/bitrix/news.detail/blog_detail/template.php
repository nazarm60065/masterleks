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
<div class="blog_date"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></div>
<div class="blog_detail">
    <? if (!empty($arResult['DETAIL_PICTURE'])): ?>
        <img src="<?= $arResult['RESIZE_IMAGE']['src'] ?>" width="<?= $arResult['RESIZE_IMAGE']['width'] ?>"
             height="<?= $arResult['RESIZE_IMAGE']['height'] ?>">
    <? endif; ?>
    <?= $arResult["DETAIL_TEXT"]; ?>
</div>