<?php

class CurlUtil {
	protected $curlParams = array();
	protected $url='';
	protected $protocol = 'http';
	protected $get_param;
	protected $post_param;
	protected $response;
	protected $responseCode = '500';
	protected $response_array = array();
	protected $ssl_verify = true;
	protected $time_out = 10;
	protected $time_outed = false;
	protected $header = false;
	protected $header_size = 0;

	public function setURL($val){
		$this->url = $val;
	}

	public function getURL(){
		return $this->url;
	}


	public function setProtocol($val){
		$this->protocol = $val;
	}

	public function getProtocol(){
		return $this->protocol;
	}

	public function setSslVerify($val){
		$this->ssl_verify = $val;
	}

	public function getSslVerify(){
		return $this->ssl_verify;
	}

	public function setGetParam($val){
		$this->get_param = $val;
	}

	public function getGetParam(){
		return $this->get_param;
	}

	public function setPostParam($val){
		$this->post_param = $val;
	}

	public function getPostParam(){
		return $this->post_param;
	}

	public function setHeader($val=true){
		$this->header = $val;
	}

	public function getHeader(){
		if(!$this->header){
			return false;
		}

		return substr($this->response, 0, $this->header_size);
	}

	public function getBody(){
		return substr($this->response, $this->header_size);
	}

	public function setResponse($val){
		$this->response = $val;
	}

	public function getResponse(){
		return $this->response;
	}

	public function setResponseCode($val){
		$this->responseCode = (int)$val;
	}

	public function getResponseCode(){
		return $this->responseCode;
	}

	public function setTimeout($val){
		$this->time_out= $val;
	}

	public function getTimeout(){
		return $this->time_out;
	}

	public function setTimeouted($val){
		$this->time_outed= $val;
	}

	public function getTimeouted(){
		return $this->time_outed;
	}

	public function setCurlParams($key , $val){
		$this->curlParams[$key] = $val;
	}


	public function setProxy($url , $port , $user = '' , $password = ''){
		$this->setCurlParams("CURLOPT_PROXY", $url);
		$this->setCurlParams("CURLOPT_PROXYPORT", $port);
		if(strlen($user) & strlen($password)){
			$this->setCurlParams("CURLOPT_PROXYUSERPWD", "{$user}:{$password}");
		}
	}

	public function setFollowLocation($val , $maxredirs = 5){
		$this->setCurlParams("CURLOPT_FOLLOWLOCATION", $val);
		$this->setCurlParams("CURLOPT_MAXREDIRS", $maxredirs);
	}

	public function setEnableHeader($val){
		$this->setCurlParams("CURLOPT_HEADER", $val);
	}

	public function execute($header = false){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->getUrl() . $this->getGetParam());
		curl_setopt($curl, CURLOPT_TIMEOUT, $this->time_out);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);

		if($header){
			curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		}

		if($this->header){
			curl_setopt($curl, CURLOPT_HEADER, 1);
		}

		if(!$this->getSslVerify()){
			curl_setopt($curl,  CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl,  CURLOPT_SSL_VERIFYHOST, false);
		}

	  	if($postParam = $this->getPostParam()){
		  	curl_setopt($curl, CURLOPT_POST, TRUE);
		  	curl_setopt($curl, CURLOPT_POSTFIELDS, $postParam);
	  	}

		foreach($this->curlParams as $k=>$v){
			curl_setopt($curl, constant($k), $v);
		}

		$response = curl_exec($curl);
		$this->setResponse($response);

		$curlInfo = curl_getinfo($curl);
		if(!$curlInfo['http_code']){
			$this->setTimeouted(true);
			$ret = false;
		}else{
			$this->setResponseCode($curlInfo['http_code']);
			if($this->header){
				$this->header_size = $curlInfo['header_size'];
			}
			$ret = true;
		}
		curl_close($curl);
		return $ret;
	}

	public function add_get_param($key , $val){
	  if(! strlen($key)  ) return ;
	  $ret = $this->getGetParam();
	  if(strlen($ret) < 1){
		  $ret .= '?';
	  }else{
		  $ret .= '&';
	  }
	  $ret .= $key . '=' . rawurlencode($val);
	  $this->setGetParam($ret);
	  return true;
	}

	public function add_post_param($key , $val){
	  if(! strlen($key) or ! strlen($val) ) return ;
	  $ret = $this->getPostParam();
	  if(strlen($ret) < 1){
		  $ret .= '';
	  }else{
		  $ret .= '&';
	  }
	  $ret .= $key . '=' . rawurlencode($val);
	  $this->setPostParam($ret);
	  return true;
	}

	public function add_raw_Post($val){
	  $this->setPostParam($val);
	  return true;
	}


	public function setResponseValues($params){
		if(!$response = $this->getResponse()){
			return;
		}
		$xml = xml_parser_create();
		$vals = array();
		$index = array();
		xml_parse_into_struct($xml, $response, $vals, $index);
		xml_parser_free($xml);
		foreach($params as $k=>$v){
			$this->addResponseArray($v, $vals[$index[$v][0]]['value']);
		}

	}

	public function addResponseArray($key, $val){
		$this->response_array[$key] = $val;
	}

	public function getResponseValues($key){
		return $this->response_array[$key];
	}
}
?>