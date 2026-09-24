<?php

require_once('orderTemplate.php');
class Order implements orderTemplate{

 private $orderId;
 public function register(){
  $data = [
    ['id' => 1, 'name' => 'Eric', 'Phone' => '0979798'],
    ['id' => 2, 'name' => 'John', 'Phone' => '23434099'],
  ];

  array_push($data, ['id' => 3, 'name' => 'Jane', 'Phone' => '5551234']);

  return $data;
    
 }
 public function getAll(){

 }
 public function getById($id){
   $data = [
      ['id' => 1, 'name' => 'Eric', 'Phone' => '0979798'],
      ['id' => 2, 'name' => 'John', 'Phone' => '23434099'],
   ];



   return $data;
 }

}
?>
