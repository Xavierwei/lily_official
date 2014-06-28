<?php
if (defined("LOADED_FUNCTION")) {
  return;
}
else {
  define("LOADED_FUNCTION", 1);
}

define("ROOT_PATH", dirname(__FILE__));

require_once(ROOT_PATH."/../admin/yii/yii.php");

$config = ROOT_PATH.'/../admin/protected/config/main.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

$app = Yii::createWebApplication($config);

$scriptUrl = Yii::app()->getRequest()->getScriptUrl();

$ret = Yii::app()->getRequest()->getBaseUrl();
Yii::app()->getRequest()->setBaseUrl($ret . "/admin");

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

global $language;
if (Yii::app()->language == "zh_cn") {
  $language = "cn";
}
else {
  $language = "en";
}

/**
 * 载入新闻
 */
function loadNews() {
  global $language;
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
  $query->params[":type"] = JobAR::model()->type;
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
  $lookbook = new LookbookGalleryAR();
  $gallery_list = $lookbook->getList();
  if (count($gallery_list)) {
    $gallery = array_shift($gallery_list);
    return array($gallery->season, $gallery->loadLookbookItem());
  }
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
  $list = $streehot->getList();
  
  return array_shift($list);
}

function loadMilestone() {
  $milestone = new MilestoneAR();
  $list =  $milestone->getList();
  return $list;
}

function searchNews() {
  $keyword = Yii::app()->getRequest()->getParam("keyword");
  $newsAr = new NewsAR();
  return $newsAr->searchWithKeyword($keyword);
}

function loadWeibo() {
  $cache = Yii::app()->cache->get("weibo_statues");
  if ($cache) {
    return $cache;
  }
  $api = Yii::app()->weibo->getApi();
  if (!$api) {
    return FALSE;
  }

  $token = Yii::app()->cache->get("token");

  $timeline = $api->user_timeline_by_id($token["uid"]);
  if ($timeline) {
    $statues = $timeline["statuses"];
    $first = array_shift($statues);
    Yii::app()->cache->set("weibo_statues", $first);
    return $first;
  }
  return FALSE;
}

function substring_utf8($str, $start, $length) {
  return mb_substr($str, $start, $length, "utf-8");
}

function set_page_title ($title = FALSE) {
  static $static_title;
  if ($title) {
    $static_title = $title;
  }
  
  return $static_title;
}