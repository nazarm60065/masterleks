<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use ZLabs\Components\Helpers\FilesCollectionFromResult;
use ZLabs\ImageResizer\Resizer\Resizer;
use ZLabs\ImageResizer\Config\Config;
use ZLabs\BxMustache\Image;

$needResizeImages = count($arResult) > 0;

if ($needResizeImages) {

    $config = new Config(860, 800, BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
    $resizer = new Resizer($config);

    $imagesIds = collect($arResult['PROPERTIES']['IMAGES']['VALUE']);
    $arImages = (new FilesCollectionFromResult($imagesIds))->obtain();
    if(count($arImages) > 0) {
        $imagesIds->each(function ($id, $key) use ($resizer, $arImages, &$arResult) {

            $image = (new Image())->createFromResizeImage($resizer->resize($arImages[$id]));
            $index = $key + 1;
            $imageHtml = "";
            $imageHtml .= "<a href='";
            $imageHtml .= $image->src . "' data-fancybox='gallery' class='blog_detail__image-container'>";
            $imageHtml .= "<img class='blog-detail__image'
                             src=" . $image->src . " alt='img'/>
                        </a>";

            $arResult["DETAIL_TEXT"] = str_replace(
                "#image_{$index}#",
                $imageHtml,
                $arResult["DETAIL_TEXT"]
            );
        });
    }

    $arResImages = CFile::ResizeImageGet(
        $arResult['DETAIL_PICTURE'],
        array("width" => 300, "height" => 200),
        BX_RESIZE_IMAGE_PROPORTIONAL
    );
    $arResult['RESIZE_IMAGE'] = $arResImages;
}