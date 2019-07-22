<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Мастер Лекс");
?>

<? $APPLICATION->IncludeComponent(
    "zlabs:main.safe-include",
    "top-block-main",
    array(
        "COMPONENT_TEMPLATE" => "top-block-main",
        "title" => "Как ты<br>захочешь",
        "image" => "/local/images/main/pic_1.jpg"
    ),
    false
); ?>
<? $APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "section-main",
    Array(
        "ADD_SECTIONS_CHAIN" => "Y",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COUNT_ELEMENTS" => "N",
        "HEADLINE" => "Каталог",
        "HIDE_SECTION_NAME" => "N",
        "IBLOCK_ID" => "8",
        "IBLOCK_TYPE" => "leks_catalog",
        "SECTION_CODE" => "",
        "SECTION_FIELDS" => array("", ""),
        "SECTION_ID" => $_REQUEST["SECTION_ID"],
        "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
        "SECTION_USER_FIELDS" => array("", ""),
        "SHOW_PARENT_NAME" => "Y",
        "TOP_DEPTH" => "1"
    )
); ?>
    <section>
        <? $APPLICATION->IncludeComponent(
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
                "IBLOCK_ID" => "8",
                "IBLOCK_TYPE" => "leks_catalog",
                "SECTION_CODE" => "",
                "SECTION_FIELDS" => array(0 => "", 1 => "NAME", 2 => "PICTURE", 3 => "DETAIL_PICTURE", 4 => "",),
                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
                "SECTION_USER_FIELDS" => array(0 => "", 1 => "",),
                "SHOW_PARENT_NAME" => "Y",
                "TOP_DEPTH" => "1"
            )
        ); ?>
    </section>
    <section>
        <div class="container">
            <? $APPLICATION->IncludeComponent(
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
                    "IBLOCK_ID" => "8",
                    "IBLOCK_TYPE" => "leks_catalog",
                    "SECTION_CODE" => "",
                    "SECTION_FIELDS" => array(0 => "NAME", 1 => "PICTURE", 2 => "DETAIL_PICTURE", 3 => "",),
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
                    "SECTION_USER_FIELDS" => array(0 => "", 1 => "",),
                    "SHOW_PARENT_NAME" => "Y",
                    "TOP_DEPTH" => "1"
                )
            ); ?>
        </div>
    </section>
    <section style="height: 600px">
        <div class="container">
            <div class="section__sub-title">
                Отзывы
            </div>

        </div>
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>