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
        <div class="add-doctor-page">
        <br>
        <h1 class="headingSize patientMobile"><b>Add New Doctor</b></h1>
        <br>
        <div>
            <div class="md-card-content">
                <form method="POST" action="<?= site_url('admin/doctor/submitDoctor'); ?>" enctype="multipart/form-data">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>First Name *</b></label>
                                            <input type="text" name="first_name" class="md-input input-border" placeholder="Enter First Name" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Last Name *</b></label>
                                            <input type="text" name="last_name" class="md-input input-border" placeholder="Enter Last Name" required/>
                                        </div>
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
                                                        <input type="hidden" name="doctor_img_name" id="pt_img_name" value="">
                                                    </span>
                                                </div>    
                                                <!-- Upload Profile Photo -->
                                            </label>                                
                                        </div>
                                        <br>                                    
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <div class="uk-form-row parsley-row">
                                                <label for="gender" class="uk-form-label"><b>Gender</b><span class="req">*</span></label>
                                                <br>
                                                <br>
                                                <span class="icheck-inline">
                                                    <input type="radio" name="gender" value="male" id="val_radio_male" data-md-icheck required />
                                                    <label for="val_radio_male" class="inline-label">Male</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="radio" name="gender" id="val_radio_female" value="female" data-md-icheck />
                                                    <label for="val_radio_female" class="inline-label">Female</label>
                                                </span>
                                            </div>     
                                       </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Age</b></label>
                                            <input type="number" placeholder="Enter Age" name="age" class="md-input input-border"/>
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                   <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Email ID*</b></label>
                                            <input type="email" placeholder="Enter Email ID" id="doctor_email_available" name="email" class="md-input input-border " required/>
                                            <span class="" id="doctor_email_result"></span>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Mobile No*</b></label>
                                            <input type="number" placeholder="Enter Phone Number" name="phone_number" class="md-input input-border" required/>
                                        </div>
                                   </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Password*</b></label>
                                            <input type="text" name="password" class="md-input input-border" placeholder="Enter Password" required/>
                                        </div>
                                         <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>GST No</b></label>
                                            <input type="text" name="gst_no" class="md-input input-border" placeholder="Enter GST No" required/>
                                        </div>
                                    </div>
                                </div>

                                 <div class="uk-form-row">
                                    <div class="uk-grid">
                                       <div class="uk-width-medium-1-3" style="margin-top: 4px;">
                                            <label for="exampleFormControlFile1" class="label-p"><b>Select Refer By</b></label>
                                            <div class="uk-form-select uk-select-st" style="margin-top: 5px;  padding: 9px 15px; width: 91%;" data-uk-form-select>
                                            <span id="refer_by_s">Select Refer By</span>
                                                <i class="uk-icon-caret-down" style="float: right; padding: 2px 5px; color: #C4C4C4;"></i>
                                                <select id="refer_by" name="refer_by" onchange="getReferByValue(this);">
                                                    <i class="uk-icon-caret-down"></i>
                                                    <option value="">Select Refer By</option>
                                                    <option value="Friends">Friends</option>
                                                    <option value="Social Media">Social Media</option>
                                                    <option value="Business Executive">Business Executive</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                       </div>
                                       
                                       <div class="uk-width-medium-1-3">
                                            <div id="reference_person_show" style="display:none;">
                                                <label class="label-p"><b>Refer Name</b></label>
                                                <input type="text" placeholder="Enter Refer Name" name="reference_person" id="reference_person" class="md-input input-border" value="" />
                                           </div>
                                           <div id="business_executive_show" style="display:none; margin-top: 4px;">
                                                <label for="exampleFormControlFile1" class="label-p"><b>Select Business Executive</b></label>
                                                <div class="uk-form-select uk-select-st" style="margin-top: 5px; padding: 9px 15px; width: 91%;" data-uk-form-select>
                                                <span id="business_executive_s"></span>
                                                    <i class="uk-icon-caret-down" style="float: right; padding: 2px 5px; color: #C4C4C4;"></i>
                                                    <select id="business_executive" name="business_executive">
                                                        <i class="uk-icon-caret-down"></i>
                                                        <option value="">Select Business Executive </option>

                                                        <?php foreach($business_developer as $developer){?>
                                                             <option value="<?= $developer->first_name;?>"><?= $developer->first_name;?></option>
                                                       <?php } ?> 

                                                    </select>
                                                </div>
                                           </div>       
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <h3 class="" style="color:#6d3745;"><b>Billing Address*</b></h3>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Street Address*</b></label>
                                            <input type="text" name="billing_streetaddress" class="md-input input-border" placeholder="Enter Street Address" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                             <label for="exampleFormControlFile1">
                                                <b>Country*</b></label>
                                            <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                                <span style="float: left;"></span>
                                                <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                                <select name="billing_country" class="billing_country" onChange="getBillingStates(this);">
                                                    <option>Select</option>
                                                    <?php foreach($countries as $country): ?>
                                                    <option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>"><?= $country->name; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label for="exampleFormControlFile1">
                                                <b>State*</b></label>
                                            <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                                <span style="float: left;" class="billing_state_s"></span>
                                                <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                                <select name="billing_state" class="billing_state" onChange="getBillingCities(this);">
                                                    <option>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                             <label for="exampleFormControlFile1">
                                                <b>City*</b></label>
                                            <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                                <span style="float: left;" class="billing_city_s"></span>
                                                <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                                <select name="billing_city" class="billing_city">
                                                    <option>Select</option>
                                                  
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Post Code*</b></label>
                                            <input type="text" name="billing_zipcode" class="md-input input-border" placeholder="Enter Street Address" required/>
                                        </div>
                                    </div>
                                </div>

                                <!-- Enter Shipping -->
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <h3 class="" style="color:#6d3745;"><b>Shipping Address*</b></h3>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Street Address*</b></label>
                                            <input type="text" name="shipping_streetaddress" class="md-input input-border" placeholder="Enter Street Address" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                             <label for="exampleFormControlFile1">
                                                <b>Country*</b></label>
                                            <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                                <span style="float: left;"></span>
                                                <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                                <select name="shipping_country" class="shipping_country" onChange="getShippingStates(this);">
                                                    <option>Select</option>
                                                     <?php foreach($countries as $country): ?>
                                                    <option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>"><?= $country->name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label for="exampleFormControlFile1">
                                                <b>State*</b></label>
                                            <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                                <span style="float: left;" class="shipping_state_s"></span>
                                                <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                                <select name="shipping_state" class="shipping_state" onChange="getShippingCities(this);">
                                                    <option>Select</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                             <label for="exampleFormControlFile1">
                                                <b>City*</b></label>
                                            <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                                <span style="float: left;" class="shipping_city_s"></span>
                                                <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                                <select name="shipping_city" class="shipping_city">
                                                    <option>Select</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Post Code*</b></label>
                                            <input type="text" name="shipping_zipcode" class="md-input input-border" placeholder="Enter Post Code" required/>
                                        </div>
                                    </div>
                                </div>

                            <!-- END SHIPPING -->

                               



                            </div>
                             
                             <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <br>
                                    <br>
                                </div></div>
                            <div class="uk-width-medium-1-1">
                                <br>

                                <button id="doctor_add_btn" style="" type="submit" name="submit" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#">Add</button>
                                <a href="<?= site_url('admin/doctors'); ?>" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#" id="cancelBtn">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>


           <div class="modal uk-modal" id="modal" >
   <div id="modal-container" class="uk-modal-container" uk-modal>
      <div class="uk-modal-dialog" style="padding: 14px;">
         <div class="modal-dialog modal-size">
            <div  class="modal-content">
               <div class="modal-header" style="height:26px;
                  margin-bottom: 10px;
                  border-bottom: 1px solid #e5e5e5;
                  ">
                  <div class="modal-title">
                     <div class="" style="display:flex; justify-content: space-between;">
                        Crop Image
                     </div>
                     <br><br>
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
               <div class="modal-footer" style="text-align: right;
                  border-top: 1px solid #e5e5e5;  margin-top: 15px;   padding: 15px 0px 0px;">
                  <button type="button" id="crop" class="btnBack" style="    background: #805046;
                     color: #fff;
                     border: 2px solid #805046 !important;     padding: 8px 30px;">Crop</button>
                  <button type="button" id="cropClose" class="btnBack" style="    background: #805046;
                     color: #fff;
                     border: 2px solid #805046 !important;     padding: 8px 30px;" data-dismiss="modal">Cancel</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<!-- OLD CROP MODEL -->
