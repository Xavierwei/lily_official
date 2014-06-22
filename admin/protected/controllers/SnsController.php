<?php

class SnsController extends Controller {
  public function actionWeibo() {
		$weiboService= Yii::app()->weibo->getAuth();
    $token = FALSE;
		if (isset($_REQUEST['code'])) {
			$keys = array();

			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = WB_CALLBACK_URL;
			try {
				$token = $weiboService->getAccessToken( 'code', $keys ) ;
			} catch (OAuthException $e) {
        //
			}
		}
    else {
      return $this->redirect("/");
    }
		
		if ($token) {
       // 获取token
      Yii::app()->session["weibo_token"] = $token;
      
      Yii::app()->cache->set("weibo_token", $token);
      
      $this->redirect((Yii::app()->getBaseUrl(TRUE). "/index"));
      
      // 在这里 如果是系统级别的用户需要额外保存Token
		} else {
		 // TODO:: 获取Token失败后处理逻辑
		}
  }
}

