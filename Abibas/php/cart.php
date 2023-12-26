<?php
session_start();
require_once 'config.php';
$response = array();
if (isset($_SESSION['login_id'])) {
    $gid=$_SESSION['login_id'];
    $pid =$_POST['pid'];
    $size=$_POST['size'];
    $response['pid']=$pid;//not needed
    $response['size']=$size;//not needed

    $sql= 'SELECT `id`, `name` FROM `users` WHERE `google_id`='.$gid.'';//extract id from users table gid for user account
    $result=mysqli_query($db_connection,$sql);//queries the db and checks if successful 
    $row=mysqli_fetch_assoc($result); //keep the results row by row in an array called $row
    
    $uid=$row['id'];//extract id and store in UID
    $response['id']=$uid;// respond to home.php as json response (AJAX)
    // Get the current local date and time
    $currentDate = date('Y-m-d'); // Format as 'Year-Month-Day'

    $sql1='SELECT `oid`, `create_date`, `complete`, `uid` FROM `orders` WHERE `uid`='.$uid.'';
    $result1=mysqli_query($db_connection,$sql1);
    $rownum= mysqli_num_rows($result1);
    if ($rownum == 0) {
        $sql2 = "INSERT INTO `orders`(`create_date`, `complete`, `uid`) VALUES ('$currentDate', '0', '$uid')";
        $result2=mysqli_query($db_connection,$sql2);
        $sql3="INSERT INTO `order_item`(`uid`, `pid`, `quantity`, `size`, `add_date`) VALUES ('$uid','$pid','1','$size','$currentDate')";
        $result3=mysqli_query($db_connection,$sql3);

    }
    else{
        while($row = mysqli_fetch_assoc($result1)){
        if($row['complete']==0){
            //proceed row by row in the order item table.
            $sql4= "SELECT * FROM `order_item`";
            $result4=mysqli_query($db_connection,$sql4);
            while($row2 = mysqli_fetch_assoc($result4)){
                $qty=$row2['quantity'];
                $qty=(int)$qty;
                $response['qty'] = $qty;
                $response['oid'] = $row2['oid'];


                $counter=0;
            //check if oid== null and row[pid]=$_POST['pid'] (can be written as $pid) and $row[size]=$_post[size] if true then update quantity or else
                if(is_null($row2['oid']) && $row2['pid']==$_POST['pid'] && $row2['size']==$_POST['size'])
                {
                    $counter=1;
                    $qty=$qty+1;
                    $sql5= "UPDATE `order_item` SET `quantity`='$qty' WHERE `pid`=$pid and `size`=$size";
                    $result5=mysqli_query($db_connection,$sql5);
                }
            }
            //else add new product in order item and set oid==NULL

            if($counter==0){
                $sql3="INSERT INTO `order_item`(`uid`, `pid`, `quantity`, `size`, `add_date`) VALUES ('$uid','$pid','1','$size','$currentDate')";
                $result3=mysqli_query($db_connection,$sql3);
            }
        }

        }

    }
    echo json_encode($response);
}

else {
    $response['status'] = 'error';
    echo json_encode($response);
    exit();
}


//$pid is $_POST['pid'] and this comes from a php form
//$row['pid'] is when i get row by row pid from database
//`pid` when related to db, name of a column

?>

