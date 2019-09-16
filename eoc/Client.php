<?php
class Client
{
	public $appkey;

	public $secretKey;

	public $requestUrl = "http://link.113lab.com";

	public $accept = "application/json; charset=utf-8";

	public $contentType = "application/json; charset=utf-8";

	public $connectTimeout;

	public $readTimeout;

    public $checkRequest = true;

	protected $signMethod = "HMAC-SHA1";

	protected $apiVersion = "1.0";

	protected $sdkVersion = "eoc-sdk-php-20190907";

	public function getAppkey(){
		return $this->appkey;
	}

	public function __construct($appkey = "",$secretKey = ""){
		$this->appkey = $appkey;
		$this->secretKey = $secretKey ;
	}

	public function curl($url, $postFields, $suffixUrl,$fileFields,$method)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if ($this->readTimeout) {
			curl_setopt($ch, CURLOPT_TIMEOUT, $this->readTimeout);
		}
		if ($this->connectTimeout) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
		}
		curl_setopt ( $ch, CURLOPT_USERAGENT, "eoc-sdk-php" );
		//https 请求
		if(strlen($url) > 5 && strtolower(substr($url,0,5)) == "https" ) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}

		$header = new Header();
		$header->setAccept($this->accept);
		$header->setDate('D, d M Y H:i:s T');
		$header->setSignatureMethod($this->signMethod);
		$header->setSignatureNonce(32);
		$header->setSignatureVersion($this->apiVersion);
		$header->setUserAgent("Editorbar (Windows 10; amd64) PHP/7.3.0 editorbar-sdk/1.0.1 HTTPClient/ApacheHttpClient");

		if ($method == 'POST') {
		    if(count($fileFields) > 0){
                //生成分隔符
                $delimiter = '-------------' . uniqid();
                //先将post的普通数据生成主体字符串
                $data = '';

                //将上传的文件生成主体字符串
                if($fileFields != null){
                    foreach ($fileFields as $name => $file) {
                        $data .= "--" . $delimiter . "\r\n";
                        $data .= 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $file['name'] . "\" \r\n";
                        $data .= 'Content-Type: ' . $file['type'] . "\r\n\r\n";//多了个文档类型
                        $data .= $file['content'] . "\r\n";
                    }
                    unset($name,$file);
                }
                //主体结束的分隔符
                $data .= "--" . $delimiter . "--";
                curl_setopt($ch, CURLOPT_POST, true);

                $header->setContentMd5($data);
                $header->setContentType('multipart/form-data; boundary=' . $delimiter);
                $header->setContentLength(strlen($data));
                $header->setAuthorization("POST",$suffixUrl,$this->secretKey,$this->appkey);
                $header_data = $header->getHeader();
                curl_setopt($ch, CURLOPT_HTTPHEADER ,$header_data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }else{
                curl_setopt($ch, CURLOPT_POST, true);
                $post_json = json_encode($postFields);

                $header->setContentMd5($post_json);
                $header->setContentType($this->contentType);
                $header->setContentLength(strlen($post_json));
                $header->setAuthorization("POST",$suffixUrl,$this->secretKey,$this->appkey);
                $header_data = $header->getHeader();
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
                curl_setopt($ch,CURLOPT_HTTPHEADER,$header_data);
            }
		}elseif($method == 'GET'){
            $header->setAuthorization("GET",$suffixUrl,$this->secretKey,$this->appkey);
            $header_data = $header->getHeader();
            curl_setopt($ch,CURLOPT_HTTPHEADER,$header_data);
        }

		$response = curl_exec($ch);
		
		if (curl_errno($ch)) {
			throw new Exception(curl_error($ch),0);
		} else {
			$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if (200 !== $httpStatusCode) {
				throw new Exception($response,$httpStatusCode);
			}
		}
		curl_close($ch);
		return $response;
	}

	protected function logError($requestUrl, $apiParams, $errorCode, $responseTxt)
	{
		$localIp = isset($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : "CLI";
		$logger = new EocLog();
		$logger->conf["log_file"] = rtrim(EOC_LOG_DIR, '\\/') . '/' . "request/err_" . $this->appkey . "_" . date("Y-m-d") . ".log";
		$logger->conf["separator"] = PHP_EOL;
		$logData = array(
		date("Y-m-d H:i:s"),
        $requestUrl,
		$this->appkey,
		$localIp,
		PHP_OS,
		$this->sdkVersion,
        json_encode($apiParams),
		$errorCode,
		str_replace("\n","",$responseTxt)
		);
		$logger->log($logData);
	}

	public function execute($request, $buildUrl = false,$bestUrl = null)
	{
		if($this->checkRequest) {
			try {
				$request->check();
			} catch (Exception $e) {
				$result['code'] = $e->getCode();
				$result['msg'] = $e->getMessage();
				return $result;
			}
		}

		//获取业务参数
		$apiParams = $request->getApiParas();


		//系统参数放入GET请求串
		if($bestUrl){
			$requestUrl = $bestUrl . '/' . $request->getInterfaceAddress();
		}else{
			$requestUrl = $this->requestUrl . '/' . $request->getInterfaceAddress();
        }
        $suffixUrl = '/' . $request->getInterfaceAddress();


		$fileFields = array();
		foreach ($apiParams as $key => $value) {
			if(is_array($value) && array_key_exists('type',$value) && array_key_exists('content',$value) ){
				$fileFields[$key] = $value;
				unset($apiParams[$key]);
			}
        }

        if($buildUrl && !empty($apiParams)) {
            $requestUrl .= '?';
            $suffixUrl .= '?';
            foreach ($apiParams as $apiParamsKey => $apiParamsValue) {
                $requestUrl .= "$apiParamsKey=" . $apiParamsValue . "&";
                $suffixUrl .= "$apiParamsKey=" . $apiParamsValue . "&";
            }
            $requestUrl = substr($requestUrl, 0, -1);
            $suffixUrl = substr($suffixUrl, 0, -1);
        }

        //发起HTTP请求
		try {
            $resp = $this->curl($requestUrl, $apiParams,$suffixUrl,$fileFields,$request->getApiMethodName());
		} catch (Exception $e) {
			EOC_LOG_ON && $this->logError($requestUrl,$apiParams,"HTTP_ERROR_" . $e->getCode(),$e->getMessage());
			$result['code'] = $e->getCode();
			$result['msg'] = $e->getMessage();
			return $result;
		}
		unset($apiParams);
		unset($fileFields);

        $response = $resp;
		if($request->isNeedConvert){
		    if($request->format == 'json'){
                $response = json_decode($resp,true);
            }
        }

		if (!empty($response) && !empty($response['code'])) {
			$logger = new EocLog();
            $logger->conf["log_file"] = rtrim(EOC_LOG_DIR, '\\/') . '/' . "response/err_" . $this->appkey . "_" . date("Y-m-d") . ".log";
            $logger->conf["separator"] = PHP_EOL;
			$logger->log(array(
				date("Y-m-d H:i:s"),
                $requestUrl,
                $this->appkey,
                $this->sdkVersion
			));
		}
		return $response;
	}

}
