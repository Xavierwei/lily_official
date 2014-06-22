<div class="row-fluid index-panel">
  <div class="wrapper">
    <div class="span4 index-panel-item index-panel-item-news">
      <a href="<?php echo Yii::app()->createUrl("page/addnews")?>"><?php echo Yii::t("strings", "Add News")?></a>
    </div>
    <div class="span4 index-panel-item index-panel-item-job">
      <a href="<?php echo Yii::app()->createUrl("page/addjob")?>"><?php echo Yii::t("strings", "Create New Job")?></a>
    </div>
    <div class="span4 index-panel-item index-panel-item-lookbook">
      <a href="<?php echo Yii::app()->createUrl("page/addlookbook")?>"><?php echo Yii::t("strings", "Create Lookbook")?></a>
    </div>
  </div>
</div>