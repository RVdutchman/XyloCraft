<?php
session_start();
if (isset($_SESSION["username"])) {
    $logedIn = true;
} else {
    $logedIn = false;
}
?>
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
            <li class="active"><a href="#">Staff Team</a></li>
            <li><a href="../speltypes">Speltypes</a></li>
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
    <div class="midstaff">
      <?php
      if($logedIn) {
        echo '<b id="logout" style="font-size:25px;"><a href="../cms/logout.php">Log Out</a></b>';
      }
      ?>
        <h2 id="tableName"></h2>
        <div class="table table-responsive">
          <table id="staffTable" class="table table-hover"></table>
        </div>
        <?php
          if($logedIn) {
            echo '<button type="button" class="btn btn-primary" id="addTableBtn">add</button>';
            echo '<button type="button" class="btn btn-success" id="saveTableBtn">Save</button>';
          }
        ?>
    </div>
    <footer id="footer"></footer>
  </div>
  <script type="text/javascript" id="js">
    var Staff;
    var thead;
    var title;
    var Confirm = new CustomConfirm();
    (function() {
      $( document ).ready(function() {
        var logedIn = "<?php echo $logedIn; ?>";
        $.getJSON('../jsonFiles/Staff.json', function(jsonData) {

            Staff = jsonData.Staff;
            thead = jsonData.thead;
            title = jsonData.title;

            document.getElementById('tableName').innerHTML = jsonData.title;
            MakeTable(jsonData, "staffTable", logedIn);

            $( "#addTableBtn" ).click(function() {
              Staff.push({"mcName":"","twitter":"","rank":""});
              MakeTable(jsonData, "staffTable", logedIn);
              SetPageWith();
            });
            $( "#saveTableBtn" ).click(function() {
                  saveAll();
            });
            MakeFooter("staff");
            SetPageWith();
        });
      });
    })();
    elem = document.getElementById('js');
    elem.parentNode.removeChild(elem);
  </script>
  </div>
  <!-- the Confirm box  -->
  <div id="dialogoverlay"></div>
  <div id="dialogbox">
    <div>
      <div id="dialogboxhead"></div>
      <div id="dialogboxbody"></div>
      <div id="dialogboxfoot"></div>
    </div>
  </div>
</body>

</html>
