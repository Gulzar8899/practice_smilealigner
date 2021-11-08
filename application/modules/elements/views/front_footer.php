<div class="ubea-section-overflow black-shade">
    <footer id="ubea-footer" role="contentinfo">
        <div class="ubea-container ">
                <div class="row">
                    <div class="col-xs-12 ">
                        <h2  class="title-bold font-white footer_head" style="margin-left: 15px">
                            SmileAligners
                        </h2>
                        <br/>
                        <div class="col-xs-10 col-md-3 footer-col-centered ">
                            <div class="jumbotron">

                                <p class="footer_pstyle">
                                    SmileAligners straightens teeth using a
                                    serias of invisible aligners that are
                                    digitally made to your teeths.
                                    SmileAligners virtual 3D software moves
                                    the teeth to its final position. As you
                                    replace each aligners every week, your
                                    teeth will move gradually towards the
                                    final projected position as prescribed.
                                </p>
                            </div>
                        </div>
                        <div class=" col-md-3 col-xs-6" >
                            <div class="jumbotron">
                                <ul class="footer-li" style="padding: 0 ">
                                    <li><a href="http://smilealigners.in/aboutus">ABOUT US</a></li>
                                    <li><a href="http://smilealigners.in/services">SERVICES</a></li>
                                    <li><a href="http://smilealigners.in/locate_orthodontist">LOCATE AN ORTHODONTIST</a></li>
                                    <li><a href="http://smilealigners.in/faqs">FAQs</a></li>
                                    <li><a href="http://smilealigners.in/gallery">Smile Gallery</a></li>
                                    <li><a href="http://smilealigners.in/contactus">CONTACT</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-md-3 col-xs-6"  style="padding: 0 ">
                            <div class="jumbotron">
                                <h6 class="font-white" style="font-size:17px">CONTACT US</h6>
                                <p class="footer_pstyle">
                                    Laxmi Niwas, <br/>
                                    1<sup>st</sup> Floor, Near FabIndia,
                                    <br/>18<sup>th</sup> Road, Khar West,
                                    <br/>Mumbai
                                </p>
                            </div>
                        </div>

                        <div class=" col-xs-12 col-md-3 col-md-offset-0 footer_locate" > <!---- 007 code  xs--10--to--12 ---------->
                            <div class="jumbotron text-center">
                                <div class=" text-left font-white footer_headings" style="padding-bottom: 10px">LOCATE AN ORTHODONTIST</div>
                                <form action="#" method="post" id="search_orthodontist">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="locate_orthodontist_serch" placeholder="Enter Pincode" style="height: 35px; background: white;">
                                        <span class="input-group-btn">
                                        <button class="btn btn-sm btn-site" style=" color:black;height: 35px; padding: 0 10px;background:#805046;color: #FFF;" >SEARCH</button>
                                    </span>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-xs-12 text-left" style="padding: 20px 10px 0;">
                                        <ul class="ubea-social-icons">
                                            <li><a href="#"><i class="icon-facebook-with-circle"></i></a></li>
                                            <li><a href="#"><i class="icon-linkedin-with-circle"></i></a></li>
                                            <li><a href="#"><i class="icon-youtube-with-circle"></i></a></li>
                                            <li><a href="#"><i class="icon-google-with-circle"></i></a></li>
                                            <li><a href="#"><i class="icon-instagram-with-circle"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </footer>
</div>
</div>

<!--Register Modal-->
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
	#register-modal .modal{
		display: block !important; /* I added this to see the modal, you don't need this */
	}

	/* Important part */
	#register-modal .modal-dialog{
		overflow-y: initial !important
	}
	#register-modal .modal-body{
		height: 80vh;
		overflow-y: auto;
	}
	
	/* Customize the label (the container) */
	#register-modal .billing-checkbox .container {
	  display: block;
	  position: relative;
	  padding-left: 35px;
      padding-right: 0px;
	  margin-bottom: 12px;
	  cursor: pointer;
	  font-size: 22px;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}

	/* Hide the browser's default checkbox */
	#register-modal .billing-checkbox .container input {
	  position: absolute;
	  opacity: 0;
	  cursor: pointer;
	  height: 0;
	  width: 0;
	}

	/* Create a custom checkbox */
	#register-modal .billing-checkbox .checkmark {
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 25px;
	  width: 25px;
	  /*background-color: #eee;*/
	}

	/* On mouse-over, add a grey background color */
	#register-modal .billing-checkbox .container:hover input ~ .checkmark {
	  background-color: white;
	}

	/* When the checkbox is checked, add a blue background */
	#register-modal .billing-checkbox .container input:checked ~ .checkmark {
	  background-color: #56BB6D;
	}

	/* Create the checkmark/indicator (hidden when not checked) */
	#register-modal .billing-checkbox .checkmark:after {
	  content: "";
	  position: absolute;
	  display: none;
	}

	/* Show the checkmark when checked */
	#register-modal .billing-checkbox .container input:checked ~ .checkmark:after {
	  display: block;
	}

	/* Style the checkmark/indicator */
	#register-modal .billing-checkbox .container .checkmark:after {
	  left: 9px;
	  top: 5px;
	  width: 5px;
	  height: 10px;
	  border: solid white;
	  border-width: 0 3px 3px 0;
	  -webkit-transform: rotate(45deg);
	  -ms-transform: rotate(45deg);
	  transform: rotate(45deg);
	}

	#register-modal .billing-checkbox .sec-l{
		padding-left: 0px;
	}

	@media (max-width: 992px){
		#register-modal .billing-checkbox .sec-l{
			padding-top: 10px;
   			padding-left: 10px !important;
		}
	}

