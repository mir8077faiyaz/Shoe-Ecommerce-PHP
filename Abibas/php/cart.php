<?php
session_start();
require_once 'config.php';
$response = array();
if (isset($_SESSION['login_id'])) {
    $response['pid']=$_POST['pid'];
    $response['size']=$_POST['size'];
    echo json_encode($response);
} else {
    $response['status'] = 'error';
    echo json_encode($response);
    exit();
}
?>