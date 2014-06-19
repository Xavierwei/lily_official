<?php

class ShopController extends Controller {
  
  public $layout = "/layouts/main";
  
  public function actionIndex() {
    $this->render("index");
  }
}

