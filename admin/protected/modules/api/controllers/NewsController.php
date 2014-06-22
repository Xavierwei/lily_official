<?php

class NewsController extends Controller {
  
  public function actionAdd() {
    $request = Yii::app()->getRequest();
    $news = new NewsAR();
    
    if ($request->isPostRequest) {
      $news->setAttributes($_POST);
      
      if ($news->save()) {
        return $this->responseJSON($news, 'success');
      }
      else {
        $this->responseError("validate failed", ErrorAR::ERROR_VALIDATE_FAILED, $news->getErrors());
      }
    }
    else {
      $this->responseError("http verb error", ErrorAR::ERROR_HTTP_VERB_ERROR);
    }
  }
  
  /**
   * 读取接口
   */
  public function actionIndex() {
    $request = Yii::app()->getRequest();
    
    $news_id = $request->getParam("news_id");
    if ($news_id) {
      $this->responseJSON(NewsAR::model()->findByPk($news_id), "success");
    }
    else {
      $news = NewsAR::model()->findAll();
      $this->responseJSON($news, "success");
    }
  }
  
  /**
   * News 搜索接口
   */
  public function actionSearch() {
    $request = Yii::app()->getRequest();
    $keyword = $request->getParam("keyword", FALSE);
    
    if (!$keyword || strlen($keyword) < 3) {
      return $this->responseError("keyword is too short", ErrorAR::ERROR_MISSED_REQUIRED_PARAMS);
    }
    
    $newsAr = new NewsAR();
    $news = $newsAr->searchWithKeyword($keyword);
    
    return $this->responseJSON($news, "success");
  }
}

