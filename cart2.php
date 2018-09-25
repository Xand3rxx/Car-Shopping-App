<?php
session_start();

if(!isset($_SESSION["userid"]))
{
    header("Location: views/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cars - Cart</title>
<script src="resources/js/jquery.min.js"></script>
<script src="resources/js/bootstrap.min.js"></script>
<script src="resources/js/cars.js"></script>    
<link rel="stylesheet" href="resources/css/bootstrap.min.css">
<link rel="stylesheet" href="resources/css/cars.css">
</head>

<body style="background: #e9e9e9; font-family: Segoe UI light;">
<nav class="navbar navbar-default navbar-fixed" style="">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">CARS.COM: &nbsp;<span><?php if(isset($_SESSION["userid"])) { echo $_SESSION["vfirstname"]." ".$_SESSION["vlastname"]; } else { echo '';} ?></span></a>
    </div>
    <ul class="nav navbar-nav pull-right">
       <li class="active"><a class="btn" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span><sup id="cac"><?php if(isset($_SESSION["carCart"])) { echo count($_SESSION["carCart"]); } else { echo '0';}?></sup></a></li>
        <li>&nbsp;</li>
      <li class="active"><a href="../Cars/controllers/logout.php">Log out</a></li>
    </ul>
  </div>
</nav>
    
<div class="container">
   <?php
        require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/v_functions.php';
        displayOrder();
    ?>
   
</div>
    
</body>
    
</html>