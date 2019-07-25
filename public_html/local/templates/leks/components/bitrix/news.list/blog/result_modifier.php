<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$needResizeImages = count($arResult['ITEMS']) > 0;

if ($needResizeImages) {
    foreach ($arResult['ITEMS'] as $key => &$arItem) {
        $arResImages = CFile::ResizeImageGet(
            $arItem['PREVIEW_PICTURE'],
            array("width" => 350, "height" => 250),
            BX_RESIZE_IMAGE_PROPORTIONAL
        );

        $arItem['RESIZE_IMAGE'] = $arResImages;
    }
    unset($arItem);
}