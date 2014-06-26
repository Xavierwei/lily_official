<div class="" ng-controller="ContentForm" ng-init="init()">
  <form action="" class="form-horizontal" name="contentForm" method="POST" enctype="multipart/form-data">
    <div class="control-group">
      <div class="control-label">Title</div>
      <div class="controls">
        <input type="text" name="title" ng-model="content.title" required />
        <p class="error-text" ng-show="contentForm.title.$error.required">This field is required</p>
      </div>
    </div>
    
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Season")?></label>
      </div>
      <div class="controls">
        <input type="text" name="season" ng-model="content.season"  required />
        <p class="text-error" ng-show="contentForm.season.$error.required">This field is required</p>
      </div>
    </div>
    
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Language")?></label>
        <div class="controls">
          <select name="language" id="" ng-model="content.language" required>
            <option value="cn"><?php echo Yii::t("strings", "Chinese")?></option>
            <option value="en"><?php echo Yii::t("strings", "English")?></option>
          </select>
          <p class="text-error" ng-show="contentForm.language.$error.required">This field is required</p>
        </div>
      </div>
    </div>
    
    <input type="hidden" name="cid" value="<?php echo $lookbookGallery ? $lookbookGallery->cid: 0?>" ng-model="content.cid"/>
    <div class="control-group">
      <div class="controls">
        <input type="button" value="Submit" class="btn" ng-click="submitForm($event)"/>
      </div>
    </div>
  </form>
</div>