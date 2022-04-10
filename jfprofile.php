<!DOCTYPE HTML>
<?php
session_start();
$username=$_SESSION['username'];
 ?>
<html style="background-image: url('bg.jpg');">
<head>
<style>
  .topnav-left {
  float: left !important;
}
.topnav-right {
  float: right !important;
}</style>
  <title>My Profile</title>
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
<body style="background-image: url('bg.jpg')";>

    <?php include_once('jfarmerheader.php'); ?>

   <br> <br> <br> <br> <br> <br> <br><br>
  <?php
$con=mysqli_connect("localhost","root","","OFM");
        if(mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

  $data= '<div class="card text-center box-card-set" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 30%; float: left; margin-left: 500px;">';
    $displayquery = mysqli_query($con, "SELECT * FROM iwp_database___farmer_database  WHERE Username='$username'");
    if(mysqli_num_rows($displayquery) >0 )
    {
      while($row=mysqli_fetch_array($displayquery))
      {
        
      $data .='<div class="card-body" style="background-color:#d8ddf2; "> <h4 class="card-title"> Your Info </h4>

  <div class="col-6">  <B>Username: </B>' .$row['Username'].'</div> 
        <div class="col-6"> <B>Password: </B>' .$row['Password'].'</div> 
     <div class="col-6"> <B> Address: </B> ' .$row['Farmer_Loc_Name'].'</div> 
    <div class="col-6"> <B> Phone No.: </B>' .$row['Farmer_Phone'].'</div>';

      }
    }
  $data .='</div>';
  echo $data;

  ?>

   <div class="card-body" style="background-color:#d8ddf2; ">
<h4 class="card-title"> Current Profile Picture </h4>


  <?php

    $query1 = mysqli_query($con,"SELECT Farmer_Pfp FROM iwp_database___farmer_database WHERE Username='$username'");
  while($row = mysqli_fetch_array($query1))
{
$image=$row['Farmer_Pfp'];
$image_src="farmerpfp/".$image;}

?>
<img src='<?php echo $image_src; ?>' alt="No Profile Picture"  width="200px" height="200px"> <br> <br>
<?php


$con=mysqli_connect("localhost","root","","OFM");
        if(mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
if(isset($_POST['submit']))
{
  $allowedExts=array("gif","jpeg","jpg","png");
  $temp=explode(".",$_FILES['profile']['name']);
  $extension=end($temp);
  if((($_FILES['profile']['type']=="image/gif") || ($_FILES['profile']['type']=="image/jpeg") ||
($_FILES['profile']['type']=="image/jpg")|| ($_FILES['profile']['type']=="image/png")) && ($_FILES['profile']['size']<20000) && in_array($extension,$allowedExts))
{
if($_FILES["profile"]["error"]>0)
{
  echo "error".$_FILES["profile"]["error"];
}
}
else
{
  $name= $_FILES["profile"]["name"];
  $type=$_FILES["profile"]["type"];
  $temp= $_FILES["profile"]["tmp_name"];
  $target_dir = "farmerpfp/";

  $imagedel=$target_dir.$name;
  $files=glob("farmerpfp/*.*");
  for($i=1; $i < count($files); $i++)
  {
    $num = $files[$i];
    if(strcmp($imagedel,$num)==0)
    {

    unlink($num);
  }
  }
  $target_file = $target_dir . basename($_FILES["profile"]["name"]);
  $query = mysqli_query($con,"UPDATE iwp_database___farmer_database SET Farmer_Pfp='$name' WHERE Username='$username'");
    move_uploaded_file($_FILES['profile']['tmp_name'],$target_dir.$name);

  }
}
?>

<form action="jfprofile.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="profile" id="profile" class="btn btn-outline-danger" style="color: black;">
    <input type="submit" name="submit" value="Update" class="btn btn-danger">
  </form>

 </center>
</body>
</html>
