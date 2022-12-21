<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    Array(
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "DEPTH_LEVEL" => "1",
        "DETAIL_PAGE_URL" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
        "IBLOCK_ID" => "7",
        "IBLOCK_TYPE" => "leks_catalog",
        "ID" => $_REQUEST["ID"],
        "IS_SEF" => "Y",
        "SECTION_PAGE_URL" => "#SECTION_CODE_PATH#/",
        "SECTION_URL" => "",
        "SEF_BASE_URL" => "/catalog/"
    )
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);