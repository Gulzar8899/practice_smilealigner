<div id="page_content">
        <div id="page_content_inner">
            <br><br>
            <h1 class="heading_a headingSize patientMobile uk-margin-bottom"><b>Treatment Planners</b></h1>
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
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light buttonStyling" href="<?= site_url('admin/treatmentplanner/addPlanner'); ?>">Add</a>
                        </div>
                        <a class="buttonAlignment btn-list" href="<?= site_url('admin/treatmentplanner/plannersList'); ?>"> 
                            <img src="<?php echo base_url('assets/admin/assets/img/list-icon-active.svg') ?>">
                        </a>
                        <a class="buttonAlignment btn-grid " href="<?= site_url('admin/treatmentplanner/plannersGrid'); ?>"> 
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
                                                <span>ID</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="1">
                                                <span>Image</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="2">
                                                <span>Name</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="2">
                                                <span>Allocated Location</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="3">
                                                <span>Email</span>
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
                                                <span>Gender</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="6">
                                                <span>Age</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked class="hide_show" data-column="7">
                                                <span>Options</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    
                    <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                        <thead class="tableHeadingBorder">
                        <tr>
                            <th class="tblHeading"><b>ID</b></th>
                            <th class="tblHeading"><b>Image</b></th>
                            <th class="tblHeading"><b>Name</b></th>
                            <th class="tblHeading"><b>Allocated Location</b></th>
                            <th class="tblHeading"><b>Email</b></th>
                            <th class="tblHeading"><b>Mobile No</b></th>
                            <th class="tblHeading"><b>Gender</b></th>
                            <th class="tblHeading"><b>Age</b></th>
                            <th class="tblHeading"><b>Options</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($accepted_users as $regUsers): ?>
                            <tr>
                                <td class="tblRow"><?= $regUsers->id; ?></td>
                                <td class="tblRow">
                                    <?php if($regUsers->profile_image!=''){ ?>
                                        <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $regUsers->profile_image); ?>">
                                    <?php } else { ?>
                                        <div id="profileImageUser">
                                            <?php 
                                            $userName = $regUsers->first_name;
                                            $lastName = $regUsers->last_name;
                                            echo $userName[0].$lastName[0]; 
                                            ?>
                                        </div>
                                    <?php } ?>
                                </td>
                                <td class="tblRow"><?= $regUsers->first_name. " " .$regUsers->last_name; ?></td>

                                <td>
                                <?php $count = 0;
                                 foreach ($shipping_address as $key => $address) { 
                                    if($regUsers->id == $address->doctor_id ){ 
                                        $count ++; 
                                        if($count == 1){ 
                                            if($address->check_all == 0 ) {?>
                                                <div class="location-tags">
                                                   <span class="uk-flex uk-flex-between">
                                                        <span>  <?= $address->city; ?> </span>&nbsp;&nbsp;
                                                   </span>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="location-tags">
                                                   <span class="uk-flex uk-flex-between">
                                                        <span>  <?= 'All' ?> </span>&nbsp;&nbsp;
                                                   </span>
                                                </div>
                                            <?php } ?>

                                        <?php } ?>
                                <?php } 
                                } ?>

                                 <?php if($count > 1){ ?>
                                    <div class="location-tags">
                                       <span class="uk-flex uk-flex-between">
                                            <span> +<?= $count-1;  ?></span>&nbsp;&nbsp;
                                       </span>
                                    </div>
                                <?php }elseif ($count == 0){
                                    echo "- - -";
                                } ?>
                                </td>
                                
                                <td class="tblRow"><?= $regUsers->email; ?></td>
                                <td class="tblRow"><?= $regUsers->phone_number; ?></td>
                                <td class="tblRow"><?= $regUsers->gender; ?></td>
                                <td class="tblRow"><?= $regUsers->age; ?></td>
                                <td class="tblRow">
                                    <a href="<?= site_url('admin/treatmentplanner/view/').$regUsers->id; ?>" title="Info">
                                        <span class="infoIconSetting"><span style=" color: #6D3745;font-size: 20px;" class="material-icons">info</span><span style="color: #6D3745;">&nbspInfo</span></span>
                                    </a>
                                    <a href="<?= site_url('admin/treatmentplanner/edit/').$regUsers->id;; ?>" title="Edit"> 
                                        <span class="infoIconSetting">
                                         <i style=" color: #6D3745;font-size: 18px;" class="fa fa-edit" aria-hidden="true"></i>
                                         <span style="color: #6D3745;">&nbspEdit</span></span>
                                    </a>
                                    <a  href="#" onclick="deletePlannerByID('<?= $regUsers->id;  ?>');"  title="Delete">
                                        <span class="infoIconSetting">
                                           <!-- <i style=" color: red;font-size: 20px;" class="material-icons btnDelete" style="color: red;">delete</i> -->
                                            <span style="font-size: 22px;">
                                              <img src="<?php echo site_url('assets/images/delete-icon.svg'); ?>">
                                            </span>
                                         <span style="color: #6D3745;">&nbspDelete</span></span>
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