$(document).ready(function(){
    $("#his").hide();
    var count = 1;
   
    $(document).on('click', '#addCarRow', function(){
        
        count++;
        var vadd = '';
        vadd += '<tr id="rowId'+count+'">';
        vadd += '<td><span id="sn">'+count+'</span></td>';
        vadd += '<td><input name="vpic[]" type="file" id="vpic'+count+'" data-sn="'+count+'" class="form-control" accept="image/*"></td>';
        vadd += '<td><input type="text" name="vname[]" id="vname'+count+'" data-sn="'+count+'" class="form-control input-sm" /></td>';
        vadd += '<td><input type="text" name="vbrand[]" id="vbrand'+count+'" data-sn="'+count+'" class="form-control input-sm vbrand" /></td>';
        vadd += '<td><input type="text" name="vmodel[]" id="vmodel'+count+'" data-sn="'+count+'" class="form-control input-sm vmodel" /></td>';
        vadd += '<td><input type="text" name="vyear[]" id="vyear'+count+'" data-sn="'+count+'" class="form-control input-sm vyear" /></td>';
        vadd += '<td><input type="text" name="vmodel[]" id="vprice'+count+'" data-sn="'+count+'" class="form-control input-sm vprice" /></td>';
        vadd += '<td><input type="text" name="vyear[]" id="vdesc'+count+'" data-sn="'+count+'" class="form-control input-sm vdesc" /></td>';
        vadd += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">x</button></td>';
        vadd += '</tr>';
        $('#addVehicleTable').append(vadd);
    });
    
    $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");
          $('#rowId'+row_id).remove();
          count--;
    });
    
    $('.addCar').click(function(){
           var vid = $(this).attr("id");  
           var vname = $('#vname'+vid).val();  
           var vprice = $('#vprice'+vid).val();  
        console.log(vid, vname, vprice);
                $.ajax({  
                     url:"../cars/cartLogic.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{"vid":vid, "vname":vname, "vprice":vprice, "vquan": 1, "add": 1},  
                     success:function(data)  
                     {  
                          $('#cartTable').html(data.cartTable);  
                          $('#cac').text(data.cart_item);  
                          alert("Vehicle added to Cart");  
                     }  
                });  
      
    });
    
    $(document).on('click', '.delete', function(){  
           var vid = $(this).attr("id");  
          
           if(confirm("Are you sure you want to remove this product?"))  
           {  
                $.ajax({  
                     url:"../cars/cartLogic.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{"vid":vid, "add":2},  
                     success:function(data){  
                          $('#cartTable').html(data.cartTable);  
                          $('.cac').text(data.cart_item);  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });
    
      $(document).on('keyup', '.vquan', function(){  
           var vid = $(this).data("vid");  
           var vquan = $(this).val();  
    
           if(vquan != '')  
           {  
                $.ajax({  
                     url:"../cars/cartLogic.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{"vid":vid, "vquan":vquan, "add":3},  
                     success:function(data){  
                          $('#cartTable').html(data.cartTable);  
                     }  
                });  
           }  
      });  
    
    

});

function login()
{
    
    var email = $('#email').val();
    var password = $('#pwd').val();

    if($.trim(email).length > 0 && $.trim(password).length > 0)
    {
        var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
            if(regex.test(email))
            {
                $.ajax({
                    url: "http://localhost/cars/controllers/logUser.php",
                    method: "POST",
                    data: {"email":email, "password":password},
                    cache: false,
                    async: true,
                    success: function(response){
                             
                        if(response == "Succesful")
                        {
                            
                              alert("Your login was successful");
                               window.location.href = "http://localhost/cars/cart.php";
                        }
                        else
                        {
                            alert('Invalid login credentials');
                        }
                        }
                    /*error: function()
                    {
                        alert('Invalid login credentials');
                    }*/
                });
            }
        else
        {
           alert("Email format is invalid");
        }
    }
    else{
         alert('Username/Password cannot be empty');
    }
  
         
} 

jQuery.fn.forceNumeric = function () {
     return this.each(function () {
         $(this).keydown(function (e) {
             var key = e.which || e.keyCode;

             if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
             // numbers   
                 key >= 48 && key <= 57 ||
             // Numeric keypad
                 key >= 96 && key <= 105 ||
             // comma, period and minus, . on keypad
                key == 190 || key == 188 || key == 109 || key == 110 ||
             // Backspace and Tab and Enter
                key == 8 || key == 9 || key == 13 ||
             // Home and End
                key == 35 || key == 36 ||
             // left and right arrows
                key == 37 || key == 39 ||
             // Del and Ins
                key == 46 || key == 45)
                 return true;

             return false;
         });
     });
 }


function adminLogin()
{
 var email = $('#email').val();
    var password = $('#pwd').val();

    if($.trim(email).length > 0 && $.trim(password).length > 0)
    {
        var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
            if(regex.test(email))
            {
                
                $.ajax({
                    url: "http://localhost/cars/controllers/ad_lo.php",
                    method: "POST",
                    data: {"email":email, "password":password, "add":1},
                    cache: false,
                    async: true,
                    success: function(data){
                             
                        if(data == "Successful")
                        {
                
                            alert("Your login was successful");
                            window.location.href = "http://localhost/cars/admin/dashboard.php";
                        }
                        else
                        {
                            alert('Invalid login credentials');
                        }
                        }
                   /* error: function()
                    {
                        alert('Invalid login credentials');
                    }*/
                });
            }
        else
        {
           alert("Email format is invalid");
        }
    }
    else{
         alert('Username/Password cannot be empty');
    }
  
}