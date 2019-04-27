<?php
require_once '../includes/config.inc.php';
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  echo json_encode(User::getById($id));
}
?>
