<html lang="en" style="background-image: url('bg.jpg');">
<?php
session_start();
$username=$_SESSION['username'];
$con=mysqli_connect("localhost","root","","OFM");
        if(mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
<head>
  <title>Our Farmers</title>
  <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="jstyle.css" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>

.topnav-left {
  float: left !important;
}
.topnav-right {
  float: right !important;
}
.farm {
  display: inline-block;
  width: 150px;
  height: 150px;
  border-radius: 50%;

  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}

</style>
</head>
<body style="background-image: url('bg.jpg');">
  <?php include_once('jfarmerheader.php'); ?>
<br> <br> <br> <br>  <br> <br> <br>
<center><h2> Our Farmers</h2></center> 
<input id="myInput" type="text" placeholder="Search.." size="35" style="float: left; margin: 30px; margin-left: 10px; margin-left: 250px; margin-top: 100px;"> 


<form method="POST">
  <center>

<?php

$sql=mysqli_query($con,"SELECT * FROM iwp_database___farmer_database");

$data= '<table class="table table-bordered table-striped" style="width: 70%;"> <tr> <th> Farmer Name </th> <th> Farm Name </th> <th> Rating </th></tr> <tbody id="myTable">';

if(mysqli_num_rows($sql) >0 )
    {
while($row=mysqli_fetch_array($sql))
      {
      $data .='<tr>
      <td style="font-size: 20px;"> <span style="opacity: 0;"> All </span> <img src="farmerpfp/'.$row['Farmer_Pfp'].'" alt="No Image" id="alt" class="farm" style="font-size: 15px;"/> 
     '.$row['Username'].' </td>
    <td> '.$row['Farmer_Loc_Name'].' </td>';
  

    $data.='<td style="color:#E3CB22; font-size: 30px;">' .str_repeat("★",$row['Rating']) .'</td>
   
   </tr>';
      }
    }
  $data .='</tbody> </table>';
  echo $data;

?>
</form>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php
if(isset($_POST['rate']))
{
   $_SESSION["farm"]=$_POST['rate']; 
    echo '<script> window.location="jrating.php"</script>';
}
?>
</center>
</body>
</html>