</style>
<div class="myModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="register-modal">
	<div class="modal-dialog modal-size widthSetting" style="margin-top: 85px;">
		<div  class="modal-content">
			<div class="modal-header" >
				<div class="modal-title">
					Register
				</div>
			</div>
			<div class="modal-body">
				<form role="form" id="doctor_register" action="<?php echo base_url('register/submitRegister');?>" method="post" enctype="multipart/form-data">
					<div style="margin-bottom: 5px !important;" class="row ">
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
					<div style="margin-bottom: 5px !important;" class="row">
						<div class="col-md-6">
							<br>
							<label for="lastName" class="form-label"><b>Profile Picture *</b></label>
							<br>
							<br>
							<div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail">
									<img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar"/>
								</div>
								<div class="fileinput-exists thumbnail p-0">
									<img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar" id="uploaded_image"/>
								</div>
								<label for="lastName" class="form-label" style="position: absolute;width:200%;margin-top:25px;margin-left:15px;">
									<div class="user_avatar_controls">
										<a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput" style="float: left;"><i class="material-icons">&#xE5CD;</i></a>
                                        <span class="btn-file" style="float: left;left:0px;">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
											<input type="file" name="pt_img" id="upload_image">
											<input type="hidden" name="user_edit_avatar_control" id="pt_img_name" value="">
                                        </span>
									</div>
								</label>
							</div>
						</div>
						<div class="col-md-6">
						</div>
					</div>
					<div style="margin-bottom: 20px !important;" class="row">
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

					<!-- Billing Address -->
					<div style="margin-bottom: 20px !important;" class="row ">
						<div class="col-md-12">
							<h4 style="color:#52575C;margin-bottom: 0px;font-weight: bolder;"><b>Billing Address*</b></h4>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="Street Address" class="form-label"><b>Street Address *</b></label>
								<input type="text" name="billing_streetaddress" class="form-control" id="billing_streetaddress" required="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<div class="form-group">
								    <label for="exampleFormControlSelect1" class="form-label"><b>Country*</b></label>
								    <select class="form-control" id="billing_country" name="billing_country" onChange="getBillingStates(this);" style="padding: 5px 10px;" required="">
								     <option value="">Select</option>
                                  		<?php foreach($countries as $country): ?>
                                            <option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>"><?= $country->name; ?></option>
                                        <?php endforeach; ?>

								    </select>
								  </div>
							</div>
						</div>
					</div>
					<div style="margin-bottom: 20px !important;" class="row ">
						<div class="col-md-6">
							<div class="mb-3">
								<div class="form-group">
								    <label for="exampleFormControlSelect1"><b>State*</b></label>
								    <select class="form-control" id="billing_state" name="billing_state" onChange="getBillingCities(this);" style="padding: 5px 10px;" required="">
								   			<option  value="">Select</option>
                                            
								    </select>
								 </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<div class="form-group">
								    <label for="exampleFormControlSelect1"><b>City*</b></label>
								    <select class="form-control" id="billing_city" name="billing_city" style="padding: 5px 10px;" required="">
								     		<option  value="">Select</option>
                                          
								    </select>
								 </div>
							</div>
						</div>
					</div>
					<div style="margin-bottom: 30px !important;" class="row ">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="Post Code" class="form-label"><b>Post Code*</b></label>
								<input type="text" name="billing_zipcode" class="form-control" id="billing_zipcode" required="">
							</div>
						</div>
					</div>

					<!-- Shipping Address -->
					<div style="" class="row billing-checkbox">
						<div class="col-md-6">
							<h4 style="color:#52575C;margin-bottom: 0px;margin-top: 0px;font-weight: bolder;"><b>Shipping Address*</b></h4>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									
								</div>
								<div class="col-md-6 sec-l" style="padding-left: 0px;">
									<label class="container">Same As Billing Address
									  <input type="checkbox" id="isBillingAddressChecked" value="1" name="same_billing_address">
									  <span class="checkmark"></span>
									  
									</label>
										<!--   <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
										  <label class="form-check-label" for="flexCheckDefault"> </label> -->
								</div>
							</div>
						</div>							
					</div>

					<div class="" id="hide-shipping-address">
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="Street Address" class="form-label"><b>Street Address *</b></label>
									<input type="text" name="shipping_streetaddress" class="form-control" id="shipping_streetaddress" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<div class="form-group">
									    <label for="exampleFormControlSelect1" class="form-label"><b>Country*</b></label>
									    <select class="form-control" id="shipping_country" name="shipping_country" onChange="getShippingStates(this);" style="padding: 5px 10px;" required="">
									    <option  value="">Select</option>
	                                    <?php foreach($countries as $country): ?>
                                      	  <option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>"><?= $country->name; ?></option>
                                        <?php endforeach; ?>
									    </select>
									  </div>
								</div>
							</div>
						</div>
						<div style="margin-bottom: 20px !important;" class="row ">
							<div class="col-md-6">
								<div class="mb-3">
									<div class="form-group">
									    <label for="exampleFormControlSelect1"><b>State*</b></label>
									    <select class="form-control" id="shipping_state" name="shipping_state" onChange="getShippingCities(this);" style="padding: 5px 10px;" required="">
									   			<option value="">Select</option>
	                                           
									    </select>
									 </div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<div class="form-group">
									    <label for="exampleFormControlSelect1"><b>City*</b></label>
									    <select class="form-control" id="shipping_city" name="shipping_city" style="padding: 5px 10px;" required="">
									     		<option  value="">Select</option>
	                                            
									    </select>
									 </div>
								</div>
							</div>
						</div>
						<div style="margin-bottom: 20px !important;" class="row ">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="Post Code" class="form-label"><b>Post Code*</b></label>
									<input type="text" name="shipping_zipcode" class="form-control" id="shipping_zipcode" required="">
								</div>
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
					<div class="row mt-4 regiter-radiobtn">
						 	<div class="col-md-3 col-sm-6 col-xs-6 d-flex">
                                <input type="radio" class="role" id="friends" name="radio_group" value="Friends" onclick="showInputField();">
                                <label for="friends"><b>&nbsp;&nbsp;Friends</b></label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 d-flex">
                                 <input type="radio" value="Social Media" class="role" id="social" name="radio_group" onclick="showInputField();">
                                <label for="social"><b>&nbsp;&nbsp;Social Media</b></label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 d-flex">
                                 <input type="radio" value="Business Executive" class="role" id="business" name="radio_group" onclick="showInputField();">
                                <label for="business"><b>&nbsp;&nbsp;Business Executive</b></label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 d-flex">
                                <input type="radio" value="Others" id="others" class="role" name="radio_group" onclick="showInputField();">
                                <label for="others"><b>&nbsp;&nbsp;Others</b></label>
                            </div>
						
					</div>

					<div style="margin-top: -35px;" class="row">
						<div class="col-md-12" id="business_executive" style="display:none; margin-top: 0px;">
							<div class="mb-3">
								<div class="form-group">
								    <label for="exampleFormControlSelect1"><b>Select Business Executive*</b></label>
								    <select class="form-control" id="business_developer" name="business_reference_person" style="padding: 5px 10px;">
								     		<option value="">Select</option>
								    </select>
								 </div>
							</div>
						</div>
						<div class="col-md-12" id="reference_person" style="display:none; margin-top: 0px;">
							<div class="mb-3">
								<input type="text" name="reference_person" id="input_reference_person" class="form-control">
							</div>
						</div>
					</div>
					<div style="margin-bottom: 40px;margin-top:30px;margin-left:-5px;" class="row mt-5">
						<div class="col-md-6">
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
					<div class="form-group" style="margin-left: 10px;">
						<!--  <label style=" margin-left: 20px">
							 <input type="checkbox" required=""> <span style="margin-left:20px">I agree to the Terms & Conditions and Privacy Policy of Smile Aligners.</span>
						 </label> -->

						<label class="container">I agree to the Terms & Conditions and Privacy Policy of Smile Aligners.
							<input type="checkbox" checked="checked">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-group" style="margin-left: 10px;">
						<!-- <label style=" margin-left: 20px">
							<input type="checkbox" required=""> <span style="margin-left:20px">I agree to receive data from Smile Alingers regarding the treatment plan, feedback, treatment approval. I agree with the terms and conditions and privacy policy of Smile Aligners</span>
						</label> -->
						<label class="container">I agree to receive data from Smile Alingers regarding the treatment plan, feedback, treatment approval. I agree with the terms and conditions and privacy policy of Smile Aligners
							<input type="hidden" name="notification_alert" value="off" checked="checked">
							<input type="checkbox" name="notification_alert" value="on" checked="checked">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="doctor_login_error text text-danger"></div>
					<div class="row reg-btn-section" style="margin-bottom: 15px;">
						<div class="col-md-6 col-sm-12 reg-btn-1">
							<a href="#" id="goRegisterToLogin" class="js-ubea-nav-toggle text-success text-decoration-underline"
							   data-toggle="modal" data-target="#doctor_login_modal">Go Back
							</a>
							<!--							<a href="--><?//= site_url('login'); ?><!--" class="text-success text-decoration-underline"><b>Go Back</b></a>-->
						</div>
						<div class="col-md-6 col-sm-12 reg-btn-2 pr-0">
							<button type="submit" style="min-width:250px; float: right;" class="btn btn-success py-4 rounded-4" id="register_btn">
								Create Account
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
				<button type="button" style="margin-top: -30px;" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<div class="row">
						<div class="col-md-8" >
							<img class="" style="height:auto; width:100%;" src="" id="sample_image" />
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

