<?php

class Game
{
    public $phrases;
    public $lives;
    public $selected;
    public $top_line = array('q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p');
    public $middle_line = array('a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l');
    public $bottom_line = array('z', 'x', 'c', 'v', 'b', 'n', 'm');


  public function __construct(Phrase $phrases, $selected = null, $lives = null)
  {

      $this->phrases = $phrases;//Phrase object
      $this->selected = [];//array of selected letters
      $this->lives = 5;

      if (!$_SESSION) {$_SESSION['phrase'] = $this->phrases->phrase;
        $_SESSION['selected'] = $this->selected;
        $_SESSION['score'] = $this->lives;
    }


}
/**********************************************/

  public function numberLost()
{

    $numberLost = $_SESSION['score'];//create $numberLost variable that is equal to the scorekeeping session variable

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

    return $numberLost; //returns number of guessed letters NOT in the phrase.
  }

/**********************************************/


  public function checkForWin()
  {




           $arr1 = $this->phrases->getCharacters();//array of variables from phrase
            $arr2 = $_SESSION['selected'];//array of letters selected so far

/**** THIS LOOP USED TO COUNT THE NUMBER OF CHARACTERS THAT ARE NOT SPACES****
    use a loop to count all of the characters in the phrase ($arr1) that are NOT spaces. Store that number in the $counter variable*/
            $counter = $_SESSION['counter'];
                  foreach($arr1 as $letter) {
                      if($letter != " ") {
                          $counter++;
                      }
                  }

/*create array that contains whatever letters are in both $arr1 and $arr 2 - this array will be the array of correct, guessed letters */
      $arr3 = array_intersect($arr1 , $arr2);



/* Compare the number of correctly guessed letters with the number of letters that aren't spaces in the phrase.  When they're equal then all the correct letters have been guessed and game is won */
    if(count($arr3) == $counter) {

        return true;
    }  else {
            return false;
    }
}

/**********************************************/

  public function checkForLose()
  {

    //check if $_SESSION score is equqal to zero
              if($_SESSION['score'] == 0) {
                return true;  //if it is, game is over so return true

              }
              else {
                  return false;  //otherwise return false
                }
  }

/**********************************************/
  public function gameOver()
  {
            if($this->checkForLose()) {
                    session_destroy();
                echo "<h3 class='rotate gameover'>Game Over</h3>";
                echo "<form action='play.php'>
                   . <input type='submit' value='Play Again?'></form>";
                return true;
            }  elseif ($this->checkforWin()) {
              session_destroy();
        echo "<h3 class='bounce gamewin'>YOU WIN!!! </h3>";
        echo "<form action='play.php'>
           . <input type='submit' value='Play Again?'></form>";
                return true;
            }
        else {
            return false;
        }
  }

/**********************************************/
  public function displayPhrase()
  {


     foreach($this->phrases->getCharacters() as $key => $value) {

//check to see if letters have been selected and should be displayed
        if(in_array($value , $_SESSION['selected'])) {

          echo '<li class="show letter">'
               . $value . '</li>';
        }


//if letter hasn't been selected then check if character is a space and then display "hide space" or "hide letter" class accordingly

        elseif($value == " ") {

        echo '<li class="hide space">' // if it's a space then use hide space
                . $value . '</li>';
          }


                  else {     //otherwise show hide letter box
                 echo '<li class="hide letter">'
                      . $value . '</li>';
                    }
              }
  }

/**********************************************/
  public function displayKeyboard()
  {


/*First checks to see if game is over and if it is then disables the entire keyboard*/
            if($this->gameOver()) {

          /******** Top row of keys (disabled)  *********/
              echo '<div class="keyrow">';

                  foreach($this->top_line as $letter) {
                    echo '<button name="buttons_array"
                          disabled value="'. $letter .'">'
                              . $letter .'</button>';
                  }

                echo '</div>';

          /******** Middle row of keys (disabled)  *********/
                echo '<div class="keyrow">';

                    foreach($this->middle_line as $letter) {
                      echo '<button name="buttons_array"
                            disabled value="'. $letter .'">'
                                . $letter .'</button>';
                    }

                  echo '</div>';

          /******** Bottom row of keys (disabled)  *********/
                  echo '<div class="keyrow">';

                      foreach($this->bottom_line as $letter) {
                        echo '<button name="buttons_array"
                              disabled value="'. $letter .'">'
                                  . $letter .'</button>';
                      }

                    echo '</div>';

                }   else{    /*if game is not over then set up keyboard for gameplay*/

/********************TOP KEYBOARD ROW ****************************/
            echo '<div class="keyrow">';
            foreach($this->top_line as $letter) {

  /*  If letter has been selected and is in the phrase  */
              if(in_array($letter , $_SESSION['selected']) &&
                  in_array($letter, $this->phrases->getLetters())) {

/* then add class="correct" and disable the button */
              echo '<button name="buttons_array"
                    class="correct" disabled value="'. $letter .'">'
                        . $letter .'</button>';

  /*If letter is selected and is NOT the phrase  */
}   elseif(in_array($letter , $_SESSION['selected'])) {

/* then add class="incorrect" and disable the button */
                echo '<button name="buttons_array"
                      class="incorrect" disabled  value="'. $letter .'">'
                          . $letter .'</button>';

/* else button is enabled */
                  }   else {
                echo '<button name="buttons_array" value="'
                      . $letter .'">'
                      . $letter .'</button>';

                      }
            }
            echo "</div>";
/*******************MIDDLE KEYBOARD ROW*******************************/
            echo '<div class="keyrow">';
            foreach($this->middle_line as $letter) {

  /*If letter is in the phrase and has been selected*/
        if(in_array($letter , $_SESSION['selected']) &&
            in_array($letter, $this->phrases->getLetters())) {

      /* then add class="correct" and disable the button */
        echo '<button name="buttons_array"
              class="correct" disabled value="'. $letter .'">'
                  . $letter .'</button>';

      /*If letter is selected and is NOT the phrase  */
      }   elseif(in_array($letter , $_SESSION['selected'])) {

/* then add class="incorrect" and disable the button */
                echo '<button name="buttons_array"
                      class="incorrect" disabled  value="'. $letter .'">'
                          . $letter .'</button>';

/* else button is enabled */
                  }   else {
                echo '<button name="buttons_array" value="'
                      . $letter .'">'
                      . $letter .'</button>';

                      }
            }
            echo "</div>";
/**************************BOTTOM KEYBOARD ROW************************/
            echo '<div class="keyrow">';
            foreach($this->bottom_line as $letter) {

  /*If letter has been selected and is in the phrase*/
            if(in_array($letter , $_SESSION['selected']) &&
                in_array($letter, $this->phrases->getLetters())) {

          /* then add class="correct" and disable the button */
            echo '<button name="buttons_array"
                  class="correct" disabled value="'. $letter .'">'
                      . $letter .'</button>';

          /*If letter is selected and is NOT the phrase  */
          }   elseif(in_array($letter , $_SESSION['selected'])) {

/* then add class="incorrect" and disable the button */
                echo '<button name="buttons_array"
                      class="incorrect" disabled value="'. $letter .'">'
                          . $letter .'</button>';

/* else button is enabled */
                  }   else {
                echo '<button name="buttons_array" value="'
                      . $letter .'">'
                      . $letter .'</button>';

                      }
            }
            echo "</div>";

          }
}

/**********************************************/
  public function displayScore()
  {
     //create HTML string to display the current score
        $score = "<h3> Lives: " . $_SESSION['score'] . "</h3>";
        return $score;   //return string
  }

}
