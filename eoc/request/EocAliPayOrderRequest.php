<?php
/**
 * 支付宝支付订单
 * @author zhang
 */
class EocAliPayOrderRequest
{

    private $orderId;

    private $payReturnUrl;

    private $apiParas = array();

    public $format = "json";

    public $isNeedConvert = true;

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        $this->apiParas["orderId"] = $orderId;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setPayReturnUrl($payReturnUrl)
    {
        $this->payReturnUrl = $payReturnUrl;
        $this->apiParas["payReturnUrl"] = $payReturnUrl;
    }

    public function getPayReturnUrl()
    {
        return $this->payReturnUrl;
    }

    public function getApiMethodName(){
        return "GET";
    }

	public function getInterfaceAddress(){
		return "orders/alipay";
	}

    public function check(){
        EocCheckRequest::checkNotNull($this->orderId,'orderId');
        EocCheckRequest::checkNotNull($this->payReturnUrl,'payReturnUrl');
    }

    public function getApiParas(){
        return $this->apiParas;
    }
}
