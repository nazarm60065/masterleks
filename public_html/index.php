<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Мастер Лекс");
?><?$APPLICATION->IncludeComponent(
	"zlabs:main.safe-include",
	"top-block-main",
	Array(
		"image" => "/local/images/main/pic_1.jpg",
		"title" => "Мебель<br>как ты<br>захочешь"
	)
);?> <?$APPLICATION->IncludeComponent(
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
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1"
	)
);?> <section>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"section-main-with-prices",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "section-main-with-prices",
		"COUNT_ELEMENTS" => "N",
		"HEADLINE" => "Каталог",
		"HIDE_SECTION_NAME" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "leks_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"NAME",1=>"PICTURE",2=>"DETAIL_PICTURE",3=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1"
	)
);?> </section> <section>
<div class="container">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"our-projects",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "our-projects",
		"COUNT_ELEMENTS" => "N",
		"HEADLINE" => "Наши проекты",
		"HIDE_SECTION_NAME" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "leks_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"NAME",1=>"PICTURE",2=>"DETAIL_PICTURE",3=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1"
	)
);?>
</div>
 </section> <section>
<div class="container">
	<div class="section__sub-title">
		 Отзывы
	</div>
	<div class="flamp-reviews" style="position: relative; height: auto;">
 <a class="flamp-widget" href="//blagoveshensk.flamp.ru/firm/leks_proizvodstvennaya_kompaniya-7318877675459012" data-flamp-widget-type="responsive-new" data-flamp-widget-id="7318877675459012" data-flamp-widget-width="100%" data-flamp-widget-count="5">������ � ��� �� ������</a>
		<script>!function (d, s) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        js = d.createElement(s);
                        js.async = 1;
                        js.src = "//widget.flamp.ru/loader.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, "script");</script>
	</div>
</div>
 </section><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>