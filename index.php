<?php 

  // Require metrics class
  require_once('Metrics.php');

  if (isset($_POST['code'])) {
    $input = $_POST['code'];
    $metrics = new Metrics($input);

    // Print total lines
    echo 'Lines: ' . $metrics->getLines();

    // Print lines of code
    echo 'Lines of code: ' . $metrics->getLinesOfCode();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Metrics</title>
</head>
<body>

 <form action="" method="post">
  <textarea name="code"></textarea>
  <button type="submit">Submit</button>
 </form>

</body>
</html>