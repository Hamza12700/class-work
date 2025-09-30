<?php 
require('config.php');

$id = $_GET['id'];
if (!$id) {
  header("Location: courses-info.php");
  exit();
}

mysqli_query($db_con, "DELTE FROM courses WHERE id = '$id'") or die("Failed to delete course");
header("Location: courses-info.php");
exit();
