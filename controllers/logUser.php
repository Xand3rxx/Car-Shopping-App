<?php
require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
session_start();
if(isset($_POST["email"]) && isset($_POST["password"]))
{
    $email = mysqli_real_escape_string($vcon, $_POST["email"]);
    $password = mysqli_real_escape_string($vcon, $_POST["password"]);
    $sql = "SELECT * FROM vuser WHERE vemail = '".$email."'";
    $res = mysqli_query($vcon, $sql);
    
   while($row = mysqli_fetch_array($res))
    {
      $hash =  password_verify($password, $row["vpass"]);
        if($row["vpass"] == $hash)
        {
              echo "Succesful";
              $data["id"] = $row["id"];
              $data["vfirstname"] = $row["vfirstname"];
              $data["vlastname"] = $row["vlastname"];
              $data["vemail"] = $row["vemail"];
              $_SESSION["userid"] = $data["id"];
              $_SESSION["email"] = $data["vemail"];
              $_SESSION["vfirstname"] = $data["vfirstname"];
              $_SESSION["vlastname"] = $data["vlastname"];
              //header("Location: http://localhost/cars/cart.php");
            
        }
       else
       {
           echo "Failure";
       }
      
    }
     //echo json_encode($data);
    die(mysqli_error($vcon));
}
?>