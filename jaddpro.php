<html lang="en" style="background-image: url('bg.jpg');">
<?php
session_start();
$username=$_SESSION['username'];
?>
<head>
  <title>My Market</title>
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
.topnav-left {
  float: left !important;
}
.topnav-right {
  float: right !important;
}

</style>
</head>
<body style="background-image: url('bg.jpg');">
    <?php include_once('jfarmerheader.php'); ?>
<br> <br> <br> <br>  <br> <br> <br>
<center><h2> My Market</h2></center> <br> <br> <br>
 <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal" style=" padding:5px; float: left; margin-left: 220px;">
    <img src="https://img.icons8.com/color/48/000000/add.png"/>Add Produce
  </button> 
<div class="container">
  
<div  class="filter" style="width: 100%;">
<input id="myInput" type="text" placeholder="Search.." size="35" style="float: left; margin: 10px; margin-left: 10px; margin-right: 5px;"> 
<form method="GET" name="FilterForm" id="FilterForm" style="float: right; margin: 10px; margin-right: 60px;">
 <input type="radio" id="filter_1"name="filterStatus" value="Fruit" style="visibility: hidden;" />
<label for="filter_1" style="cursor: pointer;">Fruit <img src="https://img.icons8.com/cotton/50/000000/sweet-banana.png"/></label>
 <input type="radio" id="filter_2" name="filterStatus" value="Vegetable" style="visibility: hidden;"/>
<label for="filter_2" style="cursor: pointer;">Vegetable <img src="https://img.icons8.com/cotton/50/000000/tomato-and-garlic-1.png"/></label>
<input type="radio" id="filter_3" style="visibility: hidden;" name="filterStatus" value="All"/>
<label for="filter_3" style="cursor: pointer;">All <img src="https://img.icons8.com/offices/45/000000/select-all.png"/></label>
</form>
 <button id="myRecent" type="submit" class="btn pc_data btn-success" style="float: left; margin: 10px; margin-right: 10px; padding:5px;" value="<?php echo date('Y-m-d'); ?>"> Today's Produce <img src="https://img.icons8.com/plasticine/40/000000/today.png"/></button>

</div>

<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});



