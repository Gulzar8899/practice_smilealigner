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
                        <div class="uk-width-1-1 mt-20p" style="margin: 0px 3px;">
                            <div class="md-input-wrapper"><label class="label-p" for="title"><b>Title</b><span class="req">*</span></label>
                            <br><br>
                            <input type="text" name="title" id="title" required="" class="md-input h-50 demoInputBox input-border" placeholder="Title" style="border-radius:16px !important;" required><span class="md-input-bar"></span></div>
                        </div>

                        <div class="uk-width-1-1 mt-20p" style="margin: 0px 3px;">
                            <div class="">
                                <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan*</b></label><br><br>
                                <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                <textarea placeholder="Enter here" class="md-input input-border" name="plan_detail" cols="10" rows="8" data-parsley-trigger="keyup"  data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.." required></textarea>
                            </div>
                        </div>

                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2 mt-20p">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_upper"><b>Upper</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_upper" id="wizard_upper" class="md-input h-50 demoInputBox  input-border" placeholder="Count" style="border-radius:16px !important;" required><span class="md-input-bar"></span></div>
                            </div>
                            <div class="uk-width-medium-1-2 mt-20p">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_lower"><b>Lower</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_lower" id="wizard_lower" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Count" style="border-radius:16px !important;" required><span class="md-input-bar"></span></div>
                            </div>
                        </div>

                        <div class="uk-grid mt-0p">
                            <div class="uk-width-medium-1-2 mt-20p">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_pet_amount"><b>Pet g Amount</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_petg_amount" id="wizard_pet_amount" class="md-input h-50 demoInputBox  input-border" placeholder="Pet g Amount" style="border-radius:16px !important;" required><span class="md-input-bar"></span></div>
                            </div>
                            <div class="uk-width-medium-1-2 mt-20p">
                                <div class="md-input-wrapper"><label class="label-p" for="wizard_duo_amount"><b>Duo Amount</b><span class="req">*</span></label>
                                    <br><br>
                                <input type="text" name="plan_duo_amount" id="wizard_duo_amount" required="" class="md-input h-50 demoInputBox  input-border" placeholder="Duo Amount" style="border-radius:16px !important;" required><span class="md-input-bar"></span></div>
                            </div>
                        </div>
              
                        <div class="uk-width-1-1 mt-20p" style="margin: 0px 3px;">
                            <label class="label-p" for="exampleFormControlFile1"><b>Link*</b></label>
                            <br><br>
                            <div class="uk-flex-inline input-border uk-flex-middle w-100" style="border-radius:16px;">
                               
                                <input class="uk-input w-100" style="margin: 5px; padding: 10px;border: 0px;border:0px" type="text" placeholder="https//www.hyperlink.com/js" name="plan_link" required>
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
                        <div class="uk-width-1-1 file-upload">
                            <div>
                                <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan File Upload*</b></label>

                                <div class="image-upload uk-margin-small-top">
                                    <label for="plan_pdf_files" class="uk-flex">
                                        <img src="<?php echo base_url('assets/images/upload_icon.svg'); ?>" style="height: 20px;"/>
                                        <span class="text-black" style="margin-top:2px;margin-left:5px;">Upload PDF File</span>
                                    </label>

                                    <input id="plan_pdf_files" oninvalid="pdfInvalidMsg(this);" name="plan_pdf_files" accept="application/pdf" class="user_files_images" type="file" style="display: none;" accept="application/pdf" required>
                                    
                                    <div id="pdf-progress-bar" style="display:none;">
                                        <span id="show-pdf-count"></span>
                                        <progress id="pdf-progress-count" value="" max="" style="display: none;"></progress>
                                    </div>
                                   <!--  <div id="plan-pdf-progress" style="display:none;">
                                      <div id="plan-pdf-bar" >0%</div>
                                    </div> -->

                                    <p></p>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3" id="pdfFileList">
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="uk-width-1-1 file-upload uk-margin-medium-top">
                            <div>
                                <label class="label-p" for="exampleFormControlFile1"><b>Mp4 File*</b></label><br>
                              <!--   <div class="file-upload-icon">
                                    <a><img src="<?php echo site_url('assets/images/Subtract.svg'); ?>">
                                        <span class="text-black ml-10p">Upload Mp4 File</span></a>
                                </div> -->
                                 <div class="image-upload">
                                    <label for="plan_video_files" class="uk-flex">
                                        <img src="<?php echo base_url('assets/images/Subtract.svg'); ?>" style="height: 20px;"/>
                                        <span class="text-black" style="margin-top:2px;margin-left:5px;">Upload MP4 File</span>
                                    </label>

                                    <input id="plan_video_files" oninvalid="InvalidMsg(this);" name="plan_video_files" class="" type="file" multiple="" style="display: none;" accept="video/*" required>
                                    
                                    
                                    <div id="video-progress-bar" style="display:none;">
                                        <span id="show-video-count"></span>
                                        <progress id="video-progress-count" value="" max="" style="display: none;"></progress>
                                    </div>
                                    <!-- <div id="video-progress-bar" style="display:none;">
                                      <div id="plan-video-bar" >0%</div>
                                    </div> -->

                                    <p></p>
                                    <!-- <div id="video_fileList"></div> -->
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3" id="videoFileList">
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <br>
                        <!-- <div class="uk-grid">
                            <div class="uk-width-medium-1-2 uk-margin-medium-top">
                                 <input style="float:left;" class="md-btn md-btn-primary btnNext" type="button" name="next" id="next" value="Back">
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-medium-top">
                                <input style="margin-right: 10px;height:40px;" class="md-btn md-btn-primary btnNext" type="submit" name="next" id="next" value="Create">
                            </div>
                        </div> -->
                         <div class="uk-width-1-1">
                            <input style="float: left;" class="md-btn md-btn-primary btnNext" type="button" name="next" id="next" value="Back">
                            <input style="float: right;margin-right: 10px;height:40px;" class="md-btn md-btn-primary btnNext" type="submit" name="next" id="next" value="Create">
                        </div>
                       <!--  <div class="uk-width-1-1">
                           
                            
                        </div> -->
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

