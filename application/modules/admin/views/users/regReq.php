<div id="page_content" class="registration-req">
   <div id="page_content_inner">
      <br>
      <h1 class="patientMobile" style="font-family: Lato;"><b>Registration Requests</b></h1>
      <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1'}">
         <li class="uk-active"><a href="#">All</a></li>
         <li><a href="#">Accepted</a></li>
         <li><a href="#">Declined</a></li>
         <li><a href="#">Pending</a></li>
      </ul>
      <div style="border-radius: 12px !important;" class="md-card uk-margin-medium-bottom">
         <div class="md-card-content">
            <?php if ($this->session->flashdata('error')) { ?>
            <div class="uk-alert uk-alert-danger" data-uk-alert="">
               <a href="#" class="uk-alert-close uk-close"></a>
               <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php } if ($this->session->flashdata('success')) { ?>
            <script>jQuery(document).ready(function(){ w3_alert("<?php echo $this->session->flashdata('success'); ?>", "<?php echo $this->session->flashdata('icon'); ?>", "type"); });</script>
            <!--<div class="uk-alert uk-alert-success" data-uk-alert="">
               <a href="#" class="uk-alert-close uk-close"></a>
               
               <?php echo $this->session->flashdata('success'); ?>
               
               </div>-->
            <?php } ?>
            <div class="uk-grid" data-uk-grid-margin style="margin-top: 15px;">
               <div class="uk-width-1-1" style="padding-right:0px;">
                  <ul id="tabs_1" class="uk-switcher uk-margin">
                     <li>
                        <div class="md-card-content">
                           <div class="uk-overflow-container" style="border-radius: 10px;">
                              <!-- <a class="buttonAlignment gridMobileSetting" href=""> 
                                 <span class="material-icons iconSizeSetting">
                                 menu
                                 </span>
                                 </a>
                                 <a class="buttonAlignment gridMobileSetting " href=""> 
                                 <span class="material-icons gridIconSetting">
                                     grid_view
                                 </span>
                                 </a> -->
                              <!--  <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div> -->
                              <!--  <table   class="uk-table uk-table-nowrap"  cellspacing="0" width="100%"> -->
                              <table class="uk-table uk-table-nowrap"  cellspacing="0" width="100%">
                                 <thead style="background-color: #FAFAFA;">
                                    <tr>
                                       <th style="padding-left: 30px;"><b>ID</b></th>
                                       <th class="uk-width-2-10"><b>Name</b></th>
                                       <th class="uk-width-2-10"><b>Email</b></th>
                                       <th class="uk-width-2-10"><b>Phone</b></th>
                                       <th class="uk-width-2-10"><b>Billing Address</b></th>
                                       <th class="uk-width-2-10"><b>Shipping Address</b></th>
                                       <th class="uk-width-2-10"><b>Reference Type</b></th>
                                       <th class="uk-width-2-10"><b>Refenence Name</b></th>
                                       <th class="uk-width-1-10"><b>Status</b></th>
                                       <th class="uk-width-2-10"><b>Options</b></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1; foreach($users as $regUsers): ?>
                                    <tr>
                                       <td style="padding-left: 30px;"><?= $i; ?></td>
                                       <td class="tblRow">
                                          <?php if($regUsers->profile_image!=''){ ?>
                                          <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $regUsers->profile_image); ?>" style="height: 34px !important;"> 
                                          <span style="padding: 10px 0px 0px 8px;"><?= $regUsers->first_name; ?></span>
                                          <?php } else{ ?>
                                          <div class="" style="display:flex;align-items:center;">
                                             <div id="profileImageUser"><?php 
                                                $userName = $regUsers->first_name;
                                                $lastName = $regUsers->last_name;
                                                echo $userName[0].$lastName[0]; 
                                                ?></div>
                                             <div style="padding:12px 3px;">
                                                <?= $regUsers->first_name; ?>
                                             </div>
                                          </div>
                                          <?php } ?>
                                       </td>
                                       <td class="  tblRow"><?= $regUsers->email; ?></td>
                                       <td class="  tblRow"><?= $regUsers->phone_number; ?></td>
                                       <td class="  tblRow"><?= $regUsers->street_address .", ". $regUsers->city.", ". $regUsers->state.", ". $regUsers->country.", ". $regUsers->zip_code; ?></td>

                                       <?php foreach ($shipping_address as $key => $address) { 
                                          if($address->doctor_id == $regUsers->id && $address->default_shipping_address == 1){ ?>
                                           <td class="tblRow"><?= $address->street_address .", ". $address->city.", ". $address->state.", ". $address->country.", ". $address->zip_code; ?></td>
                                       <?php }} ?>
                                        <td class="tblRow"><?= ($regUsers->refer_by != '') ? $regUsers->refer_by : '- - - ' ?></td>
                                        <td class="tblRow"><?= ($regUsers->refer_text != '') ? $regUsers->refer_text : '- - - ' ?></td>


                                       <?php 
                                          if($regUsers->is_active==0) { ?>
                                       <td class="  tblRow custom-pending-btn">Pending</td>
                                       <?php } else if($regUsers->is_active==1) {  ?>
                                       <td class="  tblRow custom-accept-btn">Accepted</td>
                                       <?php } else { ?>
                                       <td class="  tblRow custom-decline-btn">Declined</td>
                                       <?php } ?>
                                       <?php 
                                          if($regUsers->is_active==0) { ?>
                                       <td class="  tblRow">
                                          <a class="custom-accept-btn"  onclick="setDoctorPassword('<?= $regUsers->id; ?>')" data-uk-modal="{target:'#accept-doctor-modal'}" href="<?= site_url('admin/acceptDoctor/').$regUsers->id; ?>" class="uk-text-success">Accept</a> &nbsp;&nbsp;&nbsp;
                                          <a  class="custom-decline-btn open-AddBookDialog" data-id="<?= $regUsers->id; ?>" data-uk-modal="{target:'#modal_decline_doctor'}" href="" class="uk-text-danger custom-decline-btn">DECLINE</a> &nbsp;&nbsp;&nbsp;
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$regUsers->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                       <?php 
                                          if($regUsers->is_active==1) { ?>
                                       <td class="  tblRow">
                                          <a class="custom-view-btn"  href="<?= site_url('admin/viewRegistration/').$regUsers->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                       <?php 
                                          if($regUsers->is_active==2) { ?>
                                       <td class="  tblRow">
                                          <a onclick="setDoctorPassword('<?= $regUsers->id; ?>')" data-uk-modal="{target:'#accept-doctor-modal'}" href="<?= site_url('admin/acceptDoctor/').$regUsers->id; ?>" class="uk-text-success custom-accept-btn">Accept</a> &nbsp;&nbsp;&nbsp;
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$regUsers->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                 </tbody>
                              </table>
                            
                           </div>
                           <ul class="uk-pagination uk-margin-medium-top" style="float: left; margin: 30px;">
                              <li class="uk-disabled"><span style="border: 1px solid #8080801a;"><i class="uk-icon-angle-double-left"></i></span></li>
                              <li class="uk-active"><span style="border: 1px solid #8080801a;">1</span></li>
                              <li><a style="border: 1px solid #8080801a;" href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="md-card-content">
                           <div class="uk-overflow-container" style="border-radius: 10px;">
                              <!--          <a class="buttonAlignment gridMobileSetting" href=""> 
                                 <span class="material-icons iconSizeSetting">
                                 menu
                                 </span>
                                 </a>
                                 <a class="buttonAlignment gridMobileSetting " href=""> 
                                 <span class="material-icons gridIconSetting">
                                     grid_view
                                 </span>
                                 </a>
                                 
                                 <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div> -->
                              <table   class="uk-table uk-table-nowrap"  cellspacing="0" width="100%">
                                 <thead style="background-color: #FAFAFA;">
                                    <tr>
                                       <th style="padding-left: 30px;"><b>ID</b></th>
                                       <th class="uk-width-2-10"><b>Name</b></th>
                                       <th class="uk-width-2-10  "><b>Email</b></th>
                                       <th class="uk-width-2-10  "><b>Phone</b></th>
                                       <th class="uk-width-2-10  "><b>Billing Address</b></th>
                                       <th class="uk-width-2-10  "><b>Shipping Address</b></th>
                                          <th class="uk-width-2-10"><b>Reference Type</b></th>
                                       <th class="uk-width-2-10"><b>Refenence Name</b></th>
                                       <th class="uk-width-1-10  "><b>Status</b></th>
                                       <th class="uk-width-2-10"><b>Options</b></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1; foreach($accepted_users as $acceptUsers): ?>
                                    <tr>
                                       <td class="tblRow" style="padding-left: 30px !important;"><?= $i; ?></td>
                                       <td class="tblRow">
                                          <?php if($acceptUsers->profile_image!=''){ ?>
                                          <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $acceptUsers->profile_image); ?>" style="height: 34px !important;"> 
                                          <span style="padding: 10px 0px 0px 8px;"><?= $acceptUsers->first_name; ?></span>
                                          <!-- <?= $acceptUsers->first_name; ?> -->
                                          <?php } else{ ?>
                                          <div class="" style="display:flex;align-items:center;">
                                             <div id="profileImageUser"><?php 
                                                $userName = $acceptUsers->first_name;
                                                $lastName = $acceptUsers->first_name;
                                                echo $userName[0].$lastName[0]; 
                                                ?></div>
                                                <div style="padding:12px 3px;">
                                                   <?= $acceptUsers->first_name; ?>
                                                </div>
                                             <?php } ?>
                                          </div>
                                       </td>
                                       <td class="  tblRow"><?= $acceptUsers->email; ?></td>
                                       <td class="  tblRow"><?= $acceptUsers->phone_number; ?></td>
                                       <td class="  tblRow"><?= $regUsers->street_address .", ". $regUsers->city.", ". $regUsers->state.", ". $regUsers->country.", ". $regUsers->zip_code; ?></td>

                                       <?php foreach ($shipping_address as $key => $address) { 
                                          if($address->doctor_id == $regUsers->id && $address->default_shipping_address == 1){ ?>
                                           <td class="tblRow"><?= $address->street_address .", ". $address->city.", ". $address->state.", ". $address->country.", ". $address->zip_code; ?></td>
                                       <?php }} ?>

                                        <td class="tblRow"><?= ($regUsers->refer_by != '') ? $regUsers->refer_by : '- - - ' ?></td>
                                        <td class="tblRow"><?= ($regUsers->refer_text != '') ? $regUsers->refer_text : '- - - ' ?></td>

                                       <?php 
                                          if($acceptUsers->is_active==0) { ?>
                                       <td class="  tblRow  custom-pending-btn">Pending</td>
                                       <?php } else if($acceptUsers->is_active==1) {  ?>
                                       <td class="  tblRow  custom-accept-btn">Accepted</td>
                                       <?php } else { ?>
                                       <td class="  tblRow custom-decline-btn">Declined</td>
                                       <?php } ?>
                                       <?php 
                                          if($acceptUsers->is_active==0) { ?>
                                       <td class="  tblRow">
                                          <a onclick="setDoctorPassword('<?= $acceptUsers->id; ?>')" data-uk-modal="{target:'#accept-doctor-modal'}" href="<?= site_url('admin/acceptDoctor/').$acceptUsers->id; ?>" class="uk-text-success custom-accept-btn">Accept</a> &nbsp;&nbsp;&nbsp;
                                          <a href="<?= site_url('admin/declineDoctor/').$acceptUsers->id; ?>" class="uk-text-danger custom-decline-btn">Decline</a> &nbsp;&nbsp;&nbsp;
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$acceptUsers->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                       <?php 
                                          if($acceptUsers->is_active==1) { ?>
                                       <td class="  tblRow">
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$acceptUsers->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                       <?php 
                                          if($acceptUsers->is_active==2) { ?>
                                       <td class="  tblRow">
                                          <a onclick="setDoctorPassword('<?= $acceptUsers->id; ?>')" data-uk-modal="{target:'#accept-doctor-modal'}" href="<?= site_url('admin/acceptDoctor/').$acceptUsers->id; ?>" class="uk-text-success custom-accept-btn">Accept</a> &nbsp;&nbsp;&nbsp;
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$acceptUsers->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                 </tbody>
                              </table>
                           </div>
                           <ul class="uk-pagination uk-margin-medium-top" style="float: left; margin: 30px;">
                              <li class="uk-disabled"><span style="border: 1px solid #8080801a;"><i class="uk-icon-angle-double-left"></i></span></li>
                              <li class="uk-active"><span style="border: 1px solid #8080801a;">1</span></li>
                              <li><a style="border: 1px solid #8080801a;" href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="md-card-content">
                           <div class="uk-overflow-container" style="border-radius: 10px 10px 0px 0px;">
                              <!--   <a class="buttonAlignment gridMobileSetting" href=""> 
                                 <span class="material-icons iconSizeSetting">
                                 menu
                                 </span>
                                 </a>
                                 <a class="buttonAlignment gridMobileSetting " href=""> 
                                 <span class="material-icons gridIconSetting">
                                     grid_view
                                 </span>
                                 </a>
                                 
                                 <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div>
                                 -->
                              <table   class="uk-table uk-table-nowrap"  cellspacing="0" width="100%">
                                 <thead style="background-color: #FAFAFA;">
                                    <tr>
                                       <th style="padding-left: 30px !important;"><b>ID</b></th>
                                       <th class="uk-width-2-10"><b>Name</b></th>
                                       <th class="uk-width-2-10  "><b>Email</b></th>
                                       <th class="uk-width-2-10  "><b>Phone</b></th>
                                         <th class="uk-width-2-10  "><b>Billing Address</b></th>
                                       <th class="uk-width-2-10  "><b>Shipping Address</b></th>
                                       <th class="uk-width-2-10"><b>Reference Type</b></th>
                                       <th class="uk-width-2-10"><b>Refenence Name</b></th>
                                       <th class="uk-width-1-10  "><b>Status</b></th>
                                       <th class="uk-width-2-10"><b>Options</b></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1; foreach($declinedUsers as $doctorDecline): ?>
                                    <tr>
                                       <td style="padding-left: 30px !important;" class="tblRow"><?= $i; ?></td>
                                       <td class="tblRow">
                                          <?php if($doctorDecline->profile_image!=''){ ?>
                                          <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $doctorDecline->profile_image); ?>" style="height: 34px !important;"> 
                                          <span style="padding: 10px 0px 0px 8px;"><?= $doctorDecline->first_name; ?></span>
                                          <!-- <?= $doctorDecline->first_name; ?> -->
                                          <?php } else{ ?>
                                          <div class="" style="display:flex;align-items:center;">
                                             <div id="profileImageUser"><?php 
                                             $userName = $doctorDecline->first_name;
                                             $lastName = $doctorDecline->first_name;
                                             echo $userName[0].$lastName[0]; 
                                             ?></div>
                                             <div style="padding:12px 3px;">
                                                <?= $regUsers->first_name; ?>
                                             </div>
                                          </div>
                                          <?php } ?>
                                       </td>
                                       <td class="  tblRow"><?= $doctorDecline->email; ?></td>
                                       <td class="  tblRow"><?= $doctorDecline->phone_number; ?></td>
                                       <td class="  tblRow"><?= $regUsers->street_address .", ". $regUsers->city.", ". $regUsers->state.", ". $regUsers->country.", ". $regUsers->zip_code; ?></td>

                                       <?php foreach ($shipping_address as $key => $address) { 
                                          if($address->doctor_id == $regUsers->id && $address->default_shipping_address == 1){ ?>
                                           <td class="tblRow"><?= $address->street_address .", ". $address->city.", ". $address->state.", ". $address->country.", ". $address->zip_code; ?></td>
                                       <?php }} ?>

                                        <td class="tblRow"><?= ($regUsers->refer_by != '') ? $regUsers->refer_by : '- - - ' ?></td>
                                        <td class="tblRow"><?= ($regUsers->refer_text != '') ? $regUsers->refer_text : '- - - ' ?></td>

                                       <?php 
                                          if($doctorDecline->is_active==0) { ?>
                                       <td class="  tblRow uk-text-warning custom-pending-btn">Pending</td>
                                       <?php } else if($doctorDecline->is_active==1) {  ?>
                                       <td class="  tblRow uk-text-success custom-accept-btn">Accepted</td>
                                       <?php } else { ?>
                                       <td class=" tblRow custom-decline-btn uk-text-danger">Declined</td>
                                       <?php } ?>
                                       <?php 
                                          if($doctorDecline->is_active==0) { ?>
                                       <td class="  tblRow">
                                          <a onclick="setDoctorPassword('<?= $doctorDecline->id; ?>')" data-uk-modal="{target:'#accept-doctor-modal'}" href="<?= site_url('admin/acceptDoctor/').$doctorDecline->id; ?>" class="uk-text-success custom-accept-btn">Accept</a> &nbsp;&nbsp;&nbsp;
                                          <a href="<?= site_url('admin/declineDoctor/').$doctorDecline->id; ?>" class="uk-text-danger custom-decline-btn">Decline</a> &nbsp;&nbsp;&nbsp;
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$doctorDecline->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                       <?php 
                                          if($doctorDecline->is_active==1) { ?>
                                       <td class="  tblRow">
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$doctorDecline->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                       <?php 
                                          if($doctorDecline->is_active==2) { ?>
                                       <td class="  tblRow">
                                          <a onclick="setDoctorPassword('<?= $doctorDecline->id; ?>')" data-uk-modal="{target:'#accept-doctor-modal'}" href="<?= site_url('admin/acceptDoctor/').$doctorDecline->id; ?>" class="uk-text-success custom-accept-btn">Accept</a> &nbsp;&nbsp;&nbsp;
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$doctorDecline->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                 </tbody>
                              </table>
                           </div>
                           <ul class="uk-pagination uk-margin-medium-top" style="float: left; margin: 30px;">
                              <li class="uk-disabled"><span style="border: 1px solid #8080801a;"><i class="uk-icon-angle-double-left"></i></span></li>
                              <li class="uk-active"><span style="border: 1px solid #8080801a;">1</span></li>
                              <li><a style="border: 1px solid #8080801a;" href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="md-card-content">
                           <div class="uk-overflow-container" style="border-radius: 10px 10px 0px 0px;">
                              <!--   <a class="buttonAlignment gridMobileSetting" href=""> 
                                 <span class="material-icons iconSizeSetting">
                                 menu
                                 </span>
                                 </a>
                                 <a class="buttonAlignment gridMobileSetting " href=""> 
                                 <span class="material-icons gridIconSetting">
                                     grid_view
                                 </span>
                                 </a>
                                 
                                 <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div> -->
                              <table   class="uk-table uk-table-nowrap"  cellspacing="0" width="100%">
                                 <thead style="background-color: #FAFAFA;">
                                    <tr>
                                       <th  style="padding-left: 30px;"><b>ID</b></th>
                                       <th class="uk-width-2-10"><b>Name</b></th>
                                       <th class="uk-width-2-10  "><b>Email</b></th>
                                       <th class="uk-width-2-10  "><b>Phone</b></th>
                                         <th class="uk-width-2-10  "><b>Billing Address</b></th>
                                       <th class="uk-width-2-10  "><b>Shipping Address</b></th>
                                        <th class="uk-width-2-10"><b>Reference Type</b></th>
                                       <th class="uk-width-2-10"><b>Refenence Name</b></th>
                                       <th class="uk-width-1-10  "><b>Status</b></th>
                                       <th class="uk-width-2-10"><b>Options</b></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $i=1; foreach($pendingUsers as $doctorPending): ?>
                                    <tr>
                                       <td  style="padding-left: 30px;" class="tblRow"><?= $i; ?></td>
                                       <td class="tblRow">
                                          <?php if($doctorPending->profile_image!=''){ ?>
                                          <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $doctorPending->profile_image); ?>" style="height: 34px !important;"> 
                                          <span style="padding: 10px 0px 0px 8px;"><?= $doctorPending->first_name; ?></span>
                                          <!-- <?= $doctorPending->first_name; ?> -->
                                          <?php } else{ ?>
                                          <div class="" style="display:flex;align-items:center;">
                                             <div id="profileImageUser"><?php 
                                             $userName = $doctorPending->first_name;
                                             $lastName = $doctorPending->first_name;
                                             echo $userName[0].$lastName[0]; 
                                             ?></div>
                                             <div style="padding:12px 3px;">
                                                <?= $doctorPending->first_name; ?>
                                             </div>
                                          </div>
                                          <?php } ?>
                                       </td>
                                       <td class="  tblRow"><?= $doctorPending->email; ?></td>
                                       <td class="  tblRow"><?= $doctorPending->phone_number; ?></td>
                                      <td class="  tblRow"><?= $regUsers->street_address .", ". $regUsers->city.", ". $regUsers->state.", ". $regUsers->country.", ". $regUsers->zip_code; ?></td>

                                       <?php foreach ($shipping_address as $key => $address) { 
                                          if($address->doctor_id == $regUsers->id && $address->default_shipping_address == 1){ ?>
                                           <td class="tblRow"><?= $address->street_address .", ". $address->city.", ". $address->state.", ". $address->country.", ". $address->zip_code; ?></td>
                                       <?php }} ?>

                                        <td class="tblRow"><?= ($regUsers->refer_by != '') ? $regUsers->refer_by : '- - - ' ?></td>
                                        <td class="tblRow"><?= ($regUsers->refer_text != '') ? $regUsers->refer_text : '- - - ' ?></td>


                                       <?php 
                                          if($doctorPending->is_active==0) { ?>
                                       <td class="  tblRow uk-text-warning custom-pending-btn">Pending</td>
                                       <?php } else if($doctorPending->is_active==1) {  ?>
                                       <td class="  tblRow uk-text-success custom-accept-btn">Accepted</td>
                                       <?php } else { ?>
                                       <td class="  tblRow uk-text-danger custom-decline-btn">Declined</td>
                                       <?php } ?>
                                       <?php 
                                          if($doctorPending->is_active==0) { ?>
                                       <td class="  tblRow">
                                          <a onclick="setDoctorPassword('<?= $doctorPending->id; ?>')" data-uk-modal="{target:'#accept-doctor-modal'}" href="<?= site_url('admin/acceptDoctor/').$doctorPending->id; ?>" class="uk-text-success custom-accept-btn">Accept</a> &nbsp;&nbsp;&nbsp;
                                          <a href="" data-uk-modal="{target:'#modal_decline_doctor'}" class="uk-text-danger custom-decline-btn">DECLINE</a> &nbsp;&nbsp;&nbsp;
                                          <a href="<?= site_url('admin/viewRegistration/').$doctorPending->id; ?>" class="custom-view-btn" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                       <?php 
                                          if($doctorPending->is_active==1) { ?>
                                       <td class="  tblRow">
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$doctorPending->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                       <?php 
                                          if($doctorPending->is_active==2) { ?>
                                       <td class="  tblRow">
                                          <a onclick="setDoctorPassword('<?= $doctorPending->id; ?>')" data-uk-modal="{target:'#accept-doctor-modal'}" href="<?= site_url('admin/acceptDoctor/').$doctorPending->id; ?>" class="uk-text-success custom-accept-btn">Accept</a> &nbsp;&nbsp;&nbsp;
                                          <a class="custom-view-btn" href="<?= site_url('admin/viewRegistration/').$doctorPending->id; ?>" style="color: #6D3745;">View</a>
                                       </td>
                                       <?php } ?>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                 </tbody>
                              </table>
                           </div>
                           <ul class="uk-pagination uk-margin-medium-top" style="float: left; margin: 30px;">
                              <li class="uk-disabled"><span style="border: 1px solid #8080801a;"><i class="uk-icon-angle-double-left"></i></span></li>
                              <li class="uk-active"><span style="border: 1px solid #8080801a;">1</span></li>
                              <li><a style="border: 1px solid #8080801a;" href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


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
                  <input type="hidden" name="doctorID" id="doctorID" value="<?= $regUsers->id; ?>">

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
                  <input type="hidden" name="doctorIDVal" id="doctorIDVal" required="" class="md-input demoInputBox">
                  <div class="uk-grid">
                     <div class="uk-width-medium-1-1">
                        <div class="md-input-wrapper"><b>Email</b><span class="req">*</span><input type="text" style="" name="email" id="emailID" required="" class="md-input demoInputBox" disabled="" style="background-color: white !important;"><span class="md-input-bar"></span></div>
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
<script type="text/javascript">

   $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #doctorID").val( myBookId );
     // alert(myBookId);
});

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