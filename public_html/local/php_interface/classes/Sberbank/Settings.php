<?php

namespace ZLabs\Sberbank;

use Bitrix\Main\Config\Configuration;

final class Settings
{
    private static $instance;
    private $settings;

    public static function getInstance(): Settings
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
        $this->settings = collect(Configuration::getInstance()->get('sberbank_leks'));
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function get($name)
    {
        return $this->settings->get($name);
    }
}
