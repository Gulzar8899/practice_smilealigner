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

<div id="page_content">
    <div id="page_content_inner" class="page_content-p">
        <br>
        <br>
        <h1 class="heading_a headingSize uk-margin-bottom patientMobile"><b>Add New Patient</b></h1>
        <div class="uk-margin-large-bottom">
            <div class="md-card-content">
                <ul id="registration-step">
                    <li id="account" class="highlight">
                        <h2 class="themeTextColor stepSetting active"><b>Step 1</b>&nbsp;<span class="material-icons themeTextColor iconStepOne">arrow_right</span><hr></h2>
                    </li>
                    <li id="password"><h2 class="themeTextColor stepSetting"><b>Step 2</b>
                    &nbsp;<span class="material-icons themeTextColor iconStepOne">arrow_right</span><hr></h2></li>
                    <li id="general"><h2 class="themeTextColor stepSetting"><b>Step 3</b>&nbsp;<span class="material-icons themeTextColor iconStepOne">arrow_right</span><hr></h2></li>
                </ul>

                <form class="uk-form-stacked" name="frmRegistration" id="registration-form" method="post" action="<?= site_url('admin/patient/submitPatient'); ?>" enctype="multipart/form-data">

                <div id="account-field">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <label class="label-p" for="wizard_fullname"><b>Select Doctor</b><span class="req">*</span></label>
                            <select id="select_doctor" name="doctor_id" data-md-selectize>
                                <option value=""><b>Doctor</b></option>
                                   <?php foreach($doctor_data as $doctor){?>
                                     <option value="<?= $doctor->id;?>"><?= $doctor->first_name;?></option>
                                   <?php } ?>
                            </select>
                        </div>
                       
                      </div>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-2">
                            <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>First Name</b><span class="req">*</span></label><input type="text" name="pt_firstname" id="wizard_firstname" class="md-input demoInputBox  input-border" placeholder="First Name"><span class="md-input-bar"></span></div>
                            
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>Last Name</b><span class="req">*</span></label><input type="text" name="pt_lastname" id="wizard_lastname" required="" class="md-input demoInputBox  input-border" placeholder="Last Name"><span class="md-input-bar"></span></div>
                            
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                       
                        <div class="uk-width-medium-1-2">
                               <div class="uk-grid">
                                   <div class="uk-width-medium-1-2">
                                         <div class="uk-form-row parsley-row">
                                            <label for="gender" class="uk-form-label"><b>Gender</b><span class="req">*</span></label>
                                            <span class="icheck-inline">
                                                <input type="radio" name="pt_gender" value="male" id="val_radio_male" data-md-icheck required />
                                                <label for="val_radio_male" class="inline-label">Male</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="radio" name="pt_gender" id="val_radio_female" value="female" data-md-icheck />
                                                <label for="val_radio_female" class="inline-label">Female</label>
                                            </span>
                                        </div>     
                                   </div>
                                    <div class="uk-width-medium-1-2" style="padding-right: 0px;">
                                        <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>Age</b></label><input type="number" name="pt_age" id="wizard_fullname" class="md-input demoInputBox input-border" placeholder="Age"><span class="md-input-bar"></span></div>
                                    </div>

                               </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <!-- <div class="uk-input-group"> -->
                                <!-- <span class="uk-input-group-addon">
                                    
                                </span> -->
                                <label class="label-p" for="wizard_email"><b>Email ID</b></label>
                                <input type="text" class="md-input input-border"  placeholder="Email ID" name="pt_email" id="wizard_email"  />
                            <!-- </div> -->
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
                                        <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar"/>
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
                                                <input type="hidden" name="pt_img_name" id="pt_img_name" value="">
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
                    <div class="uk-grid">
                            <div class="uk-width-1-1">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>Images Intra Oral</b></div>
                                         <div class="panel-body">
                                               <input id="input-fa-1" name="images_intra_oral[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                        </div>
                                    </div>
                                 </div> 
                              </div>
                              <br>
                    <div class="uk-grid imageOpgSetting">
                    <div class="uk-width-1-1">
                       <div class="form-group alert-up-pd">
                         <div class="panel panel-default">
                             <div class="panel-heading"><b>Images OPG</b></div>
                                 <div class="panel-body">
                                       <input id="input-fa-2" name="images_opg[]" class="user_files_images" type="file" multiple="">
                                    </div>
                                </div>
                            </div>
                         </div> 
                      </div>          
                </div>


