<div ng-controller="NewsForm" ng-init="init()">
  <form name="newsform" action="<?php echo Yii::app()->baseUrl ."/addform"?>" method="post">
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Title")?></label>
      </div>
      <div class="controls">
        <input type="text" name="title" ng-model="news.title"  required />
        <p class="text-error" ng-show="news.title.$error.required">This field is required</p>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Body")?></label>
      </div>
      <div class="controls">
        <textarea class="row-fluid ckeditor" name="body" ng-model="news.body"  cols="50" rows="10"></textarea>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Language")?></label>
        <div class="controls">
          <select name="language" id="" ng-model="news.language" required>
            <option value="cn"><?php echo Yii::t("strings", "Chinese")?></option>
            <option value="en"><?php echo Yii::t("strings", "English")?></option>
          </select>
          <p class="text-error" ng-show="shopform.language.$error.required">This field is required</p>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Master Image")?></label>
      </div>
      <div class="conroles clearfix">
        <input type="file" name="media" accept="image/*"/>
        <li class="upload-image-item"><img src="{{media.image}}" alt="" /></li>
          <input type="hidden" name="master_image[]" value="{{news.thumbnail}}" ng-model="news.thumbnail"/>
      </div>
    </div>
    <div class="control-group">
      <div class="conroles">
        <input type="button" ng-click="submitNews($event)" class="btn" value="<?php echo Yii::t("strings", "Submit")?>"/>
      </div>
    </div>
    <input type="hidden" name="cid" value="<?php echo $news ? $news->cid : 0?>" ng-model="news.cid" />
  </form>
</div>