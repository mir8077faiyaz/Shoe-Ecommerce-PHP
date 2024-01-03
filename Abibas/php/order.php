<?php
session_start();
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

$gid=$_SESSION['login_id'];
$sql= 'SELECT `id`, `name` FROM `users` WHERE `google_id`='.$gid.'';//extract id from users table gid for user account
$result=mysqli_query($db_connection,$sql);//queries the db and checks if successful 
$row=mysqli_fetch_assoc($result); //keep the results row by row in an array called $row
$uid=$row['id'];//extract id and store in UID


$sql="SELECT * FROM `orders` WHERE `complete`= 0 AND `uid`='.$uid.'";

$result=mysqli_query($db_connection,$sql);//queries the db and checks if successful 
$row=mysqli_fetch_assoc($result); //keep the results row by row in an array called $row
$oid=$row['oid'];//extract id and store in OID
echo gettype($result);
echo mysqli_num_rows($result);

echo $oid;

$currentDate = date('Y-m-d'); // Format as 'Year-Month-Day'

$sql="UPDATE `orders` SET `complete`=1,`create_date`='.$currentDate.' WHERE `uid`=$uid";
$result=mysqli_query($db_connection,$sql);//queries the db and checks if successful 
echo gettype($result);
//echo mysqli_num_rows($result);


echo "here2";
$sql= "UPDATE `order_item` SET `oid`='$oid' WHERE `uid`=$uid AND `oid` IS NULL";
$result=mysqli_query($db_connection,$sql);//queries the db and checks if successful 


?>

