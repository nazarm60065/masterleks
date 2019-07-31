<? if (!$isMainPage) : ?>
    </div>
</section>
<? endif; ?>
</main>
<footer>
    <div class="footer-block">
        <div class="container">
            <div class="flex-container">
                <div class="col-desk-50 d-tablet-mobile-none">
                    <div class="footer_title">
                        <a href="/catalog/" class="footer__title-link">Каталог</a>
                    </div>
                    <div class="flex-container">
                        <div class="col-desk-50">
                            <div class="footer__nav">
                                <ul class="footer__block-nav text-uppercase">
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-desk-50">
                            <div class="footer__nav">
                                <ul class="footer__block-nav text-uppercase">
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                    <li class="footer__nav-element"><a href="#" class="footer__nav-link link-animation">ссылка на услугу</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-desk-25 d-tablet-mobile-none">
                    <div class="footer_title">
                        <a href="/blog/" class="footer__title-link">Блог</a>
                    </div>
                    <div class="footer__nav">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "footer_blog",
                            Array(
                                "ACTIVE_DATE_FORMAT" => "",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_DATE" => "N",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "N",
                                "DISPLAY_PREVIEW_TEXT" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "FIELD_CODE" => array("",""),
                                "FILTER_NAME" => "",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => "9",
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
                                "PAGER_TEMPLATE" => "",
                                "PAGER_TITLE" => "",
                                "PARENT_SECTION" => "",
                                "PARENT_SECTION_CODE" => "",
                                "PREVIEW_TRUNCATE_LEN" => "",
                                "PROPERTY_CODE" => array("",""),
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
                    </div>
                </div>
                <div class="col-desk-25 col-tab-100">
                    <div class="footer_title d-tablet-mobile-none">
                        <a href="/contacts/" class="footer__title-link">Контакты</a>
                    </div>
                    <div class="footer__nav">
                        <ul class="footer__block-nav">
                            <li class="footer__nav-element footer__nav-element_text-big">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/local/include_areas/address.php"
                                    )
                                );?>
                            </li>
                            <li class="footer__nav-element footer__nav-element_text-big">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/local/include_areas/footer_phone.php"
                                    )
                                ); ?>
                            </li>
                            <li class="footer__nav-element footer__nav-element_text-big">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/local/include_areas/footer_email.php"
                                    )
                                ); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "top_menu_mobi",
    Array(
        "ALLOW_MULTI_SELECT" => "N",
        "CHILD_MENU_TYPE" => "",
        "COMPONENT_TEMPLATE" => "top_menu",
        "DELAY" => "N",
        "MAX_LEVEL" => "1",
        "MENU_CACHE_GET_VARS" => array(),
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "ROOT_MENU_TYPE" => "top",
        "USE_EXT" => "Y"
    )
);?>
</body>
</html>