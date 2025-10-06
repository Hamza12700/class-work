<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<?php
$login = "false";
if ($_SESSION['user_session']) { $login = "true"; }
?>

<header x-data="{login: <?php echo $login; ?>}">
  <div id="header_row_2">
    <img onclick="window.open('index.php','_SELF')" id="site_logo" src="<?php echo $site_logo; ?>"/>

    <form>
      <input type="search" placeholder="Search Courses...">
      <button type="submit" class="fas fa-search"></button>
    </form>

    <div x-show="!login" id="right_menu_container">
      <button  onclick="window.open('register.php','_SELF')" title="Register" >Sign Up</button>
      <button  onclick="window.open('login.php','_SELF')" title="Login" >Login</button>
    </div>

    <div x-show="login" id="right_menu_container">
      <button style="background-color: transparent; color: black; font-size: large;" onclick="window.open('profile.php','_SELF')" title="Profile" >Profile</button>
      <button style="font-size: large;" onclick="window.open('attendence.php','_SELF')" title="Attendence" >Mark Attendence</button>
    </div>
  </div>


  <div id="header_row_3">
    <a href="about-us.php">About Us</a>
    <a href="programs.php">Programs</a>
    <a href="gallery.php">Student Gallery</a>
    <a href="scholarship.php">Scholarship</a>
    <a href="contact_us.php">Contact Us</a>
  </div>
</header>
