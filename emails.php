<!DOCTYPE html>
<html>
  <head>
    <!-- meta info -->
    <?php 
    require('config.php');
    require('meta.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.7/dist/htmx.min.js"></script>
  </head>

  <body>
    <?php 
    require('header.php');
    ?>

    <main>
      <p style="margin: 2rem 0;" id="remove-email-msg"></p>
      <dl>
        <?php
        $emails = $mysql->query("SELECT * FROM emails");
        if ($emails->num_rows === 0) {
          echo "<h1 style='text-align: center; margin: 3rem 0;'>There are no Emails in the database!</h1>";
        } else {
        while ($email = $emails->fetch_array()) {
        ?>
        <a id="<?php echo $email['id']; ?>" href="view-email.php?id=<?php echo $email['id']; ?>">
          <div>
            <dt><?php echo $email['email']; ?></dt>
            <dd><?php echo $email['subject']; ?></dd>
          </div>

          <button hx-target="#remove-email-msg" hx-trigger="click" hx-post="delete-email.php?id=<?php echo $email['id']; ?>">❌</button>
        </a>
        <?php } } ?>
      </dl>
    </main>
  </body>
</html>

<style>
main {
  margin: 0 1rem;
}
a {
  text-decoration: none;
  color: black;
  background: white;
  display: flex;
  justify-content: space-between;
  padding: 1rem;
  border: 1px solid black;
  margin: 1rem 0;

  button {
    background-color: transparent;
    border: none;
    font-size: 1.5rem;
    font-weight: bold;
    cursor: pointer;
    padding: 0 10px;
  }

  button:hover {
    background-color: black;
    color: white;
  }
}

dt {
  font-weight: bold;
  text-decoration: underline;
  margin-bottom: 5px;
}

dl,
dd {
  font-size: 0.9rem;
}
</style>
