<?php

class ShopController extends Controller {
  
  /**
   * 返回搜索店铺数据
   */
  public function actionSearch() {
    $request = Yii::app()->getRequest();
    
    // 参数.
    $country = $request->getParam("country", 0);
    $city = $request->getParam("city", 0);
    $distinct = $request->getParam("distinct", 0);
    
    // 是否明星店铺
    $is_star_shop = $request->getParam("star", 0);
    
    // 构造查询
    $shopAr = new ShopAR();
    
    if ($country) {
      $shopAr->andSearch("country", $country);
    }
    if ($city) {
      $shopAr->andSearch("city", $city);
    }
    if ($distinct) {
      $shopAr->andSearch("distinct", $distinct);
    }
    
    if ($is_star_shop) {
      $shopAr->andSearch("star", ShopAR::SHOP_STAR);
    }
    
    $shopes = $shopAr->locateShop();
    // 测试IP
    $latlng = Yii::app()->ip->toLatlng("180.173.143.62");
    $lat = $latlng["x"];
    $lng = $latlng["y"];
    
    // 当前用户最近的店铺
    $min_distance_shop = FALSE;
    $min_distance = 0;
    foreach ($shopes as $shop_obj) {
      $distance = Yii::app()->ip->distance($shop_obj->lat, $shop_obj->lng, $lat, $lng);
      if ($min_distance == 0) {
        $min_distance = $distance;
      }
      if ($distance < $min_distance) {
        $min_distance = $distance;
        $min_distance_shop = $shop_obj;
      }
    }
    
    $this->responseJSON(array("shopes" => $shopAr->locateShop(), "min_distance_shop" => $min_distance_shop), "success");
  }
  
  /**
   * 返回系统所有的位置数组信息
   */
  public function actionLocation() {
    // [CN, US, UK ], [ [SHANGHAI, ], [Lundon, ], [New York, ]], [[Jingan, ], []]
    //  [CN, SHANGHAI, NANJING, TIANJIN, ]
    // [CN => [] , US => [], SHANGHAI => [JingAn, Pudong], ]
    $ret = array();
    global $language;
    $sql = "SELECT group_concat(country) as country_str FROM (SELECT country FROM shop WHERE language=:language GROUP BY country) AS country_table ";
    $country_str = Yii::app()->db->createCommand($sql)->query(array(":language" => $language))->read();
    $countries = explode(",", $country_str["country_str"]);
    $ret["country"] = $countries;
    
    // 城市
    $ret_cities = array();
    $cities_group = array();
    foreach ($countries as $country) {
      $sql = "SELECT group_concat(city) as city_str FROM (SELECT city FROM shop WHERE language=:language AND country = :country GROUP BY city) as city_table";
      $city_str = Yii::app()->db->createCommand($sql)->query(array(":country" => $country, ":language" => $language))->read();
      $cities = explode(",", $city_str["city_str"]);
      $cities_group = array_merge($cities, $cities_group);
      $ret_cities[$country] = $cities;
    }
    $ret["city"] = $ret_cities;
    
    // 区域
    $ret_distinct = array();
    $query = new CDbCriteria();
    $query->addCondition("language=:language");
    $query->params[":language"] = $language;
    $query->addCondition("`distinct` is not null");
    $all_shopes = ShopAR::model()->findAll($query);
    foreach ($all_shopes as $key => $shop) {
      $city = $shop->city;
      $distinct = $shop->distinct;
      if (trim($distinct)) {
        $ret_distinct[$city][$distinct] = $distinct;
      }
    }
    
    foreach ($ret_distinct as $city => $ret_distinct_t) {
      $ret_distinct[$city] = array_values($ret_distinct_t);
      if (!$ret_distinct_t || !array_shift($ret_distinct_t)) {
        unset($ret_distinct[$city]);
      }
    }
    
    $ret["distinct"] = $ret_distinct;
    
    // 获取当前用户的省份
    $city = Yii::app()->ip->toCity();
    $ret["user_city"] = $city;
    
    $this->responseJSON($ret, "success");
  }
  
  /**
   * 添加店
   */
  public function actionAdd() {
    $request = Yii::app()->getRequest();
    
    if ($request->isPostRequest) {
      $data = $_POST;
      if (isset($data["shop_id"]) && $data["shop_id"]) {
        $shop = ShopAR::model()->findByPk($data["shop_id"]);
      }
      else {
        $shop = new ShopAR();
      }
      $shop->setAttributes($data);
      
      if ($shop->shop_id) {
        $ret = $shop->update();
      }
      else {
        $ret = $shop->save();
      }
      
      $this->responseJSON($shop, "success");
    }
    else {
      $this->responseError("http verb error", ErrorAR::ERROR_HTTP_VERB_ERROR);
    }
  }
  
  /**
   * 店铺列表
   */
  public function actionIndex() {
    $request = Yii::app()->getRequest();
    
    if ($request->getRequestType() == "GET") {
      $shop_id = $request->getParam("shop_id");
      if ($shop_id) {
        $shop = ShopAR::model()->findByPk($shop_id);
        $this->responseJSON($shop, "success");
      }
      else {
        // 首先看分页查询
        $limit = $request->getParam("limit", FALSE);
        $offset = $request->getParam("offset", FALSE);

        // 店铺状态
        $status = $request->getParam("status", FALSE);

        $shop = new ShopAR();
        $rows = $shop->getList($status, $limit, $offset);

        $this->responseJSON($rows, "success");
      }
    }
    else {
      $this->responseError("http verb error", ErrorAR::ERROR_HTTP_VERB_ERROR);
    }
  }
  
  /**
   * 根据IP 地址查询所再省份店铺 
   * TODO:: 并且标出离自己最近的店铺
   */
  public function actionAround() {
    $request = Yii::app()->getRequest();
    
    // 测试IP
    $city = Yii::app()->ip->toCity("180.173.143.62");
    // city 要转换下， 比如 上海市 也可能是上海
    // 包含了市 则不需要处理，如果没有则需要加上市
    if (strpos($city, "市") === FALSE) {
      $city .= "市";
    }
    // 测试IP
    $latlng = Yii::app()->ip->toLatlng("180.173.143.62");
    $lat = $latlng["x"];
    $lng = $latlng["y"];
    
    // 当前用户所属城市的店铺
    $shop = new ShopAR();
    $shop->andSearch("city", $city);
    $city_shopes= $shop->locateShop();
    
    // 当前用户最近的店铺
    $min_distance_shop = FALSE;
    $min_distance = 0;
    foreach ($city_shopes as $shop_obj) {
      $distance = Yii::app()->ip->distance($shop_obj->lat, $shop_obj->lng, $lat, $lng);
      if ($min_distance == 0) {
        $min_distance = $distance;
      }
      if ($distance < $min_distance) {
        $min_distance = $distance;
        $min_distance_shop = $shop_obj;
      }
    }
    
    return $this->responseJSON(array("shopes" => $city_shopes, "min_distance_shop" => $min_distance_shop), "success");
    
  }
  
  public function actionDisable() {
    $request = Yii::app()->getRequest();
    
    $sid = $request->getParam("sid");
    if (!$sid) {
      return $this->responseError("http param error", ErrorAR::ERROR_MISSED_REQUIRED_PARAMS);
    }
    $shop = ShopAR::model()->findByPk($sid);
    
    if ($shop) {
      $shop->closeShop();
    }
    
    return $this->responseJSON("success", "success");
  }
}