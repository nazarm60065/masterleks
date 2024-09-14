<?php

namespace ZLabs\FeedbackForm\Components;

use CMain;
use Bitrix\Main\Loader;
use ZLabs\RospilOrder\Components\FormCustom;

/**
 * @global CMain $APPLICATION
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!Loader::includeModule('bex.bbc')) {
    return false;
}

if (!Loader::includeModule('zlabs.rospilorder')) {
    return false;
}

class RospilOrderForm extends FormCustom
{
}
