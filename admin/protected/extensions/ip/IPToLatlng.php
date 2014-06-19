<?php

class IPToLatlng extends CApplicationComponent {
  
  // 百度 ak
  private $ak = "ZuVRDtLTr1PXxz7g028BUPYL";
  private $api = "http://api.map.baidu.com/location/ip";
  private static $_ips = array();
  /**
   * 解析IP
   */
  public function parseIP($ip = NULL){
    if (!$ip) {
      $ip =CHttpRequest::getUserHostAddress();
    }
    
    if (isset(self::$_ips[$ip])) {
      return self::$_ips[$ip];
    }
    
		$ci = curl_init();
		/* Curl settings */
		curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ci, CURLOPT_ENCODING, "");
    
    $data = array(
        "ak" => $this->ak,
        "ip" => $ip,
        "coor" => "bd09ll",
    );
    $url = "{$this->api}?". http_build_query($data);
		curl_setopt($ci, CURLOPT_URL, $url);
		curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );
    
    $ret = curl_exec($ci);
    
    $parse = json_decode($ret, TRUE);
    
    self::$_ips[$ip] = $parse;
    
    return $parse;
  }
  
  /**
   * IP 转换坐标
   * @param type $ip
   */
  public function toLatlng($ip = NULL) {
    $parse = $this->parseIP($ip);
    return $parse["content"]["point"];
  }
  
  /**
   * IP 转换城市
   * @param type $ip
   * @return type
   */
  public function toCity($ip = NULL) {
    $parse = $this->parseIP($ip);
    return $parse["content"]["address_detail"]["city"];
  }
}
