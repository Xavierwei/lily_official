<div class="" ng-controller="ShopForm" ng-init="init()">
  <div class="">
    <form name="shopform" class="form-horizontal" action="<?php echo Yii::app()->baseUrl ?>/shop/add" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend><?php echo ($shop) ? Yii::t("strings", "Edit Shop").' <span class="divider"> - </span> '.$shop->title : Yii::t("strings", "Shop") ?></legend>
        
        <div class="control-group">
          <label class="control-label" for=""><?php echo Yii::t("strings", "Location") ?></label>
          <div class="controls">
            <select name="country" ng-change="countryChange()" id="" ng-model="shop.country" required ng-options="c for c in country">
              <option value="">--<?php echo Yii::t("strings", "Choose Country")?>--</option>
            </select>
            <select name="city" id="" ng-change="cityChange()" ng-model="shop.city" required ng-options="c for c in country_city">
              <option value="">--<?php echo Yii::t("strings", "Choose City")?>--</option>
            </select>
            <select name="distinct" id="" ng-model="shop.distinct" required ng-options="c for c in city_distinct">
              <option value="">--<?php echo Yii::t("strings", "Choose District")?>--</option>
            </select>
            <p class="text-error" ng-show="shopform.distinct.$error.required || shopform.city.$error.required || shopform.country.$error.required ">This field is required</p>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for=""><?php echo Yii::t("strings", "Title") ?></label>
          <div class="controls">
            <input type="text" name="title" ng-model="shop.title" required/>
            <p class="text-error" ng-show="shopform.title.$error.required">This field is required</p>
          </div>
        </div>
        
        <div class="control-group">
        <label class="control-label" for=""><?php echo Yii::t("strings", "Address") ?></label>
        <div class="controls">
          <input type="text" name="address" ng-model="shop.address" required/>
          <p class="text-error" ng-show="shopform.address.$error.required">Please input address</p>
        </div>
        </div>
        
        <div class="control-group">
        <label class="control-label" for=""><?php echo Yii::t("strings", "Phone") ?></label>
        <div class="controls">
          <input type="text" name="phone" ng-model="shop.phone" />
          <p class="text-error" ng-show="shopform.phone.$error.required">Please input phone</p>
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
          <div class="control-label">
            <label for=""><?php echo Yii::t("strings", "Star")?></label>
            <div class="controls">
              <select name="language" id="" ng-model="shop.star">
                <option value="0"><?php echo Yii::t("strings", "No")?></option>
                <option value="1"><?php echo Yii::t("strings", "Yes")?></option>
              </select>
              <p class="text-error" ng-show="shopform.language.$error.required">This field is required</p>
            </div>
          </div>
        </div>
        
        <div class="control-group">
          <label for="" class="control-label">Lat/ Lng</label>
          <div class="controls">
            <input type="text" name="lat" ng-model="shop.lat" required/>
            <input type="text" name="lng" ng-model="shop.lng" required/>
            <p class="text-error" ng-show="shopform.lat.$error.required">Please use map to select (latitude longitude)</p>
          </div>
        </div>
          
      </fieldset>
      
      <fieldset class="fieldset-section form-inline">
        <legend ng-click="showToggle($event)">Map</legend>
        <span class="show-toggle" ng-click="showToggle($event)">Show</span>
        <div class="control-group hideme">
          <div id="shop-map"></div>shop_star_image
        </div>
      </fieldset>
      
      <fieldset class="fieldset-section form-inline">
        <legend ng-click="showToggle($event)">Media</legend>
        <span class="show-toggle" ng-click="showToggle($event)">Show</span>
        <div class="control-group hideme">
          <label for="">Image</label>
          <input type="file" accept="image/*" name="to_shop_image"/>
          <ul class="showUploaded" ng-repeat="item in image.items">
            <li class="upload-image-item">
              <img src="{{item.src}}" alt="" />
              <a href="javascript:void(0)" ng-click="removeUploadItem($event)">Delete</a>
            </li>
          </ul>
            <input type="hidden" name="shop_star_image" ng-model="shop.shop_star_image"/>
        </div>
      </fieldset>
      
      <input type="hidden" name="shop_id" value="<?php echo $shop ? $shop->shop_id : ""?>"/>

      <div class="control-group">
        <input type="button" class="btn" ng-click="addShop(shop)" value="<?php echo Yii::t("strings", "Submit") ?>"/> 
      </div>
    </form>
  </div></div>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=ZuVRDtLTr1PXxz7g028BUPYL"></script> 
