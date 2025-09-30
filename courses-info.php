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

    $res = mysqli_query($db_con, "SELECT * FROM courses");
    $total_courses = $res->num_rows;
    ?>

    <div class="title-container">
      <h1 id="title">Total Courses <?php echo $total_courses; ?></h1>
      <a id="add-courses" href="new-course.php"><span style="margin-right: 5px;">+</span>New Course</a>
    </div>

    <main>
      <?php while ($course = $res->fetch_array()) { ?>
      <div class="card">
        <img src="<?php echo $course['image']; ?>" class="image" />
        <div class="content">
          <a href="#">
            <span class="title">
              <?php echo $course['course_name']; ?>
            </span>
          </a>

          <p class="desc">
            <?php echo $course['description']; ?>
          </p>

          <div class="btn-container">
            <a class="action" href="<?php echo 'delete-course.php?id='.$course['id']; ?>">
              Delete
              <span style="font-weight: bold;" aria-hidden="true">
                &#10005;
              </span>
            </a>

            <a data-edit class="action" href="<?php echo 'edit-course.php?id='.$course['id']; ?>">
              Edit
              <span aria-hidden="true">
                →
              </span>
            </a>
          </div>
        </div>
      </div>
      <?php } ?> <!-- Closing while loop -->
    </main>
  </body>
</html>

<style>
#title {
}

.title-container {
  display: flex;
  justify-content: center;
  gap: 2rem;
  margin-top: 4rem;
  align-items: center;
}

#add-courses {
  font-size: 1.5rem;
  text-decoration: none;
  color: white;
  background-color: black;
  padding: 12px;
  border-radius: 5px;
}

main {
  display: flex;
  flex-wrap: warp;
  margin: 2rem 4rem;
  gap: 2rem;
  justify-content: center;
}

.card {
  max-width: 300px;
  border-radius: 0.5rem;
  background-color: #fff;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  border: 1px solid black;
}

.card a {
  text-decoration: none
}

.content {
  padding: 1.1rem;
}

.image {
  object-fit: cover;
  width: 100%;
  height: 150px;
}

.title {
  color: #111827;
  font-size: 1.125rem;
  line-height: 1.75rem;
  font-weight: 600;
}

.desc {
  margin-top: 0.5rem;
  color: #6B7280;
  font-size: 0.875rem;
  line-height: 1.25rem;
}

.action {
  display: inline-flex;
  margin-top: 1rem;
  color: #ffffff;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 500;
  align-items: center;
  gap: 0.25rem;
  /* background-color: #2563EB; */
  background-color: transparent;
  color: black;
  border: 1px solid black;
  padding: 4px 8px;
  border-radius: 4px;
}

.action span {
  transition: .3s ease;
}

.action[data-edit]:hover span {
  transform: translateX(4px);
}

.action:hover {
  background-color: black;
  color: white;
}
</style>
