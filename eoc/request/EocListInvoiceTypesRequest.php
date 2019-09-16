<?php
/**
 * 获取可以开具的发票类型列表
 * @author zhang
 */
class EocListInvoiceTypesRequest
{
    private $apiParas = array();

    public $format = "json";

    public $isNeedConvert = true;


    public function getApiMethodName(){
        return "GET";
    }

	public function getInterfaceAddress(){
		return "invoice/types";
	}

    public function check(){

    }

    public function getApiParas(){
        return $this->apiParas;
    }
}
