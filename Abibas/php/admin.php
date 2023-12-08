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

</head>

<body>
<div class="d-flex justify-content-space-between" style="height:100%;">
    <div class="bg-dark" style="width:10%;">
       
        <button type=submit class="btn btn-light btn-md mx-4 my-3"> Add Product</button>
        <button type=submit class="btn btn-light btn-md mx-4 my-3"> Manage Products</button>
        <form action="logout.php">
        <button type=submit class="btn btn-light btn-md mx-4 my-3"> logout</button>
        </form>
    </div>
    
    <div class="mx-5 mt-3 " > 
        
        <form class="mx-5" method="post" action='admin.php'>
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
                    <input type="checkbox" class="form-check-input" id="check1" name="options[]" value="1" checked>4
                </label>
                <label class="form-check-label mx-2" for="check2">
                    <input type="checkbox" class="form-check-input" id="check2" name="options[]" value="2" checked>5
                </label>
                <label class="form-check-label mx-2" for="check3">
                    <input type="checkbox" class="form-check-input" id="check3" name="options[]" value="3" checked>6
                </label>
                <label class="form-check-label mx-2" for="check4">
                    <input type="checkbox" class="form-check-input" id="check4" name="options[]" value="4" checked>7
                </label>
                <label class="form-check-label mx-2" for="check5">
                    <input type="checkbox" class="form-check-input" id="check5" name="options[]" value="5" checked>8
                </label>
                <label class="form-check-label mx-2" for="check6">
                    <input type="checkbox" class="form-check-input" id="check6" name="options[]" value="6" checked>9
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
        
            <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</div>


<script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
 <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous">
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
if(isset($_POST['submit'])){
    echo "here";
    $name=$_POST['name'];
    $price=$_POST['price'];
    $size=$_POST['options'];
    $size= ' '.join($size);
    echo $size;
    $desc=$_POST['desc'];
    $img=$_POST['img'];

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
    mysqli_close($db_connection);
    
}
?>