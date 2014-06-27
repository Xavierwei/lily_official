<?php

class LookbookController extends Controller {
  
  public function actionAdd() {
    $request = Yii::app()->getRequest();
    
    if ($request->isPostRequest) {
      $data = $_POST;
      if (isset($data["cid"])) {
        // 更新
        $lookbookAr = LookbookAR::model()->findByPk($data["cid"]);
        if ($lookbookAr) {
          $lookbookAr->setAttributes($data);
          $lookbookAr->update();
           return $this->responseJSON($lookbookAr, "success");
        }
        else {
          $this->responseError("not found", ErrorAR::ERROR_MISSED_REQUIRED_PARAMS);
        }
      }
      // 添加
      else {
        $lookbookAr = new LookbookAR();
        $lookbookAr->setAttributes($data);
        
        if ($lookbookAr->save()) {
          return $this->responseJSON($lookbookAr, "success");
        }
      }
      $this->responseJSON($data, "success");
    }
    else {
      $this->responseError("http verb error", ErrorAR::ERROR_HTTP_VERB_ERROR);
    }
  }
  
  public function actionIndex() {
    $request = Yii::app()->getRequest();
    $id = $request->getParam("id", FALSE);
    if ($id) {
      $lookbook = LookbookAR::model()->findByPk($id);
      $this->responseJSON($lookbook, "success");
    }
    else {
      $lookbookAr = new LookbookAR();
      $list = $lookbookAr->getList();
      $this->responseJSON($list, "success");
    }
  }
  
  public function actionIngroup() {
  $lookbook = new LookbookGalleryAR();
  $gallery_list = $lookbook->getList();
  if (count($gallery_list)) {
    $gallery = array_shift($gallery_list);
    $lookbookItems = $gallery->loadLookbookItem();
    
    $ret = array();
    foreach ($lookbookItems as $lookbookItem) {
      foreach ($lookbookItem->look_book_image as $image) {
        $ret[] = array(
            "title" => $lookbookItem->title,
            "url" => $image
        );
      }
    }
    $this->responseJSON($ret, "success");
    
  }
  else {
    $this->responseJSON(array(), "success");
  }
  }
}

