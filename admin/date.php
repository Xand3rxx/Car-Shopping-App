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
<title>Cars - Cart</title>
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
        <a class="navbar-brand" href="index.php">CARS.COM: &nbsp;<span><?php if(isset($_SESSION["adminid"])) { echo $_SESSION["admin_name"]."(Admin)"; } else { echo '';} ?></span></a>
    </div>
    <ul class="nav navbar-nav pull-right">
       <li class="active"><a class="btn" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span><sup id="cac"><?php if(isset($_SESSION["carCart"])) { echo count($_SESSION["carCart"]); } else { echo '0';}?></sup></a></li>
        <li>&nbsp;</li>
      <li class="active"><a href="../Cars/controllers/logout.php">Log out</a></li>
    </ul>
  </div>
</nav>
    
<div class="container">
    <div id="owner_details">
        <?php 
            
        /*    if(isset($_SESSION["adminid"])) 
            { 
                //echo count($_SESSION["owner"]); 
                for($x = 0; $x < count($_SESSION["owner"]); $x++) {
                    echo $_SESSION["owner"][$x];
                    echo "<br>";
                }
            } 
            else 
            { 
                echo '';
            }*/
            
        ?>
    </div>
     <span  id="car_details"></span>
   <?php
        require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/v_functions.php';
        //displayOrder();
        if(isset($_GET['id']))
        {
           ?>
                <input id="padd" value="<?php echo $_GET["id"]; ?>" type="hidden">
                <input id="pad" value="<?php echo $_GET["user"]; ?>" type="hidden">
                <input id="dateOrder" value="<?php echo $_GET["date"]; ?>" type="hidden">
                <input id="ode" value="<?php echo $_GET["statuso"]; ?>" type="hidden">
           <?php
        }
    ?>
   
</div>
<script>
                                 
   $(document).ready(function(){

           var shh = $("#pad").val();
           var sh = $("#padd").val();
           var date = $("#dateOrder").val();
           var dw = $('#ode').val();
            if(dw == 'Delivered')
            {
              
                statuso = 'has been <strong>Delivered.</strong>';
            }
            else if(dw == 'Pending')
            {
                statuso = 'is currently <strong>Being</strong> prepared.';
            } 
            if($.trim(sh).length > 0 && $.trim(shh).length > 0 && $.trim(date).length > 0 && $.trim(dw).length > 0)
              {
               $.ajax({
                url:"view.php",
                method:"POST",
                data:{id:sh, shh:shh},
                dataType:"JSON",
                success:function(data)
                {
                   var html1 = '';
                   var html2 = ''; 
                    
                    for(i=0; i<data.length; i++)
                    {
                        //html2 += data[i][0].vemail;
                        var t = parseInt(data[i].vprice) * parseInt(data[i].vquan);
                     
                        html1 += '<h4 class="well">Order Details For Vehivle ID <strong>'+data[i].id+'</strong> was placed on <strong>'+date+'</strong> and '+statuso+'</h4>';
                        html1 += '<div class="table-responsive card">';
                        //html1 += '<p class="well">Order Details For Vehivle ID <a href="index.php?id='+data[i].id+'">'+data[i].id+'</a></p>';
                        
                        html1 += '<table class="table table-bordered"><tr><td width="10%" align="right"><b>Vehicle Name</b></td><td width="90%"><span>'+data[i].vname+'</span></td></tr>';
                        html1 += '<tr><td width="10%" align="right"><b>Vehicle Price</b></td><td width="90%"><span>'+data[i].vprice+'</span></td></tr>';
                        html1 += '<tr><td width="10%" align="right"><b>Quantity</b></td><td width="90%"><span>'+data[i].vquan+'</span></td></tr>';
                        html1 += '<tr><td width="10%" align="right"><b>Total</b></td><td width="90%"><span>'+t+'</span></td></tr></table></div>';

                    }
                    $('#car_details').html(html1);
                    $('#owner_details').html(html2);
                }
               })
              }
              else
              {

               $('#car_details').css("display", "none");
              }

    });
</script>
</body>
    
</html>