<script>

   
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

     // PDF ProgressBar
    // var i = 0;
    // function pdfMove() {
    //   if (i == 0) {
    //     i = 1;
    //     var elem = document.getElementById("plan-pdf-bar");
    //     var width = 10;
    //     var id = setInterval(frame, 10);
    //     function frame() {
    //       if (width >= 100) {
    //         clearInterval(id);
    //         i = 0;
    //       } else {
    //         width++;
    //         elem.style.width = width + "%";
    //         elem.innerHTML = width  + "%";
    //       }
    //     }
    //   }
    // }

    // ProgressBar
    // var i = 0;
    // function move() {
    //   if (i == 0) {
    //     i = 1;
    //     var elem = document.getElementById("plan-video-bar");
    //     var width = 10;
    //     var id = setInterval(frame, 10);
    //     function frame() {
    //       if (width >= 100) {
    //         clearInterval(id);
    //         i = 0;
    //       } else {
    //         width++;
    //         elem.style.width = width + "%";
    //         elem.innerHTML = width  + "%";
    //       }
    //     }
    //   }
    // }

</script>

<script type="text/javascript">
    // updateList = function() {
    //     var input = document.getElementById('file-input');
    //     var output = document.getElementById('fileList');
    //     var children = "";
    //     for (var i = 0; i < input.files.length; ++i) {
    //         children += '<li>' + input.files.item(i).name + '</li>';
    //     }
    //     output.innerHTML = '<ul>'+children+'</ul>';
    // }
    //  videoUpdateList = function() {
    //     // alert();
    //     var input = document.getElementById('video-file-input');
    //     var output = document.getElementById('videoFileList');


    //     var children = "";
    //     for (var i = 0; i < input.files.length; ++i) {
    //         children += '<li>' + input.files.item(i).name + '</li>';
    //     }
    //     output.innerHTML = '<ul>'+children+'</ul>';
    // }

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