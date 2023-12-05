<?php
if(isset($_SESSION['login_id'])){
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">';
  echo '    <div>';
  echo '        <a class="navbar-brand ml-3" href="home.php">';
  echo '            <img src="../images/logo.jpg" alt="..." height="60">';
  echo '        </a>';
  echo '        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
  echo '          <span class="navbar-toggler-icon"></span>';
  echo '        </button>';
  echo '    </div>';
  echo '';
  echo '    <div class="collapse navbar-collapse mr-5" id="navbarSupportedContent">';
  echo '        <ul class="navbar-nav ml-auto">';
  echo '            <li class="nav-item mx-2">';
  echo '                <a class="navbar-brand " href="home.php">'; // To be updated to user-Panel
  echo '                    <img src="' . $user['profile_image'] . '"style= "border-radius:60px" alt="..." height="30">';
  echo '                </a>';
  echo '            </li>';
  echo '            <li class="nav-item mx-2">';
  echo '                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>';
  echo '            </li>';
  echo '            <li class="nav-item mx-2">';
  echo '                <a class="nav-link" href="logout.php">Logout</a>';
  echo '            </li>';
  echo '        </ul>';
  echo '        <ul class="navbar-nav">';
  echo '            <li class="nav-item mx-2">';
  echo '                <a class="navbar-brand" href="checkout.php">';
  echo '                    <img src="../images/cart.png" alt="..." height="30">';
  echo '                </a>';
  echo '            </li>';
  echo '        </ul>';
  echo '    </div>';
  echo '</nav>';

}
else{
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">';
  echo '    <div>';
  echo '        <a class="navbar-brand ml-3" href="home.php">';
  echo '            <img src="../images/logo.jpg" alt="..." height="60">';
  echo '        </a>';
  echo '        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
  echo '          <span class="navbar-toggler-icon"></span>';
  echo '        </button>';
  echo '    </div>';
  echo '';
  echo '    <div class="collapse navbar-collapse mr-5" id="navbarSupportedContent">';
  echo '        <ul class="navbar-nav ml-auto">';
  echo '            <li class="nav-item mx-2">';
  echo '                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>';
  echo '            </li>';
  echo '            <li class="nav-item mx-2">';
  echo '                <a class="nav-link" href="login.php">Login</a>';
  echo '            </li>';
  echo '        </ul>';
  echo '        <ul class="navbar-nav">';
  echo '            <li class="nav-item mx-2">';
  echo '                <a class="navbar-brand" href="checkout.php">';
  echo '                    <img src="../images/cart.png" alt="..." height="30">';
  echo '                </a>';
  echo '            </li>';
  echo '        </ul>';
  echo '    </div>';
  echo '</nav>';
}
?>



