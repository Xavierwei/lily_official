<?php

class StreehotAR extends ContentAR {
  public $type = "streehot";
  
  public $streehot_image;
  
  public $season;
  
  public function getFields() {
    return array("season");
  }
  
  public static function model($class = __CLASS__) {
    return parent::model($class);
  }
  
  public function afterSave() {
    parent::afterSave();
    $mediaAr = new MediaAR();
    $mediaAr->saveMediaToObject($this, "streehot_image");
    return TRUE;
  }
  
  public function afterFind() {
    parent::afterFind();
    $mediaAr = new MediaAR();
    $mediaAr->attachMediaToObject($this, "streehot_image");
  }

  public function getAttributes($names = null) {
    $attributes = parent::getAttributes($names);
    $attributes["streehot_image"] = $this->streehot_image;
    
    return $attributes;
  }
}

