<?php

//set the session variables
if(!$_SESSION) {
  //session variable to store the phrase
  $_SESSION['phrase'] = $game->phrases->getPhrase();

  //session variable to store an array containing all the letters in the phrase
  $_SESSION['letters'] = $game->phrases->getCharacters();

  //sessiion variable to store an array of all unique letters in phrase
  $_SESSION['unique_chars'] = $game->phrases->getLetters();

  //session variable for storing the array of letters selected so far
  $_SESSION['selected'] = $game->selected;

//session variable for keeping track of lives lost
  $_SESSION['score'] = $game->lives;

  /* session variable used in checkForWin method, used to store number of characters in phrase that are NOT spaces*/
  $_SESSION['counter'] = 0;

}

//if a button from the keyboard is picked, set the value of that button to the variable named $selected.
if(isset($_POST['buttons_array'])) {
  $selected = $_POST['buttons_array'];

//check selected letter to see if it's in the phrase
  $game->phrases->checkLetter($selected);

}
//
// $game->checkForWin();
// $game->gameOver();

?>
