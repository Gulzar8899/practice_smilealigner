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
<?php //echo site_url(); die(); ?>
<div id="page_content">
    <div id="page_content_inner">
        <br>
        <h1 class="headingSize patientMobile"><b>Edit Doctor</b></h1>
        <br>
        <div>
            <div class="md-card-content">
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="uk-alert uk-alert-danger" data-uk-alert="">
                            <a href="#" class="uk-alert-close uk-close"></a>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } if ($this->session->flashdata('success')) { ?>
                        
                    <script>jQuery(document).ready(function(){ w3_alert("<?php echo $this->session->flashdata('success'); ?>", "tick-green", "type"); });</script>
                        <!--<div class="uk-alert uk-alert-success" data-uk-alert="">
                            <a href="#" class="uk-alert-close uk-close"></a>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>-->
                    <?php } ?>

                <form method="POST" action="<?= site_url('admin/doctor/udpateDoctorData'); ?>" enctype="multipart/form-data">
                    <?php foreach($doctor_data as $doctorData): ?>
                        <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                        <input type="hidden" name="old_email" value="<?= $doctorData->email; ?>">
                        <input type="hidden" name="isPasswordAvailable" value="<?php if(!empty($doctorData->password)){ echo 0;}else{ echo 1;} ?>">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>First Name *</b></label>
                                            <input type="text" name="first_name" class="md-input input-border" placeholder="Enter First Name" value="<?= $doctorData->first_name; ?>" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3 ">
                                            <label class="label-p"><b>Last Name *</b></label>
                                            <input type="text" name="last_name" class="md-input input-border" placeholder="Enter Last Name" value="<?= $doctorData->last_name; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                 <div style="margin-bottom: 31px !important;" class="uk-form-row">
                                        <div class="uk-width-medium-1-2">
                                            <br>
                                            <label for="lastName" class="form-label"><b>Profile Picture</b></label>
                                            <br>
                                            <br>
                                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail">
                                                        <?php if($doctorData->profile_image!=''){ ?>
                                                            <img src="<?php echo base_url('assets/uploads/images/'. $doctorData->profile_image); ?>" style="width: 100% !important;" alt="user avatar"/>
                                                        <?php } else{ ?>
                                                            <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar"/>
                                                        <?php } ?>
                                                    </div>
                                            <div class="fileinput-exists thumbnail">
                                                <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar" id="uploaded_image"/>
                                            </div>
                                            <label for="lastName" class="form-label" style="position: absolute;width:200%;margin-top:25px;margin-left:15px;">
                                                <div class="user_avatar_controls">
                                                    <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput" style="float: left;"><i class="material-icons">&#xE5CD;</i></a>
                                                    <span class="btn-file" style="float: left;left:0px;">
                                                        <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                                        <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                                        <input type="file" name="pt_img" id="upload_image">
                                                        <input type="hidden" name="doctor_img_name" id="pt_img_name" value="">
                                                    </span>
                                                </div>    
                                                <!-- Upload Profile Photo -->
                                            </label>                                
                                        </div>
                                            <br>
                                            
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                 <div class="uk-form-row">
                                    <div class="uk-grid">

                                        <div class="uk-width-medium-1-3">
                                             <div class="uk-form-row parsley-row">
                                                <label for="gender" class="uk-form-label"><b>Gender</b><span class="req">*</span></label>
                                                <br>
                                                <br>
                                                <span class="icheck-inline">
                                                    <input type="radio" name="gender" value="male" id="val_radio_male" data-md-icheck required <?php if($doctorData->gender == 'male'){echo 'checked';} ?>/>
                                                    <label for="val_radio_male" class="inline-label">Male</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="radio" name="gender" id="val_radio_female" value="female" data-md-icheck <?php if($doctorData->gender == 'female'){echo 'checked';} ?>/>
                                                    <label for="val_radio_female" class="inline-label">Female</label>
                                                </span>
                                            </div>     
                                       </div>

                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Age</b></label>
                                            <input type="text" placeholder="Enter Age" name="age" class="md-input input-border" value="<?= $doctorData->age; ?>"/>
                                        </div>

                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>Email ID*</b></label>
                                            <input type="hidden" name="old_email" id="old_email" value="<?= $doctorData->email; ?>">
                                            <input type="text" placeholder="Enter Email" name="email" id="doctor_email_available" class="md-input input-border" value="<?= $doctorData->email; ?>" required/>
                                            <span class="" id="doctor_email_result"></span>

                                        </div>
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>Mobile No*</b></label>
                                            <input type="text" placeholder="Enter Mobile No" name="phone_number" class="md-input input-border" value="<?= $doctorData->phone_number; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                        <div class="uk-grid">
                                            <!--                                    <div class="uk-width-medium-1-10 shippingMobile">-->
                                            <!--                                        <input type="radio" name="shipping_address_radio" id="val_radio_female" data-md-icheck />-->
                                            <!--                                    </div>-->
                                            <div class="uk-width-medium-1-3 editDoctorSetting">
                                                <label class="label-p"><b>Password*</b></label>
                                                <input type="text" placeholder="Enter Password" name="password" class="md-input input-border"/>
                                            </div>


                                            <div class="uk-width-medium-1-3 ">
                                                <label class="label-p"><b>GST No</b></label>
                                                <input type="text" placeholder="Enter GST No" name="gst_no" class="md-input input-border" value="<?= $doctorData->gst_no; ?>" required/>
                                            </div>
                                        
                                        </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                       <div class="uk-width-medium-1-3" style="margin-top: 4px;">
                                            <label for="exampleFormControlFile1" class="label-p"><b>Select Refer By</b></label>
                                            <div class="uk-form-select uk-select-st" style="margin-top: 5px; padding: 9px 15px; width: 91%;" data-uk-form-select>
                                            <span id="refer_by_s">Select Refer By</span>
                                                <i class="uk-icon-caret-down" style="float: right; padding: 2px 5px; color: #C4C4C4;"></i>
                                                <select id="refer_by" name="refer_by" onchange="getReferByValue(this);">
                                                    <i class="uk-icon-caret-down"></i>
                                                    <option value="">Select Refer By</option>
                                                    <option value="Friends" <?= ($doctorData->refer_by == 'Friends')?'selected':'';?>>Friends</option>
                                                    <option value="Social Media" <?= ($doctorData->refer_by == 'Social Media')?'selected':'';?>>Social Media</option>
                                                    <option value="Business Executive" <?= ($doctorData->refer_by == 'Business Executive')?'selected':'';?>>Business Executive</option>
                                                    <option value="Others" <?= ($doctorData->refer_by == 'Others')?'selected':'';?>>Others</option>
                                                </select>
                                            </div>
                                       </div>
                                       
                                       <div class="uk-width-medium-1-3">
                                            <div id="reference_person_show" style="display:none;">
                                                <label class="label-p"><b>Refer Name</b></label>
                                                <input type="text" placeholder="Enter Refer Name" name="reference_person" id="reference_person" class="md-input input-border" value="<?= $doctorData->refer_text; ?>" />
                                           </div>
                                           <div id="business_executive_show" style="display:none; margin-top: 4px;">
                                                <label for="exampleFormControlFile1" class="label-p"><b>Select Business Executive</b></label>
                                                <input type="text" placeholder="Enter Refer Name" name="reference_person" id="reference_person" class="md-input input-border" value="<?= $doctorData->refer_text; ?>" />
                                                <div class="uk-form-select uk-select-st" style="margin-top: 5px; padding: 9px 15px; width: 91%;" data-uk-form-select>
                                                <span id="business_executive_s"></span>
                                                    <i class="uk-icon-caret-down" style="float: right; padding: 2px 5px; color: #C4C4C4;"></i>
                                                    <select id="business_executive" name="business_executive">
                                                        <i class="uk-icon-caret-down"></i>
                                                        <option value="">Select Business Executive </option>

                                                        <?php foreach($business_developer as $developer){?>
                                                             <option value="<?= $developer->first_name;?>" <?= ($doctorData->refer_text == $developer->first_name)?'selected':'';?>><?= $developer->first_name;?></option>
                                                       <?php } ?> 

                                                    </select>
                                                </div>
                                           </div>       
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                         <div class="uk-width-medium-1-1">
                                            <h4 class="" style="color:#6d3745;"><b>Default Billing Address*</b></h4>
                                        </div>
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                           <!--  <label class="label-p"><b>Billing Address*</b></label>
                                            <input type="text" placeholder="Enter Billing Address" name="billing_address" class="md-input input-border" value="<?= $doctorData->billing_address; ?>" required/> -->

                                            <div class="uk-grid uk-grid-small uk-margin-small-top address-bg">
                                                <li class="uk-width-1-6 flex-property">
                                                    <input type="radio" name="default_billing_address" id="val_radio_billing" value="1" data-md-icheck required <?php if($doctorData->default_billing_address == 1){echo 'checked';} ?>/>

                                                    <label for="val_radio_billing" class="inline-label" style="">
                                                    </label>
                                                </li>
                                                <li class="uk-width-4-6 r-pl">
                                                    <a data-uk-modal="{target:'#view-billing-model'}"      onclick="viewBillingAddress()" style="color: rgba(82, 87, 92, 1) !important;">
                                                      <h5 class="" style="margin: 0px;"><b><?= $doctorData->street_address; ?></b></h5>
                                                        <p style="margin: 0px; color:rgba(82, 87, 92, 1) !important;"><?= $doctorData->city.", ".$doctorData->state.", ".$doctorData->country.", ".$doctorData->zip_code; ?></span>
                                                        </p>
                                                    </a>
                                                 </li>
                                                <li class="uk-width-1-6 flex-property">
                                                    <span style=" display: flex; align-items: center; justify-content: center;">
                                                       <a onclick="editBillingAddress('<?= $doctorData->id; ?>')" data-uk-modal="{target:'#edit-billing-model'}">
                                                           <img src="<?php echo site_url('assets/images/edit-icon.svg'); ?>">
                                                       </a>
                                                    </span>
                                                </li>
                                            </div>
                                           
                                        </div>
                                      
                                    </div>
                                </div>

                            <div class="uk-form-row">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-4-6">
                                        <div class="uk-grid">
                                             <div class="uk-width-medium-1-1">
                                                <h4 class="" style="color:#6d3745;"><b>Shipping Address*</b></h4>
                                            </div>
                                            <?php foreach ($default_shipping_address as $key => $address): ?>
                                                <?php if($address['default_shipping_address'] == 1){ ?>
                                                <div class="uk-width-medium-1-2 editDoctorSetting">
                                                    <h4 class="" style="color:#6d3745; margin: 10px 0px 7px;"><b>Default Shipping Address</b></h4>

                                                    <div class="uk-grid uk-grid-small uk-margin-small-top address-bg">
                                                        <li class="uk-width-1-6 flex-property">
                                                         <input type="radio" name="default_shipping_address" id="val_radio_shipping_1" value="<?= $address['id'] ?>" data-md-icheck  <?php if($address['default_shipping_address'] == 1){echo 'checked';} ?>/>
                                                            <label for="val_radio_shipping_1" class="inline-label" style=""></label>
                                                        </li>
                                                        <li class="uk-width-4-6 r-pl">
                                                            <a data-uk-modal="{target:'#view-shipping-model'}" onclick="viewShippingAddress('<?= $address['id']; ?>')" style="color: rgba(82, 87, 92, 1) !important;">
                                                                <h5 class="" style="margin: 0px; color:rgba(82, 87, 92, 1) !important;"><b><?= $address['street_address']; ?></b></h5>
                                                                <p style="margin: 0px;"><?= $address['city'].", ".$address['state'].", ".$address['country'].", ".$address['zip_code']; ?></p>
                                                            </a>
                                                        </li>
                                                        <li class="uk-width-1-6 flex-property">
                                                            <span style="display: flex; align-items: center; justify-content: center;">
                                                            <a  onclick="editShippingAddress('<?= $address['id']; ?>')" data-uk-modal="{target:'#edit-shipping-model'}">
                                                                <img src="<?php echo site_url('assets/images/edit-icon.svg'); ?>">
                                                            </a>   
                                                            <!-- <?php if($key != 0){ ?>
                                                                &nbsp; &nbsp; &nbsp;
                                                                <a href="#" onclick="deleteShippingAddressByID('<?= $address['id']; ?>')">
                                                                    <img src="<?php echo site_url('assets/images/delete-icon-20.svg'); ?>">
                                                                </a>
                                                            <?php } ?> -->
                                                        </span>
                                                        </li>
                                                    </div>

                                                </div>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                            <?php  $count = count($shipping_address_except_default);  $total = $count-1;?>
                                            <?php $i=2; ?>
                                            <?php foreach ($shipping_address_except_default as $key => $address): ?>
                                                <?php if($address['default_shipping_address'] == 0){ ?>
                                                    <?php if($key < $total){ ?>
                                                    <div class="uk-width-medium-1-2 editDoctorSetting">
                                                        <h4 class="" style="color:#6d3745;  margin: 10px 0px 7px;"><b>Shipping Address <?= $i; ?></b></h4>
                                                        <div class="uk-grid uk-grid-small uk-margin-small-top address-bg">
                                                            <li class="uk-width-1-6 flex-property">
                                                                <input type="radio" name="default_shipping_address" id="val_radio_shipping_2" value="<?= $address['id'] ?>" data-md-icheck  <?php if($address['default_shipping_address'] == 1){echo 'checked';} ?>/>
                                                                <label for="val_radio_shipping_2" class="inline-label" ></label>
                                                            </li>
                                                            <li class="uk-width-4-6 r-pl">
                                                                <a  data-uk-modal="{target:'#view-shipping-model'}" onclick="viewShippingAddress('<?= $address['id']; ?>')" style="color: rgba(82, 87, 92, 1) !important;">
                                                                    <h5 class="" style="margin: 0px; color:rgba(82, 87, 92, 1) !important;"><b><?= $address['street_address']; ?></b></h5>
                                                                    <p style="margin: 0px;"><?= $address['city'].", ".$address['state'].", ".$address['country'].", ".$address['zip_code']; ?></p>
                                                                </a>
                                                            </li>
                                                            <li class="uk-width-1-6 flex-property r-pl">
                                                                <span style="display: flex; align-items: center; justify-content: center;">
                                                                <a  onclick="editShippingAddress('<?= $address['id']; ?>')" data-uk-modal="{target:'#edit-shipping-model'}">
                                                                    <img src="<?php echo site_url('assets/images/edit-icon.svg'); ?>">
                                                                </a>
                                                                    &nbsp; 
                                                                    <a  onclick="deleteShippingAddressByID('<?= $address['id']; ?>')">
                                                                        <img src="<?php echo site_url('assets/images/delete-icon-20.svg'); ?>">
                                                                    </a>
                                                                </span>
                                                            </li>
                                                        </div>

                                                    </div>
                                                    <?php } ?>                                           
                                                    <?php if($total == $key){ ?>
                                                    <div class="uk-width-medium-3-6 editDoctorSetting">
                                                        <div class="uk-grid">
                                                            <h4 class="" style="color:#6d3745; margin: 10px 0px 7px;"><b>Shipping Address <?= $i; ?></b></h4>
                                                            <div class="uk-width-medium-5-6">

                                                                <div class="uk-grid uk-grid-small uk-margin-small-top address-bg">
                                                                    <li class="uk-width-1-6 flex-property">
                                                                    <input type="radio" name="default_shipping_address" id="val_radio_shipping_3" value="<?= $address['id'] ?>" data-md-icheck  <?php if($address['default_shipping_address'] == 1){echo 'checked';} ?>/>
                                                                        <label for="val_radio_shipping_3" class="inline-label" ></label>
                                                                    </li>
                                                                    <li class="uk-width-4-6 r-pl">
                                                                     <a  data-uk-modal="{target:'#view-shipping-model'}" onclick="viewShippingAddress('<?= $address['id']; ?>')" style="color: rgba(82, 87, 92, 1) !important;">
                                                                            <h5 class="" style="margin: 0px; color:rgba(82, 87, 92, 1) !important;"><b><?= $address['street_address']; ?></b></h5>
                                                                            <p style="margin: 0px;"><?= $address['city'].", ".$address['state'].", ".$address['country'].", ".$address['zip_code']; ?></p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="uk-width-1-6 flex-property r-pl">
                                                                        <span style="display: flex; align-items: center; justify-content: center;">
                                                                    <a onclick="editShippingAddress('<?= $address['id']; ?>')" data-uk-modal="{target:'#edit-shipping-model'}">
                                                                        <img src="<?php echo site_url('assets/images/edit-icon.svg'); ?>">
                                                                    </a>
                                                                        &nbsp; 
                                                                        <a href="#" onclick="deleteShippingAddressByID('<?= $address['id']; ?>')">
                                                                            <img src="<?php echo site_url('assets/images/delete-icon-20.svg'); ?>">
                                                                        </a>
                                                                    </span>
                                                                    </li>
                                                                </div>

                                                                
                                                            </div>
                                                            <div class="uk-width-medium-1-6" style="padding-left:10px;">
                                                                <div class="add-address">
                                                                    <a  style="display: flex; align-items: center; justify-content: center;" data-uk-modal="{target:'#add-shipping-model'}">
                                                                        <img src="<?php echo site_url('assets/images/plus-icon.svg'); ?>">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            <?php if($count == 0){ ?>
                                                <div class="uk-width-medium-1-4" style="padding: 33px 0px 0px 10px;">
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-2">
                                                            <div class="add-address">
                                                                <a  style="display: flex; align-items: center; justify-content: center;" data-uk-modal="{target:'#add-shipping-model'}">
                                                                    <img src="<?php echo site_url('assets/images/plus-icon.svg'); ?>">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-1">
                                <br>
                                <button type="submit" id="update_doctor_btn" name="submit" class="md-btn md-btn-primary editDoctorMobile submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#">Update</button>
                                <a href="<?= site_url('admin/doctors'); ?>" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#" id="cancelBtn">Cancel</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>

<div class="modal uk-modal" id="modal" >
   <div id="modal-container" class="uk-modal-container" uk-modal>
      <div class="uk-modal-dialog" style="padding: 14px;">
         <div class="modal-dialog modal-size">
            <div  class="modal-content">
               <div class="modal-header" style="height:26px;
                  margin-bottom: 10px;
                  border-bottom: 1px solid #e5e5e5;
                  ">
                  <div class="modal-title">
                     <div class="" style="display:flex; justify-content: space-between;">
                        Crop Image
                     </div>
                     <br><br>
                  </div>
               </div>
               <div class="modal-body">
                  <div class="uk-grid">
                     <div class="uk-width-2-3">
                        <img src="" id="sample_image" />
                     </div>
                     <div class="uk-width-1-3">
                        <div class="preview"></div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer" style="text-align: right;
                  border-top: 1px solid #e5e5e5;  margin-top: 15px;   padding: 15px 0px 0px;">
                  <button type="button" id="crop" class="btnBack" style="    background: #805046;
                     color: #fff;
                     border: 2px solid #805046 !important;     padding: 8px 30px;">Crop</button>
                  <button type="button" id="cropClose" class="btnBack" style="    background: #805046;
                     color: #fff;
                     border: 2px solid #805046 !important;     padding: 8px 30px;" data-dismiss="modal">Cancel</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<!--ADD SHIPPING ADDRESS MODEL-->
<!-- <div class="uk-modal" id="modal_header_footer">
    <div class="uk-modal-dialog">

        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h2 class="text-center"><b>Add New Address</b></h2>
                    </div>
                </div>
                <div class="modal-body">

                    <form method="POST" action="<?= site_url('admin/Doctor/addNewAddress'); ?>">
                        <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">

                        <div class="uk-grid">
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <label class="label-p"><b>Add New Address</b></label>
                                    <input type="text" name="new_address" placeholder="Enter Address" class="md-input input-border" value="" />
                                </div>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Close">
                            </div>
                            <div class="uk-width-1-2 pr-0">
                                <button class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit" name="next" id="next">Done</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--END ADD SHIPPING ADDRESS MODEL-->


<!--ADD SHIPPING ADDRESS MODEL-->
<div class="uk-modal" id="add-shipping-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h4 class="primary-color"><b>Add Shipping Address</b></h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('admin/Doctor/addShippingAddress'); ?>">
                        <input type="hidden" id="add_doctorID" name="doctorID" value="<?= $doctorData->id; ?>">
                        
                         <div class="uk-form-row">
                            <div class="uk-grid">
                                
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Street Address*</b></label>
                                    <input type="text" name="shipping_streetaddress" class="md-input input-border" placeholder="Enter Street Address" required/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                     <label for="exampleFormControlFile1">
                                        <b>Country*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_country" class="shipping_country" onChange="getShippingStates(this);">
                                            <option>Select</option>
                                            <?php foreach($countries as $country): ?>
                                                <option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>"><?= $country->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="exampleFormControlFile1">
                                        <b>State*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;" class="shipping_state_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_state" class="shipping_state" onChange="getShippingCities(this);">
                                            <option>Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                     <label for="exampleFormControlFile1">
                                        <b>City*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;" class="shipping_city_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_city" class="shipping_city">
                                            <option>Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Post Code*</b></label>
                                    <input type="text" name="shipping_zipcode" class="md-input input-border" placeholder="Enter Post Code" required/>
                                </div>
                            </div>
                        </div>



                        <br>
                        <br>

                        <div class="viewButtoMobile uk-flex-s uk-flex-end" style="justify-content: end;">
                           <!--  <div  class=" mobileDBESetting">
                                <a  class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deleteDoctorByID('<?= $doctorData->id;  ?>');">Delete</a>
                            </div> -->
                            <div class="uk-flex-s">
                                <div class="uk-margin-small-right">
                                   <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;">
                                </div>
                                <div class="">
                                  <button style="padding-left: 30px !important; padding-right: 30px !important; border-radius: 8px;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit" name="next" id="next">Add</button>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END ADD SHIPPING ADDRESS MODEL-->

<!--View SHIPPING ADDRESS MODEL-->
<div class="uk-modal" id="view-shipping-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h4 class="primary-color"><b>View Shipping Address</b></h4>
                    </div>
                </div>
                <div class="modal-body">

                    <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>Street Address</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                            <p id="view-shipping-streetAddress"></p>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>Country</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                            <p id="view-shipping-country"></p>
                        </div>
                    </div>
                      <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>State</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                            <p id="view-shipping-state"></p>
                        </div>
                    </div>
                      <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>City</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                            <p id="view-shipping-city"></p>
                        </div>
                    </div>
                      <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>Post Code</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                            <p id="view-shipping-zipcode"></p>
                        </div>
                    </div>

                     <div class="viewButtoMobile uk-flex-s uk-flex-end" style="justify-content: end;">
                        <div class="uk-flex-s">
                            <div class="uk-margin-small-right">
                               <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;">
                            </div>
                           
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!--END View SHIPPING ADDRESS MODEL-->

<!--EDIT SHIPPING ADDRESS MODEL-->
<div class="uk-modal" id="edit-shipping-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h2 class="text-center"><b>Edit Shipping Address</b></h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('admin/Doctor/updateShippingAddress/'); ?>">
                        <input type="hidden" id="doctorID" name="doctorID" value="<?= $doctorData->id; ?>">
                        <input type="hidden" id="shippingID" name="shippingID" value="">
                        
                         <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <h3 class="" style="color:#6d3745;"><b>Shipping Address*</b></h3>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Street Address*</b></label>
                                    <input type="text" id="shipping_streetaddress" name="shipping_streetaddress" class="md-input input-border" placeholder="Enter Street Address" required/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                     <label for="exampleFormControlFile1">
                                        <b>Country*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;" id="edit_shipping_country_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_country" id="edit_shipping_country" onChange="getEditShippingStates(this);">
                                                <option>Select</option>

                                            <?php foreach($countries as $country): ?>
                                                <option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>"><?= $country->name; ?></option>
                                            <?php endforeach; ?>
                                            
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="exampleFormControlFile1">
                                        <b>State*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;" id="edit_shipping_state_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_state" id="edit_shipping_state" onChange="getEditShippingCities(this);">
                                                <option>Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                     <label for="exampleFormControlFile1">
                                        <b>City*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;" id="edit_shipping_city_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_city" id="edit_shipping_city">
                                                <option>Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Post Code*</b></label>
                                    <input type="text" name="shipping_zipcode" id="shipping_zipcode" class="md-input input-border" placeholder="Enter Post Code" required/>
                                </div>
                            </div>
                        </div>



                        <br>
                        <br>

                       <div class="" id="edit-modal-btn">
                         
                       </div>
                        <!-- <div class="viewButtoMobile uk-flex-s uk-flex-between">
                                <div  class=" mobileDBESetting">
                                    <a  class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deleteDoctorByID('<?= $doctorData->id;  ?>');">Delete</a>
                                </div>
                                <div class="uk-flex-s">
                                    <div class="uk-margin-small-right">
                                       <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;">
                                    </div>
                                    <div class="">
                                        <a class="md-btn editbtnBackground btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('admin/doctor/editDoctor/').$doctorData->id; ?>">Update</a>
                                    </div>
                                </div>
                            </div>   -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END EDIT SHIPPING ADDRESS MODEL-->



<!--EDIT BILLING ADDRESS MODEL-->
<div class="uk-modal" id="edit-billing-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h2 class="text-center"><b>Edit Billing Address</b></h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('admin/Doctor/updateBillingAddress/'); ?>">
                        <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                        
                         <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <h3 class="" style="color:#6d3745;"><b>Billing Address*</b></h3>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Street Address*</b></label>
                                    <input type="text" id="billing_streetaddress" name="billing_streetaddress" value="" class="md-input input-border" placeholder="Enter Street Address" required/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                     <label for="exampleFormControlFile1">
                                        <b>Country*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span id="edit_billing_country_s" style="float: left;"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="billing_country" id="edit_billing_country" onChange="getEditBillingStates(this);">
                                                <option>Select</option>
                                            <?php foreach($countries as $country): ?>
                                                <option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>"><?= $country->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="exampleFormControlFile1">
                                        <b>State*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span id="edit_billing_state_s" style="float: left;" ></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="billing_state"  id="edit_billing_state" onChange="getEditBillingCities(this);">
                                           <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                     <label for="exampleFormControlFile1">
                                        <b>City*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span  id="edit_billing_city_s" style="float: left;"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="billing_city" id="edit_billing_city">
                                                <option>Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Post Code*</b></label>
                                    <input type="text" name="billing_zipcode" value="<?= $doctorData->zip_code; ?>" class="md-input input-border" placeholder="Enter Post Code" required/>
                                </div>
                            </div>
                        </div>



                        <br>
                        <br>

                        <div class="viewButtoMobile">
                            <div class="uk-flex-s" style="justify-content: end;">
                                <div class="uk-margin-small-right">
                                   <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;">
                                </div>
                                <div class="">
                                     <button style="padding-left: 22px !important; padding-right: 22px !important; border-radius: 8px;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit" name="next" id="next">Update</button>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END EDIT BILLING ADDRESS MODEL-->

<!--VIEW BILLING ADDRESS MODEL-->
<div class="uk-modal" id="view-billing-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h4 class="primary-color"><b>View Billing Address</b></h4>
                    </div>
                </div>
                   <div class="modal-body">

                    <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>Street Address</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                            <p><?= $doctorData->street_address; ?></p>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>Country</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                              <p><?= $doctorData->country; ?></p>
                        </div>
                    </div>
                      <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>State</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                              <p><?= $doctorData->state; ?></p>
                        </div>
                    </div>
                      <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>City</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                              <p><?= $doctorData->city; ?></p>
                        </div>
                    </div>
                      <div class="uk-grid">
                        <div class="uk-width-medium-1-4">
                            <h4><b>Post Code</b></h4>
                        </div>
                         <div class="uk-width-medium-3-4">
                              <p><?= $doctorData->zip_code; ?></p>
                        </div>
                    </div>

                     <div class="viewButtoMobile uk-flex-s uk-flex-end" style="justify-content: end;">
                        <div class="uk-flex-s">
                            <div class="uk-margin-small-right">
                               <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;">
                            </div>
                           
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!--VIEW EDIT BILLING ADDRESS MODEL-->


<!-- OLD CROP MODEL -->
<!--             <div class="modal uk-modal" id="modal">
                <div class="uk-modal-dialog">
                    
                <div class="modal-dialog modal-size"> 
                    <div  class="modal-content">
                        <div class="modal-header" >
                            <div class="modal-title">
                                Crop Image
                                <br><br>
                            </div>
                        </div>
                        <div class="modal-body">
                            <img src="" id="sample_image" />
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div> 
                        </div>
                        <div class="modal-footer">
                                        <button type="button" id="crop" class="btnBack">Crop</button>
                                        <button type="button" class="btnBack" data-dismiss="modal">Cancel</button>
                                    </div>
                    </div>
                </div>
                </div>
            </div> -->
        </div>
    </div>
</div>


<script type="text/javascript">

    $(".modal").on("hidden.bs.modal", function(){
        $(".modal-body1").html("");
    });


    // function getShippingStates(id) {
    //     var country_name = id.options[id.selectedIndex].value;
    //     var country_id = $("#shipping_country").find(':selected').attr('data-id');
    //   // alert(country_id);
    //   $.ajax({
    //         url:"<?php echo base_url();?>/admin/doctor/getStates/"+ country_id,
    //         type: 'POST',
    //         data: {"id":country_id},
    //         dataType: 'json',
    //         success: function(response) {
    //             console.log(response);


    //             $('#shipping_city_s').html('Select');
    //             $('#shipping_city').find('option').not(':first').remove();


    //             $('#shipping_state_s').html('Select');
    //             $('#shipping_state').find('option').not(':first').remove();
                

    //             // Add options
    //             $('#shipping_state').each(function() {
    //                 if (this.selectize) {
    //                     for(x=0; x < 10; ++x){
    //                         this.selectize.addOption({value:x, text: x});
    //                     }
    //                 }
    //             });

    //             // $('#shipping_state').append('<option>Select</option>');
    //             $.each(response,function(index,data){
    //                 $('#shipping_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
    //             });

    //         },
    //         error: function () {
    //             alert('Data Not Deleted');
    //         }
    //     });

    // }

    // function getShippingCities(id) {
    //    var city_name = id.options[id.selectedIndex].value;
    //     var city_id = $("#shipping_state").find(':selected').attr('data-id');
    //   // alert(city_id);
    //   $.ajax({
    //         url:"<?php echo base_url();?>/admin/doctor/getCities/"+ city_id,
    //         type: 'POST',
    //         data: {"id":city_id},
    //         dataType: 'json',
    //         success: function(response) {
    //             console.log(response);

    //             // $('#shipping_city_s').html('');
    //             // $('#shipping_city').empty();

    //             $('#shipping_city_s').html('Select');
    //             $('#shipping_city').find('option').not(':first').remove();


    //             // Add options
    //             $('#shipping_city').each(function() {
    //                 if (this.selectize) {
    //                     for(x=0; x < 10; ++x){
    //                         this.selectize.addOption({value:x, text: x});
    //                     }
    //                 }
    //             });

    //             $.each(response,function(index,data){
    //                 $('#shipping_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
    //             });

    //         },
    //         error: function () {
    //             alert('Data Not Deleted');
    //         }
    //     });

    // }

    function editShippingAddress(shipping_id) {
        $.ajax({
            url:"<?php echo base_url();?>/admin/doctor/editAddress/"+ shipping_id,
            type: 'POST',
            data: {"id":shipping_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // alert('Image is deleted successfully now');

                $('#shipping_streetaddress').val(response.street_address);

                $('#edit_shipping_country_s').html('');
                $('#edit_shipping_country').find('option[value="' + response.country + '"]').attr("selected", "selected");
                $('#edit_shipping_country_s').html($("#edit_shipping_country :selected").text());

                $('#shippingID').val(response.id);
                $('#shipping_zipcode').val(response.zip_code);


                var country_name = response.country;
                var state_name = response.state;
                var city_name = response.city;

                if(country_name){
                    firstAjax().success(secondAjax);
                }

                 function firstAjax() {
                    return $.ajax({
                        url:"<?php echo base_url();?>/admin/doctor/getEditStates/"+ country_name,
                        type: 'POST',
                        data: {"name":country_name},
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);

                            // $('#edit_shipping_state_s').html('Select');
                            // $('#edit_shipping_state').find('option').not(':first').remove();
                            
                            // $('#shipping_state').empty();

                            // Add options
                            $('#edit_shipping_state').each(function() {
                                if (this.selectize) {
                                    for(x=0; x < 10; ++x){
                                        this.selectize.addOption({value:x, text: x});
                                    }
                                }
                            });

                            $.each(response,function(index,data){
                                if(state_name == data['name'] ){
                                    $('#edit_shipping_state_s').html('');
                                    $('#edit_shipping_state_s').html(data['name']);
                                    $('#edit_shipping_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'" selected="selecshippi'+data['name']+'</option>');
                                }else{
                                    $('#edit_shipping_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                                }
                            });

                        },
                        error: function () {
                            alert('Data Not Deleted');
                        }
                    });
                }

                function secondAjax() {
                    if(state_name){
                     $.ajax({
                        url:"<?php echo base_url();?>/admin/doctor/getEditCities/"+ state_name,
                        type: 'POST',
                        data: {"name":state_name},
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);

                            // $('#shipping_city_s').html('');
                            // $('#edit_billing_city_s').html('Select');
                            // $('#edit_billing_city').find('option').not(':first').remove();

                            // $('#shipping_city').empty();

                            // Add options
                            $('#edit_shipping_city').each(function() {
                                if (this.selectize) {
                                    for(x=0; x < 10; ++x){
                                        this.selectize.addOption({value:x, text: x});
                                    }
                                }
                            });

                            $.each(response,function(index,data){
                                if(city_name == data['name'] ){
                                    $('#edit_shipping_city_s').html('');
                                    $('#edit_shipping_city_s').html(data['name']);
                                    $('#edit_shipping_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'" selected="selected">'+data['name']+'</option>');
                                }else{
                                    $('#edit_shipping_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                                }
                            });

                        },
                        error: function () {
                            alert('Data Not Deleted');
                        }
                    });
                }
                }    


                $('#edit-modal-btn').empty();
                if(response.default_shipping_address == 1){
                     $('#edit-modal-btn').append('<div class="uk-flex-s" style="justify-content: end;"> <div class="uk-margin-small-right"> <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;"> </div><div class=""> <button style="padding-left: 22px !important; padding-right: 22px !important; border-radius: 8px;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit">Update</button> </div></div></div>');
                }else{
                     $('#edit-modal-btn').append('<div class="viewButtoMobile uk-flex-s uk-flex-between"> <div class=" mobileDBESetting"> <a class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deleteShippingAddressByID('+response.id+')">Delete</a> </div><div class="uk-flex-s"> <div class="uk-margin-small-right"> <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;"> </div><div class=""> <button style="padding-left: 22px !important; padding-right: 22px !important; border-radius: 8px;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit">Update</button> </div></div></div>');
                }
               
            },
            error: function () {
                alert('Data Not Inserted');
            }
        });
    }

    function getEditShippingStates(id) {
        var country_name = id.options[id.selectedIndex].value;
        var country_id = $("#edit_shipping_country").find(':selected').attr('data-id');
      // alert(country_id);
      $.ajax({
            url:"<?php echo base_url();?>/admin/doctor/getStates/"+ country_id,
            type: 'POST',
            data: {"id":country_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);


                // $('#edit_shipping_city_s').html('Select');
                // $('#edit_shipping_city').find('option').not(':first').remove();

                $('#edit_shipping_state_s').html('Select');
                $('#edit_shipping_state').find('option').not(':first').remove();
                
                // $('#shipping_state').empty();

                // Add options
                $('#edit_shipping_state').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('#edit_shipping_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }

    function getEditShippingCities(id) {
       var city_name = id.options[id.selectedIndex].value;
        var city_id = $("#edit_shipping_state").find(':selected').attr('data-id');
      // alert(city_id);
      $.ajax({
            url:"<?php echo base_url();?>/admin/doctor/getCities/"+ city_id,
            type: 'POST',
            data: {"id":city_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // $('#shipping_city_s').html('');
                // $('#edit_shipping_city').empty();

                $('#edit_shipping_city_s').html('Select');
                $('#edit_shipping_city').find('option').not(':first').remove();


                // Add options
                $('#edit_shipping_city').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('#edit_shipping_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }
 

    function viewShippingAddress(shipping_id) {
        // alert(shipping_id);
        var modal = UIkit.modal("#view-shipping-model");
        $.ajax({
            url:"<?php echo base_url();?>/admin/doctor/viewShippingAddress/"+ shipping_id,
            type: 'POST',
            data: {"id":shipping_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // alert('Image is deleted successfully now');
                $('#view-shipping-streetAddress').html(response.street_address);
                $('#view-shipping-country').html(response.country);
                $('#view-shipping-state').html(response.state);
                $('#view-shipping-city').html(response.city);
                $('#view-shipping-zipcode').html(response.zip_code);
                // modal.show();
            },
            error: function () {
                alert('Data Not Inserted');
            }
        });
    }


    // EDIT BILLING ADDRESS JS
    function editBillingAddress(doctor_id) {
        // alert(doctor_id);
        $.ajax({
            url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorProfile/"+ doctor_id,
            type: 'POST',
            data: {"id":doctor_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                $('#billing_streetaddress').val(response.street_address);
                    
                $('#edit_billing_country_s').html('');
                $('#edit_billing_country').find('option[value="' + response.country + '"]').attr("selected", "selected");
                $('#edit_billing_country_s').html($("#edit_billing_country :selected").text());

                // $('#shippingID').val(response.id);
                $('#billing_zipcode').val(response.zip_code);

                var country_name = response.country;
                var state_name = response.state;
                var city_name = response.city;

                if(country_name){
                    firstAjax().success(secondAjax);
                }

                 function firstAjax() {
                    return $.ajax({
                        url:"<?php echo base_url();?>/admin/doctor/getEditStates/"+ country_name,
                        type: 'POST',
                        data: {"name":country_name},
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);

                            // $('#edit_shipping_state_s').html('Select');
                            // $('#edit_shipping_state').find('option').not(':first').remove();
                            
                            // $('#shipping_state').empty();

                            // Add options
                            $('#edit_billing_state').each(function() {
                                if (this.selectize) {
                                    for(x=0; x < 10; ++x){
                                        this.selectize.addOption({value:x, text: x});
                                    }
                                }
                            });

                            $.each(response,function(index,data){
                                if(state_name == data['name'] ){
                                    $('#edit_billing_state_s').html('');
                                    $('#edit_billing_state_s').html(data['name']);
                                    $('#edit_billing_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'" selected="selected">'+data['name']+'</option>');
                                }else{
                                    $('#edit_billing_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                                }
                            });

                        },
                        error: function () {
                            alert('Data Not Deleted');
                        }
                    });
                }

                function secondAjax() {
                    if(state_name){
                     $.ajax({
                        url:"<?php echo base_url();?>/admin/doctor/getEditCities/"+ state_name,
                        type: 'POST',
                        data: {"name":state_name},
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);

                            // $('#shipping_city_s').html('');
                            // $('#edit_billing_city_s').html('Select');
                            // $('#edit_billing_city').find('option').not(':first').remove();

                            // $('#shipping_city').empty();

                            // Add options
                            $('#edit_billing_city').each(function() {
                                if (this.selectize) {
                                    for(x=0; x < 10; ++x){
                                        this.selectize.addOption({value:x, text: x});
                                    }
                                }
                            });

                            $.each(response,function(index,data){
                                if(city_name == data['name'] ){
                                    $('#edit_billing_city_s').html('');
                                    $('#edit_billing_city_s').html(data['name']);
                                    $('#edit_billing_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'" selected="selected">'+data['name']+'</option>');
                                }else{
                                    $('#edit_billing_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                                }
                            });

                        },
                        error: function () {
                            alert('Data Not Deleted');
                        }
                    });
                }
                }           

                // if(response.country == 'pakistan'){
                //     $('#billing_country').append('<option value="pakistan" selected="selected">Pakistan</option><option value="india">India</option><option value="bangladesh">Bangladesh</option><option value="japan">Japan</option><option value="china">China</option>');
                //     $('#billing_country_s').html('');
                //     $('#billing_country_s').html(response.country);
                // }



            },
            error: function () {
                alert('Data Not Deleted');
            }
        });
    }


    // GET EDIT BILLING ADDRESS
    function getEditBillingStates(id) {
        var country_name = id.options[id.selectedIndex].value;
        var country_id = $("#edit_billing_country").find(':selected').attr('data-id');
        // alert(country_id);
      $.ajax({
            url:"<?php echo base_url();?>/admin/doctor/getStates/"+ country_id,
            type: 'POST',
            data: {"id":country_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);



                $('#edit_billing_city_s').html('Select');
                $('#edit_billing_city').find('option').not(':first').remove();

                $('#edit_billing_state_s').html('Select');
                $('#edit_billing_state').find('option').not(':first').remove();
                
                // $('#shipping_state').empty();

                // Add options
                $('#edit_billing_state').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('#edit_billing_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }

    function getEditBillingCities(id) {
        var city_name = id.options[id.selectedIndex].value;
        var city_id = $("#edit_billing_state").find(':selected').attr('data-id');
        // alert(city_id);
      $.ajax({
            url:"<?php echo base_url();?>/admin/doctor/getCities/"+ city_id,
            type: 'POST',
            data: {"id":city_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // $('#shipping_city_s').html('');
                // $('#edit_billing_city').empty();

                $('#edit_billing_city_s').html('Select');
                $('#edit_billing_city').find('option').not(':first').remove();


                // Add options
                $('#edit_billing_city').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('#edit_billing_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }


    function viewBillingAddress() {
        var modal = UIkit.modal("#view-billing-model");
        modal.show();
    }
</script>

<script type="text/javascript">

    function getReferByValue(value){
        var refer_by = value.options[value.selectedIndex].value;
        // alert(refer_by);
        if(refer_by == 'Business Executive'){
            $('#reference_person_show').hide();
            $('#business_executive_show').show();
        }else{
            $('#business_executive_show').hide();
            $('#reference_person_show').show();
        }

    }
    
    $(document).ready(function(){

        var e = document.getElementById("refer_by");
        var refer_by = e.value;

        if(refer_by == 'Business Executive'){
            $('#reference_person_show').hide();
            $('#business_executive_show').show();
        }else if(refer_by == 'Friends' || refer_by == 'Social Media' || refer_by == 'Others'){
            $('#business_executive_show').hide();
            $('#reference_person_show').show();
        }else{
            $('#reference_person_show').hide();
            $('#business_executive_show').hide();
        }

    });

</script>
<script>
$(document).ready(function(){

      var modal = UIkit.modal("#modal");
    var image = document.getElementById('sample_image');

    var cropper;
    $('#cropClose').on('click',function(){
      modal.hide();
    });

    $('#upload_image').on('change',function(event){
        var files = event.target.files;

        var done = function(url){
            image.src = url;
            modal.show(); 
          
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

modal.on({
    'show.uk.modal': function(){ 
        //alert('pp');
        cropper = new Cropper(document.getElementById('sample_image'), {
            aspectRatio: 1,
            viewMode: 3,
            preview:'.preview'
        });
    },
    'hide.uk.modal': function(){
        cropper.destroy();
        cropper = null;
    }
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
                    url: site_url + "admin/doctor/doctorimgCrop",
                    method:'POST',
                    data:{image:base64data},
                    success:function(data)
                    {
                        modal.hide();
                        var url = base_url+'assets/uploads/images/'+data;
                        $('#uploaded_image').attr('src', url);
                        $('#pt_img_name').val(data);
                    }
                });
            };
        });
    });
    
});

 /* check Add Doctor Email availabilty */
    $('#doctor_email_available').on('keyup',function(){  
        var email = $('#doctor_email_available').val();  
        var old_email = $('#old_email').val();
        if(email != '') {  
            $.ajax({  
                    url:site_url+'register/check_email_avalibility',  
                    method:"POST",  
                    data:{email:email},  
                    success:function(data){  
                        obj1 = JSON.parse(data);  
                        if(obj1.success==0){
                            if(email == old_email){
                                $('#doctor_email_result').html('<label class="text-success" style="color:green !important;padding: 0px 12px;"><i class="fa fa-check" aria-hidden="true"></i>You entered old Email</label>'); 
                                $('#update_doctor_btn').prop('disabled', false);
                            }else{
                                $('#doctor_email_result').html('<label class="text-danger" style="color:red !important;padding: 0px 12px;"><i class="fa fa-times" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                                $('#update_doctor_btn').prop('disabled', true);
                            }
                        }
                        else{
                            $('#doctor_email_result').html('<label class="text-success" style="color:green !important;padding: 0px 12px;"><i class="fa fa-check" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                            $('#update_doctor_btn').prop('disabled', false);
                        }                             
                    }  
            });  
        }  
    });  



</script>
