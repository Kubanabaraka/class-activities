<?php
class Customer{
 private $id;
 public $email;
 private $name;
 private $nid;

 function register(){
    echo "The new customer with Id ".$this->nid." has been registered";
    $this->nid = "345346345";
    // execution of a function ends with return.
 }
 public function setNid($nid){
    $this->nid = $nid;
   
 }
 public function __construct($_name,$_email,$_nid){
    echo"I have executed at the point of creating an object.";
    
 }
}
$customer = new Customer("Noah","noah@gmail.com","12323");
$customer->email = "baraka@gmail.com";
$email=$customer -> email;
$customer ->setNid("233");
echo $email;
 $customer ->register();
?>
