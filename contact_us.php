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
<span>Phone Number</span>
<input type="email" name="" />
</div>

<div>
<span>Phone Number</span>
<textarea>
</textarea>
</div>

<button type="submit" class="fas fa-arrow-right" > Submit</button>

</form>



<iframe style="width:100%; height:450px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 15px; border:0; " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1445.8179159519123!2d73.07682869039932!3d33.64116728455049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df9580894c9ce9%3A0xc123c2664904ec6c!2sFedral%20institute%20of%20skills%20rwp!5e0!3m2!1sen!2s!4v1724922906748!5m2!1sen!2s"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


</div>


<script src="<?php echo $java_script; ?>"></script>
</body>
</html>
