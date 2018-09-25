<?php

 session_start();  
 require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/v_functions.php';
 saveTransaction();

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
        <a class="navbar-brand" href="index.php">CARS.COM (CART): &nbsp;<span><?php if(isset($_SESSION["userid"])) { echo $_SESSION["vfirstname"]." ".$_SESSION["vlastname"]; } else { echo '';} ?></span></a>
    </div>
    <ul class="nav navbar-nav pull-right">
       <li class="active"><a class="btn" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span><sup id="cac"><?php if(isset($_SESSION["carCart"])) { echo count($_SESSION["carCart"]); } else { echo '0';}?></sup></a></li>
        <li>&nbsp;</li>
      <li class="active"><a href="cart2.php">View History</a></li>
    
    </ul>
  </div>
</nav>
    
<div class="container">
   
   <div class="table-responsive card" id="cartTable">  
       <table class="table table-bordered">  
            <tr>  
                 <th width="40%">Vehicle Name</th>  
                 <th width="10%">Quantity</th>  
                 <th width="20%">Price</th>  
                 <th width="15%">Total</th>  
                 <th width="5%">Action</th>  
            </tr>  
            <?php  
            if(!empty($_SESSION["carCart"]))  
            {  
                 $total = 0;  
                 foreach($_SESSION["carCart"] as $keys => $values)  
                 {                                               
            ?>  
            <tr>  
                 <td><?php echo $values["vname"]; ?></td>  
                 <td><input type="text" name="vquan[]" id="vquan<?php echo $values["vid"]; ?>" value="<?php echo $values["vquan"]; ?>" data-vid="<?php echo $values["vid"]; ?>" class="form-control vquan" /></td>  
                 <td align="right">₦ <?php echo $values["vprice"]; ?></td>  
                 <td align="right">₦ <?php echo number_format($values["vquan"] * $values["vprice"], 2); ?></td>  
                 <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["vid"]; ?>"><span class="glyphicon glyphicon-remove"></span></button></td>  
            </tr>  
            <?php  
                      $total = $total + ($values["vquan"] * $values["vprice"]);  
                 }  
            ?>  
            <tr>  
                 <td colspan="3" align="right">Total</td>  
                 <td align="right">₦ <?php echo number_format($total, 2); ?></td>  
                 <td></td>  
            </tr>  
            <tr>  
                 <td colspan="5" align="center">
                     
                  <span>
                    <?php 
                        if(isset($_SESSION["userid"])) 
                        { //action="https://hosted.flutterwave.com/processPayment.php"
                            ?>
                     
                            <form method="POST"  action="" id="paymentForm">
                                
                                <style>
                                    .form-control{
                                        text-align: center;
                                    }
                                   
                                </style>
                              <div style="margin: auto; width:350px; position: relative;">
                                 <div class="card">
                                    <div class="header">
                                        <h3>Pay through Rave(Powered by Flutterwave)</h3>
                                    </div>
                                    <div class="body">
                                        <p>Please confirm credentials</p>
                                      <div class="form-group">
                                        <label for="firstname">First Name:</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php if(isset($_SESSION["userid"])) { echo $_SESSION["vfirstname"]; } else { echo '';} ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="lastname">Last Name:</label>
                                        <input type="text" name="lastname" class="form-control" id="lastname" value="<?php if(isset($_SESSION["userid"])) { echo $_SESSION["vlastname"]; } else { echo '';} ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="email">Email Address:</label>
                                        <input type="email" name="email" class="form-control" value="<?php if(isset($_SESSION["userid"])) { echo $_SESSION["email"]; } else { echo '';} ?>" / required> <!-- Replace the value with your customer email -->
                                      </div>
            <input type="hidden" name="amount" value="<?php if(isset($_SESSION["userid"])) { echo number_format($total, 2); } else { echo '';} ?>"  /> <!-- Replace the value with your transaction amount -->
            <input type="hidden" name="payment_method" value="card" /> <!-- Can be card, account, both (optional) -->
            <input type="hidden" name="description" value=" <?php echo $values["vname"]; ?>" /> <!-- Replace the value with your transaction description -->
            <input type="hidden" name="ref" value="MY_NAME_5a22a7f270abc8879" />
            <input type="hidden" name="title" value="<?php if(isset($_SESSION["userid"])) { echo $_SESSION["vfirstname"]." ".$_SESSION["vlastname"]; } else { echo '';} ?>" /> <!-- Replace the value with your transaction title (optional) -->
            <input type="hidden" name="country" value="NG" /> <!-- Replace the value with your transaction country -->
            <input type="hidden" name="currency" value="NGN" /> <!-- Replace the value with your transaction currency -->
            
            <input type="hidden" name="env" value="staging"> <!-- live or staging -->
            <input type="hidden" name="publicKey" value="FLWPUBK-6b97eb759a58b85759fe5dfb71ae0761-X"> <!-- Put your public key here -->
            <input type="hidden" name="secretKey" value="FLWSECK-0768d037f2e5ac779ce3f65c8b82029a-X"> <!-- Put your secret key here -->
            <input type="hidden" name="successurl" value="https://carshoppingapp.000webhostapp.com/cars/cart2.php?name=success"> <!-- Put your success url here -->
            <input type="hidden" name="failureurl" value="https://carshoppingapp.000webhostapp.com/cars/cart2=failed"> <!-- Put your failure url here -->
                                    </div> 
                                  
                                </div>
                                <input type="submit" name="buy" class="btn btn-warning" value="Buy ₦<?php echo number_format($total, 2); ?>" />  
                                </div>
  
                              </form>
                            <?php
                        } 
                        else 
                        { 
                            
                            ?>
                                <form method="post" action="cart2.php">
                                    <input type="submit" name="buy" class="btn btn-warning" value="Buy ₦<?php echo number_format($total, 2); ?>" />  
                                </form> 
                            <?php
                            
                        } 
                    ?>
                 </span>

                      
                 </td>  
            </tr>  
            <?php  
            }  
            ?>  
       </table>  
  </div>  

</div>
    <script>
        $(document).ready(function(){
            $('#ccv').forceNumeric(); 
            $('#cardnum').forceNumeric(); 
                
        });
    </script>
</body>
    
</html>