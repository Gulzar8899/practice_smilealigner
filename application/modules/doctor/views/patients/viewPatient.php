<div id="page_content">
    <div id="page_content_inner">
        <br>
        <h1 class="patientMobile"><b>Single Patient</b></h1>
        <?php foreach($singlePatient as $patientData): ?>
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                            <div class="uk-width-large-4-10">
                                <div class="user_heading userDataBackground border-top-left-10p">
                                    <div class="user_heading_avatar doctorViewImageSetting">
                                        <div class="thumbnail">
                                        <?php if($patientData['pt_img']!=''){ ?>
                                            <img src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>" alt="user avatar" class="">
                                        <?php } else{ ?>
                                            <img src="<?php echo base_url('assets/images/round-bg.png'); ?>" alt="user avatar" class="">
                                            
                                            <div class="marginprofilepicture" id="viewProfileText" style="margin-right:auto;margin-left: auto;margin-top: 15px;">
                                            <?php 
                                                $userName = $patientData['pt_firstname'];
                                                $lastName = $patientData['pt_lastname'];
                                                echo $userName[0].$lastName[0]; 
                                            ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="user_heading_content doctorViewNameSetting">
                                        <h2 style="color:#6D3745 !important;" class="heading_b uk-margin-bottom">
                                            <span class="uk-text-truncate">
                                                <?= $patientData['pt_firstname']?>
                                                <br>
                                                <?= $patientData['pt_lastname'] ?>
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="user_content">
                                    <ul id="" class="uk-margin">
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Patient ID</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_id']?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Email ID</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_email']?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Age</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_age'] != '') ? $patientData['pt_age'] : 'N/A';?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Gender</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_gender'] != '') ? $patientData['pt_gender'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Treatment Objectives</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_objective'] != '') ? $patientData['pt_objective'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Referral Name</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_referal'] != '') ? $patientData['pt_referal'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Treatment Plan</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_treatment_plan'] != '') ? $patientData['pt_treatment_plan'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Approval Date</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_approval_date'] != '') ? $patientData['pt_approval_date'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Type of Treatment</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['type_of_treatment'] != 'null') ? $patientData['type_of_treatment'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Status</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_custom_status'] != '') ? $patientData['pt_custom_status'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Type of Case</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['type_of_case'] != 'null') ? $patientData['type_of_case'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Arches Treated</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['arc_treated'] != 'null') ? $patientData['arc_treated'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>IPR to be Performed</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span>
                                                   <?php if($patientData['ipr_performed']==1) { echo 'Yes'; } else{ echo "No"; } ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Attachement to be Placed</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span>
                                                    <?php if($patientData['attachment_placed']==1) { echo 'Yes'; } else{ echo "No"; } ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>No of Aligners</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_aligners'] != '') ? $patientData['pt_aligners'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>No of Aligners Dispatched</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_dispatch_date'] != '') ? $patientData['pt_dispatch_date'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Cost of Plan</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_cost_plan'] != '') ? $patientData['pt_cost_plan'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Total Amount Paid</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_amount_paid'] != '') ? $patientData['pt_amount_paid'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Balance Amount</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_cost_plan'] - $patientData['pt_amount_paid']?></span>
                                            </div>
                                        </div>

                                        <?php foreach ($shipping_address as $key => $address): ?>
                                            <?php  if($address->id == $patientData['pt_shipping_details']){ ?>
                                                <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                    <div class="uk-width-large-4-10">
                                                        <span class="themeTextColor"><b>Shipping Address</b></span>
                                                    </div>
                                                    <div class="uk-width-large-6-10">
                                                         <span><?= ($address->country != '') ?  $address->street_address.", ".$address->city.", ".$address->state.", ".$address->country.", ".$address->zip_code : 'N/A'; ?></span>
                                                    </div>
                                                </div>
                                        
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        
                                     <!--    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Shipping Address</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_shipping_details']?></span>
                                            </div>
                                        </div> -->
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Billing Address</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_billing_address'] != '') ? $patientData['pt_billing_address'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Dispatch Date</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_dispatch_date'] != '') ? $patientData['pt_dispatch_date'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                           <div class="uk-width-large-6-10 fileSetting" style="margin-top: 20px;">
                                <div class="md-card filesCardSetting border-radius-15p">
                                    <div class="md-card-content cardViewSeting">
                                        <div class="uk-margin-medium-bottom">
                                            <div class="md-list-content">
                                                <span style="color:#6D3745 !important;" class="md-list-heading"><b>Files</b></span>
                                            </div>
                                            <div class="uk-grid marginTop">
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">Intra Oral/OPG/Lateral C</b>
                                                            </label>
                                                            <br>

                                                            <?php 
                                                                $patientID = $patientData['pt_id'];
                                                                $patientData = $patientData['patient_photos'];

                                                                $intra = array_search('Intra Oral Images', array_column($patientData, 'key'));
                                                                $opg = array_search('OPG Images', array_column($patientData, 'key'));
                                                                $lateral = array_search('Lateral C Images', array_column($patientData, 'key'));
                                                                $stl_file = array_search('STL File(3D File)', array_column($patientData, 'key'));
                                                                 $scan = array_search('Scans', array_column($patientData, 'key'));
                                                                $treatment_plan = array_search('Treatment Plan', array_column($patientData, 'key'));
                                                                $ipr = array_search('IPR', array_column($patientData, 'key'));
                                                                 $invoice = array_search('Invoice', array_column($patientData, 'key'));
                                                            ?>
                                                            
                                                            <?php
                                                            if($intra != null || $intra === 0 || $opg != null || $opg === 0 || $lateral != null || $lateral === 0){
                                                            ?>


                                                            <div class="filesBackground uk-flex uk-flex-between">
                                                                
                                                                   <span>
                                                                        <a href="" class="get-images"  data-id="<?php echo $patientID; ?>" data-type="oral_opg_lateral">
                                                                        <img src="<?= site_url('assets/images/file-icon.svg') ?>">
                                                                        </a>
                                                                    </span>
                                                                    <span class="text-black">Files.jpg</span>
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/oral_opg_lateral/').$patientID; ?>" class="uk-flex uk-flex-between">
                                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php }else{ ?>
                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/oral_opg_lateral/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/file-icon-grey.svg') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">STL file of Pt.</b>
                                                            </label>
                                                            <br>
                                                             <?php 
                                                                if($stl_file != null || $stl_file === 0){
                                                            ?>
                                                            <div class="filesBackground uk-flex uk-flex-between">

                                                               <a href="" class="stl_preview" data-id="<?php echo $patientID; ?>" data-type="stl_file">
                                                                <span><img src="<?= site_url('assets/images/stl-icon.svg') ?>"></span>
                                                                </a>

                                                                    <span class="text-black">File.stl</span>
                                                                 <a href="" class="">
                                                                    <span><!-- <img src="<?= site_url('assets/images/down-arrow.png') ?>"> --></span>
                                                                </a>
                                                            </div>
                                                             <?php }else{ ?>
                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/images_stl/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/stl-icon-grey.svg') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span>
                                                                        <!-- <img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"> -->
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">Treatment Plan Doc</b>
                                                            </label>
                                                            <br>
                                                             <?php 
                                                                if($treatment_plan != null || $treatment_plan === 0){
                                                            ?>
                                                            <div class="filesBackground uk-flex uk-flex-between">
                                                                
                                                                <a href="" class="get-images" data-id="<?php echo $patientID; ?>" data-type="treatment_plan_images">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon.svg') ?>"></span>
                                                                </a>
                                                                
                                                                <span class="text-black">Files.pdf</span>
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/images_treatment_plan/').$patientID; ?>" class="uk-flex uk-flex-between">
                                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php }else{ ?>

                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/images_treatment_plan/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon-grey.png') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="uk-grid marginTop">
                                                
                                                </div>
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">IPR</b>
                                                            </label>
                                                            <br>
                                                            <?php 

                                                                if($ipr != null || $ipr === 0){
                                                                    
                                                            ?>
                                                            <div class="filesBackground uk-flex uk-flex-between">
                                                              
                                                                <a href="" class="get-images" data-id="<?php echo $patientID; ?>"data-type="ipr_file">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon.svg') ?>"></span>
                                                                </a>
                                                                <span class="text-black">Files.pdf</span>

                                                                <a href="<?= site_url('doctor/getdownloadPostFile/ipr_files/').$patientID; ?>" class="uk-flex uk-flex-between">
                                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php }else{ ?>

                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/ipr_files/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon-grey.png') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">Invoice</b>
                                                            </label>
                                                            <br>
                                                            <?php 
                                                                if($invoice != null || $invoice === 0){
                                                            ?>
                                                            <div class="filesBackground uk-flex uk-flex-between">
                                                               
                                                                <a href="" class="get-images" data-id="<?php echo $patientID; ?>" data-type="invoice">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon.svg') ?>"></span>
                                                                </a>
                                                            
                                                                <span class="text-black">Files.pdf</span>

                                                                 <a href="<?= site_url('doctor/getdownloadPostFile/invoice_files/').$patientID; ?>" class="uk-flex uk-flex-between">
                                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                             <?php }else{ ?>

                                                           <div class="filesBackground">
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/invoice_files/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon-grey.png') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <div class="viewButtoMobile uk-flex uk-flex-between" style="padding-left: 24px; padding-right:24px;padding-bottom:24px;">
                                <div>
                                    <a class="md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('doctor/patientList'); ?>">Back</a>
                                </div>
                                <div>
                                    <a class="md-btn editbtnBackground btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('doctor/editPatient/').$patientID; ?>">Edit</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


        <!--ADD Image Preview MODEL-->
        <div class="uk-modal uk-close-btn" id="images_modal">
            <div class="uk-modal-dialog ">
                <div class="uk-modal-header">
                    <h5 class="uk-modal-title">
                    <div class="img-preview-heading">
                    </div>
                    <button id="modal-close" class="uk-close uk-close-btn" style="font-size: 25px; float:right;top: 2%;right: 2%;position: absolute;" type="button" uk-close></button>
                    </h5>
                </div>
                <div class="modal-body" style="height :100%; overflow-y:auto;">
                    <div class="uk-grid" id="show_images">
                        <!--  <div  class="uk-width-medium-1-4" >
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!--END Image Preview MODEL-->

        <!--ADD STL Preview MODEL-->
        <div class="uk-modal uk-close-btn" id="stl_preview_modal">
            <div class="uk-modal-dialog ">
                <div class="uk-modal-header">
                    <h5 class="uk-modal-title">
                    <div class="img-preview-heading">
                    </div>
                    <button id="stl_preview_modal_close" class="uk-close uk-close-btn" style="font-size: 25px; float:right;top: 2%;right: 2%;position: absolute;" type="button" uk-close></button>
                    </h5>
                </div>
                <div class="modal-body" id="stl_preview_modal_body" style="height :100%; overflow-y:auto;">
                    <div class="uk-grid" id="show_stl"></div>
                </div>
            </div>
        </div>
        <!--END STL Preview MODEL-->


<script type = "text/javascript"> 

    //For closing The Model
    $('#modal-close').click(function(){
         UIkit.modal('#images_modal').hide();
    });

    $('#stl_preview_modal_close').click(function(){
        UIkit.modal('#stl_preview_modal').hide();
    });

    //Image Preview Model
    $('.get-images').on('click', function(e){
        e.preventDefault();

            var patientID = $(this).data('id');
            var imageType = $(this).data('type');
            var img_url = "<?php echo site_url();?>assets/uploads/images/";

                $.ajax({
                url:"<?php echo base_url();?>doctor/getPatientImagetype/",
                type: 'GET',
                data: {'id':patientID, 'imageType':imageType},
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#show_images').html('');
                    $.each(response,function(index,data){

                    if(doesFileExist(img_url+data['img'])){

                        if(data['key'] == 'Intra Oral Images' ||data['key'] == 'OPG Images' ||data['key'] == 'Lateral C Images' ){
                            $('.img-preview-heading').text( "Intra Oral/ OPG/ Lateral C Images" );
                            $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                        }else if(data['key'] == 'Scans'){
                            $('.img-preview-heading').text( "Scans Images" );
                            $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                        }else if(data['key'] == 'Treatment Plan'){
                            $('.img-preview-heading').text( "Treatment Plan File" );
                            var html = '<div style="margin-top: 20px;"  class="uk-width-medium-3-6">'
                                html += '   <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1634213394583_50-0" data-fileindex="0" data-template="pdf" title="'+data['img']+'">'
                                html += '       <div class="kv-file-content">'
                                html += '           <embed class="kv-preview-data file-preview-pdf" src="'+img_url+data['img']+'" type="application/pdf" style="width:100%;height:160px;">'
                                html += '       </div>'
                                html += '       <div class="file-thumbnail-footer">'
                                html += '           <div class="file-footer-caption" title="'+data['img']+'">'
                                html += '               <div class="file-caption-info">'+data['img']+'</div>'
                                html += '               <div class="file-size-info"> <samp>(114.02 KB)</samp></div>'
                                html += '           </div>'   
                                html += '           <div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-plus-sign text-warning"></i></div>'
                                html += '           <div class="file-actions">'
                                html += '               <div class="file-footer-buttons">'
                                html += '                   <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>'
                                html += '               </div>'
                                html += '           </div>'
                                html += '           <div class="clearfix"></div>'
                                html += '       </div>'
                                html += '   </div>'
                                html += '</div>';
                            $('#show_images').append(html);
                            
                        }else if(data['key'] == 'IPR'){
                            $('.img-preview-heading').text( "IPR Images" );
                            $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                        }else if(data['key'] == 'Invoice'){
                            $('.img-preview-heading').text( "Invoice File" );
                            var html = '<div style="margin-top: 20px;"  class="uk-width-medium-3-6">'
                                html += '   <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1634213394583_50-0" data-fileindex="0" data-template="pdf" title="'+data['img']+'">'
                                html += '       <div class="kv-file-content">'
                                html += '           <embed class="kv-preview-data file-preview-pdf" src="'+img_url+data['img']+'" type="application/pdf" style="width:100%;height:160px;">'
                                html += '       </div>'
                                html += '       <div class="file-thumbnail-footer">'
                                html += '           <div class="file-footer-caption" title="'+data['img']+'">'
                                html += '               <div class="file-caption-info">'+data['img']+'</div>'
                                html += '               <div class="file-size-info"> <samp>(114.02 KB)</samp></div>'
                                html += '           </div>'   
                                html += '           <div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-plus-sign text-warning"></i></div>'
                                html += '           <div class="file-actions">'
                                html += '               <div class="file-footer-buttons">'
                                html += '                   <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>'
                                html += '               </div>'
                                html += '           </div>'
                                html += '           <div class="clearfix"></div>'
                                html += '       </div>'
                                html += '   </div>'
                                html += '</div>';
                            $('#show_images').append(html);
                        }
                        
                        UIkit.modal('#images_modal').show();
                        // location.reload(true);
                    }
                    });

                },
                error: function () {
                    alert('Data Not Deleted');
                }
            });

    });

    //STL Files Preview Modal
    $('.stl_preview').on('click', function(e){
        e.preventDefault();
        var patientID = $(this).data('id');
        var imageType = $(this).data('type');
        // var imageType = 'Intra Oral Images';
        var img_url = "<?php echo site_url();?>assets/uploads/images/";
        $.ajax({
            url:"<?php echo base_url();?>doctor/getPatientImagetype/",
            type: 'GET',
            data: {'id':patientID, 'imageType':imageType},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('.img-preview-heading').html('');
                // $('#show_stl').html('');
                var count = 0;
                $.each(response,function(index,data){

                if(doesFileExist(img_url+data['img'])){

                    if(data['key'] == 'Intra Oral Images' ||data['key'] == 'OPG Images' ||data['key'] == 'Lateral C Images' ){
                        $('.img-preview-heading').text( "Intra Oral/ OPG/ Lateral C Images" );
                    }else if(data['key'] == 'Scans'){
                        $('.img-preview-heading').text( "Scans Images" );
                    }else if(data['key'] == 'Treatment Plan'){
                        $('.img-preview-heading').text( "Treatment Plan File" );
                    }else if(data['key'] == 'IPR'){
                        $('.img-preview-heading').text( "IPR Images" );
                    }else if(data['key'] == 'Invoice'){
                        $('.img-preview-heading').text( "Invoice File" );
                    }

                    $('.img-preview-heading').text('STL File(3D File)');

                    $('#show_stl').append('<div class="uk-width-medium-2-6"><div id="stl_viewer_'+count+'"></div></div>');
                    UIkit.modal('#stl_preview_modal').show();
                    var stl_viewer=new StlViewer
                    (
                        document.getElementById("stl_viewer_"+count),
                        {
                            models:
                            [
                                {filename:"<?php echo site_url();?>assets/uploads/images/"+data['img']}
                            ]
                        }
                    );
                    count++;
                    // location.reload(true);
                }
                });
            },
            error: function () {
                alert('Data Not Deleted');
            }
        });
    });

   
</script> 