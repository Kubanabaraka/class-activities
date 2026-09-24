<?php
require_once('company.php');
$company = new Company();
$company->setName('Elabman ltd');
echo $company->getName();
?>
