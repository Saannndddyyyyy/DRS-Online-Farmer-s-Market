<?php
session_start();
$username=$_SESSION['username'];
$cart_data=$_SESSION['cart_data'];
$cart_val = $_SESSION['product_cart'];
      $con = mysqli_connect('localhost', 'root', '', 'ofm');
     if(mysqli_connect_errno())
      { echo 'Filed to connect to mysql';}
       
       ?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Drs Select Billing Address</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="jstyle.css" />
<style> 
  .topnav-left {
  float: right !important;
}
.topnav-right {
  float: left !important;
}
#loading-img{
    display:none;
    }
    .response_msg{
    margin-top:10px;
    font-size:13px;
    background:#E5D669;
    color:#ffffff;
    width:250px;
    padding:3px;
    display:none;
    }
.input-field { 
            width: 100%; 
            padding: 10px; 
            text-align: center; 
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
    width: 100px !important;
    height: 40px !important;
    line-height: 10px !important;
}

    </style>
    </head>
    <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="jstyle.css" />
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    </head>
    <body>
            <?php include_once('jheader.php'); ?>
         <header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
            <center>
       <div class="transbox">
     <div style="max-width:400px;margin:auto"> 
    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="100" height="100"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M16.6569,28.66667c-9.11652,0 -16.6569,7.54038 -16.6569,16.6569v88.51953c0,9.11652 7.54038,16.6569 16.6569,16.6569h138.6862c9.11652,0 16.6569,-7.54225 16.6569,-16.6569v-88.51953c0,-9.11652 -7.54225,-16.6569 -16.6569,-16.6569zM16.6569,43h138.6862c1.36302,0 2.32357,0.94809 2.32357,2.32357v12.00977h-143.33333v-12.00977c0,-1.37548 0.94809,-2.32357 2.32357,-2.32357zM14.33333,78.83333h143.33333v55.00976c0,1.36302 -0.94809,2.32357 -2.32357,2.32357h-138.6862c-1.37548,0 -2.32357,-0.94809 -2.32357,-2.32357zM28.66667,93.16667v7.16667h50.16667v-7.16667z"></path></g></g></svg><h2 style="color: white;"> Select Billing Address </h2>
    <form name="payment-form" method="post" id="payment-form">
      <table bgcolor="black">
        <tr>
          <td><label for="Select">Select</label></td>
          <td><label for="Name"> Name </label></td>
          <td><label for="Number"> Billing Address </label></td>
            
        </tr>
        <tr>
     <label for="slt"> <?php 
      $query=mysqli_query($con, "SELECT Name, Address FROM billing WHERE Username='$username'");
        if(mysqli_num_rows($query) >0 )
      {
      while($row1=mysqli_fetch_array($query))
      {   
          $Name=$row1['Name'];
          
          $add=$row1['Address'];
          
      echo '<tr><td>';
      echo '<input type="radio" id="slt" name="addselect" value="';
      echo $add;
      echo '"></td><td>';
      echo $Name;
      echo '</td>';?></label>
 <td><label for="Number"><?php echo $add; echo '</td>'; }} ?></label></td>
    </tr></table>
    <br><div id="no" style="color: white;"> </div> <br>
     <input type="submit" class="btn btn-primary custom" name="addadd" value="New Address"> 
    <input type="submit" class="btn btn-primary custom" name="proceed" value="Submit" id="submit_form">
    <br> <br>
    <img src="img/loading.gif" id="loading-img">
    </form>
    <div class="response_msg"></div>
    <br> <br>
    </div>
    </div>
    </div>
</div></center>
</div>
</div>
</div> </div></div></div>
</div>
</div>
</header></body>
<?php 

  if(isset($_POST['addselect']))
  {
    $_SESSION['addr']=$_POST['addselect'];
  }
  if(isset($_POST['addadd']))
  {
      echo '<script> window.location="billingspage.php"</script>';
    }

    if(isset($_POST['proceed']))
    {
       if(isset($_POST['addselect']))
      echo '<script> window.location="jpayment.php"</script>';
    else
     echo '<script> document.getElementById("no").innerHTML="Select an Address!"</script> <br>';
    }

?>