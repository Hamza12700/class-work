<!DOCTYPE html>
<html>
<head>

<!-- meta info -->
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/aim/assets/includes/config.php');

$user_logout_date = date("d-M-Y") ;
$user_logout_time = date("g:i:A") ;

  $query_for_user_online = "UPDATE users  SET is_user_online='0' , logout_date='$user_logout_date' , logout_time = '$user_logout_time'  WHERE user_id='$logged_in_user[user_id]' "; 
  $result_for_user_online = mysqli_query($db_conn, $query_for_user_online);


//session_start();
session_destroy();

echo "<script> window.location='$site_ip/aim/categories/authentication/login.php'</script>";





?>


</head>

<body>











<div id="pageContainer">


<p>You are logged out redirecting to the login page... </p>


</div>






</body>
</html>


