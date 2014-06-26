<?php

class PageController extends Controller {
  
  public function beforeAction($action) {
    if (!UserAR::isLogin() && $action->id != "login" && $action->id != "error") {
      return $this->redirect(Yii::app()->getBaseUrl()."/index/login");
    }
    return parent::beforeAction($action);
  }
  /**
   * 
   */
  public function actionLookbook() {
    $request = Yii::app()->getRequest();
    $lookbookAr = new LookbookAR();
    $list = $lookbookAr->getList();

    $gallery = LookbookGalleryAR::model()->findByPk($request->getParam("gallery"));
    $list = $gallery->loadLookbookItem();
    if (!$gallery) {
      return $this->redirect(Yii::app()->getBaseUrl()."/page/lookbookgallery");
    }
    $this->render("lookbook", array("lookbookes" => $list, "gallery" => $gallery));
  }
  
  public function actionAddlookbook() {
    $request = Yii::app()->getRequest();
    $id = $request->getParam("id", FALSE);
    $lookbook = LookbookAR::model()->findByPk($id);
    if ($id && !$lookbook) {
      $this->redirect(array("addlookbook"));
    }
    
    $gallery = LookbookGalleryAR::model()->findByPk($request->getParam("gallery"));
    
    $this->render("addlookbook", array("lookbook" => $lookbook, "gallery" => $gallery));
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
  
  public function actionAddlookbookgallery() {
    $request = Yii::app()->getRequest();
    $id = $request->getParam("id", FALSE);
    $lookbookGallery = LookbookGalleryAR::model()->findByPk($id);
    if ($id && !$lookbookGallery) {
      $this->redirect(array("lookbookgallery"));
    }
    $this->render("addlookbookgallery", array("lookbookGallery" => $lookbookGallery));
  }
  
  public function actionLookbookgallery() {
    $lookbookGallery = new LookbookGalleryAR();
    $list = $lookbookGallery->getList();
    $this->render("lookbookgallery", array("lookbookGalleries" => $list));
  }
}

