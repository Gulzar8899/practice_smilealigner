<div style="background-color: white !important;" id="page">

    <div style="margin-top:150px; margin-bottom: 40px; " class="modal-dialog modal-size"> 

        <div  class="modal-content">

            <div class="modal-header" >

                <div class="modal-title">

                    Forgot Password ?

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
              <p style="color:black;text-align: center;">Enter the email address associated with your account to send a reset link.</p>
                <form method="POST" action="<?= site_url('login/resetPassword'); ?>">

                <div class="resultlogin"></div>

                    <div class="form-group">

                        <label style=" margin-left: 20px" for="doctor_username"> Email</label>

                        <input type="email" class="form-control" id="doctor_username" name="email"

                                style="height: 40px; width: 300px; margin-left: 20px">

                    </div>                    

                    <div class="doctor_login_error text text-danger"></div>

                    
                    <br>
                    <button type="submit" style="width: 300px; margin-left: 20px" class="btn btn-success btn-block"><span

                           class="glyphicon glyphicon-off"></span> Send Link

                    </button>

                    <a href="<?= site_url('login'); ?>" style="width: 302px; height: 44px; margin-left: 20px; border: 1px solid #56BB6D; background-color: #fff; color: #56BB6D; margin-bottom: 48px;font-weight: bold;border-radius: 14px;margin-top: 25px;" class="btn btn-block"> Go Back
                    </a>

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