<div class="myModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color: white !important;" id="page">
    <div style="margin-top:150px; margin-bottom: 40px; " class="modal-dialog modal-size"> 
        <div  class="modal-content">
            <div class="modal-header" >
                <div class="modal-title">
                    Login
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
                <form method="POST" action="" class="card-body" tabindex="500" id="loginform" onsubmit="return false;">
                <div class="resultlogin"></div>
                    <div class="form-group">
                        <label style=" margin-left: 20px" for="doctor_username"> <b>Email</b></label>
                        <input type="email" class="form-control" id="doctor_username" name="email"
                                style="height: 40px; width: 300px; margin-left: 20px">
                    </div>
                    <div class="form-group">
                        <label for="doctor_password"  style=" margin-left: 20px"> <b>Password</b></label>
                        <input type="password" class="form-control" style="height: 40px; width: 300px; margin-left: 20px" name="password" id="doctor_password"
                               >
                               <a class=" pull-right" href="<?= site_url('login/forgot_password'); ?>" id="forgot_link" style="margin-right: 32px;margin-top: 10px;"  data-dismiss="modal"><label><span class="glyphicon glyphicon-eye-open"></span> <b>Forgot Password ?</b></label></a>
                    </div>
                    
                    <div style="margin-top: 41px; margin-left: 20px" class="form-group">
                        <label class="container"><b>Remember Username</b>
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="doctor_login_error text text-danger"></div>
                    <br>
                    <button type="submit" style="width: 300px; margin-left: 20px;" class="btn btn-success btn-block"><span
                           class="glyphicon glyphicon-off"></span> <b>Login</b>
                    </button>
                    <div align="center" style="margin-top:40px; text-align:center; ">
                        <a href="<?= site_url('register'); ?>"  class='text-success'><b>Register New Account</b></a>
                        <br><br>
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
    border-radius: 6px;
    padding:15px;"
}

.modal-size .modal-title{
    font-weight: bold;
    font-size: 36px;
    line-height: 90%;
    color: #6D3745;
    text-align: center
}
/*--------------------------------------------------------------*/
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  border: 1px solid gray;
  top: 8px;
  left: 0;
  height: 17px;
  width: 17px;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #fff;
  position: absolute;
  border: 1px solid gray;
  top: 8px;
  left: 0;
  height: 17px;
  width: 17px;

}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 7px;
  top: -9px;
  width: 9px;
  height: 19px;
  border: solid green;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}


</style>
<script type="text/javascript">
    var redirecting = "<?php echo "Redirecting" ?>"; 
    var adminUrl    = "<?php echo site_url();?>admin/";
    var doctorUrl  = "<?php echo site_url();?>doctor/";
    var plannerUrl  = "<?php echo site_url();?>treatmentplanner/";
    var loginUrl    = "<?php echo site_url('login/chkUserLogin'); ?>";
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/login.js"></script>
