<?php

class LookbookGalleryAR extends ContentAR {
  public $type = "lookbook_gallery";
  
  public $season;
  
  public static function model($class = __CLASS__) {
    return parent::model($class);
  }
  
  public function getFields() {
    $fields = parent::getFields();
    $fields[] = "season";
    
    return $fields;
  }
  
  public function loadLookbookItem($cid = FALSE) {
    if (!$cid) {
      $cid = $this->cid;
    }
    
    $lookbookAr = new LookbookAR();
    $sql = "SELECT * FROM field WHERE field_name='lookbook_gallery' AND field_content=:field_content";
    $command = Yii::app()->db->createCommand($sql);
    $command->params[":field_content"] = $cid;
    
    $rows = $command->queryAll();
    
    $cids = array();
    
    foreach ($rows as $row ){
      $cids[] = $row["cid"];
    }
    
    $query = new CDbCriteria();
    $query->addInCondition("cid", $cids);
    return $lookbookAr->findAll($query);
  }
}

