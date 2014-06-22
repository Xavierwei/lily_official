<div ng-controller="StreehotForm" ng-init="init()">
  <form name="streehotform" action="<?php echo Yii::app()->baseUrl ."/addstreehot"?>" method="post">
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Title")?></label>
      </div>
      <div class="controls">
        <input type="text" name="title" ng-model="streehot.title"  required />
        <p class="text-error" ng-show="streehotform.title.$error.required">This field is required</p>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Media")?></label>
      </div>
      <div class="conroles">
        <input type="file" name="media" accept="image/*"/>
        <ul class="list" ng-repeat="image in media.image">
         <li class="upload-image-item"><img src="{{image}}" alt="" /></li>
        </ul>
        <div ng-repeat="media in streehot.streehot_image">
          <input type="hidden" name="streehot_image[]" value="{{media}}" ng-model="streehot.streehot_image"/>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Language")?></label>
        <div class="controls">
          <select name="language" id="" ng-model="shop.language" required>
            <option value="cn"><?php echo Yii::t("strings", "Chinese")?></option>
            <option value="en"><?php echo Yii::t("strings", "English")?></option>
          </select>
          <p class="text-error" ng-show="shopform.language.$error.required">This field is required</p>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="conroles">
        <input type="button" ng-click="submitStreehot($event)" class="btn" value="<?php echo Yii::t("strings", "Submit")?>"/>
      </div>
    </div>
    <input type="hidden" name="cid" value="<?php echo $streehot ? $streehot->cid : 0?>" ng-model="streehot.cid" />
  </form>
</div>