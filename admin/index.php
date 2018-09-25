<?php
session_start();
if(isset($_SESSION["adminid"]))
{
    /*header("Location: http://localhost/cars/cart.php");
    header("refresh:1; url=http://localhost/cars/cart.php");*/
    echo '<script>window.location.href="http://localhost/cars/admin/dashboard.php"</script>';  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cars (Admin Login Page)</title>
<script src="../resources/js/jquery.min.js"></script>
<script src="../resources/js/bootstrap.min.js"></script>
<script src="../resources/js/cars.js"></script>
<link rel="stylesheet" href="../resources/css/bootstrap.min.css">
<link rel="stylesheet" href="../resources/css/cars.css">
</head>

<body style="background: #e9e9e9">
<nav class="navbar navbar-default navbar-fixed">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CARS (ADMIN)</a>
    </div>
   <!-- <ul class="nav navbar-nav pull-right">
      <li class="active"><a href="#">Home</a></li>
    </ul>-->
  </div>
</nav>
    
<div class="container">
    <div style="margin: auto; width:350px; position: relative;">
         <div class="card">
        <div class="header">
            <h3>Login</h3>
        </div>
        <div class="body">
      
        <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
              </div>
             <!-- <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div>-->
              <button type="submit" onclick="adminLogin()" class="btn btn-default">Submit</button>
           <br>
             <a href="../admin/ad_reg.php">Don't have an account?</a>
    
              
        </div>
    </div>
    </div>
       
    </div>
</body>
    
</html>