<!--Login Modal-->
<div class="myModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="" id="doctor_login_modal" >
	<div style="margin:auto;margin-top:80px;" class="modal-dialog modal-size">
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
<!--						<a class=" pull-right" href="--><?//= site_url('login/forgot_password'); ?><!--" id="forgot_link" style="margin-right: 32px;margin-top: 10px;"  data-dismiss="modal">-->
						<a href="#" style="margin-right: 32px;margin-top: 10px; float: right;" id="forget_password" class=" js-ubea-nav-toggle"
						   data-toggle="modal" data-target="#forget-password">
							<label>
								<span class="glyphicon glyphicon-eye-open"></span> <b>Forgot Password?</b>
							</label>
						</a>
					</div>

					<div style="margin-top: 50px; margin-left: 20px" class="form-group">
						<label class="container"><b>Remember Username</b>
							<input type="checkbox" checked="checked">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="doctor_login_error text text-danger"></div>
					<button type="submit" style="width: 300px; margin-left: 20px;" class="btn btn-success btn-block"><span
							class="glyphicon glyphicon-off"></span>Login
					</button>
					<div align="center" style="margin-top:40px; text-align:center; ">
						<a href="#" id="register_modal" class=" js-ubea-nav-toggle text-success text-decoration-underline"
						   data-toggle="modal" data-target="#register-modal"><b>Register New Account</b></a>
