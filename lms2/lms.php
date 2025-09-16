<!DOCTYPE html>
<html>
<head>
<!-- meta info -->
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/lms/meta.php');

if(!isset($_SESSION['roll_no'])) {
  header("Location: login.php");
  exit();
}


?>
</head>

<body>
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/header.php');
?>


<div id="page_container">



<a href="logout.php" >Logout</a>


</div>  <!-- Page Container -->

<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/footer.php');
?>


<script src="<?php echo $java_script; ?>"></script>
</body>
</html>