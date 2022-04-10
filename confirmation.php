<?php
session_start();
require_once 'jconfig.php';
$user_function = new Config;
$username=$_SESSION['username'];
//$cardnum=$_SESSION['cnum'];
$tamt=$_SESSION['tt'];
$address=$_SESSION['addr'];
$cart_data=$_SESSION['cart_data'];
$cart_val = $_SESSION['product_cart'];
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Drs Confirmation</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="jstyle.css" />
  <link rel="stylesheet" type="text/css" href="jmenustyle.css" />
<style>
  .topnav-left {
  float: right !important;
}
.topnav-right {
  float:left !important;
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
    <<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="100" height="100"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M45.01563,12.09375c-9.675,0 -17.46875,7.79375 -17.46875,17.46875v107.5c0,9.675 7.79375,17.46875 17.46875,17.46875h81.96875c9.675,0 17.46875,-7.79375 17.46875,-17.46875v-107.5c0,-9.675 -7.79375,-17.46875 -17.46875,-17.46875zM45.01563,20.15625h81.96875c5.24062,0 9.40625,4.16563 9.40625,9.40625v107.5c0,5.24062 -4.16563,9.40625 -9.40625,9.40625h-81.96875c-5.24063,0 -9.40625,-4.16563 -9.40625,-9.40625v-107.5c0,-5.24062 4.16562,-9.40625 9.40625,-9.40625zM54.42188,41.65625c-2.28438,0 -4.03125,1.74687 -4.03125,4.03125c0,2.28438 1.74687,4.03125 4.03125,4.03125h60.46875c2.28437,0 4.03125,-1.74687 4.03125,-4.03125c0,-2.28438 -1.74688,-4.03125 -4.03125,-4.03125zM54.42188,61.8125c-2.28438,0 -4.03125,1.74687 -4.03125,4.03125c0,2.28437 1.74687,4.03125 4.03125,4.03125h60.46875c2.28437,0 4.03125,-1.74688 4.03125,-4.03125c0,-2.28438 -1.74688,-4.03125 -4.03125,-4.03125zM54.42188,81.96875c-2.28438,0 -4.03125,1.74688 -4.03125,4.03125c0,2.28437 1.74687,4.03125 4.03125,4.03125h27.54688c2.28437,0 4.03125,-1.74688 4.03125,-4.03125c0,-2.28437 -1.74688,-4.03125 -4.03125,-4.03125zM95.43249,108.32672c-1.28601,0.01575 -2.54578,0.63513 -3.38562,1.72693l-7.52447,11.42188l-4.70312,-6.18073c-1.34375,-1.74687 -3.89845,-2.1521 -5.64532,-0.80835c-1.74688,1.34375 -2.14948,3.89845 -0.80573,5.64532l7.92865,10.61615c0.80625,1.075 2.01563,1.61145 3.35938,1.61145h0.13385c1.34375,0 2.55313,-0.80678 3.35938,-1.88178l10.61615,-15.99115c1.20938,-1.74688 0.67083,-4.29948 -1.07605,-5.50885c-0.70547,-0.45352 -1.48547,-0.66033 -2.25708,-0.65088z"></path></g></g></svg><h2 style="color: white; font-size: 30px;">Confirm Now</h2>  <hr>
          <div class="form-group">
             <form method="POST">
            <label for="Name"><h3  style="color: white; font-size: 20px;">Username: <?php echo $username;?></h3></label><br>
        <div id="d1"> </div> <br>
        <label><h3  style="color: white; font-size: 20px;"> Billing Address: <?php echo $address; ?></h3></label><br>
        <div id="d3"> </div> <br>
       <label> <h3  style="color: white; font-size: 20px;">Total Amount:  Rs <?php echo $tamt;?></label> </h3> <br>
        <div id="d4"> </div> <br>
         <input type="submit" value="Confirm" class="btn btn-primary custom" name="confirm_submit"> <br> <br> <br>
      </div>
      <div id="d4"> </div>
    </form>
    </div>
  </div></center>
</div>
      </div>
    </div>
  </div>
</div></header>
</body>
<?php

if(isset($_POST['confirm_submit']))
{
  echo '<script> alert("Payment Success")</script>';

   foreach($cart_data as $cart_key => $cart_value){
     $qty = $_SESSION['product_qty_cart'][$cart_key];
    $field_val['ID'] = $cart_value;
    $qty = $_SESSION['product_qty_cart'][$cart_key];
    $get_cart = $user_function->select_where_cart("iwp_database___product_database__1_", $field_val);

$sql_order=mysqli_query($con,"INSERT INTO orders(ID,Farmer_Name, User_Name,Produce_Name, Price,Quantity,File_Name)

VALUES('".$get_cart['ID']."','".$get_cart['Farmer_Name']."','$username','".$get_cart['Produce_Name']."','".$get_cart['Price']."','$qty','".$get_cart['File_Name']."')");

$sql_update=mysqli_query($con,"UPDATE iwp_database___product_database__1_ SET Quantity=Quantity-$qty WHERE ID='".$get_cart['ID']."'");

 $sql_mail=mysqli_query($con,"SELECT Farmer_Email FROM iwp_database___farmer_database WHERE Username='".$get_cart['Farmer_Name']."'");
$row=mysqli_fetch_array($sql_mail);

  $to=$row['Farmer_Email'];
$subject = "Order from Customer";
 $msg="Hey " .  $_POST['Farmer_Name'] . " You've recieved an order from" .  $username ." <br> ".$get_cart['Produce_Name']."<br> Quantity:". $qty . "kg <br>Thank you <br> DRS";
$header ="From:abc@somedomain.com \r\n";
$header .="MIME-Version: 1.0 \r\n";
  $header .="Content-type: text/html\r\n";
  $retval = mail($to,$subject,$msg,$header);


  //to consumer
  $sql_mail=mysqli_query($con,"SELECT User_Email FROM iwp_database___user_database WHERE Username='".$username."'");
 $row=mysqli_fetch_array($sql_mail);

   $to=$row['User_Email'];
 $subject = "Order confirmation";
 $msg="Hey " .  $username . "<br> You've confirmed an order for" .  $get_cart['Produce_Name'] ." <br> Provided by: ".$get_cart['Farmer_Name']."<br> Quantity:". $qty . "kg <br>Thank you <br> DRS";
 $header ="From:abc@somedomain.com \r\n";
 $header .="MIME-Version: 1.0 \r\n";
   $header .="Content-type: text/html\r\n";
   $retval = mail($to,$subject,$msg,$header);

}
  unset($_SESSION['product_cart']);
  echo '<script> window.location="jcart.php"</script>';
}

?>
</html>
