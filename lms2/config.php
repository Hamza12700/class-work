
<?php
// session will always be top of the page
session_start();
$current_user_session_id = session_id();


//---003 Code to prevent save cache page in all browsers
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // HTTP 1.1.
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.




//Language
$lang = "en";
$business_name = "LMS";
$business_contact_no = "03145678990";
//Uri
$uri = $_SERVER['REQUEST_URI'];
//Url
$site_ip= "http://".getHostByName(php_uname('n'));
//current page url
$current_url = $site_ip.$uri;


$root_drive = $_SERVER["DOCUMENT_ROOT"];
// base url
$base_url = $site_ip.'/lms/';



// page title
$page_title = "LMS";

if (strpos($uri, 'sales') !== false) {
$page_title = "Sales";
}
if (strpos($uri, 'products') !== false) {
$page_title = "Products";
}
if (strpos($uri, 'add_product') !== false) {
$page_title = "Add Product";
}


//Files & Directories
$user_data = "/user_data/";


$style_sheet = "/lms/style.css";
$java_script = "/lms/script.js";
$fontawesome = "/lms/fontawesome/css/all.css";




//---005 Set default timezone
$timezone = date_default_timezone_set("Asia/Karachi");




//---002 Database connection
$servername = "127.0.0.1";
$db_user = "lms";
$db_pass = "lms";
$db = "lms";
$db_con = mysqli_connect($servername, $db_user, $db_pass,$db)or die("cannot connect");





?>




<?php
// Site Settings
$fetch_for_site_settings = "SELECT * from site_settings";
$query_for_site_settings = mysqli_query($db_con,$fetch_for_site_settings);
while($site_settings = mysqli_fetch_array($query_for_site_settings)){
$site_name = $site_settings['site_name'];
$welcome_text = $site_settings['welcome_text'];
$site_favicon = $site_settings['site_favicon'];
$site_logo = $site_settings['site_logo'];
$site_cover = $site_settings['site_cover'];
$browser_tab_title = $site_settings['browser_tab_title'];
$results_per_page = $site_settings['results_per_page'];


}


// Contact Info
$fetch_for_contact_info = "SELECT * from contact_info";
$query_for_contact_info = mysqli_query($db_con,$fetch_for_contact_info);
while($contact_info = mysqli_fetch_array($query_for_contact_info)){
$mobile_no = $contact_info['mobile_no'];
$landline_no = $contact_info['landline_no'];
$whatsapp = $contact_info['whatsapp'];
$email = $contact_info['email'];
$web_email = $contact_info['web_email'];
}

// Social Accounts
$fetch_for_social_accounts = "SELECT * from social_accounts";
$query_for_social_accounts = mysqli_query($db_con,$fetch_for_social_accounts);
while($social_accounts = mysqli_fetch_array($query_for_social_accounts)){
$youtube_account = $social_accounts['youtube_account'];
$facebook_account = $social_accounts['facebook_account'];
$linkedin_account = $social_accounts['linkedin_account'];
$tiktok_account = $social_accounts['tiktok_account'];
$x_account = $social_accounts['x_account'];
$instagram_account = $social_accounts['instagram_account'];
}


// Address Info
$fetch_for_address_info = "SELECT * from address_info";
$query_for_address_info = mysqli_query($db_con,$fetch_for_address_info);
while($address_info = mysqli_fetch_array($query_for_address_info)){
$address_name = $address_info['address_name'];
$address_location = $address_info['address_location'];
}


// Working Hours
// $fetch_for_working_hours = "SELECT * from working_hours";
// $query_for_working_hours = mysqli_query($db_con,$fetch_for_working_hours);
// while($working_hours = mysqli_fetch_array($query_for_working_hours)){
// $sunday = $working_hours['sunday'];
// $monday = $working_hours['monday'];
// $tuesday = $working_hours['tuesday'];
// $wednesday = $working_hours['wednesday'];
// $thursday = $working_hours['thursday'];
// $friday = $working_hours['friday'];
// $saturday = $working_hours['saturday'];
// $is_shop_off = $working_hours['is_shop_off'];
// $is_online_delivery_off = $working_hours['is_online_delivery_off'];
// $holiday_reason = $working_hours['holiday_reason'];
// }

?>




