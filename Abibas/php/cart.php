<?php
require_once 'config.php';
if(isset($_SESSION['login_id'])){
print_r($_POST);

}
else{
    echo '<script>alert("Must be logged in!")</script>';
    exit();
}

?>