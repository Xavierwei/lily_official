<?php

class MilestoneAR extends ContentAR {
  public $type = "milestone";
  
  public function getFields() {
    return array();
  }
  
  public static function model($class = __CLASS__) {
    return parent::model($class);
  }
  
  public function afterSave() {
    return TRUE;
  }
  
  public function afterFind() {
  }

  public function getAttributes($names = null) {
    $attributes = parent::getAttributes($names);
    
    return $attributes;
  }
}

