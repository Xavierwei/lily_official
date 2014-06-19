<div class="" ng-controller="ShopForm">
  <div class="">
    <form name="shopform" class="form-horizontal" action="<?php echo Yii::app()->baseUrl ?>/shop/add" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend><?php echo Yii::t("strings", "Shop") ?></legend>
        
        <div class="control-group">
          <label class="control-label" for=""><?php echo Yii::t("strings", "Location") ?></label>
          <div class="controls">
            <select name="country" id="" ng-model="shop.country" required>
              <option value="cn">China</option>
            </select>
            <select name="city" id="" ng-model="shop.city">
              <option value="shanghai">Shanghai</option>
            </select>
            <select name="distinct" id="" ng-model="shop.distinct">
              <option value="jingan"><?php echo Yii::t("strings", "Jing An Distinct") ?></option>
            </select>
          </div>

        </div>

        <div class="control-group">
          <label class="control-label" for=""><?php echo Yii::t("strings", "Title") ?></label>
          <div class="controls"><input type="text" name="title" ng-model="shop.title" required/></div>
        </div>
        
        <div class="control-group">
        <label class="control-label" for=""><?php echo Yii::t("strings", "Address") ?></label>
        <div class="controls"><input type="text" name="address" ng-model="shop.address"/></div>
        </div>
        
        <div class="control-group">
        <label class="control-label" for=""><?php echo Yii::t("strings", "Phone") ?></label>
        <div class="controls"><input type="text" name="phone" ng-model="shop.phone" /></div>
        </div>
        <input type="hidden" name="lat" ng-model="shop.lat"/>
        <input type="hidden" name="lng" ng-model="shop.lng"/>
      </fieldset>
      
      <fieldset class="fieldset-section form-inline">
        <legend>Map</legend>
        <span class="show-toggle" ng-click="showToggle($event)">Show</span>
        <div class="control-group hideme">
          <div id="shop-map">
            
          </div>
        </div>
      </fieldset>
      </fieldset>
      
      <fieldset class="fieldset-section form-inline">
        <legend>Media</legend>
        <span class="show-toggle" ng-click="showToggle($event)">Show</span>
        <div class="control-group hideme">
          <label for="">Image</label>
          <input type="file" name="shop_image[]" />
          <input type="file" name="shop_image[]" />
        </div>
      </fieldset>

      <div class="control-group">
        <input type="button" class="btn" ng-click="addShop(shop)" value="<?php echo Yii::t("strings", "Submit") ?>"/> 
      </div>
    </form>
  </div></div>
