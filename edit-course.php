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

    $id = (int)$_GET["id"];
    if (!$id) {
      location("/");
      exit();
    }

    $res = mysqli_query($db_con, "SELECT * FROM courses WHERE id = '$id'")->fetch_object();
    ?>

    <form class="form" method="post" enctype="multipart/form-data">
      <a href="courses-info.php" style="font-size: 2rem; text-decoration: none; color: black;">&Larr;</a>
      <fieldset>
        <legend>Edit Course Information</legend>

        <div class="parent-container">
          <div class="container">
            <label for="name">Course Name:</label>
            <input name="name" value="<?php echo $res->course_name ?>" />

            <label for="duration">Course Duration:</label>
            <input name="duration" value="<?php echo $res->course_duration ?>" />

            <label for="fee">Course Fee:</label>
            <input name="fee" value="<?php echo $res->course_fee ?>" />

            <label for="desc">Course Description:</label>
            <textarea minlength="20" maxlength="1000" name="desc"><?php echo $res->description ?></textarea>
          </div>

          <div class="img-container">
            <label style="margin-bottom: 1rem;" for="course-img">Course Image</label>
            <img src="<?php echo $res->image ?>" />
            <input name="course-img" type="file" accept="image/*" />
          </div>
        </div>

        <button name="update" type="submit">Update</button>
      </fieldset>
    </form>
  </body>
</html>

<?php
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $duration = $_POST['duration'];
  $fee = $_POST['fee'];
  $desc = $_POST['desc'];

  $img = $_FILES['course-img']['name'];
  if ($img) {
    $dest = "images/".$img;
    $tmp_img = $_FILES['course-img']['tmp_name'];
    move_uploaded_file($tmp_img, $dest) or die("Failed to move uploaded file");
    mysqli_query($db_con, "UPDATE courses SET image = '$dest' WHERE id = '$id'") or die("Failed to update image");
  }
  
  mysqli_query($db_con, "UPDATE courses SET course_name = '$name', course_duration = '$duration', course_fee = '$fee', description = '$desc' WHERE id = '$id'") or die("Failed to update");
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
  padding: 15px 0;
  font-size: 1.4rem;
  font-weight: bold;
}

.form {
  margin: 4rem auto;
  width: 1200px;
}

.form input {
  width: 300px;
  padding: 6px;
  font-size: large;
  margin: 10px 0 20px 0;
}

.form label {
  font-size: larger;
  font-weight: bold;
}

.form textarea {
  width: 600px;
  height: 150px;
  padding: 6px;
  font-size: large;
  margin: 10px 0 20px 0;
}
</style>
