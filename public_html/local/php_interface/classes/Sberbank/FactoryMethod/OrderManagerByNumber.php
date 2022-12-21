<?php

namespace ZLabs\Sberbank\FactoryMethod;

use ZLabs\Sberbank\Config;
use ZLabs\Sberbank\OrderManager;
use ZLabs\Sberbank\Settings;
use ZLabs\Sberbank\SberbankConfig;

class OrderManagerByNumber implements OrderManagerFactoryMethodInterface
{
    protected $orderNumber;
    protected $amount;
    protected $description;

    public function __construct($orderNumber, $amount, $description)
    {
        $this->orderNumber = $orderNumber;
        $this->amount = $amount;
        $this->description = $description;
    }

    public function createOrderManager(): OrderManager
    {
        return new OrderManager(
            SberbankConfig::get(),
            $this->amount,
            $this->description,
            null,
            $this->orderNumber
        );
    }
}