<div id="page_content">
    <div id="page_content_inner">
        <h1 class="heading_a headingSize patientMobile uk-margin-bottom mt-40p"><b>Edit Treatment Plan</b></h1>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content" style="margin-top:33px;">
                <!-- <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div> -->

                <form method="POST" action="<?= site_url('treatmentplanner/patient/updatePlan'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="planID" value="<?= $getPatientTreatmentPlans->id; ?>">
                    <input type="hidden" name="patientID" value="<?= $getPatientTreatmentPlans->patient_id; ?>">
                        <div class="uk-width-1-1" style="margin: 10px 3px;">
                            <div class="">
                                <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan*</b></label><br><br>
                                <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                <textarea placeholder="Enter here"  class="md-input input-border" name="plan_detail" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $getPatientTreatmentPlans->detail ?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_upper"><b>Upper</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_upper" id="wizard_upper" class="md-input h-50 demoInputBox  input-border" placeholder="Count" value="<?= $getPatientTreatmentPlans->upper; ?>"><span class="md-input-bar"></span></div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_lower"><b>Lower</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_lower" id="wizard_lower" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Count" value="<?= $getPatientTreatmentPlans->lower; ?>"><span class="md-input-bar"></span></div>
                            </div>
                        </div>
                        <br>
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_pet_amount"><b>Pet g Amount</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_petg_amount" id="wizard_pet_amount" class="md-input h-50 demoInputBox  input-border" placeholder="Pet g Amount" value="<?= $getPatientTreatmentPlans->petg_amount; ?>"><span class="md-input-bar"></span></div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_duo_amount"><b>Duo Amount</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_duo_amount" id="wizard_duo_amount" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Duo Amount" value="<?= $getPatientTreatmentPlans->duo_amount; ?>"><span class="md-input-bar"></span></div>
                            </div>
                        </div>
              
                        <div class="uk-width-1-1" style="margin: 20px 3px;">
                            <div>
                                <label class="label-p" for="exampleFormControlFile1"><b>Link*</b></label><br>
                                <div class="uk-margin create-link">
                                    <input class="uk-input input-border" style="padding-left: 10px;width:98%;" type="text" placeholder="https//www.hyperlink.com/js" name="plan_link">
                                    <div class="bg-icon">
                                            <img src="<?php echo site_url('assets/images/bg.svg'); ?>">
                                    </div>
                                    <div class="global-icon">
                                            <a> <img src="<?php echo site_url('assets/images/global.svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1 file-upload">
                            <div>
                                <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan File Upload</b></label>

                                <div class="image-upload uk-margin-small-top" id="preview-plan-input">
                                    <label for="file-input" class="uk-flex">
                                        <img src="<?php echo base_url('assets/images/upload_icon.svg'); ?>" style="height: 20px;"/>
                                        <span class="text-black" style="margin-top:2px;margin-left:5px;">Upload PDF File</span>
                                    </label>

                                    <input id="file-input" name="plan_pdf_files[]" accept="application/pdf" class="user_files_images" type="file" multiple="" style="display: none;" onchange="javascript:updateList()" accept="application/pdf">
                                        
                                    <p></p>
                                    <div id="fileList"></div>
                                </div>

                            <?php if($getPatientTreatmentPlans->pdf_file != ''): ?>

                               <div class="uk-grid">
                                    <div style="margin-top: 20px;"  class="uk-width-medium-2-6" id="preview-plan-pdf">
                                        <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1634213394583_50-0" data-fileindex="0" data-template="pdf" title="'+response.img+'">
                                            <span id="<?= $getPatientTreatmentPlans->id; ?>" onclick="deletePdfPlanFile(this)" style="right: 0;color: red;position: absolute;" class="material-icons">delete</span>
                                            <div class="kv-file-content">
                                                <embed class="kv-preview-data file-preview-pdf" src="<?= $getPatientTreatmentPlans->pdf_file ?>" type="application/pdf" style="width:100%;height:160px;">
                                            </div>
                                            <div class="file-thumbnail-footer">
                                                <div class="file-footer-caption" title="'+response.img+'">
                                                    <div class="file-caption-info"><?= $getPatientTreatmentPlans->pdf_file; ?></div>
                                                    <div class="file-size-info"> <samp>(114.02 KB)</samp></div>
                                                </div>
                                                <div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-plus-sign text-warning"></i></div>
                                                <div class="file-actions">
                                                    <div class="file-footer-buttons">
                                                        <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                     </div>
                               </div>
                               
                            <?php endif; ?>

                            </div>
                        </div>
                        <div class="uk-width-1-1 file-upload uk-margin-medium-top">
                            <div>
                                <label class="label-p" for="exampleFormControlFile1"><b>Mp4 File</b></label><br>
                              <!--   <div class="file-upload-icon">
                                    <a><img src="<?php echo site_url('assets/images/Subtract.svg'); ?>">
                                        <span class="text-black ml-10p">Upload Mp4 File</span></a>
                                </div> -->
                                 <div class="image-upload" id="preview-plan-video-input">
                                    <label for="video-file-input" class="uk-flex">
                                        <img src="<?php echo base_url('assets/images/Subtract.svg'); ?>" style="height: 20px;"/>
                                        <span class="text-black" style="margin-top:2px;margin-left:5px;">Upload MP4 File</span>
                                    </label>

                                    <input id="video-file-input" name="plan_video_files[]" class="" type="file" multiple="" style="display: none;" accept="video/*" onchange="javascript:videoUpdateList()">
                                        
                                    <p></p>
                                    <!-- <div id="video_fileList"></div> -->
                                    <div id="videoFileList"></div>
                                </div>

                                <?php if($getPatientTreatmentPlans->video_file != ''): ?>
                                   <div class="uk-grid">
                                        <div style="margin-top: 20px; position: relative;"  class="uk-width-medium-2-6" id="preview-plan-video">
                                            <video width="320" height="240" controls>
                                                <source src="<?= $getPatientTreatmentPlans->video_file; ?>" type="video/mp4">
                                                <source src="<?= $getPatientTreatmentPlans->video_file; ?>" type="video/mkv">
                                                <source src="<?= $getPatientTreatmentPlans->video_file; ?>" type="video/ogg">
                                                
                                               

                                            </video>
                                             <span id="<?= $getPatientTreatmentPlans->id; ?>" onclick="deleteVideoPlanFile(this)" style="top: 0px; right: 0;color: red;position: absolute;" class="material-icons">delete</span>
                                                
                                         </div>
                                   </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="uk-width-1-1">
                            <input style="float: left;" class="md-btn md-btn-primary btnNext" type="button" name="next" id="next" value="Back">
                            <input style="float: right;margin-right: 10px;height:40px;" class="md-btn md-btn-primary btnNext" type="submit" name="next" id="next" value="update">
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                </form>

                </div>
            </div>
        </div>
    </div> 


