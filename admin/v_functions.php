<?php

function Ordered()
{
    
        ?>
        
            
            <table id="addVehicleTable" class="table table-bordered table-striped card">
            <thead>
             <!-- <tr>
                <th>S/N</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Vehicle Name</th>
                <th>Price</th>
                <th>Quanity</th>
                <th>Transaction Time</th>
                <th>Status</th>
                <th>Update Status</th>
                <th>Delete</th>  
              </tr>-->
                 <tr>
                <th>S/N</th>
                <th>Transaction Time</th>
                <th>Status</th>
                <th>Update Status</th>
                <th>Delete</th>
                <th>View Order</th>  
              </tr>
            <?php
                require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
                /*$sql = 'SELECT * FROM vorder  
                     INNER JOIN vorder_details  
                     ON vorder_details.vorder_id = vorder.id  
                     INNER JOIN vuser  
                     ON vuser.id = vorder.vuser_id 
                     ';*/
                $sql = "SELECT * FROM vorder";
                $MyData = mysqli_query($vcon, $sql);
                    $var = 0;
                while($res = mysqli_fetch_array($MyData))
                {  $var++;
                 
                    if(isset($_GET["id"]))
                    {
                        ?>
                            <input id="statid" value="<?php echo $_GET["id"]; ?>" type="hidden">
                        <?php
                    }
    
                 ?>
                    
                <tr>
                     
                   <form method="post" action="status.php">   
                       <input name="statid" value="<?php echo $res["id"]; ?>" type="hidden">
                      <td><?php echo $res["id"]; ?></td>
                      <td><strong><?php echo $res["vcreation_date"]; ?></strong></td>
                      <td><?php echo $res["vorder_status"]; ?></td>
                      <td><select id="stat_update" name="stat_update">
<!--                          <option >Select Status</option>-->
                          <?php 
                            $arr = array("Delivered", "Pending");
                            foreach($arr as $ar)
                            {
                                echo "<option>".$ar."</option>";
                            }
                             
                          ?>
                      </select>&nbsp;&nbsp;<button name="vsupdate" type="submit"id="idd" hreef="http://localhost/cars/admin/status.php?statid=<?php echo $res["id"]; ?>"><span class="glyphicon glyphicon-edit"></span></button></td>
                      <td><a href="" class="text-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                    <td><a href="http://localhost/cars/admin/date.php?id=<?php echo $res["id"]; ?>&user=<?php echo $res["vuser_id"]; ?>&date=<?php echo $res["vcreation_date"]; ?>&statuso=<?php echo $res["vorder_status"]; ?>" class="btn btn-primary btn-sm view"  value>View</a></td>
                </form>
                  </tr>
                  <!--<tr>
                      <input type="text" name="statid" value="<?php echo $res["vorder_id"]; ?>">
                      <td><?php echo $res["id"].$var; ?></td>
                      <td><?php echo $res["vfirstname"]; ?></td>
                      <td><?php echo $res["vlastname"]; ?></td>  
                      <td><?php echo $res["vname"]; ?></td>
                      <td><?php echo $res["vprice"]; ?></td>
                      <td><?php echo $res["vquan"]; ?></td>
                      <td><?php echo $res["vcreation_date"]; ?></td>
                      <td><?php echo $res["vorder_status"]; ?></td>
                      <td><select name="stat_update">
                          <?php 
                            $arr = array("Delivered", "Pending");
                            foreach($arr as $ar)
                            {
                                echo "<option>".$ar."</option>";
                            }
                             
                          ?>
                      </select>&nbsp;&nbsp;<button type="submit" name="vsupdate"><span class="glyphicon glyphicon-edit"></span></button></td>
                      <td><a href="" class="text-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>-->
                <?php
                }
            ?>
            </thead>
          </table>
        
                <!--<script>
                        $(document).ready(function(){
                           
                           var showId = $('#statid').val();

                           if($.trim(showId).length > 0)
                            {
                                var statUpdate = $('#stat_update').val();
                                alert(showId);
                                alert(statUpdate);
                                $.ajax({
                                    url:"status.php",
                                    method:"POST",
                                    data:{statid:showId, stat_update:statUpdate},
                                    dataType:"JSON",
                                    success:function(data)
                                    {

                                        window.location.href = "http://localhost/cars/admin/dashboard.php?payment=1";
                                    }
                               });
                            }
                            else
                            {
                                alert("Error");
                            }
                          
                        });
                </script>-->

        <?php
              
}