$(document).ready(function(){
  $("#myRecent").on("click", function() {
    var value = $(this).val();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 
</script>

<script>

$("input[name='filterStatus']").change(function () {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
 
  
  </script>
  <br> <br>



<div id="records_contant"></div>

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Your Market</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div class="form-group">
              <form action="backend1.php" method="post" enctype="multipart/form-data">
            <label>Produce Name:</label> <input type="text" id="proname"  class="form-control" required /></div>
            <div class="form-control">
        Produce Type: <input type="radio" id="veg1" name="protype" value="Vegetable" />
        <label for="veg1"> Vegetable </label>
        <input type="radio" id="fruit1" name="protype" value="Fruit"/>
        <label for="fruit1">  Fruit </label>
      </div> <br>
        <div class="form-group">
        <label>Produce Price (per kg) :</label> <input type="text" id="proprice" required min="1" class="form-control"/ required></div>
        <div class="form-group">
        <label>Produce Quantity (in kg)</label> <input type="text" id="proqty" required min="1"  class="form-control" required></div>
         <label>Image Of Produce (.jpg .png .gif formats only)</label><input type="file" name="filetoupload" id="filetoupload" required>

         <input type="submit" value="upload"  name="submit">
       </form>
      </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecords()">Save</button>
        </div>

    </div>
  
  </div>

</div>


 <!-- /////// UPDATE -->
 <div class="modal" id="update_user_model">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Update form</h4>
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
        </div>

        <div class="modal-body">
          <div class="form-group">
              <form action="backend1.php" method="post" enctype="multipart/form-data">
            Produce Name: <input type="text" id="update_proname"  class="form-control" required /> <br>
        <div id="d1"> </div> <br>
            <div class="form-control">
        Produce Type: <input type="radio" id="veg" name="update_protype" value="Vegetable" />
        <label for="veg"> Vegetable </label>
        <input type="radio" id="fruit" name="update_protype" value="Fruit"/>
        <label for="fruit">  Fruit </label>
      </div> <br>
        Produce Price (per kg) : <input type="text" id="update_proprice" required min="1" class="form-control"/> <br>
        <div id="d3"> </div> <br>
        Produce Quantity (in kg) <input type="text" id="update_proqty" required min="1"  class="form-control"> <br>
        <div id="d4"> </div> <br> </div>
<label>Image Of Produce (.jpg .png .gif formats only)<br> <div id="update_fileupload1">Previous file:</div></label><input type="file" name="update_fileupload" id="update_fileupload" required><input type="submit" value="upload"  name="update_submit">
      </div>
      <div id="d4"> </div>
    </form>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="updateclose()">Close</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="updateuserdetail()">Update</button>
          <input type="hidden" name="" id="hidden_user_id"/>
        </div>

      </div>
    </div>
  </div>
</div>


<script type="text/javascript" >

$(document).ready(function(){

  readRecords();
});

  function readRecords()
  {
var readrecord = "readrecord";
$.ajax({
  url: "backend1.php",
  type: "get",
  data: {readrecord: readrecord },
  success: function(data,status){
    $('#records_contant').html(data);
  }

  });
  }

  function addRecords()
  {
    var name =$('#proname').val();
    var type =$("input[name='protype']:checked").val();
    var price =$('#proprice').val();
    var qty=$('#proqty').val();
    var filepath='uploads/'+$('#filetoupload').val().replace(/C:\\fakepath\\/i,'');
    alert(filepath);
    $.ajax({
      url:"backend1.php",
      type:"get",
      contentType: 'multipart/form-data',
      data: {
        proname: name,
        protype: type,
        proprice: price,
        proqty: qty,
        filetoupload: filepath
      },
      success: function(data, status){
        readRecords();
        swal("Added item!", "", "success")

      },
    });
  }

  function DeleteUser(deleteid){
    var conf=confirm(" Are you sure ");
    if(conf==true){
      $.ajax({
        url: "backend1.php",
        type: "get",
        data: {deleteid:deleteid},
        success: function(data,status){
          readRecords();
          swal("Deleted item!", "", "success")
        }

      });
    }
  }
  function GetUserDetails(id){
    $('#hidden_user_id').val(id);
    $.post("backend1.php", {
      id:id
    }, function(data,status){
    var user= JSON.parse(data);
    $('#update_proname').val(user.Produce_Name);
    if(user.Produce_Type=="Vegetable")
    {$('#update_user_model').find(':radio[name=update_protype][value="Vegetable"]').prop('checked',true);}
    if(user.Produce_Type=="Fruit")
    {$('#update_user_model').find(':radio[name=update_protype][value="Fruit"]').prop('checked',true);}
    $('#update_proprice').val(user.Price);
    $('#update_proqty').val(user.Quantity);
    var filename=user.File_Name;
    document.getElementById("update_fileupload1").innerHTML ="Previous file: "+filename.slice(8);
    }
    );
    $('#update_user_model').modal("show");
    }
///get userid for update


 function updateuserdetail()
 {
 var nname=$('#update_proname').val();
var ttype =$("input[name='update_protype']:checked").val();
 var pprice=$('#update_proprice').val();
 var qqty=$('#update_proqty').val();
 var filepaths='uploads/'+$('#update_fileupload').val().replace(/C:\\fakepath\\/i,'');
 var hhidden_user_id=$('#hidden_user_id').val();
 $.post("backend1.php", {
  nname: nname,
  ttype: ttype,
  hhidden_user_id: hhidden_user_id,
  pprice: pprice,
  qqty: qqty,
  filepaths: filepaths
 },
 function (data, status){
  $('#update_user_model').modal("hide");
  readRecords();
  swal("Updated item!", "", "success")
 }

  );
 }

 function updateclose() {
                 var radioButton1 = document.getElementById("veg");
                 var radioButton2 = document.getElementById("fruit");
                 radioButton1.checked = false;
                 radioButton2.checked = false;
                 readRecords();
               }
</script>
<br> <br>
<center><h2> PAST ORDERS </h2></center> <br> <br>
<?php
 $data= '<center> <table class="table v-set" style="width: 60%;"> <tr> <th>  Image </th><th> Costumer Name </th> <th> Item </th> <th> Price </th> <th> Quantity (in kg)</th> </tr> <tbody>';
    $displayquery = mysqli_query($con, "SELECT * FROM orders  WHERE Farmer_Name='$username'");
    if(mysqli_num_rows($displayquery) >0 )
    {
      while($row=mysqli_fetch_array($displayquery))
      {
      $data .='<tr>
      <td> <img src="'.$row['File_Name'].'" width="200" height="200" alt="No Image" id="alt"/> </td>
       <td> '.$row['User_Name'].' </td>
   <td> '.$row['Produce_Name'].' </td>
    <td> Rs. '.$row['Price'].' </td>
    <td> '.$row['Quantity'].' </td>

</tr>';
      }
    }
  $data .='</tbody> </table> </center>';
  echo $data;
  ?>
</body>
</html>
