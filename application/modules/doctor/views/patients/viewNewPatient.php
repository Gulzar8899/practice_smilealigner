<div id="page_content">
    <div id="page_content_inner">
        <br>
        <br>

    <?php foreach($singlePatient as $patientData): ?>

        <div class="uk-grid">
            <div class="uk-width-medium-2-5">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <div class="uk-flex n">
                            <span class="">
                                <a href="<?= site_url('doctor/patientList/'); ?>">
                                    <img src="<?php echo base_url('assets/images/left-arrow-round-bg.svg'); ?>">                    
                                </a>
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            <h1 class="patientMobile uk-margin-remove"><b>Patient Card</b></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-3-5 uk-margin-small-top" style="display: block; justify-content:end;">
                    
                   <div style="text-align: right;">
                        <?php $i=0; ?>
                    <?php foreach($getPatientTreatmentPlans as $treatmentPlans): ?>
                    <?php if($treatmentPlans->seen == 0): ?>
                        <?php if($i == 0): ?>
                        <a class="uk-margin-small-top md-btn new-plan-d shiner-icon" href="<?php echo base_url('doctor/viewNewTreatmentPlan/').$patientData['pt_id']; ?>">New Plan</a>
                        <?php $i++; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>

                    <a class="uk-margin-small-top md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?php echo base_url('doctor/viewTreatmentPlan/').$patientData['pt_id']; ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Treatment Plans</a>
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?= base_url('doctor/editPatient/').$patientData['pt_id']; ?>" style="margin-right: 15px !important;" class="uk-margin-small-top md-btn md-btn-primary add-pay-btn md-btn-wave-light waves-effect waves-button waves-light buttonStyling"> <img src="<?php echo base_url('assets/images/edit-user-icon.svg'); ?>" alt="">
                              Edit Patient Profile
                    </a>
                   </div>

            </div>
        </div>
        <!-- <h1 class="patientMobile"><b>Patient Card</b></h1> -->     
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-10-10">
                    <div class="md-card">


                        <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                            <div class="uk-width-medium-3-5 pt-card-r-pd">

                                <div class="uk-grid">
                                    <div class="uk-width-9-10">
                                        <div style="margin: 15px;">
                                    <div class="scrolling-wrapper uk-margin">
                                        <div class="uk-margin-small-right" style="position: relative;">
                                            <input id="input-id-1" class="uk-button uk-button-default treatmentPlan-cases-btn-active pl-0p" placeholder="Scan 1" disabled><a id="1" onClick="myFunction123(this)"><img style="right: 10px; position: absolute; top: 8px;" class="case-icon-p" src="<?php echo  base_url('assets/images/edit-icon.svg') ?>"></a>
                                        </div>
                                         <div class="uk-margin-small-right" style="position: relative;">
                                            <input id="input-id-2" class="uk-button uk-button-default treatmentPlan-cases-btn pl-0p" placeholder="Scan 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Scan 2'" disabled><a id="2" onClick="myFunction123(this)"><img style="right: 10px; position: absolute; top: 8px;" class="case-icon-p" src="<?php echo  base_url('assets/images/edit-icon.svg') ?>"></a>
                                        </div>
                                       <!--  <div class="uk-margin-small-right">
                                            <button class="uk-button uk-button-default treatmentPlan-cases-btn-active"><b>Scan 1</b> <img class="case-icon-p" src="<?php echo  base_url('assets/images/edit-icon.svg') ?>"></button>
                                        </div>
                                          <div class="uk-margin-small-right">
                                           <button class="uk-button uk-button-default treatmentPlan-cases-btn"><b>Scan 2</b><img class="case-icon-p" src="<?php echo  base_url('assets/images/edit-icon.svg') ?>"></button>
                                        </div> -->


                                </div>
                                    
                                </div>
                                    </div>


                                    <div class="uk-width-1-10 p-0p">
                                        <div style="margin-top: 19px;">
                                            <span class="round-border" style="padding: 6px 10px;"><img src="<?php echo  base_url('assets/images/right-arr.svg') ?>"></span>
                                                                                            
                                        </div>
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

                                        <?php if(!empty($getAcceptedPatientPlan)){ ?>
                                            <span class="req-accept-status"><img src="<?php echo base_url('assets/images/green-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Accepted</span>
                                        <?php }elseif(!empty($getRejectedPatientPlan)){ ?>
                                            <span class="req-reject-status"><img src="<?php echo base_url('assets/images/red-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                                        <?php }elseif(!empty($getModifyAccPatientPlan) || !empty($getModifyAccPatientPlan)){ ?>

                                            <span class="req-modify-status"><img src="<?php echo base_url('assets/images/blue-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Modify</span>
                                        <?php }else{ ?>
                                            <span class="req-pending-status"><img src="<?php echo base_url('assets/images/yellow-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Pending</span>   
                                        <?php } ?>

                                       <!--   <span class="req-reject-status"><img src="http://localhost/smilealigners/assets/images/reject-cross-icon.svg">&nbsp;&nbsp;&nbsp;Rejected</span> -->
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
                                            <div class="uk-width-large-6-10 uk-flex">
                                               <!--  <span><?= ($patientData['pt_objective'] != '') ? $patientData['pt_objective'] : 'N/A'; ?></span> -->
                                             
                                                <div style="width:94%">
                                                     <p>Lorem ipsum dolor sit amet, consectetur adipis<span id="accordion-dots">...</span><span id="accordion-more">cing adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span></p>
                                                </div>
                                                <div style="width:6%">
                                                     <button href="" class="custom-accordion-drop-icon" onclick="readMoreFunction()" id="accordion-drop-btn"><img src="<?php echo base_url('assets/images/accordion-drop.svg') ?>"></button>
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
                                            <!-- <div class="uk-width-large-6-10">
                                                <span><?= ($patientData['pt_treatment_plan'] != '') ? $patientData['pt_treatment_plan'] : 'N/A'; ?></span>
                                            </div> -->
                                            <!-- Check if Array Empty -->
                                        <?php if(!empty($getPatientTreatmentPlans)){ ?>

                                            <?php 
                                                foreach($getPatientTreatmentPlans as $plans){
                                                    if($plans->pre_status == 1 && $plans->status == 1){
                                                        $planID = $plans->id;
                                                    }
                                                    if($plans->pre_status == 1 && $plans->status == 2){
                                                        $rejectedPlanID = $plans->id;
                                                    }
                                                    $patientID = $plans->patient_id;
                                                }
                                             ?>

                                            <?php if(!empty($getAcceptedPatientPlan)){ ?>

                                                <div class="uk-width-large-6-10">
                                                    <span><a href="<?php echo base_url('doctor/viewTreatmentPlanDetails/'.$getAcceptedPatientPlan->id) ?>" class="text-black">View Accepted Treatment Plan</a></span>
                                                </div>

                                            <?php }elseif(!empty($getRejectedPatientPlan)){ ?>
                                                  <div class="uk-width-large-6-10">
                                                        <span><a href="<?php echo base_url('doctor/viewTreatmentPlanDetails/'.$rejectedPlanID) ?>" class="text-black">View Rejected Treatment Plan</a></span>
                                                    </div>

                                            <?php }elseif(!empty($getModifyAccPatientPlan) || !empty($getModifyAccPatientPlan)){ ?>
                                                <div class="uk-width-large-6-10">
                                                    <span><a href="<?php echo base_url('doctor/viewPlan/'.$patientID) ?>" class="text-black">View Treatment Plan</a></span>
                                                </div>

                                            <?php }else{ ?>
                                                <div class="uk-width-large-6-10">
                                                    <span><a href="<?php echo base_url('doctor/viewPlan/'.$patientID) ?>" class="text-black">View Treatment Plan</a></span>
                                                </div>
                                            <?php } ?>


                                        <?php }else{ ?>

                                            <div class="uk-width-large-6-10">
                                                <span><?= 'N/A'; ?></span>
                                            </div>

                                        <?php } ?>

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
                                        <div class="uk-grid pt-card-pd pb-20p" data-uk-grid-margin>
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


                            <div class="uk-width-medium-2-5 fileSetting" style="margin-top: 20px;">
                                
                                <!-- <div class="uk-grid"> -->
                                    <div class="uk-width-medium-1-1">
                                         <div class="md-card filesCardSetting border-radius-15p ml-12p" style="padding-left:0px;">
                                    <div class="md-card-content" style="padding: 10px;">

                                       

                                       <!--  <button class="accordion toggle accordian-br" id="fold"><span class=""><b id="fold_p" class="neutral-black">View</b></span>
                                            <a><img style="float: right;padding:5px;" id="image" src="<?php echo site_url('assets/images/accordian_arrow.svg'); ?>"></a>
                                        </button> -->

                                        <?php $oral_opg_lateral_count=0; ?>
                                        <?php $stl_count=0; ?>
                                        <?php $ipr_count=0; ?>
                                        <?php foreach($patientData['patient_photos'] as $photos){
                                            if($photos['key'] == 'Lateral C Images' || $photos['key'] == 'OPG Images' || $photos['key'] == 'Intra Oral Images'){
                                                $oral_opg_lateral_count++;
                                            }elseif($photos['key'] == 'STL File(3D File)'){
                                                $stl_count++;
                                            }elseif($photos['key'] == 'IPR'){
                                                 $ipr_count++;
                                            }
                                        }
                                        ?>
                                    <div class="">
                                        <div class="uk-accordion" data-uk-accordion id="my-accordion">
                                        <h3 class="uk-accordion-title" style="background: rgb(237 237 237);"><b>View</b></h3>
                                            <div class="uk-accordion-content">
                                                <p class="mb-5p"><b class="neutral-black">Intra Oral | OPG | Lateral</b></p>
                                                <div>
                                                    <div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                        <div>
                                                        <?php $oral_opg_lateral_count=0; ?>
                                                        <?php $stl_count=0; ?>
                                                        <?php $ipr_count=0; ?>
                                                        <?php foreach($patientData['patient_photos'] as $photos){
                                                            if($photos['key'] == 'Lateral C Images' || $photos['key'] == 'OPG Images' || $photos['key'] == 'Intra Oral Images'){
                                                                $oral_opg_lateral_count++;
                                                            }elseif($photos['key'] == 'STL File(3D File)'){
                                                                $stl_count++;
                                                            }elseif($photos['key'] == 'IPR'){
                                                                 $ipr_count++;
                                                            }
                                                        } 
                                                        ?>
                                                         <a class="pr-10p get-images text-black"  data-id="<?php echo $patientData['pt_id']; ?>" data-type="oral_opg_lateral"><span class="pl-10p">Photos(<?= $oral_opg_lateral_count; ?>)</span></a>
                                                        </div>
                                                        <div>
                                                             <a href="<?= site_url('doctor/getdownloadPostFile/oral_opg_lateral/').$patientData['pt_id']; ?>" class="uk-flex uk-flex-between pr-10p">
                                                                <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                            </div>
                                            <p class="mb-5p"><b class="neutral-black">STL | DCM | PLY Files</b></p>
                                            <div><div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                <div>
                                                     <a class="pr-10p stl_preview text-black"  data-id="<?php echo $patientData['pt_id']; ?>" data-type="stl_file"><span class="pl-10p">Files(<?= $stl_count; ?>)</span></a>
                                                    
                                                </div>
                                                <div>
                                                    <a href="" class="uk-flex uk-flex-between pr-10p">
                                                        <span><img src=""></span>
                                                    </a>
                                                </div>
                                            </div></div>
                                            <p class="mb-5p"><b class="neutral-black">IPR Files</b></p>
                                            <div><div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                <div> 
                                                    <a class="pr-10p get-images text-black"  data-id="<?php echo $patientData['pt_id']; ?>" data-type="ipr_file"> <span class="pl-10p ">IPR file(<?= $ipr_count; ?>)</span></a>
                                                   
                                                </div>
                                                <div>
                                                    <a href="<?= site_url('doctor/getdownloadPostFile/ipr_files/').$patientData['pt_id']; ?>" class="uk-flex uk-flex-between pr-10p">
                                                        <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                    </a>
                                                </div>
                                            </div></div>


                                                </div>

                                               

                                            </div>

                                           
                                        </div>



                                        
                                    </div>
                                </div>  
                                    </div>



                                    <!-- IMPRESSIoN -->
                                    <!-- <div class="uk-grid"> -->
