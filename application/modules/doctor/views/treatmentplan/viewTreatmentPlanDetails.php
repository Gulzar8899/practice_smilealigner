<div id="page_content">
        <div id="page_content_inner">
            <br>
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
            
              <div class="uk-grid">
                <div class="uk-width-medium-4-5">
                     <div class="uk-flex">

                        <span class="round-border">
                            <a href="<?= site_url('doctor/viewTreatmentPlan/'.$getSingleTreatmentPlan->patient_id); ?>">
                                <img src="<?php echo base_url('assets/images/left-arrow.svg'); ?>">                    
                            </a>
                        </span>
    
                        &nbsp;&nbsp;&nbsp;
                        <h1 class="patientMobile uk-margin-remove"><b>View Plan Details</b></h1>
                    </div>
                 
                </div>
                <div class="uk-width-medium-1-5 uk-flex uk-flex-right uk-flex-middle">

                    <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 1): ?>
                        <span class="req-modify-status" style="padding: 5% 10% 3.7%;"><img src="<?php echo base_url('assets/images/blue-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Modify</span>
                    <?php endif; ?>

                    <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 2): ?>
                        <span class="req-modify-status" style="padding: 5% 10% 3.7%;"><img src="<?php echo base_url('assets/images/blue-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Modify</span>
                    <?php endif; ?>

                   <?php if($getSingleTreatmentPlan->pre_status == 1 && $getSingleTreatmentPlan->status == 1): ?>
                         <span class="req-accept-status" style="padding: 5% 10% 3.7%;"><img src="<?php echo base_url('assets/images/tick-icon.svg'); ?>">&nbsp;&nbsp;&nbsp;Accepted</span>
                    <?php endif; ?>

                    <?php if($getSingleTreatmentPlan->pre_status == 1 && $getSingleTreatmentPlan->status == 2): ?>
                        <span class="req-reject-status" style="padding: 5% 10% 3.7%;"><img src="<?php echo base_url('assets/images/reject-cross-icon.svg'); ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                    <?php endif; ?>


                </div>

            </div>


            <!-- <h1 class="heading_a headingSize patientMobile uk-margin-bottom mt-15p"><b>Treatment Plan 1</b></h1> -->
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content" style="margin-top:33px;">
                    <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div>
                    <div class="uk-width-1-1" style="margin: 10px 12px 24px 15px;">
                        <p class="sub-title">Plan Information</p>
                        <p class="text-black">
                        <?= $getSingleTreatmentPlan->detail; ?>
                       </p>
                    </div>
                    <div class="uk-width-1-1">
                            <h5 class="pl-15p mt-5p mb-8p"><b>Upper</b> <?= $getTreatmentPlanDetails->upper_aligners ?></h5> 
                            <h5 class="pl-15p mt-5p mb-8p"><b>Lower </b> <?= $getTreatmentPlanDetails->lower_aligners ?></h5> 
                            <h5 class="pl-15p mt-5p mb-8p"><b>Approximate cost (PET-G Sheets):  =  Rs</b> <?= $getTreatmentPlanDetails->lower_aligners ?></h5> 
                            <h5 class="pl-15p mt-5p mb-8p"><b>Approximate cost (DUO Sheets): =  Rs</b> <?= $getTreatmentPlanDetails->lower_aligners ?></h5> 
                    </div>
                        <div class="uk-grid uk-margin-medium-top" style="margin-left:-20px;">
                            <div class="uk-width-large-1-5 uk-width-1-1 uk-margin-small-bottom">
                                <div class="plan-info uk-flex uk-flex-middle pl-15p br-8p">
                                    <div class="uk-flex uk-flex-middle uk-flex-left">
                                        <a><img src="<?php echo site_url('assets/images/Subtract.svg'); ?>"></a>
                                        <span class="ml-10p">Video.mp4</span>
                                    </div>
                                    <div>
                                        <a class="pr-10p" href="<?= site_url('doctor/getdownloadVideoPlanFile/').$getSingleTreatmentPlan->id; ?>"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-large-1-4 uk-width-1-1 uk-margin-small-bottom pl-25p">
                                <div class="plan-info uk-flex uk-flex-middle pl-15p br-8p">
                                    <div class="uk-flex uk-flex-middle uk-flex-left">
                                        <a><img src="<?php echo site_url('assets/images/pdf.svg'); ?>"></a>
                                        <span class="ml-10p">Treatment Plan.Pdf</span>                                        
                                    </div>

                                    <div>
                                        <a class="pr-10p" href="<?= site_url('doctor/getdownloadPdfPlanFile/').$getSingleTreatmentPlan->id; ?>"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-large-1-3 uk-width-1-1 pl-25p">
                                <div class="plan-info uk-flex uk-flex-middle pl-15p br-8p">
                                    <div class="uk-flex uk-flex-middle uk-flex-left">
                                        <a><img src="<?php echo site_url('assets/images/global1.svg'); ?>"></a>
                                        <span class="ml-10p" style="word-wrap:break-word !important;">
                                            <?php
                                                if(strlen($getSingleTreatmentPlan->link) <= 22){
                                                   echo $getSingleTreatmentPlan->link;
                                                }else{
                                                    echo substr($getSingleTreatmentPlan->link, 0, 22)."/.....";
                                                }   
                                             ?>
                                        </span>
                                    </div>
                                    <div>
                                        <a class="pr-10p"><img src="<?php echo site_url('assets/images/Vector (2).svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>

                             <!-- <div class="uk-width-large-3-5 uk-width-1-1 uk-margin-small-bottom pl-25p">
                                <div class="plan-info pl-15p br-8p">
                                    <div class="uk-grid uk-flex uk-flex-middle">
                                        <div class="uk-width-1-6">
                                             <a><img src="<?php echo site_url('assets/images/global1.svg'); ?>"></a>
                                        </div>
                                        <div class="uk-width-4-6 pl-0p">
                                             <span class="" style="word-wrap:break-word !important;"><?= $getSingleTreatmentPlan->link; ?></span>
                                        </div>
                                        <div class="uk-width-1-6">
                                            <a class=""><img src="<?php echo site_url('assets/images/Vector (2).svg'); ?>">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                     <!--    <div class="uk-grid">
                            <div class="uk-width-1-1 uk-flex uk-flex-right">
                                <a href="http://localhost/smilealigners/treatmentplanner/patient/editPatient/72" style="margin-right: 15px !important;" class="md-btn md-btn-primary add-pay-btn md-btn-wave-light waves-effect waves-button waves-light buttonStyling"> <img src="http://localhost/smilealigners/assets/images/edit-treat-icon.svg" alt="" class="">
                                      Edit Treatment Plan
                                    </a>
                            </div>
                        </div> -->
                    

          


                  <!--   <div class="uk-width-1-1">
                        <input style="float: right;margin-right: -18px;height:40px;margin-top:100px;" class="md-btn md-btn-primary btnNext" type="button" name="next" value="Back">
                    </div> -->


            </div>
        </div>


        <!-- Treatment Accepted -->
        <?php if($getSingleTreatmentPlan->pre_status == 1 && $getSingleTreatmentPlan->status == 1): ?>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content" style="margin-top:33px;  padding-top:0px !important; padding-bottom:0px !important;">
                    <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-large-6-10 pt-card-r-pd">
                                <h2 class="pt-20p">Treatment Plan Details</h2>
                                <br>
                                    <div class="uk-grid">
                                         <div class="uk-form-row parsley-row">
                                      <label for="gender" class="uk-form-label uk-margin-medium-top"><b>Type of Case</b></label>
                                      <br>
                                      <span class="icheck-inline mt-12p">
                                          <input type="radio" value="0" name="case_type" id="case_type" data-md-icheck checked/>
                                          <label for="case_type" class="inline-label">Unlimited</label>
                                      </span>
                                     <!--  <span class="icheck-inline">
                                          <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck />
                                          <label for="val_radio_female" class="inline-label">Yes</label>
                                      </span> -->
                                  </div>
                                    </div>

                                  <div class="uk-grid uk-margin-medium-top">
                                      <div class="uk-width-medium-1-3">
                                            <div class="uk-form-row parsley-row">
                                              <label for="gender" class="uk-form-label uk-margin-medium-top"><b>Type of Sheet: Upper</b></label>
                                              <br>

                                              <span class="icheck-inline mt-12p">
                                                  <input type="radio" value="0" name="upper_sheet_duo" id="upper_sheet_duo" data-md-icheck <?php if($getTreatmentPlanDetails->upper_sheet == 'upper'){ echo 'checked'; } ?>/>
                                                  <label for="upper_sheet_duo" class="inline-label">PUT Sheet Duo</label>
                                              </span>


                                             <!--  <span class="icheck-inline">
                                                  <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck />
                                                  <label for="val_radio_female" class="inline-label">Yes</label>
                                              </span> -->
                                          </div>
                                          
                                      </div>
                                      <div class="uk-width-medium-2-3">
                                          <p>Number of ALigners Requested</p>
                                          <p><b><?= $getTreatmentPlanDetails->upper_aligners ?></b></p>
                                      </div>
                                  </div>

                                  <div class="uk-grid">
                                      <div class="uk-width-medium-1-3">
                                            <div class="uk-form-row parsley-row">
                                              <label for="gender" class="uk-form-label uk-margin-medium-top"><b>Type of Sheet: Lower</b></label>
                                              <br>
                                              <span class="icheck-inline mt-12p">
                                                  <input type="radio" value="0" name="lower_sheet_duo" id="lower_sheet_duo" data-md-icheck <?php if($getTreatmentPlanDetails->lower_sheet != ''){ echo 'checked'; } ?>/>
                                                  <label for="lower_sheet_duo" class="inline-label">PUT Sheet Duo</label>
                                              </span>

                                             <!--  <span class="icheck-inline">
                                                  <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck />
                                                  <label for="val_radio_female" class="inline-label">Yes</label>
                                              </span> -->
                                          </div>
                                          
                                      </div>
                                      <div class="uk-width-medium-2-3">
                                          <p>Number of ALigners Requested</p>
                                          <p><b><?= $getTreatmentPlanDetails->lower_aligners ?></b></p>
                                      </div>
                                  </div>
                                

                            </div>



                            <div class="uk-width-large-4-10 fileSetting" style="margin-top: 20px;">
                                <h2>Further Aligners</h2>
                                <br>

                                 <?php 
                                    $remaining_u = $getSingleTreatmentPlan->upper - $getTreatmentPlanDetails->upper_aligners; 
                                    $remaining_l = $getSingleTreatmentPlan->lower - $getTreatmentPlanDetails->lower_aligners; 
                                ?>
                                 <div class="uk-grid">
                                      <div class="uk-width-medium-1-2">
                                            <label class="label-p" for="wizard_email"><b>Ordered <span>(12 Aug, 2021)</span></b></label>
                                            <input style="border-radius: 7px !important;" type="text" class="md-input input-border"  placeholder="3U 1L" name="" id="" value="<?= $getSingleTreatmentPlan->upper.'U '.$getSingleTreatmentPlan->lower.'L ' ; ?>" />
                                      </div>
                                      <div class="uk-width-medium-1-2">
                                            <label class="label-p" for="wizard_email"><b>Remaining <span>(12 Aug, 2021)</span></b></label>
                                            <input style="border-radius: 7px !important;" type="text" class="md-input input-border"  placeholder="2U 1L" name="" id="" value="<?= $remaining_u.'U '.$remaining_l.'L' ?>" />
                                      </div>
                                  </div>
                                    
                                    <p class="mb-0p uk-margin-medium-top" style="color:grey;font-size: 12px;">Next Order will be in 14 Days</p>
                                    <a class="uk-margin-small-top md-btn order-further-align-btn" href="">Order Further Alignment</a>



                            </div>
                        </div>

                </div>
            </div>
        <?php endif; ?>

        <!-- Treatment Rejected -->
        <?php if($getSingleTreatmentPlan->pre_status == 1 && $getSingleTreatmentPlan->status == 2): ?>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content" style="margin-top:33px;  padding-top:0px !important; padding-bottom:0px !important;">
                    <div class="uk-grid" data-uk-grid-margin>
                          <div class="uk-width-1-1" style="margin: 10px 12px 24px 15px;">
                                <p class="sub-title">Feedback</p>
                                <p class="text-black">
                                    <?= $getTreatmentPlanDetails->rejected_reason; ?>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Treatment Accepted Modify -->
        <?php if(empty($getAcceptedPatientPlan)){ ?>
            <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 1): ?>
                 <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content" style="margin-top:33px;  padding-top:0px !important; padding-bottom:0px !important;">
                        <form method="POST" action="<?= site_url('doctor/submitPlanDetails/').$getSingleTreatmentPlan->id; ?>" enctype="multipart/form-data">
                        <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <h2 class="pt-20p">Treatment Plan Details</h2>
                                    <br>
                                    <div class="uk-form-row parsley-row">
                                          <label for="gender" class="uk-form-label uk-margin-medium-top"><b>Type of Treatment*</b></label>
                                          <br>
                                          <span class="icheck-inline mt-12p">
                                              <input type="radio" value="full" name="treatment_type" id="treat_full" data-md-icheck />
                                              <label for="treat_full" class="inline-label">Full</label>
                                          </span>
                                          <span class="icheck-inline">
                                              <input type="radio" value="minimum" name="treatment_type" id="treat_min" data-md-icheck />
                                              <label for="treat_min" class="inline-label">Minimum</label>
                                          </span>
                                          <span class="icheck-inline">
                                              <input type="radio" value="aligners" name="treatment_type" id="treat_aligner" data-md-icheck />
                                              <label for="treat_aligner" class="inline-label">Per Aligners</label>
                                          </span>
                                      </div>

                                      <div class="uk-grid">
                                          <div class="uk-width-medium-1-3  uk-margin-medium-top">
                                                <div class="uk-form-row parsley-row">
                                                  <label for="gender" class="uk-form-label uk-margin-medium-top"><b>Type of Sheet: Upper*</b></label>
                                                  <br>
                                                  <span class="icheck-inline mt-12p">
                                                      <input type="radio" value="upper" name="type_upper" id="type_upper" data-md-icheck />
                                                      <label for="type_upper" class="inline-label">PUT Sheet Duo</label>
                                                  </span>
                                                 <!--  <span class="icheck-inline">
                                                      <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck />
                                                      <label for="val_radio_female" class="inline-label">Yes</label>
                                                  </span> -->
                                              </div>
                                              
                                          </div>
                                          <div class="uk-width-medium-2-3  uk-margin-medium-top">
                                                <div class="uk-width-medium-1-2">
                                                    <div class="md-input-wrapper"><label class="label-p" for="upper_aligners"><b>Number of ALigners Req</b><span class="req">*</span></label><input style="border-radius: 10px !important;" type="text" name="upper_aligners" id="upper_aligners" class="md-input demoInputBox  input-border" placeholder="Type the Number of ALigners"><span class="md-input-bar"></span></div>
                                                    
                                                </div>
                                          </div>
                                      </div>

                                      <div class="uk-grid uk-margin-medium-bottom">
                                          <div class="uk-width-medium-1-3 uk-margin-medium-top ">
                                                <div class="uk-form-row parsley-row">
                                                  <label for="gender" class="uk-form-label uk-margin-medium-top"><b>Type of Sheet: Lower*</b></label>
                                                  <br>
                                                  <span class="icheck-inline mt-12p">
                                                      <input style="border-radius: 10px !important;" type="radio" value="lower" name="type_lower" id="type_lower" data-md-icheck />
                                                      <label for="type_lower" class="inline-label">PUT Sheet Duo</label>
                                                  </span>
                                                 <!--  <span class="icheck-inline">
                                                      <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck />
                                                      <label for="val_radio_female" class="inline-label">Yes</label>
                                                  </span> -->
                                              </div>
                                              
                                          </div>
                                            <div class="uk-width-medium-2-3 uk-margin-medium-top">
                                                <div class="uk-width-medium-1-2">
                                                    <div class="md-input-wrapper"><label class="label-p" for="lower_aligners"><b>Number of ALigners Req</b><span class="req">*</span></label><input style="border-radius: 10px !important;" type="text" name="lower_aligners" id="lower_aligners" class="md-input demoInputBox  input-border" placeholder="Type the Number of ALigners"><span class="md-input-bar"></span></div>
                                                    
                                                </div>
                                          </div>
                                      </div>

                                      <div class="uk-grid uk-margin-medium-bottom">
                                          <div class="uk-width-1-1 uk-flex uk-flex-right">
                                              <button href="" type="submit" class="uk-margin-small-top md-btn md-btn-primary add-pay-btn md-btn-wave-light waves-effect waves-button waves-light buttonStyling"> Done
                                                </button>
                                          </div>
                                      </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        <?php } ?>


        <!-- Treatment Rejected Modify -->
        <?php if(empty($getAcceptedPatientPlan)){ ?>
            <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 2): ?>
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content" style="margin-top:33px;  padding-top:0px !important; padding-bottom:0px !important;">
                        <form method="POST" action="<?= site_url('doctor/submitRejectedPlanDetails/').$getSingleTreatmentPlan->id; ?>" enctype="multipart/form-data">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-1-1" style="margin: 10px 3px;">
                                <div class="">
                                    <label class="label-p" for="exampleFormControlFile1"><b style="font-size:24px;">Specify the changes required & Reason for Declining the plan*</b></label><br><br>
                                    <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                    <textarea placeholder="Enter here" class="md-input input-border" name="rejected_reason" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>
                                </div>
                            </div>
                              <div class="uk-width-1-1 uk-flex uk-flex-right uk-margin-medium-top uk-margin-large-bottom">
                                  <button type="submit" class="uk-margin-small-top md-btn md-btn-primary add-pay-btn md-btn-wave-light waves-effect waves-button waves-light buttonStyling"> Done
                                    </button>
                              </div>
                        </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        <?php } ?>


        <!-- Nothing -->
        <?php if(empty($getAcceptedPatientPlan)){ ?>
            <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 0): ?>
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content" style="margin-top:33px;  padding-top:0px !important; padding-bottom:0px !important;">
                        <div class="uk-grid uk-flex-middle" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2 uk-margin-medium-top uk-margin-medium-bottom">
                                    <p class="text-black">Lorem ipsum dolo sit amet consectetur adipisicing elit. </p>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-medium-top uk-margin-medium-bottom">

                                <div class="uk-margin-small-left uk-flex uk-flex-right">
                                    <a class="uk-margin-small-top md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="<?php echo base_url('doctor/rejectTreatmentPlan/').$getSingleTreatmentPlan->id; ?>">Reject</a>
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    <a class="uk-margin-small-top md-btn buttonStyling accept-btn" href="<?php echo base_url('doctor/acceptTreatmentPlan/').$getSingleTreatmentPlan->id; ?>">&nbsp;Accept&nbsp;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?> 
        <?php } ?>



    </div>
</div>