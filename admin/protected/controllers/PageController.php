<?php

class PageController extends Controller {
  
  /**
   * 
   */
  public function actionLookbook() {
    $lookbookAr = new LookbookAR();
    $list = $lookbookAr->getList();
    $this->render("lookbook", array("lookbookes" => $list));
  }
  
  public function actionAddlookbook() {
    $request = Yii::app()->getRequest();
    $id = $request->getParam("id", FALSE);
    $lookbook = LookBookAR::model()->findByPk($id);
    if ($id && !$lookbook) {
      $this->redirect(array("addlookbook"));
    }
    
    $this->render("addlookbook", array("lookbook" => $lookbook));
  }
}

