<?php
session_start();
$username=$_SESSION['username'];
?>
<?php
$con=mysqli_connect("localhost","root","","OFM");
        if(mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
extract($_GET);

if(isset($_GET['readrecord']))
{
  $data= '<table class="table table-bordered table-striped"> <tr> <th> Produce Image </th><th> Produce Name </th> <th> Type </th> <th> Date </th> <th> Quantity </th> <th> Price </th> <th> Actions </th> </tr> <tbody id="myTable">';
    $displayquery = mysqli_query($con, "SELECT * FROM iwp_database___product_database__1_ WHERE Farmer_Name='$username'");
    if(mysqli_num_rows($displayquery) >0 )
    {
      while($row=mysqli_fetch_array($displayquery))
      {
      $data .='<tr>
      <td> <span style="opacity: 0;"> All </span> <img src="'.$row['File_Name'].'" width="200" height="200" alt="No Image" id="alt"/> </td>
   <td> '.$row['Produce_Name'].' </td>
    <td> '.$row['Produce_Type'].' </td>
    <td> '.$row['Date_Produce'].' </td>
   <td> '.$row['Quantity'].' kg </td>
   <td> Rs. '.$row['Price'].'</td>
    <td> <button class="btn" onclick="GetUserDetails('.strval($row['ID']).')" ><img src="https://img.icons8.com/ios-glyphs/20/000000/edit.png"/> </button> 
     <button class="btn" onclick="DeleteUser('.strval($row['ID']).')" > <img src="https://img.icons8.com/wired/25/000000/delete-forever.png"/></button></td> </tr>';
      }
    }
  $data .='</tbody> </table>';
  echo $data;
}

if(isset($_POST["submit"])) {
  $uploadOk = 1;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo '<script> alert("File is not an image.") </script>';
    $uploadOk = 0;
  }

if ($_FILES["filetoupload"]["size"] > 500000) {
  echo '<script>alert("Sorry, your file is too large.")</script>';
  $uploadOk = 0;

}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   echo ' <script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo '</script> alert("Sorry, your file was not uploaded.") </script>';
} else
  {
    if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
      echo "<a id=\"dp99\" href=\"javascript:history.go(-1)\">GO BACK</a>";
      echo "<script>document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('dp99').click();
  });</script>";
    }
    else
    {
    echo '<script> alert("Sorry, there was an error uploading your file.") </script>';
    }

  }
}


if(isset($_POST["update_submit"])) {
  $uploadOk = 1;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["update_fileupload"]["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["update_fileupload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo '<script> alert("File is not an image.") </script>';
    $uploadOk = 0;
  }

if ($_FILES["update_fileupload"]["size"] > 500000) {
  echo '<script>alert("Sorry, your file is too large.")</script>';
  $uploadOk = 0;

}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {

  echo ' <script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo '</script> alert("Sorry, your file was not uploaded.") </script>';

} else
  {
    if (move_uploaded_file($_FILES["update_fileupload"]["tmp_name"], $target_file)) {

    echo "<a id=\"dp98\" href=\"javascript:history.go(-1)\"></a>";
    echo "<script>document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('dp98').click();
});</script>";
    }
    else
    {
    echo '<script> alert("Sorry, there was an error uploading your file.") </script>';
    }

  }
}

        $getID=mysqli_query($con,"SELECT * FROM iwp_database___product_database__1_ WHERE Farmer_Name='$username'");
          $row1=mysqli_fetch_array($getID);
          $FID=$row1['Farmer_ID'];

        if(isset($_GET['proname']) && isset($_GET['proprice']) && isset($_GET['proqty'] ) )
        {

        $date=date("Y-m-d");
        mysqli_query($con,"INSERT INTO iwp_database___product_database__1_ (Farmer_ID,Farmer_Name,Produce_Name,Quantity,Price,Date_Produce,Produce_Type,Produce_Status,File_Name)VALUES(
         '$FID', '$username', '$proname', '$proqty', '$proprice', '$date','$protype','Active','$filetoupload')");


        }

        if(isset($_GET['deleteid'])){

        $userid=$_GET['deleteid'];
        $delete=mysqli_query($con,"DELETE FROM iwp_database___product_database__1_  where id='$userid'");
      }
      if(isset($_POST['id']) && isset($_POST['id']) !="")
{
  $user_id= $_POST['id'];
  $query="SELECT * FROM iwp_database___product_database__1_ WHERE id='$user_id'";
  if(!$result=mysqli_query($con, $query)){
    exit(mysqli_error());
  }
  $response=array();
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
      $response=$row;
    }
  }
  else
  {
    $response['status']=200;
  $response['message']="Data not found!";
}
echo json_encode($response);
}
else
{
  $response['status']=200;
  $response['message']="Invalid request";
}

if(isset($_POST['hhidden_user_id']))
{
$hhidden_user_id=$_POST['hhidden_user_id'];
$nname=$_POST['nname'];
$ttype=$_POST['ttype'];
$pprice=$_POST['pprice'];
$qqty=$_POST['qqty'];
$filepaths=$_POST['filepaths'];
echo $hhidden_user_id;
$query="UPDATE iwp_database___product_database__1_ SET Produce_Name='$nname', Produce_Type='$ttype', Price='$pprice', Quantity='$qqty', File_Name='$filepaths' WHERE id='$hhidden_user_id'";
mysqli_query($con, $query);


}


?>
