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

<ul class="footer__block-nav text-uppercase">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <li class="footer__nav-element">
            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
               class="footer__nav-link link-animation"><?= $arItem['NAME'] ?></a>
        </li>
    <? endforeach; ?>
</ul>

