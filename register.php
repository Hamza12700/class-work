<?php
include("include.php");
include("meta.php");

$status = "";

if(isset($_SESSION['user_name'])) {
  header("Location: home.php");
  exit();
}
?>

<?php
if(isset($_POST['register_submit'])) {
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];
  $user_gender = $_POST['user_gender'];
  $user_email = $_POST['user_email'];
  $check = true;

  if (strlen($user_name) < 4) {
    $status = "User name has to be at least 4 characters long";
    $check = false;
  } elseif (strlen($user_email) <= 4) {
    $status = "Email has to be greater than 4 characters long";
    $check = false;
  } elseif (strlen($user_password) < 8) {
    $status = "Password has to be greater than 8 characters!";
    $check = false;
  }

  $insert ="INSERT into users (user_name,user_password,user_gender,user_email) values ('$user_name','$user_password','$user_gender','$user_email')";
  $query = mysqli_query($con,$insert);
  if ($query && $check) {
    $status = "User Registered!";
    echo "<script>window.open('home.php','_SELF')</script>" ;
  }
}

?>

<form method="post">
  <h1 class="heading">Register</h1>
  <p><?php echo $status ?></p>
  <input required type="text" name="user_name" placeholder="Write Your Name Here.."/>
  <input required type="email" name="user_email" placeholder="Type Email.... "/>
  <input required type="password" name="user_password" placeholder="Password "/>

  <select name="user_gender">
    <option>Male</option>
    <option>Female</option>
  </select>

  <button class="login_btn" type="submit" name="register_submit">Register</button>
  <a class="register_here" href="login.php">Already have an account? Login here</a>
</form>

<footer>
  <ul>
    <li>Menu</li>
    <li>Options</li>
    <li>Links</li>
    <li>Socials</li>
  </ul>
</footer>
