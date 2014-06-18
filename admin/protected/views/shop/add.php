<div class="row" ng-controller="ShopForm"><div class="span12">
  <form name="shop" action="<?php echo Yii::app()->baseUrl?>/shop/add" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend><?php echo Yii::t("strings", "Shop")?></legend>
      <label for=""><?php echo Yii::t("strings", "Country")?></label>
      <select name="country" id="" ng-model="shop.country" required>
        <option value="cn">China</option>
      </select>
      <p class="text-error" ng-show="shop.country.$error.required"><?php echo Yii::t("srings", "Country is required")?></p>
      <label for=""><?php echo Yii::t("strings", "City")?></label>
      <select name="city" id="" ng-model="shop.city">
        <option value="shanghai">Shanghai</option>
      </select>
      <label for=""><?php echo Yii::t("strings", "Distinct")?></label>
      <select name="distinct" id="" ng-model="shop.distinct">
        <option value="jingan"><?php echo Yii::t("strings", "Jing An Distinct")?></option>
      </select>

      <label for=""><?php echo Yii::t("strings", "Title") ?></label>
      <input type="text" name="title" ng-model="shop.title" required/>

      <label for=""><?php echo Yii::t("strings", "Address")?></label>
      <input type="text" name="address" ng-model="shop.address"/>

      <label for=""><?php echo Yii::t("strings", "Phone")?></label>
      <input type="text" name="phone" ng-model="shop.phone" />

      <input type="hidden" name="lat" ng-model="shop.lat"/>
      <input type="hidden" name="lng" ng-model="shop.lng"/>

      <div class="control-group">
        <input type="button" class="btn" ng-click="addShop(shop)" value="<?php echo Yii::t("strings" ,"Submit")?>"/> 
      </div>

    </fieldset>
  </form>
</div></div>
