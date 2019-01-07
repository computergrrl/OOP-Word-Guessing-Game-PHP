<?php

class Phrase
{
public $phrases = array("Not in Kansas anymore" , "May the force be with you" , "The knights who say ni", "I see dead people" , "Shaken not stirred" , "No crying in baseball" , "Houston we have a problem");

  public function __construct($phrase = null)
  {
    $phrase = $this->getRandomPhrase();//get a random phrase upon any instantiation of this object
    //
    // $this->phrase = $phrase;//assign the random phrase to the $phrase property
    $this->phrase = $phrase;


  }

/**********************************************/

  public function getRandomPhrase()
  {
    $phrases = $this->phrases;
    $pick = rand(0, (count($phrases) - 1));//assign a random number to variable (number must be between 0 and the number of elements in the array)

    $pick_phrase = $phrases[$pick];//use that number to specify which prhase to select from the $phrases array

    return $pick_phrase;//return the phrase


  }
/************************************************/

  public function getPhrase()
  {

      return $this->phrase;
  }


/**********************************************/

  public function getCharacters()
  {
    $string = strtolower($_SESSION['phrase']);
  //  $string = strtolower($this->getPhrase());//convert all characters from selected phrase to lowercase

    $chars = str_split($string);//split the phrase into an array of individual letters
    $_SESSION['letters'] = $chars;
     return $chars;
  }

/**********************************************/

  public function getLetters()
  {
      $chars = $this->getCharacters();//assign a variable to the array of characters returned by the getCharacters method

      $result = array_unique($chars);//select only unique letters from the array of letters given
      return $result;
  }

/**********************************************/

  public function checkLetter($selected)
  {

    $letters = $this->getLetters();//array to check for letter

    if(in_array($selected, $letters)) {//if letter is found in array

        array_push($_SESSION['selected'] , $selected );//add letter to $selected letters array

        return true;

    }  else {   //else add letter to $selected array and remove one life
        array_push($_SESSION['selected'] , $selected );
        $_SESSION['score'] -= 1;

        return false;
      }

  }

}
