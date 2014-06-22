<div ng-controller="MilestoneForm" ng-init="init()">
  <form name="milestoneform" action="<?php echo Yii::app()->baseUrl ."/addmilestone"?>" method="post">
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Title")?></label>
      </div>
      <div class="controls">
        <input type="text" name="title" ng-model="milestone.title"  required />
        <p class="text-error" ng-show="milestoneform.title.$error.required">This field is required</p>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Body")?></label>
      </div>
      <div class="controls">
        <textarea name="body" ng-model="milestone.body"  required ></textarea>
        <p class="text-error" ng-show="milestoneform.body.$error.required">This field is required</p>
      </div>
    </div>
    <div class="control-group">
      <div class="conroles">
        <input type="button" ng-click="submitMilestone($event)" class="btn" value="<?php echo Yii::t("strings", "Submit")?>"/>
      </div>
    </div>
    <input type="hidden" name="cid" value="<?php echo $milestone ? $milestone->cid : 0?>" ng-model="milestone.cid" />
  </form>
</div>