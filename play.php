<?php
session_start();
include('inc/Game.php');
include('inc/Phrase.php');

$phrases = new Phrase();
$game = new Game($phrases);
/* session variable used in checkForWin method, used to store number of characters in phrase that are NOT spaces*/
$_SESSION['counter'] = 0;

//if a button from the keyboard is picked, set the value of that button to the variable named $selected.
if(isset($_POST['buttons_array'])) {
$selected = $_POST['buttons_array'];

//check selected letter to see if it's in the phrase
$game->phrases->checkLetter($selected);

}

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
  <div id="scoreboard">
   <?php echo $game->displayScore();
         $game->numberLost(); ?>
 </div>

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
      <?php $game->displayKeyboard();  ?>

        </form>
    </div>

</div>

</body>
</html>
