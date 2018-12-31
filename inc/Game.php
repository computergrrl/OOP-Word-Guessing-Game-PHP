<?php

class Game
{
    public $phrases;
    public $lives = 5;
    public $selected;


  public function __construct(Phrase $phrases, $selected = null, $lives = null)
  {

      $this->phrases = $phrases;
      $this->selected = [];
  }

  public function numberLost()
  {
    $numberLost = $_SESSION['score'];
    $hearts = array(5, 4, 3, 2, 1);

    foreach($hearts as $heart) {
        if($heart <= $numberLost) {
          echo "<img src='images/liveHeart.png'>";
        }  else {
           echo "<img src='images/lostHeart.png'>";
        }

    }

    return $numberLost;
  }

  public function checkForWin()
  {

  }

  public function checkForLose()
  {
          if($_SESSION['score'] == 0) {
              return true;
          }   else {
                return false;
          }
  }

  public function gameOver()
  {

  }

  public function displayPhrase()
  {

       foreach($_SESSION['letters'] as $key => $value) {

          if($value == " ") {    //Check if the character is a space

            echo '<li class="hide space">'
                  . $value . '</li>'; // if it's a space then use hide space
            }  else {
                   echo '<li class="hide letter">'
                        . $value . '</li>';
                      }
              }
  }


  public function displayLetterKey()
  {

  }

  public function displayKeyboard()
  {
    include('buttons_array.php');

            echo '<div class="keyrow">';
            //create loop to print out first row html buttons from button_array
              for($i=0; $i < 10; $i++) {

                echo $buttons_array[$i];
              }
              echo '</div>';


              echo '<div class="keyrow">';
          //create loop to print out second row html buttons from button_array
              for($i=10; $i < 19; $i++) {  //set $i to 10 to offset first row
                echo $buttons_array[$i];
              }

                echo '</div>';

            echo '<div class="keyrow">';
          //create loop to print out third row html buttons from button_array
            for($i=19; $i < 26; $i++) {  //set $i to 19 to offset second row
              echo $buttons_array[$i];
            }

                echo '</div>';

  }

  public function displayScore()
  {

  }

}
