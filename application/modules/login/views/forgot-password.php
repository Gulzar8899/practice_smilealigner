<div  class="myModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color: white !important;" id="forget-password">
     <div style="margin-top:150px; margin-bottom: 40px; " class="modal-dialog modal-size"> 
        <!-- Modal content-->
        <div  class="modal-content">
            <div class="modal-header" >
                <div class="modal-title">
                    Forgot Password
                </div>
                
            </div>
            <div class="modal-body">
                <form role="form" id="doctor_logins" action="<?= site_url('login/checkForgotType'); ?>"method="post">
                <p h3 style="color: #000; margin-left:39px;font-weight: bold;">
                    Forgot your username/password?
                </p>

                    <div class="form-group" style="color: #000; margin-left:39px">
                        <div class="row">
                            <div class="col-md-6">
                                  <div class="d-flex">
                                        <input type="radio" style="width:26px; height: 26px" name="forgot_username" value="username">
                                        <span style="margin-left: 18px;font-weight: bold;">Forgot Username</span> 
                                  </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" h3 style="color:  #000; margin-left:39px">
                        <div class="row">
                            <div class="col-md-1">
                                 <input type="radio" style="width:26px; height: 26px" name="forgot_username" value="password"> 
                            </div>
                            <div  style=" margin-top: 5px;"  class="col-md-6">
                                <span style="margin-left: 18px;font-weight: bold;">Forgot Password</span>
                            </div>
                        </div>
                       
                    </div>
                    
                    
                    
                    <button type="submit" style="width: 330px; height: 48px; margin-left: 20px; margin-top: 113px; margin-bottom: 20px" class="btn btn-success btn-block"><span
                           class="glyphicon glyphicon-off"></span> Next
                    </button>
                    <a href="<?= site_url('login'); ?>" style="width: 330px; height: 44px; margin-left: 20px; border: 1px solid #56BB6D; background-color: #fff; color: #56BB6D; margin-bottom: 48px;font-weight: bold;border-radius: 14px;" class="btn btn-block"> Go Back
                    </a>
               
                    
                    <div class="doctor_login_error text text-danger"></div>
                    
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
</style>

