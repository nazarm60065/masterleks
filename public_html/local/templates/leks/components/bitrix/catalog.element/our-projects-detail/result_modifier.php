<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$needResizeDetailPicture = !empty($arResult['DETAIL_PICTURE']);
$needResizeGalleryPictures = !empty($arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE']);

if ($needResizeDetailPicture) {
    $arResImages = CFile::ResizeImageGet(
        $arResult['DETAIL_PICTURE'],
        array("width" => 910, "height" => 600),
        BX_RESIZE_IMAGE_EXACT,
        true
    );

    $arResult['RESIZE_DETAIL_PICTURE'] = $arResImages;
}

if ($needResizeGalleryPictures) {
    if (count($arResult['PROPERTIES']['GALLERY']['VALUE']) > 1) {
        foreach ($arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'] as $key => &$arImage) {
            $arResImages = CFile::ResizeImageGet(
                $arImage,
                array("width" => 900, "height" => 900),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true
            );

            $arResult['RESIZE_GALLERY_IMAGES'][] = $arResImages;
        }
    }
    else{
        $arResult['RESIZE_GALLERY_IMAGES'][]=  $arResImages = CFile::ResizeImageGet(
            $arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'],
            array("width" => 900, "height" => 900),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true
        );
    }

    unset($arImage);
}