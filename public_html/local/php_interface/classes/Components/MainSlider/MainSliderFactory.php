<?php

namespace ZLabs\Components\MainSlider;

use ZLabs\BxMustache\Image;
use ZLabs\Components\FactoryMethodInterface;
use ZLabs\BxMustache\MainSlider\Item;
use ZLabs\BxMustache\Link;

class MainSliderFactory implements FactoryMethodInterface
{
    /**@var array*/
    protected $arBxItem;
    /**@var Item*/
    protected $instance;

    public function __construct(array $arItem)
    {
        $this->arBxItem = $arItem;
    }

    public function create()
    {
        $this->createInstance();
        $this->createTitle();
        $this->createImages();
        $this->createLink();

        return $this->instance;
    }

    protected function createInstance()
    {
        $this->instance = new Item();
    }

    protected function createTitle()
    {
        $this->instance->title = $this->arBxItem['DISPLAY_PROPERTIES']['SLIDER_TEXT']['~VALUE']['TEXT'];
    }

    protected function createImages()
    {
        $mobileImage = \CFile::ResizeImageGet(
            $this->arBxItem['DETAIL_PICTURE'],
            array("width" => 450, "height" => 500),
            BX_RESIZE_IMAGE_EXACT
        );

        $image = \CFile::ResizeImageGet(
            $this->arBxItem['PREVIEW_PICTURE'],
            array("width" => 2600, "height" => 800),
            BX_RESIZE_IMAGE_PROPORTIONAL
        );

        $this->instance->mobileImage = new Image();
        $this->instance->desktopImage = new Image();

        if($mobileImage){
            $this->instance->mobileImage->src = $mobileImage['src'];
        }
        if($image){
            $this->instance->desktopImage->src = $image['src'];
        }

        $title = strip_tags($this->arBxItem['DISPLAY_PROPERTIES']['SLIDER_TEXT']['~VALUE']['TEXT']);
        $this->instance->mobileImage->title = $title;
        $this->instance->desktopImage->title = $title;
    }

    protected function createLink()
    {
        $this->instance->link = new Link();
        $this->instance->link->href = $this->arBxItem['DISPLAY_PROPERTIES']['BUTTON_LINK']['VALUE'];
        $this->instance->link->text = $this->arBxItem['DISPLAY_PROPERTIES']['SLIDER_TEXT_BTN']['VALUE'];
    }
}
?>