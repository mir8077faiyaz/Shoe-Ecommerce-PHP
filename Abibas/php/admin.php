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
        $('#formdiv').load("addForm.php");

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