function listDisplay()
{
    
        ?>
        
        <form method="post" action="vinsert.php" enctype="multipart/form-data">
            <table id="addVehicleTable" class="table table-bordered table-striped card">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Picture</th>
                <th>Vehicle Name</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>  
              </tr>
            <?php
                require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
                $sql = "SELECT * FROM vehicle";
                $MyData = mysqli_query($vcon, $sql);
                while($res = mysqli_fetch_array($MyData))
                {  
                 ?>
                  <tr>
                      
                      <td><?php echo $res["id"]; ?></td>
                      <td><?php echo "<img src=".'../resources/uploads/'.$res['vpic']." width='70' height='60' >"; ?></td>
                      <td><?php echo $res["vname"]; ?></td>
                      <td><?php echo $res["vbrand"]; ?></td>
                      <td><?php echo $res["vmodel"]; ?></td>
                      <td><?php echo $res["vyear"]; ?></td>
                      <td><?php echo $res["vprice"]; ?></td>
                      <td><?php echo $res["vdesc"]; ?></td>
                      <td><a href="dashboard.php?edit=1&id=<?php echo $res["id"]; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                      <td><button href="" name="delete" type="submit" class="text-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                      <input type="hidden" name="hidden" value="<?php echo $res["id"]; ?>">
                     
                  </tr>
                <?php
                }
                
            ?>
            </thead>
          </table>
        </form>
        <script>
        $(document).ready(function(){
            $('img').each(function(){
                $(this).attr("onerror", "this.src='http://localhost/cars/resources/img/brokenimage.jpg'");
            });
        });
    </script>

        <?php
              
}

function cars()
{
   ?>
   <div class="row">
        <?php
            require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
                $sql = "SELECT * FROM vehicle";
                $MyData = mysqli_query($vcon, $sql);
                while($res = mysqli_fetch_array($MyData))
                {  
                 ?>
                     <div>
                    <div class="col-md-4 card">
                       
                      <br><ul class="list-group">
                          <input type="hidden" id="vname<?php echo $res["id"]; ?>" value="<?php echo $res["vname"]; ?>" /> 
                          <input type="hidden" id="vprice<?php echo $res["id"]; ?>" value="<?php echo $res["vprice"]; ?>" /> 
                          <input type="hidden" id="vpic<?php echo $res["id"]; ?>" value="<?php echo $res["vpic"]; ?>" /> 
                          <center style="margin-top: 15px; margin-bottom: 15px"><?php echo "<img src=".'resources/uploads/'.$res['vpic']." width='360' height='230' >"; ?></center>
                          <li class="list-group-item"><center><h4><strong><?php echo $res["vname"]; ?></strong></h4></center></li>
                          <li class="list-group-item"><center><h5><strong>₦<?php echo $res["vprice"]; ?></strong></h5></center></li>
                          <br><center><a href="index.php?id=<?php echo $res["id"]; ?>" type="submit" class="btn btn-primary" name="view">View Details</a>
                          <button id="<?php echo $res["id"]; ?>" type="submit" class="btn btn-success addCar"><span class="glyphicon glyphicon-cart"></span>Add to Cart</button></center>
                      </ul><br>
                        </div>
                      </div>

                <?php
                }
        ?>
   </div>
    <script>
        $(document).ready(function(){
            $('img').each(function(){
                $(this).attr("onerror", "this.src='http://localhost/cars/resources/img/brokenimage.jpg'");
            });
        });
    </script>
   <?php
}

function carDetail($idnum)
{
    
    ?>
        <div class="row">
            <?php
                    require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
                
                    $output = preg_replace( '/[^0-9]/', '', $idnum );
                    $sql = mysqli_query($vcon, "SELECT * FROM vehicle WHERE id=".$output);
                        while($res = mysqli_fetch_array($sql))
                        {
                            ?>
                                <div class="col-md-8">
                                    <center style="margin-bottom: 15px"><?php echo "<img src=".'resources/uploads/'.$res['vpic']." style='width: 600px; height: 360px;' >"; ?></center>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-group">
                                      
                                      <li class="list-group-item"><center><strong><h4><?php echo $res["vname"]; ?></h4></strong></center></li>
                                      <li class="list-group-item"><strong>Brand: </strong><?php echo $res["vbrand"]; ?></li>
                                      <li class="list-group-item"><strong>Model: </strong> <?php echo $res["vmodel"]; ?></li>
                                      <li class="list-group-item"><strong>Year: </strong><?php echo $res["vyear"]; ?></li>
                                      <li class="list-group-item"><strong>Price: </strong>₦<?php echo $res["vprice"]; ?></li>
                                     <li class="list-group-item"><strong>Description: </strong><br><?php echo $res["vdesc"]; ?></li>
                                     <input type="hidden" id="vname<?php echo $res["id"]; ?>" value="<?php echo $res["vname"]; ?>" /> 
                                     <input type="hidden" id="vprice<?php echo $res["id"]; ?>" value="<?php echo $res["vprice"]; ?>" /> 
                                     <input type="hidden" id="vpic<?php echo $res["id"]; ?>" value="<?php echo $res["vpic"]; ?>" /> 

                                      <br>
                                      <center>
                                      <a id="<?php echo $res["id"]; ?>" type="submit" class="btn btn-success addCar"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                                      <a href="index.php" type="button" class="btn btn-danger "><span class="glyphicon glyphicon-home"></span></a>
                                      </center>
                                  </ul>
                                </div>
                            <?php
                        }
//                }
            ?>
        </div>
        <script>
            $(document).ready(function(){
                $('img').each(function(){
                    $(this).attr("onerror", "this.src='http://localhost/cars/resources/img/brokenimage.jpg'");
                });
            });
        </script>
    <?php
}
    
