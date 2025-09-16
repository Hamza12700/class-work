<!DOCTYPE html>
<html>
<head>

<!-- meta info -->
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/islamicestore/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/islamicestore/meta.php');



if(!isset($_SESSION['username']) )   
{  
echo "<script> window.location='signin.php'</script>";

}

?>
<style>

.column_form{
display: flex;
flex-direction: column;
}

.column_form div{
display: flex;
}


.row_form{
display: flex;
flex-direction: row;
}

.form_style{

border:1px solid #ccc;
width:60%;
margin:0 auto;
background: #eee;
padding: 15px 20px;
border-radius:5px;
}

.form_style input,select{
padding:10px;
margin: 5px 0;
border:1px solid #101010;
border-radius:3px;
}
form div {

	/*border:1px solid green;*/
	display: flex;
	align-items: center;
}

form div span{
	/*border:1px solid green;*/
	width:20%;
	/*width: fit-content;*/
}
#product_photo_container,#favicon_container,#logo_container{
	border:1px solid yellow;
	display: flex;
	justify-content: center;
	align-items: center;
}

#product_photo_view, #favicon_view, #logo_view{
border:1px solid #ccc;	
width:150px;
height:150px; /* must set a specified height for backgroung image */


 background-image: url("images/no_image.jpg"); /* The image used */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: 100% 100%; /* Resize the background image to cover the entire container */


}


#product_photo_container,#favicon_container,#logo_container input{
	border:0;
/*	height:10%;*/
/*	width:100%;*/
/*	background: blue;*/
}


h4{
	/*border:1px solid blue;*/
	width:60%;
	margin: 0 auto;
	padding:15px 25px;
	text-shadow: 0 0 1px #000;
	letter-spacing: 1px;
	font-weight: normal;
}
#orders_container{
	border:1px solid #ccc;
background: #eee;
margin:0 auto;
width:60%;
max-height:500px;
border-radius: 5px;
}

#orders_container {
	display: flex;
	flex-direction: column;

}

#orders_container p {
	display: flex;
	justify-content: space-between;
	border:1px solid green;
	padding: 10px;
	margin: 10px 0;

}

#orders_container p span {
/*	width:fit-content;*/
flex:1;
/*	border:1px solid blue;*/
}

.status {
	border:1px dashed #ccc;
	padding:10px;
	margin:5px 0;
	text-align: left;
}
</style>
</head>

<body>

<?php
require($_SERVER['DOCUMENT_ROOT'].'/islamicestore/header.php');
?>



<di id="page_heading">
<div id="page_heading_left_side"></div><p id="welcome_text">Secure Admin Panel</p><div id="page_heading_right_side"></div>
</di>



<a href="logout.php">Logout</a>


<h4>Orders</h4>

<div id="orders_container">
<?php
  $sr_no=1;

$fetch = "SELECT  customer_session_id,order_day,order_month,order_year,sub_total_bill,total_products FROM orders GROUP BY customer_session_id,order_day,order_month,order_year,sub_total_bill,total_products ";

$query = mysqli_query($db_con,$fetch);


while($category = mysqli_fetch_array($query)){
 $customer_session_id = $category['customer_session_id'];
 $order_day = $category['order_day'];
 $order_month = $category['order_month'];
 $order_year = $category['order_year'];
 $sub_total_bill = $category['sub_total_bill'];
 $total_products = $category['total_products'];


echo "<p><span>Order No:".$sr_no."</span><span>Total Products:".$total_products."</span><span>Total Amount:".$sub_total_bill."</p>";
 $sr_no++;
}



?>
</div>







<h4>Add Product Form </h4>

<form  class="column_form form_style" onsubmit="validate_add_product_form(event)" method="post" enctype="multipart/form-data">
<input type="text" placeholder="Product Name" value="" name="p_name">

<select name="p_category" id="p_category" required  >

<?php


$fetch = "SELECT * from categories";
$query = mysqli_query($db_con,$fetch);
while($category = mysqli_fetch_array($query)){
$categories = $category['c_name'];
$categories_id = $category['id'];
$search_keywords = $category['search_keywords'];


?>
<option data-search-keywords="<?php echo $search_keywords; ?>" value="<?php echo $categories_id; ?>"><?php echo $categories; ?></option>

<?php
}
?>
</select>

