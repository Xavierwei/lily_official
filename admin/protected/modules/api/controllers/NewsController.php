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
}

