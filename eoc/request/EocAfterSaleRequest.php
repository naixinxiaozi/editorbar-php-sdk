<?php
/**
 * 申请售后
 * @author zhang
 */
class EocAfterSaleRequest
{
    private $apiParas = array();

    public $format = "json";

    public $isNeedConvert = true;

    private $identifier;

    private $orderId;

    private $cause;

    private $attachment;

    private $remark;

    private $suggestion;

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

    public function setCause($cause)
    {
        $this->cause = $cause;
        $this->apiParas["cause"] = $cause;
    }

    public function getCause()
    {
        return $this->cause;
    }

    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
        $this->apiParas["attachment"] = $attachment;
    }

    public function getAttachment()
    {
        return $this->attachment;
    }

    public function setRemark($remark)
    {
        $this->remark = $remark;
        $this->apiParas["remark"] = $remark;
    }

    public function getRemark()
    {
        return $this->remark;
    }

    public function setSuggestion($suggestion)
    {
        $this->suggestion = $suggestion;
        $this->apiParas["suggestion"] = $suggestion;
    }

    public function getSuggestion()
    {
        return $this->suggestion;
    }

    public function getApiMethodName(){
        return "POST";
    }

	public function getInterfaceAddress(){
		return "orders/aftersale";
	}

    public function check(){
        EocCheckRequest::checkNotNull($this->identifier,'identifier');
        EocCheckRequest::checkNotNull($this->orderId,'orderId');
        EocCheckRequest::checkNotNull($this->cause,'cause');
        EocCheckRequest::checkNotNull($this->attachment,'attachment');
        EocCheckRequest::checkNumeric($this->orderId,'orderId');
        EocCheckRequest::checkNumeric($this->cause,'cause');
    }

    public function getApiParas(){
        return $this->apiParas;
    }
}
