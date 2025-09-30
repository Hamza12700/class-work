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
    <form class="form" method="post" enctype="multipart/form-data">
      <p><?php echo $status; ?></p>
      <a href="courses-info.php" style="font-size: 2rem; text-decoration: none; color: black;">&Larr;</a>
      <fieldset>
        <legend>New Course</legend>

        <div class="parent-container">
          <div class="container">
            <label for="name">Course Name:</label>
            <input required name="name" />

            <label for="duration">Course Duration:</label>
            <input required name="duration" />

            <label for="fee">Course Fee:</label>
            <input required name="fee" />

            <label for="desc">Course Description:</label>
            <textarea required minlength="20" maxlength="1000" name="desc"></textarea>
          </div>

          <div class="img-container">
            <label style="margin-bottom: 1rem;" for="course-img">Thumbnail</label>
            <img id="output-img" src="images/no-img.jpg" />
            <input onchange="display_image(event)" required name="course-img" type="file" accept="image/*" />
          </div>

          <script>
          function display_image(event) {
            const link = document.getElementById("output-img");
            link.src = URL.createObjectURL(event.target.files[0]);
          }
          </script>
        </div>

      </fieldset>

      <button name="create" type="submit">Create</button>
    </form>
  </body>
</html>

<?php
if (isset($_POST['create'])) {
  $name = $_POST['name'];
  $duration = $_POST['duration'];
  $fee = $_POST['fee'];
  $desc = $_POST['desc'];

  $img = $_FILES['course-img']['name'];
  $tmp_img = $_FILES['course-img']['tmp_name'];
  $dest = "images/".$img;
  move_uploaded_file($tmp_img, $dest) or die("failed to move uploaded file");
  mysqli_query($db_con, "INSERT INTO courses (course_name, course_duration, course_fee, image, description) VALUES ('$name', '$duration', '$fee', '$dest', '$desc')") or die("Failed to craete course");
  $status = "Successful Created";
}
?>

<style>
.img-container {
  display: flex;
  flex-direction: column;
  border-left: 1px solid black;
  padding-left: 1rem;
  margin-left: 1rem;
}

.parent-container {
  display: flex;
  justify-content: center;
}

legend {
  background-color: black;
  color: white;
  padding: 12px;
}

.container {
  display: flex;
  flex-direction: column;
}

fieldset {
  padding: 1rem;
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.form img {
  width: 550px;
  object-fit: cover;
}

.form button {
  background-color: black;
  color: white;
  cursor: pointer;
  padding: 1rem;
  font-size: 1.4rem;
  font-weight: bold;
  font-family: auto;
  width: fit-content;
  margin-top: 1rem;
  display: flex;
  justify-self: end;
  border-radius: 4px;
}

.form {
  margin: 4rem auto;
  width: fit-content;
}

.form input {
  width: 450px;
  padding: 6px;
  font-size: large;
  margin: 10px 0 20px 0;
}

.form label {
  font-size: larger;
  font-weight: bold;
}

.form textarea {
  width: 450px;
  height: 150px;
  padding: 6px;
  font-size: large;
  margin: 10px 0 20px 0;
}
</style>
