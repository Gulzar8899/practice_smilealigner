<div id="page_content">
        <div id="page_content_inner">
            <br>
            <br>
              <div class="uk-grid">
                <div class="uk-width-medium-4-5">
                     <div class="uk-flex">
                        <span class="round-border">
                            <a href="<?= site_url('treatmentplanner/patient/patientListing/'); ?>">
                                <img src="<?php echo base_url('assets/images/left-arrow.svg'); ?>">                    
                            </a>
                        </span>
                        &nbsp;&nbsp;&nbsp;
                        <h1 class="patientMobile uk-margin-remove"><b>View Plan Details</b></h1>
                    </div>
                 
                </div>
                <div class="uk-width-medium-1-5 uk-flex uk-flex-right uk-flex-middle">
                       <span class="req-reject-status"  style="padding: 5% 10% 3.7%;"><img src="<?php echo base_url('assets/images/reject-cross-icon.svg') ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                </div>

            </div>


            <!-- <h1 class="heading_a headingSize patientMobile uk-margin-bottom mt-15p"><b>Treatment Plan 1</b></h1> -->
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content" style="margin-top:33px;">
                    <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div>
                    <div class="uk-width-1-1" style="margin: 10px 12px 24px 15px;">
                                <p class="sub-title">Plan Information</p>
                                <p class="text-black">
                                Lorem ipsum dolo sit amet consectetur adipisicing elit. Veritatis, doloribus deserunrt exercitationem ducimus quos laudantium tenetur odit autem sequi molestiae nemo enim quod nisi repellat accusantium, at rem suscipit ab molestias unde! Laboriosam velit et doloremque porro commodi harum distinctio. Dignissimos obcaecati asperiores reiciendis quaerat ullam blanditiis alias porro modi rerum perferendis, pariatur esse, molestiae consequuntur beatae, aperiam animi illo sed suscipit? Officiis quas nobis nisi a. Iusto culpa architecto mollitia quidem commodi aliquam esse qui natus voluptate fugit dolorem adipisci nisi consequuntur tempora repellendus, omnis, possimus beatae facere deserunt provident? Voluptatum dignissimos expedita mollitia necessitatibus ab eum debitis, a deleniti natus maxime cupiditate aut reiciendis cum rerum asperiores architecto ut tenetur fuga officiis at error doloremque fugiat adipisci autem. Cumque ad consequatur, assumenda, est quos laudantium modi, dolore aut facere consequuntur eius officiis provident soluta eligendi maxime placeat voluptas dolores numquam alias nemo tenetur et.</p>
                    </div>
                        <div class="uk-grid" style="margin-left:-20px;">
                            <div class="uk-width-large-1-5 uk-width-1-1 uk-margin-small-bottom">
                                <div class="plan-info uk-flex uk-flex-middle pl-15p br-8p">
                                    <div>
                                        <a><img src="<?php echo site_url('assets/images/Subtract.svg'); ?>"></a>
                                        <span class="pl-10p">Video.mp4</span>
                                    </div>
                                    <div>
                                        <a class="pr-10p"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-large-1-4 uk-width-1-1 uk-margin-small-bottom pl-25p">
                                <div class="plan-info uk-flex uk-flex-middle pl-15p br-8p">
                                    <div>
                                        <a><img src="<?php echo site_url('assets/images/pdf.svg'); ?>"></a>
                                        <span class="pl-10p">Treatment Plan.Pdf</span>
                                    </div>
                                    <div>
                                        <a class="pr-10p"><img src="<?php echo site_url('assets/images/direct-download.svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-large-1-3 uk-width-1-1 pl-25p">
                                <div class="plan-info uk-flex uk-flex-middle pl-15p br-8p">
                                    <div>
                                        <a><img src="<?php echo site_url('assets/images/global1.svg'); ?>"></a>
                                        <span class="pl-10p">https//www.hyperlink.com/js</span>
                                    </div>
                                    <div>
                                        <a class="pr-10p"><img src="<?php echo site_url('assets/images/Vector (2).svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

          


                  <!--   <div class="uk-width-1-1">
                        <input style="float: right;margin-right: -18px;height:40px;margin-top:100px;" class="md-btn md-btn-primary btnNext" type="button" name="next" value="Back">
                    </div> -->


            </div>
        </div>


        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content" style="margin-top:33px;  padding-top:0px !important; padding-bottom:0px !important;">
                <div class="uk-grid" data-uk-grid-margin>
 
                            <div class="uk-width-1-1" style="margin: 10px 3px;">
                                <div class="">
                                    <label class="label-p" for="exampleFormControlFile1"><b style="font-size:24px;">Specify the changes required & Reason for Declining the plan*</b></label><br><br>
                                    <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                    <textarea placeholder="Enter here" class="md-input input-border" name="pt_treatment_plan" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>
                                </div>
                            </div>
                              <div class="uk-width-1-1 uk-flex uk-flex-right uk-margin-medium-top uk-margin-large-bottom">
                                  <a href="" class="uk-margin-small-top md-btn md-btn-primary add-pay-btn md-btn-wave-light waves-effect waves-button waves-light buttonStyling"> Done
                                    </a>
                              </div>
                </div>
            </div>
        </div>
    </div>
</div>