<div id="password-field" style="display:none;">


<div class="uk-grid imageOpgSetting">
    <div class="uk-width-1-1">
       <div class="form-group alert-up-pd">
         <div class="panel panel-default">
             <div class="panel-heading"><b>Lateral Ceph. Images</b></div>
                 <div class="panel-body">
                       <input id="input-fa-3" name="images_lateral_c[]" class="user_files_images" type="file" multiple="">
                    </div>
                </div>
            </div>
         </div> 
      </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2">
          <div class="uk-form-row parsley-row scanImpression">
              <label for="gender" class="uk-form-label"><b>Impressions</b></label>
              <label><input type="radio" name="pt_scan_impression" value="no"/>No</label>
              <label><input type="radio" name="pt_scan_impression" value="yes"/>Yes</label>
              <!-- <span class="">
                  <input type="radio" onclick="show1();" value="no" name="pt_scan_impression" id="" data-md-icheck required />
                  <label for="val_radio_male" class="inline-label">NO</label>
              </span> -->
             <!--  <span class="">
                  <input type="radio" onclick="show2();" value="yes" name="pt_scan_impression" id="" data-md-icheck />
                  <label for="val_radio_female" class="inline-label">Yes</label>
              </span> -->
          </div>
      </div>
    </div>
    
    <div id="div1" class="row imageOpgSetting hide">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="form-group alert-up-pd">
             <div class="panel panel-default">
                 <div class="panel-heading"><b>Scan/Impressions Images</b></div>
                     <div class="panel-body">
                           <input id="input-fa-4" name="scan_impression_img[]" class="user_files_images" type="file" multiple="">
                        </div>
                    </div>
                </div>
             </div> 
          </div>
        
    <div class="uk-grid imageOpgSetting">
        <div class="uk-width-1-1">
           <div class="form-group alert-up-pd">
             <div class="panel panel-default">
                 <div class="panel-heading"><b>Upload STL</b></div>
                     <div class="panel-body">
                           <input id="stlFiles" name="images_stl[]" class="user_files_images" type="file" multiple="">
                        </div>
                    </div>
                </div>
             </div> 
          </div>
     <div class="uk-grid">
        <div class="uk-width-1-1">
            <div class="parsley-row">
            <label class="label-p" for="exampleFormControlFile1"><b>Treatment Objective</b></label><br>
                <textarea placeholder="Treatment Objective" class="md-input input-border" name="pt_objective" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>
            </div>
        </div>
    </div>
        <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-3 uk-width-large-1-2">
             <label class="label-p" for="exampleFormControlFile1"><b>Referral Name</b></label>
            <select id="select_demo_1" name="pt_referal" data-md-selectize>
                <option value=""><b>Referral Name</b></option>
                   <?php foreach($business_developer as $developer){?>
                    <?php $developer_name = $developer->first_name." ".$developer->last_name; ?>
                     <option value="<?= $developer_name;?>"><?= $developer_name;?></option>
                   <?php } ?>
            </select>
        </div>
      </div>

        <div class="collapse uk-margin-medium-top" id="featuresData">
            <label for="exampleFormControlFile1"><b>Type of Treatment</b></label>
            <div class="row">
                <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                <?php foreach($treatment_data as $treatmentData): ?>
                    <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                        <input name="treatmentData[]" value="<?php echo $treatmentData->tr_name; ?>"  type="checkbox" id="<?php echo $treatmentData->tr_name; ?>" class="chk-col-green" multiple/>
                        <label class="label-grey uk-flex uk-flex-top" for="<?php echo $treatmentData->tr_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $treatmentData->tr_name; ?></label>
                    </div>
                <?php endforeach; ?>
                </div>
                <div id="show_other_treatment" style="display:none;">
                    <div class="col-md-8">
                    
                    </div>
                    <div class="col-md-2 other-input">
                        <input style="padding: 5px;" class="md-input input-border" id="other_type_treatment" name="other_type_of_treatment" type="text" placeholder="Enter Here" >
                    </div>
                </div>
            </div>
        </div>
        <br>
 
            <div class="collapse uk-margin-small-top" id="featuresData">
                <label for="exampleFormControlFile1"><b>Type of case:Malocclusion</b></label><br>
                <div class="row">
                    <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                    <?php foreach($treatment_case_data as $treatmentCaseData): ?>
                        <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                            <input name="treatmentCaseData[]" value="<?php echo $treatmentCaseData->case_name; ?>" type="checkbox" id="<?php echo $treatmentCaseData->case_name; ?>" class="chk-col-green" multiple/>
                            <label class="label-grey uk-flex uk-flex-top" for="<?php echo $treatmentCaseData->case_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $treatmentCaseData->case_name; ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="collapse uk-margin-small-top" id="featuresData">
                <label for="exampleFormControlFile1"><b>Arches to be treated</b></label><br>
                <div class="row">
                    <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                    <?php foreach($arch_data as $archData): ?>
                        <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                            <input name="archData[]" value="<?php echo $archData->arc_name; ?>" type="checkbox" id="<?php echo $archData->arc_name; ?>" class="chk-col-green" multiple/>
                            <label class="label-grey uk-flex uk-flex-top" for="<?php echo $archData->arc_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $archData->arc_name; ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
              <div class="uk-form-row parsley-row">
                  <label for="gender" class="uk-form-label uk-margin-medium-top"><b>IPR to be performed</b></label>
                  <span class="icheck-inline">
                      <input type="radio" value="0" name="ipr_performed" id="val_radio_male" data-md-icheck />
                      <label for="val_radio_male" class="inline-label">No</label>
                  </span>
                  <span class="icheck-inline">
                      <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck />
                      <label for="val_radio_female" class="inline-label">Yes</label>
                  </span>
              </div>
          </div>
        </div>

        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
              <div class="uk-form-row parsley-row">
                  <label for="gender" class="uk-form-label"><b>Attachment to be placed</b></label>
                  <span class="icheck-inline">
                      <input type="radio" value="0" name="attachment_placed" id="val_radio_male" data-md-icheck />
                      <label for="val_radio_male" class="inline-label">No</label>
                  </span>
                  <span class="icheck-inline">
                      <input type="radio" value="1" name="attachment_placed" id="val_radio_female" data-md-icheck />
                      <label for="val_radio_female" class="inline-label">Yes</label>
                  </span>
              </div>
          </div>
        </div>
         <div class="uk-grid treatmentPlan">
        <div class="uk-width-1-1">
            <div class="">
            <label for="exampleFormControlFile1" class="label-p"><b>Treatment Plan</b></label><br>
                <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                <textarea placeholder="Treatment Plan" class="md-input input-border" name="pt_treatment_plan" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>
            </div>
        </div>
    </div>
    <br>
    <br>

