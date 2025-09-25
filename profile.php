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
  if (!$user_session) {
    header("Location: register.php");
    exit();
  }

  $res = mysqli_query($db_con, "SELECT * FROM admissions WHERE id = '$user_session'")->fetch_object();
  $user_name = $res->student_name;
  $user_email = $res->student_email;
  $user_password = $res->password;
  $user_roll_no = $res->roll_no;
  $user_gender = $res->gender;
  $user_guardian = $res->guardian_name;
  $user_phone = $res->mobile_no;
  $user_address = $res->address;
  $user_roll_no = $res->roll_no;
  $user_photo_thumbnail = $res->student_photo_thumb;
  $user_photo = $res->student_photo;
  $id = $res->id;
  ?>

  <body>
    <?php 
    require('header.php');
    ?>

    <main>
      <div>
        <h2><?php echo $user_name; ?></h2>
        <p><?php echo $user_email; ?> - <?php echo $user_roll_no; ?></p>

        <form class="form" method="post">
          <label for="name">Name:</label>
          <input name="name" value="<?php echo $user_name ?>" />

          <label for="email">Email:</label>
          <input type="email" name="email" value="<?php echo $user_email ?>" />

          <label for="password">Password:</label>
          <input name="password" value="<?php echo $user_password ?>" />

          <label for="guardian_name">Guardian Name:</label>
          <input name="guardian_name" value="<?php echo $user_guardian ?>" />

          <label for="phone">Phone number:</label>
          <input name="phone" value="<?php echo $user_phone ?>" />

          <label for="address">Address:</label>
          <input name="address" value="<?php echo $user_address ?>" />

          <div style="display: flex; gap: 1rem;">
            <button name="update" type="submit">Update</button>
            <button name="logout" type="submit">Logout</button>
          </div>
        </form>
      </div>

      <form id="pic-upload" enctype="multipart/form-data"  method="post" class="pic-container">
        <label for="pfp">Profile picture:</label>
        <img id="photo" src="<?php echo $user_photo; ?>" />
        <input type="file" id="pfp" name="pfp" accept="image/png, image/jpeg" />

        <button name="update-pic" type="submit">Update</button>
      </form>
    </main>

    <?php
    if (isset($_POST['logout'])) {
      session_destroy(); 
      header("Location: index.php");
      exit();
    }

    if (isset($_POST['update-pic'])) {
      $file = $_FILES['pfp']['name'];
      $tmp_file = $_FILES['pfp']['tmp_name'];
      $user_dir = "user_data/".$id;
      if (!is_dir($user_dir)) {
        mkdir($user_dir);
      }

      $dest = $user_dir."/".$file;
      move_uploaded_file($tmp_file, $dest);
      $res = mysqli_query($db_con, "UPDATE admissions SET student_photo = '$dest' WHERE id = '$id'");
      if (!$res) {
        die("Failed to update the profile picture");
      }
    }

    if (isset($_POST['update'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $guardian_name = $_POST['guardian_name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];

      $result = mysqli_query($db_con, "UPDATE admissions SET student_name = '$name', student_email = '$email', password = '$password',
      guardian_name = '$guardian_name', mobile_no = '$phone', address = '$address' where id = '$user_session'");
      if (!$result) {
        $status = "failed to update ".mysqli_error($db_con);
      } else {
        $status = "update successfully";
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
#pic-upload {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

#pic-upload button {
  font-size: large;
  padding: 10px 0;
}

main {
  margin: 3rem 0;
  display: flex;
  justify-content: center;
  gap: 2rem;
}

#photo {
  width: 400px;
  height: fit-content;
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
