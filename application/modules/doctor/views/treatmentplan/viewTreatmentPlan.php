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
                <div class="uk-width-medium-1-1">
                     <div class="uk-flex n">
                        <span class="round-border">
                            <a href="<?= site_url('doctor/viewPatient/'.$patientID); ?>">
                                <img src="<?php echo base_url('assets/images/left-arrow.svg'); ?>">                    
                            </a>
                        </span>
                        &nbsp;&nbsp;&nbsp;
                        <h1 class="patientMobile uk-margin-remove"><b>Treatment Plans</b></h1>
                    </div>
                </div>
            </div>


            <div class="uk-grid">

                <?php foreach($getPatientTreatmentPlans as $treatmentPlans): ?>
                <?php $dt = new DateTime( $treatmentPlans->created_at);?>

                <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-medium-top">
                    <div class="uk-panel uk-panel-box view-treatment-d">
                        <span class="uk-flex uk-flex-between" style="align-items:center;">

                            
                            <span class="uk-flex">
                               <?php if($treatmentPlans->seen == 0): ?>
                                  <?php if($treatmentPlans->updated == 1): ?>
                                    <a class="uk-margin-small-top md-btn new-plan-d shiner-icon">New Plan</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <?php endif; ?>

                                     <?php if($treatmentPlans->updated == 2): ?>
                                    <a class="uk-margin-small-top md-btn new-plan-d shiner-icon">Updated Plan</a>
                                        &nbsp;&nbsp;&nbsp;
                                    <?php endif; ?>

                               <?php endif; ?>

                                <p style="margin: 9px 0px 0px 0px;"><b><?= $dt->format('d F').', '.$dt->format('Y'); ?></b></p>
                            </span>

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
                               <span class="req-reject-status"><img src="<?php echo base_url('assets/images/reject-cross-icon.svg'); ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                            <?php endif; ?>

                            <?php if($treatmentPlans->pre_status == 0 && $treatmentPlans->status == 0): ?>
                                <p class="m-0p"><b></b></p>
                            <?php endif; ?>
                               
                            </span>

                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-margin-medium-top">
                                    <span>
                                        <h3 style="margin:0px;"><b><?= ($treatmentPlans->title != '') ? $treatmentPlans->title : 'Treatment Plan Title';?></b></h3>
                                    </span>
                                </div>
                                <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-medium-top">
                                    
                                    <span class="p-5p">
                                         <a class="clickme" data-id="<?= $treatmentPlans->id; ?>" href="<?php echo base_url('doctor/viewTreatmentPlanDetails/').$treatmentPlans->id; ?>"><img src="<?php echo base_url('assets/images/view-plan-details.svg'); ?>">
                                         </a>
                                    </span>

                                    <!--  <span>
                                     <a class="md-btn view-treatmentPlan-case clickme" data-id="<?= $treatmentPlans->id; ?>" href="<?php echo base_url('doctor/viewTreatmentPlanDetails/').$treatmentPlans->id; ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Plan Details</a>
                                      </span> -->
                                </div>
                                
                            </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-medium-top">
                   <div class="uk-panel uk-panel-box view-treatment-d">
                        <span class="uk-flex uk-flex-between" style="align-items:center;">

                                <span class="uk-flex">
                                 
                                    <p style="margin: 9px 0px 0px 0px;"><b>14, August,2021</b></p>
                                </span>
                               
                                <span class="req-accept-status"><img src="http://localhost/smilealigners/assets/images/tick-icon.svg">&nbsp;&nbsp;&nbsp;Accepted</span>
                            </span>

                            <span class="uk-flex uk-flex-between" style="align-items:center; margin-top: 15px;">
                                <h3 style="margin:0px;">Treatment Plan AAA</h3>
                                <a class="md-btn view-treatmentPlan-case" href="<?php echo base_url('doctor/approvedTreatmentPlan') ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Plan Details</a>

                            </span>
                    </div>
                </div> -->

                <!--  <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-medium-top">
                     <div class="uk-panel uk-panel-box view-treatment-d">
                        <span class="uk-flex uk-flex-between" style="align-items:center;">

                                <span class="uk-flex">
                                
                                    <p style="margin: 9px 0px 0px 0px;"><b>14, August,2021</b></p>
                                </span>
                               
                                <span class="req-accept-status"><img src="http://localhost/smilealigners/assets/images/tick-icon.svg">&nbsp;&nbsp;&nbsp;Accepted</span>
                            </span>

                            <span class="uk-flex uk-flex-between" style="align-items:center; margin-top: 15px;">
                                <h3 style="margin:0px;">Treatment Plan AAA</h3>
                                <a class="md-btn view-treatmentPlan-case" href="<?php echo base_url('doctor/approvedTreatmentPlan2') ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Plan Details</a>

                            </span>
                    </div>
                </div> -->
<!-- 
                <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-medium-top">
                     <div class="uk-panel uk-panel-box view-treatment-d">
                        <span class="uk-flex uk-flex-between" style="align-items:center;">

                                <span class="uk-flex">
                               
                                    <p style="margin: 9px 0px 0px 0px;"><b>14, August,2021</b></p>
                                </span>
                             
                                <span class="req-reject-status"><img src="<?php echo base_url('assets/images/reject-cross-icon.svg') ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                            </span>

                            <span class="uk-flex uk-flex-between" style="align-items:center; margin-top: 15px;">
                                <h3 style="margin:0px;">Treatment Plan AAA</h3>
                                <a class="md-btn view-treatmentPlan-case" href="<?php echo base_url('doctor/rejectedTreatmentPlan') ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Plan Details</a>

                            </span>
                    </div>
                </div>
 -->
               <!--  <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-medium-top">
                     <div class="uk-panel uk-panel-box view-treatment-d">
                        <span class="uk-flex uk-flex-between" style="align-items:center;">

                                <span class="uk-flex">
                                 
                                    <p style="margin: 9px 0px 0px 0px;"><b>14, August,2021</b></p>
                                </span>
                              
                                <span class="req-reject-status"><img src="<?php echo base_url('assets/images/reject-cross-icon.svg') ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                            </span>

                            <span class="uk-flex uk-flex-between" style="align-items:center; margin-top: 15px;">
                                <h3 style="margin:0px;">Treatment Plan AAA</h3>
                                <a class="md-btn view-treatmentPlan-case" href="<?php echo base_url('doctor/rejectedTreatmentPlan2') ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Plan Details</a>

                            </span>
                    </div>
                </div> -->



                </div>

               


            </div>
 

            </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
            $('.clickme').on('click',function(){

                var id = $(this).attr('data-id');
                // alert(id);
                $.ajax({
                    url: '<?php echo base_url(); ?>doctor/updatePlanStatus',
                    method: 'POST',
                    data: {
                        'plan_id': id
                    },
                    success: function(remote_response) {
                        console.log(remote_response);
                        // location.reload(true);
                    }
                    
                });
               
            });
        });
</script>