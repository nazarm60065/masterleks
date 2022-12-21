<?php

namespace ZLabs\Sberbank\FactoryMethod;

use Zlabs\Sberbank\OrderManager;

interface OrderManagerFactoryMethodInterface
{
    public function createOrderManager(): OrderManager;
}
