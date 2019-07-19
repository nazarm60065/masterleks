<? defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Context;

$lang = Bitrix\Main\Context::getCurrent()->getLanguage();

$isMainPage = CSite::InDir('/index.php');

echo "<!DOCTYPE html>";
echo "<html lang=\"{$lang}\">";
?>

<head>
    <meta charset="UTF-8">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?
    $APPLICATION->ShowHead();
    $APPLICATION->SetAdditionalCSS('/local/icons/icomoon/style.css');
    $APPLICATION->SetAdditionalCSS('/local/frontend/local/style/style.css');
    $APPLICATION->SetAdditionalCSS('/local/frontend/local/main/main.css');
    $APPLICATION->SetAdditionalCSS('/local/js/jquery.slick/slick.css');
    $APPLICATION->SetAdditionalCSS('https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900i|Roboto:400,500,700&display=swap&subset=cyrillic');

    $APPLICATION->AddHeadScript('/local/js/jquery2/jquery-2.2.4.min.js');
    $APPLICATION->AddHeadScript('/local/js/jquery.slick/slick.min.js');
    $APPLICATION->AddHeadScript('/local/frontend/local/main/main.js');
    $APPLICATION->AddHeadScript('/local/frontend/local/style/style.js');
    ?>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/apple-touch-icon-60x60.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/apple-touch-icon-152x152.png"/>
    <link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196"/>
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96"/>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16"/>
    <link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128"/>
    <meta name="application-name" content="Leks"/>
    <meta name="msapplication-TileColor" content="#FFFFFF"/>
    <meta name="msapplication-TileImage" content="mstile-144x144.png"/>
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png"/>
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png"/>
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png"/>
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png"/>

</head>

<?
echo '<body>';

$APPLICATION->ShowPanel();
?>

<header>
    <div class="full_section">
        <div class="container container_flex header__container">
            <div class="mobil-menu__block-button" onclick="toggle_menu(true)">
                <span class="mobil-menu__button"></span>
            </div>
            <div class="logo">
                <? if ($isMainPage) : ?>
                    <img src="/local/images/logo.png" alt="логотип" class="logo__img">
                <? else : ?>
                    <a href="/" class="logo__link"><img src="/local/images/logo.png" alt="логотип"
                                                        class="logo__img"></a>
                <? endif; ?>
            </div>
            <menu class="top-menu">
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Каталог</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Наши проекты</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Отследить заказ</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Блог</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">О нас</a></li>
                <li class="top-menu__element"><a class="top-menu__element-link" href="#">Контакты</a></li>
            </menu>
            <div class="search">
                <a href="#" class="search__link"><span class="input-i icon-search"></span></a>
                <div class="input_search_area">
                    <input type="text">
                </div>
            </div>
        </div>
    </div>
</header>
<main class="main ">
    <div class="main-blackout "></div>
    <? if (!$isMainPage) : ?>
        <section>
            <div class="container">
    <? endif; ?>
