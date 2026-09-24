<?php
require_once('customer.php');
class CustomerOrder extends Customer{
    public function __construct(){
        parent::__construct();
        echo ' This is the constructor of the child class';
    }
};

?>
