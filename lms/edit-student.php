<!DOCTYPE html>
<html>
  <head>
    <!-- meta info -->
    <?php 
    require('config.php');
    require('meta.php');
    ?>
  </head>

  <body>
    <?php 
    require('header.php');

    $id = $_GET["id"];
    if (!$id) {
      die("No id provided!");
    }

    $res = mysqli_query($db_con, "SELECT * FROM admissions WHERE id = '$id'")->fetch_object();
    if (!$res) {
      die("Query failed");
    }

    $name = $res->student_name;
    $email = $res->email;
    $password = $res->password;
    $gender = $res->gender;
    $course = $res->course;
    $guardian = $res->guardian_name;
    $phone = $res->mobile_no;
    $address = $res->address;
    $roll_no = $res->roll_no;
    $course_status = $res->course_status;
    $course_duration = $res->course_duration;
    $photo_thumbnail = $res->student_photo_thumb;
    $photo = $res->student_photo;
    $id = $res->id;

    if ($photo == "" || $photo == "/") {
      $photo = "images/no-img.jpg";
    }
    if ($address == "") {
      $address = "Not mentioned";
    }
    ?>

    <main>
      <div>
        <h2><?php echo $name; ?></h2>
        <p><?php echo $email; ?> - <?php echo $roll_no; ?></p>
        <strong>Unique ID: <?php echo $id; ?></strong>

        <form class="form" method="post">
          <label for="name">Name:</label>
          <input name="name" value="<?php echo $name ?>" />

          <label for="email">Email:</label>
          <input type="email" name="email" value="<?php echo $email ?>" />

          <label for="password">Password:</label>
          <input name="password" value="<?php echo $password ?>" />

          <label for="guardian_name">Guardian Name:</label>
          <input name="guardian_name" value="<?php echo $guardian ?>" />

          <label for="phone">Phone number:</label>
          <input name="phone" value="<?php echo $phone ?>" />

          <label for="address">Address:</label>
          <input name="address" value="<?php echo $address ?>" />

          <button name="update" type="submit">Update</button>
        </form>
      </div>

      <form enctype="multipart/form-data"  method="post" class="pic-container">
        <label for="pfp">Profile picture:</label>
        <img id="pic" src="<?php echo $photo; ?>" />
        <input type="file" id="pfp" name="pfp" accept="image/png, image/jpeg" />

        <button name="update-pic" type="submit">Update</button>
      </form>
    </main>

    <?php
    if (isset($_POST['update-pic'])) {
      $file = $_FILES['pfp']['name'];
    }

    if (isset($_POST['update'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $guardian_name = $_POST['guardian_name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];

      $result = mysqli_query($db_con, "update admissions set student_name = '$name', email = '$email', password = '$password',
      guardian_name = '$guardian_name', mobile_no = '$phone', address = '$address' where id = '$id'");
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
main {
  margin: 5rem 0;
  display: flex;
  justify-content: center;
  gap: 3rem;
}

.pic-container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.pic-container button {
  padding: 1rem 0;
  font-size: 1.3rem;
  font-weight: bold;
}

#pic {
  width: 300px;
  border: 1px solid black;
  border-radius: 4px;
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
