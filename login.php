<?php
include("include.php");
include("meta.php");

if(isset($_SESSION['user_name'])) {  
  echo "<script> window.location='home.php'</script>";
}
?>

<?php

$status = "";
if (isset($_POST['login_submit'])) {
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];

  $insert ="SELECT * FROM users WHERE user_name = '$user_name'";
  $query = mysqli_query($con, $insert);
  $check_results = mysqli_num_rows( $query);

  if ($check_results > 0) {
    echo $_SESSION['user_name'] = $user_name; // dont use this variable outside of this if db_conndition
    echo "<script>window.open('home.php','_SELF')</script>";
    $status = "User found";
  } else {
    $status = "User not found"; 
  }
}
?>


<form method="post">
  <h1 class="heading">Login</h1>
  <p class="heading"><?php echo $status; ?></p>

  <input required type="text" name="user_name" placeholder="Write Your Name Here.."/>
  <input required type="password" name="user_password"placeholder="Password Here..."/>

  <button class="login_btn" required type="submit" name="login_submit">Login</button>
  <a class="register_here" href="register.php">Don't have an account? Register here</a>
</form>

<footer>
  <ul>
    <li>Menu</li>
    <li>Options</li>
    <li>Links</li>
    <li>Socials</li>
  </ul>
</footer>