<input  type="number" autocomplete placeholder="Quantity" name="p_quantity" value="<?php echo rand(50,2500);?>" required>
<input  type="number" placeholder="Product Price" name="p_price" value="<?php echo rand(1000,2500);?>" required>


<div id="product_photo_container">

<input  type="file" id="product_photo_input"  name="p_image" accept="image/*" onchange="preview_image_before_upload(event)" required />
<div id="product_photo_view"></div>

</div>



<textarea id="search_keywords"  placeholder="Search Keywords" name="search_keywords" required>prayer mat mats jai namaz ja namaz janamaz</textarea>

<input type="submit" value="Add Product" name="add_product" style="background: #2eb774;">
</form>

<script>
function preview_image_before_upload(event) {
var product_photo_view = document.getElementById('product_photo_view');
 product_photo_view.style.backgroundImage = "url('"+URL.createObjectURL(event.target.files[0])+"')";
 product_photo_view.style.backgroundSize = "contain";
 product_photo_view.style.backgroundRepeat = "no-repeat";
 product_photo_view.style.backgroundPosition = "center center";
}


var p_category = document.getElementById('p_category');
var search_keywords = document.getElementById('search_keywords');




p_category.onchange=function(){
	
  // console.log(this.options[this.selectedIndex].getAttribute("data-search-keywords"));


let search_keywords_names = this.options[this.selectedIndex].getAttribute("data-search-keywords");
// alert(search_keywords_names);
search_keywords.value= search_keywords_names;

}












</script>


<h4>Add Category</h4>



<form  class="column_form form_style" method="post" enctype="multipart/form-data">
<input type="text" placeholder="Category Name" name="c_name">
<textarea placeholder="Search Keywords Name" name="search_keywords"></textarea>
<input type="submit" value="Add" name="add_category" style="background: #2eb774;">
</form>

<h4>View Categories</h4>


<?php
$c_fetch = "SELECT * from categories";
$c_query = mysqli_query($db_con,$c_fetch);
while($category = mysqli_fetch_array($c_query)){
$c_name = $category['c_name'];
$search_keywords = $category['search_keywords'];	
$id = $category['id'];


?>
<form  class="column_form form_style" method="post" >
<input type="text" name="c_name" value="<?php echo $c_name;?>">
<textarea  name="search_keywords"><?php echo $search_keywords;?></textarea>
<input type="hidden" name="id" value="<?php echo $id;?>">

<div>
<button type="submit" name="c_update" class="fal fa-pencil" style="background: #2eb774; color:#fff;"></button>
<button type="submit" name="c_delete" class="fal fa-trash-alt" style="background: #f7454a; color:#fff;"></button>
</div>
</form>
<?php
}
?>







































<h4>Login Credentials</h4>



<?php
$fetch = "SELECT * from users";
$query = mysqli_query($db_con,$fetch);
while($user = mysqli_fetch_array($query)){
$username = $user['username'];
$password = $user['password'];
?>
<form  class="column_form form_style" method="post" >
<input type="text" name="username" value="<?php echo $username;?>">
<input type="text" name="password" value="<?php echo $password;?>">
<input type="submit" value="submit" name="update_user" style="background: #2eb774;">
</form>
<?php
}
?>

<!-- ---------------------------------------------------- -->





<h4>Socail Accounts</h4>

<?php
$fetch_for_social_accounts = "SELECT * from social_accounts";
$query_for_social_accounts = mysqli_query($db_con,$fetch_for_social_accounts);
while($social_account = mysqli_fetch_array($query_for_social_accounts)){
$social_account_id = $social_account['id'];
$youtube_account = $social_account['youtube_account'];
$facebook_account = $social_account['facebook_account'];
$linkedin_account = $social_account['linkedin_account'];
$tiktok_account = $social_account['tiktok_account'];
$x_account = $social_account['x_account'];
$instagram_account = $social_account['instagram_account'];




?>
<form  class="column_form form_style" method="post" >

<input type="hidden" name="social_account_id" value="<?php echo $social_account_id;?>">
<input type="text" name="youtube_account" value="<?php echo $youtube_account;?>" placeholder="Youtube Account">
<input type="text" name="facebook_account" value="<?php echo $facebook_account;?>" placeholder="Facebook Account">
<input type="text" name="linkedin_account" value="<?php echo $linkedin_account;?>" placeholder="LinkedIn Account">
<input type="text" name="tiktok_account" value="<?php echo $tiktok_account;?>" placeholder="Tiktok Account">
<input type="text" name="x_account" value="<?php echo $x_account;?>" placeholder="X Account">
<input type="text" name="instagram_account" value="<?php echo $instagram_account;?>" placeholder="Instagram Account">


<input type="submit" value="Update" name="update_social_account" style="background: #2eb774;">

</form>
<?php
}
?>




















