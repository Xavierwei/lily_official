<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
  
  public function isPost() {
    return Yii::app()->getRequest()->isPostRequest;
  }
  
 /**
   * 
   * @param type 错误消息
   * @param type 错误代码
   * @param type 错误额外数据
   */
  public function responseError($message, $error = 500, $ext = array()) {
    $this->_renderjson($this->wrapperDataInRest(NULL, $message, $error, $ext));
  }

  public function randomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
  }

  // 在这里加缓存功能
  public function responseJSON($data, $message, $ext = array()) {
    $this->_renderjson($this->wrapperDataInRest($data, $message, ErrorAR::ERROR_NO_ERROR, $ext));
  }

  public function wrapperDataInRest($data, $message = '', $error = FALSE, $ext = array()) {
    $json = array(
        "status" => $error,
        "message" => $message,
        "data" => $data
    );

    if (!empty($ext)) {
      $json["ext"] = $ext;
    }

    return $json;
  }

  private function _renderjson($data) {
    header("Content-Type: application/json; charset=UTF-8");
    print CJavaScript::jsonEncode($data);
    die();
  }
  
}