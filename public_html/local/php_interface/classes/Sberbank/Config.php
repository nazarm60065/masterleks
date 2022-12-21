<?php

namespace ZLabs\Sberbank;

use Bitrix\Main\Web\Uri;

class Config
{

    protected $paymentLogin;
    protected $paymentPassword;
    protected $successPaymentUrl;
    protected $checkOrderUrl;
    protected $registerOrderUrl;
    protected $searchLeadUrl;

    /**
     * @return mixed
     */
    public function getPaymentLogin()
    {
        return $this->paymentLogin;
    }

    /**
     * @return mixed
     */
    public function getPaymentPassword()
    {
        return $this->paymentPassword;
    }

    /**
     * @return mixed
     */
    public function getSuccessPaymentUrl()
    {
        return $this->successPaymentUrl;
    }

    /**
     * @return mixed
     */
    public function getCheckOrderUrl()
    {
        return $this->checkOrderUrl;
    }

    /**
     * @return mixed
     */
    public function getRegisterOrderUrl()
    {
        return $this->registerOrderUrl;
    }

    /**
     * @return mixed
     */
    public function getSearchLeadUrl()
    {
        return $this->checkOrderUrl;
    }

    public function __construct(
        $paymentLogin,
        $paymentPassword,
        $successPaymentUrl,
        $checkOrderUrl,
        $registerOrderUrl,
        $searchLeadUrl
    )
    {
        $this->paymentLogin = $paymentLogin;
        $this->paymentPassword = $paymentPassword;
        $this->successPaymentUrl = $successPaymentUrl;
        $this->checkOrderUrl = $checkOrderUrl;
        $this->registerOrderUrl = $registerOrderUrl;
        $this->searchLeadUrl = $searchLeadUrl;
    }

    public function getPaymentResultUrl($orderNumber, $isSuccess) {
        $paymentResultUrl = new Uri($this->searchLeadUrl);
        $paymentSuccessStatus = ($isSuccess ? "yes" : "no");
        $paymentResultUrl->addParams([
            "order" => $orderNumber,
            "paymentSuccess" => $paymentSuccessStatus
        ]);
        return $paymentResultUrl->getUri();
    }
}
