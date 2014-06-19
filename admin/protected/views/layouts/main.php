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

	<title>Lily Office Admin Office</title>
</head>

<body>

<div class="container-fluid" id="page">

	<div id="header">
		<div id="logo">Lily Office Admin Office</div>
	</div>
  
  <div id="bar">
    <?php  $this->widget("Breadcrumb", array("links" => array("<a href='#'>Shop</a>", "<a href='#'>Add Shop</a>")))?>
  </div>
  
  <div id="body" class="row-fluid">
    <div id="sidebar" class="span3">
      <ul class="nav nav-list">
        <li class="nav-header">Shop Management</li>
        <li><a href="<?php echo Yii::app()->createUrl("shop/index")?>">Shop Table</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("shop/add")?>">Add Shop</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("shop/star")?>">Star Shop</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("shop/delete")?>">Offline Shop</a></li>
        <li class="nav-header">Job Management</li>
        <li><a href="<?php echo Yii::app()->createUrl("job/index")?>">Job Table</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("job/add")?>">Add Job</a></li>
        <li class="nav-header">Page Management</li>
        <li><a href="<?php echo Yii::app()->createUrl("page/milestone")?>">MileStone</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("page/lookbook")?>">Lookbook</a></li>
      </ul>
    </div>
    <div id="content" class="span9"><?php echo $content; ?></div>
  </div>

	<div class="clear"></div>

	<div id="footer">
    
	</div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery_ui/js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/angular.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?type=quick&ak=ZuVRDtLTr1PXxz7g028BUPYL&v=1.0"></script>  
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/script.js"></script>
</body>
</html>
