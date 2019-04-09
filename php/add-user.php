<?php
$payload = json_decode(file_get_contents('php://input'));

$user = new User();
$user->name = $payload->name;
$user->email = $payload->email;

$user->insert();

echo $user;

?>