<h4>Contact Info</h4>

<?php
$fetch_for_contact_info = "SELECT * from contact_info";
$query_for_contact_info = mysqli_query($db_con,$fetch_for_contact_info);
while($contact_info = mysqli_fetch_array($query_for_contact_info)){
$contact_info_id = $contact_info['id'];
$mobile_no = $contact_info['mobile_no'];
$whatsapp = $contact_info['whatsapp'];
$email = $contact_info['email'];
$web_email = $contact_info['web_email'];

$landline_no = $contact_info['landline_no'];


?>
<form  class="column_form form_style" method="post" >

<input type="hidden" name="contact_info_id" value="<?php echo $contact_info_id;?>" >
<input type="text" name="mobile_no" value="<?php echo $mobile_no;?>" placeholder="Mobile No[03000000000]">
<input type="text" name="whatsapp" value="<?php echo $whatsapp;?>" placeholder="Whatsapp[923120000000]">
<input type="text" name="email" value="<?php echo $email;?>" placeholder="Email">
<input type="text" name="web_email" value="<?php echo $web_email;?>" placeholder="Web Email">
<input type="text" name="landline_no" value="<?php echo $landline_no;?>" placeholder="LandLine No (PTCL etc)">

<input type="submit" value="Update" name="update_contact_info" style="background: #2eb774;">


</form>
<?php
}
?>








<h4>Add Bank Account</h4>


<form  class="column_form form_style" method="post" >
<input type="text" name="bank_account_name" value="" placeholder="Bank Account Name">
<input type="text" name="bank_account_number" value="" placeholder="Bank Account Number">
<input type="text" name="bank_account_iban" value="" placeholder="Bank Account Iban">

<input type="submit" value="submit" name="add_bank_account" style="background: #2eb774;">
</form>





<h4>View Bank Accounts</h4>

<?php
$fetch_for_bank_account = "SELECT * from bank_accounts";
$query_for_bank_account = mysqli_query($db_con,$fetch_for_bank_account);
while($bank_account = mysqli_fetch_array($query_for_bank_account)){
$bank_account_id = $bank_account['id'];
$bank_account_name = $bank_account['bank_account_name'];
$bank_account_number = $bank_account['bank_account_number'];
$bank_account_iban = $bank_account['bank_account_iban'];

?>
<form  class="column_form form_style" method="post" >

<input type="hidden" name="bank_account_id" value="<?php echo $bank_account_id;?>">
<input type="text" name="bank_account_name" value="<?php echo $bank_account_name;?>">
<input type="text" name="bank_account_number" value="<?php echo $bank_account_number;?>">
<input type="text" name="bank_account_iban" value="<?php echo $bank_account_iban;?>">

<div>
<input type="submit" value="Update" name="update_bank_account" style="background: #2eb774;">
<input type="submit" value="Delete" name="delete_bank_account" style="background: #2eb774;">

</div>
</form>
<?php
}
?>

































<h4>View working Hours</h4>

