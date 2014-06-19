<?php

class JobController extends Controller {
  
  // 添加职位
  public function actionAdd() {
    $request = Yii::app()->getRequest();
    $job = new JobAR();
    
    if ($request->isPostRequest) {
      $job->setAttributes($_POST);
      
      
      if ($job->save()) {
        return $this->responseJSON($job, 'success');
      }
      else {
        $this->responseError("validate failed", ErrorAR::ERROR_VALIDATE_FAILED, $job->getErrors());
      }
    }
    else {
      $this->responseError("http verb error", ErrorAR::ERROR_HTTP_VERB_ERROR);
    }
  }
  
  public function actionIndex() {
    $request = Yii::app()->getRequest();
    
    $job = new JobAR();
    $jobs = $job->getList();
    
    $this->responseJSON($jobs, "success");
  }
}

