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

<div id="programs_container">

<div class="program">
<div>
<h1>Public speaking</h1>
<p>
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a 
</p>
<button onclick="window.open('public_speaking_coure.php','_SELF')">Read More</button>
</div>
<img src="images/public_speaking.png">
</div>

<div class="program">
<div>
<h1>Spoken English</h1>
<p>
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a 
</p>
<button>Read More</button>
</div>
<img src="images/spoken_english.png">
</div>

<div class="program">
<div>
<h1>Acting</h1>
<p>
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a 
</p>
<button>Read More</button>
</div>
<img src="images/acting.png">
</div>



</div>


<script src="<?php echo $java_script; ?>"></script>
</body>
</html>
