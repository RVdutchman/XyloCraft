<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['password']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['username'])) {
    $error = "Username or Password is invalid";
  }
  else
  {
    // Define $username and $password
    $username=test_input($_POST['username']);
    $password=test_input($_POST['password']);
    if ($username == "XyloAdmin" && $password == "Waffles") {
      $_SESSION['username']=$username; // Initializing Session
      header("location: ../staff/index.php"); // Redirecting To Other Page
    } else {
      $error = "Username or Password is invalid";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
