<div id="page_content">
    <div id="page_content_inner">
        <br>
        <br>

    <?php foreach($singlePatient as $patientData): ?>

        <div class="uk-grid">
            <div class="uk-width-medium-3-5">
                <div class="uk-grid">
                    <div class="uk-width-medium-3-6">
                        <div class="uk-flex n">
                            <span class="round-border">
                                <a href="<?= site_url('treatmentplanner/patient/patientListing/'); ?>">
                                    <img src="<?php echo base_url('assets/images/left-arrow.svg'); ?>">                    
                                </a>
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            <h1 class="patientMobile uk-margin-remove"><b>Patient Card</b></h1>
                        </div>
                    </div>
                    <div class="uk-width-medium-3-6 uk-margin-small-top">
                        <span>
                            <a class="md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?php echo base_url('treatmentplanner/viewPlan') ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Treatment Plans</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-2-5 uk-margin-small-top" style="display: flex; justify-content: end;">
                  
               <a href="<?= base_url('treatmentplanner/patient/editPatient/').$patientData['pt_id']; ?>" style="margin-right: 15px !important;" class="md-btn md-btn-primary add-pay-btn md-btn-wave-light waves-effect waves-button waves-light buttonStyling"> <img src="<?php echo base_url('assets/images/edit-user-icon.svg'); ?>" alt="" class="">
                  Edit Patient Profile
                </a>

                <a href="<?php echo base_url('treatmentplanner/createPlan') ?>" class="md-btn buttonStyling accept-btn deposit-btn" style="background-color:#56BB6D !important;">
                      Create Plan
                </a>

            </div>
        </div>
        <!-- <h1 class="patientMobile"><b>Patient Card</b></h1> -->     
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-10-10">
                    <div class="md-card">


                        <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                            <div class="uk-width-large-6-10 pt-card-r-pd">


                                <div style="margin: 15px;">
                                    <div class="scrolling-wrapper uk-margin">
                                       <!--  <span class="round-border">
                                            <a href="http://localhost/smilealigners/treatmentplanner/patient/patientListing/">
                                                <img src="http://localhost/smilealigners/assets/images/left-arrow.svg">                    
                                            </a>
                                        </span> -->
                                        <div class="uk-margin-small-right">
                                            <button class="uk-button uk-button-default treatmentPlan-cases-btn-active"><b>Case 1</b></button>
                                        </div>
                                          <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>
                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>
                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>
                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>

                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>
                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>
                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>
                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>
                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>
                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>
                                         <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                        </div>


                                  <!--   <div class="mouse-horizontal-parent">
                                        <div class="mouse-horizontal-child">     -->
                                           <!--  <button class="uk-button uk-button-default treatmentPlan-cases-btn-active"><b>Case 1</b></button>
                                             <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 2</b></button>
                                             <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Case 3</b></button>  -->      
                                      <!--   </div>
                                    </div> -->
                                </div>
                                    
                                </div>
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
                                        </img>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="user_heading_content doctorViewNameSetting uk-flex">
                                        <h2 style="color:#6D3745 !important;" class="heading_b uk-margin-bottom">
                                            <span class="uk-text-truncate">
                                                <?= $patientData['pt_firstname']?>  &nbsp;<?= $patientData['pt_lastname'] ?>
                                            </span>

                                        </h2>
                                         <span class="req-reject-status"><img src="http://localhost/smilealigners/assets/images/red-ellipse.svg">&nbsp;&nbsp;&nbsp;Rejected</span>
                                      <!--  <span class="req-accept-status"><img src="http://localhost/smilealigners/assets/images/green-ellipse.svg">&nbsp;&nbsp;&nbsp;Accepted</span> -->
                                    </div>
                                </div>
                                <div class="user_content pb-0p">
                                    <ul id="" class="uk-margin mb-0p">
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Patient ID</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_id']?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Doctor</b></span>
                                            </div>   
                                            <div class="uk-width-large-6-10">
                                                <span>
                                                    <?= $patientData['first_name']; ?>
                                                    <?= $patientData['last_name']; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Email ID</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_email'] != '') ? $patientData['pt_email'] : 'N/A';?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Age</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_age'] != '') ? $patientData['pt_age'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Gender</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_gender'] != '') ? $patientData['pt_gender'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Treatment Objectives</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                               <!--  <span><?= ($patientData['pt_objective'] != '') ? $patientData['pt_objective'] : 'N/A'; ?></span> -->

                                                  <button class="accordion toggle accordian-br treatment-objective-accordion" id="to_fold"><span class=""><b id="to_fold_p" class="neutral-black">View</b></span>
                                                    <a><img style="float: right;padding:5px;" id="to_image" src="<?php echo site_url('assets/images/accordian_arrow.svg'); ?>"></a>
                                                </button>
                                                <div class="panel" style="padding-left: 0px; display: block;">
                                                    <div>
                                                        Street 121, Islamabad, Islamabad Capital Territory, Pakistan, 55000
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Referral Name</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_referal'] != '') ? $patientData['pt_referal'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Treatment Plan</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_treatment_plan'] != '') ? $patientData['pt_treatment_plan'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Approval Date</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_approval_date'] != '') ? $patientData['pt_approval_date'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Type of Treatment</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['type_of_treatment'] != null || $patientData['type_of_treatment'] != '') ? $patientData['type_of_treatment'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Status</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_custom_status'] != '') ? $patientData['pt_custom_status'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Type of Case</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['type_of_case'] != null || $patientData['type_of_case'] != '') ? $patientData['type_of_case'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Arches Treated</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['arc_treated'] != null || $patientData['arc_treated'] != '') ? $patientData['arc_treated'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>IPR to be Performed</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span>
                                                   <?php if($patientData['ipr_performed']==1) { echo 'Yes'; } else{ echo "No"; } ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Attachement to be Placed</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span>
                                                    <?php if($patientData['attachment_placed']==1) { echo 'Yes'; } else{ echo "No"; } ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>No of Aligners</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_aligners'] != '') ? $patientData['pt_aligners'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>No of Aligners Dispatched</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_aligners_dispatch'] != '') ? $patientData['pt_aligners_dispatch'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Cost of Plan</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_cost_plan'] != '') ? $patientData['pt_cost_plan'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Total Amount Paid</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_amount_paid'] != '') ? $patientData['pt_amount_paid'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Balance Amount</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_cost_plan'] - $patientData['pt_amount_paid']?></span>
                                            </div>
                                        </div>
                                      <!--   <?php foreach ($shipping_address as $key => $address): ?>
                                            <?php  if($address->doctor_id == $patientData['id'] && $address->default_shipping_address == 1){ ?>
                                                <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                    <div class="uk-width-large-4-10">
                                                        <span class="themeTextColor"><b>Shipping Address</b></span>
                                                    </div>
                                                    <div class="uk-width-large-6-10">
                                                         <span><?= $address->street_address.", ".$address->city.", ".$address->country; ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php endforeach; ?> -->

                                        <?php foreach ($shipping_address as $key => $address): ?>
                                            <?php  if($address->id == $patientData['pt_shipping_details']){ ?>
                                                <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                                    <div class="uk-width-large-4-10">
                                                        <span class="themeTextColor"><b>Shipping Address</b></span>
                                                    </div>
                                                    <div class="uk-width-large-6-10">
                                                         <span><?= ($address->country != '') ?  $address->street_address.", ".$address->city.", ".$address->state.", ".$address->country.", ".$address->zip_code : 'N/A'; ?></span>
                                                    </div>
                                                </div>
                                        
                                            <?php } ?>
                                        <?php endforeach; ?>

                                        <!-- <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Shipping Address</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_shipping_details']?></span>
                                            </div>
                                        </div> -->
                                        <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor"><b>Billing Address</b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_billing_address'] != '') ? $patientData['pt_billing_address'] : 'N/A'; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid pt-card-pd pt-card-b-pd pb-20p" data-uk-grid-margin>
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
                            <div class="uk-width-large-4-10 fileSetting" style="margin-top: 20px;">
                                
                                <!-- <div class="uk-grid"> -->
                                    <div class="uk-width-medium-1-1">
                                         <div class="md-card filesCardSetting border-radius-15p ml-12p" style="padding-left:0px;">
                                    <div class="md-card-content" style="padding: 10px;">
                                        <button class="accordion toggle accordian-br" id="fold"><span class=""><b id="fold_p" class="neutral-black">View</b></span>
                                            <a><img style="float: right;padding:5px;" id="image" src="<?php echo site_url('assets/images/accordian_arrow.svg'); ?>"></a>
                                        </button>
                                        <div class="panel bg-grey">
                                            <div><div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                <div>
                                                    <span class="pl-10p">Photos(15)</span>
                                                </div>
                                                <div>
                                                    <a class="pr-10p"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                                </div>
                                            </div></div>
                                            <p class="mb-5p"><b class="neutral-black">STL | DCM | PLY Files</b></p>
                                            <div><div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                <div>
                                                    <span class="pl-10p ">Files(3)</span>
                                                </div>
                                                <div>
                                                    <a class="pr-10p"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                                </div>
                                            </div></div>
                                            <p class="mb-5p"><b class="neutral-black">IPR Files</b></p>
                                            <div><div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                <div>
                                                    <span class="pl-10p ">IPR file(3)</span>
                                                </div>
                                                <div>
                                                    <a class="pr-10p"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                                </div>
                                            </div></div>
                                            <p class="mb-5p"><b class="neutral-black">Invoice</b></p>
                                            <div><div class="plan-info uk-flex uk-flex-middle uk-margin-medium-bottom" style="background-color:#FFFFFF!important;">
                                                <div>
                                                    <span class="pl-10p ">Invoice file(3)</span>
                                                </div>
                                                <div>
                                                    <a class="pr-10p"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                                </div>
                                            </div></div>
                                        </div>

                                        
                                    </div>
                                </div>  
                                    </div>
    
                                <div class="payment-sec-l">
                                    <div class="ml-12p mr-12p">
                                         <div class="uk-width-medium-1-1">
                                            <div class="sec-two">
                                                <h5>Number Of Alligners</h5>
                                                <h1>15U 10L</h1>
                                            </div>
                                        </div>

                                         <div class="uk-width-medium-1-1">
                                            <div class="sec-two">
                                                <h5>Number Of Alligners Required</h5>
                                                <h1>INR <?= $total_deposit_amount ?></h1>
                                            </div>
                                        </div>

                                         <div class="uk-width-medium-1-1">
                                            <div class="sec-two">
                                                <h5>Number Of Alligners Dispatched</h5>
                                                <h1>5U 10L</h1>
                                            </div>
                                        </div>

                                        <div class="uk-width-medium-1-1">
                                            <div class="sec-two">
                                                <h5>Further Alligners</h5>
                                                <h1>7U 3L</h1>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                       <!--  <div class="viewButtoMobile uk-flex-s uk-flex-between" style="padding-left: 24px; padding-right:24px;padding-bottom:24px;">
                            <div  class=" mobileDBESetting">
                                <a  class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deletePatientByID('<?= $patientID;  ?>');">Delete</a>
                            </div>
                            <div class="uk-flex-s">
                                <div class="uk-margin-small-right">
                                    <a class="md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('treatmentplanner/patient/patientListing'); ?>">Back</a>
                                </div>
                                <div class="">
                                    <a class="md-btn editbtnBackground btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('treatmentplanner/patient/editPatient/').$patientID; ?>">Edit</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
         <!--Image Preview MODEL-->
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

        <!--STL Preview MODEL-->
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
        UIkit.modal('.images_modal').hide();
    });
    $('#stl_preview_modal_close').click(function(){
        UIkit.modal('#stl_preview_modal').hide();
    });

    //Image Preview Model
    $('.get-images').on('click', function(e){
        e.preventDefault();
        var patientID = $(this).data('id');
        var imageType = $(this).data('type');
        // var imageType = 'Intra Oral Images';
        var img_url = "<?php echo site_url();?>assets/uploads/images/";
        $.ajax({
            url:"<?php echo base_url();?>treatmentplanner/Patient/getPatientImagetype/",
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
                    
                    UIkit.modal('.images_modal').show();
                
                }    // location.reload(true);
                
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
            url:"<?php echo base_url();?>treatmentplanner/Patient/getPatientImagetype/",
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

<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
acc[i].addEventListener("click", function() {
this.classList.toggle("active");
var panel = this.nextElementSibling;
if (panel.style.display === "block") {
panel.style.display = "none";
} else {
panel.style.display = "block";
}
});
}

</script>
<script type="text/javascript">
    const slider = document.querySelector('.scrolling-wrapper');
let isDown = false;
let startX;
let scrollLeft;
slider.addEventListener('mousedown', (e) => {
let rect = slider.getBoundingClientRect();
isDown = true;
slider.classList.add('active');
// Get initial mouse position
startX = e.pageX - rect.left;
// Get initial scroll position in pixels from left
scrollLeft = slider.scrollLeft;
console.log(startX, scrollLeft);
});
slider.addEventListener('mouseleave', () => {
isDown = false;
slider.dataset.dragging = false;
slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
isDown = false;
slider.dataset.dragging = false;
slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
if (!isDown) return;
let rect = slider.getBoundingClientRect();
e.preventDefault();
slider.dataset.dragging = true;
// Get new mouse position
const x = e.pageX - rect.left;
// Get distance mouse has moved (new mouse position minus initial mouse position)
const walk = (x - startX);
// Update scroll position of slider from left (amount mouse has moved minus initial scroll position)
slider.scrollLeft = scrollLeft - walk;
console.log(x, walk, slider.scrollLeft);
});
</script>
<!-- <script type="text/javascript">
    const slider = document.querySelector('.mouse-horizontal-parent');
let mouseDown = false;
let startX, scrollLeft;

let startDragging = function (e) {
  mouseDown = true;
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
};
let stopDragging = function (event) {
  mouseDown = false;
};

slider.addEventListener('mousemove', (e) => {
  e.preventDefault();
  if(!mouseDown) { return; }
  const x = e.pageX - slider.offsetLeft;
  const scroll = x - startX;
  slider.scrollLeft = scrollLeft - scroll;
});

// Add the event listeners
slider.addEventListener('mousedown', startDragging, false);
slider.addEventListener('mouseup', stopDragging, false);
slider.addEventListener('mouseleave', stopDragging, false);

</script> -->