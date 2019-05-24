<?php
require_once 'includes/config.inc.php';
require_once INCLUDE_PATH . 'session.inc.php';

if (isset($_POST["email"])) {
  $user = User::getByEmail($_POST["email"]);

  if (isset($user->id)) {
    $_SESSION["user"] = $user;
  }
}

if (isset($_SESSION["user"])) {
  redirect_to("users.php");
} else {
  redirect_to("index.php");
}

?>
