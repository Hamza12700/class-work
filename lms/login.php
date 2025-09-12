<?php 
require('config.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- meta info -->
    <?php 
    require('meta.php');
    ?>
  </head>

  <?php
  $user_session = $_SESSION["user_session"];
  $result = mysqli_query($db_con, "SELECT roll_no FROM admissions WHERE roll_no = '$user_session'"); 
  if (!empty(mysqli_fetch_array($result))) {
    header("Location: profile.php");
    exit();
  }
  ?>

  <body>
    <?php 
    require('header.php');
    $status = "";
    ?>

    <?php
    if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $result = mysqli_query($db_con, "select roll_no from admissions where email = '$email' and password = '$password'");
      $roll_no = $result->fetch_object()->roll_no;
      if (mysqli_num_rows($result) == 0) {
        $status = "User doesn't exists";
      } else {
        $status = "Logined Successfully...";
        $_SESSION['user_session'] = $roll_no;
        echo "<script>setTimeout(function () {window.location.href = 'profile.php'}, 1000)</script>"; 
      }
    }
    ?>

    <h1 id="title">Login</h1>
    <form method="post" id="login-form">
      <p><?php echo $status; ?></p>
      <label>Email
        <input required type="email" name="email" />
      </label> 

      <label>Password
        <input required type="password" name="password" />
      </label> 
      <button type="submit" name="login">Login</button>
    </form>

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>
</html>


<style>
#title {
  text-align: center;
  margin: 10rem 0 1rem 0;
}

#login-form input {
  display: block;
  font-size: large;
  padding: 4px 0;
}

#login-form button {
  padding: 10px;
  font-size: large;
  font-weight: bold;
}

#login-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
  margin: 2rem 0 13rem 0;
}
</style>
