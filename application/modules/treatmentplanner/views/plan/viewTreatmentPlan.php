<div id="page_content">
    <div id="page_content_inner">
        <br>
        <br>

         <div class="uk-grid">
            <div class="uk-width-medium-1-1">
                 <div class="uk-flex n">
                    <span class="">
                        <a href="<?= site_url('treatmentplanner/patient/patientListing/'); ?>">
                            <img src="<?php echo base_url('assets/images/left-arrow-round-bg.svg'); ?>">                    
                        </a>
                    </span>
                    &nbsp;&nbsp;&nbsp;
                    <h1 class="patientMobile uk-margin-remove"><b>Treatment Plans</b></h1>
                </div>
            </div>
        </div>

        <div class="md-card">
            <div class="md-card-content">
            
                <h3 class="primary-color">Treatment Plans History</h3>
               

                <div class="uk-grid">

                    <?php $dt = new DateTime( $treatmentPlans->created_at);?>
                    <?php foreach($getPatientTreatmentPlans as $treatmentPlans): ?>
                    <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-medium-top">
                        <div class="uk-panel uk-panel-box view-treatment-d">
                                <span class="uk-flex uk-flex-between" style="align-items:center;">
                                    <p><?= $dt->format('d F').', '.$dt->format('Y'); ?></p>
                                    
                                    
                            <?php if($treatmentPlans->pre_status == 0 && $treatmentPlans->status == 1): ?>
                                 <span class="req-modify-status"><img src="<?php echo base_url('assets/images/blue-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Modify</span>
                            <?php endif; ?>

                            <?php if($treatmentPlans->pre_status == 0 && $treatmentPlans->status == 2): ?>
                                 <span class="req-modify-status"><img src="<?php echo base_url('assets/images/blue-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Modify</span>
                            <?php endif; ?>

                            <?php if($treatmentPlans->pre_status == 1 && $treatmentPlans->status == 1): ?>
                                <span class="req-accept-status"><img src="<?php echo base_url('assets/images/tick-icon.svg') ?>">&nbsp;&nbsp;&nbsp;Accepted</span>
                            <?php endif; ?>

                             <?php if($treatmentPlans->pre_status == 1 && $treatmentPlans->status == 2): ?>
                               <span class="req-reject-status"><img src="<?php echo base_url('assets/images/red-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                            <?php endif; ?>

                            <?php if($treatmentPlans->pre_status == 0 && $treatmentPlans->status == 0): ?>
                                <p class="m-0p"><b></b></p>
                            <?php endif; ?>
                                </span>

                               <!--  <span class="uk-flex uk-flex-between" style="align-items:center; margin-top: 15px;">
                                    <h3 class="text-black m-0p"><b><?= ($treatmentPlans->title != '') ? $treatmentPlans->title : 'Treatment Plan Title';?></b></h3>
                                    <a class="md-btn view-treatmentPlan-case" href="<?php echo base_url('treatmentplanner/patient/viewTreatmentPlanDetails/').$treatmentPlans->id; ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Plan Details</a>
                                </span> -->
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-margin-medium-top">
                                    <span>
                                        <h3 style="margin:0px;"><b><?= ($treatmentPlans->title != '') ? $treatmentPlans->title : 'Treatment Plan Title';?></b></h3>
                                    </span>
                                </div>
                                <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-medium-top">
                                     <span  class="p-5p">
                                         <a class="clickme" data-id="<?= $treatmentPlans->id; ?>" href="<?php echo base_url('treatmentplanner/patient/viewTreatmentPlanDetails/').$treatmentPlans->id; ?>"><img src="<?php echo base_url('assets/images/view-plan-details.svg'); ?>">
                                         </a>
                                      </span>
                                   <!--  <span>
                                     <a class="md-btn view-treatmentPlan-case clickme" data-id="<?= $treatmentPlans->id; ?>" href="<?php echo base_url('treatmentplanner/patient/viewTreatmentPlanDetails/').$treatmentPlans->id; ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Plan Details</a>
                                      </span> -->
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <?php endforeach; ?>

                   
                </div>

            </div>
        </div>

    </div>
</div>
