<?php

require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
session_start();

if(isset($_POST['vid']))
{
    $cartTable = '';
    
    if(isset($_POST['add']) == 1)
    {
       if(isset($_SESSION["carCart"]))  
       {  
            $is_available = 0;  
            foreach($_SESSION["carCart"] as $keys => $values)  
            {  
                 if($_SESSION["carCart"][$keys]['vid'] == $_POST["vid"])  
                 {  
                      $is_available++;  
                      $_SESSION["carCart"][$keys]['vquan'] = $_SESSION["carCart"][$keys]['vquan'] + $_POST["vquan"];  
                 }  
            }  
            if($is_available < 1)  
            {  
                 $car_array = array(  
                      'vid'       =>    $_POST["vid"],  
                      'vname'     =>    $_POST["vname"],  
                      'vpic'      =>    $_POST["vpic"],  
                      'vprice'    =>    $_POST["vprice"],  
                      'vquan'     =>    $_POST["vquan"]  
                 );  
                 $_SESSION["carCart"][] = $car_array;  
            }  
       }  
       else  
       {  
            $car_array = array(  
                 'vid'            =>    $_POST["vid"],  
                 'vname'          =>    $_POST["vname"],  
                 'vpic'           =>    $_POST["vpic"],  
                 'vprice'         =>    $_POST["vprice"],  
                 'vquan'          =>    $_POST["vquan"]  
            );  
            $_SESSION["carCart"][] = $car_array;  
       }  
    }
    
    if($_POST["add"] == 2)  
      {  
           foreach($_SESSION["carCart"] as $keys => $values)  
           {  
                if($values["vid"] == $_POST["vid"])  
                {  
                     unset($_SESSION["carCart"][$keys]);  
                     $message = '<label class="text-success">Vehicle Removed</label>';  
 
                } 
               
           }  
      } 
    
      if($_POST["add"] == 3)  
      {  
           foreach($_SESSION["carCart"] as $keys => $values)  
           {  
                if($_SESSION["carCart"][$keys]['vid'] == $_POST["vid"])  
                {  
                     $_SESSION["carCart"][$keys]['vquan'] = $_POST["vquan"];  
                }  
           }  
      } 
    
    $cartTable .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="40%">Product Name</th>  
                     <th width="10%">Image</th>  
                     <th width="5%">Quantity</th>  
                     <th width="20%">Price</th>  
                     <th width="20%">Total</th>  
                     <th width="5%">Action</th>  
                </tr>  
           ';
    if(!empty($_SESSION["carCart"]))  
      {  
           $total = 0;  
           foreach($_SESSION["carCart"] as $keys => $values)  
           {  
                $cartTable .= '  
                     <tr>  
                          <td>'.$values["vname"].'</td>  
                          <td><img src="resources/uploads/'.$values["vpic"].'" style="width: 50px; height: 40px;"></td> 
                          <td><input type="tel" class="text-center quantity" maxlength="2" name="vquan[]" id="vquan'.$values["vid"].'" value="'.$values["vquan"].'" class="form-control quantity" data-vid="'.$values["vid"].'" /></td>  
                          <td align="right">₦ '.$values["vprice"].'</td>  
                          <td align="right">₦ '.number_format($values["vquan"] * $values["vprice"], 2).'</td>  
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["vid"].'"><span class="glyphicon glyphicon-remove"></span></button></td>  
                     </tr>  
                ';  
                $total = $total + ($values["vquan"] * $values["vprice"]);  
           }  
           $cartTable .= '  
                <tr>  
                     <td colspan="3" align="right">Total</td>  
                     <td align="right">₦ '.number_format($total, 2).'</td>  
                     <td></td>  
                </tr>  
                <tr>  
                     <td colspan="5" align="center">  
                          <form method="post" action="cart.php">  
                               <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                          </form>  
                     </td>  
                </tr>  
           ';  
      }  
      $cartTable .= '</table>';  
      $output = array(  
           'cartTable'     =>     $cartTable,  
           'cart_item'          =>     count($_SESSION["carCart"])  
      );  
      echo json_encode($output);  
}

?>