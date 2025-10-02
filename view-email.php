<?php 
require('config.php');

$id = (int)$_GET['id'];
if (!$id) {
  header("Location: /");
  exit();
}

$email = $mysql->query("SELECT * FROM emails WHERE id = '$id'") or die("Failed to retrive the email information");
$email = $email->fetch_object();
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- meta info -->
    <?php 
    require('meta.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.7/dist/htmx.min.js"></script>
  </head>

  <body>
    <main>
      <a href="emails.php">&larrhk; Back</a>
      <hgroup>
        <h1>Email from: <?php echo $email->email; ?></h1>
        <p><strong>Subject:</strong> <?php echo $email->subject; ?></p>
      </hgroup>

      <p class="desc"><?php echo $email->description; ?></p>
    </main>
  </body>
</html>

<style>
body {
  background-image: none;

  a {
    text-decoration: none;
    color: black;
  }
}

main {
  width: fit-content;
  margin: 4rem auto;
  border-left: 1px solid black;
  border-right: 1px solid black;
  padding: 0 1rem;
}

.desc {
  margin: 1rem 0;
  width: 1400px;
}

hgroup {
  font-size: large;

  h1 {
    font-size: 1.7rem;
    margin-bottom: .5rem;
  }
}
</style>
