<?php
class Company{
   private $name;
   private $id;
   private $email;
   private $members;

function __constructor($_name,$_email){

}

public function setName($name){
    $this->name = $name;
}
public function getName(){
    return $this->name;
}
}
?>
