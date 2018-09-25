<?php
require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
if(isset($_POST['statid']))
{
    $stat = mysqli_real_escape_string($vcon, $_POST['stat_update']); 
    $vid =  mysqli_real_escape_string($vcon, $_POST['statid']); 
    $query2 = "UPDATE vorder SET vorder_status='$stat' WHERE id='$vid'";
    $result2 = mysqli_query($vcon, $query2);
    
    echo $stat."".$vid;
        if($result2)
        {
            echo "Update successful";
            echo $vid;
            header("Location: dashboard.php?payment=1");
        }
    else
    {
        echo "Update not successful";
        header("Location: dashboard.php?payment=1");
    }
    die(mysqli_error($vcon)); 
}

?>