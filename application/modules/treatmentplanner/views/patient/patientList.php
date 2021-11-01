<style type="text/css">
</style>
<div id="page_content">
    <div id="page_content_inner">
        <br>
        <br>
        <h1 class="heading_a patientMobile headingSize uk-margin-bottom"><b>Patients</b></h1>
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
                    <a href="<?php echo base_url('treatmentplanner/Patient/createPatientPlan'); ?>" class="md-btn buttonStyling accept-btn deposit-btn" style="background-color:#56BB6D !important;">
                      Create Plan
                    </a>
                </div>
                <!-- <a class="buttonAlignment " href="#">
                    <span class="material-icons filterIcon">
                        filter_alt
                    </span>
                </a> -->
                
                <a class="buttonAlignment btn-list" href="<?= site_url('treatmentplanner/patient/patientListing'); ?>">
                    <img src="<?php echo base_url('assets/admin/assets/img/list-icon-active.svg') ?>">
                </a>
                <a class="buttonAlignment btn-grid" href="<?= site_url('treatmentplanner/patient/patientGridList'); ?>">
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
                                            <span>Patient ID</span>
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
                                            <span>Patient</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="2">
                                            <span>Age</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Oral/Opg/Lateral c</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="4">
                                            <span>STL File of pt.</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="5">
                                            <span>Impressions</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Treatment/Objective</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Referral Name</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox mb-3">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Treatment plan</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox mb-3">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Treatment plan Doc</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Approval Date</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Type of Treatment</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Status</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Type of Case</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Treated Arches</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>No of Aligners</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span class="mb-3">Dispatched Aligners</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span class="mb-3">IPR Performed</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span class="mb-3">Placed Attachment</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Cost of Plan</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Total Amount Paid</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Balance Amount</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Shipping Details</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Billing Address</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Dispatch Date</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>IPR</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Invoice</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked class="hide_show" data-column="3">
                                            <span>Actions</span>
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
                            <th class="tblHeading"><b>Patient ID</b></th>
                            <th class="tblHeading"><b>Image</b></th>
                            <th class="tblHeading"><b>Doctor</b></th>
                            <th class="tblHeading"><b>Image</b></th>
                            <th class="tblHeading"><b>Patient</b></th>
                            <th class="tblHeading"><b>Age</b></th>
                            <th class="tblHeading"><b>Receiving Date</b></th>
                            <th class="tblHeading"><b>Treatment Objectives</b></th>
                            <th class="tblHeading"><b>Referral Name</b></th>
                            <th class="tblHeading"><b>Approval Date</b></th>

                            <th class="tblHeading"><b>Type of Treatment</b></th>
                            <th class="tblHeading"><b>Type of Case: <br>Malocclusion</br></b></th>
                            <th class="tblHeading"><b>Arches</b></th>
                            <th class="tblHeading"><b>IPR to be Performed</b></th>
                            <th class="tblHeading"><b>Attachment to be Placed</b></th>
                            <th class="tblHeading"><b>Status</b></th>
                            <th class="tblHeading"><b>Type of Case</b></th>
                            <th class="tblHeading"><b>No of Aligners</b></th>
                            <th class="tblHeading"><b>No of Aligners Dispatched</b></th>                            
                            <th class="tblHeading"><b>Cost of Plan</b></th>
                            <th class="tblHeading"><b>IPR</b></th>
                            <th class="tblHeading"><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($allPatientListData as $patientData): ?>
                        <tr style="padding-right: 15px !important;">
                            <td class="tblRow"><?= $patientData['pt_id']; ?></td>

                            <td class="tblRow">
                                <?php if($patientData['doctor_id'] !=1){ ?>
                                    <?php if($patientData['profile_image']!=''){ ?>
                                    <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $patientData['profile_image']); ?>">
                                    <?php } else{ ?>
                                    <div class="" style="display:flex;align-items:center;">
                                        <div id="profileImageUser"><?php
                                            $userName = $patientData['first_name'];
                                            $lastName = $patientData['last_name'];
                                            echo $userName[0].$lastName[0];
                                        ?></div>
                                    </div>
                                    <?php } ?>
                                <?php }else{ ?>
                                    N/A                            
                                <?php } ?>

                            </td>
                            <td class="tblRow">
                            <?php if($patientData['doctor_id'] !=1){ ?>
                                <?php if($patientData['first_name']!=''){ ?>
                                    <?= $patientData['first_name']; ?>
                                <?php } else{ ?>
                                    <div style="padding:12px 3px;">
                                        <?= $patientData['first_name']; ?>
                                    </div>
                                <?php } ?>
                            <?php }else{ ?>
                                N/A                            
                            <?php } ?>
                            </td>

                            <td class="tblRow">
                                <?php if(!empty($patientData['pt_img'])){ ?>
                                <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>"> 
                                <?php } else{ ?>
                                <div class="" style="display:flex;align-items:center;">
                                    <div id="profileImageUser"><?php
                                        $userName = $patientData['pt_firstname'];
                                        $lastName = $patientData['pt_lastname'];
                                        echo $userName[0].$lastName[0];
                                    ?></div>
                                   
                                </div>
                                <?php } ?>
                            </td>
                            <td class="tblRow">
                                <?php if(!empty($patientData['pt_img'])){ ?>
                                    <?= $patientData['pt_firstname']; ?>
                                <?php } else{ ?>
                                
                                    <div style="padding:12px 3px;">
                                        <?= $patientData['pt_firstname']; ?>
                                    </div>
                                <?php } ?>
                            </td>

                            <td><?= ($patientData['pt_age'] != '') ? $patientData['pt_age'] : '- - -'; ?></td>
                            <td>wed, 21 2021</td>
                            <td class="tblRow"><?php if(!empty($patientData['pt_objective'])){echo substr($patientData['pt_objective'], 0, 25)."...."; }else{echo '- - -';} ?></td>
                            <td><?= ($patientData['pt_referal'] != '') ? $patientData['pt_referal'] : '- - -'; ?></td>
                            <td><?= ($patientData['pt_approval_date'] != '') ? $patientData['pt_approval_date'] : '- - -'; ?></td>
                            <td><?= ($patientData['type_of_treatment'] != '') ? $patientData['type_of_treatment'] : '- - -'; ?></td>
                            <td><?= ($patientData['type_of_case'] != '') ? $patientData['type_of_case'] : '- - -'; ?></td>
                            <td><?= ($patientData['arc_treated'] != '') ? $patientData['arc_treated'] : '- - -'; ?></td>
                            <td><?= ($patientData['ipr_performed'] != '') ? $patientData['ipr_performed'] : '- - -'; ?></td>
                            <td><?= ($patientData['attachment_placed'] != '') ? $patientData['attachment_placed'] : '- - -'; ?></td>
                            <td><?= ($patientData['pt_status'] != '') ? $patientData['pt_status'] : '- - -'; ?></td>
                            <td><?= ($patientData['type_of_case'] != '') ? $patientData['type_of_case'] : '- - -'; ?></td>
                            <td><?= ($patientData['pt_aligners'] != '') ? $patientData['pt_aligners'] : '- - -'; ?></td>
                            <td><?= ($patientData['pt_aligners_dispatch'] != '') ? $patientData['pt_aligners_dispatch'] : '- - -'; ?></td>
                            <td><?= ($patientData['pt_cost_plan'] != '') ? $patientData['pt_cost_plan'] : '- - -'; ?></td>


                            <!-- Intra/OPG/Lateral -->
                            <?php
                            $patientID = $patientData['pt_id'];
                            $doctorID = $patientData['id'];

                            $pt_impressions = $patientData['pt_scan_impression'];
                            $pt_objective = $patientData['pt_objective'];
                            $pt_referal = $patientData['pt_referal'];
                            $pt_treatment_plan = $patientData['pt_treatment_plan'];
                            $pt_approval_date = $patientData['pt_approval_date'];
                            $type_of_treatment = $patientData['type_of_treatment'];
                            $pt_status = $patientData['pt_custom_status'];
                            $type_of_case = $patientData['type_of_case'];
                            $arc_treated = $patientData['arc_treated'];
                                                                                        
                            $ipr_performed = $patientData['ipr_performed'];
                            $attachment_placed = $patientData['attachment_placed'];
                            $pt_aligners = $patientData['pt_aligners'];
                            $pt_aligners_dispatch = $patientData['pt_aligners_dispatch'];
                            $pt_cost_plan = $patientData['pt_cost_plan'];
                            $pt_amount_paid = $patientData['pt_amount_paid'];
                            $pt_amount_due =  $patientData['pt_cost_plan'] - $patientData['pt_amount_paid'];
                            $pt_shipping_details = $patientData['pt_shipping_details'];

                                foreach ($shipping_address as $address) { 
                                    if($pt_shipping_details == $address->id ){
                                        $pt_shipping_address = $address->street_address .", ". $address->city.", ". $address->state.", ". $address->country.", ". $address->zip_code;
                                    }
                                }

                            $pt_billing_address = $patientData['pt_billing_address'];
                            $pt_dispatch_date = $patientData['pt_dispatch_date'];
                            $patientData = $patientData['patient_photos'];
                            
                            $intra = array_search('Intra Oral Images', array_column($patientData, 'key'));
                            $opg = array_search('OPG Images', array_column($patientData, 'key'));
                            $lateral = array_search('Lateral C Images', array_column($patientData, 'key'));
                            $stl_file = array_search('STL File(3D File)', array_column($patientData, 'key'));
                            $treatment_plan = array_search('Treatment Plan', array_column($patientData, 'key'));
                            $ipr = array_search('IPR', array_column($patientData, 'key'));
                            $invoice = array_search('Invoice', array_column($patientData, 'key'));

                            ?>

                                    <td>
                                        <?php
                                        if($ipr != null || $ipr === 0){
                                        ?>
                                            
                                            <a href="<?= site_url('treatmentplanner/patient/getdownloadPostFile/ipr_files/').$patientID; ?>" title="ImageName" style="margin-right: 8px;">
                                            
                                                <span class="infoIconSetting docs-icons-padding">
                                                        <img src="<?php echo site_url('assets/images/download-arrow.svg'); ?>" class="icon-download">
                                                    <!-- <span style="color: #7c4c42;">&nbspDownload</span> -->
                                                </span>
                                            </a>

                                        <?php }else{ ?>
                                            <a href="" class="disabled" title="ImageName" style="margin-right: 8px;">
                                            
                                                <span class="infoIconSetting docs-icons-padding">
                                                        <img src="<?php echo site_url('assets/images/down-arrow-grey.png'); ?>" class="icon-download">
                                                    <!-- <span style="color: #7c4c42;">&nbspDownload</span> -->
                                                </span>
                                            </a>

                                        <?php } ?>
                                    </td>
                                    <!-- END IPR -->

                                    <td class="tblRow">
                                      
                                        <a  href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientID; ?>">
                                            <span class="infoIconSetting">
                                                <i style=" color: #6D3745;font-size: 20px;" class="material-icons btnDelete">visibility</i>
                                                <span style="color: #6D3745;">&nbspView</span></span>
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
        <!--ADD Image Preview MODEL-->
        <!-- <div class="uk-modal" id="images_modal">
            <div class="uk-modal-dialog ">
                <div class="modal-dialog modal-size uk-overflow-auto">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div  class="modal-content">
                        <div class="modal-header" >
                            <div class="modal-title">
                                
                                <h2><b>Image Type</b></h2>
                            </div>
                        </div>
                        <div class="modal-body" style="height :100%; overflow-y:auto;">
                            <div class="uk-grid" id="show_images">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="uk-modal uk-close-btn" id="images_modal">
            <div class="uk-modal-dialog ">
                <div class="uk-modal-header">
                    <h5 class="uk-modal-title">
                    <div class="img-preview-heading">
                    </div>
                    <button id="modal-close" class="uk-close uk-close-btn" style="font-size: 25px; float:right;top: 2%;right: 2%;position: absolute;" type="button" uk-close></button>
                    </h5>
                </div>
                <div class="modal-body" style="height :100%; overflow-y:auto;">
                    <div class="uk-grid" id="show_images">
                        <!--  <div  class="uk-width-medium-1-4" >
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!--END Image Preview MODEL-->
        
        <!--Start STL Preview MODEL-->
        <div class="uk-modal uk-close-btn" id="stl_preview_modal">
            <div class="uk-modal-dialog ">
                <div class="uk-modal-header">
                    <h5 class="uk-modal-title">
                    <div class="img-preview-heading">
                        STL File(3D File)
                    </div>
                    <button id="stl_preview_modal_close" class="uk-close uk-close-btn" style="font-size: 25px; float:right;top: 2%;right: 2%;position: absolute;" type="button" uk-close></button>
                    </h5>
                </div>
                <div class="modal-body" id="stl_preview_modal_body" style="height :100%; overflow-y:auto;">
                    <div class="uk-grid" id="show_stl"></div>
                </div>
            </div>
        </div>
        <!--END STL Preview MODEL-->

