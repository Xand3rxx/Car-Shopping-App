<?php

require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';

if(isset($_POST["vsubmit"]))
{
    
    $vname = mysqli_real_escape_string($vcon, $_POST['vname']);
    $vbrand = mysqli_real_escape_string($vcon, $_POST['vbrand']);
    $vmodel = mysqli_real_escape_string($vcon, $_POST['vmodel']);  
    $vyear = mysqli_real_escape_string($vcon, $_POST['vyear']);  
    $vprice = mysqli_real_escape_string($vcon, $_POST['vprice']);  
    $vdesc = mysqli_real_escape_string($vcon, $_POST['vdesc']);  
    $date = date("Y-m-d h:i:sa");
   
    $file = rand(1000,100000)."-".$_FILES['vpic']['name'];
    $file_loc = $_FILES['vpic']['tmp_name'];  
    $file_size = $_FILES['vpic']['size'];
    $file_type = $_FILES['vpic']['type'];
    $folder="../resources/uploads/";
    $new_size = $file_size/1024;  
    $new_file_name = strtolower($file);
    $img = str_replace(' ','-',$new_file_name);
    $vpic = mysqli_real_escape_string($vcon, $img);  
    if(move_uploaded_file($file_loc, $folder.$img))
    {
        $row = mysqli_query($vcon, "INSERT INTO vehicle (vname, vbrand, vmodel, vyear, vprice, vdesc, vpic, date_reg) VALUES ('$vname', '$vbrand', '$vmodel', '$vyear', '$vprice', '$vdesc', '$vpic', '$date')");
    
        if($row)
        {
            echo "Vehicle has been added";
            header("Location: dashboard.php");
        }
    }
    
    
    die(mysqli_error($vcon));
}

if(isset($_POST['delete']))
{
    echo $_POST["hidden"];
    $deleteQuery="DELETE FROM vehicle WHERE id='".$_POST["hidden"]."'"; 
    if(mysqli_query($vcon, $deleteQuery))
    {
        $delete= "Post successfully deleted";
        header("Location: dashboard.php");
    }
    
}

if(isset($_POST['vupdate']))
{
    $id = mysqli_real_escape_string($vcon, $_POST['hidden']);
    $vname = mysqli_real_escape_string($vcon, $_POST['vname']);
    $vbrand = mysqli_real_escape_string($vcon, $_POST['vbrand']);
    $vmodel = mysqli_real_escape_string($vcon, $_POST['vmodel']);  
    $vyear = mysqli_real_escape_string($vcon, $_POST['vyear']);  
    $vprice = mysqli_real_escape_string($vcon, $_POST['vprice']);  
    $vdesc = mysqli_real_escape_string($vcon, $_POST['vdesc']);  
    $date = date("Y-m-d h:i:sa");
    
    $file = rand(1000,100000)."-".$_FILES['vpic']['name'];
    $file_loc = $_FILES['vpic']['tmp_name'];  
    $file_size = $_FILES['vpic']['size'];
    $file_type = $_FILES['vpic']['type'];
    $folder="../resources/uploads/";
    $new_size = $file_size/1024;  
    $new_file_name = strtolower($file);
    $img = str_replace(' ','-',$new_file_name);
    $vpic = mysqli_real_escape_string($vcon, $img);  
    if(move_uploaded_file($file_loc, $folder.$img))
    {
        $query2 = "UPDATE vehicle SET vname='$vname', vbrand='$vbrand', vmodel='$vmodel', vyear='$vyear', vprice='$vprice', vdesc='$vdesc', vpic='$vpic', date_reg='$date' WHERE id='$id'";
              
        $result2 = mysqli_query($vcon, $query2);

        if($result2)
        {
            echo "Update successful";
            header("Location: dashboard.php");
        }
    }
    die(mysqli_error($vcon)); 
}

if(isset($_POST['vsupdate']))
{
    $stat = mysqli_real_escape_string($vcon, $_POST['stat_update']); 
    $vid =  mysqli_real_escape_string($vcon, $_POST['statid']); 
    $query2 = "UPDATE vorder SET vorder_status='$stat' WHERE id='$vid'";
    $result2 = mysqli_query($vcon, $query2);

        if($result2)
        {
            echo "Update successful";
            header("Location: dashboard.php?payment=1");
        }
    else
    {
        echo "Update not successful";
        header("Location: vinsert.php");
    }
    die(mysqli_error($vcon)); 
}

?>