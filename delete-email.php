<?php 
require('config.php');

$id = $_GET['id'];
if (!$id) {
  header("Location: /");
  exit();
}

$ok = $mysql->query("DELETE FROM emails WHERE id = '$id'");
if (!$ok) {
  echo "Failed to remove";
  exit();
}
?>

<script>
document.getElementById("<?php echo $id; ?>").remove();
</script>

