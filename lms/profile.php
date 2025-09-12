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
  $result = mysqli_query($db_con, "SELECT * FROM admissions WHERE roll_no = '$user_session'"); 
  if (mysqli_num_rows($result) == 0) {
    header("Location: register.php");
    exit();
  }

  while ($user = mysqli_fetch_array($result)) {
    $user_name = $user["student_name"];
    $user_email = $user["email"];
    $user_password = $user["password"];
    $user_roll_no = $user["roll_no"];
    $user_gender = $user["gender"];
    $user_guardian = $user["guardian_name"];
    $user_phone = $user["mobile_no"];
    $user_address = $user["address"];
    /* $user_photo_thumbnail = $user["student_photo_thumb"]; */
    /* $user_photo = $user["student_photo"]; */
  }
  ?>

  <body>
    <?php 
    require('header.php');
    ?>

    <main>
      <h2><?php echo $user_name; ?></h2>
      <p><?php echo $user_email; ?></p>

      <form class="form" method="post">
        <label for="name">Name:</label>
        <input name="name" value="<?php echo $user_name ?>" />

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user_email ?>" />

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $user_password ?>" />

        <label for="guardian_name">Guardian Name:</label>
        <input name="guardian_name" value="<?php echo $user_guardian ?>" />

        <label for="phone">Phone number:</label>
        <input name="phone" value="<?php echo $user_phone ?>" />

        <label for="address">Address:</label>
        <input name="address" value="<?php echo $user_address ?>" />

        <button name="update" type="submit">Update</button>
      </form>
    </main>

    <?php
    if (isset($_POST['update'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $guardian_name = $_POST['guardian_name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];

      $result = mysqli_query($db_con, "UPDATE admissions SET student_name = '$name', email = '$email', password = '$password',
      guardian_name = '$guardian_name', mobile_no = '$phone', address = '$address' WHERE roll_no = '$user_session'");
      if (!$result) {
        $status = "Failed to update ".mysqli_error($db_con);
      } else {
        $status = "Update Successfully";
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
main {
  margin: 1rem 5rem;
}

.form {
  margin: 2rem 0;
  display: flex;
  flex-direction: column;
}

.form button {
  width: fit-content;
  font-size: large;
  padding: 5px;
  margin-top: 1rem;
}

.form input {
  width: 400px;
  margin: 7px 0 1rem 0;
  padding: 4px;
  font-size: large;
}
</style>
