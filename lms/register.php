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
    <form id="registration_form" method="post" target='_self' enctype="multipart/form-data">
      <p style="text-align: center; padding:10px;">Registration Form</p>
      <fieldset>
        <legend> Student Photo </legend>
        <div id='student_photo_uploader'>
          <script>
            var student_photo_preview = function(event) {
              var student_photo_output = document.getElementById('student_photo_output');
              student_photo_output.src = URL.createObjectURL(event.target.files[0]);
            };
          </script>

          <label class="fal fa-camera" title="Click to upload photo" for="student_photo_input">
            <input type='file' id="student_photo_input" style="display:none;" name='student_photo' accept='image/*' onchange='student_photo_preview(event)'/>
          </label>

          <img src="images/user.png" id='student_photo_output'/>
        </div>
      </fieldset>

      <fieldset>
        <legend> Student Details </legend>
        <input type="text" placeholder="Student Name (Required)" name="student_name"  >
        <input type="email" placeholder="Email (Required)" name="student_email"  >

        <input type="text" placeholder="Guardian's Full Name" name="guardian_name">
        <input type="text" placeholder="Date of Birth [DD/MM/YY]" name="dob">
        <input type="text" placeholder="Address" name="address">
        <input type="text" placeholder="Student Mobile No" name="mobile_no">
        <input type="text" placeholder="Guardian's Mobile no" name="guardian_mobile_no">
        <select name="gender">
          <option>Male</option>
          <option>Female</option>
        </select>

      </fieldset>



      <fieldset>
        <legend> Choose Course </legend>

        <div id="course_container">
          <?php
          $fetch = "SELECT * from courses";
          $query = mysqli_query($db_con,$fetch);
          while($courses = mysqli_fetch_array($query)){
          $course = $courses['course_name'];
          $course_code = $courses['course_code'];
          $course_short_name = $courses['course_short_name'];
          $course_fee = $courses['course_fee'];
          ?>
          <p>
            <input type="checkbox" required onchange="totalCourseFee()" class="checkbox_course_name" name="course[]" value="<?php echo $course_fee; ?>" > <?php echo $course; ?> 
            <input type="hidden" name="course_short_name" value="<?php echo $course_short_name; ?>" >
          </p>
          <?php
          }
          ?>
        </div>
      </fieldset>

      <fieldset>
        <legend> Choose Course Duration </legend>

        <select name="course_duration">
          <option>1 Month</option>
          <option selected>2 Months</option>
          <option>3 Months</option>
          <option>6 Months</option>
        </select>

      </fieldset>

      <fieldset>
        <legend> Fee Status Upload your Payment Receipt</legend>
        <input type="number" name="total_course_fee" id="course_fee_input" value="" placeholder="Total Course Fee">
        <input type="number" name="received_course_fee" placeholder="Received Course Fee">
        <input type="number" name="pending_course_fee" placeholder="Pending Course Fee" value="">

        <select name="fee_status">
          <option>Cleared</option>
          <option>Pending</option>
        </select>

        <div id='student_photo_uploader'>
          <script>
            var student_photo_preview = function(event) {
              var student_photo_output = document.getElementById('student_photo_output');
              student_photo_output.src = URL.createObjectURL(event.target.files[0]);
            };
          </script>

          <label class="fal fa-camera" title="Click to upload photo" for="student_photo_input">
            <input type='file' id="student_photo_input" style="display:none;" name='student_photo' accept='image/*' onchange='student_photo_preview(event)'/>
          </label>

          <img src="images/cheque.png" id='student_photo_output'/>
        </div>

      </fieldset>
      <input type="submit" name="admission" value="Register">
    </form>

    <script src="<?php echo $java_script; ?>"></script>
  </body>
</html>