<!--						<a href="--><?//= site_url('register'); ?><!--"  class='text-success'><b>Register New Account</b></a>-->
						<br><br>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!--Main Forget Password Modal-->
<div class="myModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="forget-password">
	<div style="margin-top:80px;" class="modal-dialog modal-size">
		<!-- Modal content-->
		<div  class="modal-content">
			<div class="modal-header" >
				<div class="modal-title">
					Forgot Password
				</div>

			</div>
			<div class="modal-body">
				<form role="form" id="doctor_logins" action="<?= site_url('login/checkForgotType'); ?>"method="post">
					<p h3 style="color: #000; margin-left:39px;">
						Forgot your username/password?
					</p>
					<br>
					<div class="form-group" style="color: #000; margin-left:39px">
                        <div class="row">
                            <div class="col-md-12">
                                  <div class="d-flex forget-modal-m">
                                        <input style="width:22px; height: 22px;" type="radio"  name="forgot_username" value="username">
                                        <span class="forget-f1" style="margin-left: 18px;">Forgot Username</span> 
                                  </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group" h3 style="color:  #000; margin-left:39px">
						<div class="row">
							<div class="col-md-12">
								<div class="d-flex forget-modal-m">
									<input type="radio" style="width:22px; height: 22px" name="forgot_username" value="password">
									<span class="forget-f1" style="margin-left: 18px;">Forgot Password</span>
								</div>
							</div>
						</div>
					</div>



<!--					<button style="width: 330px; height: 48px; margin-left: 20px; margin-top: 113px; margin-bottom: 20px" class="btn btn-success btn-block"><span-->
<!--							class="glyphicon glyphicon-off submit"></span> Next-->
<!--					</button>-->

					<br>
					<br>
					<br>
					<br>
					<a href="#" id="nextForgetType" class="js-ubea-nav-toggle btn btn-success btn-block border-radius-15p py-12p">Next
					</a>
<!--					<a href="--><?//= site_url('login'); ?><!--" style="width: 330px; height: 44px; margin-left: 20px; border: 1px solid #56BB6D; background-color: #fff; color: #56BB6D; margin-bottom: 48px;font-weight: bold;border-radius: 14px;" class="btn btn-block"> Go Back-->
					<a href="#" id="goBackToLogin" class="js-ubea-nav-toggle btn btn-default btn-block border-radius-15p py-12p" data-toggle="modal" data-target="#doctor_login_modal">Go Back
					</a>
<!--					</a>-->


					<div class="doctor_login_error text text-danger"></div>

				</form>
			</div>

		</div>
	</div>
</div>

