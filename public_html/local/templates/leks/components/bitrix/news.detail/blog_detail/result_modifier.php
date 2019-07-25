<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$needResizeImages = count($arResult) > 0;

if ($needResizeImages) {
        $arResImages = CFile::ResizeImageGet(
            $arResult['DETAIL_PICTURE'],
            array("width" => 300, "height" => 200),
            BX_RESIZE_IMAGE_PROPORTIONAL
        );
        $arResult['RESIZE_IMAGE'] = $arResImages;
}