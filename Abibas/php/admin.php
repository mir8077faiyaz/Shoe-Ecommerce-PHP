<?php
require_once 'config.php';
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
    <div style="width:10%;background-color:pink;">
       
        <button type=submit class="btn btn-light btn-md mx-4 my-3"> Add Product</button>
        <button type=submit class="btn btn-light btn-md mx-4 my-3"> Manage Products</button>
        <form action="logout.php">
        <button type=submit class="btn btn-light btn-md mx-4 my-3"> logout</button>
        </form>
    </div>
    
    <div class="mx-5 mt-3 " > 
        
        <form class="mx-5">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" placeholder="Price" name="price">
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <input type="text" class="form-control" id="desc" placeholder="Description" name="desc">
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control btn-sm btn-danger pb-3" id="img" placeholder="Image" name="img">
            </div>
        
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>

 <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous">
</script>
</body>
</html>
