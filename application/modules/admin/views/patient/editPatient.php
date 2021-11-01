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
        <h1 class="headingSizeuk-margin-bottom patientMobile"><b>Edit Patient</b></h1>
        <?php for($i=0;$i<count($patient_data);$i++) {
            $patientPhoto = $patient_data[$i]['patient_photos'];
         ?>
            <div class="uk-margin-large-bottom">
                <div class="md-card-content">
                    <ul id="registration-step">
                        <li id="account" class="highlight">
                            <h2 class="themeTextColor stepSetting active"><b>Step 1</b>&nbsp;<span class="material-icons iconStepOne">arrow_right</span><hr></h2>
                        </li>
                        <li id="password"><h2 class="themeTextColor stepSetting"><b>Step 2</b>
                        &nbsp;<span class="material-icons iconStepOne">arrow_right</span><hr></h2></li>
                        <li id="general"><h2 class="themeTextColor stepSetting"><b>Step 3</b><hr></h2></li>
                    </ul>

                    <form class="uk-form-stacked" name="frmRegistration" id="registration-form" method="post" action="<?= site_url('admin/patient/updatePatient'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="patientID" value="<?= $patient_data[$i]['pt_id']; ?>">

                    <div id="account-field">
                        <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="md-input-wrapper">
                             <label class="label-p" for="wizard_fullname"><b>Select Doctor</b><span class="req">*</span></label>
                            <select id="select_doctor" name="doctor_id" data-md-selectize>
                                <option value=""><b>Doctor</b></option>
                                   <?php foreach($doctor_data as $doctor){?>
                                     <option <?=($patient_data[$i]['doctor_id'] == $doctor->id)?'selected':'';?>  value="<?= $doctor->id;?>"><?= $doctor->first_name;?></option>
                                   <?php } ?>
                            </select>
                        </div>
                        </div>
                       
                      </div>
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><b>First Name</b><span class="req">*</span><input type="text" name="pt_firstname" id="wizard_firstname" required="" class="md-input demoInputBox input-border" value="<?= $patient_data[$i]['pt_firstname']; ?>"><span class="md-input-bar"></span></div>
                                
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper">
                                    <b>Last Name</b><span class="req">*</span>
                                    <input type="text" name="pt_lastname" id="wizard_lastname" required="" class="md-input demoInputBox input-border" value="<?= $patient_data[$i]['pt_lastname']; ?>">
                                    <span class="md-input-bar"></span>
                                </div>
                                
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">

                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="uk-form-row parsley-row">
                                            <label for="gender" class="uk-form-label"><b>Gender</b><span class="req">*</span></label>
                                            <span class="icheck-inline">
                                                <input type="radio" name="pt_gender" value="male" id="val_radio_male" data-md-icheck required <?php echo $patient_data[$i]['pt_gender'] == 'male' ? 'checked' : ''; ?>/>
                                                <label for="val_radio_male" class="inline-label">Male</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="radio" name="pt_gender" id="val_radio_female" value="female" data-md-icheck <?php echo $patient_data[$i]['pt_gender'] == 'female' ? 'checked' : ''; ?>/>
                                                <label for="val_radio_female" class="inline-label">Female</label>
                                            </span>
                                        </div>
                                    </div>
                                     <div class="uk-width-medium-1-2"  style="padding-right: 0px; padding-top: 0px;">
                                        <div class="md-input-wrapper">
                                            <b>Age</b>
                                            <span class="req">*</span>
                                            <input type="text" name="pt_age" id="wizard_fullname" class="md-input demoInputBox input-border" value="<?= $patient_data[$i]['pt_age']; ?>"><span class="md-input-bar"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper">
                                    <b>Email ID</b>
                                    <span class="req">*</span>
                                    <input type="text" class="md-input input-border" name="pt_email" id="wizard_email" value="<?= $patient_data[$i]['pt_email']; ?>" />
                                </div>
                            </div>
                        </div>
                    <div style="margin-bottom: 31px !important;" class="uk-form-row">
                        <div class="uk-width-medium-1-2">
                            <br>
                            <b>Profile Picture</b>
                            <br>
                            <br>
                             <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <?php if($patient_data[$i]['pt_img']!=''){ ?>
                                            <img src="<?php echo base_url('assets/uploads/images/'. $patient_data[$i]['pt_img']); ?>" style="width: 100% !important;" alt="user avatar"/>
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
                                        <?php
                                            $count = 0;
                                            for ($j=0;$j<count($patientPhoto);$j++){
                                                if($patientPhoto[$j]['key']=='Intra Oral Images') {
                                                    $count++;
                                                }
                                            }
                                            if($count>0){
                                        ?>
                                        <ul class="image-thumbnail-preview">
                                            <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                if($patientPhoto[$j]['key']=='Intra Oral Images') {

                                                $image_path = base_url('assets/uploads/images/').$patientPhoto[$j]['img'];
                                                if (file_get_contents($image_path)) {
                                            ?>
                                            <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                <button type="button" class="btn btn-sm btn-kv btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                            </li>
                                            <?php } } } ?>
                                        </ul>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                        <div class="uk-grid mobileImageOPG">
                            <div class="uk-width-1-1">
                                <div class="form-group alert-up-pd">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><b>Images OPG</b></div>
                                            <div class="panel-body">
                                                <input id="input-fa-2" name="images_opg[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                            <?php
                                                $count = 0;
                                                for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='OPG Images') {
                                                        $count++;
                                                    }
                                                }
                                                if($count>0){
                                            ?>
                                            <ul class="image-thumbnail-preview">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='OPG Images') {

                                                    $image_path = base_url('assets/uploads/images/').$patientPhoto[$j]['img'];
                                                    if (file_get_contents($image_path)) {
                                                ?>
                                                <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img  src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                    <button type="button" class="btn btn-sm btn-kv btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                </li>
                                                <?php } } } ?>
                                            </ul>
                                            <?php
                                                }
                                            ?>     
                                        </div>
                                    </div>
                                </div> 
                            </div>          
                        </div>
                        <br>
                        <br>
                    <div id="password-field" style="display:none;">
                    <div class="uk-grid imageSpaceSetting">
                        <div class="uk-width-1-1">
                           <div class="form-group alert-up-pd">
                             <div class="panel panel-default">
                                 <div class="panel-heading"><b>Lateral Ceph. Images</b></div>
                                       <div class="panel-body">
                                            <input id="input-fa-3" name="images_lateral_c[]" class="user_files_images" type="file" multiple="">
                                        </div>
                                        <?php
                                            $count = 0;
                                            for ($j=0;$j<count($patientPhoto);$j++){
                                                if($patientPhoto[$j]['key']=='Lateral C Images') {
                                                    $count++;
                                                }
                                            }
                                            if($count>0){
                                        ?>
                                            <ul class="image-thumbnail-preview pictureBrowseUpperSetting">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='Lateral C Images') {

                                                    $image_path = base_url('assets/uploads/images/').$patientPhoto[$j]['img'];
                                                    if (file_get_contents($image_path)) {
                                                ?>
                                                    <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                        <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                        <button type="button" class="btn btn-sm btn-kv btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                    </li>
                                                <?php } } } ?>
                                            </ul>
                                        <?php
                                            }
                                        ?>  
                                    </div>
                                </div>
                             </div> 
                          </div>
                          <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-form-row parsley-row scanImpression">
                              <label for="gender" class="uk-form-label"><b>Impressions</b></label>

                               <label><input type="radio" name="pt_scan_impression" value="no" <?php echo $patient_data[$i]['pt_scan_impression'] == 'no' ? 'checked' : ''; ?>/>No</label>

                                <label><input type="radio" name="pt_scan_impression" id="pt_scan_impression" value="yes" <?php echo $patient_data[$i]['pt_scan_impression'] == 'yes' ? 'checked' : ''; ?>/>Yes</label>                                
                              </div>
                        </div>
                        
                              
                            
                        <div class="uk-grid imageSpaceSetting">
                            <div class="uk-width-1-1">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>Upload STL</b></div>
                                            <div class="panel-body">
                                                <input id="stlFiles" name="images_stl[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                            <?php
                                                $count = 0;
                                                for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='STL File(3D File)') {
                                                        $count++;
                                                    }
                                                }
                                                if($count>0){
                                            ?>
                                            <ul class="image-thumbnail-preview pictureBrowseUpperSetting uk-flex">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='STL File(3D File)') {

                                                    $image_path = base_url('assets/uploads/images/').$patientPhoto[$j]['img'];
                                                    if (file_get_contents($image_path)) {                                                    

                                                 ?>
                                                  <li class="image-thumbnail-preview-frame uk-flex" style="border: 1px solid;width:max-content;">
                                                    <!-- <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80"> -->

                                                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M13 4H4v9.01h2V6h7V4z" fill="currentColor"/><path d="M29.49 13.12l-9-5a1 1 0 0 0-1 0l-9 5A1 1 0 0 0 10 14v10a1 1 0 0 0 .52.87l9 5A1 1 0 0 0 20 30a1.05 1.05 0 0 0 .49-.13l9-5A1 1 0 0 0 30 24V14a1 1 0 0 0-.51-.88zM19 27.3l-7-3.89v-7.72l7 3.89zm1-9.45L13.06 14L20 10.14L26.94 14zm8 5.56l-7 3.89v-7.72l7-3.89z" fill="currentColor"/></svg>
                                                     
                                                    <!-- <div class="stl_cont"></div> -->
                                                    <div class="uk-flex uk-flex-middle">
                                                        <button type="button" class="btn btn-sm btn-kv btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                    </div>
                                                  </li>
                                                <?php } } } ?>
                                            </ul>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                 </div> 
                              </div>
                         <div class="uk-grid">
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <br>
                                <label class="label-p"  for="exampleFormControlFile1"><b>Treatment Objective</b></label><br>
                                    <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                    <textarea placeholder="lorem ipsum" class="md-input input-border" name="pt_objective" cols="10" rows="8"><?= $patient_data[$i]['pt_objective']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-3 uk-width-large-1-2">
                                 <label class="label-p" for="exampleFormControlFile1"><b>Referral Name</b></label>

                                <select id="select_demo_1" name="pt_referal" data-md-selectize>
                                    <option value=""><b>Referral Name</b></option>
                                       <?php foreach($business_developer as $developer){?>
                                            <?php $developer_name = $developer->first_name." ".$developer->last_name; ?>
                                         <option <?=($patient_data[$i]['pt_referal'] == $developer_name)?'selected':'';?> value="<?= $developer_name; ?>"><?= $developer_name;?></option>
                                       <?php } ?>
                                </select>
                            </div>
                          </div> -->
        <div class="collapse uk-margin-medium-top" id="featuresData">
            <label for="exampleFormControlFile1"><b>Type of Treatment</b></label>
            <div class="row">
                <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                <?php $typeOfTreatment = json_decode($patient_data[$i]['type_of_treatment'], true);
                        $str_arr = explode (",", $typeOfTreatment); 
                    foreach($treatment_data as $treatmentData): ?>
                        <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                            <input name="treatmentData[]" value="<?php echo $treatmentData->tr_name; ?>" type="checkbox" id="<?php echo $treatmentData->tr_name; ?>"  class="chk-col-green" <?php if(in_array($treatmentData->tr_name, $str_arr)){ echo "checked"; }?> multiple/>
                            <label class="label-grey uk-flex uk-flex-top" for="<?php echo $treatmentData->tr_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $treatmentData->tr_name; ?></label>
                        </div>
                    <?php endforeach;   ?>
                </div>
                <div id="show_other_treatment" style="display:none;">
                    <div class="col-md-8">
                    
                    </div>
                    <div class="col-md-2 other-input">
                        <input style="padding: 5px;" class="md-input input-border" id="other_type_treatment" name="other_type_of_treatment" type="text" placeholder="Enter Here" value="<?= $patient_data[$i]['other_type_of_treatment']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <br>
 
            <div class="collapse uk-margin-small-top" id="featuresData">
                <label for="exampleFormControlFile1"><b>Type of case:Malocclusion</b></label><br>
                <div class="row"> 
                    <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                    <?php $typeOfCase = json_decode($patient_data[$i]['type_of_case'], true);
                         $typeOfCase_arr = explode (",", $typeOfCase); 
                        foreach($treatment_case_data as $treatmentCaseData): ?>
                            <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                                <input name="treatmentCaseData[]" value="<?php echo $treatmentCaseData->case_name; ?>" type="checkbox" id="<?php echo $treatmentCaseData->case_name; ?>" class="chk-col-green" <?php if(in_array($treatmentCaseData->case_name, $typeOfCase_arr)){ echo "checked"; }?> multiple/>
                                <label class="label-grey uk-flex uk-flex-top" for="<?php echo $treatmentCaseData->case_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $treatmentCaseData->case_name; ?></label>
                            </div>
                        <?php endforeach;   ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="collapse uk-margin-small-top" id="featuresData">
                <label for="exampleFormControlFile1"><b>Arches to be treated</b></label>
                <div class="row">
                    <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                    <?php $arcTreated = json_decode($patient_data[$i]['arc_treated'], true);
                         $arcTreated_arr = explode (",", $arcTreated); 

                            foreach($arch_data as $archData): ?>
                        <!-- <input name="archData" value="<?php echo $archData->arc_name; ?>" type="checkbox" id="<?php echo $archData->arc_name; ?>" <?php if(in_array($archData->arc_name, $arcTreated)) { echo 'checked'; } ?> class="chk-col-green"/> -->
                        <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                            <input name="archData[]" class="chk-col-green" value="<?php echo $archData->arc_name; ?>" type="checkbox" id="<?php echo $archData->arc_name; ?>" <?php if(in_array($archData->arc_name, $arcTreated_arr)){ echo "checked"; }?> multiple/>
                            <label class="label-grey uk-flex uk-flex-top" for="<?php echo $archData->arc_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $archData->arc_name; ?></label>
                        </div>
                        <?php endforeach;  ?>
                    </div>
                </div>
            </div>
         <br>
         <br>
         <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
              <div class="uk-form-row parsley-row">
                  <label for="gender" class="uk-form-label label-p"><b>IPR to be performed</b></label>
                  <span class="icheck-inline">
                      <input type="radio" value="0" name="ipr_performed" id="val_radio_male" data-md-icheck <?php echo $patient_data[$i]['ipr_performed'] == '0' ? 'checked' : ''; ?>/>
                      <label for="val_radio_male" class="inline-label">No</label>
                  </span>
                  <span class="icheck-inline">
                      <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck <?php echo $patient_data[$i]['ipr_performed'] == '1' ? 'checked' : ''; ?>/>
                      <label for="val_radio_female" class="inline-label">Yes</label>
                  </span>
              </div>
          </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
              <div class="uk-form-row parsley-row">
                  <label for="gender" class="uk-form-label label-p"><b>Attachment to be placed</b></label>
                  <span class="icheck-inline">
                      <input type="radio" value="0" name="attachment_placed" id="val_radio_male" data-md-icheck <?php echo $patient_data[$i]['attachment_placed'] == '0' ? 'checked' : ''; ?>/>
                      <label for="val_radio_male" class="inline-label">No</label>
                  </span>
                  <span class="icheck-inline">
                      <input type="radio" value="1" name="attachment_placed" id="val_radio_female" data-md-icheck  <?php echo $patient_data[$i]['attachment_placed'] == '1' ? 'checked' : ''; ?>/>
                      <label for="val_radio_female" class="inline-label">Yes</label>
                  </span>
              </div>
          </div>
        </div>
                             <!-- <div class="uk-grid treatmentPlan">
                            <div class="uk-width-medium-1-1">
                                <div class="">
                                <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan*</b></label><br><br>                                    
                                    <textarea placeholder="lorem ipsum" class="md-input input-border" name="pt_treatment_plan" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $patient_data[$i]['pt_treatment_plan']; ?></textarea>
                                </div>
                            </div>
                        </div> -->
                        <br>
                        <br>

                    </div>

                    <div id="general-field" style="display:none;">
                      
                        <!-- <div class="row imageSpaceSetting">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>Treatment Plan File</b></div>
                                         <div class="panel-body">
                                                       <input id="input-fa-6" name="images_treatment_plan[]" accept="application/pdf" class="user_files_images" type="file" multiple="">

                                            </div>
                                            <?php
                                                $count = 0;
                                                for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='Treatment Plan') {
                                                        $count++;
                                                    }
                                                }
                                                if($count>0){
                                            ?>
                                            <ul class="image-thumbnail-preview pictureBrowseUpperSetting uk-flex">
                                                        <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                            if($patientPhoto[$j]['key']=='Treatment Plan') {

                                                    $image_path = base_url('assets/uploads/images/').$patientPhoto[$j]['img'];
                                                    if (file_get_contents($image_path)) {     

                                                        ?>
                                                        <li class="image-thumbnail-preview-frame uk-flex" style="border: 1px solid;width:max-content;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="150 0 1024 1024"><path d="M854.6 288.7c6 6 9.4 14.1 9.4 22.6V928c0 17.7-14.3 32-32 32H192c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32h424.7c8.5 0 16.7 3.4 22.7 9.4l215.2 215.3zM790.2 326L602 137.8V326h188.2zM633.22 637.26c-15.18-.5-31.32.67-49.65 2.96c-24.3-14.99-40.66-35.58-52.28-65.83l1.07-4.38l1.24-5.18c4.3-18.13 6.61-31.36 7.3-44.7c.52-10.07-.04-19.36-1.83-27.97c-3.3-18.59-16.45-29.46-33.02-30.13c-15.45-.63-29.65 8-33.28 21.37c-5.91 21.62-2.45 50.07 10.08 98.59c-15.96 38.05-37.05 82.66-51.2 107.54c-18.89 9.74-33.6 18.6-45.96 28.42c-16.3 12.97-26.48 26.3-29.28 40.3c-1.36 6.49.69 14.97 5.36 21.92c5.3 7.88 13.28 13 22.85 13.74c24.15 1.87 53.83-23.03 86.6-79.26c3.29-1.1 6.77-2.26 11.02-3.7l11.9-4.02c7.53-2.54 12.99-4.36 18.39-6.11c23.4-7.62 41.1-12.43 57.2-15.17c27.98 14.98 60.32 24.8 82.1 24.8c17.98 0 30.13-9.32 34.52-23.99c3.85-12.88.8-27.82-7.48-36.08c-8.56-8.41-24.3-12.43-45.65-13.12zM385.23 765.68v-.36l.13-.34a54.86 54.86 0 0 1 5.6-10.76c4.28-6.58 10.17-13.5 17.47-20.87c3.92-3.95 8-7.8 12.79-12.12c1.07-.96 7.91-7.05 9.19-8.25l11.17-10.4l-8.12 12.93c-12.32 19.64-23.46 33.78-33 43c-3.51 3.4-6.6 5.9-9.1 7.51a16.43 16.43 0 0 1-2.61 1.42c-.41.17-.77.27-1.13.3a2.2 2.2 0 0 1-1.12-.15a2.07 2.07 0 0 1-1.27-1.91zM511.17 547.4l-2.26 4l-1.4-4.38c-3.1-9.83-5.38-24.64-6.01-38c-.72-15.2.49-24.32 5.29-24.32c6.74 0 9.83 10.8 10.07 27.05c.22 14.28-2.03 29.14-5.7 35.65zm-5.81 58.46l1.53-4.05l2.09 3.8c11.69 21.24 26.86 38.96 43.54 51.31l3.6 2.66l-4.39.9c-16.33 3.38-31.54 8.46-52.34 16.85c2.17-.88-21.62 8.86-27.64 11.17l-5.25 2.01l2.8-4.88c12.35-21.5 23.76-47.32 36.05-79.77zm157.62 76.26c-7.86 3.1-24.78.33-54.57-12.39l-7.56-3.22l8.2-.6c23.3-1.73 39.8-.45 49.42 3.07c4.1 1.5 6.83 3.39 8.04 5.55a4.64 4.64 0 0 1-1.36 6.31a6.7 6.7 0 0 1-2.17 1.28z" fill="currentColor"/></svg>
                                                            <div class="uk-flex uk-flex-middle">
                                                                <button type="button" class="btn btn-sm btn-kv btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                            </div>
                                                        </li>
                                                        <?php } } } ?>
                                                      </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                 </div> 
                              </div> -->
                        <br>
                        <br>
                        <!-- <div class="uk-grid">
                             <div class="uk-width-medium-1-3">
                                 <label for="exampleFormControlFile1" class="label-p"><b>Select Approval</b></label><br>
                            <select id="select_demo_1" name="pt_approval" data-md-selectize>
                            <option value=""><b>Approval</b></option>
                           <option value="1" <?=($patient_data[$i]['pt_approval'] == "1")?'selected':'';?>>Yes</option>
                           <option value="0" <?=($patient_data[$i]['pt_approval'] == "0")?'selected':'';?>>No</option>
                            </select>
                        </div>
                        <div class="uk-width-medium-1-2 approval-date">
  <label for="uk_dp_1" class="label-p"><b>Approval Date</b></label>
                                    <div class="uk-input-group" style="width: 100%;">
                                              <img style="position: absolute; top: 42%; right: 4%;" src="<?php echo base_url('/assets/images/calendar-icon.svg') ?>">
                                        <input class="md-input input-border" name="pt_approval_date" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}" value="<?= $patient_data[$i]['pt_approval_date']; ?>" placeholder="Approval Date">
                                    </div>
                        </div>
                            </div> -->
                            <!-- <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>Status</b><span class="req">*</span><input type="text" name="pt_custom_status" id="wizard_fullname"  class="md-input input-border" value="<?= $patient_data[$i]['pt_custom_status']; ?>" placeholder="Status"><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                </div> -->
                                <!-- <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>Type of Case</b><span class="req">*</span><input type="text" name="pt_case_type" id="wizard_fullname"  class="md-input input-border" value="<?= $patient_data[$i]['pt_case_type']; ?>"><span class="md-input-bar" placeholder="Type of Case"></span></div>
                                        
                                    </div>
                                </div> -->
                                 <!-- <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>No of Aligners</b><span class="req">*</span><input type="text" name="pt_aligners" id="wizard_fullname" class="md-input input-border" value="<?= $patient_data[$i]['pt_aligners']; ?>"><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>No of Aligners Dispatched</b><span class="req">*</span><input type="text" name="pt_aligners_dispatch" id="wizard_fullname" class="md-input input-border" value="<?= $patient_data[$i]['pt_aligners_dispatch']; ?>"><span class="md-input-bar" ></span></div>
                                        
                                    </div>
                                </div> -->
                                 <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        
                                  <!-- hidden input -->
                                  <!-- <input type="hidden" name="" value="<?= $patient_data[$i]['pt_shipping_details']; ?>"> -->
                                    <label for="exampleFormControlFile1" class="label-p"><b>Select Shipping Address</b></label>
                                        <div class="drop-multiaddress">
                                            <div class="uk-form-select uk-select-st" style="" data-uk-form-select>
                                                                <span id="show-shipping">Select Shipping Address</span>
                                                <i class="uk-icon-caret-down" style="    float: right;
                                            padding: 2px 5px; color: #C4C4C4;"></i>

                                                        <input type="hidden" id="selected_shipping_address" name="" value="<?= $patient_data[$i]['pt_shipping_details']; ?>">
                                                                <select id="shipping_address" name="pt_shipping_details">
                                                                    <i class="uk-icon-caret-down"></i>
                                            <!--    <?php foreach($doctor_data as $doctor){?>
                                                             <option value="<?= $doctor->id;?>" ><?= $doctor->shipping_address;?></option>
                                                           <?php } ?> -->
                        <!--                            <option value="">...</option>-->
                                                </select>
                                            </div>
                    
                       
                    <a class="drop-multiaddress-icon" style="background-color: #F2E6CC; padding: 10px 12px; border-radius: 22px;" data-uk-modal="{target:'#add-shipping-model'}" href="#">
                       <img src="<?php echo site_url('assets/images/plus-icon.svg'); ?>">
                    </a>
                           </div>             
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>Billing Address</b><span class="req">*</span><input type="text" name="pt_billing_address" id="wizard_fullname"  class="md-input input-border" value="<?= $patient_data[$i]['pt_billing_address']; ?>"><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                </div>

                                <div class="uk-grid dispatchDate">
                            <div class="uk-width-medium-1-2">
                           <!--  <div class="uk-grid">
                                <div class="uk-width-large-2-3 uk-width-1-1"> -->
                                    <label for="exampleFormControlFile1" class="label-p"><b>Dispatch Date</b></label><br>
                                    <div class="uk-input-group" style="width:100%;">
                                        <!-- <span class="uk-input-group-addon"> -->
                            <!-- <i style="position: absolute; top: 42%; right: 4%;" class="uk-input-group-icon uk-icon-calendar">
                            </i> -->
                                      <img style="position: absolute; top: 42%; right: 4%;" src="<?php echo base_url('/assets/images/calendar-icon.svg') ?>">
                      <!-- </span> -->
                                        
                                        <input class="md-input input-border" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}" name="pt_dispatch_date" value="<?= $patient_data[$i]['pt_dispatch_date']; ?>" placeholder="Dispatch Date">
                                    </div>
                               <!--  </div>
                            </div> -->
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
                                            <?php   
                                                $count = 0;
                                                for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='IPR') {
                                                        $count++;
                                                    }
                                                }
                                                if($count>0){
                                            ?>
                                            <ul class="image-thumbnail-preview">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='IPR') {
                                                    $image_path = base_url('assets/uploads/images/').$patientPhoto[$j]['img'];
                                                    if (file_get_contents($image_path)) {     
                                                 ?>
                                                  <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                    <button type="button" class="btn btn-sm btn-kv btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                  </li>
                                                <?php } } } ?>
                                              </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                 </div>
                        </div>
                        <!-- <div class="row imageOpgSetting">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>Invoice</b></div>
                                            <div class="panel-body">
                                               <input id="input-fa-8" name="invoice_files[]" accept="application/pdf" class="user_files_images" type="file" multiple="">
                                                <ul class="image-thumbnail-preview">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='Invoice') {
                                                 ?>
                                                  <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                    <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                  </li>
                                                <?php } } ?>
                                              </ul><br><br><br><br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                 </div> 
                        </div> -->
                    </div>
                    <div>
                    
                    <a class="md-btn md-btn-primary md-btn-wave-light cancleButton waves-effect waves-button waves-light buttonStyling borderSetting" href="<?= site_url('admin/patient/patientListing') ?>">Cancel</a>
                    <input class="md-btn md-btn-primary btnNext" type="button" name="next" id="next" value="Next">
                    <input class="md-btn md-btn-primary btnNext finishMobile" type="button" name="next" id="secondNext" value="Next">
                    <input class="md-btn md-btn-primary btnNext finishMobile" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
                    <input class="md-btn md-btn-primary btnBack finishMobileBack" type="button" name="back" id="back" value="Back" style="display:none;padding:4px 25px;float:right;">
                   <!--  <input class="btnNext" type="button" name="next" id="next" value="Next" > -->
                    <!-- <input class="btnNext" type="submit" name="finish" id="finish" value="Finish" style="display:none;"> -->
                    </div>
                    </form>
                    </div>
            </div>
        <?php } ?>


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
                                        <select name="shipping_country" class="shipping_country" onChange="getShippingStates(this);">
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
<!-- OLD CROP MODEL -->
<!--         <div class="modal uk-modal" id="modal">
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

                        $('#shipping_address').empty();

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


                                    var selected_shipping_address =  $('#selected_shipping_address').val();

                                    // If Patient Address is equal to Doctor Shipping Address
                                    var shipping_address = data['street_address']+', ' +data['city']+', ' +data['state']+', ' +data['country']+', ' +data['zip_code'];

                                    if(selected_shipping_address == shipping_address){
                                            $('#show-shipping').html('');
                                            $('#show-shipping').html(shipping_address);
                                            // $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                                    }

                                    if(selected_shipping_address == ''){
                                        if(data['default_shipping_address'] == 1){
                                            $('#show-shipping').html('');
                                            $('#show-shipping').html(shipping_address);

                                        }
                                    }

                                    $('#assign_doctorID').val(data['doctor_id']);
                                    $('#shipping_address').append('<option value="'+data['id']+'">'+shipping_address+'</option>');

                                    });

                                    $('.shipping_country_s').html('Select');
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
<!-- END Shipping Modal With Ajax Call -->