</div>

<div id="general-field" style="display:none;">
  
    <div class="row imageOpgSetting">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="form-group alert-up-pd">
             <div class="panel panel-default">
                 <div class="panel-heading"><b>Treatment Plan File</b></div>
                     <div class="panel-body">
                           <input id="input-fa-6" name="images_treatment_plan[]"  accept="application/pdf" class="user_files_images" type="file" multiple="">
                        </div>
                    </div>
                </div>
             </div> 
          </div>
    <div class="uk-grid">
         
        <div class="uk-width-medium-1-3 uk-width-large-1-2">
            <label for="exampleFormControlFile1" class="label-p"><b>Select Approval</b></label><br>

            <select id="select_demo_1" name="pt_approval" onChange="fieldController(this)" data-md-selectize>
            <option value=""><b>Approval</b></option>
           <option value="1">Yes</option>
           <option value="0" selected>No</option>
            </select>
        </div>
                      
    <div class="uk-width-medium-1-3 uk-width-large-1-2 approval-date" style="display:none;">
                    <label for="uk_dp_1" class="label-p"><b>Approval Date</b></label>

                <div class="uk-input-group" style="width:100%;">
                    <img style="position: absolute; top: 42%; right: 4%;" src="<?php echo base_url('/assets/images/calendar-icon.svg') ?>">
                    <input class="md-input input-border" name="pt_approval_date" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}" placeholder="Approval Date">
                </div>
    </div>
        </div>
        <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>Status</b><span class="req">*</span></label><input type="text" name="pt_custom_status" id="wizard_fullname" class="md-input input-border" placeholder="Status"><span class="md-input-bar"></span></div>
                    
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper"><label class="label-p" for="pt_case_type"><b>Type of Case</b><span class="req">*</span></label><input type="text" name="pt_case_type" id="wizard_fullname" class="md-input input-border" placeholder="Type of Case"><span class="md-input-bar"></span></div>
                    
                </div>
            </div>
             <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>No of Aligners</b><span class="req">*</span></label><input type="text" name="pt_aligners" id="wizard_fullname" class="md-input input-border" placeholder="No of Aligners"><span class="md-input-bar"></span></div>
                    
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>No of Aligners Dispatched</b><span class="req">*</span></label><input type="text" name="pt_aligners_dispatch" id="wizard_fullname" class="md-input input-border" placeholder="No of Aligners Dispatched"><span class="md-input-bar"></span></div>
                    
                </div>
            </div>

            <!--  <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper"><label for="wizard_fullname"><b>Cost of Plan</b><span class="req">*</span></label><input type="text" name="pt_cost_plan" id="wizard_fullname" required="" class="md-input"><span class="md-input-bar"></span></div>
                    
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper"><label for="wizard_fullname"><b>Total Amount Paid</b><span class="req">*</span></label><input type="text" name="pt_amount_paid" id="wizard_fullname" required="" class="md-input"><span class="md-input-bar"></span></div>
                    
                </div>
            </div> -->
             <div class="uk-grid">
                <div class="uk-width-medium-1-2" style="">
                    <label for="exampleFormControlFile1" class="label-p"><b>Select Shipping Address</b></label>

                    <div class="drop-multiaddress">

                    <div class="uk-form-select uk-select-st" style="" data-uk-form-select>

                    <span id="show-shipping">Select Shipping Address</span>
                         <i class="uk-icon-caret-down" style="float: right; padding: 2px 5px; color: #C4C4C4;"></i>
                        <select id="shipping_address" name="pt_shipping_details">
                            <i class="uk-icon-caret-down"></i>

                             <!--  <?php foreach($doctor_data as $doctor){?>
                                     <option value="<?= $doctor->id;?>" selected><?= $doctor->shipping_address;?></option>
                                   <?php } ?> -->

                            <!-- <option value="">Select Shipping Address</option> -->
