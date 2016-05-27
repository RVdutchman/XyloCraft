<!DOCTYPE HTML>
<html lang="en">
  <head>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="../assets/fontAwesome/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
    <link href="../assets/animate.min.css" rel="stylesheet" type='text/css'>
    <link href="../css/xylocraft_style.css" rel="stylesheet">
    <script src="../assets/jquery-1.12.3.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
    <script src="../js/jsFunctions.js"></script>
      <title>XyloCraft Website</title>
  </head>

  <body><div class="all">
  <div class="container-fluid">
    <div class="row">
      <div class="navigation">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <ul class="nav nav-tabs nav-justified">
            <li><a href="../index.php">home</a></li>
            <li><a href="../staff">Staff Team</a></li>
            <li class="active"><a href="#">Speltypes</a></li>
            <li><a href="../contact">Contact</a></li>
            <li><a href="#">Etc.</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="header">
       <div class="row">
         <img class="img-responsive headerImg" src="../img/XyloCraft_Banner.png" alt="bannerImg">
      </div>
    </div>


    <div class="mid">
    <br>
      <center><img src="../img/survival.png" alt="survival" class="imgOpacity"></center>
      <hr>
      <center><img src="../img/Pvp-Arena.png" alt="Pvp Arena" class="imgOpacity"></center>
      <hr>
      <center><img src="../img/Jump-Maps.png" alt="Jump Maps" class="imgOpacity"></center>
    </div>
  </div>
  <footer id="footer"></footer>
  </div>
  <script type="text/javascript" id="js">
  $( document ).ready(function() {
        MakeFooter("spel");
  });
  elem = document.getElementById('js');
  elem.parentNode.removeChild(elem);
  </script>

</body>

</html>
