<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$dsn = "pgsql:host=localhost;dbname=money_Lending_Db";
$cnx = new PDO($dsn, "postgres", "passsword", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

if (basename($_SERVER['SCRIPT_FILENAME']) === basename(__FILE__)) {
    echo 'Database connected successfully.';
}
?>

