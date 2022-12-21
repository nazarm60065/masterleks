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

<div class="flex-container">
    <? foreach ($arResult['SECTIONS'] as $key => $arSection) : ?>
        <div class="block-25">
            <div class="block-category" style="background-image: url('<?= $arSection['RESIZE_IMAGE']['src'] ?>')">
                <div class="blackout"></div>
                <a href="<?= $arSection['UF_CUSTOM_URL'] ?: $arSection['SECTION_PAGE_URL'] ?>"
                   class="link-absolute"></a>
                <div class="category__block-title category__title_align-center">
                    <span class="category__title category__title_small-text"><?= $arSection['NAME'] ?></span>
                </div>
            </div>
        </div>
    <? endforeach; ?>
</div>
