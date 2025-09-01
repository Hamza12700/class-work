<?php
include("include.php");
include("meta.php");

if(!isset($_SESSION['user_name'])) {
  header("Location: login.php");
  exit();
}
?>

<div id="home_header">
  <h1>Twitter</h1>
  <div class="logout_and_profile">
    <a href="logout.php">Logout</a>
    <a href="user_profile.php">Profile</a>
  </div>
</div>

<form method="post" enctype="multipart/form-data">
	<textarea required placeholder="What's on your mind?" id="tweet_textarea" name="tweet_text"></textarea>
<div class="tweet_btns">
	<button id="tweet_btn" type="submit" name="insert_tweet">Tweet</button>
	<input type="file" name="tweet_media" />
</div>
</form>

<?php
if (isset($_POST['insert_tweet'])) {
	$tweet_text = $_POST['tweet_text'];
	$tweet_by = $_SESSION['user_name'];

	$tweet_day = date("j");
	$tweet_month = date("n");
	$tweet_year = date("Y");
	$tweet_hour = date("g");
	$tweet_minute = date("i");
	echo $media_tmp_name = $_FILES['tweet_media']['tmp_name'];
	echo  $media_name = $_FILES['tweet_media']['name'];
	$folder = "user_data/";
	$file_link = "user_data/".$media_name;

	if(!is_dir($folder)){
		mkdir($folder, 0775, true);
	}

	move_uploaded_file($media_tmp_name, $file_link);
	$insert = "INSERT into tweets (tweet_text,tweet_media_link,tweet_by,tweet_day,tweet_month,tweet_year,tweet_hour,tweet_minute)
 	VALUES ('$tweet_text','$file_link','$tweet_by','$tweet_day','$tweet_month','$tweet_year','$tweet_hour','$tweet_minute')";
	$query = mysqli_query($con,$insert);
}
?>

<h1 id="tweet_heading">Tweets</h1>

<?php
$fetch = "SELECT * from tweets";
$query = mysqli_query($con,$fetch);
while($user_tweet = mysqli_fetch_array($query)){
	$tweet_text = $user_tweet['tweet_text'];
	$tweet_by = $user_tweet['tweet_by'];
	$tweet_media_link = $user_tweet['tweet_media_link'];
	$tweet_day = $user_tweet['tweet_day'];
	$tweet_month = $user_tweet['tweet_month'];
	$tweet_year = $user_tweet['tweet_year'];
	$tweet_hour = $user_tweet['tweet_hour'];
	$tweet_minute = $user_tweet['tweet_minute'];
?>

<div class="user_tweet">
	<div class="tweet_by">
		<p><?php echo $tweet_by; ?></p>
		<p><?php echo $tweet_year." ".$tweet_day; ?></p>
	</div>
	<p class="tweet_content" name="tweet_text"><?php echo $tweet_text;?> </p>
	<img src="<?php echo $tweet_media_link; ?>" />
<div>
	<button>comment</button>
	<button>like</button>
</div>
</div>
<?php } ?>
