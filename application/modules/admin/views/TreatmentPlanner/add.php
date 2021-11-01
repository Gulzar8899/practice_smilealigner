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
    <div id="page_content_inner">
        <br>
        <h1 class="headingSize patientMobile"><b>Add Treatment Planner</b></h1>
        <br>
        <div>
            <div class="md-card-content">
                <form method="POST" action="<?= site_url('admin/treatmentplanner/submitPlanner'); ?>" enctype="multipart/form-data">
                    <input type="hidden" id="randomTreatmentID" name="randomTreatmentID">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>First Name *</b></label>
                                            <input type="text" placeholder="Enter First Name" name="first_name" class="md-input input-border" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Last Name *</b></label>
                                            <input type="text" placeholder="Enter Last Name" name="last_name" class="md-input input-border" required/>
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
                                                <input type="hidden" name="planner_img_name" id="pt_img_name" value="">
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
                                            <label for="gender" class="uk-form-label"><b>Gender</b><span class="req">*</span></label>
                                            <br>
                                            <div class="mt-15p">
                                                <span class="icheck-inline">
                                                    <input type="radio" name="gender" value="male" id="val_radio_male" data-md-icheck <?php echo $developerData->gender == 'male' ? 'checked' : ''; ?>/>
                                                    <label for="val_radio_male" class="inline-label">Male</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="radio" name="gender" id="val_radio_female" value="female" data-md-icheck <?php echo $developerData->gender == 'female' ? 'checked' : ''; ?>/>
                                                    <label for="val_radio_female" class="inline-label">Female</label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Age</b></label>
                                            <input type="number" name="age" class="md-input input-border" placeholder="Enter Age" value="<?= $developerData->age; ?>"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Email ID*</b></label>
                                            <input type="email" name="email" class="md-input input-border" placeholder="Enter Email" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Mobile No*</b></label>
                                            <input type="number" name="phone_number" class="md-input input-border" placeholder="Enter Mobile No" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Password*</b></label>
                                            <input type="text" name="password" class="md-input input-border" placeholder="Enter Password" required/>
                                        </div>
                                    </div>
                                </div>


                                                               <div class="uk-form-row">
                                    <div class="uk-grid" style="align-items: center;">
                                        <div class="uk-width-medium-1-3">
                                            <div class="md-card cardMobile">
                                                <div class="md-card-content">
                                                    
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-1">
                                                             <h4 class="" style="color:#6d3745;"><b>Allocated Location*</b></h4>
                                                        </div>
                                                       
                                                    </div>
                                                    
                                                    <div class="uk-grid uk-margin-top-remove">
                                                        <div class="uk-width-medium-1-1">

                                                            <div class="show-treatment-location">
                                                                
                                                            </div>


                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="uk-width-medium-1-3">
                                             <div class="uk-grid">
                                                 <div class="uk-width-medium-1-4">
                                                     <div class="add-address">
                                                        <a  style="display: flex; align-items: center; justify-content: center;" data-uk-modal="{target:'#add-treatment-address-model'}">
                                                            <img src="<?php echo site_url('assets/images/plus-icon.svg'); ?>">
                                                        </a>
                                                    </div>
                                                 </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                          
                             <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <br>
                                    <br>
                                    <br>
                                </div></div>
                            <div class="uk-width-medium-1-1">
                                <br>

                                <button type="submit" name="submit" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#">&nbsp;&nbsp;&nbsp;Add</button>
                                <a href="<?= site_url('admin'); ?>" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#" id="cancelBtn">Cancel</a>
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

<?php  
    $this->load->view('../../../modals/addTreatmentModals'); 
?>

<!-- <script type="text/javascript">
    function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * 
        charactersLength));
    }
    return result;
}
</script> -->

<!-- Treatment Modal With Ajax Call-->
<script type="text/javascript">
    
           //Add New Shipping Address From Patient
            $(".createTreatmentAddress").submit(function (event) {

                // var treatmentRandomId = makeid(5);
                var treatmentID = $('#treatmentID').val();

                // Assign value to Hidden Input
                $('#randomTreatmentID').val(treatmentID);

                var city = $('.shipping_city').val();
                var cross_icon = "<?php echo base_url('assets/images/white-cross.svg'); ?>";
                // alert(treatmentID);
                event.preventDefault(); //prevent the browser to execute default action. Here, it will prevent browser to be refresh
                $.ajax({
                    url: "<?php echo base_url('admin/Treatmentplanner/addTreatAddress'); ?>", //backend url
                    data: $(".createTreatmentAddress").serialize(), //sending form data in a serialize way
                    type: "post",
                    async: false, //hold the next execution until the previous execution complete
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);

                        if($("#checkAll").prop('checked') == false){
                            $('.show-treatment-location').append('<div id="'+response+'" style="display: inline-block;"><div class="location-tags"><span class="uk-flex uk-flex-between"><span>'+city+'</span>&nbsp;&nbsp;<a class="uk-margin-left" onclick="onAjaxdeleteTreatmentAddressByID('+response+')"> <img src="'+cross_icon+'"> </a></span></div>&nbsp;&nbsp;&nbsp;</div>');
                        }
                        else
                        { 
                            $('.show-treatment-location').append('<div id="'+response+'" style="display: inline-block;"><div class="location-tags"><span class="uk-flex uk-flex-between"><span>All</span>&nbsp;&nbsp;<a class="uk-margin-left" onclick="onAjaxdeleteTreatmentAddressByID('+response+')"> <img src="'+cross_icon+'"> </a></span></div>&nbsp;&nbsp;&nbsp;</div>');
                        }

                      


                        // Hide Shipping Modal
                        UIkit.modal('#add-treatment-address-model').hide();
                        // $('.createTreatmentAddress')[0].reset(); //reset form
                        $('.shipping_country_s').html('Select');
                        $('.shipping_state_s').html('Select');
                        $('.shipping_city_s').html('Select');
                    },
                    error: function ()
                    {
                        alert("error"); //error occurs
                    }
                });
            });
</script>
<!-- END Shipping Modal With Ajax Call-->

<script type="text/javascript">
    function onAjaxdeleteTreatmentAddressByID(id){
        // alert(id);
        $.ajax({
            type: 'post', 
            url: '<?php echo base_url("admin/Treatmentplanner/deleteTreatAddress");?>',
            data: {id:id},
            success: function(result){
                console.log("#"+id);
                $("#"+id).empty();
            }
        });
    }
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
</script>