<?php
if(isset($_POST['admission'])){
  $student_name = $_POST['student_name'];

  $student_email = $_POST['student_email'];


  $mobile_no = $_POST['mobile_no'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];

  $address = $_POST['address'];


  $course = $_POST['course'];

  $course_short_name = $_POST['course_short_name'];


  $course_array="";
  foreach($course as $item){
    $course_array.= $item.",";  
  }
  // rtrim Remove characters from the right side of a string:
  $course_array = rtrim($course_array,",");
  // exit();

  $course_duration = $_POST['course_duration'];

  $guardian_name = $_POST['guardian_name'];
  $guardian_mobile_no = $_POST['guardian_mobile_no'];


  $admission_day =  date('j');   //j - The day of the month without leading zeros (1 to 31)
  $admission_month =  date('n');   //n - A numeric representation of a month, without leading zeros (1 to 12)
  $admission_year =  date('Y');   //Y - A four digit representation of a year

  $last_id_query = 'SELECT id FROM admissions ORDER BY id DESC LIMIT 1';
  $last_id_result = mysqli_query($db_con,$last_id_query);
  $last_id_row = mysqli_fetch_assoc($last_id_result);
  $last_id = $last_id_row['id'];



  $roll_no = $course_short_name."-".$last_id."-".$admission_year;




  $class_timing = $_POST['class_timing'];

  $total_course_fee = $_POST['total_course_fee'];
  $received_course_fee = $_POST['received_course_fee'];
  $pending_course_fee = $_POST['received_course_fee'];
  $fee_status = $_POST['fee_status'];
  $course_status = $_POST['course_status'];


  $check_fetch = "SELECT * FROM admissions WHERE roll_no = '$roll_no' ";
  $check_query = mysqli_query($db_conn,$check_fetch); 

  $check=mysqli_num_rows($check_query);

  if($check > 0){

    $status = "Student Is already Added...";

    echo "<script>setTimeout(function () {window.location.href = 'admission.php'}, 2000)</script>"; 

  }

  else {

    if (empty($_FILES['student_photo']['name'])) {
      $folder = "images/user.png";
      $student_photo_thumb = "images/user.png";
    }

    else {
      $student_photo = $_FILES['student_photo']['name'];
      $student_photo_tmp = $_FILES['student_photo']['tmp_name'];
      $student_photo_type = $_FILES["student_photo"]["type"];    // image/png

      $folder = "/user_data/".$roll_no."/student_photo/".$student_photo;
      $student_photo_thumb = "/user_data/".$roll_no."/student_photos/thumbs/".$student_photo;
      move_uploaded_file($student_photo_tmp, $folder);


      // create images thumbs
      function make_thumb($src, $dest, $desired_width) {

        /* read the source image */
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
      }

      $src=$folder;

      $dest = $student_photo_thumb;


      $desired_width="250";
      make_thumb($src, $dest, $desired_width);

      // end create images thumbs

    }


    $insert = "insert into admissions (
    student_name,
    student_photo,
    student_photo_thumb,
    mobile_no,
    gender,
    dob,
    address,
    course_code,
    course_duration,
    class_timing,
    guardian_name,
    guardian_mobile_no,
    admission_day,
    admission_month,
    admission_year,
    roll_no,
    password,
    branch,
    total_course_fee,
    received_course_fee,
    pending_course_fee,
    fee_status,
    course_status
    )
    values
    (
    '$student_name',
    '$folder',
    '$student_photo_thumb',
    '$mobile_no',
    '$gender',
    '$dob',
    '$address',
    '$course_array',
    '$course_duration',
    '$class_timing',
    '$guardian_name',
    '$guardian_mobile_no',
    '$admission_day',
    '$admission_month',
    '$admission_year',
    '$roll_no',
    'fits',
    '$branch',
    '$total_course_fee',
    '$received_course_fee',
    '$pending_course_fee',
    '$fee_status',
    '$course_status'
    )";

    $query = mysqli_query($db_conn,$insert);
    if ($query){
      $status = "Student Added Successfully...";
      echo "<script>setTimeout(function () {window.location.href = 'admission.php'}, 1000)</script>"; 
    } 

    if(!$query ) {
      die('Could not insert data: ' . mysqli_error($db_conn));
    }

  }

}
// mysqli_close($db_conn);
?>
