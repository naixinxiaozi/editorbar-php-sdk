<?php
/**
 * 订单分页查询
 * @author zhang
 */
class EocPageOrderRequest
{
    private $apiParas = array();

    private $identifier;

    private $pageNumber;

    private $pageSize;

    private $status;

    public $format = "json";

    public $isNeedConvert = true;


    public function getApiMethodName(){
        return "GET";
    }

	public function getInterfaceAddress(){
		return "orders/list";
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


    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        $this->apiParas["pageNumber"] = $pageNumber;
    }

    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        $this->apiParas["pageSize"] = $pageSize;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->apiParas["status"] = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function check(){
        EocCheckRequest::checkNotNull($this->identifier,'identifier');
        EocCheckRequest::checkNotNull($this->pageNumber,'pageNumber');
        EocCheckRequest::checkNotNull($this->pageSize,'pageSize');
        EocCheckRequest::checkNumeric($this->pageNumber,'pageNumber');
        EocCheckRequest::checkNumeric($this->pageSize,'pageSize');
    }

    public function getApiParas(){
        return $this->apiParas;
    }
}