<script type="text/javascript">
        $('.dt-button-collection .buttons-columnVisibility').each(function(){
        var $li = $(this),
        $cb = $('<input>', {
        type:'checkbox',
        style:'margin:0 .25em 0 0; vertical-align:middle'}
        ).prop('checked', $(this).hasClass('active') );
        $li.find('a').prepend( $cb );
        });
        
        $('.dt-button-collection').on('click', 'input:checkbox,li', function(){
        var $li = $(this).closest('li'),
        $cb = $li.find('input:checkbox');
        $cb.prop('checked', $li.hasClass('active') );
        });
</script>
<script type = "text/javascript">

    //For closing The Model
    $('#modal-close').click(function(){
        UIkit.modal('#images_modal').hide();
    });
    $('#stl_preview_modal_close').click(function(){
        UIkit.modal('#stl_preview_modal').hide();
                $('#show_stl').html('');

        // location.reload(true);
    });

    //Image Preview Model
    $('.get-images').on('click', function(e){
        e.preventDefault();
        var patientID = $(this).data('id');
        var imageType = $(this).data('type');
        // var imageType = 'Intra Oral Images';
        var img_url = "<?php echo site_url();?>assets/uploads/images/";
        $.ajax({
            url:"<?php echo base_url();?>treatmentplanner/Patient/getPatientImagetype/",
            type: 'GET',
            data: {'id':patientID, 'imageType':imageType},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#show_images').html('');
                $.each(response,function(index,data){

                    if(doesFileExist(img_url+data['img'])){
                    if(data['key'] == 'Intra Oral Images' ||data['key'] == 'OPG Images' ||data['key'] == 'Lateral C Images' ){
                        $('.img-preview-heading').text( "Intra Oral/ OPG/ Lateral C Images" );
                        $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                    }else if(data['key'] == 'Scans'){
                        $('.img-preview-heading').text( "Scans Images" );
                        $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                    }else if(data['key'] == 'Treatment Plan'){
                        $('.img-preview-heading').text( "Treatment Plan File" );
                        var html = '<div style="margin-top: 20px;"  class="uk-width-medium-3-6">'
                            html += '   <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1634213394583_50-0" data-fileindex="0" data-template="pdf" title="'+data['img']+'">'
                            html += '       <div class="kv-file-content">'
                            html += '           <embed class="kv-preview-data file-preview-pdf" src="'+img_url+data['img']+'" type="application/pdf" style="width:100%;height:160px;">'
                            html += '       </div>'
                            html += '       <div class="file-thumbnail-footer">'
                            html += '           <div class="file-footer-caption" title="'+data['img']+'">'
                            html += '               <div class="file-caption-info">'+data['img']+'</div>'
                            html += '               <div class="file-size-info"> <samp>(114.02 KB)</samp></div>'
                            html += '           </div>'   
                            html += '           <div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-plus-sign text-warning"></i></div>'
                            html += '           <div class="file-actions">'
                            html += '               <div class="file-footer-buttons">'
                            html += '                   <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>'
                            html += '               </div>'
                            html += '           </div>'
                            html += '           <div class="clearfix"></div>'
                            html += '       </div>'
                            html += '   </div>'
                            html += '</div>';
                        $('#show_images').append(html);
                        
                    }else if(data['key'] == 'IPR'){
                        $('.img-preview-heading').text( "IPR Images" );
                        $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                    }else if(data['key'] == 'Invoice'){
                        $('.img-preview-heading').text( "Invoice File" );
                        var html = '<div style="margin-top: 20px;"  class="uk-width-medium-3-6">'
                            html += '   <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1634213394583_50-0" data-fileindex="0" data-template="pdf" title="'+data['img']+'">'
                            html += '       <div class="kv-file-content">'
                            html += '           <embed class="kv-preview-data file-preview-pdf" src="'+img_url+data['img']+'" type="application/pdf" style="width:100%;height:160px;">'
                            html += '       </div>'
                            html += '       <div class="file-thumbnail-footer">'
                            html += '           <div class="file-footer-caption" title="'+data['img']+'">'
                            html += '               <div class="file-caption-info">'+data['img']+'</div>'
                            html += '               <div class="file-size-info"> <samp>(114.02 KB)</samp></div>'
                            html += '           </div>'   
                            html += '           <div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-plus-sign text-warning"></i></div>'
                            html += '           <div class="file-actions">'
                            html += '               <div class="file-footer-buttons">'
                            html += '                   <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>'
                            html += '               </div>'
                            html += '           </div>'
                            html += '           <div class="clearfix"></div>'
                            html += '       </div>'
                            html += '   </div>'
                            html += '</div>';
                        $('#show_images').append(html);
                    }
                    UIkit.modal('#images_modal').show();
                    // location.reload(true);
                    }
                
                });
            },
            error: function () {
                alert('Data Not Deleted');
            }
        });
    });

    //STL Files Preview Modal
    $('.stl_preview').on('click', function(e){
        e.preventDefault();
        var patientID = $(this).data('id');
        var imageType = $(this).data('type');
        // var imageType = 'Intra Oral Images';
        var img_url = "<?php echo site_url();?>assets/uploads/images/";
        $.ajax({
            url:"<?php echo base_url();?>treatmentplanner/Patient/getPatientImagetype/",
            type: 'GET',
            data: {'id':patientID, 'imageType':imageType},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('.img-preview-heading').html('');
                // $('#show_stl').html('');
                var count = 0;
                $.each(response,function(index,data){
                    
                    if(doesFileExist(img_url+data['img'])){

                    if(data['key'] == 'Intra Oral Images' ||data['key'] == 'OPG Images' ||data['key'] == 'Lateral C Images' ){
                        $('.img-preview-heading').text( "Intra Oral/ OPG/ Lateral C Images" );
                    }else if(data['key'] == 'Scans'){
                        $('.img-preview-heading').text( "Scans Images" );
                    }else if(data['key'] == 'Treatment Plan'){
                        $('.img-preview-heading').text( "Treatment Plan File" );
                    }else if(data['key'] == 'IPR'){
                        $('.img-preview-heading').text( "IPR Images" );
                    }else if(data['key'] == 'Invoice'){
                        $('.img-preview-heading').text( "Invoice File" );
                    }

                    $('.img-preview-heading').text('STL File(3D File)');

                    $('#show_stl').append('<div class="uk-width-medium-2-6"><div id="stl_viewer_'+count+'"></div></div>');
                    UIkit.modal('#stl_preview_modal').show();
                    var stl_viewer=new StlViewer
                    (
                        document.getElementById("stl_viewer_"+count),
                        {
                            models:
                            [
                                {filename:"<?php echo site_url();?>assets/uploads/images/"+data['img']}
                            ]
                        }
                    );
                    count++;
                    }
                    // location.reload(true);
                });
            },
            error: function () {
                alert('Data Not Deleted');
            }
        });
    });

   
</script>  

<script type="text/javascript">
  function doesFileExist(urlToFile) {
    var xhr = new XMLHttpRequest();
    xhr.open('HEAD', urlToFile, false);
    xhr.send();
     
    return xhr.status !== 404;
}
</script>
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