<?php
require_once 'includes/config.inc.php';
require_once INCLUDE_PATH . 'session.inc.php';

if ($_SESSION["user"]->isAdmin != 1) {
  redirect_to("index.php");
}

require_once VIEW_PATH . 'users.view.php';
?>
