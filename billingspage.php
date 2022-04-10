<?php
session_start();
$username=$_SESSION['username'];
//$cardnum=$_SESSION['cnum'];
$tamt=$_SESSION['tt'];
$cart_data=$_SESSION['cart_data'];
$cart_val = $_SESSION['product_cart'];
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Drs Billing</title>
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
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,6.88c-30.35531,0 -55.04,24.68469 -55.04,55.04c0,21.8225 13.28969,47.00438 26.3375,67.08c13.04781,20.07563 26.1225,34.9375 26.1225,34.9375c0.65844,0.73906 1.59906,1.16906 2.58,1.16906c0.98094,0 1.92156,-0.43 2.58,-1.16906c0,0 13.07469,-14.88875 26.1225,-34.9375c13.04781,-20.04875 26.3375,-45.15 26.3375,-67.08c0,-30.35531 -24.68469,-55.04 -55.04,-55.04zM86,13.76c26.63313,0 48.16,21.52688 48.16,48.16c0,19.05438 -12.51031,43.83313 -25.2625,63.425c-10.69625,16.42063 -19.72625,27.23781 -22.8975,30.96c-3.15781,-3.72219 -12.18781,-14.59312 -22.8975,-31.0675c-12.75219,-19.61875 -25.2625,-44.3975 -25.2625,-63.3175c0,-26.63312 21.52688,-48.16 48.16,-48.16zM86,40.7425l-1.72,1.075l-25.8,15.48l3.44,5.805v26.3375h48.16v-26.3375l3.44,-5.805l-25.8,-15.48zM86,48.6975l17.2,10.32v23.5425h-10.32v-17.2h-13.76v17.2h-10.32v-23.5425z"></path></g></g></svg><h2 style="color: white;"> Billing Address </h2>
    <form name="billing-form" method="post" id="billing-form">
    <div class="form-group">
    <label for="Name"><h3  style="color: white;"> Name  </h3></label>
    <input type="text" class="input-field" name="name" placeholder="Name" required>
    </div>
    <div class="form-group">
    <label for="Number"><h3  style="color: white;"> Phone </h3></label>
    <input type="Number"class="input-field" name="Phone" placeholder="Phone number" required>
    </div>
    <div class="form-group">
    <label for="Address"><h3  style="color: white;"> Billing Address </h3></label>
    <input type="text" class="input-field" name="addr" placeholder="Billing Address" required>
    </div>
    <div class="form-group">
    <label for="City"><h3  style="color: white;">City </h3></label>
    <input type="text" class="input-field" name="city" placeholder="City" required>
    </div>
    <div class="form-group">
    <label for="Number"><h3  style="color: white;"> Pincode </h3></label>
    <input type="Number"class="input-field" name="Pincode" placeholder="Pincode" size=6 required>
    </div>
    <div class="form-group">
    <label for="Location"> <h3  style="color: white;"> Address Location</h3> </label>
    <select id="Location" name="AddrLocation" style="width: 300px; height: 40px;">
       <option value="Home" style="width: 300px; height: 40px;">Home(9AM-9PM)</option>
       <option value="Office" style="width: 300px; height: 40px;">Office(9AM-5PM)</option>
    </select>
    </div>
    <br><br> <br>
    <input type="submit" class="btn btn-primary custom" name="pay" value="Save" id="submit_form">
    <div class="response_msg"></div></form>
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
</header>
<?php 
if(isset($_POST['pay']))
{
$f=$_POST['name'];
$g=$_POST['Phone'];
$h=$_POST['addr'];
$j=$_POST['city'];
$k=$_POST['Pincode'];
$i=$_POST['AddrLocation'];

$_SESSION['addr']=$h;
$con = mysqli_connect('localhost', 'root', '', 'ofm');
if(mysqli_connect_errno())
{ echo 'Failed to connect to mysql';}
echo $username;
$query=mysqli_query($con, "INSERT INTO billing(Username, Name, Phone, Address, City, Pincode, Address_Location) VALUES('$username','$f','$g','$h','$j','$k','$i')");
    //echo 'hello';
  }
    //echo 'Thank you for placing the order';
    if(isset($query))
      echo '<script> window.location="jpayment.php"</script>';

?>
</body></html>