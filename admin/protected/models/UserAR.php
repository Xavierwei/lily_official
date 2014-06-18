<?php

class UserAR extends CActiveRecord {
  public static function login($username, $password) {
    if ($username == "admin" && $password == "pas_w#ord20o4") {
      Yii::app()->session["login"] = TRUE;
      return TRUE;
    }
    return FALSE;
  }
  
  public static  function isLogin() {
    return !!Yii::app()->session["login"];
  }
}

