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
        <h1 class="headingSize patientMobile"><b>Edit Treatment Planner</b></h1>
        <br>
        <div>
            <div class="md-card-content">
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
                <form method="POST" action="<?= site_url('admin/treatmentplanner/udpatePlannerData'); ?>" enctype="multipart/form-data">
                    <?php foreach($planner_data as $plannerData): ?>
                        <?php $plannerID = $plannerData->id; ?>
                        <input type="hidden" name="plannerID" value="<?= $plannerData->id; ?>">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>First Name *</b></label>
                                            <input type="text" name="first_name" class="md-input input-border" placeholder="Enter First Name" value="<?= $plannerData->first_name; ?>" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3 ">
                                            <label class="label-p"><b>Last Name *</b></label>
                                            <input type="text" name="last_name" class="md-input input-border" placeholder="Enter Last Name" value="<?= $plannerData->last_name; ?>" required/>
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
                                                        <?php if($plannerData->profile_image!=''){ ?>
                                                            <img src="<?php echo base_url('assets/uploads/images/'. $plannerData->profile_image); ?>" style="width: 100% !important;" alt="user avatar"/>
                                                        <?php } else{ ?>
                                                            <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar"/>
                                                        <?php } ?>
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
                                                        <input type="radio" name="gender" value="male" id="val_radio_male" data-md-icheck <?php echo $plannerData->gender == 'male' ? 'checked' : ''; ?>/>
                                                        <label for="val_radio_male" class="inline-label">Male</label>
                                                    </span>
                                                    <span class="icheck-inline">
                                                        <input type="radio" name="gender" id="val_radio_female" value="female" data-md-icheck <?php echo $plannerData->gender == 'female' ? 'checked' : ''; ?>/>
                                                        <label for="val_radio_female" class="inline-label">Female</label>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <label class="label-p"><b>Age</b></label>
                                                <input type="number" name="age" class="md-input input-border" placeholder="Enter Age" value="<?= $plannerData->age; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>Email ID*</b></label>
                                            <input type="text" name="email" class="md-input input-border" placeholder="Enter Email" value="<?= $plannerData->email; ?>" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>Mobile No*</b></label>
                                            <input type="text" name="phone_number" class="md-input input-border" placeholder="Enter Mobile No" value="<?= $plannerData->phone_number; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>Password*</b></label>
                                            <input type="text" name="password" class="md-input input-border" placeholder="Enter Password" />
                                        </div>
                                         <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Age</b></label>
                                            <input type="text" name="age" class="md-input input-border" placeholder="Enter Age"  value="<?= $plannerData->age; ?>"/>
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

                                                            <?php foreach($treatment_address as $address):  ?>
                                                                <?php if($address['check_all'] == 0){ ?>
                                                                    <div class="location-tags" style="display: inline-block;">
                                                                       <span class="uk-flex uk-flex-between">
                                                                            <span><?= $address['city'] ?></span>&nbsp;&nbsp;
                                                                            <a class="uk-margin-left"  onclick="deleteTreatmentAddressByID('<?= $address['id']; ?>')">
                                                                                <img src="<?php echo base_url('assets/images/white-cross.svg'); ?>">
                                                                            </a>
                                                                       </span>
                                                                    </div>&nbsp;&nbsp;&nbsp;
                                                                <?php }else{ ?>
                                                                    <div class="location-tags" style="display: inline-block;">
                                                                       <span class="uk-flex uk-flex-between">
                                                                            <span><?= 'All' ?></span>&nbsp;&nbsp;
                                                                            <a class="uk-margin-left"  onclick="deleteTreatmentAddressByID('<?= $address['id']; ?>')">
                                                                                <img src="<?php echo base_url('assets/images/white-cross.svg'); ?>">
                                                                            </a>
                                                                       </span>
                                                                    </div>&nbsp;&nbsp;&nbsp;
                                                                <?php } ?>
                                                            <?php endforeach; ?>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="uk-width-medium-1-3">
                                             <div class="uk-grid">
                                                 <div class="uk-width-medium-1-4">
                                                     <div class="add-address">
                                                        <a  style="display: flex; align-items: center; justify-content: center;" data-uk-modal="{target:'#add-treatment-model'}">
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
                                <button type="submit" name="submit" class="md-btn md-btn-primary editDoctorMobile submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#">Update</button>
                                <a class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="<?= site_url('admin/treatmentplanner/plannersList'); ?>" id="cancelBtn">Cancel</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>

<!-- Load Modal -->

<?php  
    $data['plannerID'] = $plannerID;
    $this->load->view('../../../modals/editTreatmentModals', $data); 
?>




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