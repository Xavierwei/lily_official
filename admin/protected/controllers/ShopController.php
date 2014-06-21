<?php

class ShopController extends Controller {
  
  public $layout = "/layouts/main";
  
  public function actionIndex() {
    $shopes = ShopAR::model()->findAll();
    $this->render("index", array("shopes" => $shopes));
  }
  
  public function actionAdd() {
    $this->render("add");
  }
  
  public function actionEdit() {
    $request = Yii::app()->getRequest();
    $shop_id = $request->getParam("shop_id");
    $shop = ShopAR::model()->findByPk($shop_id);
    if (!$shop) {
      return $this->redirect(array("index"));
    }
    $this->render("add", array("shop" => $shop));
  }
}

