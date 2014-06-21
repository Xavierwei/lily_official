<?php
if (defined("LOADED_FUNCTION")) {
  return;
}
else {
  define("LOADED_FUNCTION", 1);
}
require_once("admin/yii/yii.php");

define("ROOT_PATH", dirname(__FILE__));

$config = ROOT_PATH.'/admin/protected/config/main.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

$app = Yii::createWebApplication($config);

/**
 * 载入新闻
 */
function loadNews() {
  $query = new CDbCriteria();
  $query->addCondition("status=:status");
  $query->params[":status"] = NewsAR::STATUS_ENABLE;
  
  $news = NewsAR::model()->findAll($query);
  
  return $news;
}

/**
 * 载入职位
 */
function loadJob($type = FALSE) {
  $query = new CDbCriteria();
  $query->addCondition("status=:status");
  $query->params[":status"] = JobAR::STATUS_ENABLE;
  
  if ($type) {
    $jobAr = new JobAR();
    $tableAlias = $jobAr->getTableAlias();
    $query->join = "left join field  on field.cid = ".$tableAlias.".cid AND field.field_name = 'job_type'";
    $query->addCondition("field_content=:field_content");
    $query->params[":field_content"] = $type;
  }
  
  return JobAR::model()->findAll($query);
}

/**
 * 
 * @return typeLookbook 列表
 */
function loadLookbook() {
  $lookbook = new LookBookAR();
  return $lookbook->getList();
}

/**
 * 生成一个缩略图路径
 * @param type $uri 文件路径
 * @param array $size 尺寸大小 , 第一个元素是 width, 第二个元素是height
 */
function thumbnail($uri, $size) {
  if (strpos($uri, "http://") !== FALSE) {
    $uri = str_replace(Yii::app()->getBaseUrl(TRUE), "", $uri);
  }
  
  $root = dirname(Yii::app()->basePath);
  $absPath = $root.$uri;
  
  $dir = pathinfo($absPath, PATHINFO_DIRNAME);
  $filename = pathinfo($absPath, PATHINFO_FILENAME);
  $ext = pathinfo($absPath, PATHINFO_EXTENSION);
  
  $newFilename = $filename."_".$size[0]. "_". $size[1]."_".$ext;
  
  $newAbspath = $dir.'/'. $newFilename;
  
  
  $uri = str_replace($root, "" ,$newAbspath);
  
  return Yii::app()->getBaseUrl(TRUE). $uri;
}


print thumbnail("http://lily.local/admin/upload/517f4c9082d81a0a9aae5da8c9aa3aa5.jpg", array(500, 500));