<!--Forget UserName Modal-->
<div class="myModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="forgetUserName">
	<div style="margin-top:80px;" class="modal-dialog modal-size">
		<div  class="modal-content">
			<div class="modal-header" >
				<div class="modal-title">
					Forgot Username ?
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
				<form method="POST" action="<?= site_url('login/forgotUserNameSubmit'); ?>">
					<div class="resultlogin"></div>
					<div class="form-group"  style="margin-bottom: 5px;">
						<label style=" margin-left: 20px" for="doctor_username"> Email</label>
						<input type="email" id="doctor_forgetUsername" class="form-control" name="email"
							   style="height: 40px; width: 300px; margin-left: 20px">
					</div>
					<span id="forgetUsername_result" style="padding-left: 30px;"> </span>
					<div class="doctor_login_error text text-danger"></div>
					<br>
					<button type="submit" id="doctor_forgetUsername_btn" style="width: 300px; margin-left: 20px; height: 48px;" class="btn btn-success btn-block"><span
							class="glyphicon glyphicon-off"></span> Send Link
					</button>
<!--					<a href="--><?//= site_url('login'); ?><!--" style="width: 302px; height: 44px; margin-left: 20px; border: 1px solid #56BB6D; background-color: #fff; color: #56BB6D; margin-bottom: 48px;font-weight: bold;border-radius: 14px;margin-top: 25px;" class="btn btn-block"> Go Back-->
<!--					<a href="#" id="go_back" class=" js-ubea-nav-toggle"-->
<!--					   data-toggle="modal" data-target="#forget-password">Go Back-->
<!--					</a>-->
					<a href="#" id="goBackToForgetPassword" class="js-ubea-nav-toggle btn btn-block"
					   data-toggle="modal" data-target="#forget-password" style="padding: 14px 30px; width: 300px; height: 48px; margin-left: 20px; border: 1px solid #56BB6D; background-color: #fff; color: #56BB6D; margin-bottom: 48px;font-weight: bold;border-radius: 14px;">Go Back
					</a>
				</form>
			</div>
		</div>
	</div>
</div>

<!--Forget Password Modal-->
<div class="myModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="forgetPassword">
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
					<div class="form-group" style="margin-bottom: 5px;">
						<label style=" margin-left: 20px" for="doctor_email"> Email</label>
						<input type="email" class="form-control" id="doctor_email" name="email"  style="height: 40px; width: 300px; margin-left: 20px">
					</div>
					<span id="email_result_send_link" style="padding-left: 30px;"> </span>
					<div class="doctor_login_error text text-danger"></div>
					<br>
					<button type="submit" id="doctor_email_send_link" style="width: 300px; margin-left: 20px;height: 48px;" class="btn btn-success btn-block"><span
							class="glyphicon glyphicon-off"></span> Send Link
					</button>
<!--					<a href="--><?//= site_url('login'); ?><!--" style="width: 302px; height: 44px; margin-left: 20px; border: 1px solid #56BB6D; background-color: #fff; color: #56BB6D; margin-bottom: 48px;font-weight: bold;border-radius: 14px;margin-top: 25px;" class="btn btn-block"> Go Back-->
<!--					</a>-->

					<a href="#" id="goBackToForgetPassword-2" class="js-ubea-nav-toggle btn btn-block"
					   data-toggle="modal" data-target="#forget-password" style="padding: 14px 30px; width: 300px; height: 48px; margin-left: 20px; border: 1px solid #56BB6D; background-color: #fff; color: #56BB6D; margin-bottom: 48px;font-weight: bold;border-radius: 14px;">Go Back
					</a>

				</form>
			</div>
		</div>
	</div>
</div>


<!-- Link Sent Model -->
<div class="myModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="link-sent">
	<div style="margin-top:100px;" class="modal-dialog modal-size"> 
        <div  class="modal-content">
            <div class="modal-header" >
                <div class="modal-title">
                    Link Sent
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
              <p style="color:black;text-align: center;">A link was sent to your associated email kindly check that and reset your password/username.</p>
                    <br>
                  <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_kwaiqmk8.json"  background="transparent"  speed="1"  style="height: 250px;"    autoplay></lottie-player>
                    <br>
                    <a href="" id="sentLinkToLogin" data-toggle="modal" data-target="#doctor_login_modal" style="width: 300px; border-radius: 15px; margin-left: 20px" class="btn btn-success btn-block"><span
                           class="glyphicon glyphicon-off"></span>Go to Login
                    </a>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
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
<!-- Reset Password/Change Password -->
    <div class="myModal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="reset-password-modal"> 
        <div class="modal-dialog modal-size" style="margin-top: 85px;background-color: white;border-radius: 8px;">
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
                        <label style=" margin-left: 20px" for="doctor_username">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password_available" name="confirm_password"
                                style="height: 40px; width: 300px; margin-left: 20px" required>
                        <span style="margin-left:20px;" id="confirm_password_result"></span> 
                    </div>   
                    <div class="confirm_password_result text text-danger"></div>

                    <button type="submit" onclick="matchPassword()" style="width: 300px; margin-left: 20px" id="reset_btn" class="btn btn-success btn-block"><span
                           class="glyphicon glyphicon-off"></span> Submit
                    </button>
                    <div align="center" style="margin-top:40px; text-align:center;">
                        <a href="" id="goBackToLoginFromReset" data-toggle="modal" data-target="#doctor_login_modal"  class='text-success'>Back to Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>








