<?php

namespace ZLabs\Sberbank;

use ZLabs\Sberbank\Config;
use ZLabs\Sberbank\Settings;

class SberbankConfig
{
    public static function get() {
        return new Config(
            Settings::getInstance()->get('LOGIN'),
            Settings::getInstance()->get('PASSWORD'),
            Settings::getInstance()->get('SUCCESS_PAYMENT_URL'),
            Settings::getInstance()->get('CHECK_ORDER_URL'),
            Settings::getInstance()->get('REGISTER_ORDER_URL'),
            Settings::getInstance()->get('SEARCH_LEAD_URL')
        );
    }
}