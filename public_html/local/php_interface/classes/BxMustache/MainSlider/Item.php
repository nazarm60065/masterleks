<?php

namespace ZLabs\BxMustache\MainSlider;

use ZLabs\BxMustache\Image;
use ZLabs\BxMustache\Link;

class Item
{
    /** @var string*/
    public $title;
    /** @var Image */
    public $desktopImage;
    /** @var Image */
    public $mobileImage;
    /** @var Link*/
    public $link;
}