<!--                                     <div class="uk-width-medium-1-1 uk-margin-medium-top">
                                         <div class="md-card filesCardSetting border-radius-15p ml-12p" style="padding-left:0px;">
                                    <div class="md-card-content" style="padding: 10px;">

                                    <div class="md-card-content" style="padding: 10px;">
                                        <div class="uk-accordion" data-uk-accordion >

                                                <h3 class="uk-accordion-title" style="background: rgb(237 237 237);"><b>Impression</b></h3>
                                                <div class="uk-accordion-content" style="padding:8px;">
                                                    <table class="uk-table uk-table-divider scan-impression-table uk-border-rounded">
                                                        <thead>
                                                            <tr>
                                                                <th ><b>ID</b></th>
                                                                <th ><b>Date</b></th>
                                                                <th ><b>Status</b></th>
                                                                <th ><b>Feedback</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody >
                                                            <tr>
                                                                <td>12</td>
                                                                <td>12 August, 2021</td>
                                                                <td class=" custom-accept-btn">Accepted</td>
                                                                <td>----</td>
                                                            </tr>
                                                            <tr>
                                                                <td>13</td>
                                                                <td>12 August, 2021</td>
                                                                <td class=" custom-decline-btn">Declined</td>
                                                                <td>----</td>
                                                            </tr>
                                                            <tr>
                                                                <td>14</td>
                                                                <td>12 August, 2021</td>
                                                                <td class=" custom-pending-btn">Pending</td>
                                                                <td>----</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>


                                        
                                    </div>
                                </div>  
                                    </div> -->

                                    <?php if(!empty($getAcceptedPatientPlan)){ ?>

                                            <!-- Aligners -->
                                              <div class="payment-sec-l">
                                                <div class="ml-12p mr-12p">
                                                     <div class="uk-width-medium-1-1">
                                                        <div class="sec-two">
                                                            <h5>Number Of Alligners</h5>
                                                            <h1><?= $getAcceptedPatientPlan->upper.'U '. $getAcceptedPatientPlan->lower.'L' ?></h1>
                                                        </div>
                                                    </div>

                                                     <div class="uk-width-medium-1-1">
                                                        <div class="sec-two">
                                                            <h5>Number Of Alligners Required</h5>
                                                            <h1><?= $plan_details->upper_aligners.'U '. $plan_details->lower_aligners.'L' ?></h1>
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
                                                            <h1><?= $getAcceptedPatientPlan->upper-$plan_details->upper_aligners.'U '. $getAcceptedPatientPlan->lower-$plan_details->lower_aligners.'L' ?></h1>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- Left Side Treatment Plan -->
                                             <?php $dt = new DateTime($getAcceptedPatientPlan->created_at);?>
                                             <div class="uk-panel uk-panel-box view-treatment-d" style=" padding:10px;margin: 20px 16px !important;">
                                                <span class="uk-flex uk-flex-between" style="align-items:center;">
                                                        <p class="m-0p"><?= $dt->format('d F').', '.$dt->format('Y'); ?></p>
                                                        <span class="req-accept-status"><img src="<?php echo base_url('assets/images/tick-icon.svg'); ?>">&nbsp;&nbsp;&nbsp;Accepted</span>
                                                    </span>

                                                    <span class="uk-flex uk-flex-between" style="align-items:center; margin-top: 15px;">
                                                        <h5 style="margin:0px;"><?= $getAcceptedPatientPlan->title; ?></h5>
                                                        <a class="" href="<?php echo base_url('doctor/viewTreatmentPlanDetails/'.$getAcceptedPatientPlan->id); ?>"><img src="<?php echo base_url('assets/images/view-plan-details.svg'); ?>"></a>
                                                    </span>
                                            </div>
                                        
                                <?php }elseif(!empty($getRejectedPatientPlan)){ ?>
                                       
                                             <?php $dt = new DateTime($getRejectedPatientPlan->created_at);?>
                                             <div class="uk-panel uk-panel-box view-treatment-d" style=" padding:10px;margin: 20px 16px !important;">
                                                <span class="uk-flex uk-flex-between" style="align-items:center;">
                                                        <p class="m-0p"><?= $dt->format('d F').', '.$dt->format('Y'); ?></p>
                                                        <span class="req-reject-status"><img src="<?php echo base_url('assets/images/red-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                                                    </span>

                                                    <span class="uk-flex uk-flex-between" style="align-items:center; margin-top: 15px;">
                                                        <h5 style="margin:0px;"><?= $getRejectedPatientPlan->title; ?></h5>
                                                        <a class="" href="<?php echo base_url('doctor/viewTreatmentPlanDetails/'.$getRejectedPatientPlan->id); ?>"><img src="<?php echo base_url('assets/images/view-plan-details.svg'); ?>"></a>
                                                    </span>
                                            </div>
                                        
                                <?php }?>

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
        <div class="uk-modal uk-close-btn images_modal" id="images_modal">
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

                    <h3 class="img-preview-heading-opg mb-0p">OPG Images</h3><br>

                     <div class="uk-grid" id="show_opg_images">
                        <!--  <div  class="uk-width-medium-1-4" >
                        </div> -->
                    </div>
    
                    <h3 class="img-preview-heading-lateral mb-0p">Lateral C Images</h3><br>

                    <div class="uk-grid" id="show_lateral_images">
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
                <div class="modal-body" id="stl_preview_modal_body" style="height :100%;">

                    <div class="uk-grid" id="show_stl"></div>

                    <div style="overflow-x:auto;">
                        <div class="uk-grid show_stl_icon">
                        
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!--END STL Preview MODEL-->

