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

    <h1 id="title">About Us</h1>
    <p id="title-desc">
      Distinctio laudantium necessitatibus id excepturi velit laboriosam. Et dolorum quis harum maiores nisi ex deserunt. Alias deleniti sit expedita consequatur deleniti. Dolorum quam quidem deleniti labore tenetur corrupti eum.
    </p>

    <div id="container">
      <div>
        <h2>We are here to help kids <span style="color: #06c929">learn</span> and grow and achieve their dreams!</h2>
        <p>
          Distinctio laudantium necessitatibus id excepturi velit laboriosam. Et dolorum quis harum maiores nisi ex deserunt. Alias deleniti sit expedita consequatur deleniti. Dolorum quam quidem deleniti labore tenetur corrupti eum.
        </p>

        <p>
          Distinctio laudantium necessitatibus id excepturi velit laboriosam. Et dolorum quis harum maiores nisi ex deserunt. Alias deleniti sit expedita consequatur deleniti. Dolorum quam quidem deleniti labore tenetur corrupti eum.
        </p>
      </div>
      <img src="images/students.jpg" />
    </div>

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>
</html>

<style>
#title {
  text-align: center;
  margin: 2rem 0 1rem 0;
}

#title-desc {
  text-align: center;
  width: 650px;
  margin: 1rem auto;
  font-size: large;
}

#container {
  display: flex;
  justify-content: center;
  gap: 2rem;
  width: 1200px;
  margin: 5rem auto 4rem auto;
}

#container img {
  width: 700px;
  border-radius: 10px;
}

#container h2 {
  font-size: 2rem;
  margin-bottom: 1rem;
}

#container p {
  margin-top: 1rem;
}
</style>
