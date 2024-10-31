<?php

use Bitrix\Main\Page\Asset;

$instance = Asset::getInstance();

$instance->addCss('/local/assets/swiper/swiper-bundle.css');
//$instance->addCss('/local/assets/fancybox/fancybox.css');
$instance->addJs('/local/assets/swiper/swiper-bundle.js');
//$instance->addJs('/local/assets/fancybox/fancybox.umd.js');
