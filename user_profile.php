<?php
include("include.php");
include("meta.php");

$user_name = $_SESSION['user_name'];

if (!$user_name) {
	header("Location: login.php");
  exit();
}

$fetch = "SELECT * from users where user_name = '$user_name' ";
$query = mysqli_query($con,$fetch);
while($user = mysqli_fetch_array($query)){
  $user_name = $user['user_name'];
  $cover_photo = $user['cover_photo'];
  $profile_photo = $user['profile_photo'];
  $user_password = $user['user_password'];
  $user_gender = $user['user_gender'];
  $user_email = $user['user_email'];
}

if (!$profile_photo) {
  $profile_photo = "None";
}

if (!$cover_photo) {
  $cover_photo = "None";
}
?>

<div id="home_header">
	<h1>Twitter</h1>
  <a href="logout.php">Logout</a>	
</div>

<div class="settings_div">
  <h1>Settings</h1>

  <form class="settings_opts" method="post">
    <label>Name:
      <input name="name" value="<?php echo $user_name; ?>" />
    </label>

    <label>Password:
      <input name="password" value="<?php echo $user_password; ?>" />
    </label>

    <label>Email:
      <input name="email" value="<?php echo $user_email; ?>" />
    </label>

    <label>Photo:
      <input name="photo" value="<?php echo $profile_photo; ?>" />
    </label>

    <label>Photo:
      <input name="cover" value="<?php echo $cover_photo; ?>" />
    </label>

    <div class="del_up">
      <button name="update" type="submit">Update</button>
      <button name="delete" type="submit">Delete</button>
    </div>
  </form>
</div>

<?php
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $photo = $_POST['photo'];
  $cover = $_POST['cover'];

  $update = "UPDATE users set user_password = '$password', user_name = '$name', user_email = '$email' WHERE user_name = '$user_name'";
  $query = mysqli_query($con,$update);
  if (!$query) {
    echo "Update failed!";
  }
} elseif (isset($_POST['delete'])) {
  $delete = "delete from  users WHERE user_name = '$user_name'";
  $query = mysqli_query($con,$delete);
  if (!$query) {
    echo "Delete failed!";
  }

  session_destroy();
  header("Location: login.php");
  exit();
}
?>
