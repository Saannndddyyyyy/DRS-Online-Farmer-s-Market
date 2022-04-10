<!DOCTYPE HTML>
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
    line-height: 10px !important;
     width: 150px !important;
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
              <form method="POST" name="f1">
                <center>
                  <div class="transbox">
<h3  style="color: white;"> You are a? </h3>
<input type="radio" id="Farmer" name="type" value="Farmer"/>
<label for="Farmer"> <span style="color: white"> Farmer </span></label>
<input type="radio" id="Consumer" name="type" value="Consumer"/>
<label for="Consumer"> <span style="color: white"> Consumer </span></label> <br> <br>
<div id="t" style="color: white;"> </div> <br>
<h3  style="color: white;"> Username *</h3> <input type="text" name="username" placeholder="Enter your username.." size="30" rows="3" > <br> <br>
<div id="d1" style="color: white;"> </div>
<h3  style="color: white;"> Enter your Date of Birth * </h3> <input type="date" name="dob"> <br> <br>
<div id="d7" style="color: white;"> </div> <br>
<h3  style="color: white;">Enter your City / Town of Birth *</h3> <input type="text" name="ques" placeholder="Enter your birth place.." size="30" rows="3" ><br> <br>
<div id="d8" style="color: white;"> </div> <br>
<h3  style="color: white;"> New Password * </h3> <input type="password" name="password" placeholder="Enter your Password.." size="30" rows="3" ><br> 
<h5 id="d2" style="color: white;"> </h5> <h5 id="d3" style="color: white;" > </h5> <h5 id="d4" style="color: white;"> </h5>  <br>
<h3  style="color: white;"> Confirm Password * </h3> <input type="password" name="passwordconf" placeholder="Re-type your Password.." size="30" rows="3" ><br> <br>  <br>
<div id="d6" style="color: white;"> </div> <br>
<input type="submit" name="change" value="Change Password" class="btn btn-primary custom">
<input type="submit" name="back" value="Go back to Login" class="btn btn-primary custom"><br> <br>
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
$con=mysqli_connect("localhost","root","","OFM");
if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['change']))
{
 $username=$_POST['username'];
$password=$_POST['password'];
$type=$_POST['type'];
$dob=$_POST['dob'];
$confpassword=$_POST['passwordconf'];
$ques=$_POST['ques'];
$pwdpattern1="/(?=.*?[A-Z])/";
$pwdpattern2="/(?=.*?[0-9])/";
$count=0;
if($type=="Farmer")
{

$sql_user=mysqli_query($con,"SELECT * FROM iwp_database___farmer_database WHERE Username='$username'");

  if(mysqli_num_rows($sql_user)==1)
  {
     echo '<script> document.getElementById("d1").innerHTML= "Username match"</script>';
     $count++;
  }
  else
  {
    echo '<script> document.getElementById("d1").innerHTML= "Username does not match"</script>';
  }

  $sql_dob=mysqli_query($con,"SELECT * FROM iwp_database___farmer_database WHERE Username='$username' AND Farmer_DOB='$dob'");
  if(mysqli_num_rows($sql_dob)==1)
  {
  	echo '<script> document.getElementById("d7").innerHTML= "DOB match"</script>';
     $count++;
  }
  else
  {
    echo '<script> document.getElementById("d7").innerHTML= "DOB does not match"</script>';
  }
  $sql_q=mysqli_query($con,"SELECT * FROM iwp_database___farmer_database WHERE Username='$username' AND Farmer_Q='$ques'");
  if(mysqli_num_rows($sql_q)==1)
  {
  	echo '<script> document.getElementById("d8").innerHTML= "Answer match"</script>';
     $count++;
  }
  else
  {
    echo '<script> document.getElementById("d8").innerHTML= "Answer does not match"</script>';
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
      echo '<script> document.getElementById("d6").innerHTML= "Password accepted! "</script>';
    $count++;
  }
  else 
     echo '<script> document.getElementById("d6").innerHTML= "Password does not match! "</script>';
  }
if($count==4)
{
 $sql_upd=mysqli_query($con,"UPDATE iwp_database___farmer_database SET Password='$password' WHERE Username='$username'");
 echo '<script> swal("Successful!", "Password Updated!", "success"); </script>';
 header('Location: jsign.php');
}

}
else if($type=="Consumer")
{
	$sql_user=mysqli_query($con,"SELECT * FROM iwp_database___user_database WHERE Username='$username'");

  if(mysqli_num_rows($sql_user)==1)
  {
     echo '<script> document.getElementById("d1").innerHTML= "Username match"</script>';
     $count++;
  }
  else
  {
     echo '<script> document.getElementById("d1").innerHTML= "Username does not match"</script>';
  }

  $sql_dob=mysqli_query($con,"SELECT * FROM iwp_database___user_database WHERE Username='$username' AND User_DOB='$dob'");
  if(mysqli_num_rows($sql_dob)==1)
  {
  	echo '<script> document.getElementById("d7").innerHTML= "DOB match"</script>';
     $count++;
  }
  else
  {
      echo '<script> document.getElementById("d7").innerHTML= "DOB does not match"</script>';
  }

  $sql_q=mysqli_query($con,"SELECT * FROM iwp_database___user_database WHERE Username='$username' AND User_Q='$ques'");
  if(mysqli_num_rows($sql_q)==1)
  {
  	echo '<script> document.getElementById("d8").innerHTML= "Answer match"</script>';
     $count++;
  }
  else
  {
    echo '<script> document.getElementById("d8").innerHTML= "Answer does not match"</script>';
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
      echo '<script> document.getElementById("d6").innerHTML= "Password accepted! "</script>';
    $count++;
  }
  else 
     echo '<script> document.getElementById("d6").innerHTML= "Password does not match! "</script>';
  }

if($count==4)
{
 $sql_upd=mysqli_query($con,"UPDATE iwp_database___farmer_database SET Password='$password' WHERE Username='$username'");
 echo '<script> swal("Successful!", "Password Updated!", "success"); </script>';
 header('Location: jsign.php');
}
}
else if($type=="")
{
  echo '<script> document.getElementById("t").innerHTML= "Are you a farmer or a Customer?"</script>';
}
}

if(isset($_POST['back']))
{
	header('Location: jsign.php');
}

?>
</body>
</html>