<?php
$fetch_for_working_hours = "SELECT * from working_hours";
$query_for_working_hours = mysqli_query($db_con,$fetch_for_working_hours);
while($working_hours = mysqli_fetch_array($query_for_working_hours)){
$working_hours_id = $working_hours['id'];
$sunday = $working_hours['sunday'];
$monday = $working_hours['monday'];
$tuesday = $working_hours['tuesday'];
$wednesday = $working_hours['wednesday'];
$thursday = $working_hours['thursday'];
$friday = $working_hours['friday'];
$saturday = $working_hours['saturday'];
$is_shop_off = $working_hours['is_shop_off'];
$is_online_delivery_off = $working_hours['is_online_delivery_off'];
$holiday_reason = $working_hours['holiday_reason'];



?>
<form  class="column_form form_style" method="post" >

<input type="hidden" name="working_hours_id" value="<?php echo $working_hours_id;?>">
<div>
<span>Sunday</span>
<input type="text" name="sunday" value="<?php echo $sunday;?>" placeholder="10:00 AM - 10:00 PM">
</div>

<div>
<span>Monday</span>
<input type="text" name="monday" value="<?php echo $monday;?>" placeholder="10:00 AM - 10:00 PM">
</div>

<div>
<span>Tuesday</span>
<input type="text" name="tuesday" value="<?php echo $tuesday;?>" placeholder="10:00 AM - 10:00 PM">
</div>

<div>
<span>Wednesday</span>
<input type="text" name="wednesday" value="<?php echo $wednesday;?>" placeholder="10:00 AM - 10:00 PM">
</div>

<div>
<span>Thursday</span>
<input type="text" name="thursday" value="<?php echo $thursday;?>" placeholder="10:00 AM - 10:00 PM">
</div>

<div>
<span>Friday</span>
<input type="text" name="friday" value="<?php echo $friday;?>" placeholder="10:00 AM - 10:00 PM">
</div>

<div>
<span>Saturday</span>
<input type="text" name="saturday" value="<?php echo $saturday;?>" placeholder="10:00 AM - 10:00 PM">
</div>


<div>
<span>Is Shop Off</span>

<select name="is_shop_off">
<option value="Yes" <?php if($is_shop_off == 'Yes'){echo "selected";} ?> >Yes</option>
<option value="No" <?php if($is_shop_off == 'No'){echo "selected";} ?> >No</option>
</select>

</div>

<div>
<span>Is Online Delivery Off</span>


<select name="is_online_delivery_off">
<option value="Yes" <?php if($is_online_delivery_off == 'Yes'){echo "selected";} ?> >Yes</option>
<option value="No" <?php if($is_online_delivery_off == 'No'){echo "selected";} ?> >No</option>
</select>

</div>

<div>
<span>Holiday Reason</span>
<textarea type="text" name="holiday_reason" ><?php echo $holiday_reason;?></textarea>
</div>


<?php
}
?>

<div>
<input type="submit" value="Update" name="update_working_hours" style="background: #2eb774;">
</div>
</form>









<h4>Add Address Info</h4>


<form  class="column_form form_style" method="post" >
<input type="text" name="address_name" value="" placeholder="Address Name">
<input type="text" name="address_location" value="" placeholder="Address Location(Google Map Link)">
<input type="submit" value="submit" name="add_address_info" style="background: #2eb774;">
</form>





<h4>View Address Info</h4>

<?php
$fetch_for_address_info = "SELECT * from address_info";
$query_for_address_info = mysqli_query($db_con,$fetch_for_address_info);
while($address_info = mysqli_fetch_array($query_for_address_info)){
$address_info_id = $address_info['id'];
$address_name = $address_info['address_name'];
$address_location = $address_info['address_location'];
?>
<form  class="column_form form_style" method="post" >

<input type="hidden" name="address_info_id" value="<?php echo $address_info_id;?>">
<input type="text" name="address_name" value="<?php echo $address_name;?>">
<input type="text" name="address_location" value="<?php echo $address_location;?>">

<div>
<input type="submit" value="Update" name="update_address_info" style="background: #2eb774;">
<input type="submit" value="Delete" name="delete_address_info" style="background: #2eb774;">

</div>
</form>
<?php
}
?>
























<h4>Site Settings</h4>




