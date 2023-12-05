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

  <div class="container my-2">
  <div class="row">
    <div class="col-md-4 my-2">
      <div class="card bg-dark text-white">
        <img class="card-img-top" src="../images/abibas_1.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Abibas Walking Shoes | $200</h5>
          <p class="card-text">Walk till you die</p>
          <button class="btn btn-light btn-sm"> Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="col-md-4 my-2">
      <div class="card bg-dark text-white">
        <img class="card-img-top" src="../images/abibas_2.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Abibas Galaxy Shoes | $150</h5>
          <p class="card-text">For comfort</p>
          <button class="btn btn-light btn-sm"> Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="col-md-4 my-2">
      <div class="card bg-dark text-white">
        <img class="card-img-top" src="../images/abibas_3.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Abibas Series 4 | $250</h5>
          <p class="card-text">Limited Availability.</p>
          <button class="btn btn-light btn-sm"> Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="col-md-4 my-2">
      <div class="card bg-dark text-white">
        <img class="card-img-top" src="../images/abibas_1.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <button class="btn btn-light btn-sm"> Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="col-md-4 my-2">
      <div class="card bg-dark text-white">
        <img class="card-img-top" src="../images/abibas_1.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <button class="btn btn-light btn-sm"> Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="col-md-4 my-2">
      <div class="card bg-dark text-white">
        <img class="card-img-top" src="../images/abibas_1.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <button class="btn btn-light btn-sm"> Add to Cart</button>
        </div>
      </div>
      
    </div>
  </div>
</div>



  <?php include('footer.php'); ?>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
</body>

</html>