<!--             <div class="modal uk-modal" id="modal">
                <div class="uk-modal-dialog">
                    
                <div class="modal-dialog modal-size"> 
                    <div  class="modal-content">
                        <div class="modal-header" >
                            <div class="modal-title">
                                Crop Image
                                <br><br>
                            </div>
                        </div>
                        <div class="modal-body">
                            <img src="" id="sample_image" />
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div> 
                        </div>
                        <div class="modal-footer">
                                        <button type="button" id="crop" class="btnBack">Crop</button>
                                        <button type="button" class="btnBack" data-dismiss="modal">Cancel</button>
                                    </div>
                    </div>
                </div>
                </div>
            </div> -->
        </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function(){

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
                    url: site_url + "admin/doctor/doctorimgCrop",
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
    
    // function getBillingStates(id) {
        
    //     var country_name = id.options[id.selectedIndex].value;
    //     var country_id = $("#billing_country").find(':selected').attr('data-id');
    //     // alert(country_id);

    //   $.ajax({
    //         url:"<?php echo base_url();?>/admin/doctor/getStates/"+ country_id,
    //         type: 'POST',
    //         data: {"id":country_id},
    //         dataType: 'json',
    //         success: function(response) {
    //             console.log(response);

    //             $('#billing_state').empty();
    //             $('#billing_state_s').html('Select');
    //             $('#billing_state').find('option').not(':first').remove();

    //             // Add options
    //             $('#billing_state').each(function() {
    //                 if (this.selectize) {
    //                     for(x=0; x < 10; ++x){
    //                         this.selectize.addOption({value:x, text: x});
    //                     }
    //                 }
    //             });

    //             $.each(response,function(index,data){
    //                 $('#billing_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
    //             });

    //         },
    //         error: function () {
    //             alert('Data Not Deleted');
    //         }
    //     });

    // }

    // function getBillingCities(id) {
    //     var city_name = id.options[id.selectedIndex].value;
    //     var city_id = $("#billing_state").find(':selected').attr('data-id');
    //     // alert(city_id);

    //   $.ajax({
    //         url:"<?php echo base_url();?>/admin/doctor/getCities/"+ city_id,
    //         type: 'POST',
    //         data: {"id":city_id},
    //         dataType: 'json',
    //         success: function(response) {
    //             console.log(response);

    //             $('#billing_city').empty();
    //             $('#billing_city_s').html('Select');
    //             $('#billing_city').find('option').not(':first').remove();

    //             // Add options
    //             $('#billing_city').each(function() {
    //                 if (this.selectize) {
    //                     for(x=0; x < 10; ++x){
    //                         this.selectize.addOption({value:x, text: x});
    //                     }
    //                 }
    //             });

    //             $.each(response,function(index,data){
    //                 $('#billing_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
    //             });

    //         },
    //         error: function () {
    //             alert('Data Not Deleted');
    //         }
    //     });

    // }

    // function getShippingStates(id) {
    //     var country_name = id.options[id.selectedIndex].value;
    //     var country_id = $("#shipping_country").find(':selected').attr('data-id');
    //   // alert(country_id);
    //   $.ajax({
    //         url:"<?php echo base_url();?>/admin/doctor/getStates/"+ country_id,
    //         type: 'POST',
    //         data: {"id":country_id},
    //         dataType: 'json',
    //         success: function(response) {
    //             console.log(response);


    //             $('#shipping_state').empty();
    //             $('#shipping_state_s').html('Select');
    //             $('#shipping_state').find('option').not(':first').remove();
                
    //             // $('#shipping_state').empty();

    //             // Add options
    //             $('#shipping_state').each(function() {
    //                 if (this.selectize) {
    //                     for(x=0; x < 10; ++x){
    //                         this.selectize.addOption({value:x, text: x});
    //                     }
    //                 }
    //             });

    //             $.each(response,function(index,data){
    //                 $('#shipping_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
    //             });

    //         },
    //         error: function () {
    //             alert('Data Not Deleted');
    //         }
    //     });

    // }

    // function getShippingCities(id) {
    //    var city_name = id.options[id.selectedIndex].value;
    //     var city_id = $("#shipping_state").find(':selected').attr('data-id');
    //   // alert(city_id);
    //   $.ajax({
    //         url:"<?php echo base_url();?>/admin/doctor/getCities/"+ city_id,
    //         type: 'POST',
    //         data: {"id":city_id},
    //         dataType: 'json',
    //         success: function(response) {
    //             console.log(response);

    //             // $('#shipping_city_s').html('');

    //             $('#shipping_city').empty();
    //             $('#shipping_city_s').html('Select');
    //             $('#shipping_city').find('option').not(':first').remove();

    //             // $('#shipping_city').empty();

    //             // Add options
    //             $('#shipping_city').each(function() {
    //                 if (this.selectize) {
    //                     for(x=0; x < 10; ++x){
    //                         this.selectize.addOption({value:x, text: x});
    //                     }
    //                 }
    //             });

    //             $.each(response,function(index,data){
    //                 $('#shipping_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
    //             });

    //         },
    //         error: function () {
    //             alert('Data Not Deleted');
    //         }
    //     });

    // }

</script>

<script type="text/javascript">

    function getReferByValue(value){
        var refer_by = value.options[value.selectedIndex].value;
        // alert(refer_by);
        if(refer_by == 'Business Executive'){
            $('#reference_person_show').hide();
            $('#business_executive_show').show();
        }else{
            $('#business_executive_show').hide();
            $('#reference_person_show').show();
        }

    }
    
    $(document).ready(function(){

        var e = document.getElementById("refer_by");
        var refer_by = e.value;

        if(refer_by == 'Business Executive'){
            $('#reference_person_show').hide();
            $('#business_executive_show').show();
        }else if(refer_by == 'Friends' || refer_by == 'Social Media' || refer_by == 'Others'){
            $('#business_executive_show').hide();
            $('#reference_person_show').show();
        }else{
            $('#reference_person_show').hide();
            $('#business_executive_show').hide();
        }

    });


    /* check Add Doctor Email availabilty */
    $('#doctor_email_available').on('keyup',function(){  
        var email = $('#doctor_email_available').val();  
        if(email != '') {  
            $.ajax({  
                    url:site_url+'register/check_email_avalibility',  
                    method:"POST",  
                    data:{email:email},  
                    success:function(data){  
                        obj1 = JSON.parse(data);  
                        if(obj1.success==0){
                            $('#doctor_email_result').html('<label class="text-danger" style="color:red !important;padding: 0px 12px;"><i class="fa fa-times" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                            $('#doctor_add_btn').prop('disabled', true);
                        }
                        else{
                            $('#doctor_email_result').html('<label class="text-success" style="color:green !important;padding: 0px 12px;"><i class="fa fa-check" aria-hidden="true"></i>'+obj1.reason+'</label>'); 
                            $('#doctor_add_btn').prop('disabled', false);
                        }                             
                    }  
            });  
        }  
    });  


</script>