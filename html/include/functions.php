<?php
if (defined("LOADED_FUNCTION")) {
  return;
}
else {
  define("LOADED_FUNCTION", 1);
}
require_once("../admin/yii/yii.php");

define("ROOT_PATH", dirname(__FILE__));

$config = ROOT_PATH.'/../admin/protected/config/main.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

$app = Yii::createWebApplication($config);

// 获取语言
$cookies = Yii::app()->request->cookies;
$lang = $cookies["lang"];
if ($lang) {
  Yii::app()->language = (string)$lang;
}
else {
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
      $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
      if ($lang == "zh") {
        Yii::app()->language = "zh_cn";
      }
      else {
        Yii::app()->language = "en_us";
      }
    }
}

/**
 * 载入新闻
 */
function loadNews() {
  $news = NewsAR::model()->getList();
  return $news;
}

/**
 * 载入新闻
 */
function loadFirstNews() {
  global $language;
  $query = new CDbCriteria();
  
  // 状态
  $query->addCondition("status=:status");
  $query->params[":status"] = NewsAR::STATUS_ENABLE;
  // 内容类型
  $query->addCondition("type=:type");
  $query->params[":type"] = NewsAR::model()->type;
  //多语言
  $query->addCondition("language=:language");
  $query->params[":language"] = $language;
  
  // 排序
  $query->order = "cdate DESC";
  
  $news = NewsAR::model()->find($query);
  return $news;
}

/**
 * 载入职位
 */
function loadJob($type = FALSE) {
  
  global $language;
  $query = new CDbCriteria();
  $query->addCondition("status=:status");
  $query->params[":status"] = JobAR::STATUS_ENABLE;
  $query->addCondition("type=:type");
  $query->params[":type"] = NewsAR::model()->type;
    //多语言
  $query->addCondition("language=:language");
  $query->params[":language"] = $language;
  
  
  
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

function loadStreehot() {
  $streehot = new StreehotAR();
  return $streehot->getList();
}

function loadMilestone() {
  $milestone = new MilestoneAR();
  return $milestone->getList();
}
function searchNews() {
  $keyword = Yii::app()->getRequest()->getParam("keyword");
  $newsAr = new NewsAR();
  return $newsAr->searchWithKeyword($keyword);
}
