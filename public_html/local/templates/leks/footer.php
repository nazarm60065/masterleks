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
                    <div class="footer_title"><a href="#" class="footer__title-link">Услуги</a></div>
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
                    <div class="footer_title"><a href="#" class="footer__title-link">Блог</a></div>
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
                <div class="col-desk-25 col-tab-100">
                    <div class="footer_title d-tablet-mobile-none"><a href="#" class="footer__title-link">Контакты</a></div>
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