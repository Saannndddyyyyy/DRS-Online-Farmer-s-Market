<?php
session_start();
$username=$_SESSION['username'];
$tamt=$_SESSION['tt'];
$cart_data=$_SESSION['cart_data'];
$cart_val = $_SESSION['product_cart'];
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Drs Payment</title>
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
       <div class="transbox"> <br>
     <div style="max-width:400px;margin:auto"> 
   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="100" height="100"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M22.93333,22.93333c-12.66493,0 -22.93333,10.2684 -22.93333,22.93333v11.46667c0,12.66493 10.2684,22.93333 22.93333,22.93333v51.6c0,9.43116 7.76884,17.2 17.2,17.2h91.73333c9.43116,0 17.2,-7.76884 17.2,-17.2v-51.6c12.66493,0 22.93333,-10.2684 22.93333,-22.93333v-11.46667c0,-12.66493 -10.2684,-22.93333 -22.93333,-22.93333zM34.4,34.4h68.8v103.2h-63.06667c-3.23951,0 -5.73333,-2.49383 -5.73333,-5.73333v-51.6zM126.13333,34.4h11.46667v45.86667v51.6c0,3.23951 -2.49383,5.73333 -5.73333,5.73333h-5.73333z"></path></g></g></svg><h2 style="color: white;"> Enter Card Details </h2>
    <form name="payment-form" method="post" id="payment-form">
    <div class="form-group">
    <label for="Name"><h3  style="color: white;"> Name On Card </h3></label>
    <input type="text" class="input-field" name="name" placeholder="Name" required>
    </div>
    <div class="form-group">
    <label for="Number"><h3  style="color: white;"> Card Number </h3></label>
    <input type="Number"class="input-field" name="cnum" placeholder="card number" required>
    </div>
    <div class="form-group">
    <label for="expmonth"><h3  style="color: white;"> Valid Through </h3></label>
    <input type="text" class="input-field" name="expmonthyear" placeholder="expiry month/year" required>
    </div>
    <div class="form-group">
    <label for="cvv"> <h3  style="color: white;"> CVV</h3> </label>
    <input type="Number"class="input-field" name="Cvv" placeholder="CVV" required>
    </div>
    <br><br> <br>
    <input type="submit" class="btn btn-primary custom" name="pay" value="Submit" id="submit_form" onclick="cardnumber(cnum,Cvv,expmonthyear)">
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
if(isset($_POST['pay']))
{
$f=$_POST['name'];
$g=$_POST['cnum'];
$h=$_POST['expmonthyear'];
$j=$_POST['Cvv'];
$con = mysqli_connect('localhost', 'root', '', 'ofm');
if(mysqli_connect_errno())
{ echo 'Filed to connect to mysql';}
echo $username;
$checkno=mysqli_query($con, "SELECT Card_Number FROM payments WHERE Username='$username' AND Card_Number='$g'");
$row1=mysqli_fetch_array($checkno);
if($g==$row1['Card_Number'])
{
	echo '<script> alert("Card Already Exists");</script>';
	return;
}
else
{
$query=mysqli_query($con, "INSERT INTO payments(Username, Name_On_Card, Card_Number, Exp_MonthYear, CVV) VALUES('$username','$f','$g','$h','$j')");
   if(isset($query))
     echo '<script> window.location="selectpayment.php"</script>';
  }
}
    //echo 'Thank you for placing the order';
    //echo '<script> window.location="index1.php"</script>';
$_SESSION['cnum']=$g;
?>
<script>
function cardnumber(inputtxt,cvvtext,exptxt)
{
  var cardno = /^\d{16}$/;
  var cvvv=/^[0-9]{3,4}$/;
  var exp=/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/;
  if(inputtxt.value.match(cardno))
        {
      
        }
      else
        {
        swal("Not a valid card number");
        return false;
        }
   if(exptxt.value.match(exp))
        {
      
        }
      else
        {
        alert("Not a valid expiry date!");
        return false;
        }
if(cvvtext.value.match(cvvv))
        {
          swal("Card details saved!");
        }
      else
        {
        alert("Not a valid CVV!");
        return false;
        }
}
</script>
</html>