<script type="text/javascript">
  $(document).ready(function(){  
    $(document).on('click', '.car_images', function(){ 
     var img_id= $(this).attr("id"); 
     $.ajax({  
      url: "<?php echo site_url(''); ?>admin/patient/deleteImgPatientData", 
      method:"POST",  
      data:{img_id:img_id},  
      dataType:"json",  
      success:function(data){ 
                setTimeout(function(){// wait for 5 secs(2)
               location.reload(); // then reload the page.(3)
             }, 1000); 
              }  
            });  
   });
  });  
</script> 
<script>
    function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
// function validate() {
//     var output = true;
//     $(".registration-error").html('');
//     if($("#account-field").css('display') != 'none') {
//         if(!($("#email").val())) {
//             output = false;
//             $("#email-error").html("required");
//         }   
//         if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
//             $("#email-error").html("invalid");
//             output = false;
//         }
//     }

//     if($("#password-field").css('display') != 'none') {
//         if(!($("#user-password").val())) {
//             output = false;
//             $("#password-error").html("required");
//         }   
//         if(!($("#confirm-password").val())) {
//             output = false;
//             $("#confirm-password-error").html("Not Matched");
//         }   
//         if($("#user-password").val() != $("#confirm-password").val()) {
//             output = false;
//             $("#confirm-password-error").html("Not Matched");
//         }   
//     }
//     return output;
// }
$(document).ready(function() {
    if($("#pt_scan_impression").prop('checked') == true){
        $("#div1").show();
    }
    $("#secondNext").hide();
    $("#next").click(function(){
        // var output = validate();
        // if(output) {
        // var select = document.getElementById('select_doctor');
        // var value = select.options[select.selectedIndex].value;


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


                      


                    $("#finish").show();                
                }
            }
        //}
    });
    $("#secondNext").click(function(){
        // var output = validate();
        // if(output) {
		var current = $(".highlight");
		var next = $(".highlight").next("li");
        var inner = $(".highlight").find("h2");

        var select = document.getElementById('select_doctor');
        var value = select.options[select.selectedIndex].value;
        // alert(value);
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
                            $('#assign_doctorID').val(data['doctor_id']);

                            var selected_shipping_address =  $('#selected_shipping_address').val();

                            // If Patient Address is equal to Doctor Shipping Address
                            var shipping_address = data['street_address']+', ' +data['city']+', ' +data['state']+', ' +data['country']+', ' +data['zip_code'];

                            if(selected_shipping_address == data['id']){
                                    $('#show-shipping').html('');
                                    $('#show-shipping').html(shipping_address);
                                    // $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                            }

                            if(selected_shipping_address == ''){
                                if(data['default_shipping_address'] == 1){
                                    $('#show-shipping').html('');
                                    $('#show-shipping').html(shipping_address);

                                }
                            }

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
                        $('.shipping_country_s').html('Select');
                        $('.shipping_country').find('option').not(':first').remove();
                        

                        // Add options
                        $('.shipping_country').each(function() {
                            if (this.selectize) {
                                for(x=0; x < 10; ++x){
                                    this.selectize.addOption({value:x, text: x});
                                }
                            }
                        });

                        // $('#shipping_state').append('<option>Select</option>');
                        $.each(response,function(index,data){
                            $('.shipping_country').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                        });
                    },
                    error: function () {
                        alert('Data Not Deleted');
                    }
                });
            }



                if($(".highlight").attr("id") == $("li").last().attr("id")) {
                    $("#next").hide();
                    // alert(value);

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

    // function getShippingStates(id) {
    //     var country_name = id.options[id.selectedIndex].value;
    //     var country_id = $(".shipping_country").find(':selected').attr('data-id');
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


    // Type Treatment Other
    $("#Other").change(function(e) {
      if ($(this).prop('checked')){
            // alert('checked');
            $('#show_other_treatment').show();
      }else{
            // alert('unchecked');
            $('#show_other_treatment').hide();
      }
    });
    $(document).ready(function () {
       if($("#Other").is(':checked'))
        {
            $('#show_other_treatment').show();

        }else
        {
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
