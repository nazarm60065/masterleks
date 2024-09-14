<?php

/**
 * @var array $arCurrentValues
 */

use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!\Bitrix\Main\Loader::includeModule('bex.bbc')) {
    return false;
}

if (!\Bitrix\Main\Loader::includeModule('zlabs.rospilorder')) {
    return false;
}

Loc::loadMessages(__FILE__);

try {
    $arComponentParameters = [];
} catch (Exception $e) {
    ShowError($e->getMessage());
}
