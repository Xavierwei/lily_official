<?php

class ShopTest extends FuelTest {
  public function testShopAdd() {
    $response = $this->post("shop/add", array("title" => "上海大宁店", "address" => "上海闸北区大宁国际", "lat" => "12.03", "lng" => "35.03"));
    
    print_r($response);
  }
}
