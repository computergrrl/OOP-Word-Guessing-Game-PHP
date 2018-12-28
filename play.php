<?php
session_start();
include('inc/Game.php');
include('inc/Phrase.php');

$phrases = new Phrase();
$game = new Game($phrases);
$selected = "";

echo "<br />";
echo "<br />";


if(!$_SESSION) {
  $_SESSION['phrase'] = $game->phrases->getPhrase();
  $_SESSION['letters'] = $game->phrases->getCharacters();
  $_SESSION['unique_chars'] = $game->phrases->getLetters();
  // $_SESSION['selected'] = $game->selected;
}

if(isset($_POST['buttons_array'])) {
  $selected = $_POST['buttons_array'];
}
//echo $selected;
if($selected != null) {
  echo '$selected has a value and the value is ' . $selected . '!';
  $selected = $_SESSION['selected'];
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
      <?php $game->displayKeyboard(); ?>


    </form>
    </div>

</div>

</body>
</html>
