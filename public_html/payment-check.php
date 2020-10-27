<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog.php");

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
$prefix = stristr($order->getNumber(), '_');
$trueOrderId = str_replace($prefix, '', $order->getNumber());
if ($order->isNotPaid()) {
    $paymentLink = OrderLink::getPaymentLink($order->getNumber());
    if (strlen($paymentLink) > 0) {
        LocalRedirect($paymentLink);
    } else {
        $failUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), false);
        LocalRedirect($failUrl);
    }
} else if ($order->isPaid()) {
    $arLastStatus = OrderStatus::query()
        ->filter(["ORDER_NUMBER" => $trueOrderId])
        ->order("DATE", "DESC")
        ->getList()
        ->first()
        ->toArray();

    $nowDate = \Bitrix\Main\Type\DateTime::createFromPhp(new DateTime());
    if(substr(stristr($order->getNumber(), '_'), 1) > substr(  stristr($arLastStatus["PAY_ID"], '_'), 1)){
        $arNewStatusFields = [
            "ORDER_NUMBER" => $arLastStatus["ORDER_NUMBER"],
            "DATE" => $nowDate,
            "STATUS" => (  $arLastStatus['LEFT_TO_PAY'] - $order->getAmount())> 0?  $arLastStatus['STATUS'] :"Заказ оплачен",
            "CUSTOMER" => $arLastStatus["CUSTOMER"],
            "OUTPUT_DATE" => $arLastStatus["OUTPUT_DATE"],
            "INSTALLATION_DATE" => $arLastStatus["INSTALLATION_DATE"],
            "FIRST_INSTALLATION_DATE" => $arLastStatus["FIRST_INSTALLATION_DATE"],
            "LEFT_TO_PAY" =>  $arLastStatus['LEFT_TO_PAY'] - $order->getAmount(),
            "ORDER_PRICE" => $arLastStatus["ORDER_PRICE"],
            "PAY_ID" => $order->getNumber(),
        ];
        OrderStatus::create($arNewStatusFields);
    }

    $successUrl = $order->getConfig()->getPaymentResultUrl($trueOrderId, true);
    LocalRedirect($successUrl);
} else {
    $failUrl = $order->getConfig()->getPaymentResultUrl($trueOrderId, false);
    LocalRedirect($failUrl);
}
