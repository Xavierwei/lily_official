<div class="" ng-controller="LookbookForm" ng-init="init()">
  <form action="" class="form-horizontal" name="lookbookform" method="POST" enctype="multipart/form-data">
    <div class="control-group">
      <div class="control-label">Title</div>
      <div class="controls">
        <input type="text" name="title" ng-model="lookbook.title" required />
        <p class="error-text" ng-show="lookbookform.title.$error.required">This field is required</p>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label"></div>
      <div class="controls">
        <div id="file_dropzone">
          <span><?php echo Yii::t("strings", "drag image here")?></span>
        </div>
        <ul class="list clearfix" id="imagesUpload">
          <li class="upload-image-item" ng-repeat="media in lookbook.look_book_image">
            <div class="position" data-index="{{$index}}">
              <img src="{{media}}" alt="" />
              <a href="javascript:void(0)" ng-click="removeSelectedMedia($index)"><em class="glyphicon glyphicon-remove"></em><?php echo Yii::t("strings" ,"cancel")?></a>
            </div>
          </li>
        </ul>
        
        <div class="hidden" ng-repeat="uri in lookbook.look_book_image">
          <input type="hidden"  name="look_book_image[]" value="{{uri}}" ng-model="lookbook.look_book_image"/>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="control-label">
        <label for=""><?php echo Yii::t("strings", "Language")?></label>
        <div class="controls">
          <select name="language" id="" ng-model="lookbook.language" required>
            <option value="cn"><?php echo Yii::t("strings", "Chinese")?></option>
            <option value="en"><?php echo Yii::t("strings", "English")?></option>
          </select>
          <p class="text-error" ng-show="shopform.language.$error.required">This field is required</p>
        </div>
      </div>
    </div>
    
    <input type="hidden" name="lookbook_gallery" value="<?php echo $gallery->cid?>" ng-model="lookbook.lookbook_gallery"/>
    <input type="hidden" name="cid" value="<?php echo $lookbook ? $lookbook->cid: 0?>" ng-model="lookbook.cid"/>
    <div class="control-group">
      <div class="controls">
        <input type="button" value="Submit" class="btn" ng-click="submitLookbook($event)"/>
      </div>
    </div>
  </form>
</div>