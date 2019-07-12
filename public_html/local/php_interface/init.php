<?php

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/events.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/events.php');
}
