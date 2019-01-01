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


    $hearts = array(5, 4, 3, 2, 1);// create array equal to number of lives


          foreach($hearts as $heart) {

//display a live Heart image for every number of lives left
              if($heart <= $numberLost) {
                echo "<img src='images/liveHeart2_resize.png' class='heart'>";
              }
              // else display a lost heart image
                  else {
                 echo "<img src='images/lostHeart2_resize.png' class='heart'>";
              }

    }

    return $numberLost;
  }

  public function checkForWin()
  {

  }

  public function checkForLose()
  {       //check if $_SESSION score is equqal to zero
              if($_SESSION['score'] == 0) {
                return true;  //if it is, game is over so return true
                 $this->gameOver();
          }
              else {
                  return false;  //otherwise return false
          }
  }

  public function gameOver()
  {
    if($this->checkForLose()) {

    }
  }

  public function displayPhrase()
  {

     foreach($_SESSION['letters'] as $key => $value) {

        if($value == " ") {    //Check if the character is a space

        echo '<li class="hide space">' // if it's a space then use hide space
                . $value . '</li>';
          }


                  else {
                 echo '<li class="hide letter">'
                      . $value . '</li>';
                    }
              }
  }




  public function displayKeyboard()
  {
    include('letters_array.php');

/********************TOP KEYBOARD ROW ****************************/
            echo '<div class="keyrow">';
            foreach($top_line as $letter) {
              if(in_array($letter , $_SESSION['selected']) &&
                  in_array($letter, $_SESSION['unique_chars'])) {

              echo '<button name="buttons_array"
                    class="correct" disabled value="'. $letter .'">'
                        . $letter .'</button>';

              }   elseif(in_array($letter , $_SESSION['selected'])) {
                echo '<button name="buttons_array"
                      class="incorrect" disabled  value="'. $letter .'">'
                          . $letter .'</button>';

                  }   else {
                echo '<button name="buttons_array" value="'
                      . $letter .'">'
                      . $letter .'</button>';

                      }
            }
            echo "</div>";
/*******************MIDDLE KEYBOARD ROW*******************************/
            echo '<div class="keyrow">';
            foreach($middle_line as $letter) {
              if(in_array($letter , $_SESSION['selected']) &&
                  in_array($letter, $_SESSION['unique_chars'])) {

              echo '<button name="buttons_array"
                    class="correct" disabled value="'. $letter .'">'
                        . $letter .'</button>';

              }   elseif(in_array($letter , $_SESSION['selected'])) {
                echo '<button name="buttons_array"
                      class="incorrect" disabled  value="'. $letter .'">'
                          . $letter .'</button>';

                  }   else {
                echo '<button name="buttons_array" value="'
                      . $letter .'">'
                      . $letter .'</button>';

                      }
            }
            echo "</div>";
/**************************BOTTOM KEYBOARD ROW************************/
            echo '<div class="keyrow">';
            foreach($bottom_line as $letter) {
              if(in_array($letter , $_SESSION['selected']) &&
                  in_array($letter, $_SESSION['unique_chars'])) {

              echo '<button name="buttons_array"
                    class="correct" disabled value="'. $letter .'">'
                        . $letter .'</button>';

              }   elseif(in_array($letter , $_SESSION['selected'])) {
                echo '<button name="buttons_array"
                      class="incorrect" disabled value="'. $letter .'">'
                          . $letter .'</button>';

                  }   else {
                echo '<button name="buttons_array" value="'
                      . $letter .'">'
                      . $letter .'</button>';

                      }
            }
            echo "</div>";


}




  public function displayScore()
  {
     //create HTML string to display the current score
        $score = "<h3> Lives: " . $_SESSION['score'] . "</h3>";
        return $score;   //return string
  }

}
