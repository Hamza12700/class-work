<?php
require('config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html>
<head>
<!-- meta info -->
<?php 

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
$course_duration = $courses['course_duration'];

?>



<p>
<input type="checkbox"  onchange="totalCourseFee()" class="checkbox_course_name" name="course[]" data-course-fee="<?php echo $course_fee; ?>" value="<?php echo $course_code; ?>" > <?php echo $course; ?> (<?php echo $course_duration; ?> )



</p>

<?php
}
?>


</div>
</fieldset>













<fieldset>
<legend> Fee Status Upload your Payment Receipt</legend>
<input type="number" name="total_course_fee" id="course_fee_input" value="" placeholder="Total Course Fee">





<div id='student_photo_uploader'>
<script>
var fee_receipt_preview = function(event) {
var fee_receipt_output = document.getElementById('fee_receipt_output');
fee_receipt_output.src = URL.createObjectURL(event.target.files[0]);
};
</script>

<label class="fal fa-camera" title="Click to upload photo" for="fee_receipt_input">
<input type='file' id="fee_receipt_input" style="display:none;" name='fee_receipt' accept='image/*' onchange='fee_receipt_preview(event)'/>
</label>

<img src="images/cheque.png" id='fee_receipt_output'/>

</div>



</fieldset>



<input type="submit" name="admission" value="Register">






</form>
<?php include('footer.php') ?>
<script src="<?php echo $java_script; ?>"></script>
</body>
</html>




<?php
if(isset($_POST['admission'])){
$student_name = $_POST['student_name'];
$student_email = $_POST['student_email'];
$guardian_name = $_POST['guardian_name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$mobile_no = $_POST['mobile_no'];
$guardian_mobile_no = $_POST['guardian_mobile_no'];
$gender = $_POST['gender'];



$admission_day =  date('j');   //j - The day of the month without leading zeros (1 to 31)
$admission_month =  date('n');   //n - A numeric representation of a month, without leading zeros (1 to 12)
$admission_year =  date('Y');   //Y - A four digit representation of a year



$course = $_POST['course'];


$course_array="";
foreach($course as $item){
$course_array.= $item.",";  
}
// rtrim Remove characters from the right side of a string:
$course_array = rtrim($course_array,",");
// exit();


$total_course_fee = $_POST['total_course_fee'];
$course_status = 'Continue';


$last_id_query = 'SELECT roll_no FROM admissions ORDER BY id DESC LIMIT 1';
$last_id_result = mysqli_query($db_con,$last_id_query);
$last_id_row = mysqli_fetch_assoc($last_id_result);
$last_id = $last_id_row['roll_no'];

$roll_no = $last_id += 1;



// fee Receipt

if (empty($_FILES['fee_receipt']['name'])) {
$fee_receipt_link = "images/cheque.png";
}
else {
$fee_receipt = $_FILES['fee_receipt']['name'];
$fee_receipt_tmp = $_FILES['fee_receipt']['tmp_name'];
$fee_receipt_type = $_FILES["fee_receipt"]["type"];    // image/png 

$fee_receipt_folder = "user_data/".$roll_no."/fee_receipt/";
$fee_receipt_link = $fee_receipt_folder.$fee_receipt;

if (!is_dir($fee_receipt_folder)) {
mkdir($fee_receipt_folder, 0755, true);
}
move_uploaded_file($fee_receipt_tmp, $fee_receipt_link);
}


// Student Photo

if (empty($_FILES['student_photo']['name'])) {
$folder = "images/user.png";
$student_photo_thumb = "images/user.png";
}

else {
$student_photo = $_FILES['student_photo']['name'];
$student_photo_tmp = $_FILES['student_photo']['tmp_name'];
$student_photo_type = $_FILES["student_photo"]["type"];    // image/png

$folder = "user_data/".$roll_no."/student_photo/";
$student_photo_link = $folder.$student_photo;


$student_photo_thumb = "user_data/".$roll_no."/student_photo/thumbs/";
$student_photo_thumb_link = $student_photo_thumb.$student_photo;


if (!is_dir($folder)) {
    mkdir($folder, 0755, true);
}

if (!is_dir($student_photo_thumb)) {
    mkdir($student_photo_thumb, 0755, true);
}


move_uploaded_file($student_photo_tmp, $folder.$student_photo);


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

$src=$folder.$student_photo;

$dest = $student_photo_thumb.$student_photo;


$desired_width="250";
make_thumb($src, $dest, $desired_width);

// end create images thumbs

}


// exit();























$insert = "insert into admissions (

student_photo,
student_photo_thumb,

student_name,
student_email,
guardian_name,
dob,
address,
mobile_no,
guardian_mobile_no,
gender,


course_code,


admission_day,
admission_month,
admission_year,


end_day,
end_month,
end_year,

roll_no,

password,


total_course_fee,
fee_receipt,
course_status
)
values
(

'$student_photo_link',
'$student_photo_thumb_link',

'$student_name',
'$student_email', 
'$guardian_name',
'$dob',
'$address',
'$mobile_no',
'$guardian_mobile_no',
'$gender',
'$course_array',
'$admission_day',
'$admission_month',
'$admission_year',

'0',
'0',
'0',

'$roll_no',
'speaknact',
'$total_course_fee',
'$fee_receipt_link',
'$course_status'
)";




$query = mysqli_query($db_con,$insert);


if ($query){

// $status = "Student Added Successfully...";

echo "<script>setTimeout(function () {window.location.href = 'register.php'}, 1000)</script>"; 




} 




if(!$query ) {
die('Could not insert data: ' . mysqli_error($db_conn));
}








}
// mysqli_close($db_conn);
?>