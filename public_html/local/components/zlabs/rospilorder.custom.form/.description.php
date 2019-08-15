<?php

use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
    'NAME' => Loc::getMessage('ROSPILORDER_FORM_NAME'),
    'DESCRIPTION' => Loc::getMessage('ROSPILORDER_FORM_DESCRIPTION'),
    'SORT' => 30,
    'PATH' => array(
        'ID' => 'Z-Labs',
        'CHILD' => array(
            'ID' => 'rospilorder',
            'NAME' => Loc::getMessage('ROSPILORDER_FORM_CHILD_GROUP'),
            'SORT' => 10
        )
    )
);
