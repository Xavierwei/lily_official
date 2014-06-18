<?php

class ShopController extends Controller {
  
  public $layout = "/layouts/main";
  
  public function actionIndex() {
    $this->render("index");
  }
  
  public function actionAdd() {
    if ($this->isPost()) {
      $post = $_POST;
      $shopAr = new ShopAR();
      $ret = $shopAr->insert($post);
      if ($ret) {
        $this->redirect("/shop/index");
      }
      else {
        $errors = $shopAr->getErrors();
        print_r($errors);
        die();
      }
    }
    $this->render("add");
  }
}

