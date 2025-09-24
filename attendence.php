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

    <?php
    if (isset($_POST["mark"])) {
      $name = $_POST["name"];
      $roll_no = (int)$_POST["roll_no"];
      $month = date("d");
      $year = date("Y");
      $day = date("D");
      $hour = date("g");
      $pm_or_am = date("A");

      $res = mysqli_query($db_con, "SELECT * FROM admissions WHERE student_name = '$name' AND roll_no = '$roll_no'");
      if (!$res) { $staus = "Student does not exists!"; }
      
      $check = mysqli_query($db_con, "INSERT INTO attendence (roll_no, name, year, month, day, hour, pm_or_am) VALUES ('$roll_no', '$name', '$year', '$month', '$day', '$hour', '$pm_or_am')");
      if (!$check) {
        $status = "Failed to insert into the database";
      }

      $status = "Marked Attendence for ".$name; 
    }
    ?>

    <main>
      <form method="post">
        <p><?php echo $status; ?></p>
        <h1 class="title">Mark Online Attendence</h1>

        <input id="name" required name="name" placeholder="Student Name" />
        <input id="roll_no" required name="roll_no" placeholder="Roll no" />
        <img class="student-img" src="images/no-img.jpg" />
        <button name="mark" type="submit">Mark Attendence</button>
      </form>
    </main>

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>

  <script>
    const name = document.getElementById("name");
    const roll_no = document.getElementById("roll_no");

    name.addEventListener("keydown", (event) => {
      console.log(event.target.value);
    });
  </script>
</html>

<style>
.title {
  margin: 1rem 0;
}

main {
  display: flex;
  justify-content: center;
  margin: 5rem 0;
}

main form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

input {
  font-size: large;
  padding: 8px 5px;
}

button[type="submit"] {
  padding: 8px 0;
  font-size: large;
  font-weight: bold;
}
</style>
