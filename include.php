<?php
session_start();
$localhost = "127.0.0.1";
$db_user = "twitter";
$db_pass = "twitter";
$db = "twitter";
$con = mysqli_connect($localhost,$db_user,$db_pass,$db) or die("couldn't connect");



$title = "Twitter";

?>