<?php
$fetch_for_site_settings = "SELECT * from site_settings";
$query_for_site_settings = mysqli_query($db_con,$fetch_for_site_settings);
while($site_settings = mysqli_fetch_array($query_for_site_settings)){
$site_settings_id = $site_settings['id'];
$site_logo = $site_settings['site_logo'];
$site_favicon = $site_settings['site_favicon'];
$site_language = $site_settings['site_language'];
$site_theme = $site_settings['site_theme'];
$results_per_page = $site_settings['results_per_page'];
$welcome_text = $site_settings['welcome_text'];
$browser_tab_title = $site_settings['browser_tab_title'];
$site_name = $site_settings['site_name'];
$cover_photo = $site_settings['cover_photo'];
$site_address = $site_settings['site_address'];

?>

<form  class="column_form form_style" method="post" enctype="multipart/form-data">
<input  type="hidden" id=""  name="site_settings_id" value="<?php echo $site_settings_id; ?>" />

<p>Site Cover Phot</p>

<span>
300 px height image
</span>

<div id="cover_container">

<input  type="file" id="cover_input"  name="site_cover_input"   accept="image/*" onchange="preview_cover_before_upload(event)"  />
<input  type="hidden" id="old_cover_input"  name="old_cover_link" value="<?php echo $site_cover; ?>" />

<div id="cover_view"></div>

</div>


<script>

cover_view = document.getElementById('cover_view');
 cover_view.style.backgroundImage = "url('<?php echo $site_cover; ?>')";
 cover_view.style.backgroundSize = "contain";
 cover_view.style.backgroundRepeat = "no-repeat";
 cover_view.style.backgroundPosition = "center center";


function preview_cover_before_upload(event) {
var cover_view = document.getElementById('cover_view');
 cover_view.style.backgroundImage = "url('"+URL.createObjectURL(event.target.files[0])+"')";
 cover_view.style.backgroundSize = "contain";
 cover_view.style.backgroundRepeat = "no-repeat";
 cover_view.style.backgroundPosition = "center center";
}

</script>








<p>Site Logo</p>

<span>
square type image and image format 
</span>

<div id="logo_container">

<input  type="file" id="logo_input"  name="site_logo_input"   accept="image/*" onchange="preview_logo_before_upload(event)"  />
<input  type="hidden" id="old_logo_input"  name="old_logo_link" value="<?php echo $site_logo; ?>" />

<div id="logo_view"></div>

</div>


<script>

logo_view = document.getElementById('logo_view');
 logo_view.style.backgroundImage = "url('<?php echo $site_logo; ?>')";
 logo_view.style.backgroundSize = "contain";
 logo_view.style.backgroundRepeat = "no-repeat";
 logo_view.style.backgroundPosition = "center center";


function preview_logo_before_upload(event) {
var logo_view = document.getElementById('logo_view');
 logo_view.style.backgroundImage = "url('"+URL.createObjectURL(event.target.files[0])+"')";
 logo_view.style.backgroundSize = "contain";
 logo_view.style.backgroundRepeat = "no-repeat";
 logo_view.style.backgroundPosition = "center center";
}

</script>



<p>Site Favicon</p>

<span>
	we recommend uploading image for favicon of following dimension
	16x16 pixels,
	32x32 pixels,
	48x48 pixels,
	96x96 pixels,
	120x120 pixels,
	180x180 pixels
	and image format 
	png,
	jpg
	
</span>







<div id="favicon_container">

<input  type="file" id="favicon_input"  name="site_favicon_input"   accept="image/*" onchange="preview_favicon_before_upload(event)"  />
<input  type="hidden" id="old_favicon_input"  name="old_favicon_link" value="<?php echo $site_favicon; ?>" />

<div id="favicon_view"></div>

</div>
<script>

favicon_view = document.getElementById('favicon_view');
 favicon_view.style.backgroundImage = "url('<?php echo $site_favicon; ?>')";
 favicon_view.style.backgroundSize = "contain";
 favicon_view.style.backgroundRepeat = "no-repeat";
 favicon_view.style.backgroundPosition = "center center";


function preview_favicon_before_upload(event) {
var favicon_view = document.getElementById('favicon_view');
 favicon_view.style.backgroundImage = "url('"+URL.createObjectURL(event.target.files[0])+"')";
 favicon_view.style.backgroundSize = "contain";
 favicon_view.style.backgroundRepeat = "no-repeat";
 favicon_view.style.backgroundPosition = "center center";
}

</script>








</div>

<div>
<span>Site language</span>

<select name="site_language">
<option value="en" <?php if($site_language == 'en'){echo "selected";} ?> >English</option>
<option value="ur" <?php if($site_language == 'ur'){echo "selected";} ?> >Urdu</option>
</select>

</div>

<div>
<span>Site Theme</span>


<select name="site_theme">
<option value="light" <?php if($site_theme == 'light'){echo "selected";} ?> >Light</option>
<option value="dark" <?php if($site_theme == 'dark'){echo "selected";} ?> >Dark</option>
</select>


</div>

<div>
<span>Results Per Page</span>


<select name="results_per_page">
<option value="50" <?php if($results_per_page == '50'){echo "selected";} ?> >50</option>
<option value="100" <?php if($results_per_page == '100'){echo "selected";} ?> >100</option>
<option value="150" <?php if($results_per_page == '150'){echo "selected";} ?> >150</option>
<option value="200" <?php if($results_per_page == '200'){echo "selected";} ?> >200</option>
<option value="250" <?php if($results_per_page == '250'){echo "selected";} ?> >250</option>
<option value="300" <?php if($results_per_page == '300'){echo "selected";} ?> >300</option>
<option value="350" <?php if($results_per_page == '350'){echo "selected";} ?> >350</option>
<option value="400" <?php if($results_per_page == '400'){echo "selected";} ?> >400</option>
<option value="450" <?php if($results_per_page == '450'){echo "selected";} ?> >450</option>
<option value="500" <?php if($results_per_page == '500'){echo "selected";} ?> >500</option>

</select>

</div>

<div>
<span>Welcome Text</span>
<textarea name="welcome_text" ><?php echo $welcome_text; ?></textarea>
</div>

<div>
<span>Browser Tab Title</span>
<input type="text"  name="browser_tab_title" value="<?php echo $browser_tab_title; ?>">
</div>

<div>
<span>Site Name</span>
<input type="text"  name="site_name" value="<?php echo $site_name; ?>">
</div>

<div>
<span>Cover Photo</span>
<input type="text"  name="cover_photo" value="<?php echo $cover_photo; ?>">
</div>

<div>
<span>Site Address</span>
<input type="text"  name="site_address" value="<?php echo $site_address; ?>">
</div>

<?php
}
?>
<input type="submit" value="Update" name="update_site_settings" style="background: #2eb774;">


