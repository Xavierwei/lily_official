<?php
if (defined("LOADED_FUNCTION")) {
  return;
}
else {
  define("LOADED_FUNCTION", 1);
}
require_once("yii/yii.php");

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

