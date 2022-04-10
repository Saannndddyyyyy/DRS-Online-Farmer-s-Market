<!DOCTYPE HTML>
<?php
session_start();
$username=$_SESSION['username'];
?>
<html>
<head>
  <title>Drs About</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="jmenustyle.css" />
  <link rel="stylesheet" type="text/css" href="jstyle.css" />
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<style> 
  .topnav-left {
  float: left !important;
}
.topnav-right {
  float: right !important;
}</style>
<body>
<div style="background-color: #f1eee6;">
   <div id="restaurant-menu">
  <div class="section-title text-center center">
    <?php include_once('jfarmerheader.php'); ?>
    <br> <br> <br> <br> <br> <br> <br>
     <div class="overlay"> 
   <h2 style="font-family: 'Raleway', sans-serif;">About us</h2> 
      <hr>
      <h4 style="font-family: 'Raleway', sans-serif; color: white;"> We connect Consumers and Farmers </h4>
      <hr>
  <center>
  <div class="container">
  <div class="menu-section">
          <h2 class="menu-section-title">Our Vision</h2>
          <hr>
          <div class="menu-item"> 
          <p style="font-family: 'Raleway', sans-serif; font-size: 20px"> Smallholder farmers are a crucial part of the food value chain in
India. Now, the COVID-19 pandemic has brought new risks that threaten farmer's livelihoods. Over the past month, organic and small-scale farmers have been struggling to find inventive ways to connect directly with customers and deliver produce
to customers. We are working to empower the small scale and local farmers and offer a new sales
  and communications channel that allows consumers to access quality alternatives 
  whilst supporting their local community and keeping green.
</p> <br>
<div class="slideshow-container">
  <div class="mySlides">
    <div class="numbertext">1 / 3</div>
    <img src="farmer2.jpeg" style="width:100%;">
    <div class="text"><B><I></I></B></div>
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 3</div>
    <img src="farmer1.jpeg" style="width:100%;">
    <div class="text"><B><I></I></B></div>
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 3</div>
    <img src="farmer3.jpeg" style="width:100%;">
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
<h2 class="menu-section-title">Characteristics</h2> <hr> <br>
<p style="font-family: 'Raleway', sans-serif; font-size: 20px"><B>The farmers set their own prices </B> <br> 
The system is designed to replicate a live farmer’s market. The customers are buying directly from the farmer, at prices set by the farmer. The farmer describes what is available, supplies photos of the produce, and sets the selling price.
</p> <br> 
<p style="font-family: 'Raleway', sans-serif; font-size: 20px"><B>The customer has choices </B> <br> 
Just like at a traditional farmers’ market, the customer can browse everything that is available from all of the different farmers. The customer can choose exactly what to buy, how much to buy, and from what grower to buy.
</p> <br>
<p style="font-family: 'Raleway', sans-serif; font-size: 20px"><B>The customer has time to decide </B> <br> 
Unlike a live farmer's market that may be only open for a couple hours with all the good stuff gone soon after opening, here markets are usually always open. Customer have ample time to browse the catalog and plan menus for the week.
</p> <br>
<p style="font-family: 'Raleway', sans-serif; font-size: 20px"><B>Payment is taken or cards get charged when the orders are picked up</B> <br>
Most markets will have a set time and location for customers to pick up their orders. Payment can be made when the order is placed through the website or made in person when the order is picked up. Adjusting the amount owed for an order will be a common occurrence. Maybe something ran short due to bad weather, or maybe there were extra items available on the table when the customer arrived, or maybe the grower decided to adjust the price down at the last minute to account for an imperfection. In any case, the system helps you keep track of it all so everyone gets charged exactly the right amount. 
</p>
</center>
</div>
<br>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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