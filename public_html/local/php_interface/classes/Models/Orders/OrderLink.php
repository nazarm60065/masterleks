<?php

namespace ZLabs\Models\Orders;

use Arrilot\BitrixModels\Models\D7Model;
use Arrilot\BitrixIblockHelper;

class OrderLink extends D7Model
{
    public static function tableClass()
    {
        return BitrixIblockHelper\HLblock::compileClass('orders');
    }

    public static function getPaymentLink($orderNumber) {
        $order = static::query()
            ->filter(['UF_ORDER_NUMBER' => $orderNumber])
            ->getList();

        if ($order->count() > 0) {
            $arOrder = $order->first()->toArray();
            return $arOrder['UF_PAYMENT_LINK'];
        }
        else {
            return "";
        }
    }
}
