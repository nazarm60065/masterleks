<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections", 
	"", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"DEPTH_LEVEL" => "2",
		"DETAIL_PAGE_URL" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "leks_content",
		"IS_SEF" => "Y",
		"SECTION_PAGE_URL" => "#SECTION_CODE_PATH#/",
		"SEF_BASE_URL" => "/our-projects/"
	),
	false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);