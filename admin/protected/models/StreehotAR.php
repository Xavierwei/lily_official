<?php

class StreehotAR extends ContentAR {
  public $type = "streehot";
  
  public $streehot_image;
  
  public function getFields() {
    return array("streehot_image");
  }
  
  public static function model($class = __CLASS__) {
    return parent::model($class);
  }
  
  public function afterSave() {
    $mediaAr = new MediaAR();
    $mediaAr->saveMediaToObject($this, "streehot_image");
    return TRUE;
  }
  
  public function afterFind() {
    $mediaAr = new MediaAR();
    $mediaAr->attachMediaToObject($this, "streehot_image");
  }

  public function getAttributes($names = null) {
    $attributes = parent::getAttributes($names);
    $attributes["streehot_image"] = $this->streehot_image;
    
    return $attributes;
  }
}

