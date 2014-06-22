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
  
  public function actionStreehot() {
    $list = StreehotAR::model()->getList();
    $this->render("screehot", array("streehotes" => $list));
  }
  
  public function actionAddstreehot() {
    $request = Yii::app()->getRequest();
    $id = $request->getParam("id", FALSE);
    $streehot = StreehotAR::model()->findByPk($id);
    if ($id && !$streehot) {
      $this->redirect(array("addlookbook"));
    }
    $this->render("addstreehot", array("streehot" => $streehot));
  }
  
  public function actionMilestone() {
    $list = MilestoneAR::model()->getList();
    $this->render("milestone", array("milestones" => $list));
  }
  
  public function actionAddmilestone() {
    $request = Yii::app()->getRequest();
    $id = $request->getParam("id", FALSE);
    $milestone = MilestoneAR::model()->findByPk($id);
    if ($id && !$milestone) {
      $this->redirect(array("milestone"));
    }
    $this->render("addmilestone", array("milestone" => $milestone));
  }
}

