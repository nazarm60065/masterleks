<?php

use ZLabs\Config;

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

$set = [
    'title' => 'Заголовок',
    'image' => 'Изображение',
];


$arTemplateParameters = [];

foreach ($set as $k => $val) {
    $arTemplateParameters[$k] = array(
        'NAME' => $val,
        'COLS' => 35,
        'ROWS' => 3,
        'PARENT' => 'BASE'
    );
}
