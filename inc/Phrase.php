<?php

class Phrase
{
public $phrases = array("Not in Kansas anymore" , "may the force be with you" , "knights who say ni", "i see dead people" , "Shaken not stirred" , "No crying in baseball" , "Houston we have a problem");

public $phrase;

  public function __construct()
  {
    $phrase = $this->getRandomPhrase();
    $this->phrase = $phrase;
  }

  public function getRandomPhrase()
  {
    $phrases = $this->phrases;
    $pick = rand(0, (count($phrases) - 1));
    $pick_phrase = $phrases[$pick];
    return $pick_phrase;
  }

  public function getPhrase()
  {
      return $this->phrase;
  }

  public function getCharacters()
  {
    $string = strtolower($this->getPhrase());
    $chars = str_split($string);
     return $chars;
  }

  public function getLetters()
  { 
      $chars = $this->getCharacters();
      $result = array_unique($chars);
      return $result;
  }

  public function checkLetters($selected)
  {
    $check = $selected;
    $letters = $this->getLetters();
    if(in_array($check, $letters)) {
        echo "Letter found!";

    }  else {
        echo "None of that letter!";
    }

  }
}
