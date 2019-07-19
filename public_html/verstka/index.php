<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/verstka/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/local/assets/mustache/')
]);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новый проект</title>
</head>
<body>
<main>
    <h1>Новый проект</h1>
    <h2>Страницы:</h2>
    <ul>
        <li><a href="main.php">Главная страница</a></li>
        <li><a href="catalog.php">Каталог</a></li>
        <li><a href="kitchen.php">Кухни</a></li>
        <li><a href="catalog-kitchen.php">Детальная кухни</a></li>
    </ul>
</main>
</body>
</html>