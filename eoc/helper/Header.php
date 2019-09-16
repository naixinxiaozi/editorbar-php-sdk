<?php
/**
 * @Author zhang
 */

class Header
{
    private $accept;

    private $date;

    private $signature_method;

    private $signature_nonce;

    private $signature_version;

    private $user_agent;

    private $content_md5;

    private $content_type;

    private $content_length;

    private $authorization;

    private $header = array();

    public function setAccept($accept)
    {
        $this->accept = $accept;
        $this->header["Accept"] = $accept;
    }

    public function getAccept()
    {
        return $this->accept;
    }

    public function setDate($date)
    {
        date_default_timezone_set('GMT');
        $date = date($date);
        $this->date = $date;
        $this->header["Date"] = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setSignatureMethod($signature_method)
    {
        $this->signature_method = $signature_method;
        $this->header["x-eb-signature-method"] = $signature_method;
    }

    public function getSignatureMethod()
    {
        return $this->signature_method;
    }

    public function setSignatureNonce($signature_nonce)
    {
        $signature_nonce = $this->getNonceStr($signature_nonce);
        $this->signature_nonce = $signature_nonce;
        $this->header["x-eb-signature-nonce"] = $signature_nonce;
    }

    public function getSignatureNonce()
    {
        return $this->signature_nonce;
    }

    public function setSignatureVersion($signature_version)
    {
        $this->signature_version = $signature_version;
        $this->header["x-eb-signature-version"] = $signature_version;
    }

    public function getSignatureVersion()
    {
        return $this->signature_version;
    }

    public function setUserAgent($user_agent)
    {
        $this->user_agent = $user_agent;
        $this->header["User-Agent"] = $user_agent;
    }

    public function getUserAgent()
    {
        return $this->user_agent;
    }

    public function setContentMd5($content_md5)
    {
        $content_md5 = base64_encode(md5($content_md5));
        $this->content_md5 = $content_md5;
        $this->header["Content-MD5"] = $content_md5;
    }

    public function getContentMd5()
    {
        return $this->content_md5;
    }

    public function setContentType($content_type)
    {
        $this->content_type = $content_type;
        $this->header["Content-Type"] = $content_type;
    }

    public function getContentType()
    {
        return $this->content_type;
    }

    public function setContentLength($content_length)
    {
        $this->content_length = $content_length;
        $this->header["Content-Length"] = $content_length;
    }

    public function getContentLength()
    {
        return $this->content_length;
    }

    public function setAuthorization($method,$suffixUrl,$secretKey,$appkey)
    {
        $str = $method . "\n";
        $str .= $this->getAccept() . "\n";
        if($method == 'POST'){
            $str .= $this->getContentMd5() . "\n";
            $str .= $this->getContentType() . "\n";
        }
        $str .= $this->getDate() . "\n";
        $str .= "x-eb-signature-method:". $this->getSignatureMethod() ."\n";
        $str .= "x-eb-signature-nonce:" . $this->getSignatureNonce() ."\n";
        $str .= "x-eb-signature-version:" . $this->getSignatureVersion() ."\n";
        $str .= $suffixUrl;
        $str = mb_convert_encoding($str, "UTF-8");
        $signature = base64_encode(hash_hmac("sha1", $str, $secretKey, true));
        $authorization =  "eb " . $appkey . ":" . $signature;
        $this->authorization = $authorization;
        $this->header["Authorization"] = $authorization;
    }

    public function getAuthorization()
    {
        return $this->authorization;
    }

    public function getHeader(){
        $data = array();
        if(!empty($this->header)){
            foreach ($this->header as $key => $value){
                $data[] = "{$key}: " . $value;
            }
            unset($key,$value);
        }
        return $data;
    }

    /**
     * @param int $length
     * @return string
     * @Author zhang
     * 生成干扰字符串
     */
    private function getNonceStr($length = 32){
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str ="";
        for ( $i = 0; $i < $length; $i++ )  {
            $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }
}