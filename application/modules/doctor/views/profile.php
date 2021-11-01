<style type="text/css">
   .doctor-module-profile .billing_address .md-input-wrapper{
   padding-top: 0px !important;
   }
   .doctor-module-profile .billing_address .md-input-wrapper textarea{
   height: 100px !important;
   }
   .doctor-module-profile .default-address .iradio_md{
   margin-top: 15px !important;
   }
</style>
<div id="page_content">
   <div id="page_content_inner" class="doctor-module-profile">
      <br>
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
                    
       
        <?php foreach($doctor_data as $doctorData): ?>
        <form method="POST" action="<?= site_url('doctor/updateProfile'); ?>">
       
        <div class="uk-grid uk-margin-medium-top">

            <div class="uk-width-medium-1-1 uk-margin-medium-bottom">
                <h1 class="patientMobile"><b>Profile for <?= $doctorData->first_name; ?></b></h1>
            </div>
            <!-- Left Section -->
            <div class="uk-width-medium-1-2">

                 <div class="md-card cardMobile">
                    <div class="md-card-content">
                            <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                     <h3 class="heading_a themeTextColor marginHeadingProfile"><b>User Details and Preferences</b></h3>
                                </div>
                                <div class="uk-width-medium-1-1 uk-margin-medium-top">
                                    
                                     <div class="uk-form-row">                                    
                                        <label><b>Login and Primary Email</b></label>
                                        <br>
                                        <input type="text" name="email" class="md-input input-border" value="<?= $doctorData->email; ?>" disabled/>
                                     </div>
                                </div>

                                <div class="uk-width-medium-1-1 uk-margin-small-top">
                                     <div class="uk-form-row">
                                        <label><b>Passsword</b></label>
                                        <br>
                                        <input type="password" name="password" class="md-input input-border"  value="<?= $doctorData->password; ?>" />
                                     </div>
                                </div>

                                <div class="uk-width-medium-1-1">

                                    <div class="uk-grid" style="margin-top: 15px; align-items: center;" >
                                        <div class="uk-width-medium-2-6">
                                            <label for="switch_demo_1" class="inline-label">Notification Alert</label>
                                        </div>
                                        <div class="uk-width-medium-4-6">
                                            <div>
                                                <right>
                                                 <!--<input type="checkbox" data-switchery checked id="switch_demo_1" />-->
                                                 <div class="switch-field" style="background-color: #eeeeee;">
                                                    <input type="radio" id="radio-one" name="notification_alert" value="on" <?php if($doctorData->notification_alert == 'on'){ echo "checked";} ?>/>
                                                    <label for="radio-one">ON</label>
                                                    <input type="radio" id="radio-two" name="notification_alert" value="off" <?php if($doctorData->notification_alert == 'off'){ echo "checked";} ?>/>
                                                    <label for="radio-two">OFF</label>
                                                 </div>
                                              </right>
                                          </div>
                                        </div>
                                    </div>
                               </div>

                                   <div class="uk-width-medium-1-1 uk-margin-medium-top uk-flex uk-flex-right">
                                        <button type="submit" name="submit" style="color:white; width: 30%;" class=" addNewDoctorProfile md-btn  themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="#">Update</button>
                                  </div>
                            </div>
                    </div>
                </div>
                

                <br>
                <br>

                <div class="md-card cardMobile">
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                 <h3 class="heading_a themeTextColor marginHeadingProfile"><b>Bank Details</b></h3>
                            </div>
                            <div class="uk-width-2-5 uk-margin-medium-top">
                                 <h4><b>Account Holder Name</b></h4>
                            </div>
                            <div class="uk-width-3-5 uk-margin-medium-top">
                                <p class="m-0p"> Smile Aligners</p>
                            </div>
                            <div class="uk-width-2-5 mt-20p">
                                 <h4><b>Account Number</b></h4>
                            </div>
                            <div class="uk-width-3-5 mt-20p">
                                <p class="m-0p"> 2345678</p>
                            </div>
                            <div class="uk-width-2-5 mt-20p">
                                 <h4><b>IFSC</b></h4>
                            </div>
                            <div class="uk-width-3-5 mt-20p">
                                <p class="m-0p"> SBIN2345678</p>
                            </div>
                             <div class="uk-width-2-5 mt-20p">
                                 <h4><b>Account Type</b></h4>
                            </div>
                            <div class="uk-width-3-5 mt-20p">
                                <p class="m-0p"> Savings</p>
                            </div>
                             <div class="uk-width-2-5 mt-20p">
                                 <h4><b>Bank</b></h4>
                            </div>
                            <div class="uk-width-3-5 mt-20p">
                                <p class="m-0p"> SBI</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="uk-width-medium-1-2">
                <div class="md-card cardMobile">
                    <div class="md-card-content">
                        <div class="uk-grid uk">
                            <div class="uk-width-medium-1-1 uk-flex uk-flex-middle">
                                 <h4 class="mb-3p" style="color:#6d3745;"><b>Billing Address</b></h4> &nbsp;&nbsp;&nbsp;
                                 <span class="add-address-modal-btn"><img src="<?php echo base_url('assets/images/black-plus-icon.svg'); ?>">&nbsp;&nbsp;<a class="black-txt-clr" href="" data-uk-modal="{target:'#add-billing-model'}">Add</a></span>
                            </div>


                            <!-- BILLING ADDRESS -->
                            <div class="uk-width-medium-1-1 uk-margin-medium-top">
                                <!-- <h4 class="" style="color:#6d3745;"><b>Default Billing Address</b></h4> -->
                                <div class="uk-grid">
                                    <?php foreach ($default_billing_address as $key => $address): ?>
                                        <?php if($address['default_billing_address'] == 1){ ?>
                                        <div class="uk-width-medium-1-1 editDoctorSetting">
                                            <h4 class="address-heading-size"><b>Default Billing Address</b></h4>

                                            <div class="uk-grid uk-grid-small uk-margin-small-top address-bg">
                                                <li class="uk-width-1-6 flex-property">
                                                 <input type="radio" name="default_billing_address" id="val_radio_billing_1" value="<?= $address['id'] ?>" data-md-icheck  <?php if($address['default_billing_address'] == 1){echo 'checked';} ?>/>
                                                    <label for="val_radio_billing_1" class="inline-label" style=""></label>
                                                </li>
                                                <li class="uk-width-4-6 r-pl">
                                                    <a data-uk-modal="{target:'#view-billing-model'}" onclick="viewShippingAddress('<?= $address['id']; ?>')" style="color: rgba(82, 87, 92, 1) !important;">
                                                        <h5 class="" style="margin: 0px; color:rgba(82, 87, 92, 1) !important;"><b><?= $address['street_address']; ?></b></h5>
                                                        <p style="margin: 0px;"><?= $address['city'].", ".$address['state'].", ".$address['country'].", ".$address['zip_code']; ?></p>
                                                    </a>
                                                </li>
                                                <li class="uk-width-1-6 flex-property">
                                                    <span style="display: flex; align-items: center; justify-content: center;">
                                                    <a  onclick="editBillingAddress('<?= $address['id']; ?>')" data-uk-modal="{target:'#edit-billing-model'}">
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
                                </div>
                            </div>

                             <?php $i=2; ?>
                            <?php foreach ($billing_address_except_default as $key => $address): ?>
                            <?php if($address['default_billing_address'] == 0){ ?>
                                <div class="uk-width-medium-1-1 uk-margin-small-top">
                                    <!-- <h4 class="" style="color:#6d3745;"><b>Default Billing Address</b></h4> -->
                                    <div class="uk-grid">
                                       
                                            <div class="uk-width-medium-1-1 editDoctorSetting">
                                                <h4 class="address-heading-size"><b> Billing Address <?= $i; ?></b></h4>

                                                <div class="uk-grid uk-grid-small uk-margin-small-top address-bg">
                                                    <li class="uk-width-1-6 flex-property">
                                                     <input type="radio" name="default_billing_address" id="val_radio_billing_1" value="<?= $address['id'] ?>" data-md-icheck  <?php if($address['default_billing_address'] == 1){echo 'checked';} ?>/>
                                                        <label for="val_radio_billing_1" class="inline-label" style=""></label>
                                                    </li>
                                                    <li class="uk-width-4-6 r-pl">
                                                        <a data-uk-modal="{target:'#view-billing-model'}" onclick="viewShippingAddress('<?= $address['id']; ?>')" style="color: rgba(82, 87, 92, 1) !important;">
                                                            <h5 class="" style="margin: 0px; color:rgba(82, 87, 92, 1) !important;"><b><?= $address['street_address']; ?></b></h5>
                                                            <p style="margin: 0px;"><?= $address['city'].", ".$address['state'].", ".$address['country'].", ".$address['zip_code']; ?></p>
                                                        </a>
                                                    </li>
                                                    <li class="uk-width-1-6 flex-property">
                                                        <span style="display: flex; align-items: center; justify-content: center;">
                                                        <a  onclick="editBillingAddress('<?= $address['id']; ?>')" data-uk-modal="{target:'#edit-billing-model'}">
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
                                            
                                    </div>
                                </div>

                                <?php $i++; ?>
                            <?php } ?>
                            <?php endforeach; ?>
                            <!--END BILLING ADDRESS -->

                            <div class="uk-width-medium-1-1">
                                <hr class="" style="margin:40px 0px;">
                            </div>


                            <div class="uk-width-medium-1-1 uk-flex uk-flex-middle uk-margin-small-bottom">
                                 <h4 class="mb-3p" style="color:#6d3745;"><b>Shipping Address</b></h4> &nbsp;&nbsp;&nbsp;
                                 <span class="add-address-modal-btn"><img src="<?php echo base_url('assets/images/black-plus-icon.svg'); ?>">&nbsp;&nbsp;<a class="black-txt-clr" href="" data-uk-modal="{target:'#add-shipping-model'}">Add</a></span>
                            </div>

                            <!-- SHIpp ADDRESS -->
                            <?php foreach ($default_shipping_address as $key => $address): ?>
                            <?php if($address['default_shipping_address'] == 1){ ?>
                            <div class="uk-width-medium-1-1 editDoctorSetting uk-margin-small-top">
                                    <h4 class="address-heading-size"><b>Default Shipping Address</b></h4>

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

                            <?php $i=2; ?>
                            <?php foreach ($shipping_address_except_default as $key => $address): ?>
                            <?php if($address['default_shipping_address'] == 0){ ?>
                            <div class="uk-width-medium-1-1 editDoctorSetting">
                                    <h4 class="address-heading-size"><b>Shipping Address <?= $i; ?></b></h4>

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
                                <?php $i++; ?>

                                <?php } ?>
                            <?php endforeach; ?>
                            <!-- SHIpp ADDRESS -->



                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </form>
        <?php endforeach; ?>


   </div>
</div>


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
                    <form method="POST" action="<?= site_url('/Doctor/addShippingAddress'); ?>">
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
                                        <span style="float: left;" id="shipping_state_s"></span>
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
                                        <span style="float: left;" id="shipping_city_s"></span>
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
                    <form method="POST" action="<?= site_url('Doctor/updateShippingAddress/'); ?>">
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

<!--ADD SHIPPING ADDRESS MODEL-->
<div class="uk-modal" id="add-billing-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h4 class="primary-color"><b>Add Billing Address</b></h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('/Doctor/addBillingAddress'); ?>">
                        <input type="hidden" id="add_doctorID" name="doctorID" value="<?= $doctorData->id; ?>">
                        
                         <div class="uk-form-row">
                            <div class="uk-grid">
                                
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Street Address*</b></label>
                                    <input type="text" name="billing_streetaddress" class="md-input input-border" placeholder="Enter Street Address" required/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                     <label for="exampleFormControlFile1">
                                        <b>Country*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="billing_country" class="billing_country" onChange="getBillingStates(this);">
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
                                        <span style="float: left;" id="" class="billing_state_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="billing_state" class="billing_state" onChange="getBillingCities(this);">
                                            <option>Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                     <label for="exampleFormControlFile1">
                                        <b>City*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;" class="billing_city_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="billing_city" class="billing_city">
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
                                    <input type="text" name="billing_zipcode" class="md-input input-border" placeholder="Enter Post Code" required/>
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
                    <form method="POST" action="<?= site_url('Doctor/updateBillingAddress/'); ?>">
                        <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                        <input type="hidden" id="billingID" name="billingID" value="">

                        
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

<script type="text/javascript">

    
    // function getShippingStates(id) {
    //     var country_name = id.options[id.selectedIndex].value;
    //     var country_id = $("#shipping_country").find(':selected').attr('data-id');
    //   // alert(country_id);
    //   $.ajax({
    //         url:"<?php echo base_url();?>/doctor/getStates/"+ country_id,
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
    //         url:"<?php echo base_url();?>/doctor/getCities/"+ city_id,
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
            url:"<?php echo base_url();?>/doctor/editAddress/"+ shipping_id,
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
                        url:"<?php echo base_url();?>/doctor/getEditStates/"+ country_name,
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
                        url:"<?php echo base_url();?>/doctor/getEditCities/"+ state_name,
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
                     $('#edit-modal-btn').append('<div class="viewButtoMobile uk-flex-s uk-flex-between"> <div class=" mobileDBESetting"> <a class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deleteDoctorShippingAddressByID('+response.id+')">Delete</a> </div><div class="uk-flex-s"> <div class="uk-margin-small-right"> <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;"> </div><div class=""> <button style="padding-left: 22px !important; padding-right: 22px !important; border-radius: 8px;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit">Update</button> </div></div></div>');
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
            url:"<?php echo base_url();?>/doctor/getStates/"+ country_id,
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
            url:"<?php echo base_url();?>/doctor/getCities/"+ city_id,
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
            url:"<?php echo base_url();?>/doctor/editAddress/"+ shipping_id,
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
        alert(doctor_id);
        $.ajax({
            url:"<?php echo base_url();?>/doctor/editBillingAddress/"+ doctor_id,
            type: 'POST',
            data: {"id":doctor_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                $('#billing_streetaddress').val(response.street_address);
                    
                $('#edit_billing_country_s').html('');
                $('#edit_billing_country').find('option[value="' + response.country + '"]').attr("selected", "selected");
                $('#edit_billing_country_s').html($("#edit_billing_country :selected").text());

                $('#billingID').val(response.id);
                $('#billing_zipcode').val(response.zip_code);

                var country_name = response.country;
                var state_name = response.state;
                var city_name = response.city;

                if(country_name){
                    firstAjax().success(secondAjax);
                }

                 function firstAjax() {
                    return $.ajax({
                        url:"<?php echo base_url();?>/doctor/getEditStates/"+ country_name,
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
                        url:"<?php echo base_url();?>/doctor/getEditCities/"+ state_name,
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
        alert(country_id);
      $.ajax({
            url:"<?php echo base_url();?>/doctor/getStates/"+ country_id,
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
            url:"<?php echo base_url();?>/doctor/getCities/"+ city_id,
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