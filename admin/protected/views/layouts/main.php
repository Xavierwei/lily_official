<!DOCTYPE html>
<html lang="en"  ng-app="adminModule">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.dataTables_themeroller.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />

	<title>Lily Office Admin Office</title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">Lily Office Admin Office</div>
	</div>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
    
	</div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/angular.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/scripts/script.js"></script>
</body>
</html>
