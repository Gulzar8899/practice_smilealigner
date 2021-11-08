<div id="page_content">
    <div id="page_content_inner">
        <h1 class="heading_a headingSize patientMobile uk-margin-bottom mt-40p"><b>Edit Treatment Plan</b></h1>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content" style="margin-top:33px;">
                <!-- <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div> -->

                <form method="POST" action="<?= site_url('treatmentplanner/patient/updatePlan'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="planID" value="<?= $getPatientTreatmentPlans->id; ?>">
                    <input type="hidden" name="patientID" value="<?= $getPatientTreatmentPlans->patient_id; ?>">
                         <div class="uk-width-1-1" style="margin: 0px 3px;">
                            <div class="md-input-wrapper"><label class="label-p" for="title"><b>Title</b><span class="req">*</span></label>
                                    <br><br>
                            <input type="text" name="title" id="title" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Title" style="border-radius:16px !important;" value="<?= $getPatientTreatmentPlans->title; ?>" required><span class="md-input-bar"></span></div>
                        </div>
                        <div class="uk-width-1-1 mt-20p" style="margin: 0px 3px;">
                            <div class="">
                                <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan*</b></label><br><br>
                                <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                <textarea placeholder="Enter here"  class="md-input input-border" name="plan_detail" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.." required><?= $getPatientTreatmentPlans->detail ?></textarea>
                            </div>
                        </div>

                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2 mt-20p">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_upper"><b>Upper</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_upper" id="wizard_upper" class="md-input h-50 demoInputBox  input-border" placeholder="Count" style="border-radius:16px !important;" value="<?= $getPatientTreatmentPlans->upper; ?>" required><span class="md-input-bar"></span></div>
                            </div>
                            <div class="uk-width-medium-1-2 mt-20p">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_lower"><b>Lower</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_lower" id="wizard_lower" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Count" style="border-radius:16px !important;" value="<?= $getPatientTreatmentPlans->lower; ?>" required><span class="md-input-bar"></span></div>
                            </div>
                        </div>

                        <div class="uk-grid mt-0p">
                            <div class="uk-width-medium-1-2 mt-20p">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_pet_amount"><b>Pet g Amount</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_petg_amount" id="wizard_pet_amount" class="md-input h-50 demoInputBox  input-border" placeholder="Pet g Amount" style="border-radius:16px !important;" value="<?= $getPatientTreatmentPlans->petg_amount; ?>" required><span class="md-input-bar"></span></div>
                            </div>
                            <div class="uk-width-medium-1-2 mt-20p">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_duo_amount"><b>Duo Amount</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_duo_amount" id="wizard_duo_amount" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Duo Amount" style="border-radius:16px !important;" value="<?= $getPatientTreatmentPlans->duo_amount; ?>" required><span class="md-input-bar"></span></div>
                            </div>
                        </div>
                        
                         <div class="uk-width-1-1 mt-20p" style="margin: 0px 3px;">
                            <label class="label-p" for="exampleFormControlFile1"><b>Link*</b></label>
                            <br><br>
                            <div class="uk-flex-inline input-border uk-flex-middle w-100" style="border-radius:16px;">
                               
                                <input class="uk-input w-100" oninvalid="pdfInvalidMsg(this);"  style="margin: 5px; padding: 10px;border: 0px;border:0px" type="text" placeholder="https//www.hyperlink.com/js" name="plan_link" value="<?= $getPatientTreatmentPlans->link; ?>" required>
                                 <span class="uk-form-icon uk-form-icon-flip uk-icon" style="padding: 16px; border-radius: 0px 16px 16px 0px;background-color: #6d3745;" uk-icon="icon: lock"><img src="<?php echo site_url('assets/images/global.svg'); ?>"></span>
                            </div>

                            <!-- <div>
                                <label class="label-p" for="exampleFormControlFile1"><b>Link*</b></label><br>
                                <div class="uk-margin create-link">
                                    <input class="uk-input input-border" style="width:98%;padding-left: 20px;" type="text" placeholder="https//www.hyperlink.com/js" name="plan_link" required>
                                    <div class="bg-icon">
                                            <img src="<?php echo site_url('assets/images/bg.svg'); ?>">
                                    </div>
                                    <div class="global-icon">
                                            <a> <img src="<?php echo site_url('assets/images/global.svg'); ?>"></a>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                       <!--  <div class="uk-width-1-1" style="margin: 20px 3px;">
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
                        </div> -->
                        <div class="uk-width-1-1 file-upload">
                            <div>
                                <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan File Upload</b></label>

                                <div class="image-upload uk-margin-small-top" id="preview-plan-input">
                                    <label for="plan_pdf_files" class="uk-flex">
                                        <img src="<?php echo base_url('assets/images/upload_icon.svg'); ?>" style="height: 20px;"/>
                                        <span class="text-black" style="margin-top:2px;margin-left:5px;">Upload PDF File</span>
                                    </label>

                                    <input id="plan_pdf_files" oninvalid="InvalidMsg(this);"  name="plan_pdf_files" accept="application/pdf" class="user_files_images" type="file" style="display: none;" accept="application/pdf">
                                    
                                    <div id="pdf-progress-bar" style="display:none;">
                                        <span id="show-pdf-count"></span>
                                        <progress id="pdf-progress-count" value="" max="" style="display: none;"></progress>
                                    </div>

                                    <p></p>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3" id="pdfFileList">
                                            
                                        </div>
                                    </div>
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
                                    <label for="plan_video_files" class="uk-flex">
                                        <img src="<?php echo base_url('assets/images/Subtract.svg'); ?>" style="height: 20px;"/>
                                        <span class="text-black" style="margin-top:2px;margin-left:5px;">Upload MP4 File</span>
                                    </label>

                                    <input id="plan_video_files" name="plan_video_files" class="" type="file" style="display: none;" accept="video/*" >
                                    
                                    <div id="video-progress-bar" style="display:none;">
                                        <span id="show-video-count"></span>
                                        <progress id="video-progress-count" value="" max="" style="display: none;"></progress>
                                    </div>

                                    <p></p>
                                    <!-- <div id="video_fileList"></div> -->
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3" id="videoFileList">
                                            
                                        </div>
                                    </div>
                                </div>

                                <?php if($getPatientTreatmentPlans->video_file != ''): ?>
                                   <div class="uk-grid">
                                        <div style="margin-top: 20px; position: relative;"  class="uk-width-medium-2-6" id="preview-plan-video">
                                            <video width="320" height="240" controls>
                                                <source src="<?= base_url('assets/uploads/images/').$getPatientTreatmentPlans->video_file; ?>" type="video/mp4">
                                                <source src="<?= base_url('assets/uploads/images/').$getPatientTreatmentPlans->video_file ?>" type="video/mkv">
                                                <source src="<?= base_url('assets/uploads/images/').$getPatientTreatmentPlans->video_file ?>" type="video/ogg">
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

