<!DOCTYPE html>
<html>
  <head>
    <!-- meta info -->
    <?php 
    require('config.php');
    require('meta.php');
    ?>
  </head>

  <?php
  $user_session = $_SESSION["user_session"];
  $result = mysqli_query($db_con, "SELECT roll_no FROM admissions WHERE roll_no = '$user_session'"); 
  if (empty(mysqli_fetch_array($result))) {
    header("Location: register.php");
    exit();
  }
  ?>

  <body>
    <?php 
    require('header.php');
    ?>

    <h1 id="student-title">Profile</h1>

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>
</html>
