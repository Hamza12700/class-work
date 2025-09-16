<!DOCTYPE html>
<html>
<head>
<!-- meta info -->
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/lms/meta.php');
?>
</head>

<body>
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/header.php');
?>

<div id="page_container">

<div class="column_box_content_row">
<div>
<h1>1: Public speaking</h1>
<p>
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a 
</p>
<span>Fee: 2999</span>
<span>Duration: 1 Month (12 Classes)</span>
<button onclick="window.open('public_speaking_coure.php','_SELF')">Read More</button>
</div>
<img src="images/public_speaking.png">
</div>

<div class="column_box_content_row">
<div>
<h1>2: Spoken English</h1>
<p>
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a 
</p>

<span>Fee: 13498</span>
<span>Duration: 3 Months (48 Classes)</span>

<button onclick="window.open('english_course.php ','_SELF')">Read More</button>
</div>
<img src="images/spoken_english.png">
</div>

<div class="column_box_content_row">
<div>
<h1>3: Acting</h1>
<p>
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a 
</p>
<span>Fee: 3999</span>
<span>Duration: 1 Month (12 Classes)</span>
<button onclick="window.open('acting_course.php ','_SELF')">Read More</button>
</div>
<img src="images/acting.png">
</div>



</div>

<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/footer.php');
?>

<script src="<?php echo $java_script; ?>"></script>
</body>
</html>