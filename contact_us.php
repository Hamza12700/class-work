<?php
require('config.php');

if (isset($_POST['contact'])) {
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $name = $_POST['user_name'];
  $phone = $_POST['phone_number'];
  $desc = $_POST['desc'];

  $stmt = $mysqli->prepare("INSERT INTO emails (email, name, subject, phone_number, description) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $email, $name, $subject, $phone, $desc);
  $stmt->execute();
  echo '<h1 style="text-align: center; margin: 5rem 0;">We will review your request soon!</h1>';
  $stmt->close();
  exit();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <?php require('meta.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.7/dist/htmx.min.js"></script>
  </head>

  <body>
    <?php 
    require('header.php');
    ?>

    <form hx-target="this" hx-post="/contact_us.php" class="form" method="post">
      <fieldset>
        <legend>Contact Us</legend>

        <div class="email-container">
          <input required type="email" name="email" placeholder="Email address" />
          <input required type="text" name="subject" placeholder="Subject" />
        </div>

        <div class="email-container">
          <input required type="text" name="user_name" placeholder="Full Name" />
          <input required type="text" name="phone_number" placeholder="Phone Number" />
        </div>

        <textarea name="desc" placeholder="Description" required maxlength="1000"></textarea>
      </fieldset>

      <button name="contact" type="submit">Submit</button>
    </form>

    <?php require('footer.php'); ?>
  </body>
</html>


<style>
.email-container {
  display: flex;
  justify-content: center;
  gap: 2rem;
  margin: 1rem 0;

  input {
    width: 100%;
  }
}

fieldset {
  padding: 1rem;
}

.form button {
  background: white;
  font-family: auto;
  padding: 0.6em 1.3em;
  font-weight: 900;
  font-size: 18px;
  border: 3px solid black;
  border-radius: 0.4em;
  box-shadow: 0.1em 0.1em;
  cursor: pointer;
  margin: 1rem 0;
  display: flex;
  justify-self: end;
}

.form button:hover {
  transform: translate(-0.05em, -0.05em);
  box-shadow: 0.15em 0.15em;
}

.form button:active {
  transform: translate(0.05em, 0.05em);
  box-shadow: 0.05em 0.05em;
}

.form {
  width: 900px;
  margin: 5rem auto;
}

legend {
  background-color: black;
  color: white;
  padding: 10px;
  font-size: 1.5rem;
}

/* From Uiverse.io by anniekoop */ 
.form input, textarea {
  padding: 0.875rem;
  font-size: 1rem;
  border: 1.5px solid #000;
  border-radius: 0.5rem;
  box-shadow: 2.5px 3px 0 #000;
  outline: none;
  transition: ease 0.25s;
}

.form textarea {
  resize: none;
  width: 100%;
  height: 200px;
}

.form input:focus {
  box-shadow: 5.5px 7px 0 black;
}
</style>
