<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>

<style type="text/css">
    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
</style>
<div id="page_content">
    <div id="page_content_inner" class="page_content-p">
        <br>
        <br>
        <h1 class="heading_b headingSize uk-margin-bottom patientMobile"><b>Add New Patient</b></h1>
        <div class="uk-margin-large-bottom">
            <div class="md-card-content">
                <ul id="registration-step">
                    <li id="account" class="highlight">
                        <h2 class="themeTextColor stepSetting active"><b>Step 1</b>&nbsp;<span class="material-icons themeTextColor iconStepOne">arrow_right</span><hr></h2>
                    </li>
                    <li id="password"><h2 class="themeTextColor stepSetting"><b>Step 2</b><hr></h2></li>
                   <!--  <li id="general"><h2 class="themeTextColor"><b>Step 3</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="material-icons themeTextColor iconStepOne">arrow_right</span></h2></li> -->
                </ul>
                <form class="uk-form-stacked" name="frmRegistration" id="registration-form" method="post" action="<?= site_url('doctor/submitPatient'); ?>" enctype="multipart/form-data">
                    <div id="account-field">
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label  class="label-p" for="wizard_fullname"><b>First Name</b><span class="req">*</span></label><input type="text" name="pt_firstname" id="wizard_firstname" required="" class="md-input demoInputBox input-border" placeholder="Enter First Name"><span class="md-input-bar"></span></div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label class="label-p"  for="wizard_fullname"><b>Last Name</b><span class="req">*</span></label><input type="text" name="pt_lastname" id="wizard_lastname" required="" class="md-input demoInputBox input-border" placeholder="Enter Last Name"><span class="md-input-bar"></span></div>                            
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">                                
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="uk-form-row parsley-row">
                                            <label for="gender" class="uk-form-label"><b>Gender</b><span class="req">*</span></label>
                                            <span class="icheck-inline">
                                                <input type="radio" name="pt_gender" value="male" id="val_radio_male" data-md-icheck required />
                                                <label for="val_radio_male" class="inline-label">Male</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="radio" name="pt_gender" value="female" id="val_radio_female" data-md-icheck />
                                                <label for="val_radio_female" class="inline-label">Female</label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-2" style="padding-right: 0px;">
                                        <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>Age</b></label><input type="number" name="pt_age" id="wizard_fullname" class="md-input demoInputBox input-border" placeholder="Age"><span class="md-input-bar"></span></div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label class="label-p" for="wizard_email"><b>Email ID</b></label>
                                <input type="text" class="md-input input-border" name="pt_email"  placeholder="Email ID"  id="wizard_email"  />
                            </div>
                        </div>
                        <div style="margin-bottom: 31px !important;" class="uk-form-row">
                            <div class="uk-width-medium-1-2">
                                <br>
                                <label for="lastName" class="form-label"><b>Profile Picture</b></label>
                                <br>
                                <br>
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar"/>
                                    </div>
                                    <div class="fileinput-exists thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar" id="uploaded_image"/>
                                    </div>
                                    <label for="lastName" class="form-label" style="position: absolute;width:200%;margin-top:25px;margin-left:15px;">
                                        <div class="user_avatar_controls">
                                            <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput" style="float: left;"><i class="material-icons">&#xE5CD;</i></a>
                                            <span class="btn-file" style="float: left;left:0px;">
                                                <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                                <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                                <input type="file" name="pt_img" id="upload_image">
                                                <input type="hidden" name="pt_img_name" id="pt_img_name" value="">
                                            </span>
                                        </div>    
                                    </label>                                
                                </div>
                                <br>                        
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>

                        <!-- <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row parsley-row">
                                    <div class="col-md-3 col-sm-6 col-xs-6 d-flex">
                                <input type="radio" class="role" id="friends" name="radio_group" value="Friends" onclick="showInputField();">
                                <label for="friends"><b>&nbsp;&nbsp;Friends</b></label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 d-flex">
                                 <input type="radio" value="Social Media" class="role" id="social" name="radio_group" onclick="showInputField();">
                                <label for="social"><b>&nbsp;&nbsp;Social Media</b></label>
                            </div>
                            
                                    <label for="gender" class="uk-form-label"><b>Gender</b><span class="req">*</span></label>
                                    <span class="icheck-inline" id="radio_check_val">
                                        <input type="radio" name="pt_type" value="individual" id="individual_radio" data-md-icheck checked />
                                        <label for="individual_radio" class="inline-label">Individual</label>
                                    </span>
                                    <span class="icheck-inline">
                                        <input type="radio" name="pt_type" value="composite" id="composite_radio" data-md-icheck />
                                        <label for="composite_radio" class="inline-label">Composite</label>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <div id="show_individual_input">
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <div class="form-group alert-up-pd">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><b>Images Intra Oral</b></div>
                                             <div class="panel-body">
                                                <input id="input-fa-1" name="images_intra_oral[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <br>
                            <div class="uk-grid imageOpgSetting">
                                <div class="uk-width-1-1">
                                    <div class="form-group alert-up-pd">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><b>Images OPG</b></div>
                                            <div class="panel-body">
                                                <input id="input-fa-2" name="images_opg[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <br>
                            <div class="uk-grid imageOpgSetting">
                                <div class="uk-width-1-1">
                                    <div class="form-group alert-up-pd">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><b>Lateral Ceph. Images</b></div>
                                            <div class="panel-body">
                                                <input id="input-fa-3" name="images_lateral_c[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div id="show_composite_input">
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <div class="form-group alert-up-pd">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><b>Upload Composite Image</b></div>
                                             <div class="panel-body">
                                                <input id="input-fa-1" name="composite_image[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div id="password-field" style="display:none;">
                       
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row parsley-row scanImpression">
                                    <label for="gender" class="uk-form-label"><b>Impressions</b><span class="req">*</span></label>
                                    <label><input type="radio" name="pt_scan_impression" value="no"/> No</label>
                                    <label><input type="radio" name="pt_scan_impression" value="yes"/> Yes</label>
                                </div>
                            </div>
                            <div class="uk-width-medium-2-3">
                                <div class="parsley-row">
                                    <label class="label-p" for="exampleFormControlFile1"><b>Special Instructions</b></label><br>
                                    <textarea placeholder="Special Instructions" class="md-input input-border" name="pt_special_instruction" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.." placeholder="Enter Secipal Instructione"></textarea>
                                </div>
                            </div>  
                        </div>
                        <br>
                        <div id="div1" class="row imageOpgSetting hide">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group alert-up-pd">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><b>Scan/Impressions Images</b></div>
                                        <div class="panel-body">
                                            <input id="input-fa-4" name="images[]" class="user_files_images" type="file" multiple="">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="uk-grid imageOpgSetting">
                            <div class="uk-width-1-1">
                                <div class="form-group alert-up-pd">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><b>Upload STL</b></div>
                                        <div class="panel-body">
                                            <input id="stlFiles" name="images_stl[]" class="user_files_images" type="file" multiple="">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="parsley-row">
                                    <label class="label-p" for="exampleFormControlFile1"><b>Treatment Objective</b></label><br>
                                    <textarea placeholder="Treatment Objective" class="md-input input-border" name="pt_objective" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.." placeholder="Enter Treatment Objective"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-3 uk-width-large-1-2">
                                <label class="label-p" for="exampleFormControlFile1"><b>Shipping Address</b></label>
                                 <select id="select_demo_2" name="pt_shipping_details" data-md-selectize>
                                    <option value=""><b>shipping address</b></option>
                                   <?php foreach($shipping_address as $shipping){?>
                                    <?php $street_name = $shipping->street_address.' '.$shipping->country.' '.$shipping->city.' '.$shipping->state.' '.$shipping->zip_code; ?>
                                     <option value="<?= $shipping->id;?>"><?= $street_name;?></option>
                                   <?php } ?>
                                </select>
                            </div>
                            <div class="uk-width-medium-1-3 uk-width-large-1-2">
                                <label class="label-p" for="exampleFormControlFile1"><b>Billing Address</b></label>
                                <select id="select_demo_1" name="pt_billing_address" data-md-selectize>
                                    <option value=""><b>billing address</b></option>
                                   <?php foreach($billing_address as $billing){?>
                                    <?php $billing_address = $billing->street_address.' '.$billing->country.' ' .$billing->state.' ' .$billing->city; ?>
                                     <option value="<?= $billing->id;?>"><?= $billing_address;?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>
                        <br> 
                        <div class="collapse  uk-margin-small-top" id="featuresData">
                            <label for="exampleFormControlFile1"><b>Type of Treatment</b></label>
                            <div class="row">
                                <div style="display: block;" class="demo-checkbox col-md-12  uk-margin-small-top">
                                    <?php foreach($treatment_data as $treatmentData): ?>
                                        <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                                            <input name="treatmentData[]" value="<?php echo $treatmentData->tr_name; ?>" type="checkbox" id="<?php echo $treatmentData->tr_name; ?>" class="chk-col-green" multiple/>
                                            <label  class="label-grey uk-flex uk-flex-top" for="<?php echo $treatmentData->tr_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $treatmentData->tr_name; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div id="show_other_treatment" style="display:none;">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2 other-input">
                                        <input style="padding: 5px;" class="md-input input-border" id="other_type_treatment" name="other_type_of_treatment" type="text" placeholder="Enter Here" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="collapse  uk-margin-small-top" id="featuresData">
                            <label for="exampleFormControlFile1"><b>Type of case:Malocclusion</b></label>
                            <div class="row">
                                <div style="display: block;" class="demo-checkbox col-md-12  uk-margin-small-top">
                                    <?php foreach($treatment_case_data as $treatmentCaseData): ?>
                                        <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                                            <input name="treatmentCaseData[]" value="<?php echo $treatmentCaseData->case_name; ?>" type="checkbox" id="<?php echo $treatmentCaseData->case_name; ?>" class="chk-col-green" multiple/>
                                            <label class="label-grey uk-flex uk-flex-top" for="<?php echo $treatmentCaseData->case_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $treatmentCaseData->case_name; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <br> 
                        <div class="collapse  uk-margin-small-top" id="featuresData">
                            <label for="exampleFormControlFile1"><b>Arches to be treated</b></label>
                            <div class="row">
                                <div style="display: block;" class="demo-checkbox col-md-12  uk-margin-small-top">
                                    <?php foreach($arch_data as $archData): ?>
                                        <div class="col-md-2 pl-0" style="margin-bottom:8px;">
                                            <input name="archData[]" value="<?php echo $archData->arc_name; ?>" type="checkbox" id="<?php echo $archData->arc_name; ?>" class="chk-col-green" multiple/>
                                            <label  class="label-grey uk-flex uk-flex-top" for="<?php echo $archData->arc_name; ?>">&nbsp;&nbsp;&nbsp;<?php echo $archData->arc_name; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="uk-grid  uk-margin-small-top" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row parsley-row">
                                    <label for="gender" class="uk-form-label"><b>IPR to be performed</b></label>
                                    <span class="icheck-inline">
                                        <input type="radio" value="0" name="ipr_performed" id="val_radio_male" data-md-icheck />
                                        <label for="val_radio_male" class="inline-label">No</label>
                                    </span>
                                    <span class="icheck-inline">
                                        <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck />
                                        <label for="val_radio_female" class="inline-label">Yes</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row parsley-row">
                                    <label for="gender" class="uk-form-label"><b>Attachment to be placed</b></label>
                                    <span class="icheck-inline">
                                        <input type="radio" value="0" name="attachment_placed" id="val_radio_male" data-md-icheck />
                                        <label for="val_radio_male" class="inline-label">No</label>
                                    </span>
                                    <span class="icheck-inline">
                                        <input type="radio" value="1" name="attachment_placed" id="val_radio_female" data-md-icheck />
                                        <label for="val_radio_female" class="inline-label">Yes</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="modal uk-modal" id="modal">
                        <div id="modal-container" class="uk-modal-container" uk-modal>
                            <div class="uk-modal-dialog" style="padding: 14px;">
                                <div class="modal-dialog modal-size">
                                    <div  class="modal-content">
                                        <div class="modal-header" style="height:26px;margin-bottom: 10px;border-bottom: 1px solid #e5e5e5;">
                                            <div class="modal-title">
                                                <div class="" style="display:flex; justify-content: space-between;">
                                                    Crop Image
                                                </div>
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="uk-grid">
                                                <div class="uk-width-2-3">
                                                    <img src="" id="sample_image" />
                                                </div>
                                                <div class="uk-width-1-3">
                                                    <div class="preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="text-align: right;border-top: 1px solid #e5e5e5;margin-top: 15px;padding: 15px 0px 0px;">
                                            <button type="button" id="crop" class="btnBack" style=" background: #805046;color: #fff;border: 2px solid #805046 !important;padding: 8px 30px;">Crop</button>
                                            <button type="button" id="cropClose" class="btnBack" style="background: #805046;color: #fff;border: 2px solid #805046 !important;padding: 8px 30px;" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a class="md-btn md-btn-primary md-btn-wave-light cancleButton waves-effect waves-button waves-light buttonStyling" href="<?= site_url('doctor/patientList') ?>">Cancel</a>
                        <input class="md-btn md-btn-primary btnNext finishMobile" type="button" name="next" id="next" value="Next">
                        <input class="md-btn md-btn-primary btnNext finishMobile" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
                        <input class="md-btn md-btn-primary btnBack finishMobileBack" type="button" name="back" id="back" value="Back" style="display:none;padding: 4px 25px;float:right;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
  function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}

