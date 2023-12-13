<?php
        require 'config.php';
        session_start();
        $name=$_POST['name'];
        $price=$_POST['price'];
        $size=$_POST['options'];
        echo gettype($_POST['options']);
        $size = implode(", ", $_POST['options']);
        $desc=$_POST['desc'];
        // $img=$_POST['img'];
        $img=$_FILES['img']['name'];
        // print_r($_POST);
        // echo $img;
        if(!isset($_POST['PID'])){
            if(!empty($name) && !empty($price) && !empty($size) && !empty($desc) && !empty($img)){
                $sql = "INSERT INTO `product` (`name`, `price`, `size`, `description`, `image`) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($db_connection);
                
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sssss", $name, $price, $size, $desc, $img);
                    mysqli_stmt_execute($stmt);
                } else {
                    die("Something went wrong");
                }
                
                mysqli_stmt_close($stmt);
            }
        }
        else{
            $pid=$_POST['PID'];
            if(!empty($name) && !empty($price) && !empty($size) && !empty($desc) && !empty($img)){
              $sql= " UPDATE `product` SET `name`='$name',`price`='$price',`size`='$size',`description`='$desc',`image`='$img' WHERE `pid`=$pid";
              
                $result=mysqli_query($db_connection,$sql);
            }        
        }
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
        
        $sql = "SELECT `pid`, `name`, `price`, `size`, `description`, `image` FROM `product` ORDER BY `pid` DESC LIMIT 5 OFFSET 0";
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

            echo '    <td><a id="update" href="javascript:void(0)" class="btn btn-info btn-sm" onclick="update('.$pid.')">Update</a></td>';
            echo '    <td><a id="delete" href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="del('.$pid.')">Delete</a></td>';
            
            echo '</tr>';
        }
        } 
    
        echo '            </tbody>';
        echo '        </table>';

        
 ?>
