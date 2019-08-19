<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$needResizePicture = $needObtainPrices = $arResult['SECTIONS'] > 0;


if ($needResizePicture) {
    foreach ($arResult['SECTIONS'] as $key => &$arSection) {
        //echo "<pre>"; print_r($arResult['SECTIONS']); echo "</pre>";
        $arResImage = CFile::ResizeImageGet(
                $arSection['PICTURE'],
                array('width' => 240, 'height' => 255),
                BX_RESIZE_IMAGE_EXACT,
                true
        );

        $arSection['RESIZE_IMAGE'] = $arResImage;
    }
    unset($arSection);
}

if ($needObtainPrices) {
    foreach ($arResult['SECTIONS'] as $key => &$arSection) {
        $detailPicture = CFile::GetFileArray($arSection['DETAIL_PICTURE']);
        $arResImage = CFile::ResizeImageGet(
                $detailPicture,
                array('width' => 535, 'height' => 320),
                BX_RESIZE_IMAGE_EXACT,
                true
        );

        $arSection['RESIZE_DETAIL_IMAGE'] = $arResImage;
    }
    unset($arSection);
}