<!--                            <option value="">...</option>-->
                        </select>
                    </div>
                    
                        <a class="drop-multiaddress-icon" style="background-color: #F2E6CC; padding: 10px 12px; border-radius: 22px;" data-uk-modal="{target:'#add-shipping-model'}" href="#">
                                <img src="<?php echo site_url('assets/images/plus-icon.svg'); ?>">
                            </a>
                        </div>
<!--                    <select id="shipping_address" name="pt_shipping_details" data-md-selectize>-->
<!--                        <option value=""><b>Select Doctor Shipping Details</b></option>-->
<!--                        <option value="1">Yes</option>-->
<!--                        <option value="0">No</option>-->
<!--                    </select>-->
<!--                    <div class="md-input-wrapper">-->
<!--                        <label for="wizard_fullname"><b>Shipping Address</b><span class="req">*</span></label>-->
<!--                        <input type="text" name="pt_shipping_details" id="wizard_fullname" required="" class="md-input">-->
<!--                        <span class="md-input-bar"></span>-->
<!--                    </div>-->
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>Billing Address</b><span class="req">*</span></label><input type="text" name="pt_billing_address" id="billing_address" class="md-input input-border" placeholder="Billing Address"><span class="md-input-bar"></span></div>
                    
                </div>
            </div>

        <div class="uk-grid dispatchDate">
              <div class="uk-width-medium-1-2">
              
                  <!-- <div class="uk-width-large-2-3 uk-width-1-1"> -->
                    <label for="exampleFormControlFile1" class="label-p"><b>Dispatch Date</b></label><br>
                      <div class="uk-input-group" style="width:100%;">
            

                          <!-- <span class="uk-input-group-addon"> -->
                           <!--  <i style="position: absolute; top: 42%; right: 4%;" class="uk-input-group-icon uk-icon-calendar">
                            </i> -->
                              <img style="position: absolute; top: 42%; right: 4%;" src="<?php echo base_url('/assets/images/calendar-icon.svg') ?>">
                      <!-- </span> -->
                          <!-- <label class="label-p" for="uk_dp_1"><b>Dispatch Date</b></label> -->
                          <input class="md-input input-border" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}" name="pt_dispatch_date" placeholder="Dispatch Date">
                      </div>
                  <!-- </div> -->
          </div>
        </div>
        <br>
        <br>
            <div class="uk-grid imageOpgSetting">
        <div class="uk-width-1-1">
           <div class="form-group alert-up-pd">
             <div class="panel panel-default">
                 <div class="panel-heading"><b>IPR</b></div>
                     <div class="panel-body">
                           <input id="input-fa-7" name="ipr_files[]" class="user_files_images" type="file" multiple="">
                        </div>
                    </div>
                </div>
             </div> 
          </div>
         <!--  <div class="row imageOpgSetting">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="form-group alert-up-pd">
             <div class="panel panel-default">
                 <div class="panel-heading"><b>Invoice</b></div>
                     <div class="panel-body">
                           <input id="input-fa-8" name="invoice_files[]" accept="application/pdf" class="user_files_images" type="file" multiple="">
                        </div>
                    </div>
                </div>
             </div> 
          </div> -->
