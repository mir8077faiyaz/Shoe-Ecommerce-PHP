<?php
require_once 'config.php';
if(!isset($_SESSION['login_id'])){
    echo '<script>alert("No entry!")</script>';
    echo "<script>window.location.href = 'home.php';</script>";
    exit();
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">

    <title>Abibas | Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.jpg">
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    // Query Code
    $(document).ready(function () {
        $('#myForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize form data
        var formData = new FormData(this);
        // formData.forEach(function(value, key){
        // console.log(key, value);

        // Perform Ajax request
        $.ajax({
            url: 'addProducts.php', // Replace with your backend endpoint
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            // data: $(this).serialize(),
            success: function (response) {
                // Handle the success response
                // console.log(response);
                $('#load').html(response);
                $('#myForm')[0].reset();
                $(":checkbox").prop('checked', false).parent().removeClass('active');
            },
            error: function (error) {
                // Handle the error response
                console.error(error);
            }
        });
    });
        var nextCount = 0;
        $("#next").click(function () {
            nextCount = nextCount + 5;
            $("#load").load("loadProducts.php", {
                nextNewCount: nextCount
            });
        });
        $("#prev").click(function () {
            // console.log("Here1");
            nextCount = nextCount - 5;
            if(nextCount>=0){

                $("#load").load("loadProducts.php", {
                nextNewCount: nextCount
            });
            }else{
                nextCount=0;
                $("#load").load("loadProducts.php", {
                nextNewCount: 0
            });
            }
        });
    });
    function del(pid){
        var nextCount = 0;
            // console.log(pid);
            // console.log(nextCount);
            $.ajax({
                        method: 'POST',
                        url: 'delete.php',
                        data: {
                            PID:pid,
                            nextNewCount: nextCount
                        },
                        success: function(response) {
                            $('#load').html(response);
                        }
                    });
        }
    function update(pid){
    var nextCount = 0;
        // console.log(pid);
        // console.log(nextCount);
        $.ajax({
                    method: 'POST',
                    url: 'update.php',
                    data: {
                    PID:pid,
                    nextNewCount: nextCount
                },
                    success: function(response) {
                        console.log(response);
                    $('#formdiv').html(response);   
             }
        });
        }
</script>

</head>
<body>
    <div class="d-flex justify-content-space-between" style="height:100%;">
        <div class="bg-dark" style="width:10%;">
            <form method='post' action="logout.php">
                <button type="submit" class="btn btn-light btn-md mx-4 my-3"> logout</button>
            </form>
        </div>

        <div id="formdiv" class="mx-5 mt-3" style="width:30%;">

            <form class="mx-5" id="myForm" >
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" placeholder="Price" name="price">
                </div>
                <p>Select Size:</p>

                <div class="form-check-inline">
                    <label class="form-check-label mr-2" for="check1">
                        <input type="checkbox" class="form-check-input" id="check1" name="options[]" value="4" checked>4
                    </label>
                    <label class="form-check-label mx-2" for="check2">
                        <input type="checkbox" class="form-check-input" id="check2" name="options[]" value="5" checked>5
                    </label>
                    <label class="form-check-label mx-2" for="check3">
                        <input type="checkbox" class="form-check-input" id="check3" name="options[]" value="6" checked>6
                    </label>
                    <label class="form-check-label mx-2" for="check4">
                        <input type="checkbox" class="form-check-input" id="check4" name="options[]" value="7" checked>7
                    </label>
                    <label class="form-check-label mx-2" for="check5">
                        <input type="checkbox" class="form-check-input" id="check5" name="options[]" value="8" checked>8
                    </label>
                    <label class="form-check-label mx-2" for="check6">
                        <input type="checkbox" class="form-check-input" id="check6" name="options[]" value="9" checked>9
                    </label>
                </div>

                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" id="desc" rows="3" name="desc" placeholder="Description"></textarea>
                </div>

                <div class="form-group">
                    <label for="img">Image</label>
                    <input type="file" class=" form-control btn-sm pb-3" id="img" placeholder="Image" name="img">
                </div>
                <button type="submit" name="submit" id="submitBtn" class="btn btn-primary">Add Product</button>
            </form>
        </div>
        
        <div class="mx-5 mt-3" style="width:60%;">
        <div id="load">
        <?php
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
    </div>
    <button class="btn btn-dark" id="prev">Previous</button>
    <button class="btn btn-dark" id="next">Next</button>
    </div>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <script>
        $(":checkbox").prop('checked', false).parent().removeClass('active');
    </script>
</body>

</html>



<?php 
include('footer.php'); 
?>
<?php
// if(isset($_POST['submit'])){
//     $name=$_POST['name'];
//     $price=$_POST['price'];
//     $size=$_POST['options'];
//     $size = implode(", ", $_POST['options']);
//     $desc=$_POST['desc'];
//     $img=$_POST['img'];
//     if(!empty($name) && !empty($price) && !empty($size) && !empty($desc) && !empty($img)){
//     $sql = "INSERT INTO `product` (`name`, `price`, `size`, `description`, `image`) VALUES (?, ?, ?, ?, ?)";
//     $stmt = mysqli_stmt_init($db_connection);
    
//     $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    
//     if ($prepareStmt) {
//         mysqli_stmt_bind_param($stmt, "sssss", $name, $price, $size, $desc, $img);
//         mysqli_stmt_execute($stmt);
//     } else {
//         die("Something went wrong");
//     }
    
//     mysqli_stmt_close($stmt);
//     mysqli_close($db_connection);
// }
// }
// ?>