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
        <h2 class="headingSize uk-margin-bottom patientMobile"><b>Edit Patient</b></h2>
        <?php for($i=0;$i<count($patient_data);$i++) {
            $patientPhoto = $patient_data[$i]['patient_photos'];
         ?>
        <div class="uk-margin-large-bottom">
            <div class="md-card-content">
                <ul id="registration-step">
                    <li id="account" class="highlight">
                        <h2 class="themeTextColor stepSetting active"><b>Step 1</b>&nbsp;<span class="material-icons themeTextColor iconStepOne">arrow_right</span><hr></h2>
                    </li>
                    <li id="password"><h2 class="themeTextColor stepSetting"><b>Step 2</b><hr></h2></li>
                </ul>
                <form class="uk-form-stacked" name="frmRegistration" id="registration-form" method="post" action="<?= site_url('treatmentplanner/patient/updatePatient'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="patientID" value="<?= $patient_data[$i]['pt_id']; ?>">
                    <input type="hidden" name="doctorID" value="<?= $patient_data[$i]['doctor_id']; ?>">
                    <div id="account-field">
<!--                         <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><b>First Name</b><span class="req">*</span><input type="text" name="pt_firstname" id="wizard_fullname" required="" class="md-input demoInputBox input-border" placeholder="Enter First Name" value="<?= $patient_data[$i]['pt_firstname']; ?>"><span class="md-input-bar"></span></div>
                                
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><b>Last Name</b><span class="req">*</span><input type="text" name="pt_lastname" id="wizard_fullname" required="" class="md-input demoInputBox input-border" placeholder="Enter Last Name" value="<?= $patient_data[$i]['pt_lastname']; ?>"><span class="md-input-bar"></span></div>
                                
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
                                                <input type="radio" name="pt_gender" value="female" id="val_radio_female" data-md-icheck <?php echo $patient_data[$i]['pt_gender'] == 'female' ? 'checked' : ''; ?>/>
                                                <label for="val_radio_female" class="inline-label">Female</label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-2"  style="padding-right: 0px; padding-top: 0px;">
                                        <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>Age</b></label><input type="text" name="pt_age" id="wizard_fullname" class="md-input demoInputBox input-border" value="<?= $patient_data[$i]['pt_age']; ?>"><span class="md-input-bar"></span></div>
                                    </div>                                                                        
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label class="label-p" for="wizard_email" class="label-p"><b>Email ID</b></label>
                                <input type="text" class="md-input input-border" placeholder="Email ID" name="pt_email" id="wizard_email" placeholder="Enter Email" value="<?= $patient_data[$i]['pt_email']; ?>"  />
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
                                        <?php if($patient_data[$i]['pt_img']!=''){ ?>
                                            <img src="<?php echo base_url('assets/uploads/images/'. $patient_data[$i]['pt_img']); ?>" alt="user avatar"/>
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
                                    </label>                                
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                         -->

                        <br>
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
                        <br>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M13 4H4v9.01h2V6h7V4z" fill="currentColor"/><path d="M29.49 13.12l-9-5a1 1 0 0 0-1 0l-9 5A1 1 0 0 0 10 14v10a1 1 0 0 0 .52.87l9 5A1 1 0 0 0 20 30a1.05 1.05 0 0 0 .49-.13l9-5A1 1 0 0 0 30 24V14a1 1 0 0 0-.51-.88zM19 27.3l-7-3.89v-7.72l7 3.89zm1-9.45L13.06 14L20 10.14L26.94 14zm8 5.56l-7 3.89v-7.72l7-3.89z" fill="currentColor"/></svg>
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

                    </div>          
                    <div id="password-field" style="display:none;">
                       
                        <!-- <div class="uk-grid" data-uk-grid-margin>                             
                            <div class="uk-form-row parsley-row scanImpression">
                                <label for="gender" class="uk-form-label"><b>Impressions</b><span class="req">*</span></label>
                                <label><input type="radio" name="pt_scan_impression" value="no" <?php echo $patient_data[$i]['pt_scan_impression'] == 'no' ? 'checked' : ''; ?>/>No</label>
                                <label><input type="radio" name="pt_scan_impression" value="yes" <?php echo $patient_data[$i]['pt_scan_impression'] == 'yes' ? 'checked' : ''; ?>/>Yes</label>
                            </div>
                        </div> -->
                             
                       <!--  <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="parsley-row">
                                    <br>
                                    <label class="label-p" for="exampleFormControlFile1"><b>Treatment Objective</b></label><br><br>
                                    <textarea placeholder="lorem ipsum" class="md-input input-border" name="pt_objective" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $patient_data[$i]['pt_objective']; ?></textarea>
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
                                        <option <?=($patient_data[$i]['pt_referal'] == $developer->id)?'selected':'';?> value="<?= $developer->id; ?>"><?= $developer_name;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="collapse uk-margin-medium-top" id="featuresData">
                            <label for="exampleFormControlFile1"><b>Type of Treatment</b></label>
                            <div class="row">
                                <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                                    <?php 
                                        $typeOfTreatment = json_decode($patient_data[$i]['type_of_treatment'], true);
                                        $str_arr = explode (",", $typeOfTreatment); 
                                        foreach($treatment_data as $treatmentData): 
                                    ?>
                                        <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                                            <input name="treatmentData[]" value="<?php echo $treatmentData->tr_name; ?>" type="checkbox" id="<?php echo $treatmentData->tr_name; ?>"  class="chk-col-green" <?php if(in_array($treatmentData->tr_name, $str_arr)){ echo "checked"; }?> multiple/>
                                            <label class="label-grey uk-flex uk-flex-top" for="<?php echo $treatmentData->tr_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $treatmentData->tr_name; ?></label>
                                        </div>
                                    <?php endforeach;   ?>
                                </div>
                                <div id="show_other_treatment" style="display:none;">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2 other-input">
                                        <input style="padding: 5px;" class="md-input input-border" name="other_type_of_treatment" type="text" placeholder="Enter Here" value="<?= $patient_data[$i]['other_type_of_treatment']; ?>">
                                    </div>
                                </div>  
                            </div>                                                              
                        </div>
                        <div class="collapse uk-margin-small-top" id="featuresData"> 
                            <label for="exampleFormControlFile1"><b>Type of case:Malocclusion</b></label><br>
                             <div class="row">
                                <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                                <?php 
                                    $typeOfCase = json_decode($patient_data[$i]['type_of_case'], true);
                                    $typeOfCase_arr = explode (",", $typeOfCase); 
                                    foreach($treatment_case_data as $treatmentCaseData): ?>
                                        <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                                            <input name="treatmentCaseData[]" value="<?php echo $treatmentCaseData->case_name; ?>" type="checkbox" id="<?php echo $treatmentCaseData->case_name.'_case'; ?>" class="chk-col-green" <?php if(in_array($treatmentCaseData->case_name, $typeOfCase_arr)){ echo "checked"; }?> multiple/>
                                            <label class="label-grey uk-flex uk-flex-top" for="<?php echo $treatmentCaseData->case_name.'_case'; ?>">&nbsp;&nbsp;&nbsp;<?php echo $treatmentCaseData->case_name; ?></label>
                                        </div>
                                <?php 
                                    endforeach; 
                                ?>
                                </div>
                                <div id="show_case_type" style="display:none;">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-2 other-input">
                                        <input style="padding: 5px;" class="md-input input-border" name="other_type_of_case" type="text" placeholder="Enter Here" value="<?= $patient_data[$i]['other_type_of_case']; ?>">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                        <div class="collapse uk-margin-small-top" id="featuresData">
                            <label for="exampleFormControlFile1"><b>Arches to be treated</b></label>
                            <div class="row">
                                <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                                <?php 
                                    $arcTreated = json_decode($patient_data[$i]['arc_treated'], true);
                                    $arcTreated_arr = explode (",", $arcTreated); 
                                    foreach($arch_data as $archData): ?>
                                        <!-- <input name="archData" value="<?php echo $archData->arc_name; ?>" type="checkbox" id="<?php echo $archData->arc_name; ?>" <?php if(in_array($archData->arc_name, $arcTreated)) { echo 'checked'; } ?> class="chk-col-green"/> -->
                                    <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                                        <input name="archData[]" class="chk-col-green" value="<?php echo $archData->arc_name; ?>" type="checkbox" id="<?php echo $archData->arc_name; ?>" <?php if(in_array($archData->arc_name, $arcTreated_arr)){ echo "checked"; }?> multiple/>
                                        <label class="label-grey uk-flex uk-flex-top" for="<?php echo $archData->arc_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $archData->arc_name; ?></label>
                                    </div>
                                <?php 
                                    endforeach; 
                                ?>
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
                                        <label for="val_radio_male" class="inline-label">NO</label>
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
                    </div>
                    <div style="margin-top: 34px !important; margin-bottom: 57px !important;">
                        <a class="md-btn md-btn-primary md-btn-wave-light cancleButton waves-effect waves-button waves-light buttonStyling borderSetting" href="<?= site_url('doctor/doctor/patientList') ?>">Cancel</a>
                        <input class="md-btn md-btn-primary btnNext finishMobile" type="button" name="next" id="next" value="Next">
                        <input class="md-btn md-btn-primary btnNext finishMobile" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
                        <input class="md-btn md-btn-primary btnBack finishMobileBack" type="button" name="back" id="back" value="Back" style="display:none; padding: 4px 25px !important;float:right;">
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>

        <!-- Start Modals -->
        <div class="modal uk-modal" id="modal" >
            <div id="modal-container" class="uk-modal-container" uk-modal>
                <div class="uk-modal-dialog" style="padding: 14px;">
                    <div class="modal-dialog modal-size">
                        <div  class="modal-content">
                            <div class="modal-header" style="height:26px;margin-bottom: 10px;border-bottom: 1px solid #e5e5e5;">
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
                            <div class="modal-footer" style="text-align: right;border-top: 1px solid #e5e5e5;  margin-top: 15px;   padding: 15px 0px 0px;">
                                <button type="button" id="crop" class="btnBack" style="background: #805046;color: #fff;border: 2px solid #805046 !important;padding: 8px 30px;">Crop</button>
                                <button type="button" id="cropClose" class="btnBack" style="background: #805046;color: #fff;border: 2px solid #805046 !important;     padding: 8px 30px;" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modals -->

<!-- OLD CROP MODEL -->
<!--           <div class="modal uk-modal" id="modal">
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
<script type="text/javascript">
  $(document).ready(function(){  
    $(document).on('click', '.car_images', function(){ 
     var img_id= $(this).attr("id"); 
     $.ajax({  
      url: "<?php echo site_url(''); ?>doctor/deleteImagData", 
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
    $("#next").click(function(){
        // var output = validate();
        // if(output) {
            var current = $(".highlight");
            var next = $(".highlight").next("li");
            if(next.length>0) {
                $("#"+current.attr("id")+"-field").hide();
                $("#"+next.attr("id")+"-field").show();
                $("#back").show();
                $("#finish").show();
                $("#next").hide();
                $(".highlight").removeClass("highlight");
                next.addClass("highlight");
                if($(".highlight").attr("id") == $("li").last().attr("id")) {
                    $("#next").hide();
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
            $("#next").show();
            $("#finish").hide();
            $(".highlight").removeClass("highlight");
            prev.addClass("highlight");
            if($(".highlight").attr("id") == $("li").first().attr("id")) {
                $("#back").hide();          
            }
        }
    });
});


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


     // Type Treatment Other
    $("#Other_case").change(function(e) {
      if ($(this).prop('checked')){
            // alert('checked');
            $('#show_case_type').show();
      }else{
            // alert('unchecked');
            $('#show_case_type').hide();
      }
    });

    $(document).ready(function () {
       if($("#Other_case").is(':checked'))
        {
            $('#show_case_type').show();

        }else
        {
            $('#show_case_type').hide();

        }
    });



    // Type Treatment Other
    // $("#Others_case").change(function(e) {
    //   if ($(this).prop('checked')){
    //         // alert('checked');
    //         $('#other_case_type').show();
    //   }else{
    //         // alert('unchecked');
    //         $('#other_case_type').hide();
    //   }
    // });

</script>
<script>

$(document).ready(function(){

    // var $modal = UIkit.modal("#modal");
    var modal = UIkit.modal("#modal");
    var image = document.getElementById('sample_image');
    var cropper;

    $('#upload_image').change(function(event){
        var files = event.target.files;
        var done = function(url){
            image.src = url;
            var modal = UIkit.modal("#modal");
         modal.show(); 
        $('#modal').modal('show', function() { 
        });
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
   modal.on("shown.bs.modal", function() {
      //  alert('pp');
        cropper = new Cropper(document.getElementById('sample_image'), {
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
                    url: site_url + "doctor/imgCrop",
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
