<?php
require('config.php'); 

if (isset($_POST['new-mcq'])) {
  $question = $_POST["question"];
  $choices = $_POST["choices"];
  $answer = $_POST["answer"];

  $stmt = $mysql->prepare("INSERT INTO scholarship_mcqs (question, choices, answer) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $question, $choices, $answer);
  $stmt->execute();
  $stmt->close();

  echo "<p>New record added successfully!</p> <script>window.location.reload();</script>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <?php require('meta.php'); ?>
  </head>

  <body>
    <p id="dialog-res"></p>
    <dialog id="dialog">
      <form hx-target="#dialog-res" hx-post="scholarship_msqs.php" class="form" method="post">
        <fieldset>
          <legend>New MCQ</legend>

          <div class="dialog-input-container">
            <input required type="text" name="question" placeholder="Question" />
            <input required type="text" name="choices" placeholder="Choices (Seperated by coma ,)" />
            <input required type="text" name="answer" placeholder="Correct Answer" />
          </div>
        </fieldset>

        <button name="new-mcq" type="submit">Submit</button>
      </form>
    </dialog>

    <main id="main">
      <hgroup class="title">
        <h1>MCQ's For Scholarship</h1>
        <button onclick="show_dialog()">
          <svg style="fill: white; width: 1.3rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg>
          New Question</button>
      </hgroup>

      <table>
        <thead>
          <tr>
            <th scope="col">Question</th>
            <th scope="col">Choices</th>
            <th scope="col">Answer</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $res = $mysql->query("SELECT * FROM scholarship_mcqs");
          if ($res->num_rows === 0) {
            echo "<p style='text-align: center; margin-top: 4rem; font-size: 1.4rem; font-weight: bold;'>No MCQ's in the database</p>";
          } else {
            while ($mcq = $res->fetch_array()) {
          ?>
          <tr>
            <th scope="row"><?php echo $mcq['question']; ?></th>
            <th scope="row">
              <div class="choices">
                <?php
                $choices = explode(",", $mcq['choices']);
                foreach ($choices as $choice) {
                ?>
                <p><?php echo $choice; ?></p>
                <?php } ?>
              </div>
            </th>
            <th scope="row"><?php echo $mcq['answer']; ?></th>
          </tr>
          <?php }} ?>
        </tbody>
      </table>

    </main>
  </body>

  <script>
  function show_dialog() {
    const dialog = document.getElementById("dialog");
    document.getElementById("main").hidden = true;
    dialog.show();
  }
  </script>
</html>

<style>
body {
  padding: 2rem 1rem;
}

.choices {
  display: flex;
  justify-content: center;

  p {
    padding: 0 .7rem;
    border-right: 1px solid black;
    border-left: 1px solid black;
  }
}

dialog {
  position: relative;
  width: 100%;
  padding: 1rem;
  border: none;
  background-color: transparent;
}

.title {
  display: flex;
  justify-content: center;
  gap: 2rem;

  button {
    display: flex;
    gap: .4rem;
    background-color: black;
    border: none;
    font-size: large;
    font-family: auto;
    padding: .8rem;
    border-radius: 4px;
    color: white;
    cursor: pointer;
  }
}

.dialog-input-container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

fieldset {
  padding: 1rem;
  background-color: #F2F0EF;
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
.form input {
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

table {
  border-collapse: collapse;
  border: 2px solid rgb(140 140 140);
  font-family: sans-serif;
  font-size: 0.8rem;
  letter-spacing: 1px;
  width: 100%;
  font-size: large;
  margin-top: 3rem;
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