<script type="text/javascript">
    function doesFileExist(urlToFile) {
        var xhr = new XMLHttpRequest();
        xhr.open('HEAD', urlToFile, false);
        xhr.send();
         
        return xhr.status !== 404;
    }
</script>

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
        var statis_img_url = "<?php echo site_url();?>assets/images/";

        var img_site_url =  "<?php echo site_url();?>";
        // alert(patientID);
        $.ajax({
            url:"<?php echo base_url();?>doctor/getPatientImagetype/",
            type: 'GET',
            data: {'id':patientID, 'imageType':imageType},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#show_images').html('');
                $('#show_opg_images').html('');
                $('#show_lateral_images').html('');
                $('.img-preview-heading-opg').html('');
                $('.img-preview-heading-lateral').html('');

                $.each(response,function(index,data){

                if(doesFileExist(img_url+data['img'])){

                    if(data['key'] == 'Intra Oral Images' ||data['key'] == 'OPG Images' ||data['key'] == 'Lateral C Images' ){
                        if( data['key'] == 'Intra Oral Images'){
                        $('.img-preview-heading').text( "Intra Oral Images" );

                             $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><div style="position:relative;"><img class="image-preview-popup-d" src="'+img_url+data['img']+'"><span class="image-preview-popup-down"><a href="'+img_site_url+'treatmentplanner/patient/getdownloadSinglePostFile/'+data['photos_id']+'"><img src="'+statis_img_url+'download-arrow.svg"></a></span></div></div>');
                        }
                        if( data['key'] == 'OPG Images'){
                        $('.img-preview-heading-opg').text( "OPG Images" );

                            $('#show_opg_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><div style="position:relative;"><img class="image-preview-popup-d" src="'+img_url+data['img']+'"><span class="image-preview-popup-down"><a href="'+img_site_url+'treatmentplanner/patient/getdownloadSinglePostFile/'+data['photos_id']+'"><img src="'+statis_img_url+'download-arrow.svg"></a></span></div></div>');
                        }
                        if( data['key'] == 'Lateral C Images'){
                        $('.img-preview-heading-lateral').text( "Lateral C Images" );

                            $('#show_lateral_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><div style="position:relative;"><img class="image-preview-popup-d" src="'+img_url+data['img']+'"><span class="image-preview-popup-down"><a href="'+img_site_url+'treatmentplanner/patient/getdownloadSinglePostFile/'+data['photos_id']+'"><img src="'+statis_img_url+'download-arrow.svg"></a></span></div></div>');

                        }
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
                        $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><div style="position:relative;"><img class="image-preview-popup-d" src="'+img_url+data['img']+'"><span class="image-preview-popup-down"><a href="'+img_site_url+'treatmentplanner/patient/getdownloadSinglePostFile/'+data['photos_id']+'"><img src="'+statis_img_url+'download-arrow.svg"></a></span></div></div>');
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
        var static_img_url = "<?php echo base_url();?>assets/images/";

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
                $('.img-preview-heading-opg').html('');
                $('.img-preview-heading-lateral').html('');
                $('.show_stl_icon').html('');
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


                    if(count == 0){
                        $('.show_stl_icon').append('<div  class="uk-width-medium-1-4 stl-preview-active"><div class="stl-preview-bg"><img class="" src="'+static_img_url+'3d-stl-icon.svg"><br><br><span class="stl-preview-popup-down"><img src="'+static_img_url+'download-arrow.svg"></span></div></div><br><br>');
                    }else{
                          $('.show_stl_icon').append('<div class="uk-width-medium-1-4"><div class="stl-preview-bg"><img class="" src="'+static_img_url+'3d-stl-icon.svg"><br><br><span class="stl-preview-popup-down"><img src="'+static_img_url+'download-arrow.svg"></span></div></div><br><br>');
                    }




                    if(count == 0){
                        $('#show_stl').append('<div class="uk-width-medium-1-1 stl-view-v" style="display:visible;"><div id="stl_viewer_'+count+'" class="stl_viewer_active"></div></div>');
                    }else{
                        $('#show_stl').append('<div class="uk-width-medium-1-1 stl-view-n" style="display:none;"><div id="stl_viewer_'+count+'" class="stl_viewer_active"></div></div>');
                    }


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

<script>
function  readMoreFunction() {
    // alert();
  var dots = document.getElementById("accordion-dots");
  var moreText = document.getElementById("accordion-more");
  var btnText = document.getElementById("accordion-drop-btn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
     $("#accordion-drop-btn").removeClass("custom-accordion-rotate-down");
     $("#accordion-drop-btn").addClass("custom-accordion-rotate-up");
    // btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
     $("#accordion-drop-btn").removeClass("custom-accordion-rotate-up");

     $("#accordion-drop-btn").addClass("custom-accordion-rotate-down");

    dots.style.display = "none";
    // btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
<script type="text/javascript">
    // Delete PDF File
     function myFunction123(ukid) {
        var id = ukid.id;
        // alert(id);
        if(id == 1){
            $("#input-id-1").attr("disabled",false);
        }else{
            $("#input-id-2").attr("disabled",false);
        }
        // $.ajax({
        //     url:"<?php echo base_url();?>treatmentplanner/patient/deletePdfPlanFile/"+ plan_id,
        //     type: 'POST',
        //     data: {"id":plan_id},
        //     dataType: 'json',
        //     success: function(response) {
        //         console.log(response);
        //         $('#preview-plan-pdf').hide();
        //         $('#preview-plan-input').show();
        //     },
        //     error: function () {
        //         alert('Data Not Deleted');
        //     }
        // });
    }
</script>