<!--Script-->
<script type="text/javascript">
    var redirecting = "<?php echo "Redirecting" ?>";
    var adminUrl    = "<?php echo site_url();?>admin/";
    var doctorUrl  = "<?php echo site_url();?>doctor/";
    var plannerUrl  = "<?php echo site_url();?>treatmentplanner/";
    var loginUrl    = "<?php echo site_url('login/chkUserLogin'); ?>";
</script>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/front/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/front/js/jquery.validate.min.js"></script>

<!--CustomLoginJs-->
<script src="<?php echo base_url(); ?>assets/custom/js/login.js"></script>
<!-- jQuery Easing -->
<script src="<?= base_url(); ?>assets/front/js/query.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>assets/front/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?= base_url(); ?>assets/front/js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="<?= base_url(); ?>assets/front/js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="<?= base_url(); ?>assets/front/js/jquery.countTo.js"></script>
<!-- Flexslider -->
<script src="<?= base_url(); ?>assets/front/js/jquery.flexslider-min.js"></script>
<!-- Magnific Popup -->
<script src="<?= base_url(); ?>assets/front/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url(); ?>assets/front/js/magnific-popup-options.js"></script>

<script src="<?= base_url(); ?>assets/front/js/jquery.fancybox.min.js"></script>
<script src="<?= base_url(); ?>assets/front/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url(); ?>assets/front/js/isotope.pkgd.min.js"></script>
<!-- Main -->
<script src="<?= base_url(); ?>assets/front/js/main.js?1623583478"></script>
<script src="<?= base_url(); ?>assets/custom/script.js"></script>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<script type="text/javascript">
    var site_url       = '<?php echo site_url(); ?>';
</script>


