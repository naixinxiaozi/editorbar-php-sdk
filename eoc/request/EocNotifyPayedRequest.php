<?php
/**
 * 订单支付通知
 * @author zhang
 */
class EocNotifyPayedRequest
{
    private $apiParas = array();

    public $format = "json";

    public $isNeedConvert = true;

    private $orderCode;

    private $payedFee;

    private $remark;


    public function setOrderCode($orderCode)
    {
        $this->orderCode = $orderCode;
        $this->apiParas["orderCode"] = $orderCode;
    }

    public function getOrderCoder()
    {
        return $this->orderCode;
    }

    public function setPayedFee($payedFee)
    {
        $this->payedFee = $payedFee;
        $this->apiParas["payedFee"] = $payedFee;
    }

    public function getPayedFee()
    {
        return $this->payedFee;
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

    public function getApiMethodName(){
        return "POST";
    }

	public function getInterfaceAddress(){
		return "orders/notifyPayed";
	}

    public function check(){
        EocCheckRequest::checkNotNull($this->orderCode,'orderCode');
    }

    public function getApiParas(){
        return $this->apiParas;
    }
}
