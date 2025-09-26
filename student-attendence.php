<?php 
require('config.php');
$roll_no = $_GET["roll_no"];
if (!$roll_no) {
  header("Location: /");
  exit();
}

$res = mysqli_query($db_con, "SELECT * FROM admissions WHERE roll_no = '$roll_no'")->fetch_object();
$photo = $res->photo;
$student_name = $res->student_name;

$res = mysqli_query($db_con, "SELECT * FROM attendence WHERE roll_no = '$roll_no'")->fetch_object();
$name = $res->name;
$year = $res->year;
$month = $res->month;
$day = $res->day;
$hour = $res->hour;
$pm_am = $res->pm_or_am;

$show_table = "true";
if (!$name) {
  $show_table = "false";
}
?>

<div x-data="{show_table: <?php echo $show_table; ?>}">
  <div x-show="show_table" id="table">
    <table>
      <caption>Attendance for <?php echo $name; ?></caption>
      <thead>
        <tr>
          <th scope="col">Year</th>
          <th scope="col">Month</th>
          <th scope="col">Day</th>
          <th scope="col">Hour</th>
          <th scope="col">Pm/Am</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <th scope="row"><?php echo $year ?></th>
          <th scope="row"><?php echo $month ?></th>
          <th scope="row"><?php echo $day ?></th>
          <th scope="row"><?php echo $hour ?></th>
          <th scope="row"><?php echo $pm_am ?></th>
        </tr>
      </tbody>
    </table>
  </div>

  <p
    x-show="!show_table"
    style="text-align: center;"
  >No records found for student <?php echo $student_name; ?></p>
</div>


<script>
const show_table = <?php
  if ($show_table == "false") { echo "false"; }
  else { echo "true"; }
?>

if (!show_table) {
  document.getElementById("fetch-attendance").disabled = true;
}
</script>

<style>
#table {
  margin: 5rem 3rem;
  display: flex;
  justify-content: center;
  flex-direction: column;
}

#title {
  text-align: center;
  margin: 1.3rem 0;
}

table {
  border-collapse: collapse;
  border: 2px solid rgb(140 140 140);
  font-family: sans-serif;
  font-size: large;
  letter-spacing: 1px;
}

caption {
  caption-side: top;
  padding: 1.5rem 0;
  font-size: larger;
  font-weight: bold;
}

thead,
tfoot {
  background-color: rgb(228 240 245);
}

th,
td {
  border: 1px solid rgb(160 160 160);
  padding: 8px 10px;
}

td:last-of-type {
  text-align: center;
}

tbody > tr:nth-of-type(even) {
  background-color: rgb(237 238 242);
}

tfoot th {
  text-align: right;
}

tfoot td {
  font-weight: bold;
}
</style>
