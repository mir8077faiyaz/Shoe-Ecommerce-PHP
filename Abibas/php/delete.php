<?php
require 'config.php';

$deleteID = $_POST['PID'];
$sql2 = "DELETE FROM `product` WHERE pid = $deleteID";
$result = mysqli_query($db_connection, $sql2);
$nextNewCount = $_POST['nextNewCount'];
        echo ' <table class="table" >';
        echo '     <thead class="thead-dark">';
        echo '         <tr>';
        echo '             <th scope="col">Name</th>';
        echo '             <th scope="col">Price</th>';
        echo '             <th scope="col">Size</th>';
        echo '             <th scope="col">Description</th>';
        echo '             <th scope="col">Image</th>';
        echo '             <th scope="col">Update</th>';
        echo '             <th scope="col">Delete</th>';
        echo '         </tr>';
        echo '     </thead>';
        echo '     <tbody>';
        $sql1="SELECT COUNT(*) as totalRows FROM `product`";
        $totalRowsResult = mysqli_query($db_connection,$sql1);
        $totalRows = mysqli_fetch_assoc($totalRowsResult)['totalRows'];
        if ($nextNewCount >= $totalRows) {
            // Set the offset to the last page
            $nextNewCount = max(0, $totalRows - 5);
        }
        $sql = "SELECT `pid`, `name`, `price`, `size`, `description`, `image` FROM `product` ORDER BY `pid` DESC LIMIT 5 OFFSET $nextNewCount";

        $result=mysqli_query($db_connection,$sql);
        
        if($result){
        while($row = mysqli_fetch_assoc($result)){
            $pid=$row['pid'];
            $name=$row['name'];
            $price=$row['price'];
            $size=$row['size'];
            $desc=$row['description'];
            $img=$row['image'];
            echo '<tr class="table-warning">';
            echo '    <th scope="row">'.$name.'</th>';
            echo '    <td>'.$price.'</td>';
            echo '    <td>'.$size.'</td>';
            echo '    <td>'.$desc.'</td>';
            echo '    <td><img class="img-fluid" src="../images/' . $img . '" alt="Card image cap" style="width: 100px;"></td>';

            echo '    <td><a id="update" href="javascript:void(0)" class="btn btn-info btn-sm">Update</a></td>';
            echo '    <td><a id="delete" href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="del('.$pid.')">Delete</a></td>';
            
        }
        } 
    
        echo '            </tbody>';
        echo '        </table>';
?>
