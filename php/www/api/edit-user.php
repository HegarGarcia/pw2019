<?php
require_once '../includes/config.inc.php';
$payload = json_decode(file_get_contents('php://input'));

$user = User::getByEmail($payload->email);
$user->name = $payload->name;
$user->email = $payload->email;

$user->update();

echo json_encode($user);

?>