</form>

<br>
























<?php





if(isset($_POST['add_product'])){

$p_name = $_POST['p_name'];
$p_category = $_POST['p_category'];
$p_quantity = $_POST['p_quantity'];
$p_price = $_POST['p_price'];
$p_date = date('d:m:Y'); // 29/04/2025
$search_keywords = $_POST['search_keywords'];



$tt = date('Gis');
$dd = date('dmY');
$random_number = rand(0,1000);
$unique_id = uniqid();
$new_file_name= $random_number.$p_category.$tt.$dd.$unique_id;



$p_image_tmp = $_FILES['p_image']['tmp_name'];
$p_image = $_FILES['p_image']['name'];
$p_image_type = $_FILES["p_image"]["type"];

$p_image_info = getimagesize($_FILES["p_image"]["tmp_name"]);
$p_image_width = $p_image_info[0];
$p_image_height = $p_image_info[1];


$folder = "user_data/".$p_category."/";
$thumb_folder = "user_data/".$p_category."/thumb/";

$file_link = $folder.$new_file_name.".jpg";
$thumb_file_link = $thumb_folder.$new_file_name.".jpg";

if (!is_dir($folder)) {
    mkdir($folder, 0755, true);
}

if (!is_dir($thumb_folder)) {
    mkdir($thumb_folder, 0755, true);
}
move_uploaded_file($p_image_tmp, $file_link);



// start creating thumbs
if($p_image_type == "image/jpeg")
{
$imagecreate = "imagecreatefromjpeg";
$imageformat = "imagejpeg";
}
if($p_image_type == "image/png")
{						 
$imagecreate = "imagecreatefrompng";
$imageformat = "imagepng";
}
if($p_image_type == "image/gif")
{						 
$imagecreate= "imagecreatefromgif";
$imageformat = "imagegif";
}


if($p_image_type == "image/webp")
{						 
$imagecreate= "imagecreatefromwebp";
$imageformat = "imagewebp";
}




$new_width = "200";
$new_height = "250";
// $p_image_ratio = $p_image_width/$p_image_height;
// $new_height = $new_width/$p_image_ratio; // for auto height proportional to width
// $new_height = ceil($new_height); 

$image_p = imagecreatetruecolor($new_width, $new_height);
$image = $imagecreate($file_link); //photo folder

imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $p_image_width, $p_image_height);						
$imageformat($image_p, $thumb_file_link);//thumb folder	

// end creating thumbs











// exit();	


$insert = "INSERT into products (p_name,p_category,p_quantity,p_price,search_keywords,p_image,p_image_thumb,p_date)values('$p_name','$p_category','$p_quantity','$p_price','$search_keywords','$file_link','$thumb_file_link','$p_date')";
$query = mysqli_query($db_con,$insert);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}


}


