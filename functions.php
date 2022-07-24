<?php

function startSessionCheckScores(){
  session_start();
  if (!isset($_SESSION['current_score']) && !isset($_SESSION['high_score'])) {
    $_SESSION['current_score'] = 0;
    $_SESSION['high_score'] = 0;
  }
}

function check(){

  if (isset($_POST['submit'])) {
    $typedNumber = $_POST['typednumber'];
    $min = 1;
    $max = 1;
    $randomNumber = rand($min, $max);
    
    settype($typedNumber, "integer");
    $highScore = $_SESSION['high_score'];
    
    if ($randomNumber === $typedNumber) {
      $currentScore = $_SESSION['current_score'] += 1;
      if ($currentScore > $highScore) {
        $_SESSION['high_score'] = $currentScore;
      }
    } elseif ($randomNumber != $typedNumber) {
      $_SESSION['current_score'] = 0;
    }
  }

}

function currentScore(){

  $currentScore = $_SESSION['current_score'];

  if ($currentScore === 0) {
    echo "<p class='no-current-score'>Το σκορ σας είναι 0.</p>";
  } elseif ($currentScore > 0) {
    echo "<p class='your-current-score'>Το σκορ σας είναι" . " " . $currentScore . ".</p>";
  }
  
}


function highScore(){

  $highScore = $_SESSION['high_score'];

  if ($highScore === 0) {
    echo "<p class='no-high-score'>Το υψηλότερο σκορ σας είναι 0.</p>";
  } elseif ($highScore > 0) {
    echo "<p class='your-high-score'>Το υψηλότερο σκορ σας είναι" . " " . $highScore . ".</p>";
  }

}