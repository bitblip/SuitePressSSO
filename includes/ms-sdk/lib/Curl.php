<?php

class Curl{
   
	public $url = '';
	public $method = 'post'; // post or get
	public $returnval = true;
	public $debug = false;
	public $header = ''; // array
	public $post = true; // true or false
	public $postdata='';
	
	public function init(){
		
		// cURL initilization 
		$curl = curl_init();

		// Use a proxy to fillder service requests.
		//$proxy = '127.0.0.1:8888';
		//curl_setopt($curl, CURLOPT_PROXY, $proxy);
		//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		
		$certPath = plugin_dir_path( dirname( __FILE__ ) ) . 'lib/mozilla.pem';;
		//$certPath = $_SERVER['DOCUMENT_ROOT'].'/ms_sdk/lib/mozilla.pem';
		
		curl_setopt($curl, CURLOPT_CAINFO, $certPath);
		
		// setting up the cURL URL
		$this->curlurl($curl);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, $this->returnval);
		$this->setheader($curl);
		curl_setopt ($curl, CURLOPT_POST, $this->post);
		// setting the postdata in the cURL that needs to be posted
		$this->curlpostdata($curl);

		$result= curl_exec($curl);
		
		// Show curl errors
        if($this->debug){
		    $response = curl_error($curl);
		    error_log($curl);
		    return $response;
		}
		curl_close ($curl);
		return $result;
	}
	
	private function curlpostdata($curl){
	
		$retpostdata = curl_setopt ($curl, CURLOPT_POSTFIELDS, $this->postdata);
		return $retpostdata;
	}
	private function curlurl($curl){
	
		$returl = curl_setopt ($curl, CURLOPT_URL, $this->url);
		return $returl;
	}
	
	// Set cURL headers
	private function setheader($curl){
	
		$retheader = curl_setopt($curl,CURLOPT_HTTPHEADER,$this->header);
		return $retheader;
	}
    
}
?>