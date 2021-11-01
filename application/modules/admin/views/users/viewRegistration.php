    <div id="page_content">
        <div id="page_content_inner">
            <br>
            <h1 class="patientMobile"><b>Registration Request</b></h1>
            <?php foreach($doctor_data as $doctorData): ?>
                <div class="uk-grid" data-uk-grid-match id="user_profile">
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="uk-grid uk-margin-small-top uk-margin-large-bottom ml-0" data-uk-grid-margin>
                                <div class="uk-width-large-6-10">
                                    <div class="user_heading userDataBackground">
                                        <div class="user_heading_avatar doctorViewImageSetting">
                                            <div class="thumbnail">
                                                <?php if($doctorData->profile_image !='') { ?>
                                                    <img style="width:100%; height: 82px;" src="<?php echo base_url('assets/uploads/images/'. $doctorData->profile_image); ?>" alt="user avatar"/>
                                                <?php } else{ ?>
                                                    <img src="<?php echo base_url('assets/images/round-bg.png'); ?>" alt="user avatar" class="">                                        
                                                    <div class="marginprofilepicture" id="viewProfileText" style="margin-right:auto;margin-left: auto;margin-top: 15px;">
                                                        <?php
                                                            $userName = $doctorData->first_name;
                                                            $lastName = $doctorData->last_name;
                                                            echo $userName[0].$lastName[0]; 
                                                        ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div><br><br><br><br><br>
                                        <div class="user_heading_content doctorViewNameSetting uk-flex text-btw" style="align-items: center; padding: 0px;">
                                            <h2 style="color:#6D3745 !important; margin-bottom: 0px !important;" class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?= $doctorData->first_name.' '.$doctorData->last_name; ?></span></h2>
                                            <?php if($doctorData->is_active == 1){ ?>
                                             <span class="req-accept-status"><img src="<?php echo base_url('assets/images/green-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Accepted</span>
                                            <?php }elseif($doctorData->is_active == 2){ ?>
                                              <span class="req-reject-status"><img src="<?php echo base_url('assets/images/red-ellipse.svg'); ?>">&nbsp;&nbsp;&nbsp;Rejected</span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="user_content">
                                        <ul id="" class="uk-margin">
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Email ID</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->email; ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Mobile No</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->phone_number; ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Shipping Address</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <?php foreach ($shipping_address as $key => $address) { 
                                                        if($address->doctor_id == $doctorData->id && $address->default_shipping_address == 1){ ?>
                                                    <span><?= $address->street_address .", ". $address->city.", ". $address->state.", ". $address->country.", ". $address->zip_code; ?></span>  
                                                    <?php }} ?>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Billing Address</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->street_address .", ". $doctorData->city.", ". $doctorData->state.", ". $doctorData->country.", ". $doctorData->zip_code; ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>GST no</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->gst_no; ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Reference Type</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= ($doctorData->refer_by != '') ? $doctorData->refer_by : 'N/A' ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Reference Name</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= ($doctorData->refer_text != '') ? $doctorData->refer_text : 'N/A' ?></span>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="uk-width-large-4-10 pr-35p pl-35p" style="margin-top: 20px;">
                                    <div class="md-card bg-grey">
                                        <div class="md-card-content" style="border-radius: 15px;">
                                            <div class="uk-margin-medium-bottom">
                                                <div class="md-list-content">
                                                    <span style="color:#6D3745 !important;" class="md-list-heading"><b>Previous History</b></span>
                                                </div>
                                                <?php foreach($rejected_data as $rejectData): 
                                                    $curdate = $rejectData->cur_date;
                                                    $split_Date_time = explode("-", $curdate);
                                                    $timesSplit = explode(" ", $split_Date_time[2]);
                                                    $convert_Date_format = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$2/$1/$3", $split_Date_time[0]);
                                                    $one_departing_day_name = date("l", strtotime($convert_Date_format));
                                                    $one_departing_month_name = date("F", strtotime($convert_Date_format));
                                                    $one_departing_year_name = date("Y", strtotime($convert_Date_format));
                                                    $one_departing_date_value = date("j", strtotime($convert_Date_format));
                                                ?>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Rejected on <?= $one_departing_date_value.' '.$one_departing_month_name.' '.$timesSplit[1]; ?></span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-medium-top uk-flex uk-flex-right registration-view-btn" data-uk-grid-margin>
                                <div class="uk-flex uk-margin-medium-bottom pr-35p pl-35p">
                                    <div class="uk-margin-small-left uk-margin-small-right">
                                        <a class="md-btn buttonStyling cancel-btn" href="<?= site_url('admin/regReq'); ?>">Cancel</a>
                                    </div>

                                    <?php if($doctorData->is_active == 0){ ?>
                                        <div class="uk-margin-small-left uk-margin-small-right">
                                            <a class="md-btn buttonStyling reject-btn borderSetting" data-uk-modal="{target:'#modal_decline_doctor'}" href="">&nbsp;Reject&nbsp;</a>
                                        </div>
                                        <?php if($doctorData->is_active==1) {  ?>
                                            <div class="uk-margin-small-left uk-margin-large-right-s">
                                                <a class="md-btn buttonStyling accept-btn" href="#">Accept</a>
                                            </div>
                                        <?php } else{ ?>
                                            <div class="uk-margin-small-left">
                                                <a class="md-btn buttonStyling accept-btn" onclick="setDoctorPassword('<?= $doctorData->id; ?>')" data-uk-modal="{target:'#accept-doctor-modal'}" href="<?= site_url('admin/acceptDoctor/').$doctorData->id; ?>">&nbsp;Accept&nbsp;</a>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="uk-modal" id="modal_header_footer">
                <div class="uk-modal-dialog">                                
                    <div class="modal-dialog modal-size"> 
                        <div  class="modal-content">
                            <div class="modal-header" >
                                <div class="modal-title">
                                    Add Password
                                </div>
                            </div>
                            <div class="modal-body">                           
                                <form method="POST" action="<?= site_url('admin/acceptDoctor'); ?>">
                                    <input type="hidden" name="doctorIDVal" id="doctorIDVal" required="" class="md-input demoInputBox">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <div class="md-input-wrapper"><b>Email</b><span class="req">*</span><input type="text" name="email" id="emailID" required="" class="md-input demoInputBox"><span class="md-input-bar"></span></div>
                                            <br>
                                        </div>                                                                
                                        <div class="uk-width-medium-1-1">
                                            <div class="md-input-wrapper"><b>Password</b><span class="req">*</span><input type="text" name="doctorPassword" id="doctorPassword" required="" class="md-input demoInputBox"><span class="md-input-bar"></span></div>                                                                    
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input class="btnBack uk-modal-close" type="button" name="back" id="back" value="Close">                    
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <input class="btnNext" type="submit" name="next" id="next" value="Done" >                                                                    
                                        </div>
                                    </div>                                                            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
   @media only screen and (max-width: 600px) {
      .uk-table td {
      font-size: 12px !important;
      }
      .modal-size{
      width: 340px !important;
      }
      .modal-body {
         padding: 20px 10px 40px !important;
      }
   }
   .footer_pstyle{
   color: #eee;
   }
   .btn-site{
   border: 2px solid #FFF !important;
   }
   .btn-site:hover{
   border: 1px solid #FFF !important;
   }
   .modal-size{
   width: 384px;
   margin-left: auto;
   margin-right: auto;
   }
   .modal-size .form-control{
   background: rgba(0, 0, 0, 0.05);
   border: 1px solid rgba(0, 0, 0, 0.1);
   box-sizing: border-box;
   border-radius: 100px;
   }
   .modal-size button{
   border-radius: 15px;
   /* Login */
   font-family: Lato;
   align-items: center;
   text-align: center;
   color: #FFFFFF;
   }
   .modal-size label{
   color: #52575C;
   }
   .modal-size .modal-header{
   background-color: #F0E0C9 !important;
   border-radius: 6px;
   padding:15px;"
   }
   .modal-size .modal-title{
   font-weight: bold;
   font-size: 36px;
   line-height: 90%;
   color: #6D3745;
   text-align: center
   }
   .uk-modal-dialog {
   width: 386px !important;
   padding: 0px !important;
   }
   .modal-body {
   position: relative;
   padding: 15px;
   }
   @media (min-width: 768px){
   .modal-content {
   -webkit-box-shadow: 0 5px 15px rgb(0 0 0 / 50%);
   box-shadow: 0 5px 15px rgb(0 0 0 / 50%);
   }
   }
   .modal-content {
   position: relative;
   background-color: #fff;
   border: 1px solid #999;
   border: 1px solid rgba(0, 0, 0, 0.2);
   border-radius: 6px;
   -webkit-box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
   box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
   background-clip: padding-box;
   outline: 0;
   }
</style>

<!--ACCEPT DOCTOR MODEL-->
<div class="uk-modal" id="accept-doctor-modal">
   <div class="uk-modal-dialog">
      <div class="modal-dialog modal-size">
         <div  class="modal-content">
            <div class="modal-header" >
               <div class="modal-title">
                  Add Password
               </div>
            </div>
            <div class="modal-body" style="padding: 20px 35px 40px;">
               <form method="POST" action="<?= site_url('admin/acceptDoctor'); ?>">
                  <input type="hidden" name="doctorIDVal" value="<?= $doctorData->id; ?>" required="" class="md-input demoInputBox">
                  <div class="uk-grid">
                     <div class="uk-width-medium-1-1">
                        <div class="md-input-wrapper"><b>Email</b><span class="req">*</span>
                            <input type="text" style="" name="email" id="emailID" value="<?= $doctorData->email; ?>" required="" class="md-input demoInputBox"  disabled=""><span class="md-input-bar"></span></div>
                        <br>
                     </div>
                     <div class="uk-width-medium-1-1">
                        <div class="md-input-wrapper"><b>Password</b><span class="req">*</span>
                           <input style="" 
                            type="text" name="doctorPassword" id="doctorPassword" required="" class="md-input demoInputBox"><span class="md-input-bar"></span></div>
                     </div>
                  </div>
                  <br>
                  <br>
                  <div class="uk-grid">
                  <!-- <div class="uk-width-medium-1-2 uk-width-1-2">
                     <button class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor uk-modal-close" type="button" name="back" id="cancelBtn" value="Close" style="float:left !important;">Cancel</button>
                  </div> -->
                  <div class="uk-width-medium-1-1">
                     <button style="width: 100%; background-color: #56BB6D !important;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" type="submit" name="next" id="next" value="Done" >Done</button>
                  </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!--END ACCEPT DOCTOR MODEL-->

<!--DECLINE DOCTOR MODEL-->
<div class="uk-modal" id="modal_decline_doctor">
   <div class="uk-modal-dialog modal-size" style="border-radius: 20px;">

         <div  class="modal-content">
            <div class="modal-header" style="background-color:white !important;">
               <div class="modal-title">
                  <h2 class=""><b>Are you sure you want to Decline Request?</b></h2>
               </div>
            </div>
            <div class="modal-body">

               <form method="POST" action="<?= site_url('admin/declineDoctor'); ?>">
                  <input type="hidden" name="doctorID" id="doctorID" value="<?= $doctorData->id; ?>">

                  <div class="uk-grid">
                     
                     <div class="uk-width-medium-1-1">
                        <!-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> -->
                        <lottie-player src="<?php echo base_url('assets/json/lottie-alert.json'); ?>"  background="transparent"  speed=".5"  style="width: 300px; height: 200px;"  loop autoplay></lottie-player>
                     </div>   
                     <div class="uk-width-medium-1-1 pr-0">
                        <button class="md-btn themeColor borderSetting alert-yes" style=" width: 100%; margin-top: 30px;" type="submit" name="next" id="next">Yes</button>
                     </div>
                     <div class="uk-width-medium-1-1" style="padding-right:0px;">
                        <input class="md-btn uk-modal-close alert-no" style=" padding: 2px 25px !important; border-radius: 15px;   width: 100%; margin-top: 10px;" type="button" name="back" id="back" value="No">
                     </div>

                  </div>

               </form>
            </div>
         </div>
   </div>
</div>
<!--END DECLINE DOCTOR MODEL-->

<script type="text/javascript">
    function setDoctorPassword(doctorID){
        $.ajax({
            type: 'POST', 
            url: '<?php echo site_url(''); ?>admin/setDoctorPassword', 
            data: {doctorID:doctorID},
            success: function(response) { 
                  obj1 = JSON.parse(response); 
                  doctorData = obj1.doctorData;
                  if (obj1.success == 1) {
                    // for(var j=0;j<doctorData.length;j++)
                        $("#emailID").val(doctorData[0]['email']);
                        $("#doctorIDVal").val(doctorData[0]['id']);
                        // document.getElementById("doctorIDVal").value = doctorData[j]['email'];

                        // $("#doctorID").html(doctorData[j]['email']);
                  }
                  else{
                     
                  }          
          }                    
        });
        
    }
</script>