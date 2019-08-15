<?php

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

$mustache = new Mustache_Engine(['loader' => new Mustache_Loader_FilesystemLoader(__DIR__)]);
?>
<?
echo $mustache->render('template', $arResult);
