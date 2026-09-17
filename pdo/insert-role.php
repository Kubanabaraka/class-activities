<?php
require_once __DIR__ . '/pdo.php';

$roleName = 'Loan Officer ' . date('His');
$description = 'Manages loan applications and repayments.';

$insert = $cnx->prepare(
    'INSERT INTO roles (role_name, description)
     VALUES (:role_name, :description)
     RETURNING role_id'
);
$insert->execute([
    ':role_name' => $roleName,
    ':description' => $description,
]);

$insertedRoleId = $insert->fetchColumn();
echo "Inserted role ID: {$insertedRoleId}";