</div>
<div>
<a class="md-btn md-btn-primary md-btn-wave-light cancleButton waves-effect waves-button waves-light buttonStyling" href="<?= site_url('admin/patient/patientListing') ?>">Cancel</a>
<input class="md-btn md-btn-primary btnNext" type="button" name="next" id="next" value="Next" >
<input class="md-btn md-btn-primary btnNext finishMobile" type="button" name="next" id="secondNext" value="Next">
<input class="md-btn md-btn-primary btnNext finishMobile" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
<input class="md-btn md-btn-primary btnBack finishMobileBack" type="button" name="back" id="back" value="Back" style="display:none;padding:4px 25px;float:right;">
</div>
</form>
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
                      <!-- <form method="POST" action="<?= site_url('admin/Doctor/addShippingAddress'); ?>"> -->
                    <form id="createShippingAddress">
                        <input type="hidden" id="assign_doctorID" name="doctorID" value="">
                        
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
                                        <span style="float: left;" id="shipping_country_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_country" id="shipping_country" onChange="getShippingStates(this);">
                                            <option>Select</option>
                                           
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
                                        <select name="shipping_state" id="shipping_state" onChange="getShippingCities(this);">
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
                                        <select name="shipping_city" id="shipping_city">
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

<!-- OLD CROP MODEL -->
<!-- <div class="modal uk-modal" id="modal">
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
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<!-- Shipping Modal With Ajax Call-->
<script type="text/javascript">
    
           //Add New Shipping Address From Patient
            $("#createShippingAddress").submit(function (event) {

                var doctor_id = $('#assign_doctorID').val();
                // alert(doctor_id);
                event.preventDefault(); //prevent the browser to execute default action. Here, it will prevent browser to be refresh
                $.ajax({
                    url: "<?php echo base_url('admin/Patient/addShippingAddress'); ?>", //backend url
                    data: $("#createShippingAddress").serialize(), //sending form data in a serialize way
                    type: "post",
                    async: false, //hold the next execution until the previous execution complete
                    dataType: 'json',
                    success: function (response) {
                        // console.log(response);
                        $('#shipping_address').empty();


                         // Get Doctor Multiple Shipping Address
                        if(doctor_id){
                          firstAjax().success(secondAjax);
                        }

                        // Get Doctor Default Shipping/Billing Address     
                        function firstAjax() {
                        return $.ajax({
                                url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorProfile/"+ doctor_id,
                                type: 'POST',
                                data: {"id":doctor_id},
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);

                                    var billing_address = response.street_address+', ' +response.city+', ' +response.state+', ' +response.country+', ' +response.zip_code;
                                    $('#billing_address').val(billing_address);
                                    // $('#show-shipping').html('');
                                    // $('#show-shipping').html(response.shipping_address);
                                    // $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                                },
                                error: function () {
                                    alert('Data Not Deleted');
                                }
                            });
                        }


                        // Get Doctor Multiple Shipping Address
                        function secondAjax() {
                            $.ajax({
                                url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorAddress/"+ doctor_id,
                                type: 'POST',
                                data: {"id":doctor_id},
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);

                                    // Remove options
                                    $('#shipping_address').find('option').not(':first').remove();

                                    // Add options
                                    $('#shipping_address').each(function() {
                                        if (this.selectize) {
                                            for(x=0; x < 10; ++x){
                                                this.selectize.addOption({value:x, text: x});
                                            }
                                        }
                                    });
                                    $.each(response,function(index,data){

                                    var shipping_address = data['street_address']+', ' +data['city']+', ' +data['state']+', ' +data['country']+', ' +data['zip_code'];


                                    if(data['default_shipping_address'] == 1){
                                        $('#show-shipping').html('');
                                        $('#show-shipping').html(shipping_address);
                                        // $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                                    }
                                    $('#assign_doctorID').val(data['doctor_id']);
                                    $('#shipping_address').append('<option value="'+data['id']+'">'+shipping_address+'</option>');


                                        // $('#assign_doctorID').val(data['doctor_id']);
                                        // $('#shipping_address').append('<option data-value="'+data['id']+'" class="option" data-selectable>'+data['shipping_address']+'</option>');
                                    });

                                    $('#shipping_country_s').html('Select');
                                    $('#shipping_state_s').html('Select');
                                    $('#shipping_city_s').html('Select');
                                },
                                error: function () {
                                    alert('Data Not Deleted');
                                }
                            });
                        }



                        // Hide Shipping Modal
                        UIkit.modal('#add-shipping-model').hide();
                        $('#createShippingAddress')[0].reset(); //reset form
                        // alert('Successfully inserted');
                    },
                    error: function ()
                    {
                        alert("error"); //error occurs
                    }
                });
            });