if(isset($_POST['update_user'])){
$username = $_POST['username'];
$password = $_POST['password'];

$update = "UPDATE user set username = '$username',password = '$password'  ";	
$query = mysqli_query($db_con,$update);

if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}










if(isset($_POST['update_social_account'])){
$social_account_id =  $_POST['social_account_id'];



$youtube_account = $_POST['youtube_account'];
$facebook_account = $_POST['facebook_account'];
$linkedin_account = $_POST['linkedin_account'];
$tiktok_account = $_POST['tiktok_account'];
$x_account = $_POST['x_account'];
$instagram_account = $_POST['instagram_account'];




$update = "UPDATE social_accounts set youtube_account = '$youtube_account',facebook_account = '$facebook_account',linkedin_account = '$linkedin_account',tiktok_account = '$tiktok_account',x_account = '$x_account',instagram_account = '$instagram_account' WHERE id = '$social_account_id'  ";	
$query = mysqli_query($db_con,$update);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}











if(isset($_POST['update_contact_info'])){
$contact_info_id =  $_POST['contact_info_id'];
$mobile_no = $_POST['mobile_no'];
$whatsapp = $_POST['whatsapp'];
$landline_no = $_POST['landline_no'];
$email = $_POST['email'];
$web_email = $_POST['web_email'];



$update = "UPDATE contact_info set mobile_no = '$mobile_no',whatsapp = '$whatsapp',landline_no = '$landline_no',email = '$email',web_email = '$web_email' WHERE id = '$contact_info_id'  ";	
$query = mysqli_query($db_con,$update);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}
























if(isset($_POST['add_bank_account'])){
$bank_account_name = $_POST['bank_account_name'];
$bank_account_number = $_POST['bank_account_number'];
$bank_account_iban = $_POST['bank_account_iban'];

$insert = "INSERT into bank_accounts (bank_account_name,bank_account_number,bank_account_iban)values('$bank_account_name','$bank_account_number','$bank_account_iban')";
$query = mysqli_query($db_con,$insert);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}

if(isset($_POST['update_bank_account'])){
$bank_account_id =  $_POST['bank_account_id'];
$bank_account_name = $_POST['bank_account_name'];
$bank_account_number = $_POST['bank_account_number'];
$bank_account_iban = $_POST['bank_account_iban'];
$update = "UPDATE bank_accounts set bank_account_name = '$bank_account_name',bank_account_number = '$bank_account_number',bank_account_iban = '$bank_account_iban' WHERE id = '$bank_account_id'  ";	
$query = mysqli_query($db_con,$update);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}


if(isset($_POST['delete_bank_account'])){
$bank_account_id =  $_POST['bank_account_id'];
$delete = "DELETE from bank_accounts WHERE id = '$bank_account_id'  ";	
$query = mysqli_query($db_con,$delete);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}







if(isset($_POST['update_working_hours'])){
$working_hours_id =  $_POST['working_hours_id'];
$sunday = $_POST['sunday'];
$monday = $_POST['monday'];
$tuesday = $_POST['tuesday'];
$wednesday = $_POST['wednesday'];
$thursday = $_POST['thursday'];
$friday = $_POST['friday'];
$saturday = $_POST['saturday'];
$is_shop_off = $_POST['is_shop_off'];
$is_online_delivery_off = $_POST['is_online_delivery_off'];
$holiday_reason = $_POST['holiday_reason'];



$update = "UPDATE working_hours set 
sunday = '$sunday',
monday = '$monday',
tuesday = '$tuesday',
wednesday = '$wednesday',
thursday = '$thursday',
friday = '$friday',
saturday = '$saturday',
is_shop_off = '$is_shop_off',
is_online_delivery_off = '$is_online_delivery_off',
holiday_reason = '$holiday_reason' 
WHERE id = '$working_hours_id'  ";	
$query = mysqli_query($db_con,$update);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}

















if(isset($_POST['add_address_info'])){
$address_name = $_POST['address_name'];
$address_location = $_POST['address_location'];
$insert = "INSERT into address_info (address_name,address_location)values('$address_name','$address_location')";
$query = mysqli_query($db_con,$insert);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}

