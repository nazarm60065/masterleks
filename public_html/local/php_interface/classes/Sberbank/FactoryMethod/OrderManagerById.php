<?php

namespace ZLabs\Sberbank\FactoryMethod;

use ZLabs\Sberbank\OrderManager;
use ZLabs\Sberbank\SberbankConfig;

class OrderManagerById implements OrderManagerFactoryMethodInterface
{
    protected $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function createOrderManager(): OrderManager
    {
        return new OrderManager(
            SberbankConfig::get(),
            null,
            null,
            $this->orderId
        );
    }
}
