<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
session_start();

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["add"]))
{
    $email = mysqli_real_escape_string($vcon, $_POST["email"]);
    $password = mysqli_real_escape_string($vcon, $_POST["password"]);
    $sql = "SELECT * FROM vadmin WHERE admin_email = '".$email."'";
    $res = mysqli_query($vcon, $sql);
  
   while($row = mysqli_fetch_array($res))
    {
       $hashed = password_verify($password, $row["admin_password"]);
        if($row["admin_password"] == $hashed)
        {
            echo "Successful";
              $data["id"] = $row["id"];
              $data["admin_name"] = $row["admin_name"];
              $_SESSION["adminid"] = $data["id"];
              $_SESSION["admin_name"] = $data["admin_name"];
        
              //header("Location: http://localhost/cars/admin/dashboard.php");
        }
       else
       {
           echo "Invalid credentials";
       }
      
    }
    // echo json_encode($data);
    die(mysqli_error($vcon));
}


?>