function validate() {

    var output = true;

    var pt_firstname = $('#wizard_firstname').val();
    var pt_lastname = $('#wizard_lastname').val();
    var pt_email = $('#wizard_email').val();

    if(!($("#val_radio_male").val())){
        var pt_gender = $('#val_radio_male').val();
    }else{
        var pt_gender = $('#val_radio_female').val();
    }

    $(".registration-error").html('');
    if($("#account-field").css('display') != 'none') {
        if(pt_firstname && pt_lastname && pt_gender) {
            output = true;
        }else{
            output = false;
        }   
    }

    return output;
}

$("#individual_radio").click(function(){
    alert(); 
});


$(document).ready(function() {
    $("#next").click(function(){
        var output = validate();
        if(output) {
            var current = $(".highlight");
            var next = $(".highlight").next("li");
            if(next.length>0) {
                $("#"+current.attr("id")+"-field").hide();
                $("#"+next.attr("id")+"-field").show();
                $("#back").show();
                $("#finish").hide();
                $(".highlight").removeClass("highlight");
                next.addClass("highlight");
                next.find("h2").addClass("active");
                if($(".highlight").attr("id") == $("li").last().attr("id")) {
                    $("#next").hide();
                    $("#finish").show();                
                }
            }
        }else{

            UIkit.notify({
                message : 'Name and Gender Field is required',
                status  : 'danger',
                timeout : 5000,
                pos     : 'top-right'
            });

        }
    });
    $("#back").click(function(){ 
        var current = $(".highlight");
        var prev = $(".highlight").prev("li");
        if(prev.length>0) {
            $("#"+current.attr("id")+"-field").hide();
            $("#"+prev.attr("id")+"-field").show();
            $("#next").show();
            $("#finish").hide();
            $("#back").hide();
            $(".highlight").removeClass("highlight");
            current.find("h2").removeClass("active");
            prev.addClass("highlight");
            prev.find("h2").addClass("active");
            if($(".highlight").attr("id") == $("li").first().attr("id")) {
                $("#back").hide();          
            }
        }
    });
});


    $("#Other").change(function(e) {
      if ($(this).prop('checked')){
            // alert('checked');
            $('#show_other_treatment').show();
      }else{
            // alert('unchecked');
            $('#show_other_treatment').hide();
      }
    });
    