</script>
<!-- END Shipping Modal With Ajax Call-->

<script>
  function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
function validate() {
    // alert('validate');
    var output = true;

    var pt_firstname = $('#wizard_firstname').val();
    var pt_lastname = $('#wizard_lastname').val();
    var pt_email = $('#wizard_email').val();

    if(!($("#val_radio_male").val()) || !($("#val_radio_male").val())){
        var pt_gender = $('#val_radio_male').val();
    }else{
        var pt_gender = $('#val_radio_female').val();
    }

    $(".registration-error").html('');
    if($("#account-field").css('display') != 'none') {
        if(pt_firstname && pt_lastname && pt_gender) {
            output = true;
        }else{
            output = false;
        }   
    }

    // if($("#password-field").css('display') != 'none') {
    //     if(!($("#user-password").val())) {
    //         output = false;
    //         $("#password-error").html("required");
    //     }   
    //     if(!($("#confirm-password").val())) {
    //         output = false;
    //         $("#confirm-password-error").html("Not Matched");
    //     }   
    //     if($("#user-password").val() != $("#confirm-password").val()) {
    //         output = false;
    //         $("#confirm-password-error").html("Not Matched");
    //     }   
    // }
    return output;
}
$(document).ready(function() {
    $("#secondNext").hide();
    $("#next").click(function(){
         var output = validate();
         var select = document.getElementById('select_doctor');
         var value = select.options[select.selectedIndex].value;
        // alert(value);
        if(output) {
            var current = $(".highlight");
            var next = $(".highlight").next("li");
            if(next.length>0) {
                $("#"+current.attr("id")+"-field").hide();
                $("#"+next.attr("id")+"-field").show();
                $("#back").show();
                $("#finish").hide();
                $("#next").hide();
                $("#secondNext").show();
                $(".highlight").removeClass("highlight");
                next.addClass("highlight");
                next.find("h2").addClass("active");
                if($(".highlight").attr("id") == $("li").last().attr("id")) {
                    $("#next").hide();


                    // Get Doctor Multiple Shipping Address
                    if(value){
                        firstAjax().success(secondAjax);
                    }

                    // Get Doctor Default Shipping/Billing Address
                    function firstAjax() {
                        return $.ajax({
                            url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorProfile/"+ value,
                            type: 'POST',
                            data: {"id":value},
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);

                               var billing_address = response.street_address+', ' +response.city+', ' +response.state+', ' +response.country+', ' +response.zip_code;
                                $('#billing_address').val(billing_address);

                                // $('#show-shipping').html('');
                                // $('#show-shipping').html(response.shipping_address);
                                // $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                            },
                            error: function () {
                                alert('Data Not Deleted');
                            }
                        });
                    }

                    function secondAjax() {
                        $.ajax({
                            url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorAddress/"+ value,
                            type: 'POST',
                            data: {"id":value},
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                // Remove options
                                // $('#shipping_address').find('option').not(':first').remove();

                                // Add options
                                $('#shipping_address').each(function() {
                                    if (this.selectize) {
                                        for(x=0; x < 10; ++x){
                                            this.selectize.addOption({value:x, text: x});
                                        }
                                    }
                                });

                                $.each(response,function(index,data){


                                    // var shipping_address = data['street_address']+', ' +shipping_city+', ' +shipping_state;
                                    var shipping_address = data['street_address']+', ' +data['city']+', ' +data['state']+', ' +data['country']+', ' +data['zip_code'];

                                    if(data['default_shipping_address'] == 1){
                                        $('#show-shipping').html('');
                                        $('#show-shipping').html(shipping_address);
                                        // $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                                    }
                                    $('#assign_doctorID').val(data['doctor_id']);
                                    $('#shipping_address').append('<option value="'+data['id']+'">'+shipping_address+'</option>');

                                });

                            },
                            error: function () {
                                alert('Data Not Deleted');
                            }
                        });
                    }


                   


                    $("#finish").show();                
                }
            }
        }
        else{

            UIkit.notify({
                message : 'Name and Gender Field is required',
                status  : 'danger',
                timeout : 5000,
                pos     : 'top-right'
            });

        }
    });

    $("#secondNext").click(function(){
        // var output = validate();
        // if(output) {
        var current = $(".highlight");
        var next = $(".highlight").next("li");
        var inner = $(".highlight").find("h2");

        var select = document.getElementById('select_doctor');
        var value = select.options[select.selectedIndex].value;

            if(next.length>0) {

                $("#"+current.attr("id")+"-field").hide();
                $("#"+next.attr("id")+"-field").show();
                $("#back").show();
                $("#next").hide();
                $("#secondNext").hide();
                $("#finish").show();
                $(".highlight").removeClass("highlight");
                next.addClass("highlight");
                next.find("h2").addClass("active");



                if($(".highlight").attr("id") == $("li").last().attr("id")) {
                    $("#next").hide();
                // alert(value);
                    

                        if(value){
                            firstAjax().success(secondAjax);
                        }

                       // Get Doctor Default Shipping/Billing Address                        
                        function firstAjax() {
                        return $.ajax({
                                url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorProfile/"+ value,
                                type: 'POST',
                                data: {"id":value},
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);
                                    var billing_address = response.street_address+', ' +response.city+', ' +response.state+', ' +response.country+', ' +response.zip_code;
                                    $('#billing_address').val(billing_address);

                                    // $('#show-shipping').html('');
                                    // $('#show-shipping').html(response.shipping_address);
                                    // $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                                },
                                error: function () {
                                    alert('Data Not Deleted');
                                }
                            });
                        }

                        // Get Doctor Multiple Shipping Address
                        function secondAjax() {
                            $.ajax({
                                url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorAddress/"+ value,
                                type: 'POST',
                                data: {"id":value},
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);
                                    // Remove options
                                    // $('#shipping_address').find('option').not(':first').remove();

                                    // Add options
                                    $('#shipping_address').each(function() {
                                        if (this.selectize) {
                                            for(x=0; x < 10; ++x){
                                                this.selectize.addOption({value:x, text: x});
                                            }
                                        }
                                    });

                                    $.each(response,function(index,data){
                                        
                                        var shipping_address = data['street_address']+', ' +data['city']+', ' +data['state']+', ' +data['country']+', ' +data['zip_code'];

                                        if(data['default_shipping_address'] == 1){
                                            $('#show-shipping').html('');
                                            $('#show-shipping').html(shipping_address);
                                            // $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                                        }
                                        $('#assign_doctorID').val(data['doctor_id']);
                                        $('#shipping_address').append('<option value="'+data['id']+'">'+shipping_address+'</option>');
                                    });

                                },
                                error: function () {
                                    alert('Data Not Deleted');
                                }
                            });

                        }

                        // Get Country By Doctor ID
                        if(value){
                             $.ajax({
                                url:"<?php echo base_url();?>/admin/doctor/getAllCoutries/"+ value,
                                type: 'POST',
                                data: {"id":value},
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);
                                    $('#shipping_country_s').html('Select');
                                    $('#shipping_country').find('option').not(':first').remove();
                                    

                                    // Add options
                                    $('#shipping_country').each(function() {
                                        if (this.selectize) {
                                            for(x=0; x < 10; ++x){
                                                this.selectize.addOption({value:x, text: x});
                                            }
                                        }
                                    });

                                    // $('#shipping_state').append('<option>Select</option>');
                                    $.each(response,function(index,data){
                                        $('#shipping_country').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                                    });
                                },
                                error: function () {
                                    alert('Data Not Deleted');
                                }
                            });
                        }

                        

                    $("#finish").show();
                }
            }
        //}
    });
    
    $("#back").click(function(){ 
        var current = $(".highlight");
        var prev = $(".highlight").prev("li");
        if(prev.length>0) {
            $("#"+current.attr("id")+"-field").hide();
            $("#"+prev.attr("id")+"-field").show();
            $("#finish").hide();
            $(".highlight").removeClass("highlight");
            current.find("h2").removeClass("active");
            prev.addClass("highlight");
            prev.find("h2").addClass("active");
            if($(".highlight").attr("id") == "account"){
                $("#back").hide();
                $("#next").show();
                $("#secondNext").hide();
            }else if($(".highlight").attr("id") == "password"){
                $("#next").hide();
                $("#secondNext").show();
            }
            if($(".highlight").attr("id") == $("li").first().attr("id")) {
                $("#back").hide();          
            }
        }
    });
});


    function getShippingStates(id) {
        var country_name = id.options[id.selectedIndex].value;
        var country_id = $("#shipping_country").find(':selected').attr('data-id');
      // alert(country_id);
      $.ajax({
            url:"<?php echo base_url();?>/admin/doctor/getStates/"+ country_id,
            type: 'POST',
            data: {"id":country_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);


                $('#shipping_city_s').html('Select');
                $('#shipping_city').find('option').not(':first').remove();


                $('#shipping_state_s').html('Select');
                $('#shipping_state').find('option').not(':first').remove();
                

                // Add options
                $('#shipping_state').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                // $('#shipping_state').append('<option>Select</option>');
                $.each(response,function(index,data){
                    $('#shipping_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }

    function getShippingCities(id) {
       var city_name = id.options[id.selectedIndex].value;
        var city_id = $("#shipping_state").find(':selected').attr('data-id');
      // alert(city_id);
      $.ajax({
            url:"<?php echo base_url();?>/admin/doctor/getCities/"+ city_id,
            type: 'POST',
            data: {"id":city_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // $('#shipping_city_s').html('');
                // $('#shipping_city').empty();

                $('#shipping_city_s').html('Select');
                $('#shipping_city').find('option').not(':first').remove();


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
                alert('Data Not Deleted');
            }
        });

    }

    function fieldController(value){
        if(value.value == 1){
            $(".approval-date").show();
        }else{
            $(".approval-date").hide();
        }
    }


    $("#Other").change(function(e) {
      if ($(this).prop('checked')){
            // alert('checked');
            $('#show_other_treatment').show();
      }else{
            // alert('unchecked');
            $('#show_other_treatment').hide();
      }
    });


</script>
<script>

$(document).ready(function(){

    // var $modal = UIkit.modal("#modal");
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




</script>
