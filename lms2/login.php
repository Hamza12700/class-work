<!DOCTYPE html>
<html>
<head>
<!-- meta info -->
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/lms/meta.php');

if(isset($_SESSION['roll_no'])) {
  header("Location: lms.php");
//   exit();
}


?>
</head>

<body>
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/header.php');
?>




<?php
$status = "Login Form";
if (isset($_POST['login'])) {
$roll_no = $_POST['roll_no'];
$password = $_POST['password'];

$insert ="SELECT * FROM admissions WHERE roll_no = '$roll_no'";
$query = mysqli_query($db_con, $insert);
$check_results = mysqli_num_rows($query);

if ($check_results > 0) {
echo $_SESSION['roll_no'] = $roll_no; // dont use this variable outside of this if db_conndition
echo "<script>window.open('lms.php','_SELF')</script>";
$status = "User found";
} else {
$status = "User not found"; 
}
}
?>



<div id="page_container">


<form id="registration_form" method="post" target='_self' enctype="multipart/form-data">

<p style="text-align: center; padding:10px;"><?php echo $status; ?></p>

<fieldset>
<legend> Student Details </legend>
<input type="text" placeholder="Roll No" name="roll_no"  >
<input type="password" placeholder="password" name="password"  >

<a>forget Password?</a> 
<a href="register.php">Register Yourself</a> 

</fieldset>

<input type="submit" name="login" value="Login">

</form>




</div>  <!-- Page Container -->

<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/footer.php');
?>


<script src="<?php echo $java_script; ?>"></script>
</body>
</html>


