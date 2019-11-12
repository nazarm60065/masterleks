<?php

namespace ZLabs\Sberbank;

use \Bitrix\Main\Web\HttpClient,
    ZLabs\Models\Orders\OrderLink,
    Sabre\Xml\Order,
    \ZLabs\RospilOrder\Models\OrderStatus,
    Bitrix\Main\Loader;

if (!Loader::includeModule('zlabs.rospilorder')) {
    return false;
}

class OrderManager {
    const ISO_CODE_RUB = 643;
    const ORDER_IS_NOT_PAID = 0;
    const ORDER_STATUS_PAID = 2;
    const ORDER_STATUS_DECLINED = 6;
    const ORDER_ERROR_NOT_FOUND = 6;

    protected $config;
    protected $orderNumber;
    protected $orderId;
    protected $amount;
    protected $description;
    protected $paymentFailUrl;//@todo заменить на функцию (url из класса Config, id добавить с помощью Uri)
    protected $orderStatus;

    public function __construct(Config $config, $amount = null, $description = null, $orderId = null, $orderNumber = null)
    {
        $this->config = $config;
        $this->amount = $amount;
        $this->description = $description;
        $this->orderId = $orderId;
        $this->orderNumber = $orderNumber;
    }

    public static function constructById($orderId) {
        $instance = new self();
        $instance->orderId = $orderId;

        return $instance;
    }

    public function getNumber()
    {
        return (isset($this->orderNumber) ? $this->orderNumber : $this->orderStatus["orderNumber"]);
    }

    public function getStatus() {
        $checkOrderData = [
            "userName" => $this->config->getPaymentLogin(),
            "password" => $this->config->getPaymentPassword()
        ];

        if (isset($this->orderNumber)) {
            $checkOrderData["orderNumber"] = $this->orderNumber;
        }
        else {
            $checkOrderData["orderId"] = $this->orderId;
        }

        $httpCheckClient = new HttpClient();
        $responseCheckJSON = $httpCheckClient->post($this->config->getCheckOrderUrl(), $checkOrderData);

        $this->orderStatus = json_decode($responseCheckJSON, true);
        return $this;
    }

    public function isPaid() {
        return ($this->orderStatus["orderStatus"] == static::ORDER_STATUS_PAID);
    }

    public function isNotPaid() {
        return (isset($this->orderStatus["orderStatus"])
            && $this->orderStatus["orderStatus"] == static::ORDER_IS_NOT_PAID);
    }

    public function isDeclined()
    {
        return ($this->orderStatus["orderStatus"] == static::ORDER_STATUS_DECLINED);
    }

    public function isNotFound() {
        return ($this->orderStatus["errorCode"] == static::ORDER_ERROR_NOT_FOUND);
    }

    public function create() {
        $registerOrderData = [
            "amount" => $this->amount,
            "currency" => static::ISO_CODE_RUB,
            "language" => "ru",
            "orderNumber" => $this->orderNumber,
            "userName" => $this->config->getPaymentLogin(),
            "password" => $this->config->getPaymentPassword(),
            "returnUrl" => $this->config->getSuccessPaymentUrl(),
            "failUrl" => $this->paymentFailUrl,
            "description" => $this->description,
            "sessionTimeoutSecs" => (3600 * 24 * 30)
        ];

        $httpRegisterClient = new HttpClient();
        $responseRegisterJSON = $httpRegisterClient->post($this->config->getRegisterOrderUrl(), $registerOrderData);
        return json_decode($responseRegisterJSON, true);
    }

    public function getConfig() {
        return $this->config;
    }
}