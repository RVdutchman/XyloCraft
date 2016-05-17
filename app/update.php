<?php
session_start();
if (isset($_SESSION["username"])) {
  if(isset($_POST['jsonData']))
  {
    unlink('jsonFiles/Staff.json');
    $file = 'jsonFiles/Staff.json';
    $fh = fopen($file, 'w') or die("can't open file");
    fwrite($fh, $_POST['jsonData']);
    fclose($fh);
  }
} else {
  echo "DON'T TRY TO HACK ME! XO";
}
?>
