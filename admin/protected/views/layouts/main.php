<!DOCTYPE HTML>
<html lang="en"  ng-app="adminModule">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.dataTables_themeroller.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />

	<title><?php echo Yii::t("strings", "Lily Office Admin Office")?></title>
  <script type="text/javascript">
    window.baseurl = "<?php echo Yii::app()->baseUrl?>";
  </script>
</head>

<body>

<div class="container-fluid" id="page">

	<div id="header">
		<div id="logo"><?php echo Yii::t("strings", "Lily Office Admin Office")?></div>

    <div class="lang-bar">
        <a href="javascript:void(0)" lang="en_us" class="lang_en">English</a>
        <a href="javascript:void(0)" lang="zh_cn" class="lang_cn">中文</a>
    </div>
	</div>
  
  <div id="sidebar" class="">
    <ul class="nav nav-list">
      <li class="nav-header">
        <em class="glyphicon glyphicon-shopping-cart"></em>
          <?php echo Yii::t("strings", "Shop Management")?>
      </li>
      <li><a class="<?php echo $this->getActiveClass("shop/index")?>" href="<?php echo Yii::app()->createUrl("shop/index")?>">Shop Table</a></li>
      <li><a class="<?php echo $this->getActiveClass("shop/add")?>" href="<?php echo Yii::app()->createUrl("shop/add")?>">Add Shop</a></li>
      <li class="nav-header"><em class="glyphicon glyphicon-user"></em><?php echo Yii::t("strings", "Job Management")?></li>
      <li><a class="<?php echo $this->getActiveClass("page/job")?>" href="<?php echo Yii::app()->createUrl("page/job")?>">Job Table</a></li>
      <li><a class="<?php echo $this->getActiveClass("page/addjob")?>" href="<?php echo Yii::app()->createUrl("page/addjob")?>">Add Job</a></li>
      <li class="nav-header"><em class="glyphicon glyphicon-eye-open"></em><?php echo Yii::t("strings", "Lookbook Management")?></li>
      <li><a class="<?php echo $this->getActiveClass("page/lookbookgallery")?>" href="<?php echo Yii::app()->createUrl("page/lookbookgallery")?>">Lookbook</a></li>
      <li><a class="<?php echo $this->getActiveClass("page/addlookbookgallery")?>" href="<?php echo Yii::app()->createUrl("page/addlookbookgallery")?>">Add Lookbook</a></li>
      <li class="nav-header"><em class="glyphicon glyphicon-heart"></em><?php echo Yii::t("strings", "Streethot Management")?></li>
      <li><a class="<?php echo $this->getActiveClass("page/streehot")?>" href="<?php echo Yii::app()->createUrl("page/streehot")?>">Streethot</a></li>
      <li><a class="<?php echo $this->getActiveClass("page/addstreehot")?>" href="<?php echo Yii::app()->createUrl("page/addstreehot")?>">Add Streehoot</a></li>
      <li class="nav-header"><em class="glyphicon glyphicon-list-alt"></em><?php echo Yii::t("strings", "Milestone Management")?></li>
      <li><a class="<?php echo $this->getActiveClass("page/milestone")?>" href="<?php echo Yii::app()->createUrl("page/milestone")?>">Milestone</a></li>
      <li><a class="<?php echo $this->getActiveClass("page/addmilestone")?>" href="<?php echo Yii::app()->createUrl("page/addmilestone")?>">Add Milestone</a></li>
      <li class="nav-header"><em class="glyphicon glyphicon-book"></em><?php echo Yii::t("strings", "News Management")?></li>
      <li><a class="<?php echo $this->getActiveClass("page/news")?>" href="<?php echo Yii::app()->createUrl("page/news")?>">News</a></li>
      <li><a class="<?php echo $this->getActiveClass("page/addnews")?>" href="<?php echo Yii::app()->createUrl("page/addnews")?>">Add News</a></li>
      <li><a href="<?php echo Yii::app()->createUrl("index/logout")?>"><?php echo Yii::t("strings", "Logout")?></a></li>
    </ul>
  </div>
  

  <?php if (UserAR::isLogin()) :?>
  <div id="body" class="row-fluid">
    <div id="content" class="span9"><?php echo $content; ?></div>
  </div>
  <?php else: ?>
    <div id="content" class="span9 offset3"><?php echo $content; ?></div>
  <?php endif;?>

	<div class="clear"></div>

<!--	<div id="footer">
	</div>-->
</div>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery_ui/js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/angular.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=ZuVRDtLTr1PXxz7g028BUPYL"></script>  
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/script.js"></script>
</body>
</html>
