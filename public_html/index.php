<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetAdditionalCSS('/local/frontend/local/main/main.css');
$APPLICATION->AddHeadScript('/local/frontend/local/main/main.js');
$APPLICATION->SetAdditionalCSS('/local/assets/local/main/main.css');
$APPLICATION->AddHeadScript('/local/assets/local/main/main.js');
$APPLICATION->SetTitle("Мастер Лекс");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main-slider",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("DETAIL_PICTURE",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "leks_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("BUTTON_LINK","SLIDER_TEXT_BTN","SLIDER_TEXT",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"section-main",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "section-main",
		"COUNT_ELEMENTS" => "N",
		"HEADLINE" => "Каталог",
		"HIDE_SECTION_NAME" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "leks_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_ID" => "364",
		"SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE_PATH#/",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1"
	)
);?> <section>
<?$APPLICATION->IncludeComponent(
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
);?>
</section> <section>
<div class="container">
	<div class="section__sub-title section__sub-title_right">
		 Наши проекты
	</div>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"main-our-projects",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "main-our-projects",
		"COUNT_ELEMENTS" => "N",
		"HEADLINE" => "Наши проекты",
		"HIDE_SECTION_NAME" => "N",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "leks_content",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"NAME",1=>"PICTURE",2=>"DETAIL_PICTURE",3=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "#SITE_DIR#/our-projects/#SECTION_CODE#/",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1"
	)
);?>
</div>
 </section><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>