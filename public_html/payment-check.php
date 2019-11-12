<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog.php");

use Bitrix\Main\Application;
use \ZLabs\RospilOrder\Models\OrderStatus;
use Bitrix\Main\Loader;
use \ZLabs\Sberbank\OrderManager;
use ZLabs\Models\Orders\OrderLink;
use ZLabs\Sberbank\FactoryMethod\OrderManagerById;

if (!Loader::includeModule('zlabs.rospilorder')) {
    return false;
}

$responseGet = Application::getInstance()->getContext()->getRequest();
$orderId = $responseGet->getQuery("orderId");

$order = (new OrderManagerById($orderId))->createOrderManager();
$arOrderStatus = $order->getStatus();
if ($order->isNotPaid()) {
    $paymentLink = OrderLink::getPaymentLink($order->getNumber());
    if (strlen($paymentLink) > 0) {
        LocalRedirect($paymentLink);
    }
    else {
        $failUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), false);
        LocalRedirect($failUrl);
    }
}
else if ($order->isPaid()) {
    OrderStatus::createPaidOrderRecord($order->getNumber());
    $successUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), true);
    LocalRedirect($successUrl);
}
else {
    $failUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), false);
    LocalRedirect($failUrl);
}
