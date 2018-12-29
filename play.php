<?php
session_start();
include('inc/Game.php');
include('inc/Phrase.php');

$phrases = new Phrase();
$game = new Game($phrases);
echo "<br />";
echo "<br />";

//set the session variables
if(!$_SESSION) {
  //session variable to store the phrase
  $_SESSION['phrase'] = $game->phrases->getPhrase();

  //session variable to store an array containing all the letters in the phrase
  $_SESSION['letters'] = $game->phrases->getCharacters();

  //sessiion variable to store an array of all unique letters in phrase
  $_SESSION['unique_chars'] = $game->phrases->getLetters();

  $_SESSION['selected'] = $game->selected;
}




if(isset($_POST['buttons_array'])) {
  $selected = $_POST['buttons_array'];
  $game->phrases->checkLetter($selected);
  // if(in_array($selected , $_SESSION['selected'])) {
  //   echo "you already picked that letter!";
  // } else { array_push($_SESSION['selected'] , $selected);
  // }
}
echo "<br />";
echo "<br />";
var_dump($_SESSION['selected']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phrase Hunter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body >


<div class="main-container">
    <div id="banner" class="section">
        <h2 class="header">Phrase Hunter</h2>
        <div id="phrase" class="section">
            <ul>


			<?php
            $game->displayPhrase();


							?>

            </ul>
        </div>
    </div>
    <div id="qwerty" class="section">
        <form action="play.php" method="post">
      <?php $game->displayKeyboard();
        
      ?>


    </form>
    </div>

</div>

</body>
</html>
