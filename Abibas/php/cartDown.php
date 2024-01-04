<?php
require_once 'config.php';
// print_r($_POST);

$pid=$_POST['pid'];
$size=$_POST['size'];
$quantity=$_POST['quantity'];
$newqty=$quantity-1;

if($newqty>0){
//Updating
$sql5= "UPDATE `order_item` SET `quantity`='$newqty' WHERE `pid`=$pid and `size`=$size";
$result5=mysqli_query($db_connection,$sql5);
}
else{
    $sql5="DELETE FROM `order_item` WHERE `pid`=$pid and `size`=$size AND `oid` IS NULL";
    $result5=mysqli_query($db_connection,$sql5);
}





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
  echo '<a href="order.php" class="btn-dark btn-lg mx-3">  Confirm order</a>';
  $sql="SELECT SUM(quantity) FROM order_item WHERE uid='$uid' AND `oid` IS NULL";
  $result=mysqli_query($db_connection,$sql);
  $row=mysqli_fetch_assoc($result); 
  $qty=$row['SUM(quantity)'];
  echo '<script>';
  echo "$('#cart-qty').html('$qty')";
  echo '</script>';
?>