<?php

Yii::import("application.models.ContentAR");
/**
 * 招聘 , 继承 ContentAR 
 */
class NewsAR extends ContentAR {
  
  public $type = "news";
  
  // 发布状态
  public $status = 1;
  
  // thumbnail media 字段
  public $thumbnail;
  
  /**
   * 返回Job 对应的Field
   */
  public function getFields() {
    // array(招聘人数, 招聘类型),
    return array();
  }
  
  public static function model($class = __CLASS__) {
    return parent::model($class);
  }
  
  public function afterSave() {
    $mediaAr = new MediaAR();
    $mediaAr->saveMediaToObject($this, "thumbnail");
    return TRUE;
  }
  
  public function afterFind() {
    $mediaAr = new MediaAR();
    $mediaAr->attachMediaToObject($this, "thumbnail");
  }


  public function getAttributes($names = null) {
    $attributes = parent::getAttributes($names);
    $attributes["thumbnail"] = $this->thumbnail;
    
    return $attributes;
  }
  
  public function searchWithKeyword($keyword) {
//    $query = new CDbCriteria();
//    $query->addSearchCondition("title", "%".$keyword.'%', TRUE, "OR");
//    $query->addSearchCondition("body", "%".$keyword.'%', TRUE, "OR");
//    $query->addCondition("type=:type");
//    $query->params[":type"] = $this->type;
    
    $command = Yii::app()->db->createCommand();
    $command->select("*")
            ->from("content")
            ->where("type=:type AND ( title like binary :keyword OR body like binary :keyword )", 
                    array(":type" => $this->type, ":keyword" => "%".$keyword."%"));
    
    $rows = $command->queryAll();
    
    return $rows;
  }
  
}

