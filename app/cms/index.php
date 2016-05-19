<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: ../staff/index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login Form in PHP with Session</title>
      <link href="../assets/bootstrap.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
      <link href="../assets/fontAwesome/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
      <link href="../assets/animate.min.css" rel="stylesheet" type='text/css'>
      <link href="../css/xylocraft_style.css" rel="stylesheet">
      <script src="../assets/jquery-1.12.3.min.js"></script>
      <script src="../assets/bootstrap.min.js"></script>
      <script src="../js/jsFunctions.js"></script>
  <body>
    <div class="all">
      <div class="container-fluid">
        <div class="row">
          <div class="navigation">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <ul class="nav nav-tabs nav-justified">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../staff">Staff Team</a></li>
                <li><a href="../speltypes">Speltypes</a></li>
                <li><a href="../contact">Contact</a></li>
                <li><a href="#">Etc.</a></li>
                <li class="active"><a href="#">Admin Panel</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="header">
           <div class="row">
             <img class="img-responsive headerImg" src="../img/XyloCraft_Banner.png" alt="bannerImg">
          </div>
        </div>
        <div id="main">
          <div id="login">
          <h2>Login:</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <div style="padding:40px 50px;">
                  <div class="form-group">
                    <label for="username"><span class="fa fa-user"></span> Username:</label>
                    <input name="username" type="text" class="form-control" id="name" required="">
                  </div>
                  <div class="form-group">
                    <label for="password"><span class="fa fa-eye"></span> Password:</label>
                    <input name="password" type="password" class="form-control" id="password" required="">
                  </div>
                    <button name="submit" value="Login" type="submit" class="btn btn-success btn-block"><span class="fa fa-power-off"></span> Login</button>
              </div>
              <span><?php echo $error; ?></span>
            </form>
          </div>
        </div>
        <footer id="footer"></footer>
        <script type="text/javascript" id="js">
        $( document ).ready(function() {
              MakeFooter("cms");
        });
        elem = document.getElementById('js');
        elem.parentNode.removeChild(elem);
        </script>
      </div>
    </div>
  </body>
</html>
