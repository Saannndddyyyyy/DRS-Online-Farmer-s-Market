<?php
$con=mysqli_connect("localhost","root","","RBS");
        if(mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
extract($_GET);

if(isset($_GET['readrecord']))
{
  $data= '<table class="table table-bordered table-striped" id="TABLE"> <tr> <th> Item Name </th> <th> Price </th><th> Item Type </th> <th> Actions </th> </tr> <tbody id="myTable">';
    $displayquery = mysqli_query($con, "SELECT * FROM restaurant_billing_system___food_items");
    if(mysqli_num_rows($displayquery) >0 )
    {
      while($row=mysqli_fetch_array($displayquery))
      {
      $data .='<tr>
   <td> '.$row['Item_Name'].' </td>
    <td> '.$row['Price'].' </td>
   <td> '.$row['Item_Type'].' </td>
   <td> <button class="btn" onclick="GetUserDetails('.strval($row['Item_ID']).')" ><img src="https://img.icons8.com/ios-glyphs/20/000000/edit.png"/> </button>
     <button class="btn" onclick="DeleteUser('.strval($row['Item_ID']).')" > <img src="https://img.icons8.com/wired/25/000000/delete-forever.png"/></button></td> </tr>';
      }
    }
  $data .='</tbody> </table>';
  echo $data;
}


        if(isset($_GET['name']) && isset($_GET['price']) && isset($_GET['type'] ))
        {

        $date=date("Y-m-d");
        mysqli_query($con,"INSERT INTO restaurant_billing_system___food_items (Item_Name,Price,Item_Type)VALUES(
        '$name', '$price', '$type')");
        }

        if(isset($_GET['deleteid'])){

        $userid=$_GET['deleteid'];
        $delete=mysqli_query($con,"DELETE FROM restaurant_billing_system___food_items where Item_ID='$userid'");
      }
      if(isset($_POST['id']) && isset($_POST['id']) !="")
{
  $user_id= $_POST['id'];
  $query="SELECT * FROM restaurant_billing_system___food_items WHERE Item_ID='$user_id'";
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
echo $hhidden_user_id;
$query="UPDATE restaurant_billing_system___food_items SET Item_Name='$nname', Item_Type='$ttype', Price='$pprice' WHERE Item_ID='$hhidden_user_id'";
mysqli_query($con, $query);


}


?>
