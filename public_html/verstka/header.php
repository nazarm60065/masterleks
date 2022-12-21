<?php

$mustache = new Mustache_Engine([
        'loader' => new Mustache_Loader_FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/local/assets/mustache/')
    ]
);
?>
<header class="header">Это шапка сайта</header>