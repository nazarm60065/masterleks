<?php
/**
 * Example of settings file config.php:
 * 
 * ```php
 * return [
 *      // License key for Bitrix
 *      'licenseKey' => 'NFR-123-456',
 * 
 *      // Modules to be installed.
 *      // Warning: install the modules using DB migration. Install the modules 
 *      // using the settings of the environment, only for dev environment.
 *      'modules' => [
 *          'vendor.debug'
 *      ],
 * 
 *      // Options for modules 
 *      'options' => [
 *          'vendor.module' => [
 *              'OPTION_CODE' => 'value',
 *              'OPTION_CODE' => ['value' => 'test', 'siteId' => 's1']
 *          ],
 *      ],
 * 
 *      // Settings for module "cluster"
 *      'cluster' => [
 *          'memcache' => [
 *              [
 *                  'GROUP_ID' => 1,
 *                  'HOST' => 'host',
 *                  'PORT' => 'port',
 *                  'WEIGHT' => 'weight',
 *                  'STATUS' => 'status',
 *              ],
 *              [
 *                  'GROUP_ID' => 1,
 *                  'HOST' => 'host',
 *                  'PORT' => 'port',
 *                  'WEIGHT' => 'weight',
 *                  'STATUS' => 'status',
 *              ]
 *          ]
 *      ],
 * 
 *      // Values for file .settings.php
 *      'settings' => [
 *          'connections' => [
 *              'default' => [
 *                  'host' => 'host',
 *                  'database' => 'db',
 *                  'login' => 'login',
 *                  'password' => 'pass',
 *                  'className' => '\\Bitrix\\Main\\DB\\MysqlConnection',
 *                  'options' => 2,
 *              ],
 *          ]
 *      ]
 * ];
 * ```
 */

return [
    'settings' => [
        'sberbank' => [
            'LOGIN' => 'masterleks-api',
            'PASSWORD' => 'V91)_mx@<(#12gdcCS',
            'SUCCESS_PAYMENT_URL' => 'https://masterleks.local/payment-check.php',
            'CHECK_ORDER_URL' => 'https://securepayments.sberbank.ru/payment/rest/getOrderStatusExtended.do',
            'REGISTER_ORDER_URL' => 'https://securepayments.sberbank.ru/payment/rest/register.do',
            'SEARCH_LEAD_URL' => 'http://masterleks.local/order-search/',
        ]
    ]
];