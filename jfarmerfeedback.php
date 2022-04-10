<!DOCTYPE html>
    <html>
    <?php
    session_start();
$username=$_SESSION['username'];
?>
    <head>
        <title>DRS Feedback</title>

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
    <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="jstyle.css" />
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    </head>
    <body>
            <?php include_once('jfarmerheader.php'); ?>
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
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M121.38542,7.61458l-93.61458,93.61458l-20.07227,63.07226l63.07227,-20.07226l93.61458,-93.61458c0,0 -0.71667,-15.05717 -14.33333,-28.66667c-13.61667,-13.61667 -28.66667,-14.33333 -28.66667,-14.33333zM124.07292,19.26042c7.68267,1.462 13.7993,4.71645 18.51855,9.56022c4.71925,4.84377 8.04111,11.27686 10.14811,19.10645l-12.98958,12.98958l-28.66667,-28.66667l10.30208,-10.30208zM35.67936,108.40983c0.08473,0.02134 8.61749,2.17868 17.1748,10.736c9.31667,8.6 10.75,16.48893 10.75,16.48893l0.30794,0.36393l-25.43327,8.18848l-10.722,-10.72201z"></path></g></g></svg><h2 style="color: white;"> Enter Your Feedback </h2>
    <form name="contact-form" method="post" id="contact-form">
    <div class="form-group">
    <label for="Name"><h3  style="color: white;"> Name </h3></label>
    <input type="text" class="input-field" name="name" placeholder="Name" required>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1"><h3  style="color: white;"> Email address </h3></label>
    <input type="email"class="input-field" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
    <label for="Phone"><h3  style="color: white;"> Phone </h3></label>
    <input type="text" class="input-field" name="phone" placeholder="Phone" required>
    </div>
    <div class="form-group">
    <label for="comments"> <h3  style="color: white;"> Comments </h3> </label>
    <textarea name="comments" class="input-field" rows="3" cols="28" rows="5" placeholder="Comments"></textarea> 
    </div>
    <br><br> <br> <div id="d1" style="color: white;"> </div> <br> <br>
    <input type="submit" class="btn btn-primary custom" name="submit" value="Submit" id="submit_form" value="Submit">
    <br> <br>
    <img src="img/loading.gif" id="loading-img">
    </form>
    <div class="response_msg"></div>
    </div>
  
</div>

  <center>
   
  <?php 
$con=mysqli_connect("localhost","root","","OFM");
if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data= '<h2 style="color: white;"> Other feedbacks </h2> <br>';
$sql_comment=mysqli_query($con, "SELECT * FROM iwp_database___contact_form_info");
if(mysqli_num_rows($sql_comment) >0 )
    {
      while($row=mysqli_fetch_array($sql_comment))
      {
        $data.= '<div class="card text-center box-card-set" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 50%; line-height: 60px;">  <div class="card-body" style="background-color:#CECCBB;"> <hr> <hr> <h5 class="card-title"  style="text-align: left; margin-left: 10px; color: black; font-size: 15px; "> '.$row['Name'].' </h5> <div class="col-6" style="text-align: left; margin-left: 10px;"> <hr> 
        '.$row['Comments'].'</div> <hr> </div> </div> <br> <br> <br>  ' ;

      }
    }
    else
    {
      $data= 'No comments to display';
    }
  echo $data;


    if(isset($_POST['submit']))
    {
    $Name =$_POST['name'];
    $Email =$_POST['email'];
    $Phone =$_POST['phone'];
    $Comments = $_POST['comments'];
    $sql=mysqli_query($con,"INSERT INTO iwp_database___contact_form_info (Name, Email, Phone, Comments) VALUES ('$Name','$Email', '$Phone', '$Comments')");
   echo '<script> document.getElementById("d1").innerHTML= " Thank you! We will contact you soon!" </script>';
  }
    ?>  
    </center>
    </div>
    </div>
  </div>
</center>
  </div>

</div>
</div>
</div> </div></div></div>
</div>
</div>
</header>  
    </body>
    </html>