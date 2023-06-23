<?php

use App\Database;

require __DIR__ . '/vendor/autoload.php';
header('Content-Type: application/json');

$password = $_POST['password'];

$db = new Database();

$password_hash = md5($password);

$db->update('usuarios', ['password' => $password_hash], "id = 1");

echo json_encode([
    'estado' => true
]);