function saveTransaction()
{
  
        require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
        if(isset($_POST["buy"]))  
        {  
            $carOrderId = ""; 
            $sql = "INSERT INTO vorder (vuser_id, vcreation_date, vorder_status) VALUES ('".$_SESSION["userid"]."', '".date('Y-m-d h:i:sa')."', 'Pending')";
            
            if(mysqli_query($vcon, $sql))
            {
                $carOrderId = mysqli_insert_id($vcon); 
            }
            
             $_SESSION["carOrderId"] = $carOrderId;
            
             $carOrderDetails = "";  
            
             foreach($_SESSION["carCart"] as $keys => $values)  
             {  
             
                  $carOrderDetails .= "  
                  INSERT INTO vorder_details(vorder_id, vname, vprice, vquan)  
                  VALUES('".$carOrderId."', '".$values["vname"]."', '".$values["vprice"]."', '".$values["vquan"]."');  
                  ";  
             }
            
             if(mysqli_multi_query($vcon, $carOrderDetails))  
             {  
                  unset($_SESSION["carCart"]);  
                  echo '<script>alert("You have successfully placed an order...Thank you")</script>';  
                  echo '<script>window.location.href="../cars/cart2.php"</script>';  
             } 
            
    
            die(mysqli_error($vcon));
        }  
 

}

function displayOrder()
{
    require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
if(isset($_SESSION["userid"]))
{
    $id = ($_SESSION["userid"]);
    $sql = mysqli_query($vcon, "SELECT * FROM vorder WHERE vuser_id = '".$id."'");
    $row = mysqli_num_rows($sql);

    if($row > 0)
    {
    
        ?>
        <div class="col-md-12 card">
            <br>
                        <h1>My orders</h1>

                        <p>Your orders on one place.</p>
                        <p >If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover" >
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  
                                    while($res = mysqli_fetch_array($sql))
                                    {
                                       
                                        if(isset($_GET['id']))
                                        {
                                           ?>
                                                <input id="padd" value="<?php echo $_GET["id"]; ?>" type="hidden">
                                                <input id="pad" value="<?php echo $_GET["user"]; ?>" type="hidden">
                                                <input id="dateOrder" value="<?php echo $_GET["date"]; ?>" type="hidden">
                                                <input id="ode" value="<?php echo $_GET["statuso"]; ?>" type="hidden">
                                    
                                            <tr>
                                                <td><?php echo $res["id"]; ?></td>
                                                <td><strong><?php echo $res["vcreation_date"]; ?></strong></td>
                                                <td>
                                                    
                                                    <?php
                                                        if($res["vorder_status"] == 'Delivered'){
                                                            echo '<span class="label label-success">'.$res["vorder_status"].'</span>';
                                                        }else{
                                                            echo '<span class="label label-info">'.$res["vorder_status"].'</span>';
                                                        }
                                                    ?>
                                                   
                                                </td>
                                                <td><a href="http://localhost/cars/cart2.php?id=<?php echo $res["id"]; ?>&user=<?php echo $res["vuser_id"]; ?>&date=<?php echo $res["vcreation_date"]; ?>&statuso=<?php echo $res["vorder_status"]; ?>" class="btn btn-primary btn-sm view" value>View</a>
                                                </td>
                                                
                                            </tr>
                                           <?php
                                        }
                                        else
                                        {
                                        ?>
                                            
                                            <tr>
                                                <td><?php echo $res["id"]; ?></td>
                                                <td><strong><?php echo $res["vcreation_date"]; ?></strong></td>
                                                <td>
                                                    <?php
                                                        if($res["vorder_status"] == 'Delivered'){
                                                            echo '<span class="label label-success">'.$res["vorder_status"].'</span>';
                                                        }else{
                                                            echo '<span class="label label-info">'.$res["vorder_status"].'</span>';
                                                        }
                                                    ?>
                                                </td>
                                                <td><a href="http://localhost/cars/cart2.php?id=<?php echo $res["id"]; ?>&user=<?php echo $res["vuser_id"]; ?>&date=<?php echo $res["vcreation_date"]; ?>&statuso=<?php echo $res["vorder_status"]; ?>" class="btn btn-primary btn-sm view" value>View</a>
                                                </td>
                                                
                                            </tr>

                                        
                                        
                                        <?php
                                        }
                                    }
        
    }
    else
    {
        ?>

                <div class="col-md-12 card">
                    <br><center><h3>You have no previous orders</h3>
                    <a class="btn btn-primary" href="../cars/index.php">Buy a car today!!!</a></center><br>
                </div>

        <?php
    }
                                
                                ?>
    <script>
    var statuso = '';                             
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
                url:"admin/view.php",
                method:"POST",
                data:{id:sh, shh:shh},
                dataType:"JSON",
                success:function(data)
                {
                   var html1 = '';
                    for(i=0; i<data.length; i++)
                    {
                        var t = parseInt(data[i].vprice) * parseInt(data[i].vquan);
                        $('#car_details').css("display", "block");
                        html1 += '<h4 class="well">Order Details For Vehivle ID <strong>'+data[i].id+'</strong> was placed on <strong>'+date+'</strong> and '+statuso+'</h4>';
                        html1 += '<div class="table-responsive card">';
                        //html1 += '<p class="well">Order Details For Vehivle ID <a href="index.php?id='+data[i].id+'">'+data[i].id+'</a></p>';
                        
                        html1 += '<table class="table table-bordered"><tr><td width="10%" align="right"><b>Vehicle Name</b></td><td width="90%"><span>'+data[i].vname+'</span></td></tr>';
                        html1 += '<tr><td width="10%" align="right"><b>Vehicle Price</b></td><td width="90%"><span>'+data[i].vprice+'</span></td></tr>';
                        html1 += '<tr><td width="10%" align="right"><b>Quantity</b></td><td width="90%"><span>'+data[i].vquan+'</span></td></tr>';
                        html1 += '<tr><td width="10%" align="right"><b>Total</b></td><td width="90%"><span>'+t+'</span></td></tr></table></div>';

                    }
                    $('#car_details').html(html1);
                    
                }
               });
              }
              else
              {

               $('#car_details').css("display", "none");
              }

    });
