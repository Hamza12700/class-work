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
    ?>

    <main style="margin: 0 2rem;">
      <h1>Admin Panel<h1>

        <div id="container">

        <?php
          $result = mysqli_query($db_con, "SELECT * FROM admissions"); 
          while ($user = mysqli_fetch_array($result)) {
            $user_name = $user["student_name"];
            $user_email = $user["email"];
            $user_password = $user["password"];
            $user_roll_no = $user["roll_no"];
            $user_gender = $user["gender"];
            $user_course = $user["course"];
            $user_guardian = $user["guardian_name"];
            $user_phone = $user["mobile_no"];
            $user_address = $user["address"];
            $user_roll_no = $user["roll_no"];
            $user_course_status = $user["course_status"];
            $user_course_duration = $user["course_duration"];
            $user_photo_thumbnail = $user["student_photo_thumb"];
            $user_photo = $user["student_photo"];
          ?>

          <div class="student-card">
            <p class="student-title"><?php echo $user_name; ?></p>

            <?php
            if ($user_photo == "" || $user_photo == "/") {
              $user_photo = "images/no-img.jpg";
            }
            if ($user_address == "") {
              $user_address = "Not mentioned";
            }
            ?>

            <img src="<?php echo $user_photo; ?>" />
            <p class="student-desc"><?php echo $user_course ?> | <?php echo $user_address ?></p>
          </div>

        <?php } ?> <!-- Closing the while loop -->
        </div>
    </main>

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>
</html>

<style>
h1 {
  margin: 2rem 0;
}

#container {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
}

.student-card {
  border: 2px solid black;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 1rem;
  border-radius: 5px;
}


.student-card img {
  width: 300px;
}

.student-title {
  margin: 1rem 0;
  text-align: center;
  font-size: 1.6rem;
}

.student-desc {
  width: 300px;
  font-size: 1.3rem;
  background-color: #ea1273;
  color: white;
  padding: 1rem;
}
</style>
