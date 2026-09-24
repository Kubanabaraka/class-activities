<?php
class Student{

    public $name;
    private $registration;
    private $email;

    function register(){
         echo this->$name.'Has been successfully registered';
    }

    public function __construct($_name, $password) {
    
         echo $_name . ' Is my name';
    }
}
$student = new Student('Big','eee');


$student->register();


?>

