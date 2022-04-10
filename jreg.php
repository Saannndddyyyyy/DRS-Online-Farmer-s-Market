<!DOCTYPE HTML>
<?php
session_start();
?>
<html>
<head>
	<title>Online Farmer's Market</title>
	  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="jstyle.css" />
  <style>
    input[type=text], textarea {
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid #DDDDDD;
}
input[type=text]:focus, textarea:focus {
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid rgba(81, 203, 238, 1);
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
</style>
</head>
<body>
	<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
              <form  method="POST" name="f1">
                <center>
                  <div class="transbox">
                    
<h3  style="color: white;"> You are a? </h3>
<input type="radio" id="Farmer" name="type" value="Farmer"/>
<label for="Farmer"> <span style="color: white"> Farmer </span></label>
<input type="radio" id="Consumer" name="type" value="Consumer"/>
<label for="Consumer"> <span style="color: white"> Consumer </span></label> <br> <br>
<input type="submit" name="next" value="Next"class="btn btn-primary custom" >
<input type="submit" name="cancel" value="Go back!" class="btn btn-primary custom" > <br> <br>
</div> </center> </form>
<?php 
if(isset($_POST['next']))
{
  $type=$_POST['type'];
  if($type=="Consumer")
    header('Location: jconsumerreg.php');
  if($type=="Farmer")
    header('Location: jfarmerreg.php');
}
if(isset($_POST['cancel']))
    header('Location: jsign.php');
?>
</div>
</div>
</div>
</div>
</div>
</header>
</body>
</html>