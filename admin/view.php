<?php
require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
session_start();
if(isset($_POST["id"]))
{
 
     $query = "SELECT * FROM vorder_details WHERE vorder_id= '".$_POST["id"]."'" ;
    
     $result = mysqli_query($vcon, $query);
     
     $data = array();
     $data1 = array();
     while($row = mysqli_fetch_array($result))
     {
     /* $data["vname"] = $row["vname"];
      $data["vprice"] = $row["vprice"];
      $data["vquan"] = $row["vquan"];*/
      $data[] = $row;
             
     }
   /* $sql = "SELECT * FROM vuser WHERE id= '".$_POST["shh"]."'" ;
             $result1 = mysqli_query($vcon, $sql);
             while($row1 = mysqli_fetch_array($result1))
             {
                  $data1[] = $row1;
                 $_SESSION['owner'] = $data1;
             }
      echo json_encode($_SESSION['owner']);       */
     echo json_encode($data);
     
    die(mysqli_error($vcon));
}
?>