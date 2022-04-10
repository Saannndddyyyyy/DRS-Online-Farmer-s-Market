<!DOCTYPE HTML>
<?php
session_start();
 ?>
<html>
<head>
<style> 
  .topnav-left {
  float: left !important;
}
.topnav-right {
  float: right !important;
}</style>
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
</head>
</head>
<body>

  
    <?php include_once('jheader.php'); ?>


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
<div class="slideshow-container">
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="farmer 2.jpg" style="width:100%;">
    <div class="text"><B><I></I></B></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="farmer 1.jpg" style="width:100%;">
    <div class="text"><B><I></I></B></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="farmer 3.jpg" style="width:100%;">
    <div class="text"><B><I></I></B></div>
  </div>
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div> <br>

    
    <div id="footer">
      <br> <br>
      <p><a href="jhome.html">Home</a> | <a href="jmenu.html">Catalog</a> | <a href="jcontact.html">Contact Us</a>| @copyright 19BCE1258,19BCE1339,19BCE1614</p>
      <br> <br>

    </div>
  <script>
    var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>
