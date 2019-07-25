<?
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetAdditionalCSS('/local/frontend/local/404/404.css');
$APPLICATION->SetTitle("Страница не найдена");
?>
    <div class="error_404_content">
        <div class="left_part">
            <div class="h1 page_not_fount_title">404</div>
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
            <img src="/local/images/bear.png" title="bear" alt="bear">
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>