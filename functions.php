<?php

function startSessionCheckScores(){
  session_start();
  if (!isset($_SESSION['current_score']) && !isset($_SESSION['high_score'])) {
    $_SESSION['current_score'] = 0;
    $_SESSION['high_score'] = 0;
  }

}

function checkGenerateCompare(){

  //Τσεκάρει αν έχει γίνει submit η φόρμα
  if (isset($_POST['submit'])) {

    $typedNumber = $_POST['typednumber'];

    //Αν μείνει κενό εμφανίζεται μήνυμα
    if ($typedNumber==="") {
      $_SESSION['message']="Εισάγετε ένα νούμερο.";
      echo $_SESSION['message'];
      $_SESSION['current_score'] = 0;
    } else { 
      unset ($_SESSION['message']);
      //αν επιλεχθεί αριθμός η εκτέλεση συνεχίζεται κανονικά
      
      //επιλογή τυχαίου αριθμού από τον υπολογιστή
      $min = 1;
      $max = 5;
      $randomNumber = rand($min, $max);

      //μετατροπή από κείμενο σε integer
      settype($typedNumber, "integer");

      $highScore = $_SESSION['high_score'];
      
      //Αν ο αριθμός που επιλέξαμε είναι ίδιος με τον τυχαίο του υπολογιστή τότε προστίθεται ένας πόντος στο σκορ μας      
      if ($randomNumber === $typedNumber) {
        $currentScore = $_SESSION['current_score'] += 1;

        //Αν το τρέχον σκορ είναι μεγαλύτερο από το υψηλό σκορ τότε παίρνει τη θέση του.
        if ($currentScore > $highScore) {
        $_SESSION['high_score'] = $currentScore;
        }

      //Αν ο αριθμός που επιλέξαμε είναι διαφορετικός από τον τυχαίο του υπολογιστή τότε το τρέχον σκορ μηδενίζεται  
      } elseif ($randomNumber !== $typedNumber) {
          $_SESSION['current_score'] = 0;
        }
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