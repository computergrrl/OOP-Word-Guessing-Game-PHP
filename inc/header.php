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

  $_SESSION['score'] = $game->lives;
  $_SESSION['counter'] = 0;

}

if($_SESSION['score'] == 0 || $_SESSION['score'] < 0 ) {
  $_SESSION['score'] = 0;
}
//if a button from the keyboard is picked, set the value of that button to the variable $selected.
if(isset($_POST['buttons_array'])) {
  $selected = $_POST['buttons_array'];
  $game->phrases->checkLetter($selected);

}


$game->checkForWin();
$game->gameOver();


// var_dump($game->checkForLose());
//check to see if the game is over and if so display a button to start the game over
// if($game->checkForLose()) {
//       echo "<p align='center'><h2> Game Over!</h2>" ;
//       echo "<form action='index.php'>
//       . <input type='submit' value='Play Again?'></form>";
//       echo "</p>";
// }

?>
