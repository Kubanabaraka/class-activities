<?php
require_once __DIR__ . '/pdo.php';

$roleId = 1;
$selectById = $cnx->prepare(
    'SELECT role_id, role_name, description
     FROM roles
     WHERE role_id = :role_id'
);
$selectById->execute([':role_id' => $roleId]);

print_r($selectById->fetch(PDO::FETCH_BOTH));
