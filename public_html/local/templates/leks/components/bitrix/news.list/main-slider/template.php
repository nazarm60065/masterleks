<?
use ZLabs\Frontend\MustacheSingleton;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$mustache = MustacheSingleton::getInstance();

echo $mustache->render('main-slider', $arResult['context']);
?>

