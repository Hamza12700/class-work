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
  if ($usser_session) {
    header("Location: profile.php");
    exit();
  }
  ?>

  <body>
    <?php 
    require('header.php');
    $status = "";
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
    if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $result = mysqli_query($db_con, "SELECT * FROM admissions WHERE student_email = '$email' AND password = '$password'")->fetch_object();
      $roll_no = $result->roll_no;
      if (!$roll_no) {
        $status = "User doesn't exists";
      } else {
        $_SESSION['user_session'] = $result->id;
        header("Location: profile.php");
        exit();
      }
    }
    ?>

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
