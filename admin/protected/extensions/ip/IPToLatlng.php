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
    
    if ($parse && $parse["status"] == 0) {
      return $parse["content"]["point"];
    }
    // 默认是0
    return array("x"=> 0, "y" => 0);
  }
  
  /**
   * IP 转换城市
   * @param type $ip
   * @return type
   */
  public function toCity($ip = NULL) {
    $parse = $this->parseIP($ip);
    if ($parse && $parse["status"] == 0) {
      return $parse["content"]["address_detail"]["city"];
    }
    // 默认是上海市
    else {
      return "上海市";
    }
  }
  
function distance($lat1, $lon1, $lat2, $lon2) {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    
    return ($miles * 1.609344);
  }

}
