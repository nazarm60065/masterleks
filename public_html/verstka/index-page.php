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
    <title>Новый проект: главная страница</title>
    <link rel="stylesheet" href="/local/assets/local/common/common.css">
    <link rel="stylesheet" href="/local/assets/local/index/index.css">
</head>
<body class="page">
<?php
require_once 'header.php'; ?>
<main class="index">
    <?php
    echo $mustache->render(
        'index-example',
        include $_SERVER['DOCUMENT_ROOT'] . '/verstka/context/index/index-example.php');
    ?>
</main>
<script type="text/javascript" src="/local/assets/local/common/common.js" defer></script>
<script type="text/javascript" src="/local/assets/local/index/index.js" defer></script>
</body>
</html>