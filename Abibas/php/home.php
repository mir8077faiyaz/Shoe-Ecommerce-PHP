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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/main.css">

  <title>Abibas | Home</title>
  <link rel="icon" type="image/x-icon" href="../images/logo.jpg">

  
</head>

<body>
  <?php include('nav.php'); ?>
  <?php
    $sql="SELECT `pid`, `name`, `price`, `size`, `description`, `image` FROM `product`";
    $result=mysqli_query($db_connection,$sql);
    
    if($result){
      

      echo '<div class="container my-2">';
      echo '<div class="row">'; 
      while($row = mysqli_fetch_assoc($result)){
        $pid=$row['pid'];
        $name=$row['name'];
        $price=$row['price'];
        $size=$row['size'];
        
        $sizes = explode(", ", $size);
        $desc=$row['description'];
        $img=$row['image'];

        echo '<div class="col-md-4 my-2">'; 
        echo ' <form onsubmit="return false">';
        echo '<div class="card bg-dark text-white">';
        echo '<img class="card-img-top" src="../images/' . $img . '" alt="Card image cap">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $name . ' | $' . $price . '</h5>';
        echo '<p class="card-text">'.$desc.'</p>';


        
        echo '    <button type="submit" name="submit" class="btn btn-sm btn-primary">Add to Cart</button>';

        echo '<input type="hidden" value='.$pid.' name="pid">';
        echo '<select class="form-select btn btn-sm btn-danger mx-1" aria-label="Default select example" name="size">';
        echo '  <option selected value='.$size[0].'>Size</option>';
        foreach ($sizes as $size) {
        echo '  <option >'.$size.'</option>';
        }
        echo '</select>';
       
       
        echo '</div>'; 
        echo '</div>'; 
        echo '</form>';
        echo '</div>';

      }
      echo '</div>'; 
      echo '</div>'; 
      ;

    } 
  ?>
  <?php include('footer.php'); ?>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>';

    <script>
        $(document).ready(function(){
            $("form").submit(function(e){
                e.preventDefault();
                var formData= new FormData(this);
                $.ajax({
                    url:'cart.php',
                    type: 'POST',
                    data: formData,
                    processData: false,  // Don't process the data
                    contentType: false,  // Don't set content type (browser will set it automatically)
                    success: function(response){
                        console.log(response);
                    },
                    error: function (error) {
                    console.error(error);
                    }
                    
                });


            });

        });
        
    </script>
</body>
</html>