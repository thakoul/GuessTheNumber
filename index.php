<?php
  require_once ("functions.php");
  startSessionCheckScores();
?>
<!DOCTYPE html>
<html lang="el">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <script src="js/script.js"></script>
  <title>Μαντέψτε τον αριθμό</title>
</head>

<body>
  <div class="container">
    <header>
      <h1>Μαντέψτε τον αριθμό</h1>
    </header>
    <article>
      <form class="number-choice-form" action="index.php" method="post">
        <label for="typednumber">Επιλέξτε έναν αριθμό (1 έως 3):</label>
        <input type="number" id="typednumber" name="typednumber" min="1" max="1" />
        <input class="submit-button" type="submit" name="submit" value="Υποβολή" />
      </form>
    </article>

    <?php
      check();
    ?>

    <div class="currentscore">

      <h2>Τωρινό σκορ</h2>

      <?php
        currentScore();
      ?>

    </div>

    <div class="highscore">

      <h2>Υψηλότερο σκορ</h2>

      <?php
        highScore();
      ?>

    </div>

    <footer>
      <p class="copyright">Copyright 2022 &copy; Thanos Koulouris</p>
    </footer>
  </div>
</body>

</html>