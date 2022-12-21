<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent(
	"zaiv:instagramwidget", 
	"zaiv_inst_custom", 
	array(
		"COMPONENT_TEMPLATE" => "zaiv_inst_custom",
		"MEDIA_COUNT" => "9",
		"MEDIA_ROW_COUNT" => "3",
		"ACCOUNT_AVATAR_SIZE" => "MEDIUM",
		"ACCOUNT_AVATAR_SIZE_MOBILE" => "MEDIUM",
		"SHOW_ACCOUNT_INFO" => "N",
		"SHOW_ACCOUNT_INFO_TYPE" => "TYPE2",
		"SHOW_ACCOUNT_INFO_TYPE_MOBILE" => "TYPE1",
		"SHOW_ACCOUNT_DESCRIPTION" => "N",
		"SHOW_INSTAGRAM_LOGO" => "N",
		"INSTAGRAM_LOGO_TYPE" => "BIG",
		"NAME_TYPE" => "FULLNAME",
		"NOINDEX_WIDGET" => "Y",
		"NOINDEX_LINKS" => "Y",
		"DEL_SPEC_SYMBOLS_IN_DESCRIPTION" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "86400"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>