<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>VCCMS version 3.0 (Powered by Ted)</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<?php Yii::app()->getClientScript()->registerScriptFile(yii::app()->baseUrl."/style/admin/script/jquery.min.js");?>
<?php Yii::app()->getClientScript()->registerScriptFile(yii::app()->baseUrl."/style/admin/script/admin.js");?>
<?php Yii::app()->getClientScript()->registerCssFile(yii::app()->baseUrl."/style/admin/admin.css");?>
</head>
<frameset rows="72,*" cols="*" frameborder="0" border="0" framespacing="0">
	<frame src="<?php echo Yii::app()->createUrl('admin/home/header');?>" frameborder="0" name="headFrame" scrolling="no" noresize>
	<frameset cols="191,*" frameborder="0" border="0" framespacing="0">
		<frame src="<?php echo Yii::app()->createUrl('admin/home/sidebar');?>" frameborder="0" name="sidebarFrame" scrolling="no" noresize>
		<frame src="<?php echo Yii::app()->createUrl('admin/home/content');?>" frameborder="0" name="contentFrame">
	</frameset>
	<noframes>
	<body>
		<p></p>
	</body>
	</noframes>
</frameset>
</html>