<header>

<div id="header_row_1">
<i class="fal fa-envelope  title="Change Theme"> <?php echo $email; ?></i>
<i class="fal fa-phone-volume  title="Browse Courses"> <?php echo $landline_no." - ".$whatsapp ; ?> </i>
<i class="fas fa-language"  title="Change Language"></i>
<i class="fas fa-palette"  title="Change Theme"></i>

</div>



<div id="header_row_2">

<img onclick="window.open('index.php','_SELF')" id="site_logo" src="<?php echo $site_logo; ?>"/>

<form>
<input type="search" placeholder="Search Courses...">
<button type="submit" class="fas fa-search"></button>
</form>

<div id="right_menu_container">

<button onclick="window.open('login.php','_SELF')" title="Login" > <i class="fal fa-user"> </i> Sign In</button>
 
</div>

</div>


<div id="header_row_3">

<i onclick="window.open('about_us.php','_SELF')">About Us</i>
<i onclick="window.open('programs.php','_SELF')">Programs</i>
<i onclick="window.open('gallery.php','_SELF')">Student Gallery</i>
<i>Blog</i>
<i>Results</i>
<i onclick="window.open('contact_us.php','_SELF')">Contact Us</i>


</div>


</header>


<div id="slider">
<div>
<h3>"Transforming Kids into Leaders"</h3>
<p>Hand-picked Instructor and expertly crafted courses, designed for the modern students and entrepreneur.</p>
<div>
<button >Browse Courses</button>
<button >Are you Instructor?</button>
</div>

</div> 

<img src="images/hero-img.png" />
</div> <!-- Slider -->