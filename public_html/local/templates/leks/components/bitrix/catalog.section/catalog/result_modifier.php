<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

foreach ($arResult['ITEMS'] as $key => $item) {
    if ($item['PREVIEW_PICTURE']) {
        $picture = CFile::ResizeImageGet(
            $item['~PREVIEW_PICTURE'],
            array("width" => 350, "height" => 350),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($picture) {
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC'] = $picture['src'];
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['WIDTH'] = $picture['width'];
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['HEIGHT'] = $picture['height'];
        }
    }
    if ($item['PREVIEW_PICTURE_SECOND'] && $item['DETAIL_PICTURE'] ) {
        $pictureDetail = CFile::ResizeImageGet(
            $item['~DETAIL_PICTURE'],
            array("width" => 350, "height" => 350),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($pictureDetail) {
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE_SECOND']['SRC'] = $pictureDetail ['src'];
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE_SECOND']['WIDTH'] = $pictureDetail ['width'];
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE_SECOND']['HEIGHT'] = $pictureDetail ['height'];
        }
    }
}