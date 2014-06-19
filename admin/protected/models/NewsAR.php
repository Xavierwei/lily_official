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
  
  public function afterSave() {
    $mediaAr = new MediaAR();
    $mediaAr->saveMediaToObject($this, "thumbnail");
    return TRUE;
  }
  
  public function getAttributes($names = null) {
    $attributes = parent::getAttributes($names);
    $attributes["thumbnail"] = $this->thumbnail;
    
    return $attributes;
  }
  
}

