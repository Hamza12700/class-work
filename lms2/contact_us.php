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


<form id="contact_us_form">

<div>
<span>Full Name</span>
<input type="text" name="" />
</div>


<div>
<span>Email Address</span>
<input type="email" name="" />
</div>

<div>
<span>Phone Number</span>
<input type="email" name="" />
</div>

<div>
<span>Subject</span>
<input type="email" name="" />
</div>

<div>
<span>Description</span>
<textarea>
</textarea>
</div>

<button type="submit" class="fas fa-arrow-right" > Submit</button>

</form>





<div class="column_box_content_row">
<div>
<h1>1: Bank Islami Pakistan Limited</h1>
<p>
you can Transfer you Fee directly in our Bank Islami Pakistan Limited
</p>
<span>Account No   : 0414160136</span>
<span>IBAN No      : PK84BKIP0107100414160136</span>
<span>Iftikhar Ahmed Umer</span>

<button onclick="window.open('public_speaking_coure.php','_SELF')">Read More</button>
</div>
<img src="images/bankislami.png">
</div>




<div class="column_box_content_row">
<div>
<h1>2: Easypaisa</h1>
<p>
you can Transfer you Fee directly in our Bank Islami Pakistan Limited
</p>
<span>Account No   : 03212341181</span>
<span>Iftikhar Ahmed Umer</span>

<button onclick="window.open('public_speaking_coure.php','_SELF')">Read More</button>
</div>
<img src="images/easypaisa.png">
</div>




<iframe style="width:100%; height:450px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 15px; border:0; " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1445.8179159519123!2d73.07682869039932!3d33.64116728455049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df9580894c9ce9%3A0xc123c2664904ec6c!2sFedral%20institute%20of%20skills%20rwp!5e0!3m2!1sen!2s!4v1724922906748!5m2!1sen!2s"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


</div>

<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/footer.php');
?>
<script src="<?php echo $java_script; ?>"></script>
</body>
</html>