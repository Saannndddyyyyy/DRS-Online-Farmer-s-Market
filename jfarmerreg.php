<!DOCTYPE HTML>
<?php
session_start();
?>
<html>
<head>
	<title>Online Farmer's Market</title>
	  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
              <form method="POST" name="f1" enctype="multipart/form-data">
                <center>
                  <div class="transbox">
                    
<h3  style="color: white;"> Username *</h3> <input type="text" name="username" placeholder="Enter your username.." size="30" rows="3" required> <br> <br>
<div id="d1" style="color: white;"> </div>
<h3  style="color: white;"> Password * </h3> <input type="password" name="password" placeholder="Enter your Password.." size="30" rows="3" required><br> <br>
<h5 id="d2" style="color: white;"> </h5> <h5 id="d3" style="color: white;" > </h5> <h5 id="d4" style="color: white;"> </h5>  <br>
<h3  style="color: white;"> Confirm Password * </h3> <input type="password" name="passwordconf" placeholder="Re-type your Password.." size="30" rows="3" required><br> <br>
<h5 id="d6" style="color: white;"> </h5>
<h3  style="color: white;"> Email Address *</h3> <input type="email" name="email" placeholder="Enter your Email Address.." size="30" rows="3"> <br> <br> 
<h3  style="color: white;"> Enter your Date of Birth * </h3> <input type="date" name="dob" size="30" rows="3" required> <br> <br>
<h3  style="color: white;">Enter your City / Town of Birth *</h3> <input type="text" name="ques" placeholder="Enter your birth place.." size="30" rows="3" required><br> <br>
<h3  style="color: white;">Farm Address *</h3> <input type="text" name="addr" placeholder="Enter your Address.." size="30" rows="3" required> <br> <br>
<h3  style="color: white;"> Phone Number *</h3> <input type="text" name="phoneno" placeholder="Enter your Phone number.." size="30" rows="3" required> <br> <br> <br> <div id="d5" style="color: white;"> </div>
<h3  style="color: white;">Profile Picture</h3> <input type="file" name="profile" id="profile" style="color: white;"> <br> <h5 style="color: white;">(Optional)</h5> <br>
<input type="submit" name="next" value="Next" class="btn btn-primary custom"><br> <br>
</div>
</div>
</center>
</form>
</div>
</div>
</div>
</div>
</div>
</header>
<?php
$count=0;

$con=mysqli_connect("localhost","root","","OFM");
if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['next']))
{
  $username=$_POST['username'];
    $mail=$_POST['mail'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$confpassword=$_POST['passwordconf'];
$addr=$_POST['addr'];
$ques=$_POST['ques'];
$phoneno=$_POST['phoneno'];
$pwdpattern1="/(?=.*?[A-Z])/";
$pwdpattern2="/(?=.*?[0-9])/";
$alpha="/[0-9]/";
$sql_user=mysqli_query($con,"SELECT * FROM iwp_database___farmer_database WHERE Username='$username'");

  if(mysqli_num_rows($sql_user)!=0)
  {
     echo '<script> document.getElementById("d1").innerHTML= "Username is taken!"</script>';
  }
  
  else if(mysqli_num_rows($sql_user)==0)
  {
  echo '<script> document.getElementById("d1").innerHTML= "Username accepted!"</script>';
  $count++;
  }

  $x=0;
if(!preg_match($pwdpattern1,$password))
  {
    echo '<script> document.getElementById("d2").innerHTML= "Password must contain atleast one capital letter"</script>';
    $x++;
  }
if(!preg_match($pwdpattern2,$password))
  {
    echo '<script> document.getElementById("d3").innerHTML= "Password must contain atleast one Number"</script>';
    $x++;
  }
  if(strlen($password)<6 || strlen($password)>14)
  {
    echo '<script> document.getElementById("d4").innerHTML= " Password length must be 6-14 characters."</script>';
    $x++;
  }

  if($x==0)
  {
    if(strcmp(strval($password),strval($confpassword))==0)
    {
      echo '<script> document.getElementById("d6").innerHTML= " Password accepted! "</script>';
    $count++;
  }
  else 
     echo '<script> document.getElementById("d6").innerHTML= " Password does not match! "</script>';
  }

  if(strlen($phoneno)!=10 || !preg_match($alpha,$phoneno))
  {
     echo '<script> document.getElementById("d5").innerHTML= " Incorrect phone number"</script>';
  }
  else 
  {
    $count++;
  }
if($count==3)
{
  while(true)
  {
    $id=rand(150,500);
    $FID= "F". $id;
$sql_user=mysqli_query($con,"SELECT * FROM iwp_database___farmer_database WHERE Farmer_ID='$FID'");
if(mysqli_num_rows($sql_user)==0)
{
  //echo '<script> swal("Accepted!", "Account created!", "success")</script>';
  break;
}
}


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

    move_uploaded_file($_FILES['profile']['tmp_name'],$target_dir.$name);

  }
   $query=mysqli_query($con,"INSERT INTO iwp_database___farmer_database(Farmer_ID,Username, Password, Farmer_Loc_Name,Farmer_Phone,Farmer_Pfp,Farmer_Email)VALUES('$FID','$username','$password','$addr','$phoneno','$name','$mail')");
   $_SESSION['username']=$username;

//mailing
$to=$_POST['email'];
$subject = "Welcome to DRS Online Farmer's Market!";
$msg="Hey " .  $_POST['username'] . " thanks for signing up! You're a part of the community that connects Farmers and Consumers. <br> Thank you <br> DRS"; 
$header ="From:abc@somedomain.com \r\n";
$header .="MIME-Version: 1.0 \r\n";
  $header .="Content-type: text/html\r\n";
  $retval = mail($to,$subject,$msg,$header);


   header('Location: jfarmerhome.php');

}

 }

?>

</body>
</html>


