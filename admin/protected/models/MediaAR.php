<?php


class MediaAR extends CActiveRecord {
  public static $allowTypes = array("png", "jpg", "jpeg", "bmp", "gif");
  
  public static function model($class= __CLASS__) {
    return parent::model($class);
  }
  
  public function tableName() {
    return "media";
  }
  
  public function primaryKey() {
    return "mid";
  }
  
  public function rules() {
    return array(
        array("mid,name,uri,cdate,mdate,type,cid, field_name", "safe"),
    );
  }
  
  /**
   * 判断上传文件是否符合要求
   * @param CUploadedFile $file
   */
  public static function isAllowed($file = NULL) {
    return "is Allowed";
    $type = $file->getType();
    $mimes = explode("/", $type);
    if (array_search($mimes[1], self::$allowTypes) === FALSE) {
      return FALSE;
    }
    
    //TODO::我们还需要判断大小要求
    return TRUE;
  }
  
  /**
   * 保存上传的媒体文件
   * @param CUploadedFile $file
   */
  public static function saveTo($file) {
    $ext = $file->getExtensionName();
    $uniqueFileName = md5(time(). "_". uniqid()).".". $ext;
    $saveTo = Yii::app()->params["uploadDir"]. "/". $uniqueFileName;
    if ($file->saveAs($saveTo)) {
       $root = dirname(Yii::app()->basePath);
       $uri = str_replace($root, "", $saveTo);
       return $uri;
    }
    else {
      return FALSE;
    }
  }
  
  public function beforeSave() {
    if ($this->isNewRecord) {
      $this->cdate = date("Y-m-d H:i:s");
    }
    $this->mdate = date("Y-m-d H:i:s");
    return TRUE;
  }
  
  /**
   * 给一个对象追加图片
   * @param CActiveRecord $obj 需要有图片的对象
   */
  public function saveMediaToObject($obj, $field_name) {
    $request = Yii::app()->getRequest();
    $uri = $request->getPost($field_name);
    $filePath = dirname(Yii::app()->basePath)."/". $uri;
    $name = pathinfo($filePath, PATHINFO_FILENAME);
    $ext = pathinfo($filePath, PATHINFO_EXTENSION);
    $attr = array(
        "name" => $name,
        "uri" => $uri,
        "cid" => $obj->getPrimaryKey(),
        "type" => $obj->type, 
        "field_name" => $field_name,
    );
        
    $this->setAttributes($attr);
    
    return $this->save();
  }
  
  /**
   * 给一个对象附件图片数据
   * @param CActiveRecord $obj 需要有图片的对象
   */
  public function attachMediaToObject(&$obj, $field_name) {
    $cid = $obj->getPrimaryKey();
    $type = $obj->type;
    $query = new CDbCriteria();
    $query->addCondition("type=:type")
      ->addCondition("field_name=:field_name")
      ->addCondition("cid=:cid");
    
    $query->params[":type"] = $type;
    $query->params[":field_name"] = $field_name;
    $query->params[":cid"] = $cid;
    
    $row = $this->find($query);
    if ($row) {
      $obj->{$field_name} = Yii::app()->getBaseUrl(TRUE). $row->uri;
    }
    else {
      $obj->{$field_name} = "";
    }
  }
}

