<?php
session_start();
$username=$_SESSION['username'];
require_once 'jconfig.php';
$user_function = new Config;
$counter = 1;
$total = array();
$con=mysqli_connect("localhost","root","","OFM");
if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
<!DOCTYPE html>
<html>
<style>
table
{ margin: 10px 0 30px 0;}

table tr th, table tr td
{ background: #3B3B3B;
  color: #FFF;
  padding: 7px 4px;
  text-align: left;}

table tr td
{ background: #E5E5DB;
  color: #47433F;
  border-top: 1px solid #FFF;}
  </style>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>My Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>

<body style="background-image: url('bg.jpg');">

    <?php include_once('jheader.php'); ?>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-header" style="background-color:#f1eee6">
                           <b> My Cart Detail </b>
                           <button id="RemoveAllProducts"  style="float: right; padding: 10px;" class=" btn btn-outline-danger "> <img src="https://img.icons8.com/office/16/000000/delete-sign.png"/>Clear Cart</button>

                        </div>
                        <div class="card-body" style="background-color:#f1eee6">
                            <div class="table-responsive-lg">
                                <table class="table v-set">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Item</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($cart_data){ foreach($cart_data as $cart_key => $cart_value){
                                            $qty = $_SESSION['product_qty_cart'][$cart_key];
                                            $field_val['ID'] = $cart_value;
                                            $get_cart = $user_function->select_where_cart("iwp_database___product_database__1_", $field_val);
                                            $subtotal = $qty * $get_cart['Price'];
                                            $total[] = $subtotal;
                                            $tt=@array_sum($total);
                                            $_SESSION['tt']=$tt;
                                           $_SESSION['cart_data']= $cart_data;
                                    
                                        ?>
                                        <tr>
                                            <td scope="row"><?php echo $counter; $counter++; ?></td>
                                           <td>  <img src='<?php echo $get_cart['File_Name']; ?>' width="150" height="150" > </td>
                                            <td><?php echo $get_cart['Produce_Name']; ?></td>
                                            <td><?php echo $qty; ?> kg</td>
                                            <td> Rs. <?php echo $get_cart['Price']; ?></td>
                                            <td> Rs. <?php echo $subtotal; ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger rm-val" data-dataval="<?php echo $cart_key; ?>">
                                                    <span><i class="far fa-trash-alt"></i></span>
                                                    <span>Remove</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php }}else{ echo "<tr><td colspan='7'><h4 class='text-center' >Cart is Empty</h4></td></tr>";

                                        } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" style="text-align:right;background-color:#CECCCB;"><b> Total Amount: Rs <?php echo @array_sum($total); ?> </b> </td>
                                            <div id="no"> </div>
                                            <form method="POST">
                                           <td colspan="3" style="text-align:center;background-color:#CECCCB;"><b><input type="submit" class="btn btn-success" data-dismiss="modal" name="proceed" value="Proceed To Pay"> </b></td>

                                        </form>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['proceed']))
    {
        if($cart_data)
        echo '<script> window.location="billingsselect.php"</script>';
    else
        echo '<script> document.getElementById("no").innerHTML="No items to purchase!"</script> <br>';
        
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">

    $(document).ready(function(){

      $("#RemoveAllProducts").click(function(){
        $( ".rm-val" ).trigger( "click" );
      });

      
        $(document).on('click', 'button.rm-val', function(){
            var rm_val = $(this).data('dataval');
            if(rm_val == ''){
                alert('Data Value Not Found');
            }
            else{
                $.ajax({
                    type: "POST",
                    url: "cart-process.php",
                    data: { 'rm_val' : rm_val },
                    success: function (response) {
                        var get_val = JSON.parse(response);
                        if(get_val.status == 102){
                            console.log(get_val.msg);
                            location.reload();
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
<br> <br> <br>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-header" style="background-color:#f1eee6">
<h2> <center> PAST ORDERS </center> </h2>
<div class="card-body" style="background-color:#f1eee6">
<div class="table-responsive-lg">

<?php
 $data= ' <table class="table v-set"> <tr> <th>  Image </th><th> Farmer Name </th> <th> Item </th> <th> Price </th> <th> Quantity </th> </tr> <tbody id="myTable">';
    $displayquery = mysqli_query($con, "SELECT * FROM orders  WHERE User_Name='$username'");
    if(mysqli_num_rows($displayquery) >0 )
    {
      while($row=mysqli_fetch_array($displayquery))
      {
      $data .='<tr>
      <td> <img src="'.$row['File_Name'].'" width="200" height="200" alt="No Image" id="alt"/> </td>
       <td> '.$row['Farmer_Name'].' </td>
   <td> '.$row['Produce_Name'].' </td>
    <td> Rs. '.$row['Price'].' </td>
    <td> '.$row['Quantity'].' </td>

</tr>';
      }
    }
  $data .='</tbody> </table>';
  echo $data;
  ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>

</html>