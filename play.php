<?php
session_start();

include('inc/Game.php');
include('inc/Phrase.php');

$phrases = new Phrase();
$phrase = $phrases->phrase;
$game = new Game($phrases);
// $phrases = $phrase->getRandomPhrase();

// $game = new Game($phrases);
var_dump($game->phrases->getPhrase());
echo "<br />";
echo "<br />";

var_dump($_SESSION);


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
			$game->displayPhrase()

							?>

            </ul>
        </div>
    </div>
    <div id="qwerty" class="section">

      <?php $game->displayKeyboard(); ?>

    

    </div>

</div>

</body>
</html>
