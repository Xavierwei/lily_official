<div ng-controller="JobForm" ng-init="init()">
  <form name="jobform" action="<?php echo Yii::app()->baseUrl ."/addmilestone"?>" method="post">
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Title")?></label>
      </div>
      <div class="controls">
        <input type="text" name="title" ng-model="job.title"  required />
        <p class="text-error" ng-show="milestoneform.title.$error.required">This field is required</p>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Job Requirement")?></label>
      </div>
      <div class="controls">
        <textarea name="body" ng-model="job.body" cols="50" rows="10" class="span8" required ></textarea>
        <p class="text-error" ng-show="job.body.$error.required">This field is required</p>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "People")?></label>
      </div>
      <div class="controls">
        <input type="input" ng-model="job.job_people_number"  name="job_people_number" required />
        <p class="text-info">0 means no limit</p>
        <p class="text-error" ng-show="job.job_people_number.$error.required">This field is required</p>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Type")?></label>
      </div>
      <div class="controls">
        <select name="job_type" ng-model="job.job_type" required ng-options="job_type_label for job_type in job.job_types">
          <option value="<?php echo JobAR::JOB_TYPE_SOCIAL?>"><?php echo Yii::t("strings", "Social")?></option>
          <option value="<?php echo JobAR::JOB_TYPE_SCHOOL?>"><?php echo Yii::t("strings", "School")?></option>
        </select>
        <p class="text-error" ng-show="job.job_type.$error.required">This field is required</p>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Language")?></label>
        <div class="controls">
          <select name="language" id="" ng-model="job.language" required>
            <option value="cn"><?php echo Yii::t("strings", "Chinese")?></option>
            <option value="en"><?php echo Yii::t("strings", "English")?></option>
          </select>
          <p class="text-error" ng-show="shopform.language.$error.required">This field is required</p>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="conroles">
        <input type="button" ng-click="submitJob($event)" class="btn" value="<?php echo Yii::t("strings", "Submit")?>"/>
      </div>
    </div>
    <input type="hidden" name="cid" value="<?php echo $job ? $job->cid : 0?>" ng-model="job.cid" />
  </form>
</div>