</script>                                
                                
                                    </tbody>
                            </table>
                        </div>
            
                        
            
            </div>
            <br>
            <span id="car_details" style="display:none"></span>
    <?php
    
}
}

function editCar($id)
{
    require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
    
        ?>
        
        <form method="post" action="vinsert.php" enctype="multipart/form-data">
            <table id="addVehicleTable" class="table table-bordered table-striped card">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Picture</th>
                <th>Vehicle Name</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Description</th>
              </tr>
            <?php
                //require $_SERVER["DOCUMENT_ROOT"].'/cars/admin/config.php';
                $sql = "SELECT * FROM vehicle WHERE id=".$id;
                $MyData = mysqli_query($vcon, $sql);
                while($res = mysqli_fetch_array($MyData))
                {  
                 ?>
                  <!--<tr>
                      
                      <td></td>
                      <td><?php echo "<img src=".'../resources/uploads/'.$res['vpic']." width='70' height='60' >"; ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><a href="dashboard.php?edit=1&id=<?php echo $res["id"]; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                      <td><button href="" name="delete" type="submit" class="text-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                      <input type="hidden" name="hidden" value="<?php echo $res["id"]; ?>">
                     
                  </tr>-->
                    <tr>
                      <td><span id="sn"><?php echo $res["id"]; ?></span></td>
                      <td><input value="<?php echo $res["vpic"]; ?>" name="vpic" type="file" id="vpic1" data-sn="1" class="form-control" accept='image/*' required></td>
                      <td><input type="text" name="vname" id="vname1" class="form-control input-sm" value="<?php echo $res["vname"]; ?>" required/></td>
                      <td><input type="text" name="vbrand" id="vbrand1" data-sn="1" class="form-control input-sm vbrand" value="<?php echo $res["vbrand"]; ?>" required/></td>
                      <td><input type="text" name="vmodel" id="vmodel1" class="form-control input-sm vmodel" value="<?php echo $res["vmodel"]; ?>" required/></td>
                      <td><input type="text" name="vyear" id="vyear1" data-sn="1" class="form-control input-sm vyear" value="<?php echo $res["vyear"]; ?>" value="<?php echo $res["vyear"]; ?>" required/></td>
                      <td><input type="text" name="vprice" id="vprice1" class="form-control input-sm vprice" value="<?php echo $res["vprice"]; ?>" required/></td>
                      <td><input type="text" name="vdesc" id="vdesc1" data-sn="1" class="form-control input-sm vdesc" value="<?php echo $res["vdesc"]; ?>" required/></td>
                    <input type="hidden" name="hidden" value="<?php echo $res["id"]; ?>" required/>
                  </tr>
                    
                <?php
                }
                
            ?>
            </thead>
          </table>
            <div align="right">
                      <input type="submit" name="vupdate" id="vsubmit" class="btn btn-info" value="Update" />
                    </div>
        </form>


        <?php
}
?>