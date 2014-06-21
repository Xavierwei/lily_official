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
      <div class="control-label">Media</div>
      <div class="controls">
        <input type="file" name="media" accept="image/*" />
        <ul class="list" ng-repeat="media in media.look_book_image">
          <li class="upload-image-item"><img src="{{media}}" alt="" /></li>
        </ul>
        <div class="hidden" ng-repeat="uri in lookbook.look_book_image">
          <input type="hidden"  name="look_book_image[]" value="{{uri}}" ng-model="lookbook.look_book_image"/>
        </div>
      </div>
    </div>
    <input type="hidden" name="cid" value="<?php echo $lookbook ? $lookbook->cid: 0?>" ng-model="lookbook.cid"/>
    <div class="control-group">
      <div class="controls">
        <input type="button" value="Submit" class="btn" ng-click="submitLookbook($event)"/>
      </div>
    </div>
  </form>
</div>