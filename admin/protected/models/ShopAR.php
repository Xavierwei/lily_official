<?php

class ShopAR extends CActiveRecord {
  public function tableName() {
    return "shop";
  }
  
  public function primaryKey() {
    return "shop_id";
  }
  
  public static function model($class = __CLASS__) {
    return parent::model($class);
  }
  
  public function beforeSave() {
    if ($this->isNewRecord) {
      $this->cdate = date("Y-m-d H:i:s");
    }
    $this->mdate = date("Y-m-d H:i:s");
    return TRUE;
  }
  
  /**
   * 添加搜索条件
   * @staticvar type $search_values
   * @param type $key
   * @param type $val
   * @return array
   */
  public function andSearch($key = "", $val = "") {
    static $search_values;
    if (!is_array($search_values)) {
      $search_values = array();
    }
    if (!$key) {
      return $search_values;
    }
    $search_values[$key] = $val;
    
    return $search_values;
  }
  
  /**
   * 用搜索条件查找店铺
   * @param type $search
   */
  public function locateShop($search = NULL) {
    if (!$search) {
      $search = $this->andSearch();
    }
    
    //暂时搜索条件只支持 国家 / 城市 / 区 
    $query = new CDbCriteria();
    if (isset($search["country"])) {
      $query->addCondition("country=:country");
      $query->params[":country"] = $search["country"];
    }
    if (isset($search["city"])) {
      $query->addCondition("city=:city");
      $query->params[":city"] = $search["city"];
    }
    if (isset($search["distinct"])) {
      $query->addCondition("distinct=:distinct");
      $query->params[":distinct"] = $search["distinct"];
    }
    
    $rows = $this->findAll($query);
    
    // 允许其他方法修改查询结果
    if (method_exists($this, "beforeSearch")) {
      $this->beforeSearch($rows);
    }
    
    // 最后返回结果
    return $rows;
  }
}
