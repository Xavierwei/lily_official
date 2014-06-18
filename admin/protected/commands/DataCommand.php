<?php

class DataCommand extends CConsoleCommand {
  public function actionImportShop() {
    $file = "lily_store.csv";
    $content = file_get_contents($file);
    
    $rows = explode("\r\n", $content);
    foreach ($rows as $row) {
      $coles = explode(",", $row);
      if (!count($coles)) {
        print_r($coles);
        continue;
      }
      if (!$coles[0]) {
        //print_r($coles);
        continue;
      }
      $shop = new ShopAR();
      $attr = array(
          "country" => $coles[1],
          "city" => $coles[2],
          "distinct" => $coles[3],
          "title" => trim($coles[4]),
          "address" => trim($coles[5]),
          "phone" => trim($coles[6]),
          "lat" => str_replace('"', "", isset($coles[7]) ? $coles[7]: ""),
          "lng" => str_replace('"', "", isset($coles[8]) ? $coles[8]: ""),
      );
      
      $shop->setAttributes($attr, FALSE);
      
      $shop->save();
      
      print ".";
    }
  }
}

