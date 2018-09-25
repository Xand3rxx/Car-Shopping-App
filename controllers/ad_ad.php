<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';

if(isset($_POST["email"]))
{
    
    $fullname = mysqli_real_escape_string($vcon, $_POST['fullname']);
    $email = mysqli_real_escape_string($vcon, $_POST['email']);
    $password = mysqli_real_escape_string($vcon, $_POST['password']);  
    $date = date("Y-m-d h:i:sa");
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
   
    $row = mysqli_query($vcon, "INSERT INTO vadmin (admin_name, admin_email, admin_password, admin_created_at) VALUES ('$fullname', '$email', '$hash_pass', '$date')");
    if($row)
    {
        echo "Admin account has been added";
        header("Location:../admin/index.php");
    }
    die(mysqli_error($vcon));
}





?>