<div style="background-color: white !important;" id="page">
    <div style="margin-top:150px; margin-bottom: 40px; " class="modal-dialog modal-size"> 
        <div  class="modal-content">
            <div class="modal-header" >
                <div class="modal-title">
                    Reset Password ?
                </div>
            </div>
            <div class="modal-body">
                <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <b><?php echo $this->session->flashdata('error'); ?></b>
                </div>
              <?php } if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <b><?php echo $this->session->flashdata('success'); ?></b>
                </div>
              <?php } ?>
                <form method="POST" action="<?= site_url('login/update_password'); ?>">
                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>">
                  <input type="hidden" name="user_email" id="user_email" value="<?php echo $user_email ?>">
                <div class="resultlogin"></div>
                    <div class="form-group">
                        <label style=" margin-left: 20px" for="doctor_username"> Password</label>
                        <input type="password" class="form-control" id="password_available" name="password"
                                style="height: 40px; width: 300px; margin-left: 20px" required>
                        
                        <span style="margin-left:20px;" id="password_result"></span> 

                    </div>                    
                    <div class="doctor_login_error text text-danger"></div>
                    

                    <div class="form-group">
                        <label style=" margin-left: 20px" for="doctor_username"> Password</label>
                        <input type="password" class="form-control" id="confirm_password_available" name="confirm_password"
                                style="height: 40px; width: 300px; margin-left: 20px" required>
                        <span style="margin-left:20px;" id="confirm_password_result"></span> 
                    </div>   
                    <div class="confirm_password_result text text-danger"></div>


                    <button type="submit" style="width: 300px; margin-left: 20px" id="reset_btn" class="btn btn-success btn-block"><span
                           class="glyphicon glyphicon-off"></span> Submit
                    </button>
                    <div align="center" style="margin-top:40px; text-align:center;">
                        <a href="<?= site_url('login'); ?>"  class='text-success'>Back to Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .footer_pstyle{
    color: #eee;
}

.btn-site{
    border: 2px solid #FFF !important;
}

.btn-site:hover{
    border: 1px solid #FFF !important;
}

.modal-size{
    width: 384px;
    margin-left: auto;
    margin-right: auto;
}


.modal-size .form-control{
    background: rgba(0, 0, 0, 0.05);
border: 1px solid rgba(0, 0, 0, 0.1);
box-sizing: border-box;
border-radius: 100px;

}


.modal-size button{
    border-radius: 15px;


/* Login */

font-family: Lato;
align-items: center;
text-align: center;
color: #FFFFFF;


}


.modal-size label{
    color: #52575C;
}


.modal-size .modal-header{
    background-color: #F0E0C9 !important;
    border-radius: 10px;
    padding:15px;"
}

.modal-size .modal-title{
    font-weight: bold;
    font-size: 36px;
    line-height: 90%;
    color: #6D3745;
    text-align: center
}
</style>
<script type="text/javascript">
    var redirecting = "<?php echo "Redirecting" ?>"; 
    var adminUrl    = "<?php echo site_url();?>admin/";
    var customerUrl  = "<?php echo site_url();?>home/";
    var loginUrl    = "<?php echo site_url('login/chkUserLogin'); ?>";
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/login.js"></script>

<script>  

    $('#password_available, #confirm_password_available').on('keyup', function () {
  if ($('#password_available').val() == $('#confirm_password_available').val()) {
   $('#confirm_password_result').html('<label class="text-success" style="color:green"><i class="fa fa-check" aria-hidden="true"></i>password Matched</label>'); 
  } else {
       $('#confirm_password_result').html('<label class="text-danger" style="color:red"><i class="fa fa-times" aria-hidden="true"></i>Password does not Matched</label>'); 
  }
});

// function onChange() {
//   const password = document.querySelector('input[name=password]');
//   const confirm = document.querySelector('input[name=confirm_password]');
//   if (confirm.value === password.value) {
//     confirm.setCustomValidity('');
//   } else {
//      $('#confirm_password_result').html('<label class="text-success" style="color:green"><i class="fa fa-check" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
//         // confirm.setCustomValidity('Passwords do not match');
//   }
// }


</script>  