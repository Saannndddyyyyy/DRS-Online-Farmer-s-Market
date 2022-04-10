<!DOCTYPE HTML>
<html style="background-image: url('bg.jpg');">
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

require_once 'jconfig.php';
$user_function = new Config;
$field_name['Produce_Status'] = 'Active';
$product = $user_function->select_with_order("iwp_database___product_database__1_", $field_name, "ID");

?>

<style>
  table th:nth-child(3), td:nth-child(3) {
  display: none;
}

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
.flex-box-set{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: row;
}

    .box-card-set{
    width: 300px;
    height: auto;
    margin: 10px;
}
.box-image-set{
    width: 50%;
    height: 50%;
    margin: 10px auto;
    overflow: hidden;
}
.box-image-set-2{
    width: 100px;
    height: 200px;
}
.v-set{
    vertical-align: middle !important;
    text-align: center;
}
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}
</style>
<head>
   <title>Drs Catalog</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body style="background-image: url('bg.jpg');">
    <div id="header123">
        <?php include_once('jheader.php'); ?>
    </div> <br> <br>
<?php 
$veg=0;
$fru=0;
foreach($product as $product_data)
{ 
                if(strcmp($product_data['Produce_Type'],"Vegetable")==0) 
                    $veg++;
                else
                    $fru++;
            }
?>
    <h2 style="color: #b30000; font: normal 179% 'century gothic', arial, sans-serif;"> <center> Catalog </center></h2> <br>
<div  class="filter" style="width: 100%;">
<input id="myInput" type="text" placeholder="Search.." size="35" style="float: left; margin: 20px; margin-left: 115px;"> 
<form method="GET" name="FilterForm" id="FilterForm" style="float: right; margin: 10px; margin-right: 200px;">
 <input type="radio" id="filter_1"name="filterStatus" value="Fruit" style="visibility: hidden;" />
<label for="filter_1" style="cursor: pointer;">Fruit <img src="https://img.icons8.com/cotton/50/000000/sweet-banana.png"/> <?php echo "(" .$fru. ")"; ?></label>
 <input type="radio" id="filter_2" name="filterStatus" value="Vegetable" style="visibility: hidden;"/>
<label for="filter_2" style="cursor: pointer;">Vegetable <img src="https://img.icons8.com/cotton/50/000000/tomato-and-garlic-1.png"/> <?php echo "(" .$veg. ")"; ?></label>
<input type="radio" id="filter_3" style="visibility: hidden;" name="filterStatus" value="All"/>
<label for="filter_3" style="cursor: pointer;">All <img src="https://img.icons8.com/offices/45/000000/select-all.png"/> <?php echo "(" .($fru + $veg). ")"; ?></label>
</form>
 <button id="myRecent" type="submit" class="btn pc_data btn-success" style="float: left; margin: 10px; margin-right: 30px; padding:5px;" value="<?php echo date("Y-m-d"); ?>"> Today's Produce <img src="https://img.icons8.com/plasticine/40/000000/today.png"/> </button>
  <input id="myDate" type="date" style="float: left; margin: 10px; margin-right: 10px; padding:5px;" value="<?php echo date("Y-m-d"); ?>"> </input> <br> <br> <br>
</div>


<script>

$(document).ready(function() {
  $("#myRecent").on("click", function() {
    var value = $(this).val().toLowerCase();
    $("#MyCard .card").filter(function() {
      $(this).toggle($(this).find('I').text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function() {
  $("#myDate").on("change", function() {
    var value = $(this).val().toLowerCase();
    $("#MyCard .card").filter(function() {
      $(this).toggle($(this).find('I').text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function() {
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#MyCard .card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$("input[name='filterStatus']").change(function () {
    var value = $(this).val().toLowerCase();
    $("#MyCard .card").filter(function() {
      $(this).toggle($(this).find('I').text().toLowerCase().indexOf(value) > -1)
    });
  });



</script>
<br>
<div class="pagination">
<?php 
if (!isset($_GET["page"])) 
  { $page=1; 
} 
else { $page  = $_GET["page"];
} 
$start_from = ($page-1) * 8;
$total_pages = ceil(Count($product) / 8);
echo "<div style='margin-left:130px;'>";
     for ($i=1; $i<=$total_pages; $i++) {

     echo " <a href='jmenu.php?page=".$i."'";
  
            if ($i==$page)  echo " class='curPage'";
            echo "style='background-color: #f7f0c8; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); text-decoration: none;'> ".$i." </a>";}

            echo "</div> <br> <br> <br>";

     ?>
</div>
    <div class="container-fluid" id="MyCard">
        <div class="row flex-box-set">
            <?php foreach(array_slice($product, $start_from, 20) as $product_data){ ?>
                <div class="card text-center box-card-set" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="card-body" style="background-color:#CECCCB">
                        <h5 class="card-title"><?php if(strlen($product_data['Produce_Name']) > 50){ echo substr($product_data['Price'],0,50).'....'; }else{ echo $product_data['Produce_Name']; } ?></h5>
                        <a href='<?php echo $product_data['File_Name']; ?>' download > <img src='<?php echo $product_data['File_Name']; ?>' class="card-img-top embed-responsive-item" style="width: 200px; height: 200px;" > </a> <br> <br>

                        <I style="size: 5px"> <?php echo $product_data['Produce_Type']; ?> </I> <br>
                        <I style="size: 5px"> <img src="https://img.icons8.com/fluent-systems-regular/16/000000/clock.png"/> <?php echo $product_data['Date_Produce']; ?> </I> <br>
                        <I style="opacity: 0;"> All </I> 
                        <I style="size: 5px"> Farmer: <?php echo $product_data['Farmer_Name']; ?> </I>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row" >
                                <div class="col-6">Price : </div>
                                <div class="col-6"><?php echo 
                                "Rs. "; echo $product_data['Price']; ?></div>
                            </div>
                        </li>
                             <li class="list-group-item">
                            <div class="row" >
                                <div class="col-6">Available : </div>
                                <div class="col-6"><?php echo $product_data['Quantity']; echo 
                                " kg ";?></div>
                            </div>
                        </li>
                        <form method="post" class="submitpro">
                        <li class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label for="staticEmail" class="col-6 col-form-label">Quantity (in kg): </label>
                                    <div class="col-6">
                                        <input type="number" class="form-control pro-qty" min="1" max="100" value="1" required>
                                    </div>
                                </div>

                        </li>
                        <li class="list-group-item">
        
                                <button type="submit" class="btn pc_data btn-outline-success" data-dataid="<?php echo $product_data['ID']; ?>"><img src="https://img.icons8.com/color/20/000000/add.png">Add To Cart</button>

                        </li>
                        </form>
                    </ul> 
                     </div>
            
      <?php } ?>
</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function (){
            $('.submitpro').on('submit', function(e){
                e.preventDefault();
                var product_num = $(this).find('.pc_data').data('dataid');
                var product_qty = $(this).find('.pro-qty').val();
                if(product_num == '' || product_qty == ''){
                    alert("Data Key Not Found");
                    console.log("Data Key Not Found");
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: "cart-process.php",
                        data: { 'product_num' : product_num, 'product_qty' : product_qty },
                        success: function (response) {
                            var get_val = JSON.parse(response);
                            if(get_val.status == 100){
                                alert(get_val.msg);
                                console.log(get_val.msg);
                                location.reload();
                            }
                            else if(get_val.status == 103){
                                alert(get_val.msg);
                                console.log(get_val.msg);
                            }
                            else{
                                console.log(get_val.msg);
                            }
                        }
                    });
                }
            });
        });

    </script>

</body>

</html>
