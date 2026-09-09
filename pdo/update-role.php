<?php
require_once __DIR__ . '/pdo.php';

$roleId = 1;
$updatedDescription = 'Monitor approved loans, repayments, and customer follow-up.';

$update = $cnx->prepare(
    'UPDATE roles
     SET description = :description
     WHERE role_id = :role_id'
);
$update->execute([
    ':description' => $updatedDescription,
    ':role_id' => $roleId,
]);

echo "Updated rows: {$update->rowCount()}";
