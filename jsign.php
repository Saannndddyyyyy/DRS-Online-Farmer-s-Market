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
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
   
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
.input-icons i { 
            position: absolute; 
        } 
          
        .input-icons { 
            width: 100%; 
            margin-bottom: 10px; 
        } 
          
        .icon { 
            padding: 10px; 
            min-width: 40px; 
            background: white;
        } 
          
        .input-field { 
            width: 100%; 
            padding: 10px; 
            text-align: center; 
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
              <form action="jsign.php" method="POST" name="f1">
                <center>
                  <div class="transbox" >
              <h2 style="color: white;"> Online Farmer's Market </h2> <br>  <h4 style="color: white;"> <I> We connect Farmers and Consumers </I></h4> <br> <br>
               <div style="max-width:400px;margin:auto"> 
        <div class="input-icons"> 
<h3  style="color: white;"> Username </h3>  <i class="fa fa-user icon"></i> <input type="text" name="username" class="input-field" placeholder="Enter your username.." >   <br> <br> 
<h3  style="color: white;"> Password </h3>  <i class="fa fa-key icon"></i><input type="password" name="password" placeholder="Enter your Password.." class="input-field"><br> <br> <br>
<input type="radio" id="Farmer" name="type" value="Farmer"/>
<label for="Farmer"> <span style="color: white"> Farmer </span></label>
<input type="radio" id="Consumer" name="type" value="Consumer"/>
<label for="Consumer"> <span style="color: white"> Consumer </span></label> <br> <br>
<div id="d1" style="color: white;"> </div> <br> 
<input type="submit" name="submit" value="Log in"class="btn btn-primary custom" >
<input type="reset" name="Reset" class="btn btn-primary custom"> 
<input type="submit" name="reg" value="Sign up!" class="btn btn-primary custom"> <br> <br> <br>
<input type="submit" name="pass" value="Forgot Password?" class="btn btn-primary custom1"><br> <br>
 <div style="color: white";>
<input type="checkbox" checked="checked" name="remember"> Remember me
      </label> </div> </div></div> <br> <br>
</div>
</center>
</form>
<script>

  </script>
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
  $type=$_POST['type'];
if(empty($_POST['password']) && empty($_POST['username']))
{
echo '<script> document.getElementById("d1").innerHTML= "Enter your Username and Password" </script>';
echo '<script> document.f1.username.focus(); </script>';
}
else if(empty($_POST['username']))
{
echo '<script> document.getElementById("d1").innerHTML= "Enter your Username!"</script>';
echo '<script> document.f1.username.focus(); </script>';
}
else if(empty($_POST['password']))
{
echo '<script> document.getElementById("d1").innerHTML= "Enter a valid password!" </script>';
echo '<script> document.f1.password.focus(); </script>';
}
else {
$username=$_POST['username'];
$_SESSION['username']=$username;
$password=$_POST['password'];
if($type=="Farmer")
{
$sql_user=mysqli_query($con,"SELECT * FROM iwp_database___farmer_database WHERE Username='$username'");
$sql_pass=mysqli_query($con,"SELECT * FROM iwp_database___farmer_database WHERE Password='$password' AND Username='$username'");

if(mysqli_num_rows($sql_user)==0)
{
echo '<script> document.getElementById("d1").innerHTML= "Username does not exist!"</script>';
echo '<script> document.f1.username.focus(); </script>';
}
else if(mysqli_num_rows($sql_pass)==0)
{
  echo '<script> document.f1.password.focus(); </script>';
echo '<script> document.getElementById("d1").innerHTML= "Password is incorrect!"</script>';
}
else
{
  header('Location: jfarmerhome.php');

}

}
else if($type=="Consumer")
{
  $sql_user=mysqli_query($con,"SELECT * FROM iwp_database___user_database WHERE Username='$username'");
$sql_pass=mysqli_query($con,"SELECT * FROM iwp_database___user_database WHERE Password='$password' AND Username='$username'");

if(mysqli_num_rows($sql_user)==0)
echo '<script> document.getElementById("d1").innerHTML= "Username does not exist!"</script>';
else if(mysqli_num_rows($sql_pass)==0)
echo '<script> document.getElementById("d1").innerHTML= "Password is incorrect!"</script>';
else
{
header('Location: jhome.php');
}
}
else if($type=="")
{
  echo '<script> document.getElementById("d1").innerHTML= "Are you a farmer or a costumer?"</script>';
}
}
}
if(isset($_POST['reg']))
{
 header('Location: jreg.php');
}
if(isset($_POST['pass']))
{
 header('Location: jforgetpass.php');
}


?>
</body>
</html>