</script>
<script>

$(document).ready(function(){

    // var $modal = UIkit.modal("#modal");
    var modal = UIkit.modal("#modal");
    var image = document.getElementById('sample_image');

    var cropper;
    $('#cropClose').on('click',function(){
      modal.hide();
    });

    $('#upload_image').on('change',function(event){
        var files = event.target.files;

        var done = function(url){
            image.src = url;
            modal.show(); 
          
        };

        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

modal.on({
    'show.uk.modal': function(){ 
        //alert('pp');
        cropper = new Cropper(document.getElementById('sample_image'), {
            aspectRatio: 1,
            viewMode: 3,
            preview:'.preview'
        });
    },
    'hide.uk.modal': function(){
        cropper.destroy();
        cropper = null;
    }
});






   // modal.on("shown.bs.modal", function() {
   //    //  alert('pp');
   //      cropper = new Cropper(document.getElementById('sample_image'), {
   //          aspectRatio: 1,
   //          viewMode: 3,
   //          preview:'.preview'
   //      });
        
   //  }).on('hidden.bs.modal', function(){
   //      cropper.destroy();
   //      cropper = null;
   //  });

    $('#crop').click(function(){
        canvas = cropper.getCroppedCanvas({
            width:400,
            height:400
        });

        canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result;
                $.ajax({
                    url: site_url + "doctor/imgCrop",
                    method:'POST',
                    data:{image:base64data},
                    success:function(data)
                    {
                        modal.hide();
                        var url = base_url+'assets/uploads/images/'+data;
                        $('#uploaded_image').attr('src', url);
                        $('#pt_img_name').val(data);
                    }
                });
            };
        });
    });
    
});
</script>