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
          $page_no = $_GET['page_no'];
          if (!isset($page_no)) { $page_no = 1; }
          if ($page_no <= 0) { $page_no = 1; }

          $total_students = mysqli_query($db_con, "SELECT COUNT(*) AS students FROM admissions");
          $students_count = mysqli_fetch_array($total_students)['students'];
          $total_pages = ceil($students_count / $student_fetch_count);

          if ($page_no > $total_pages) { $page_no = $total_pages; }

          $offset = ($page_no-1) * $student_fetch_count;
          $result = mysqli_query($db_con, "SELECT * FROM admissions LIMIT $offset, $student_fetch_count"); 
          while ($user = mysqli_fetch_array($result)) {
            $name = $user["student_name"];
            $email = $user["student_email"];
            $password = $user["password"];
            $roll_no = $user["roll_no"];
            $gender = $user["gender"];
            $guardian = $user["guardian_name"];
            $phone = $user["mobile_no"];
            $address = $user["address"];
            $roll_no = $user["roll_no"];
            $course_status = $user["course_status"];
            $course_duration = $user["course_duration"];
            $photo_thumbnail = $user["student_photo_thumb"];
            $photo = $user["student_photo"];
            $user_id = $user["id"];
          ?>

          <div class="student-card" onclick="student_info(<?php echo $user_id; ?>)">
            <p class="student-title"><?php echo $name; ?> - <?php echo $roll_no; ?></p>

            <?php
            if (!file_exists($photo)) {
              $photo = "images/no-img.jpg";
            } 

            if ($address == "") {
              $address = "Not mentioned";
            }
            ?>

            <img src="<?php echo $photo; ?>" />
            <p class="student-desc"><?php echo $course_status ?> | <?php echo $address ?></p>
          </div>
        <?php } ?> <!-- Closing the while loop -->
        </div>

        <nav aria-label="pagination">
          <div>
            <ul class="pagination">
              <li>
                <a onclick="change_url('page_no', <?php echo $page_no-1; ?>)">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="visuallyhidden">previous set of pages</span>
                </a>
              </li>
              <li>
                <a href=""><span class="visuallyhidden">page </span>
                  <?php echo $page_no; ?>
                </a>
              </li>
              <li>
                <a onclick="change_url('page_no', <?php echo $page_no+1; ?>)">
                  <span class="visuallyhidden">next set of pages</span
                  ><span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </div>

          <strong>Showing Page <?php echo $page_no." of ".$total_pages; ?></strong>
        </nav>
    </main>

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>

  <script>
  function change_url(arg, value){
    var url = new URL(window.location.href);
    var parameter_to_change = url.searchParams;

    // new value of "id" is set to "101"
    parameter_to_change.set(arg, value);

    // change the search property of the main url
    url.search = parameter_to_change.toString();

    // the new url string
    var new_url = url.toString();

    // console.log(new_url);
    window.open(new_url,'_SELF')
  }

  function student_info(id) {
    window.open(`/student-info.php?id=${id}`, "_SELF");
  }
  </script>
</html>

<style>
.visuallyhidden {
  border: 0;
  clip: rect(0 0 0 0);
  height: auto;
  margin: 0;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
  white-space: nowrap;
}

nav strong {
  font-size: 1.2rem;
}

nav {
  border-top: 1px solid #eeeeee;
  margin-top: 1em;
  padding-top: 0.5em;
  font: 1.5rem sans-serif;

  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.pagination {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.pagination li {
  margin: 0 1px;
}

.pagination a {
  display: block;
  padding: 0.5em 1em;
  border: 1px solid #999999;
  border-radius: 0.2em;
  text-decoration: none;
  cursor: pointer;
}

.pagination a[aria-current="page"] {
  background-color: #333333;
  color: white;
}

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
  cursor: pointer;
}

.student-card img {
  width: 300px;
}

.student-title {
  margin: 1rem 0;
  text-align: center;
  font-size: 1.4rem;
}

.student-desc {
  width: 300px;
  font-size: 1rem;
  background-color: #ea1273;
  color: white;
  padding: 1rem;
}
</style>
