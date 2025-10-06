<?php
require('config.php');

$mcqs = $mysql->query("SELECT * FROM scholarship_mcqs") or die("Failed to fetch mcqs");

if (isset($_POST['scholarship'])) {
  $input_count = $mcqs->num_rows;
  $inputs = [];
  for ($i = 1; $i <= $input_count; $i++) {
    $inputs[] = $_POST['choice'.$i];
  }

  var_dump($inputs);
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
    $time_limit = 60 * 10; // In seconds
    ?>

    <dialog id="dialog">
      <p>Time is Over!</p>
      <a href="/">Go Back</a>
    </dialog>

    <h1 id="title" class="title">ScholarShip MCQ's</h1>
    <p id="timer">
      Time remaining: <span id="time-ms"><?php echo ($time_limit / 60) - 1; ?></span>m
      <span id="time-sec">60</span>s
    </p>
    <script>
    setInterval(() => {
      const min_elm = document.getElementById("time-ms");
      const sec_elm = document.getElementById("time-sec");
      let secs = sec_elm.innerText;
      secs -= 1;
      if (secs === 0) {
        let minute = Number(min_elm.innerText);
        minute -= 1;
        if (minute <= 0) minute = 0;
        min_elm.innerText = minute;
        secs = 60;
      }
      sec_elm.innerText = secs;
    }, 1000); // Every Second
    </script>

    <form id="form" hx-target="this" class="form" hx-post="/scholarship.php">
      <?php
      $count = 0;
      while ($mcq = $mcqs->fetch_array()) {
        $count += 1;
        $input_class = "choice".$count;
      ?>

      <div class="mcqs_container">
        <p><?php echo $mcq['question']; ?></p>
        <?php
        $choices = explode(",", $mcq['choices']);
        foreach ($choices as $choice) {
        ?>
        <input required name="<?php echo $input_class; ?>" type="radio" value="<?php echo $choice; ?>" />
        <label for="<?php echo $input_class; ?>"><?php echo $choice; ?></label>
        <?php } ?>
      </div>
      <?php } ?>

      <button name="scholarship" type="submit">Submit</button>
    </form>

    <?php 
    require('footer.php');
    ?>
  </body>

  <script>
  setTimeout(() => {
    document.getElementById("form").remove();
    document.getElementById("title").remove();
    document.getElementById("timer").remove();
    document.getElementById("dialog").show();
}, 1000 * <?php echo $time_limit; ?>);
  </script>
</html>

<style>
#dialog {
  border: none;
  position: relative;
  width: 100%;
  margin: 4rem 0;
  background-color: transparent;
  text-align: center;
  p {
    font-size: 2rem;
    font-weight: bold;
  }
  a {
    color: black;
  }
}

#timer {
  text-align: center;
}

.title {
  text-align: center;
  margin: 2rem 0;
}

.form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 3rem 0;

  button {
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

  button:hover {
    transform: translate(-0.05em, -0.05em);
    box-shadow: 0.15em 0.15em;
  }

  button:active {
    transform: translate(0.05em, 0.05em);
    box-shadow: 0.05em 0.05em;
  }
}

.mcqs_container {
  border: 1px solid black;
  width: 600px;
  margin: .3rem 0;
  padding: 1rem;
  border-radius: 4px;
  font-size: large;
  background-color: #f7f7f7;

  p {
    margin-bottom: 1rem;
  }
}
</style>
