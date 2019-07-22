<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$needResizePicture = $arResult['SECTIONS'] > 0;

if ($needResizePicture) {
    foreach ($arResult['SECTIONS'] as $key => &$arSection) {
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
