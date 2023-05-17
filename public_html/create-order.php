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
$paymentSum = (int)$request->getQuery("sum");

$status = OrderStatus::query()
    ->filter(['ORDER_NUMBER' => $orderNumber])
    ->order('DATE', 'DESC')
    ->getList()
    ->first();
if ($status->count() > 0) {
    $orderSum = (int)($status["LEFT_TO_PAY"]);

    if ($orderSum < $paymentSum) {
        echo "Ошибка. Превышена стоимость заказа";
        return;
    }

    $parOrderSum = $paymentSum * 100;

    $lastPaymentNumber = OrderStatus::query()
        ->filter(['ORDER_NUMBER' => $orderNumber])
        ->order('PAY_ID', 'DESC')
        ->getList()
        ->first()
        ->getFields()['PAY_ID'];

    $newOrderNumber = ($lastPaymentNumber && $lastPaymentNumber>0) ? $lastPaymentNumber  : $orderNumber;

    if (strripos($newOrderNumber, "_") == false) {
        $parOrderNumber = $newOrderNumber . "_1";
    } else {
        $prefix = stristr($newOrderNumber, '_');
        $paymentId = str_replace('_', '', $prefix) + 1;
        $parOrderNumber = str_replace($prefix, '', $newOrderNumber) . "_" . $paymentId;
    }

    $order = (new OrderManagerByNumber($parOrderNumber, $parOrderSum, "Оплата заказа №" . $orderNumber))->createOrderManager();
    $orderStatus = $order->getStatus();
    if ($order->isPaid()) {
        $successUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), true);
        LocalRedirect($successUrl);
    } else if ($order->isNotPaid() || $order->isAutorizePay()) {
        $paymentLink = OrderLink::getPaymentLink($order->getNumber());

        if (!$paymentLink && !empty($orderStatus['attributes'])) {
            // заказ создан в сбере, но нет ссылки на сайте

            foreach ($orderStatus['attributes'] as $attribute) {
                if ($attribute['name'] === 'mdOrder') {
                    $paymentLink = 'https://securecardpayment.ru/payment/merchants/sbersafe_sberid/payment_ru.html?' . $attribute['name'] . '=' . $attribute['value'];

                    OrderLink::create(['UF_ORDER_NUMBER' => +$orderNumber, 'UF_PAYMENT_LINK' => $paymentLink]);

                    break;
                }
            }
        }

        if (strlen($paymentLink) > 0) {
            $nowDate = \Bitrix\Main\Type\DateTime::createFromPhp(new \DateTime());
            $arNewStatusFields = $status->toArray();
            $arNewStatusFields['PAY_ID'] = $order->getNumber();
            $arNewStatusFields["DATE"] = $nowDate;
            unset($arNewStatusFields["ID"]);
            OrderStatus::create($arNewStatusFields);
            LocalRedirect($paymentLink);
        } else {
            $failUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), false);
            LocalRedirect($failUrl);
        }
    } else if ($order->isDeclined()) {
        $failUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), false);
        LocalRedirect($failUrl);
    } else if ($order->isNotFound()) {
        $arNewOrder = $order->create();

        if (isset($arNewOrder["errorCode"])) {
            $failUrl = $order->getConfig()->getPaymentResultUrl($order->getNumber(), false);
            LocalRedirect($failUrl);
        } else {
            OrderLink::create(['UF_ORDER_NUMBER' => +$order->getNumber(), 'UF_PAYMENT_LINK' => $arNewOrder["formUrl"]]);
            LocalRedirect($arNewOrder["formUrl"]);
        }
    }
}