<div id="page_content">
    <div id="page_content_inner">
        <br>
        <br>
        <div class="uk-flex">
            <span class="">
                <a href="<?php echo base_url('treatmentplanner/patient/patientListing/') ?>">
                    <img src="<?php echo base_url('assets/images/left-arrow-round-bg.svg') ?>">              
                </a>
            </span>
            &nbsp;&nbsp;&nbsp;
             <h1 class="heading_a headingSize patientMobile uk-margin-bottom mt-5p"><b>Create Treatment Plan</b></h1>
        </div>

       
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content" style="margin-top:33px;">
                <!-- <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div> -->

                <form method="POST" action="<?= site_url('treatmentplanner/patient/submitPlan'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="patientID" value="<?= $patientID ?>">
                                    
                        <div class="uk-grid">
                            
                            <div class="uk-width-medium-1-2">
                             <label for="exampleFormControlFile1">
                                <b>Doctor</b></label>
                                  <br>
                            <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select style="
    padding: 10px 15px;
    height: 50px;
    border-radius: 16px;">
                                <span style="float: left;"></span>
                                <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                <select name="doctorName" class="doctor_name" onChange="getPatientList(this);" required>
                                    <option value="">Select</option>
                                    <?php foreach($accepted_users as $user): ?>
                                    <option data-id="<?= $user->id; ?>" value="<?= $couseruntry->first_name; ?>"><?= $user->first_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="uk-width-medium-1-2">
                            <label for="exampleFormControlFile1">
                                <b>Patient*</b></label>
                                  <br>
                            <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select style="
    padding: 10px 15px;
    height: 50px;
    border-radius: 16px;">
                                <span style="float: left;" class="patient_name_s"></span>
                                <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                <select name="patientID" class="patient_name">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>

                            
                        </div>

                        <div class="uk-width-1-1" style="margin: 10px 3px;">
                            <div class="md-input-wrapper"><label class="label-p" for="title"><b>Title</b><span class="req">*</span></label>
                                    <br><br>
                            <input type="text" name="title" id="title" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Title" style="border-radius:16px !important;"><span class="md-input-bar"></span></div>
                        </div>

                        <div class="uk-width-1-1" style="margin: 10px 3px;">
                            <div class="">
                                <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan*</b></label><br><br>
                                <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                <textarea placeholder="Enter here" class="md-input input-border" name="plan_detail" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_upper"><b>Upper</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_upper" id="wizard_upper" class="md-input h-50 demoInputBox  input-border" placeholder="Count" style="border-radius:16px !important;"><span class="md-input-bar"></span></div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_lower"><b>Lower</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_lower" id="wizard_lower" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Count" style="border-radius:16px !important;"><span class="md-input-bar"></span></div>
                            </div>
                        </div>
                        <br>
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_pet_amount"><b>Pet g Amount</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_petg_amount" id="wizard_pet_amount" class="md-input h-50 demoInputBox  input-border" placeholder="Pet g Amount" style="border-radius:16px !important;"><span class="md-input-bar"></span></div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_duo_amount"><b>Duo Amount</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_duo_amount" id="wizard_duo_amount" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Duo Amount" style="border-radius:16px !important;"><span class="md-input-bar"></span></div>
                            </div>
                        </div>
              
                        <div class="uk-width-1-1" style="margin: 20px 3px;">
                            <div>
                                <label class="label-p" for="exampleFormControlFile1"><b>Link*</b></label><br>
                                <div class="uk-margin create-link">
                                    <input class="uk-input input-border" style="width:98%;padding-left: 20px;" type="text" placeholder="https//www.hyperlink.com/js" name="plan_link">
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

                                <div class="image-upload uk-margin-small-top">
                                    <label for="file-input" class="uk-flex">
                                        <img src="<?php echo base_url('assets/images/upload_icon.svg'); ?>" style="height: 20px;"/>
                                        <span class="text-black" style="margin-top:2px;margin-left:5px;">Upload PDF File</span>
                                    </label>

                                    <input id="file-input" name="plan_pdf_files[]" accept="application/pdf" class="user_files_images" type="file" multiple="" style="display: none;" onchange="javascript:updateList()" accept="application/pdf">
                                        
                                    <p></p>
                                    <div id="fileList"></div>
                                </div>

                            </div>
                        </div>
                        <div class="uk-width-1-1 file-upload uk-margin-medium-top">
                            <div>
                                <label class="label-p" for="exampleFormControlFile1"><b>Mp4 File</b></label><br>
                              <!--   <div class="file-upload-icon">
                                    <a><img src="<?php echo site_url('assets/images/Subtract.svg'); ?>">
                                        <span class="text-black ml-10p">Upload Mp4 File</span></a>
                                </div> -->
                                 <div class="image-upload">
                                    <label for="video-file-input" class="uk-flex">
                                        <img src="<?php echo base_url('assets/images/Subtract.svg'); ?>" style="height: 20px;"/>
                                        <span class="text-black" style="margin-top:2px;margin-left:5px;">Upload MP4 File</span>
                                    </label>

                                    <input id="video-file-input" name="plan_video_files[]" class="" type="file" multiple="" style="display: none;" accept="video/*" onchange="javascript:videoUpdateList()">
                                        
                                    <p></p>
                                    <!-- <div id="video_fileList"></div> -->
                                    <div id="videoFileList"></div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="uk-width-1-1">
                            <input style="float: left;" class="md-btn md-btn-primary btnNext" type="button" name="next" id="next" value="Back">
                            <input style="float: right;margin-right: 10px;height:40px;" class="md-btn md-btn-primary btnNext" type="submit" name="next" id="next" value="Create">
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
    function getPatientList(id) {
        
        var doctor_id = $(".doctor_name").find(':selected').attr('data-id');
        // alert(doctor_id);

      $.ajax({
            url:"<?php echo base_url();?>/treatmentplanner/patient/getDoctorPatientList/"+ doctor_id,
            type: 'POST',
            data: {"id":doctor_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // $('#patient_name').empty();
                // $('.patient_name_s').html('');    
                $('.patient_name_s').html('Select');    
                $('.patient_name').find('option').not(':first').remove();

                // Add options
                $('.patient_name').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('.patient_name').append('<option data-id="'+data['pt_id']+'" value="'+data['pt_id']+'">'+data['pt_firstname']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }
</script>