if(isset($_POST['update_address_info'])){
$address_info_id =  $_POST['address_info_id'];
$address_name = $_POST['address_name'];
$address_location = $_POST['address_location'];
$update = "UPDATE address_info set address_name = '$address_name',address_location = '$address_location' WHERE id = '$address_info_id'  ";	
$query = mysqli_query($db_con,$update);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}


if(isset($_POST['delete_address_info'])){
$address_info_id =  $_POST['address_info_id'];
$delete = "DELETE from address_info WHERE id = '$address_info_id'  ";	
$query = mysqli_query($db_con,$delete);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}






if(isset($_POST['update_site_settings'])){
echo $site_settings_id = $_POST['site_settings_id'];

$site_language = $_POST['site_language'];
$site_theme = $_POST['site_theme'];
$results_per_page = $_POST['results_per_page'];
$welcome_text = mysqli_real_escape_string($db_con, $_POST['welcome_text']);
$browser_tab_title = $_POST['browser_tab_title'];
$site_name = $_POST['site_name'];
$cover_photo = $_POST['cover_photo'];
$site_address = $_POST['site_address'];

$old_favicon_link = $_POST['old_favicon_link'];

$tt = date('Gis');
$dd = date('dmY');
$random_number = rand(0,1000);
$unique_id = uniqid();
$new_file_name_for_favicon= "fav".$random_number.$tt.$dd.$unique_id;


if(empty($_FILES['site_favicon_input']['name'])) {
$favicon_link = $old_favicon_link;
}
else {

$site_favicon_input = $_FILES['site_favicon_input']['name'];
$site_favicon_input_tmp = $_FILES['site_favicon_input']['tmp_name'];

$folder = "images/";
$favicon_link = $folder.$new_file_name_for_favicon.".jpg";
if (!is_dir($folder)) {
    mkdir($folder, 0755, true);
}
move_uploaded_file($site_favicon_input_tmp, $favicon_link);

}





// ///////////////////////////////////////////////////


$old_logo_link = $_POST['old_logo_link'];

$new_file_name_for_logo= "logo".$random_number.$tt.$dd.$unique_id;


if(empty($_FILES['site_logo_input']['name'])) {
$logo_link = $old_logo_link;
}
else {

echo $site_logo_input = $_FILES['site_logo_input']['name'];
$site_logo_input_tmp = $_FILES['site_logo_input']['tmp_name'];

$folder = "images/";
$logo_link = $folder.$new_file_name_for_logo.".jpg";
if (!is_dir($folder)) {
    mkdir($folder, 0755, true);
}
move_uploaded_file($site_logo_input_tmp, $logo_link);

}




// exit();




$update = "UPDATE site_settings set 
site_logo = '$logo_link',
site_favicon = '$favicon_link',
site_language = '$site_language',
site_theme = '$site_theme',
results_per_page = '$results_per_page',
welcome_text = '$welcome_text',
browser_tab_title = '$browser_tab_title',
site_name = '$site_name',
cover_photo = '$cover_photo',
site_address = '$site_address'
WHERE id = '$site_settings_id' ";	
$query = mysqli_query($db_con,$update);


if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}







if(isset($_POST['add_category'])){

$c_name = $_POST['c_name'];
$search_keywords = $_POST['search_keywords'];

$insert = "INSERT into categories (c_name,search_keywords)values('$c_name','$search_keywords')";
$query = mysqli_query($db_con,$insert);
if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}


}





if(isset($_POST['c_update'])){
$id = $_POST['id'];
$c_name = $_POST['c_name'];
$search_keywords = $_POST['search_keywords'];


$update = "UPDATE categories SET c_name = '$c_name', search_keywords = '$search_keywords' WHERE id = '$id' ";	
$query = mysqli_query($db_con,$update);

if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}

if(isset($_POST['c_delete'])){
$id = $_POST['id'];
$c_name = $_POST['c_name'];

$delete = "DELETE from categories WHERE id = '$id' ";	
$query = mysqli_query($db_con,$delete);

if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}



if(isset($_POST['p_delete'])){
$id = $_POST['id'];
$p_name = $_POST['p_name'];

$delete = "DELETE from products WHERE id = '$id' ";	
$query = mysqli_query($db_con,$delete);

if($query){
echo"<script>window.open('admin.php','_SELF')</script>";
}
}
?>





























<?php include('footer.php'); ?>

<!-- <script src="script.js"></script> -->

</body>
</html>