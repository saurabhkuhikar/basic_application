<?php

namespace app\components;
use Yii;

class Helper {
  public static function SetSession($k,$v){
    $session = yii::$app->session;
    return $session->set($k,$v);
  }

  public static function GetSession($k){
    $session = yii::$app->session;
    return $session->get($k);
  }

  public static function dd($arg){
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
    die();
  }
}

?>