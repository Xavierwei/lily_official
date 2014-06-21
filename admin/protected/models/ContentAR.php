<?php

class ContentAR extends CActiveRecord {
  
  const STATUS_ENABLE = 1;
  const STATUS_DISABLE = 0;
  
  public $status = 1;
  
  public $meta;
  public function tableName() {
    return "content";
  }
  
  public function primaryKey() {
    return "cid";
  }
  
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }
  
  public function rules() {
    $fields = $this->getFields();
    $safe_attrs = "cid, body, summary, language, cdate, mdate, uid, status, weight, " . implode(",", $fields);
    return array(
        array("title, type", "required"),
        array($safe_attrs, "safe"),
    );
  }
  
  /**
   * 返回类型对应的 Field 列表
   * field 类型这样数据结构 array("field_1_name", "field_2_name", "field_3_name" )
   * @return type
   */
  public function getFields() {
    return array();
  }
  
  public function beforeSave() {
    if ($this->isNewRecord) {
      $this->cdate = date("Y-m-d H:i:s");
    }
    $this->mdate = date("Y-m-d H:i:s");
    
    return TRUE;
  }
  
  /**
   * 数据添加后添加Field 数据
   * @return type
   */
  public function afterSave() {
    $cid = $this->cid;
    
    $fields = $this->getFields();
    if (count($fields) <= 0 ) {
      return parent::afterSave();
    }
    // 添加 Field 数据
    foreach ($fields as $field) {
      $model = new FieldAR();
      
      $model->afterContentSave($this, $field);
    }
    
    return parent::afterSave();
  }
  
  public function __get($name) {
    $fields = $this->getFields();
    if ($fields && array_search($name, $fields) !== FALSE) {
      if ($this->cid) {
        $fieldAr = new FieldAR();
        $field = $fieldAr->getFieldInstance($this, $name);
        if ($field) {
          return $field->field_content;
        }
        else {
          return "";
        }
      }
      else {
        return "";
      }
    }
    return parent::__get($name);
  }

  public function beforeFind() {
      $fields = $this->getFields();
      if ($fields) {
        foreach ($fields as $field_name) {
          $fieldAr = new FieldAR();
          $field_instance = $fieldAr->getFieldInstance($this, $field_name);
          
          if ($field_instance) {
            
          }
          else {
            
          }
        }
      }
      return parent::beforeFind();
  }
  
  public function getList($limit = FALSE, $offset = FALSE) {
    $query = new CDbCriteria();
    
    if ($limit) {
      $query->limit = $limit;
    }
    if ($offset) {
      $query->offset = $offset;
    }
    
    $type = $this->type;
    
    if ($type) {
      $query->addCondition("type=:type", $type);
      $query->params[":type"] = $type;
    }
    
    $rows = $this->findAll($query);
    
    return $rows;
  }
  
  public function getAttributes($names = null) {
    $attributes = parent::getAttributes($names);
    $fields = $this->getFields();
    if ($fields) {
      foreach ($fields as $field_name) {
        $fieldAr = new FieldAR();
        $field_instance = $fieldAr->getFieldInstance($this, $field_name);
        if ($field_instance) {
          $attributes[$field_name] = $field_instance->field_content;
        }
        else {
          $attributes[$field_name] = "";
        }
      }
    }
    return $attributes;
  }
}

