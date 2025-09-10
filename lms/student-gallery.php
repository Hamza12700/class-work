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

    <h1 id="student-title">Student Gallery</h1>
    <img id="student-main-img" src="images/students.jpg" />

    <h2 class="student-headings">Best students</h2>
    <div class="student-img-container">
      <img src="images/students.jpg" />
      <img src="images/students.jpg" />
      <img src="images/students.jpg" />
    </div>

    <h2 class="student-headings">Awards</h2>
    <div class="student-img-container">
      <img src="images/award.jpg" />
      <img src="images/award.jpg" />
      <img src="images/award.jpg" />
    </div>

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>
</html>

<style>
#student-main-img {
  display: block;
  margin: 40px auto;
  border-radius: 10px;
}

#student-title {
  text-align: center;
  margin: 2rem 0;
}

.student-headings {
  margin: 6rem 0 2rem 0;
  text-align: center;
  font-size: 2rem;
  text-decoration: underline;
}

.student-img-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 2rem;
  margin-bottom: 4rem;
}


.student-img-container img {
  width: 50rem;
  border-radius: 10px;
}
</style>
