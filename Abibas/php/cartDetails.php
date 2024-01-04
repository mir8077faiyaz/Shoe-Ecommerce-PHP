<?php
require_once 'config.php';

if(isset($_SESSION['login_id'])){
$id = $_SESSION['login_id'];

$get_user = mysqli_query($db_connection, "SELECT * FROM `users` WHERE `google_id`='$id'");

if(mysqli_num_rows($get_user) > 0){
    $user = mysqli_fetch_assoc($get_user);
}

else{
    header('Location: logout.php');
    exit;
}
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">

    <title>Abibas | Cart Details</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.jpg">
</head>
<body>


<?php
    include('nav.php'); 

?>

<h4 style="margin-left:30px">Cart Details</h4>
<div class="container">
  <div class="row ">
    <div class="col-sm " style="font-weight: bold;">
        Image
    </div>
    <div class="col-sm" style="font-weight: bold;">
      Item
    </div>
    <div class="col-sm" style="font-weight: bold;">
      Size
    </div>
    <div class="col-sm" style="font-weight: bold;">
      Price
    </div>
    <div class="col-sm" style="font-weight: bold;">
      Quantity
    </div>
    <div class="col-sm"style="font-weight: bold;">
      Total Price
    </div>

    
    <div class="col-sm"style="font-weight: bold;">

    </div>
    
  </div>
  <hr>
  <?php
  echo '<div id="table_div">';
  $gid=$_SESSION['login_id'];
  $sql= 'SELECT `id`, `name` FROM `users` WHERE `google_id`='.$gid.'';//extract id from users table gid for user account
  $result=mysqli_query($db_connection,$sql);//queries the db and checks if successful 
  $row=mysqli_fetch_assoc($result); //keep the results row by row in an array called $row

  $uid=$row['id'];//extract id and store in UID
    $sql="SELECT order_item.*, product.name,product.price,product.image
    FROM order_item
    JOIN product ON order_item.pid = product.pid
    WHERE `uid` ='$uid' AND `oid` IS NULL";
    $result=mysqli_query($db_connection,$sql);
    $div_count=0;
    

    while($row=mysqli_fetch_assoc($result)){
      $img=$row['image'];
      $item=$row['name'];
      $size=$row['size'];
      $price=$row['price'];
      $quantity=$row['quantity'];
      $total=$quantity*$price;
      $pid=$row['pid'];

      $totalItem += $quantity;//line 111
      $cartTotal += $total;// line 112

      echo '<div class="row ">';
      echo '  <div class="col-sm" style="font-weight: bold;">';
      echo '    <img class="img-fluid" src="../images/' . $img . '" alt="Image">';
      echo '  </div>';
      echo '  <div class="col-sm" style="font-weight: bold;">';
      echo '    '.$item.'';
      echo '  </div>';
      echo '  <div class="col-sm" style="font-weight: bold;">';
      echo '    '.$size.'';
      echo '  </div>';
      echo '  <div class="col-sm" style="font-weight: bold;">';
      echo '    '.$price.'';
      echo '  </div>';
      echo '  <div  class="col-sm" style="font-weight: bold;">';
      echo ' <form onsubmit="return false" class="form-inline">';
      echo '<div id="qty'.$div_count.'">'.$quantity.'</div>';
      echo '<input type="hidden" name="pid" value="'.$pid.'">';
      echo '<input type="hidden" name="size" value="'.$size.'">';
      echo '<input type="hidden" name="quantity" value="'.$quantity.'">';
      echo '<button type="submit" id="up" name="submit1" value="up" style="border: none; background: none; padding: 0; margin: 0; display: inline; cursor: pointer;" onclick="btnup()">
      <img style="margin-left:12px;width:12px" src="../images/qtyUp.png" alt="btnup">
      </button>';

      echo '<button type="submit" id="down" name="submit2" value="down" style="border: none; background: none; padding: 0; margin: 0; display: inline; cursor: pointer;" onclick="btndown()">
      <img style="width:12px" src="../images/qtyDown.png" alt="btndown">
      </button>';

     
      echo ' </form>';


      echo '  </div>';
      echo '  <div class="col-sm"style="font-weight: bold;">';
      echo '    '.$total.'';
      echo '  </div>';

      echo ' <form onsubmit="return false" class="form-inline" style="margin-top:-80px">';
      echo '<input type="hidden" name="pid" value="'.$pid.'">';
      echo '<input type="hidden" name="size" value="'.$size.'">';
      echo '<input type="hidden" name="quantity" value="'.$quantity.'">';

      echo '  <div  class="col-sm" style="font-weight: bold;">';
      echo '<button type="submit" value="delete" name="delete" onclick="btnDelete()"class="btn-danger btn-lg mx-3"> Delete </button>';

      echo '  </div>';

      echo ' </form>';

      echo '</div>';
      echo '  <hr>';
      $div_count=$div_count+1;
    }

    echo '  <div class="col-sm" style="font-weight: bold;">';
    echo ' <h5> Total Items:  '.$totalItem.'<h5>';
    echo '  </div>';

    echo '  <div class="col-sm" style="font-weight: bold;">';
    echo '  <h5>Total Amount: $'.$cartTotal.'<h5>';
    echo '  </div>';
    echo '  <a href="order.php" class="btn-dark btn-lg mx-3"> Confirm order </a>';

    echo '</div>';
  ?>
</div>


    <?php include('footer.php'); ?>
     <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        function btnup(){
          $("form").submit(function(e){
                e.preventDefault();
                var formData= new FormData(this);
                $.ajax({
                    url:'cartUp.php',
                    type: 'POST',
                    data: formData,
                    processData: false,  // Don't process the data
                    contentType: false,  // Don't set content type (browser will set it automatically)
                    success: function(response){
                        console.log(response);
                        $("#table_div").html(response);

                    },
                    error: function (error) {
                    console.error(error);
                    }
                    
                });


            });
            }
      function btndown(){
        $("form").submit(function(e){
                e.preventDefault();
                var formData= new FormData(this);
                $.ajax({
                    url:'cartDown.php',
                    type: 'POST',
                    data: formData,
                    processData: false,  // Don't process the data
                    contentType: false,  // Don't set content type (browser will set it automatically)
                    success: function(response){
                        console.log(response);
                        $("#table_div").html(response);

                    },
                    error: function (error) {
                    console.error(error);
                    }
                    
                });


            });
      }

      function btnDelete(){
        $("form").submit(function(e){
                e.preventDefault();
                var formData= new FormData(this);
                $.ajax({
                    url:'cartDelete.php',
                    type: 'POST',
                    data: formData,
                    processData: false,  // Don't process the data
                    contentType: false,  // Don't set content type (browser will set it automatically)
                    success: function(response){
                        console.log(response);
                        $("#table_div").html(response);

                    },
                    error: function (error) {
                    console.error(error);
                    }
                    
                });


            });
      }

    </script>

</body>
</html>