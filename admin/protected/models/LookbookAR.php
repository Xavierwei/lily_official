<?php

class LookBookAR extends ContentAR {
  public $type = "lookbook";
  
  public $look_book_image;
  
  public function getFields() {
    return array("look_book_image");
  }
  
  public static function model($class = __CLASS__) {
    return parent::model($class);
  }
  
  public function afterSave() {
    $mediaAr = new MediaAR();
    $mediaAr->saveMediaToObject($this, "look_book_image");
    return TRUE;
  }
  
  public function afterFind() {
    $mediaAr = new MediaAR();
    $mediaAr->attachMediaToObject($this, "look_book_image");
  }

  public function getAttributes($names = null) {
    $attributes = parent::getAttributes($names);
    $attributes["look_book_image"] = $this->look_book_image;
    
    return $attributes;
  }
}

