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
    
  </div>
  <hr>
  <?php

  $gid=$_SESSION['login_id'];
  $sql= 'SELECT `id`, `name` FROM `users` WHERE `google_id`='.$gid.'';//extract id from users table gid for user account
  $result=mysqli_query($db_connection,$sql);//queries the db and checks if successful 
  $row=mysqli_fetch_assoc($result); //keep the results row by row in an array called $row

  $uid=$row['id'];//extract id and store in UID
    $sql="SELECT * FROM order_item NATURAL JOIN product WHERE `uid` ='$uid'";
    $result=mysqli_query($db_connection,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $img=$row['image'];
      $item=$row['name'];
      $size=$row['size'];
      $price=$row['price'];
      $qauntity=$row['quantity'];
      $total=$qauntity*$price;
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
      echo '  <div class="col-sm" style="font-weight: bold;">';
      echo '    '.$qauntity.'';
      echo '  </div>';
      echo '  <div class="col-sm"style="font-weight: bold;">';
      echo '    '.$total.'';
      echo '  </div>';
      echo '</div>';
      echo '  <hr>';
    }

  ?>
</div>


    <?php include('footer.php'); ?>
     <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>