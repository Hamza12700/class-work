<?php
include("include.php");
include("meta.php");

if(isset($_SESSION['user_name'])) {
  header("Location: home.php");
  exit();
}
?>

<form method="post">
  <h1 class="heading">Register</h1>

  <label for="user_name">Twitter profile name:</label>
  <input minlength="4" required type="text" name="user_name" placeholder="Your Twitter Profile Name"/>

  <label for="user_nick">Nick name:</label>
  <input minlength="4" required type="text" name="user_nick" placeholder="Nick name"/>


  <label for="user_email">Email:</label>
  <input required type="email" name="user_email" placeholder="Type Email"/>

  <label for="user_password">Password:</label>
  <input minlength="8" required type="password" name="user_password" placeholder="Password "/>

  <label for="user_country">Select your country:</label>
  <select name="user_country">
    <option>Pakistan</option>
    <option>India</option>
  </select>

  <label for="user_gender">Select your gender:</label>
  <select name="user_gender">
    <option>Male</option>
    <option>Female</option>
  </select>

  <label for="user_birth">Date of Birth:</label>
  <input
    type="date"
    id="user_birth"
    name="user_birth"
    value="2025-07-22"
    min="2000-01-01"
    max="2026-12-31" />

  <button class="login_btn" type="submit" name="register_submit">Register</button>
  <a class="register_here" href="login.php">Already have an account? Login here</a>
</form>

<?php
if(isset($_POST['register_submit'])) {
  $user_name = $_POST['user_name']; // User name has to be unique for every user
  $user_nick = $_POST['user_nick'];
  $user_password = $_POST['user_password'];
  $user_gender = $_POST['user_gender'];
  $user_email = $_POST['user_email'];
  $user_country = $_POST['user_country'];
  $user_birth = $_POST['user_birth'];

  $insert ="INSERT into users (user_name, user_id, user_password, user_gender, user_email, user_birth) values ('$user_nick', '$user_name', '$user_password','$user_gender','$user_email', '$user_birth')";
  $query = mysqli_query($con,$insert);
  if ($query) {
    $_SESSION['user_name'] = $user_name;
    header("Location: home.php");
    exit();
  }
}
?>

<footer>
  <ul>
    <li>Menu</li>
    <li>Options</li>
    <li>Links</li>
    <li>Socials</li>
  </ul>
</footer>
