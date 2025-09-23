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

    $student_id = $_GET["id"];
    if (!$student_id) {
      header("Location: /");
      exit();
    }

    $student = mysqli_query($db_con, "SELECT * from admissions WHERE id = '$student_id'")->fetch_object();
    $name = $student->student_name;
    $email = $student->student_email;
    $password = $student->password;
    $roll_no = $student->roll_no;
    $gender = $student->gender;
    $course = $student->course;
    $guardian = $student->guardian_name;
    $phone = $student->mobile_no;
    $address = $student->address;
    $roll_no = $student->roll_no;
    $course_status = $student->course_status;
    $course_duration = $student->course_duration;
    $photo_thumbnail = $student->student_photo_thumb;
    $photo = $student->student_photo;
    $id = $student->id;

    $year = $student->admission_year;
    $month = $student->admission_month;

    if ($photo == "" || $photo == "/") {
      $photo = "images/no-img.jpg";
    }
    if ($address == "") {
      $address = "Not mentioned";
    }

    $results = mysqli_query($db_con, "SELECT * from results WHERE roll_no = '$roll_no'")->fetch_object();
    ?>

    <main>
      <h2><?php echo $name; ?></h2>
      <p><?php echo $email; ?> - <?php echo $roll_no; ?></p>
      <strong>Unique ID: <?php echo $id; ?></strong>

      <form class="form" method="post">
        <label for="total">Total Marks:</label>
        <input type="number" name="total" value="<?php echo $results->total_marks ?>" />

        <label for="marks">Obtain Marks:</label>
        <input type="number" name="marks" value="<?php echo $results->obtain_marks ?>" />

        <button name="submit" type="submit">Submit</button>
      </form>
    </main>

    <?php
    if (isset($_POST["submit"])) {
      $total_marks = (int)$_POST["total"];
      $marks = (int)$_POST["marks"];

      // If the entry doesn't exists then create it
      if (!$results) {
        $check = mysqli_query($db_con, "INSERT INTO results (roll_no, total_marks, obtain_marks) VALUES ('$roll_no', '$total_marks', '$marks')");
        if (!$check) { die("Failed to insert"); }
      }
      else { // Else update it
        $check = mysqli_query($db_con, "UPDATE results set total_marks = '$total_marks', obtain_marks = '$marks' WHERE roll_no = '$roll_no'");
        if (!$check) { die("Failed to insert"); }
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
