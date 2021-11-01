$("#loginform").validate({
    rules: {
    	email    	: "required",
    	password  	: "required",
    },

    messages: {
        email    	  : "Enter Register Email ID",
        password      : "Enter Password",
      
    },
    submitHandler: function(form) {

		$.ajax({
            type      :  "POST",
            data      :  $("#loginform").serialize(),
            url       :  loginUrl,
            beforeSend:  function(){
                $(".resultlogin").html("<div id='rotatingDiv'></div> <div class='alert alert-info'>"+redirecting+"...</div>");
            },
            success   : function(response){
                console.log(response);
       				var obj = JSON.parse(response);
                    if(obj.success==1){
                        //$(".resultlogin").html('');
                        if(obj.userid==1 && obj.userType==1){
                          window.location.href = adminUrl;
                        }
                        else if(obj.userType==2){
                         	window.location.href = doctorUrl;
                        }
                        else if(obj.userType == 4){
                            window.location.href = plannerUrl;
                        }
                        else{
                            window.location.href = customerUrl;
                        }
                    }
                    else{
                    	$(".resultlogin").html("<div class='alert alert-danger' id='error_msg'>"+obj.message+"</div>");
      //               	setTimeout(function(){
						//   $('#error_msg').remove();
						// },2000);
                     
                    }
            },
   		});
      
    }
});