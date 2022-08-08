<?php

function startSessionCheckScores(){
  session_start();
  if (!isset($_SESSION['current_score']) && !isset($_SESSION['high_score'])) {
    $_SESSION['current_score'] = 0;
    $_SESSION['high_score'] = 0;
  }

}

function checkIfInputIsEmpty(){
  if ($_POST['typednumber']===""){
    $_SESSION['message']="Εισάγετε ένα νούμερο.";
    echo $_SESSION['message'];
  } else {
    unset ($_SESSION['message']);
  }
}

function generateRandomNumber(){
  $min = 1;
  $max = 5;
  $randomNumber = rand($min,$max);
  return $randomNumber;
}

function checkGenerateCompare(){

  //Τσεκάρει αν έχει γίνει submit η φόρμα
  if (isset($_POST['submit'])) {

    checkIfInputIsEmpty();

    $randomNumber = generateRandomNumber();

    settype($_POST['typednumber'], "integer");
    
    if ($randomNumber === $_POST['typednumber']){
      $_SESSION['current_score'] += 1;
    } else if ($randomNumber !== $_POST['typednumber']){

        if ($_SESSION['current_score']>$_SESSION['high_score']){
          $_SESSION['high_score'] = $_SESSION['current_score'];
        }
        
      $_SESSION['current_score'] = 0;
    }

  }

}

function currentScore(){

  //Εμφάνιση του τωρινού σκορ

  $currentScore = $_SESSION['current_score'];

  if ($currentScore === 0) {
    echo "<p class='no-current-score'>Το σκορ σας είναι 0.</p>";
  } elseif ($currentScore > 0) {
    echo "<p class='your-current-score'>Το σκορ σας είναι" . " " . $currentScore . ".</p>";
  }

}

function highScore(){

  //Εμφάνιση του υψηλού σκορ

  $highScore = $_SESSION['high_score'];

  if ($highScore === 0) {
    echo "<p class='no-high-score'>Το υψηλότερο σκορ σας είναι 0.</p>";
  } elseif ($highScore > 0) {
    echo "<p class='your-high-score'>Το υψηλότερο σκορ σας είναι" . " " . $highScore . ".</p>";
  }

}