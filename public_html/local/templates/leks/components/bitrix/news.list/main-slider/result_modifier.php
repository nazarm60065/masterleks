<?

use ZLabs\Components\MainSlider\MainSliderFactory;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$items = collect($arResult['ITEMS']);

$arResult['context'] = $items->map(function ($arItem){
    return (new MainSliderFactory($arItem))->create();
});
