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
                        <span class="">
                            <a href="<?= site_url('treatmentplanner/patient/viewPlan/'.$getSingleTreatmentPlan->patient_id); ?>">
                                <img src="<?php echo base_url('assets/images/left-arrow-round-bg.svg'); ?>">
                            </a>
                        </span>
                        &nbsp;&nbsp;&nbsp;
                        <h1 class="patientMobile uk-margin-remove"><b>View Plan Details</b></h1>
                    </div>
                 
                </div>
                
                     <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 1): ?>
                        <span class="req-modify-status" style=""><img src="<?php echo base_url('assets/images/blue-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Modify</span>
                    <?php endif; ?>

                    <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 2): ?>
                        <span class="req-modify-status" style=""><img src="<?php echo base_url('assets/images/blue-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Modify</span>
                    <?php endif; ?>

                    <?php if($getSingleTreatmentPlan->pre_status == 1 && $getSingleTreatmentPlan->status == 1): ?>
                         <span class="req-accept-status" style=""><img src="<?php echo base_url('assets/images/tick-icon.svg'); ?>">&nbsp;&nbsp;&nbsp;Accepted</span>
                    <?php endif; ?>

                    <?php if($getSingleTreatmentPlan->pre_status == 1 && $getSingleTreatmentPlan->status == 2): ?>
                        <span class="req-reject-status" style=""><img src="<?php echo base_url('assets/images/red-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                    <?php endif; ?>

<!-- 
                <div class="uk-width-medium-1-5 uk-flex uk-flex-right uk-flex-middle">
                       <span class="req-accept-status" style="padding: 5% 10% 3.7%;"><img src="http://localhost/smilealigners/assets/images/tick-icon.svg">&nbsp;&nbsp;&nbsp;Accepted</span>
                </div>
 -->
            </div>


            <!-- <h1 class="heading_a headingSize patientMobile uk-margin-bottom mt-15p"><b>Treatment Plan 1</b></h1> -->
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content" style="margin-top:33px;">
                    <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div>
                    <div class="uk-width-1-1" style="margin: 10px 12px 24px 15px;">
                                <p class="sub-title">Plan Information</p>
                                <p class="text-black">
                                 <?= $getSingleTreatmentPlan->detail; ?></p>
                    </div>
                     <div class="uk-width-1-1">
                            <h5 class="pl-15p mt-5p mb-8p"><b>Upper</b> <?= $getSingleTreatmentPlan->upper ?></h5> 
                            <h5 class="pl-15p mt-5p mb-8p"><b>Lower </b> <?= $getSingleTreatmentPlan->lower ?></h5> 
                            <h5 class="pl-15p mt-5p mb-8p"><b>Approximate cost (PET-G Sheets):  =  Rs</b> <?= $getSingleTreatmentPlan->petg_amount; ?></h5> 
                            <h5 class="pl-15p mt-5p mb-8p"><b>Approximate cost (DUO Sheets): =  Rs</b> <?= $getSingleTreatmentPlan->duo_amount; ?></h5> 
                    </div>

                        <div class="uk-grid uk-margin-medium-top" style="margin-left:-20px;">
                            <div class="uk-width-large-1-5 uk-width-1-1 uk-margin-small-bottom">
                                <div class="plan-info uk-flex uk-flex-middle pl-15p br-8p">
                                    <div class="uk-flex uk-flex-middle uk-flex-left">
                                        <a><img src="<?php echo site_url('assets/images/Subtract.svg'); ?>"></a>
                                        <span class="pl-10p">Video.mp4</span>
                                    </div>
                                    <div>
                                        <a class="pr-10p" href="<?= site_url('treatmentplanner/patient/getdownloadVideoPlanFile/').$getSingleTreatmentPlan->id; ?>"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-large-1-4 uk-width-1-1 uk-margin-small-bottom pl-25p">
                                <div class="plan-info uk-flex uk-flex-middle pl-15p br-8p">
                                    <div class="uk-flex uk-flex-middle uk-flex-left">
                                        <a><img src="<?php echo site_url('assets/images/pdf.svg'); ?>"></a>
                                        <span class="pl-10p">Treatment Plan.Pdf</span>
                                    </div>
                                    <div>
                                        <a class="pr-10p" href="<?= site_url('treatmentplanner/patient/getdownloadPdfPlanFile/').$getSingleTreatmentPlan->id; ?>"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-large-1-3 uk-width-1-1 pl-25p">
                                <div class="plan-info uk-flex uk-flex-middle pl-15p br-8p">
                                    <div  class="uk-flex uk-flex-middle uk-flex-left">
                                        <a><img src="<?php echo site_url('assets/images/global1.svg'); ?>"></a>
                                       <!--  <span class="ml-10p" style="word-wrap:break-word !important;"><?= (strlen($getSingleTreatmentPlan->link) > 22 ) ? substr($getSingleTreatmentPlan->link, 0, 22)."/....." : '- - -'; ?></span> -->
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
                        </div>



                    <!-- Treatment Rejected -->
                    <?php if($getSingleTreatmentPlan->pre_status == 1 && $getSingleTreatmentPlan->status == 2): ?>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-right">
                            <a href="<?php echo site_url('treatmentplanner/patient/editPlan/').$getSingleTreatmentPlan->id; ?>" style="margin-right: 15px !important;" class="md-btn md-btn-primary add-pay-btn md-btn-wave-light waves-effect waves-button waves-light buttonStyling"> <img src="<?php echo base_url('assets/images/edit-treat-icon.svg'); ?>" alt="" class="">
                                  Edit Treatment Plan
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

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
                                          <input type="radio" value="0" name="case_type" id="case_type" data-md-icheck  checked/>
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
                                                  <input type="radio" value="0" name="upper_sheet_duo" id="upper_sheet_duo" data-md-icheck <?php if($getTreatmentPlanDetails->upper_sheet != ''){ echo 'checked'; } ?>/>
                                                  <label for="upper_sheet_duo" class="inline-label">PUT Sheet <?= $getTreatmentPlanDetails->upper_sheet; ?></label>
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
                                                  <label for="lower_sheet_duo" class="inline-label">PUT Sheet <?= $getTreatmentPlanDetails->lower_sheet; ?></label>
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
                            <p class="text-black"><?= $getTreatmentPlanDetails->rejected_reason ?>
                           </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <!-- Treatment Accepted Modify -->
        <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 1): ?>
         
        <?php endif; ?>

        <!-- Treatment Rejected Modify -->
        <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 2): ?>
         
        <?php endif; ?>


        <!-- No Accpeted/Rejected -->
        <?php if($getSingleTreatmentPlan->pre_status == 0 && $getSingleTreatmentPlan->status == 0): ?>
         
        <?php endif; ?>

         

    </div>
</div>