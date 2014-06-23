<?php

class PageController extends Controller {
  
  public function beforeAction($action) {
    if (!UserAR::isLogin() && $action->id != "login" && $action->id != "error") {
      return $this->redirect(array("login"));
    }
    return parent::beforeAction($action);
  }
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
    $lookbook = LookbookAR::model()->findByPk($id);
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
      $this->redirect(array("streehot"));
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
  
  public function actionNews() {
    $list = NewsAR::model()->getList();
    $this->render("news", array("news_list" => $list));
  }
  
  public function actionAddnews() {
    $request = Yii::app()->getRequest();
    $id = $request->getParam("id", FALSE);
    $news = NewsAR::model()->findByPk($id);
    if ($id && !$news) {
      $this->redirect(array("news"));
    }
    $this->render("addnews", array("news" => $news));
  }
  
  public function actionjob() {
    $jobes = JobAR::model()->getList();
    $this->render("job", array("jobes" => $jobes));
  }
  
  public function actionAddjob() {
    $request = Yii::app()->getRequest();
    $id = $request->getParam("id", FALSE);
    $job = JobAR::model()->findByPk($id);
    if ($id && !$job) {
      $this->redirect(array("job"));
    }
    $this->render("addjob", array("job" => $job));
  }
}

