<?php
require_once '../includes/config.inc.php';
$payload = json_decode(file_get_contents('php://input'));

if (isset(User::getByEmail($payload->email)->id)) {
  header('HTTP/1.1 409 Conflict');
  exit("User email already registered");
  return;
}

$user = new User();
$user->name = $payload->name;
$user->email = $payload->email;
$user->isAdmin = (int) $payload->isAdmin;

$user->insert();

echo json_encode($user);

?>
