<div id="page_content">
        <div id="page_content_inner">
            <br><br>
            <h1 class="heading_a headingSize patientMobile uk-margin-bottom"><b>Doctors</b></h1>
            <div class="md-card uk-margin-medium-bottom">
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
                    <div class="uk-width-medium-1-5 addPatientButton regularButtonAlignment w-xs-auto">
                        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light buttonStyling" href="<?= site_url('admin/doctor/addDoctor'); ?>">
                            Add
                        </a>
                    </div>
                    <a class="buttonAlignment btn-list" href="<?= site_url('admin/doctors'); ?>"> 
                        <img src="<?php echo base_url('assets/admin/assets/img/list-icon-active.svg') ?>">
                    </a>
                    <a class="buttonAlignment btn-grid" href="<?= site_url('admin/doctor/doctorGridList'); ?>"> 
                        <img src="<?php echo base_url('assets/admin/assets/img/grid-icon.svg') ?>">
                    </a>
                    <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting">
                        <div class="filterdown">
                            <button class="filterbtn"><img onClick="myFunction()" id="filtericon" src="<?php echo base_url('assets/admin/assets/img/filter.svg') ?>"></button>
                            <div id="filterDropdown" class="filter-dropdown-content">
                                <ul id="colsDrop">
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="0">
                                                <span>Doctor ID</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="1">
                                                <span>Doctor</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="2">
                                                <span>Email</span>
                                            </label>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="3">
                                                <span>Age</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="4">
                                                <span>Mobile No</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="5">
                                                <span>Shipping Address</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="6">
                                                <span>Billing Address</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="7">
                                                <span>GST No</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="8">
                                                <span>Reference Type</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="8">
                                                <span>Reference Name</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="9">
                                                <span>Options</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Data Table -->
                    <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                        <thead class="tableHeadingBorder">
                        <tr>
                            <th class="tblHeading"><b>Doctor ID</b></th>
                            <th class="tblHeading"><b>Doctor</b></th>
                            <th class="tblHeading"><b>Email</b></th>
                            <th class="tblHeading"><b>Age</b></th>
                            <th class="tblHeading"><b>Mobile No</b></th>
                            <th class="tblHeading"><b>Shipping Address</b></th>
                            <th class="tblHeading"><b>Billing Address</b></th>
                            <th class="tblHeading"><b>GST No</b></th>
                            <th class="uk-width-2-10"><b>Reference Type</b></th>
                            <th class="uk-width-2-10"><b>Refenence Name</b></th>
                            <th class="tblHeading"><b>Options</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($accepted_users as $regUsers): ?>
                            <tr>
                                <td class="tblRow"><?= $regUsers->id; ?></td>
                                <td class="tblRow">
                                    <?php if($regUsers->profile_image!=''){ ?>
                                        <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $regUsers->profile_image); ?>"> <?= $regUsers->first_name; ?>
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
                                        
                                       <!--  <img class="md-user-image" src="<?php echo base_url('assets/images/round-bg.png'); ?>"> <?= $regUsers->first_name; ?>
                                            <div id="profileListViewText">
                                            <?php 
                                                $userName = $regUsers->first_name;
                                                $lastName = $regUsers->last_name;
                                                echo $userName[0].$lastName[0];
                                            ?>   
                                            </div>                                     
                                         </img> -->


                                    <?php } ?>
                                </td>
                                <td class="tblRow"><?= $regUsers->email; ?></td>
                                <td class="tblRow"><?= ($regUsers->age != '') ? $regUsers->age : '- - -'; ?></td>
                                <td class="tblRow"><?= $regUsers->phone_number; ?></td>

                                <?php 
                                $result_count = 0;
                                foreach ($shipping_address as $key => $address) {
                                    if($address->doctor_id == $regUsers->id){
                                        $result_count++;
                                    }
                                }
                                if($result_count > 0){
                                    foreach ($shipping_address as $key => $address) { 
                                        if($address->doctor_id == $regUsers->id && $address->default_shipping_address == 1){ ?>
                                            <td class="tblRow">
                                                <?= $address->street_address .", ".$address->city.", ".$address->state.", ".$address->country.", ".$address->zip_code; ?>
                                            </td>
                                <?php 
                                        }
                                    }
                                } else { ?>
                                    <td class="tblRow">- - -</td>
                                
                                <?php
                                }
                                ?>

                                <td class="tblRow">
                                    <?= ($regUsers->street_address == '') ? '- - - ' : $regUsers->street_address .", ".$regUsers->city.", ".$regUsers->state.", ".$regUsers->country.", ".$regUsers->zip_code; ?>
                                </td>

                                <td class="tblRow"><?= $regUsers->gst_no; ?></td>
                                <td class="tblRow"><?= ($regUsers->refer_by != '') ? $regUsers->refer_by : '- - -' ?></td>
                                <td class="tblRow"><?= ($regUsers->refer_text != '') ? $regUsers->refer_text : '- - -' ?></td>
                                <td class="tblRow">
                                    <a href="<?= site_url('admin/doctor/viewDoctor/').$regUsers->id;; ?>" title="Info">
                                        <span class="infoIconSetting"><span style=" color: #6D3745;font-size: 20px;" class="material-icons">info</span><span style="color: #52575C;">&nbspInfo</span></span>
                                    </a>
                                    <a href="<?= site_url('admin/doctor/editDoctor/').$regUsers->id;; ?>" title="Edit"> 
                                        <span class="infoIconSetting">
                                         <i style=" color: #6D3745;font-size: 18px;" class="fa fa-edit" aria-hidden="true"></i>
                                         <span style="color: #52575C;">&nbspEdit</span></span>
                                    </a>
                                    <a  href="#" onclick="deleteDoctorByID('<?= $regUsers->id;  ?>');"  title="Delete">
                                        <span class="infoIconSetting">
                                          <!--  <i style=" color: red;font-size: 20px;" class="material-icons btnDelete" style="color: red;">delete</i> -->
                                           <span style="font-size: 22px;">
                                              <img src="<?php echo site_url('assets/images/delete-icon.svg'); ?>">
                                          </span>
                                         <span style="color: #52575C;">&nbspDelete</span></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script>

        // script to hide data tables columns                               
        $(document).ready( function () {
            var tr_hidden = [];
            $(".hide_show").on("change", function() {
                var hide = $(this).is(":checked");
                var all_ch = $(".hide_show:checked").length == $(".hide_show").length;
                var ti = $(this).index(".hide_show");
                $('#dt_tableExport tr').each(function() {
                    if (hide) {
                        $('td:eq(' + ti + ')', this).show(100);
                        $('th:eq(' + ti + ')', this).show(100);
                        if (tr_hidden.indexOf(ti) > -1) {
                            tr_hidden.splice(tr_hidden.indexOf(ti), 1);
                        }
                    } else {
                        $('td:eq(' + ti + ')', this).hide(100);
                        $('th:eq(' + ti + ')', this).hide(100);
                        if (tr_hidden.indexOf(ti) == -1) tr_hidden.push(ti);
                    }
                });
            });
        });

    </script>