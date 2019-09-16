<?php
/**
 * 文件上传
 * @Author zhang
 */

class EocUploadFileRequest
{

    /**
     * 用户标识
     **/
    private $identifier;

    /**
     * 文件
     */
    private $file;

    private $apiParas = array();

    public $format = "json";

    public $isNeedConvert = true;

    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        $this->apiParas["identifier"] = $identifier;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function setFile($file)
    {
        $this->file = $file;
        $this->apiParas["file"] = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getApiMethodName(){
        return "POST";
    }

    public function getInterfaceAddress(){
        return "uploadFile";
    }

    public function check(){
        EocCheckRequest::checkNotNull($this->identifier,'identifier');
        EocCheckRequest::checkNotNull($this->file,'file');
    }

    public function getApiParas(){
        return $this->apiParas;
    }
}