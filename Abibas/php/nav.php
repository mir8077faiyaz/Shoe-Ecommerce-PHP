<?php
require 'config.php';
require 'google-api/vendor/autoload.php';


// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('606546228194-plph8rauaa6g3261t1fm6n03ipun61s4.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/Shoe-Ecommerce-PHP/Abibas/PHP/nav.php');
$client->setApprovalPrompt('force');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){
     // echo "<script>console.log('here1')</script>";
        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
        if(mysqli_num_rows($get_user) > 0){
            $_SESSION['login_id'] = $id; 
           
            if($id=='105918507886338760521'){
                echo '<script>';
                echo 'console.log("wow");';
                echo '</script>';
                header('Location: admin.php');
                exit;
            }
            else{
                header('Location: home.php');
                exit;
        }
        }

        else{
            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `users`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");

            if($insert){

                $_SESSION['login_id'] = $id; 
                header('Location: home.php');
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }

        }

    }
    else{
        header('Location: login.php');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
?>
<?php
if(isset($_SESSION['login_id'])){
    $gid=$_SESSION['login_id'];
    $sql= 'SELECT `id`, `name` FROM `users` WHERE `google_id`='.$gid.'';//extract id from users table gid for user account
    $result=mysqli_query($db_connection,$sql);//queries the db and checks if successful 
    $row=mysqli_fetch_assoc($result); //keep the results row by row in an array called $row
    
    $uid=$row['id'];//extract id and store in UID

    $sql="SELECT SUM(quantity) FROM order_item WHERE uid='$uid'";
    $result=mysqli_query($db_connection,$sql);
    $row=mysqli_fetch_assoc($result); 
    $qty=$row['SUM(quantity)'];

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
  echo '                <a class="navbar-brand mx-0" href="cartDetails.php">';
  echo '                    <img src="../images/cart.png" alt="..." height="30">';
  echo '                   <span class="cart" id="cart-qty" style="min-width: 22px;min-height: 22px; text-align: center; position: absolute;width:20px;z-index: 2; background-color:red; border-radius:80%; font-size:12px;margin-left:-15px; margin-top:-5px;">'.$qty.'</span>';
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
  echo '<a class="nav-link" href="' . $client->createAuthUrl() . '">Login</a>';
  echo '            </li>';
  echo '        </ul>';
  echo '    </div>';
  echo '</nav>';
}
endif; 
?>