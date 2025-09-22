<!DOCTYPE html>
<html>
<head>

<!-- meta info -->
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/bakery/includes/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/bakery/includes/meta.php');


if(isset($_SESSION['user_id']))   
{  
echo "
<script> window.location='$site_ip/bakery/store'</script>
";
}
else{


  
}





?>


<style>
#login_form{
padding: 20px; 
border: 1px solid #2f2f2f; 
border-radius: 10px;
width: 40%; 
margin:5px auto; 
background:#131417; 
/*box-shadow: 0 0 8px gray;*/
/*display: flex;
flex-direction: column;*/
}
#status{
color: #ccc;
text-align: center;
/*border: 1px solid gray;*/
padding-bottom: 19px;
}
#user_id_input,#user_password_input{
border: 1px solid #2f2f2f;
margin-bottom: 10px;
width: 100%;
padding: 10px 7px;
letter-spacing: 8px;
background: #2a2a2c;
outline: 0;
color: #fff;
}

select{

border: 1px solid #2f2f2f;
margin-bottom: 10px;
width: 100%;
background: #2a2a2c;
outline: 0;
color: #fff;

}


/*to remove defuault eye icon display when user type in password field*/
      input::-ms-reveal,
      input::-ms-clear {
        display: none;
      }
#user_password_input_wrapper{
    position: relative;
    /*border: 1px solid gray;*/
}
#eye_button{
    position: absolute;
    top: 10px;
    right: 20px;
color:#ccc;
cursor: pointer;
}
input::placeholder {
 letter-spacing: 1px;
 color: gray;
}
#submit_button{
    
border: 1px solid #2f2f2f;
margin-bottom: 10px;   
background:#24a148;
width: 100%;
color: #fff;
padding: 10px;
cursor: pointer;
}
#form_footer {

    display: flex;
    justify-content: space-between;

}

/*for warning messages*/
.blink {
  animation: blinker 1s step-start infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}





@media only screen and (max-width: 1000px) {
  #login_form {
    width:50%;
  }
}
@media only screen and (max-width: 800px) {
  #login_form {
    width:60%;
  }
}
@media only screen and (max-width: 700px) {
  #login_form {
    width:60%;
  }
}
@media only screen and (max-width: 600px) {
  #login_form {
    width:80%;
  }
}
@media only screen and (max-width: 500px) {
  #login_form {
    width:95%;
  }
}
</style>
</head>

<body>






<?php
// if (isset($_POST['login']) && !empty($_POST['user_id']) && !empty($_POST['user_password'])) {
  
if (isset($_POST['login'])) {





$user_id = mysqli_real_escape_string($db_conn,$_POST['user_id']);
$user_password = $_POST['user_password']; //Get password




//conditions
if(strlen($user_id) < 1 ) {
$status = "<p class='blink' id='status' >Please type your Id.</p>";
} 

else if(strlen($user_password) < 1 ) {
$status = "<p class='blink' id='status' >Please type your Password.</p>";
} 


if(empty($status)) {

$check_database_query = mysqli_query($db_conn, "SELECT * FROM users WHERE user_id='$user_id' AND password='$user_password'");
$check_login_query = mysqli_num_rows($check_database_query);
if($check_login_query > 0) {


$_SESSION['user_id'] = $user_id; // dont use this variable outside of this if db_conndition



echo"<script> window.location='store'</script>";
exit();
}

else {
$status = "<p class='blink' id='status'>Incorrect id or Password...?</p>";

}

}
}
?>














<div id="pageContainer">





<form id='login_form' style='' class='' method='post' target='_self'>




<?php if (isset($_POST['login'])) { echo $status;   } else {echo "<p id='status' class=''>  Login Form ....... &#xf040;</p>";}?>



<p style="color: #fff; text-align: center; padding: 5px;"><?php echo $business_name; ?></p>
<p style="color: #fff; text-align: center; padding: 5px;"><?php echo $business_contact_no; ?></p>



<select style="" name="departs">
<option>Select Depart</option>
<?php
$departs_list_query = mysqli_query($db_conn, "SELECT * FROM department order by id ASC "); 
while ($departs_list = mysqli_fetch_array($departs_list_query) ) {
$depart_name =  $departs_list['departments']; 
?>
<option value="<?php echo $depart_name; ?>" ><?php echo $depart_name; ?></option>
<?php
}
?>
</select>


<select style="" name="shifts">
<option>Select Shift</option>
<?php
$shifts_list_query = mysqli_query($db_conn, "SELECT * FROM shifts order by id ASC "); 
while ($shifts_list = mysqli_fetch_array($shifts_list_query) ) {
$shift_name =  $shifts_list['shift_name']; 
$shift_time =  $shifts_list['shift_time']; 

?>
<option value="<?php echo $shift_name ; ?>" >
<?php echo $shift_time." &nbsp; ".$shift_name  ; ?>


</option>
<?php
}
?>
</select>






<input id='user_id_input' type='text' class='' autocomplete='yes' value="<?php if (isset($_POST['login'])) { echo $_POST['user_id']; } ?>" name='user_id' placeholder='User id'  autofocus/>

<!--- function to view password in psw field ---->
<div id='user_password_input_wrapper' class=''>
<input id='user_password_input' type='password' name='user_password' class="" value="<?php if (isset($_POST['login'])) { echo $_POST['user_password']; } ?>" placeholder='Password...' />
<span class="far fa-eye " id="eye_button" ></span>
</div>


<button id='submit_button' type='submit' class='' name='login'>
Submit
</button> 

<p style="color: #fff; text-align: center; padding: 5px;">Software Developed by aim soft corporation</p>



</form>







</div>







<script>
var user_password_input=document.getElementById("user_password_input");
var eye_button=document.getElementById("eye_button");
function ShowHidePassword() {
if (user_password_input.type=="password") {
user_password_input.type="text";
eye_button.className = "far fa-eye-slash";
}
else {
user_password_input.type="password";
eye_button.className = "far fa-eye";
}
}
eye_button.addEventListener('click',ShowHidePassword);

</script>
</body>
</html>


