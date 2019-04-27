<?php
require_once '../includes/config.inc.php';

if (isset($_GET["id"])) {
  $user = User::getById($_GET["id"]);
  $user->delete();
}

?>
