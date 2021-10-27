<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<style type="text/css">
    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
</style>
<div style="background-color: white !important;" id="page">
    <div class="modal-dialog modal-size widthSetting"> 
        <div  class="modal-content">
            <div class="modal-header" >
                <div class="modal-title">
                    Register
                </div>
            </div>
            <div class="modal-body">
                <form role="form" id="doctor_logins" action="<?= site_url('register/submitRegister'); ?>" method="post" enctype="multipart/form-data">
                    <div style="margin-bottom: 31px !important;" class="row ">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label"><b>First Name *</b></label>
                                    <input type="text" name="first_name" class="form-control" id="firstName" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label"><b>Last Name *</b></label>
                                    <input type="text" name="lastName" class="form-control" id="lastName" required="">
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom: 31px !important;" class="row">
                            <div class="col-md-6">
                                <br>
                                <label for="lastName" class="form-label"><b>Profile Picture *</b></label>
                                <br>
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar"/>
                                    </div>
                                    <div class="fileinput-exists thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar" id="uploaded_image"/>
                                    </div>
                                    <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="user_edit_avatar_control" id="upload_image">
                                        </span>
                                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                    </div>                                    
                                </div>
                                <br>
                                <label for="lastName" class="form-label">Upload profile photo</label>
                                
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        <div style="margin-bottom: 31px !important;" class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Email" class="form-label"><b>Email ID *</b></label>
                                    <input type="email" name="email" class="form-control" id="email_available" required="">
                                </div>
                                <span id="email_result"></span> 
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="telephone" class="form-label"><b>Mobile No *</b></label>
                                    <input type="number" name="phone_number" class="form-control" id="telephone" required="">
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom: 31px !important;" class="row ">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Email" class="form-label"><b>Shipping Address *</b></label>
                                    <input type="text" name="shipping_address" class="form-control" id="Email" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="telephone" class="form-label"><b>Billing Address *</b></label>
                                    <input type="text" name="billing_address" class="form-control" id="telephone" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row rowGapSetting">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="street" class="form-label"><b>GST no</b></label>
                                    <input type="text" name="gst_no" class="form-control" id="street" maxlength="15">
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom: -35px; margin-left: 8px;" class="row d-flex mt-4">
                            <label><b>References *</b></label>
                        </div>
                        <div class="row d-flex mt-4">
                            <div class="col-md-3 col-sm-12">
                                <input style="margin-left: 8px;"  type="radio" id="friends" name="radio_group" value="Friends" checked>
                                <label for="friends"><b>Friends</b></label>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                 <input type="radio" value="Social Media" id="social" name="radio_group">
                                <label for="social"><b>Social Media</b></label>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                 <input type="radio" value="Business Executive" id="business" name="radio_group">
                                <label for="business"><b>Business Executive</b></label>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <input type="radio" value="Others" id="others" name="radio_group">
                                <label for="others"><b>Others</b></label>
                            </div>
                       
                           <!--  <p style="margin-left: 20px;" class="me-5">
                            <input style="margin-left: 8px;"  type="radio" id="friends" name="radio_group" value="Friends" checked>
                            <label for="friends"><b>Friends</b></label>
                            </p>
                            <p class="me-5">
                                <input type="radio" value="Social Media" id="social" name="radio_group">
                                <label for="social"><b>Social Media</b></label>
                            </p>
                            <p class="me-5">
                                <input type="radio" value="Business Executive" id="business" name="radio_group">
                                <label for="business"><b>Business Executive</b></label>
                            </p>

                            <p class="me-5">
                                <input type="radio" value="Others" id="others" name="radio_group">
                                <label for="others"><b>Others</b></label>
                            </p> -->
                        </div>
                            <div style="margin-top: -35px; margin-bottom: 60px;" class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" name="reference_person" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom: 40px; margin-top: 20px;" class="row mt-5">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="country" class="form-label"><b>Enter Text</b></label>
                                    <h3 style="color:black;" class="recaptcha"><b id="captchaVal"><?= rand(10,100); ?></b></h3>
                                </div>
                                <span id="captcha_result"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label"></label>
                                    <input type="text" class="form-control" id="captchValue" required="">
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                       <!--  <label style=" margin-left: 20px">
                            <input type="checkbox" required=""> <span style="margin-left:20px">I agree to the Terms & Conditions and Privacy Policy of Smile Aligners.</span>
                        </label> -->


                         <label class="container">I agree to the Terms & Conditions and Privacy Policy of Smile Aligners.
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <!-- <label style=" margin-left: 20px">
                            <input type="checkbox" required=""> <span style="margin-left:20px">I agree to receive data from Smile Alingers regarding the treatment plan, feedback, treatment approval. I agree with the terms and conditions and privacy policy of Smile Aligners</span>
                        </label> -->
                        <label class="container">I agree to receive data from Smile Alingers regarding the treatment plan, feedback, treatment approval. I agree with the terms and conditions and privacy policy of Smile Aligners
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="doctor_login_error text text-danger"></div>
                    <div class="row reg-btn-section" style="margin-bottom: 15px;">
                        <div class="col-md-1 col-sm-12">
                        </div>
                        <div class="col-md-5 col-sm-12 reg-btn-1">
                            <a href="#" id="goRegisterToLogin" class="js-ubea-nav-toggle text-success text-decoration-underline"
                               data-toggle="modal" data-target="#doctor_login_modal"><b>Go Back</b>
                            </a>
                            <!--                            <a href="--><?//= site_url('login'); ?><!--" class="text-success text-decoration-underline"><b>Go Back</b></a>-->
                        </div>
                        <div class="col-md-6 col-sm-12 reg-btn-2">
                            <button type="submit" style="min-width:250px; float: right;" class="btn btn-success py-4 rounded-4" id="register_btn">
                                <b>Create Account</b>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class=""><b style="color:black;">Crop Image</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<style>
    .widthSetting{
       width:884px !important; 
       margin-top:150px; 
       margin-bottom: 40px; 
    }
    @media only screen and (max-width: 600px) {
        .widthSetting{
           width:384px !important; 
           margin-top:150px; 
           margin-bottom: 40px; 
        }
    }
    .me-5 {
        margin-right: 48px;
        margin-top: 10px;
    }
    .d-flex {
        display: flex !important;
        margin-top: 45px;
        margin-bottom: 45px;
    }
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
    .user_heading_avatar {
    float: left;
    margin-right: 24px;
    position: relative;
}
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
<script>

$(document).ready(function(){

    var $modal = $('#modal');

    var image = document.getElementById('sample_image');

    var cropper;

    $('#upload_image').change(function(event){
        var files = event.target.files;

        var done = function(url){
            image.src = url;
            $modal.modal('show');
        };

        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview:'.preview'
        });
    }).on('hidden.bs.modal', function(){
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function(){
        canvas = cropper.getCroppedCanvas({
            width:400,
            height:400
        });

        canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result;
                $.ajax({
                    url: site_url + "register/imgCrop",
                    method:'POST',
                    data:{image:base64data},
                    success:function(data)
                    {
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data);
                    }
                });
            };
        });
    });
    
});
</script>