<style>

    #video-progress-bar {
        margin-top:10px ;
        width: 100%;
        background-color: #6d3745;
        padding: 10px 0px;
    }

    #show-video-count {
        color: white;
        padding: 20px;
    }

    #pdf-progress-bar {
        margin-top:10px ;
        width: 100%;
        background-color: #6d3745;
        padding: 10px 0px;
    }

    #show-pdf-count {
        color: white;
        padding: 20px;
    }

    .plan-file-upload-bg{
        padding: 15px;
        list-style: none;
        background-color: #F5F5F5;
        display: flex;
        justify-content: space-between;
        border-radius: 11px;
        align-items: center;
    }

    .plan-file-upload-items{ 
        display:flex;
        align-item:center;
        align-items: center;
    }

    progress[value]::-webkit-progress-value {
        background-color: #6d3745;  
        border-radius: 2px; 
        background-size: 35px 20px, 100% 100%, 100% 100%;
        height: 30px;
        color: white;
    }

</style>

<script type="text/javascript">
      // // PDF FILE UPLOAD
    $(document).ready(function(e) {


        $("#plan_pdf_files").change(function(e){
            e.preventDefault();
            var fileName = e.target.files[0].name;
            var file_data = $('#plan_pdf_files').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);

            $("#msg").html('<div class="alert alert-info"><i class="fa fa-spin fa-spinner"></i> Please wait...!</div>');
            $.ajax({
                 xhr: function () {
                let xhr = new XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (e) {
                  if (e.lengthComputable) {
                    let progress = Math.round(e.loaded * 100 / e.total);
                    $('#pdf-progress-bar').show();
                    $("#pdf-progress-bar").css("width", progress + "%");
                    $('#pdf-progress-count').val(progress);
                    $('#show-pdf-count').text(progress + "%");

                  }
                }, false);
                return xhr;
              },
                type: "POST",
                url: base_url+"treatmentplanner/uploadCreatePlanFile",
                data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(data) {

                    if (data == 1 || parseInt(data) == 1) {

                        $('#pdf-progress-bar').hide();

                        // setTimeout(function(){ 
                        // }, 500);

                        var input = document.getElementById('plan_pdf_files');
                        var output = document.getElementById('pdfFileList');

                        var children = "";
                        for (var i = 0; i < input.files.length; ++i) {
                            children += '<li class="plan-file-upload-items"><img src="'+base_url+'assets/images/pdf-icon.svg">&nbsp;&nbsp;&nbsp;<span>' + input.files.item(i).name + '</span></li><a id="remove-pdf-file"><img src="'+base_url+'assets/images/delete-icon.svg"></a>';
                        }
                        output.innerHTML = '<ul class="plan-file-upload-bg">'+children+'</ul>';

                        $('#remove-pdf-file').click(function() {
                            $('#plan_pdf_files').val('');
                            $('#pdfFileList').html('');
                        });


                        $("#msg").html(
                            '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data updated successfully.</div>'
                        );
                    } else {
                    $("#msg").html(
                        '<div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> Extension not good only try with <strong>GIF, JPG, PNG, JPEG</strong>.</div>'
                    );
                    }


                },
                error: function(data) {
                    $("#msg").html(
                    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong.</div>'
                    );
                }
            });
        });
    });


    // VIDEO FILE UPLOAD
    $(document).ready(function(e) {
        $("#plan_video_files").change(function(e){
            var fileName = e.target.files[0].name;
            var file_data = $('#plan_video_files').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
            // alert(form_data);

            $("#msg").html('<div class="alert alert-info"><i class="fa fa-spin fa-spinner"></i> Please wait...!</div>');
            $.ajax({
               xhr: function () {
                let xhr = new XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (e) {
                  if (e.lengthComputable) {
                    let progress = Math.round(e.loaded * 100 / e.total);
                    $('#video-progress-bar').show();
                    $("#video-progress-bar").css("width", progress + "%");
                    $('#video-progress-count').val(progress);
                    $('#show-video-count').text(progress + "%");
                  }
                }, false);
                return xhr;
              },
                type: "POST",
                url: base_url+"treatmentplanner/uploadCreatePlanFile",
                data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                
                success: function(data) {

                    if (data == 1 || parseInt(data) == 1) {

                        $('#video-progress-bar').hide();

                        // setTimeout(function(){ 
                        // }, 500);

                        var input = document.getElementById('plan_video_files');
                        var output = document.getElementById('videoFileList');

                        var children = "";
                        for (var i = 0; i < input.files.length; ++i) {
                            children += '<li class="plan-file-upload-items"><img src="'+base_url+'assets/images/video-icon.svg">&nbsp;&nbsp;&nbsp;<span>' + input.files.item(i).name + '</span></li><a id="remove-file"><img src="'+base_url+'assets/images/delete-icon.svg"></a>';
                        }
                        output.innerHTML = '<ul class="plan-file-upload-bg">'+children+'</ul>';

                        $('#remove-file').click(function() {
                            $('#plan_video_files').val('');
                            $('#videoFileList').html('');
                        });


                        $("#msg").html(
                            '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data updated successfully.</div>'
                        );
                    } else {
                    $("#msg").html(
                        '<div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> Extension not good only try with <strong>GIF, JPG, PNG, JPEG</strong>.</div>'
                    );
                    }


                },
                error: function(data) {
                    $("#msg").html(
                    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong.</div>'
                    );
                }
            });
        });
    });
</script>

<!-- <script type="text/javascript">
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
</script> -->

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


    // Video Field Required
    function InvalidMsg(textbox) {
        if (textbox.value == '') {
            // $('#video-input-req').html('Field Required');
            // textbox.setCustomValidity('Required email address');
            UIkit.notify({
                message : 'Video Field is required',
                status  : 'danger',
                timeout : 3000,
                pos     : 'top-right'
            });
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }

    // PDF Field Required
    function pdfInvalidMsg(textbox) {
        if (textbox.value == '') {
            UIkit.notify({
                message : 'PDF Field is required',
                status  : 'danger',
                timeout : 5000,
                pos     : 'top-right'
            });
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }



</script>