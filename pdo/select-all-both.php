<?php
require_once __DIR__ . '/pdo.php';

$selectAll = $cnx->query(
    'SELECT role_id, role_name, description
     FROM roles
     ORDER BY role_id'
);

print_r($selectAll->fetchAll(PDO::FETCH_BOTH));
