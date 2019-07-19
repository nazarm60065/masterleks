<?
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена");
?>
    <div class="full_section bg_yellow_2 initial_height">
        <div class="container_section">
            <div class="catalog">
                <div class="left_part">
                    <div class="h1 page_not_fount_title font_bold h1_bottom_margin">404</div>
                    <div class="sub_title">Кажется что-то пошло не так!</div>
                    <div class="sub_title">Извините, но мы не можем найти нужную Вам страницу.</div>
                    <div class="sub_title">Скорее всего, Вы перешли по адресу, который больше не существует или не
                        существовал никогда. Для продолжения перейдите на главную страницу сайта.
                    </div>
                    <!--<noindex>-->
                    <a href="/" rel="nofollow" class="button">Перейти</a>
                    <!--</noindex>-->
                </div>
                <div class="right_part">
                    <img src="/images/bear.png" title="bear" alt="bear">
                </div>
            </div>
        </div>
    </div>
    <script>
        height_window_to_main("stretch");
    </script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>