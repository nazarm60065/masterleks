<?php

use ZLabs\BxMustache\MainSlider\Item;
use ZLabs\BxMustache\Link;
use ZLabs\BxMustache\Image;

$items = collect([
    [
        'title' => "Мебель, <br>как ты захочешь",
        "image" => "/local/images/main-slider/1.jpg",
        "linkHref" => "#",
        "linkText" => "Подробнее"
    ],
    [
        'title' => "Коллекция <br>кухонь SKY",
        "image" => "/local/images/main-slider/2.jpg",
        "linkHref" => "#",
        "linkText" => "Подробнее"
    ],
    [
        'title' => "Коллекция <br>кухонь LEVEL",
        "image" => "/local/images/main-slider/2.jpg",
        "linkHref" => "#",
        "linkText" => "Подробнее"
    ],
])->map(function ($arItem){
    $item = new Item();

    $item->title = $arItem['title'];

    $item->desktopImage = new Image();
    $item->desktopImage->src = $arItem['image'];
    $item->desktopImage->title = $arItem['title'];

    $item->mobileImage = new Image();
    $item->mobileImage->src = $arItem['image'];
    $item->mobileImage->title = $arItem['title'];

    $item->link  = new Link();
    $item->link->href = $arItem['linkHref'];
    $item->link->text = $arItem['linkText'];
    return $item;
});

return $items;