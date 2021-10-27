/* check email availabilty */
$('#email_available').on('keyup',function(){  
    var email = $('#email_available').val();  
    if(email != '') {  
        $.ajax({  
                url:site_url+'register/check_email_avalibility',  
                method:"POST",  
                data:{email:email},  
                success:function(data){  
                    obj1 = JSON.parse(data);  
                    if(obj1.success==0){
                        $('#email_result').html('<label class="text-danger" style="color:red"><i class="fa fa-times" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                        $('#register_btn').prop('disabled', true);
                    }
                    else{
                        $('#email_result').html('<label class="text-success" style="color:green"><i class="fa fa-check" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                        $('#register_btn').prop('disabled', false);
                    }                             
                }  
        });  
    }  
});  

/* check password availabilty */
$('#password_available').on('keyup',function(){  
    var password = $('#password_available').val(); 
    var user_id = $('#user_id').val(); 
    if(password != '') {  
        $.ajax({  
                url:site_url+'login/check_password_avalibility',  
                method:"POST",  
                data:{password:password, user_id:user_id},  
                success:function(data){  
                    obj1 = JSON.parse(data);  
                    // alert(obj1);
                    if(obj1.success==0){
                        $('#password_result').html('<label class="text-danger" style="color:red"><i class="fa fa-times" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                        $('#reset_btn').prop('disabled', true);
                    }
                    else{
                        $('#password_result').html('<label class="text-success" style="color:green"><i class="fa fa-check" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                        $('#reset_btn').prop('disabled', false);
                    }                             
                }  
        });  
    }  
});

/* check email availabilty */
$('#doctor_email').on('keyup',function(){  
    var email = $('#doctor_email').val(); 
    // alert(email); 
    if(email != '') {  
        $.ajax({  
                url:site_url+'register/check_email_avalibility_sendlink',  
                method:"POST",  
                data:{email:email},  
                success:function(data){  
                    obj1 = JSON.parse(data);  
                    if(obj1.success==0){
                        $('#email_result_send_link').html('<label class="text-danger" style="color:red"><i class="fa fa-times" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                        $('#doctor_email_send_link').prop('disabled', true);
                    }
                    else{
                        $('#email_result_send_link').html('<label class="text-success" style="color:green"><i class="fa fa-check" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                        $('#doctor_email_send_link').prop('disabled', false);
                    }                             
                }  
        });  
    }  
});  

/* check email availabilty */
$('#doctor_forgetUsername').on('keyup',function(){  
    var email = $('#doctor_forgetUsername').val(); 
    // alert(email); 
    if(email != '') {  
        $.ajax({  
                url:site_url+'register/check_email_avalibility_sendlink',  
                method:"POST",  
                data:{email:email},  
                success:function(data){  
                    obj1 = JSON.parse(data);  
                    if(obj1.success==0){
                        $('#forgetUsername_result').html('<label class="text-danger" style="color:red"><i class="fa fa-times" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                        $('#doctor_forgetUsername_btn').prop('disabled', true);
                    }
                    else{
                        $('#forgetUsername_result').html('<label class="text-success" style="color:green"><i class="fa fa-check" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                        $('#doctor_forgetUsername_btn').prop('disabled', false);
                    }                             
                }  
        });  
    }  
});  



//check captcha value
$('#captchValue').on('keyup',function(){
    var captchVals = $('#captchValue').val(); 
    var captchNumber = $("b#captchaVal").text();
    if(captchVals != captchNumber) { 
        $('#captcha_result').html('<label class="text-danger" style="color:red"><i class="fa fa-times" aria-hidden="true"></i>Invalid Captcha</label>'); 
        $('#register_btn').prop('disabled', true);
    }
    else{
        $('#captcha_result').html('<label class="text-success" style="color:green"><i class="fa fa-check" aria-hidden="true"></i>Valid Captcha</label>'); 
        $('#register_btn').prop('disabled', false);
    } 

});