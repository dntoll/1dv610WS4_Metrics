<?php

class Metrics {

  private $codeToAnalyze;
  private $linesArray;
  private $linesOfCodeArray;
  private $countLineCharacters;
  private $maxNestedDepth;

  public function __construct(String $codeInput) {

    $this->codeToAnalyze = $codeInput;
    $this->linesArray = preg_split("/\n/", $this->codeToAnalyze);
    $this->linesOfCodeArray = array();
  }

  public function getCodeSnippet() {

    return $this->codeToAnalyze;
  }

  public function getLines() {

    return count($this->linesArray);
  }

  public function getLinesOfCode() {

    // Remove empty lines
    foreach ($this->linesArray as $value) {

      // Push non empty elements (lines) to linesOfCodeArray
      if (!trim($value) == "") {
        $this->linesOfCodeArray[] = $value;
      }
    }

    return count($this->linesOfCodeArray);
  }

  public function getNestingDepth() {

    $startClammers = 0;
    $endClammers = 0;
    $this->maxNestedDepth = 0;

    foreach ($this->linesArray as $value) {

      // if line contains "{"
      if (strstr($value, "{")) {

          // if endClammers then still in nesting depth
		      if ($endClammers > 0) {
			         $startClammers -= 1;
			         $endClammers = 0;
		         }
		      $startClammers += 1;

      } else if (strstr($value, "}")) { // if line contains "}"
        $endClammers += 1;

        // if amount of "{" and "}" are equal & amount of clammers
        // are bigger than max depth
        if ($startClammers == $endClammers &&
        $startClammers > $this->maxNestedDepth) {
            $this->maxNestedDepth = $startClammers;

            // reset clammer counter
            $startClammers = 0;
            $endClammers = 0;
        }
      }
    }

    return $this->maxNestedDepth;
  }

  public function getLongestLine() {

    $this->countLineCharacters = 0;

    foreach ($this->linesArray as $value) {

      // if length of line is bigger than the count
      if (strlen($value) > $this->countLineCharacters) {
        $this->countLineCharacters = strlen($value);
      }
    }

    return $this->countLineCharacters;
  }
}
