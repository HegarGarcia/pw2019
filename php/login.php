<?php
session_start();
$_SESSION["email"] = $_POST["email"];
$_SESSION["name"] = $_POST["name"];

require_once 'includes/config.inc.php';
require_once VIEW_PATH . 'logged.view.php';
?>
