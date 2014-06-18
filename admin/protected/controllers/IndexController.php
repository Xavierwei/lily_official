<?php

class IndexController extends Controller
{
  
  public function beforeAction($action) {
    if (!UserAR::isLogin() && $action->id != "login") {
      return $this->redirect(array("login"));
    }
    return parent::beforeAction($action);
  }
  
	public function actionIndex()
	{
		$this->render('index');
	}
  
  // 登录 
  public function actionLogin() {
    $request = Yii::app()->getRequest();
    if ($request->isPostRequest) {
      $ret = UserAR::login($request->getPost("user"), $request->getPost("pass"));
      if ($ret) {
        return $this->redirect(array("index"));
      }
      else {
        //TODO::
      }
    }
    $this->render("login");
  }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->render("error");
	}
}