<script>

	$(function(){
		$(document).ready(function(){

		   	// Get Query String Vale
		   	let params = (new URL(document.location)).searchParams;
			let name = params.get("redirecturl");
			let userId = params.get("userId");
			let userEmail = params.get("userEmail");
			$('#user_id').val(userId);
			$('#user_email').val(userEmail);

		   	// var currentUrl = window.location.href; 
		   	// var userLogin = "<?php echo site_url('login'); ?>";
		   	// var userReg    = "<?php echo site_url('register');?>";

		   	if(name == 'login'){
		        $("#doctor_login_modal").modal('toggle');
		   	}else if(name == 'register'){
		        $("#register-modal").modal('toggle');
		   	}else if(name == 'reset_password'){
		   		$("#doctor_login_modal").modal('toggle');
		   	}else if(name == 'linkSent'){
		   		$("#link-sent").modal('toggle');
		   	}else if(name == 'change-password'){
		   		$("#reset-password-modal").modal('toggle');
		   	}

		});
	});
	
	// $( "#doctor_login_button" ).on('shown', function(){
	//     alert("I want this to appear after the modal has opened!");
	//      $("#doctor_login_modal").modal('toggle');
	//     $( ".js-ubea-nav-toggle " ).removeClass( "active" );
	// });

	// Login Model
	$('#doctor_login_modal').on('hidden.bs.modal', function () {
    	$("#ubea-offcanvas").css("z-index","1901");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    $('#doctor_login_modal').on('shown.bs.modal', function(e) {
    	$("#ubea-offcanvas").css("z-index","-1");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

	// Register Model
    $('#register-modal').on('hidden.bs.modal', function () {
    	$("#ubea-offcanvas").css("z-index","1901");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    $('#register-modal').on('shown.bs.modal', function(e) {
    	$("#ubea-offcanvas").css("z-index","-1");
        $(".js-ubea-nav-toggle").removeClass("active");
    });


	// Forget Model
    $('#forget_password').on('hidden.bs.modal', function () {
    	$("#ubea-offcanvas").css("z-index","1901");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    $('#forget_password').on('shown.bs.modal', function(e) {
    	$("#ubea-offcanvas").css("z-index","-1");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

	// Reset Model
    $('#reset-password-modal').on('hidden.bs.modal', function () {
    	$("#ubea-offcanvas").css("z-index","1901");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    $('#reset-password-modal').on('shown.bs.modal', function(e) {
    	$("#ubea-offcanvas").css("z-index","-1");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    // UserName Model
    $('#forgetUserName').on('hidden.bs.modal', function () {
    	$("#ubea-offcanvas").css("z-index","1901");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    $('#forgetUserName').on('shown.bs.modal', function(e) {
    	$("#ubea-offcanvas").css("z-index","-1");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    // Forget Password Model
    $('#forgetPassword').on('hidden.bs.modal', function () {
    	$("#ubea-offcanvas").css("z-index","1901");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    $('#forgetPassword').on('shown.bs.modal', function(e) {
    	$("#ubea-offcanvas").css("z-index","-1");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    // Forget Password Model
    $('#forget-password').on('hidden.bs.modal', function () {
    	$("#ubea-offcanvas").css("z-index","1901");
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    $('#forget-password').on('shown.bs.modal', function(e) {
    	$("#ubea-offcanvas").css("z-index","-1");
        $(".js-ubea-nav-toggle").removeClass("active");
    });



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
							var base_url = '<?php echo base_url();?>'
                            $modal.modal('hide');
							var url = base_url+'assets/uploads/images/'+data;
                            $('#uploaded_image').attr('src', url);
							$('#pt_img_name').val(data);
                        }
                    });
                };
            });
        });

    });
</script>

<script>

	

    // $("#doctor_login_modal").on("hidden.bs.modal",function(){
    //     $("#forget_password").show();
    // });
    $('#register_modal').click(function() {
        $('#doctor_login_modal').modal('hide');
    });
    $('#forget_password').click(function() {
        // alert('yes');
        $('#doctor_login_modal').modal('hide');
    });
    $('#go_back').click(function() {
        // alert('yes');
        $('#forget_password').modal('hide');
    });
    $('#goBackToLogin').click(function() {
        $('#forget-password').modal('hide');
    });
    $('#goRegisterToLogin').click(function() {
        $('#register-modal').modal('hide');
    });
    $('#goBackToLoginFromReset').click(function() {
        $('#reset-password-modal').modal('hide');
    });
    $('#goBackToForgetPassword').click(function () {
        $('#forgetUserName').modal('hide');
    });
    $('#goBackToForgetPassword-2').click(function () {
        $('#forgetPassword').modal('hide');
    });

    $('#sentLinkToLogin').click(function () {
        $('#link-sent').modal('hide');
    });

    

    $("#nextForgetType").click(function() {
        var type = $('input[name="forgot_username"]:checked').val();
        // var type = $('#forgot_username').val();

		if(type == 'username'){
            $('#forget-password').modal('hide');
            $('#forgetUserName').modal('toggle');
		}else if(type == 'password'){
            $('#forget-password').modal('hide');
            $('#forgetPassword').modal('toggle');
		}else{
			alert('Select the Option');
		}
        // alert(type);

    });

    // Register Input Field Show
    function showInputField(){
    	$('#business_executive').hide();
    	$('#reference_person').show();
    	  $( "#reference_person" ).first().animate({
		    bottom: 20
		  }, {
		    duration: 1000,
		    step: function( now, fx ){
		      $( "#reference_person" ).slice( 1 ).css( "left", now );
		    }
		  });
    }

     // Register Input Field Show
    function showSelectField(){
    	$('#reference_person').hide();
    	$('#business_executive').show();
    	 // $("#reference_person").css({"margin-top":"0px"});




    	  $( "#business_executive" ).first().animate({
		    bottom: 20
		  }, {
		    duration: 1000,
		    step: function( now, fx ){
		      $( "#business_executive" ).slice( 1 ).css( "left", now );
		    }
		  });
    }


    $(document).ready(function(){
    	var value = 1;
	 	$.ajax({
            url:"<?php echo base_url();?>/register/getBusinessDeveloper/",
            type: 'POST',
            data: {"id":value},
            dataType: 'json',
            success: function(response) {
                 console.log(response);
             	
             	$('#business_developer').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });
             	$.each(response,function(index,data){
                    $('#business_developer').append('<option value="'+data['first_name']+'">'+data['first_name']+'</option>');

                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });
     });

    $('#isBillingAddressChecked').click(function() {


    	var billing_street_address = document.getElementById("billing_streetaddress").value;
    	var billing_zipcode = document.getElementById("billing_zipcode").value;
    	var billing_country_name =   $("#billing_country").find(':selected').val();
    	var billing_state_name =   $("#billing_state").find(':selected').val();
    	var billing_city_name =   $("#billing_city").find(':selected').val();

    	if($('input[name="same_billing_address"]').is(':checked'))
		{
        	

	  		$('#shipping_zipcode').val(billing_zipcode);
	  		$('#shipping_streetaddress').val(billing_street_address);
	  		$("#shipping_country option[value='"+billing_country_name+"']").attr("selected", true);
		  	
		  	if(billing_country_name){
		  		$.ajax({
	                url:"<?php echo base_url();?>/register/getEditStates/"+ billing_country_name,
	                type: 'POST',
	                data: {"name":billing_country_name},
	                dataType: 'json',
	                success: function(response) {
	                    console.log(response);

	                    // Add options
	                    $('#shipping_state').each(function() {
	                        if (this.selectize) {
	                            for(x=0; x < 10; ++x){
	                                this.selectize.addOption({value:x, text: x});
	                            }
	                        }
	                    });

	                    $.each(response,function(index,data){

	                    	$('#shipping_state').append('<option value="'+data['name']+'">'+data['name']+'</option>');
	                        
	                    });
	                    $("#shipping_state option[value='"+billing_state_name+"']").attr("selected", true);

	                },
	                error: function () {
	                    alert('Data Not Deleted');
	                }
	            });
		  	}

		  	if(billing_state_name){
		  		 $.ajax({
	                url:"<?php echo base_url();?>/register/getEditCities/"+ billing_state_name,
	                type: 'POST',
	                data: {"name":billing_state_name},
	                dataType: 'json',
	                success: function(response) {
	                    console.log(response);


	                     // Add options
	                    $('#shipping_city').each(function() {
	                        if (this.selectize) {
	                            for(x=0; x < 10; ++x){
	                                this.selectize.addOption({value:x, text: x});
	                            }
	                        }
	                    });

	                    $.each(response,function(index,data){

	                    	$('#shipping_city').append('<option value="'+data['name']+'">'+data['name']+'</option>');
	                        
	                    });
	                    $("#shipping_city option[value='"+billing_city_name+"']").attr("selected", true);

	                },
	                error: function () {
	                    alert('Data Not Deleted');
	                }
	            });
		  	} 
		}else
		{
          
  	  		$("#shipping_country option[value='"+billing_country_name+"']").attr("selected", false);
  	  		$("#shipping_state option[value='"+billing_state_name+"']").attr("selected", false);
  	  		$("#shipping_city option[value='"+billing_city_name+"']").attr("selected", false);

		}	  
	});

  

</script>

<script type="text/javascript">
	 function getBillingStates(id) {
        
        var country_name = id.options[id.selectedIndex].value;
        var country_id = $("#billing_country").find(':selected').attr('data-id');
        // alert(country_id);

      $.ajax({
            url:"<?php echo base_url();?>/register/getStates/"+ country_id,
            type: 'POST',
            data: {"id":country_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // $('#billing_state').empty();
                $('#billing_state').find('option').not(':first').remove();

                // Add options
                $('#billing_state').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('#billing_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                // alert('Data Not Deleted');
            }
        });

    }

    function getBillingCities(id) {
        var city_name = id.options[id.selectedIndex].value;
        var city_id = $("#billing_state").find(':selected').attr('data-id');
        // alert(city_id);

      $.ajax({
            url:"<?php echo base_url();?>/register/getCities/"+ city_id,
            type: 'POST',
            data: {"id":city_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // $('#billing_city').empty();
                $('#billing_city').find('option').not(':first').remove();

                // Add options
                $('#billing_city').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('#billing_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                // alert('Data Not Deleted');
            }
        });

    }

       function getShippingStates(id) {
        var country_name = id.options[id.selectedIndex].value;
        var country_id = $("#shipping_country").find(':selected').attr('data-id');
      // alert(country_id);
      $.ajax({
            url:"<?php echo base_url();?>/register/getStates/"+ country_id,
            type: 'POST',
            data: {"id":country_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);


                // $('#shipping_state').empty();
                $('#shipping_state').find('option').not(':first').remove();
                
                // $('#shipping_state').empty();

                // Add options
                $('#shipping_state').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('#shipping_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                // alert('Data Not Deleted');
            }
        });

    }

    function getShippingCities(id) {
       var city_name = id.options[id.selectedIndex].value;
        var city_id = $("#shipping_state").find(':selected').attr('data-id');
      // alert(city_id);
      $.ajax({
            url:"<?php echo base_url();?>/register/getCities/"+ city_id,
            type: 'POST',
            data: {"id":city_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // $('#shipping_city_s').html('');

                // $('#shipping_city').empty();
                $('#shipping_city').find('option').not(':first').remove();

                // $('#shipping_city').empty();

                // Add options
                $('#shipping_city').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('#shipping_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                // alert('Data Not Deleted');
            }
        });

    }
</script>
<script>  

   $('#password_available, #confirm_password_available').on('keyup', function () {
  if ($('#password_available').val() == $('#confirm_password_available').val()) {
   $('#confirm_password_result').html('<label class="text-success" style="color:green"><i class="fa fa-check" aria-hidden="true"></i>password Matched</label>'); 
	  } else {
	       $('#confirm_password_result').html('<label class="text-danger" style="color:red"><i class="fa fa-times" aria-hidden="true"></i>Password does not Matched</label>'); 
	  }
	});

</script>  

</body>
</html>
