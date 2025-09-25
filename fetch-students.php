<?php 
require('config.php');

$name = $_GET["name"];
if (!$name) {
  exit();
}

$res = mysqli_query($db_con, "SELECT * FROM admissions WHERE student_name = '$name'")->fetch_object();
if($res->student_name) { echo "Student Found"; }
else {
  echo "Student not found"; 
  exit();
}
?>

<script>
document.getElementById("student-img").src = "<?php echo $res->student_photo; ?>";
document.getElementById("roll_no").value = "<?php echo $res->roll_no; ?>";
document.getElementById("guardian_name").value = "<?php echo $res->guardian_name; ?>";
</script>
