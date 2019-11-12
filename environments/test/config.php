<?php

return [
    'settings' => [
        'sberbank' => [
            'LOGIN' => 'masterleks-api',
            'PASSWORD' => 'masterleks',
            'SUCCESS_PAYMENT_URL' => 'https://masterleks.local/payment-check.php',
            'CHECK_ORDER_URL' => 'https://3dsec.sberbank.ru/payment/rest/getOrderStatusExtended.do',
            'REGISTER_ORDER_URL' => 'https://3dsec.sberbank.ru/payment/rest/register.do',
            'SEARCH_LEAD_URL' => 'http://masterleks.local/order-search/',
        ]
    ]
];