<script type="text/javascript">
    updateList = function() {
        var input = document.getElementById('file-input');
        var output = document.getElementById('fileList');
        var children = "";
        for (var i = 0; i < input.files.length; ++i) {
            children += '<li>' + input.files.item(i).name + '</li>';
        }
        output.innerHTML = '<ul>'+children+'</ul>';
    }
     videoUpdateList = function() {
        // alert();
        var input = document.getElementById('video-file-input');
        var output = document.getElementById('videoFileList');


        var children = "";
        for (var i = 0; i < input.files.length; ++i) {
            children += '<li>' + input.files.item(i).name + '</li>';
        }
        output.innerHTML = '<ul>'+children+'</ul>';
    }
</script>

<script type="text/javascript">

    $(document).ready(function () {
        
        var planPDFFile = '<?php echo $getPatientTreatmentPlans->pdf_file;  ?>';
        if(planPDFFile){
           $('#preview-plan-input').hide();
        }else{
           $('#preview-plan-input').show();
        }

        var planVideoFile = '<?php echo $getPatientTreatmentPlans->video_file;  ?>';
        if(planVideoFile){
           $('#preview-plan-video-input').hide();
        }else{
           $('#preview-plan-video-input').show();
        }

    });
    // Delete PDF File
     function deletePdfPlanFile(plan_id) {
        var plan_id = plan_id.id;
        // alert(plan_id);
        $.ajax({
            url:"<?php echo base_url();?>treatmentplanner/patient/deletePdfPlanFile/"+ plan_id,
            type: 'POST',
            data: {"id":plan_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#preview-plan-pdf').hide();
                $('#preview-plan-input').show();
            },
            error: function () {
                alert('Data Not Deleted');
            }
        });
    }

    // Delete video File
     function deleteVideoPlanFile(plan_id) {
        var plan_id = plan_id.id;
        // alert(plan_id);
        $.ajax({
            url:"<?php echo base_url();?>treatmentplanner/patient/deleteVideoPlanFile/"+ plan_id,
            type: 'POST',
            data: {"id":plan_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#preview-plan-video').hide();
                $('#preview-plan-video-input').show();
            },
            error: function () {
                alert('Data Not Deleted');
            }
        });
    }


</script>