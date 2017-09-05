<?php

class Metrics {

  private $input;
  
  public function __construct($input) {
    $this->input = $input;
  }

  public function getLines() {

    // Reg-ex tested on mac, could use '/\n|\r/' on windows?
    $linesArray = preg_split('/\n/', $this->input);
    return count($linesArray);
  }

  public function getLinesOfCode() {

    // Reg-ex tested on mac, could use '/\n|\r/' on windows?
    $linesArray = preg_split('/\n/', $this->input);
    $linesOfCodeArray = array();

    // Remove empty lines
    foreach ($linesArray as $value) {

      // Push non empty elements (lines) to linesOfCodeArray
      if (!trim($value) == '') {
        $linesOfCodeArray[] = $value;
      }
    }

    return count($linesOfCodeArray);
  }

  public function getNestingDepth() {
    echo "getNestingDepth";
  }

  public function getLongestLine() {
    echo "getLongestLine";
  }
}