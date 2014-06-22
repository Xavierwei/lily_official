<?php

class ContentController extends Controller {
  
  /**
   * 删除数据
   */
  public function actionDelete() {
    $request = Yii::app()->getRequest();
    
    $cid = $request->getParam("cid", FALSE);
    
    if (!$cid) {
      return $this->responseError("http param error", ErrorAR::ERROR_MISSED_REQUIRED_PARAMS);
    }
    
    $content = ContentAR::model()->findByPk($cid);
    $content->delete();
    
    return $this->responseJSON("success", "success");
  }
}

