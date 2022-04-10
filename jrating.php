<!DOCTYPE HTML>
<?php
session_start();
$username=$_SESSION['username'];
$farmer=$_SESSION["farm"];
?>
<html>
<head>
    <title> DRS Farmer Rating </title>
     <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
 <link rel="stylesheet" type="text/css" href="jmenustyle.css" />
  <link rel="stylesheet" type="text/css" href="jstyle.css" />
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style>
 .topnav-left {
  float: right !important;
}
.topnav-right {
  float: left !important;
}

.txt-center {
    text-align: center;
}
.hide {
    display: none;
}

*{
    margin: 0;
    padding: 0;
}
.rate {
    
    height: 46px;
    padding: 0 220px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
div.transbox {
  margin: 30px;
  background-color: #000;
  border: 1px solid black;
  width: 40%;
  opacity: 0.6;
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #fff;
}
.custom {
    width: 78px !important;
    height: 40px !important;
    line-height: 10px !important;
}
.custom1 {
    background-color: #368CF6;
    line-height: 10px !important;
     width: 200px !important;
}

</style>
</head>
<body>
     <?php include_once('jheader.php'); ?>
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
<div class="txt-center">
   <center>
    <div class="transbox" >
       
          
    <form method="POST" >
        <h2 style="color: white;"> Farmer Feedback </h2> <hr>
        <h3 style="color: white;"> Farmer: <?php echo $farmer; ?> </h3>
        <h3 style="color: white;"> Overall Rating </h3>
       <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div> <br> <br> 

    <input type="text" size="70" height="100" name="comment" placeholder="Your Comment.." style="font-size: 14pt; height: 100px; width:350px; "> <br> <br> <br>
    <input type="email" size="70" height="100" name="email" placeholder="Your Email Address.." style="font-size: 13pt; height: 40px; width:350px; " required> <br> <br>
    <div id="d1" style="color: white;">  <br> <br> <br> <br> </div>
            <input type="submit" class="btn btn-primary custom" name="submit" value="Submit"> 
            <br> <br> <br>
        </div>
    </form>
</center>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</header>
<?php

$con=mysqli_connect("localhost","root","","OFM");
if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($_POST['submit']))
{
$email=$_POST['email'];
$comment=$_POST['comment'];
$rate=$_POST['rate'];
$sql_user=mysqli_query($con,"SELECT * FROM iwp_database___user_database WHERE Username='$username' AND User_Email='$email'");
$sql=mysqli_query($con,"SELECT * FROM iwp_database___rating_database WHERE Username='$username' AND Farmer_Name='$farmer'");
if(mysqli_num_rows($sql_user)==0)
{
    echo '<script> document.getElementById("d1").innerHTML= "Invalid Email Address"</script>';
}
else if(mysqli_num_rows($sql)>0)
{
  echo '<script> document.getElementById("d1").innerHTML= "Already rated!"</script>';
}
else
{
$sql_insert=mysqli_query($con,"INSERT INTO iwp_database___rating_database(Username, Farmer_Name, Rating, Comment,User_Email) VALUES('$username','$farmer','$rate','$comment','$email')");
$sql_update=mysqli_query($con, "UPDATE iwp_database___farmer_database SET Rating_Count=Rating_Count+1, Stars=Stars+'$rate',  Rating=Stars/Rating_Count WHERE Username='$farmer'");

}
}
?>
</body>
</html>
