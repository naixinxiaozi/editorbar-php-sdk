<?php
/**
 * 下载文件
 * @author zhang
 */
class EocDownloadFileRequest
{
    private $identifier;

    private $url;

    private $apiParas = array();

    public $format = "file";

    public $isNeedConvert = false;

    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        $this->apiParas["identifier"] = $identifier;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        $this->apiParas["url"] = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getApiMethodName(){
        return "GET";
    }

	public function getInterfaceAddress(){
		return "download";
	}


    public function check(){
        EocCheckRequest::checkNotNull($this->identifier,'identifier');
        EocCheckRequest::checkNotNull($this->url,'url');
    }

    public function getApiParas(){
        return $this->apiParas;
    }
}
