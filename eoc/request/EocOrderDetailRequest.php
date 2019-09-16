<?php
/**
 * 订单详情
 * @author zhang
 */
class EocOrderDetailRequest
{
    private $apiParas = array();

    private $identifier;

    private $orderId;

    public $format = "json";

    public $isNeedConvert = true;


    public function getApiMethodName(){
        return "GET";
    }

	public function getInterfaceAddress(){
		return "orders/detail";
	}

    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        $this->apiParas["identifier"] = $identifier;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }


    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        $this->apiParas["orderId"] = $orderId;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }


    public function check(){
        EocCheckRequest::checkNotNull($this->identifier,'identifier');
        EocCheckRequest::checkNotNull($this->orderId,'orderId');
        EocCheckRequest::checkNumeric($this->orderId,'orderId');
    }

    public function getApiParas(){
        return $this->apiParas;
    }
}
