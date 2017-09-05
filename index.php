<?php

  // Require metrics class
  require_once('Metrics.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Metrics</title>
</head>
<body>

 <form action="" method="get">
  <textarea rows="10" name="snippet" placeholder='&#60;&#63;php &#10;&#10;&#63;&#62;'></textarea>
  <button type="submit">Submit</button>
 </form>

 <?php
 if (isset($_GET["snippet"])) {
   $input = $_GET["snippet"];
   $metrics = new Metrics($input);

   // Print current code snippet
   echo "<br>" . $metrics->getCodeSnippet() . "<br><hr>";

   // Print total amount of lines (including new lines)
   echo "Lines: " . $metrics->getLines() . "<br>";

   // Print total lines with code
   echo "Lines of code: " . $metrics->getLinesOfCode() . "<br>";

   // Print maximum nesting depth
   echo "Max nesting depth: " . $metrics->getNestingDepth() . "<br>";

   // Print number of characters of the longest line
   echo "Longest line: " . $metrics->getLongestLine() . " characters<br>";
 }
 ?>

</body>
</html>
