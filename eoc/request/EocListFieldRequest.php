<?php
/**
 * 获取研究领域
 * @author zhang
 */
class EocListFieldRequest
{
    private $apiParas = array();

    public $format = "json";

    public $isNeedConvert = true;


    public function getApiMethodName(){
        return "GET";
    }

	public function getInterfaceAddress(){
		return "fields";
	}

    public function check(){

    }

    public function getApiParas(){
        return $this->apiParas;
    }
}
