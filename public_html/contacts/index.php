<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetAdditionalCSS('/local/frontend/local/contacts/contacts.css');
?>
    <div class="contacts">
        <h1 class="h1">Контакты</h1>

        <div class="left-part">
            <span class="h2 font_bold">Адрес</span>
            <div class="address">
                <p>
                    675000, г.Благовещенск, <br>
                    ул. Мухина, дом 120А
                </p>
            </div>
            <span class="h2 font_bold">Режим работы</span>
            <div class="working-hours">
                <p>
                    ПН-ПТ с 9:00 до 18:00 <br>
                    СБ с 9:00 до 17:00 <br>
                    ВС с 9:00 до 16:00 <br>
                </p>
            </div>
            <span class="h2 font_bold">Электронная почта</span>
            <div class="email">
                <p>
                    <a href="mailto:sales@masterleks.ru" class="link link_email"
                       title="Электронная почта отдела продаж">sales@masterleks.ru</a>
                    <br>
                    <a href="mailto:Brand@masterleks.ru" class="link link_email"
                       title="Электронная почта отдела маркетинга">Brand@masterleks.ru</a>
                </p>
            </div>
            <span class="h2 font_bold">Бесплатная горячая линия Leks</span>
            <div class="hotline-phone">
                <p>
                    <a href="tel:+78007006012" class="link link_phone" title="Телефон отдела продаж">8-800-700-60-12</a>
                </p>
            </div>
        </div>
        <div class="right-part">
            <div class="col-sm-8">
                <a class="dg-widget-link"
                   href="http://2gis.ru/blagoveshensk/firm/7318877675459012/center/127.513743,50.281237/zoom/16?utm_medium=widget-source&amp;utm_campaign=firmsonmap&amp;utm_source=bigMap"
                   style="display: none;">Посмотреть на карте Благовещенска</a>
                <div class="dg-widget-link" style="display: none;"><a
                            href="http://2gis.ru/blagoveshensk/firm/7318877675459012/photos/7318877675459012/center/127.513743,50.281237/zoom/17?utm_medium=widget-source&amp;utm_campaign=firmsonmap&amp;utm_source=photos">Фотографии
                        компании</a></div>
                <div class="dg-widget-link" style="display: none;"><a
                            href="http://2gis.ru/blagoveshensk/center/127.513743,50.281237/zoom/16/routeTab/rsType/bus/to/127.513743,50.281237╎Leks, производственная компания?utm_medium=widget-source&amp;utm_campaign=firmsonmap&amp;utm_source=route">Найти
                        проезд до Leks, производственная компания</a></div>
                <script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
                <script charset="utf-8">new DGWidgetLoader({
                        "width": "100%",
                        "height": 475,
                        "borderColor": "#a3a3a3",
                        "pos": {"lat": 50.283137, "lon": 127.513743, "zoom": 16},
                        "opt": {"city": "blagoveshensk"},
                        "org": [{"id": "7318877675459012"}]
                    });</script>
                <?/* <iframe frameborder="no" style="border: 1px solid #a3a3a3; box-sizing: border-box;" width="100%"
                        height="475"
                        src="http://widgets.2gis.com/widget?type=firmsonmap&amp;options=%7B%22pos%22%3A%7B%22lat%22%3A50.283137%2C%22lon%22%3A127.513743%2C%22zoom%22%3A16%7D%2C%22opt%22%3A%7B%22city%22%3A%22blagoveshensk%22%7D%2C%22org%22%3A%227318877675459012%22%7D"></iframe> */?>
                <noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript.
                    Включите его в настройках вашего браузера.
                </noscript>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>