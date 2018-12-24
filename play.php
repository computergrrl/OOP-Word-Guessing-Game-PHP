<?php include('inc/Game.php');
			include('inc/Phrase.php');

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


  <?php
  $game = new Game();
  $phrase = new Phrase();
echo "<br />";
echo $phrase->thephrase;
?>



<div class="main-container">
    <div id="banner" class="section">
        <h2 class="header">Phrase Hunter</h2>
        <div id="phrase" class="section">
            <ul>


			<?php
		foreach($phrase->getCharacters() as $key => $value) {

							if($value == " ") {
									echo '<li class="hide space">'
												. $value . '</li>';
						}  else {
									 echo '<li class="hide letter">'
									 			. $value . '</li>';
											}
							}
							?>

            </ul>
        </div>
    </div>
    <div id="qwerty" class="section">
			<form action="play.php" method="get">
        <div class="keyrow">
            <button class="key" name="q">q</button>
            <button class="key" >w</button>
            <button class="key" name="e">e</button>
            <button class="key" name="r">r</button>
            <button class="key" name="t">t</button>
            <button class="key" name="y">y</button>
            <button class="key" name="u">u</button>
            <button class="key" name="i">i</button>
            <button class="key" name="o">o</button>
            <button class="key" name="p">p</button>
        </div>

        <div class="keyrow">
            <button class="key" name="a">a</button>
            <button class="key" name="s">s</button>
            <button class="key" name="d">d</button>
            <button class="key" name="f">f</button>
            <button class="key" name="g">g</button>
            <button class="key" name="h">h</button>
            <button class="key" name="j">j</button>
            <button class="key" name="k">k</button>
            <button class="key" name="l">l</button>
        </div>
        <div class="keyrow">
            <button class="key" name="z">z</button>
            <button class="key" name="x">x</button>
            <button class="key" name="c">c</button>
            <button class="key" name="v">v</button>
            <button class="key" name="b">b</button>
            <button class="key" name="n">n</button>
            <button class="key" name="m">m</button>
        </div>
			</form>
    </div>
</div>

</body>
</html>
