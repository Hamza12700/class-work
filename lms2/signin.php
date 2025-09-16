<!DOCTYPE html>
<html>
<head>

<!-- meta info -->
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/islamicestore/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/islamicestore/meta.php');
?>
<style>
#signin_form{
/*border:1px solid blue;*/
width:30% ;
margin: 50px auto;
display: flex;
flex-direction: column;
padding: 20px 30px;

background: #eee;
border: 5px solid;
border-image: linear-gradient(to right, #fed330 0%,#fed330 20%,#e63841 20%,#e63841 20%,#e63841 40%,#5ed6fd 40%,#5ed6fd 40%,#e63841 40%,#5ed6fd 40%,#5ed6fd 40%,#5ed6fd 60%,#45c33b 60%,#45c33b 80%,#1172c0 80%,#1172c0 80%,#1172c0 100%) 1 stretch repeat; /* W3C */



}

#signin_form div{
	display: flex;
/*	justify-content: space-between;*/
	align-items: center;
	border:1px solid #01497c;
	border-radius:5px;
	margin:5px 0;
	

}
#signin_form div span{
border-top-left-radius:5px ;
border-top-bottom-radius:5px ;

	padding: 12px;
/*	border:1px solid blue;*/
	background:#01497c ;
	color:#fff;
}

#signin_form input{
margin: 0;
border: 0;
/*outline: 1px solid black;*/
padding: 12px; 

background: ;
background-image:url('/images/kaaba.png');
background-position: center left ; /* Center the image */
background-repeat: no-repeat; /* Do not repeat the image */
background-size: 30px 30px ; /* Resize the background image to cover the entire container */
background-origin: content-box;
border-radius: 5px;


}
#signin_form input[type="text"], #signin_form input[type="password"]{

letter-spacing: 7px;


}

#signin_form input[type="submit"]{
background: #01497c;
border-radius: 5px;
color:#fff;
}

#signin_form #form_footer{
	display: flex;
	justify-content: space-between;
	padding:10px;
	border:0;
}


</style>
</head>

<body>
<div id="page_container">
<?php
require($_SERVER['DOCUMENT_ROOT'].'/islamicestore/header.php');
?>


<p>Sign-In </p>

<form id="signin_form" method="post">

<div>
<span class="fas fa-user"></span>
<input type="text" name="username" class="" placeholder=" User Name">
</div>

<div>
<span class="fas fa-lock"></span>
<input type="text" name="password" placeholder=" Password">
</div>
<input type="submit" value="submit" name="signin">
<div id="form_footer"><a>Forgot Password?</a> <a href="register.php">Register</a></div>
</form>





</div>
<script src="script.js"></script>

</body>
</html>


<?php
if(isset($_SESSION['username']))   
{  
echo "
<script> window.location='admin.php'</script>
";
}

if (isset($_POST['signin'])) {
$username =$_POST['username'];
$password = $_POST['password']; //Get password
$fetch = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$query = mysqli_query($db_con,$fetch);
$check_login_query = mysqli_num_rows($query);
if($check_login_query > 0) {
echo $_SESSION['username'] = $username; // dont use this variable outside of this if db_conndition
echo"<script> window.location='admin.php'</script>";
}
else {
echo "Incorrect id or Password...?";
}
}
?>