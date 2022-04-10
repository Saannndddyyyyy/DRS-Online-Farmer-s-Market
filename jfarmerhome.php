<!DOCTYPE HTML>
<?php
session_start();
 ?>
<html>
<head>
  <title>Online Farmer's Market</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="jstyle.css" />
  
     <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <style>
.topnav-left {
  float: left !important;
}
.topnav-right {
  float: right !important;
}
</style>
</head>
<body>
  <?php include_once('jfarmerheader.php'); ?>

 <header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
              <h1> DRS</h1>
            <p>Online Farmer's Market<br>
            <?php
           echo "<h5 style='color: white;'> Logged in as " .$_SESSION['username']; "</h5>";
            ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>  <br>

      </body>
      </html>