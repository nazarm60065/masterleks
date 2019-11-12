<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog.php");

use Bitrix\Main\Application;
use ZLabs\Models\Orders\OrderLink;
use Sabre\Xml\Order;
use \ZLabs\RospilOrder\Models\OrderStatus;
use Bitrix\Main\Loader;
use ZLabs\Sberbank\FactoryMethod\OrderManagerByNumber;

if (!Loader::includeModule('zlabs.rospilorder')) {
    return false;
}

$request = Application::getInstance()->getContext()->getRequest();
$orderNumber = (int)$request->getQuery("orderNumber");

$status = OrderStatus::query()
    ->filter(['ORDER_NUMBER' => $orderNumber])
    ->order('DATE', 'DESC')
    ->getList()
    ->first();

if ($status->count() > 0) {
    $orderSum = (int)($status["LEFT_TO_PAY"]);
    $parOrderSum = $orderSum * 100;

    $order = (new OrderManagerByNumber($orderNumber, $parOrderSum, "Оплата заказа №" . $orderNumber))->createOrderManager();
    $orderStatus = $order->getStatus();

    if ($order->isPaid()) {
        $successUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), true);
        LocalRedirect($successUrl);
    }
    else if ($order->isNotPaid()) {
        $paymentLink = OrderLink::getPaymentLink($order->getNumber());
        if (strlen($paymentLink) > 0) {
            LocalRedirect($paymentLink);
        }
        else {
            $failUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), false);
            LocalRedirect($failUrl);
        }
    }
    else if ($order->isDeclined()) {
        $failUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), false);
        LocalRedirect($failUrl);
    }
    else if ($order->isNotFound()) {
        $arNewOrder = $order->create();

        if (isset($arNewOrder["errorCode"])) {
            $failUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), false);
            LocalRedirect($failUrl);
        } else {
            OrderLink::create(['UF_ORDER_NUMBER' => $order->getNumber(), 'UF_PAYMENT_LINK' => $arNewOrder["formUrl"]]);
            LocalRedirect($arNewOrder["formUrl"]);
        }
    }
}