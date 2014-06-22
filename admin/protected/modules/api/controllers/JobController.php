<?php

class JobController extends Controller {
  
  // 添加职位
  public function actionAdd() {
    $request = Yii::app()->getRequest();
    $job = new JobAR();
    
    if ($request->isPostRequest) {
      $cid = $_POST["cid"];
      if ($cid > 0) {
        $job = JobAR::model()->findByPk($cid);
        $job->setAttributes($_POST);
        $job->update();
      }
      else {
        $job->setAttributes($_POST);
        $job->save();
      }
      return $this->responseJSON($job, 'success');
    }
    else {
      $this->responseError("http verb error", ErrorAR::ERROR_HTTP_VERB_ERROR);
    }
  }
  
  public function actionIndex() {
    $request = Yii::app()->getRequest();
    $id = $request->getParam("id", FALSE);
    if ($id) {
      $job = JobAR::model()->findByPk($id);
      $this->responseJSON($job, "success");
    }
    else {
      $job = new JobAR();
      $jobs = $job->getList();

      $this->responseJSON($jobs, "success");
    }
  }
}

