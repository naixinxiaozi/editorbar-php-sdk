<?php
/**
 * 查询订单状态
 * @author zhang
 */
class EocQueryOrderStatusRequest
{
    private $apiParas = array();

    public $format = "json";

    public $isNeedConvert = true;

    private $code;

    public function setCode($code)
    {
        $this->code = $code;
        $this->apiParas["code"] = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getApiMethodName(){
        return "GET";
    }

	public function getInterfaceAddress(){
		return "orders/status";
	}

    public function check(){
        EocCheckRequest::checkNotNull($this->code,'code');
    }

    public function getApiParas(){
        return $this->apiParas;
    }
}
