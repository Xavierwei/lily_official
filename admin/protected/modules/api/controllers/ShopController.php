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
      $shopAr->andSearch("type", ShopAR::TYPE_START);
    }
    
    $this->responseJSON($shopAr->locateShop(), "success");
  }
  
  /**
   * 返回系统所有的位置数组信息
   */
  public function actionLocation() {
    // [CN, US, UK ], [ [SHANGHAI, ], [Lundon, ], [New York, ]], [[Jingan, ], []]
    //  [CN, SHANGHAI, NANJING, TIANJIN, ]
    // [CN => [] , US => [], SHANGHAI => [JingAn, Pudong], ]
    $ret = array();
    $sql = "SELECT group_concat(country) as country_str FROM (SELECT country FROM shop GROUP BY country) AS country_table ";
    $country_str = Yii::app()->db->createCommand($sql)->query()->read();
    $countries = explode(",", $country_str["country_str"]);
    $ret["country"] = $countries;
    
    // 城市
    $ret_cities = array();
    $cities_group = array();
    foreach ($countries as $country) {
      $sql = "SELECT group_concat(city) as city_str FROM (SELECT city FROM shop WHERE country = :country GROUP BY city) as city_table";
      $city_str = Yii::app()->db->createCommand($sql)->query(array(":country" => $country))->read();
      $cities = explode(",", $city_str["city_str"]);
      $cities_group = array_merge($cities, $cities_group);
      $ret_cities[$country] = $cities;
    }
    $ret["city"] = $ret_cities;
    
    // 区域
    $ret_distinct = array();
    $query = new CDbCriteria();
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
    $this->responseJSON($ret, "success");
  }
  
  /**
   * 添加店
   */
  public function actionAdd() {
    $request = Yii::app()->getRequest();
    
    if ($request->isPostRequest) {
      $data = $_POST;
      $shop = new ShopAR();
      $shop->setAttributes($data);
      
      if ($shop->save()) {
        $this->responseJSON($shop, "success");
      }
      else {
        $this->responseError("validate failed", ErrorAR::ERROR_VALIDATE_FAILED, $shop->getErrors());
      }
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
      // 首先看分页查询
      $limit = $request->getParam("limit", FALSE);
      $offset = $request->getParam("offset", FALSE);
      
      // 店铺状态
      $status = $request->getParam("status", FALSE);
      
      $shop = new ShopAR();
      $rows = $shop->getList($status, $limit, $offset);
      
      $this->responseJSON($rows, "success");
    }
    else {
      $this->responseError("http verb error", ErrorAR::ERROR_HTTP_VERB_ERROR);
    }
  }
  
  /**
   * 根据IP 地址查询周围店铺
   */
  public function actionAround() {
    //TODO::
  }
}