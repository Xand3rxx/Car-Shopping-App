<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cars (User Registration Page)</title>
<script src="../resources/js/jquery.min.js"></script>
<script src="../resources/js/bootstrap.min.js"></script>
<!--<script src="../resources/js/cars.js"></script>-->
<link rel="stylesheet" href="../resources/css/bootstrap.min.css">
<link rel="stylesheet" href="../resources/css/cars.css">
</head>

<body style="background: #e9e9e9">
<nav class="navbar navbar-default navbar-fixed">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CARS.COM (SIGN UP)</a>
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
            <h3>Registration</h3>
        </div>
        <div class="body">
            <form action="../controllers/ad_ad.php" method="post">
            
              <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
              </div>
              <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password" required>
              </div>
              <div class="form-group">
                <label for="pwd1">Confirm Password:</label>
                <input type="password" class="form-control" id="pwd1" required>
              </div>
              <button type="submit" class="btn btn-default">Register</button>
              
            <br>
             <a href="../admin/index.php">Already have an account?</a>
           </form>
        </div>
    </div>
    </div>
       
    </div>
    
  
</body>
    
</html>