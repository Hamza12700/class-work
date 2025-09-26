<!DOCTYPE html>
<html>
  <head>
    <!-- meta info -->
    <?php 
    require('config.php');
    require('meta.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.7/dist/htmx.min.js"></script>
  </head>

  <body>
    <?php 
    require('header.php');

    $student_id = $_GET["id"];
    if (!$student_id) {
      header("Location: /");
      exit();
    }

    $result = mysqli_query($db_con, "SELECT * from admissions WHERE id = '$student_id'")->fetch_object();
    $name = $result->student_name;
    $email = $result->email;
    $password = $result->password;
    $roll_no = $result->roll_no;
    $gender = $result->gender;
    $guardian = $result->guardian_name;
    $phone = $result->mobile_no;
    $address = $result->address;
    $roll_no = $result->roll_no;
    $course_status = $result->course_status;
    $course_duration = $result->course_duration;
    $photo_thumbnail = $result->student_photo_thumb;
    $photo = $result->student_photo;
    $id = $result->id;

    $year = $result->admission_year;
    $month = $result->admission_month;

    if ($photo == "" || $photo == "/") {
      $photo = "images/no-img.jpg";
    }
    if ($address == "") {
      $address = "Not mentioned";
    }
    ?>

    <main>
      <a href="/admin.php" class="backarrow">&Larr;</a>

      <div class="container">
        <img id="student-pic" src="<?php echo $photo; ?>" />
        <div>
          <h1><?php echo $name; ?></h1>
          <p>Roll no: <?php echo $roll_no; ?></p>
          <p>Date: <?php echo $year.'/'.$month; ?></p>

          <div class="btn-container">
            <a href="<?php echo 'edit-student.php?id='.$id; ?>">Edit</a>
            <a href="<?php echo 'student-results.php?id='.$id; ?>">Results</a>
            <button
              hx-get="/student-attendence.php?roll_no=<?php echo $roll_no; ?>"
              hx-trigger="click"
              hx-target="#static-results"
              id="fetch-attendance"
              >
              Attendance</button>
            <a href="">Certs</a>
          </div>
        </div>
      </div>
    </main>
    <div id="static-results"></div>

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>
</html>


<style>
main {
  display: flex;
  justify-content: center;
  margin: 5rem 0;
  gap: 2rem;
}

.backarrow {
  font-size: 2rem;
  text-decoration: none;
  color: black;
}

.container {
  display: flex;
  gap: 2rem;
  justify-content: center;
}

.btn-container {
  margin-top: 1.5rem;
  padding-top: 1.5rem;
  border-top: 1px solid black;
}

button[disabled] {
  background-color: #aaaaaa;
  cursor: not-allowed;
}

.btn-container a,button {
  font-size: large;
  font-weight: bold;
  cursor: pointer;
  color: black;
  padding: 8px;
  border: 1px solid black;
  border-radius: 4px;
  text-decoration: none;
  background-color: transparent;
}

#student-pic {
  border: 1px solid black;
  height: fit-content;
  border-radius: 4px;
  width: 300px;
}

#static-results {
  margin: 3rem 0;
}

</style>
