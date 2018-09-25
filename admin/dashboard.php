<?php
session_start();

if(!isset($_SESSION["adminid"]))
{
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cars - Dashboard</title>
<script src="../resources/js/jquery.min.js"></script>
<script src="../resources/js/bootstrap.min.js"></script>
<script src="../resources/js/cars.js"></script>    
<link rel="stylesheet" href="../resources/css/bootstrap.min.css">
<link rel="stylesheet" href="../resources/css/cars.css">
</head>

<body style="background: #e9e9e9; font-family: Segoe UI light;">
<nav class="navbar navbar-default navbar-fixed" style="">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">CARS: DASHBOARD (ADMIN) <span><?php if(isset($_SESSION["adminid"])) { echo $_SESSION["admin_name"]; } else { echo '';} ?></span></a>
    </div>
   <ul class="nav navbar-nav pull-right">
      <li class="active"><a href="../controllers/logout.php">Log out</a></li>
    </ul>
  </div>
</nav>
    
<div class="container">
    <div class="row" style="margin-top: 100px">
        <div class="col-md-4">
            <a href="dashboard.php"><div class="card">
                <div class="header" style="background-color: #8BC34A !important; color: #fff; text-decoration: none;"><h4><center>Dashboard</center></h4></div>
            </div></a>
        </div>
        <div class="col-md-4">
            <a href="dashboard.php?add=1"><div class="card">
                <div class="header" style="background-color: #E91E63 !important; color: #fff; text-decoration: none;"><h4><center>Add Vehicle</center></h4></div>
            </div></a>
        </div>
        <div class="col-md-4">
            <a href="dashboard.php?payment=1"><div class="card">
                <div class="header" style="background-color: #00BCD4 !important;color: #fff;"><h4><center>Payment Details</center></h4></div>
            </div></a>
        </div>
        
    </div>
    
    <?php
        if(isset($_GET["add"]))
        {
           
            ?>
                <h3 class="well">Add to the database</h3>
            <?php
            
            ?>
     
            <form method="post" action="vinsert.php" enctype="multipart/form-data">
            <table id="addVehicleTable" class="table table-bordered table-striped card">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Picture</th>
                <th width="15%">Vehicle Name</th>
                <th width="10%">Brand</th>
                <th width="10%">Model</th>
                <th width="7%">Year</th>
                <th width="7%">Price</th>
                <th width="30%">Description</th>
              </tr>
              <tr>
                  <td><span id="sn">1</span></td>
                  <td><input name="vpic" type="file" id="vpic1" data-sn="1" class="form-control" accept='image/*' required></td>
                  <td><input type="text" name="vname" id="vname1" class="form-control input-sm" required/></td>
                  <td><input type="text" name="vbrand" id="vbrand1" data-sn="1" class="form-control input-sm vbrand" required/></td>
                  <td><input type="text" name="vmodel" id="vmodel1" class="form-control input-sm vmodel" required/></td>
                  <td><input type="text" name="vyear" id="vyear1" data-sn="1" class="form-control input-sm vyear" required/></td>
                  <td><input type="text" name="vprice" id="vprice1" class="form-control input-sm vprice" required/></td>
                  <td><input type="text" name="vdesc" id="vdesc1" data-sn="1" class="form-control input-sm vdesc" required/></td>
              </tr>
              
            </thead>
          </table>
          <div align="right">
            <input type="submit" name="vsubmit" id="vsubmit" class="btn btn-info" value="Submit" />
<!--            <button type="button" name="add_row" id="addCarRow" class="btn btn-success">+</button>-->
          </div>
        </form>
        <?php
        }
        elseif(isset($_GET["payment"]))
        {
            require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/v_functions.php';
            ?>
                <h3 class="well">List of Ordered Vehicles</h3>
            <?php
            Ordered();
        }
        elseif(isset($_GET["edit"]) && isset($_GET["id"]))
        {
             require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/v_functions.php';
             $id = $_GET['id'];
            ?>
                <h3 class="well">Editing Vehicle with ID <a href="../index.php?id=<?php echo $id; ?>"><?php echo $id; ?></a></h3>
            <?php
             editCar($id);
        }
        else
        {
            require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/v_functions.php';
            ?>
                <h3 class="well">List of vehicles for sale</h3>
            <?php
            listDisplay();
        }
    ?>
    
</div>
    
</body>
    
</html>