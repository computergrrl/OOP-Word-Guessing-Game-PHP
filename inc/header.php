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

}

if($_SESSION['score'] == 0 || $_SESSION['score'] < 0 ) {
  $_SESSION['score'] = 1;
}
//if a button from the keyboard is picked, set the value of that button to the variable $selected.
if(isset($_POST['buttons_array'])) {
  $selected = $_POST['buttons_array'];
  $game->phrases->checkLetter($selected);//call on checkLetter method to check and see if letter is found within the phrase

  if($game->checkForLose()) {
      echo "<h3 class='gameover'>Game Over</h3>";
  }
echo "<br />";
echo "<br />";




  // if(in_array($selected , $_SESSION['selected'])) {
  //   echo "you already picked that letter!";
  // } else { array_push($_SESSION['selected'] , $selected);
  // }
}
// var_dump($game->checkForLose());
//check to see if the game is over and if so display a button to start the game over
// if($game->checkForLose()) {
//       echo "<p align='center'><h2> Game Over!</h2>" ;
//       echo "<form action='index.php'>
//       . <input type='submit' value='Play Again?'></form>";
//       echo "</p>";
// }

// echo "<br />";
// echo "<br />";
// var_dump($_SESSION['score']);

?>
