<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';

if(isset($_POST["email"]))
{
    
    $first = mysqli_real_escape_string($vcon, $_POST['firstname']);
    $last = mysqli_real_escape_string($vcon, $_POST['lastname']);
    $email = mysqli_real_escape_string($vcon, $_POST['email']);
    $password = mysqli_real_escape_string($vcon, $_POST['password']);  
    $date = date("Y-m-d h:i:sa");
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
   
    $row = mysqli_query($vcon, "INSERT INTO vuser (vfirstname, vlastname, vemail, vpass, v_created_at) VALUES ('$first', '$last', '$email', '$hash_pass', '$date')");
    if($row)
    {
        echo "User has been added";
        header("Location:../views/login.php");
        /*$data = $row;
        echo json_encode($data);
        header("Location:../index.php");*/
    }
    die(mysqli_error($vcon));
}

?>