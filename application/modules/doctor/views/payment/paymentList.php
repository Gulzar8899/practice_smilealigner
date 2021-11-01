<div id="page_content">
        <div id="page_content_inner">
            <br><br>
            <h1 class="heading_a headingSize patientMobile uk-margin-bottom"><b>Payment</b></h1>
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

<!--                     <div class="uk-width-medium-1-5 addPatientButton regularButtonAlignment">
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light buttonStyling" href="<?= site_url('admin/doctor/addDoctor'); ?>">
                                Add
                            </a>
                        </div> -->
                    <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div>

                    
                    <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                        <thead class="tableHeadingBorder">
                        <tr>
                            <th class="tblHeading"><b>Patient ID</b></th>
                            <th class="tblHeading"><b>Patient</b></th>
                            <!-- <th class="tblHeading"><b>Phone</b></th> -->
                            <th class="tblHeading"><b>Cost of Plan</b></th>
                            <th class="tblHeading"><b>Total Amount Paid</b></th>
                            <th class="tblHeading"><b>Due Balance</b></th>
                            <!-- <th class="tblHeading"><b>Invoice</b></th> -->
                            <th class="tblHeading"><b>Options</b></th>
                        </tr>
                        </thead>


                       <tbody>
                        <?php foreach($allPatientListData as $patientData): ?>

                            <tr style="padding-right: 15px !important;">
                              <td class="tblRow"><?= $patientData['pt_id']; ?></td>

                                  <td class="tblRow">
                                    <?php if(!empty($patientData['pt_img'])){ ?>
                                        <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>"> <?= $patientData['pt_firstname']; ?>
                                    <?php } else{ ?>
                                        <div class="" style="display:flex;align-items:center;">
                                            <div id="profileImageUser"><?php
                                                $userName = $patientData['pt_firstname'];
                                                $lastName = $patientData['pt_lastname'];
                                                echo $userName[0].$lastName[0];
                                                ?></div>
                                            <div style="padding:12px 3px;">
                                                <?= $patientData['pt_firstname']; ?>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </td>

                                <!-- <td>0900-78601</td> -->

                                <td> <?php if($patientData['pt_cost_plan'] == ''){ echo '----'; }else{ echo $patientData['pt_cost_plan']; } ?></td>
                                <td> <?php if($patientData['pt_amount_paid'] == ''){ echo '----'; }else{ echo $patientData['pt_amount_paid']; } ?></td>
                                <td> <?= $patientData['pt_cost_plan'] - $patientData['pt_amount_paid']; ?></td>


                                <?php 
                                    $patientID = $patientData['pt_id'];

                                    $patientData = $patientData['patient_photos']; 
                                    $invoice = array_search('Invoice', array_column($patientData, 'key'));

                                ?>
                                <!-- <td>
                                    <?php
                                        if($invoice != null || $invoice === 0){
                                        ?>
                                        <div class="filesBackground  uk-flex uk-flex-between" style="margin-top:0px;">
                                            
                                            <span><a href="" class="get-images" data-id="<?php echo $patientID; ?>" data-type="invoice"><img src="<?= site_url('assets/images/pdf-icon.svg') ?>"> </a></span>
                                            <span class="text-black">Files.pdf</span>
                                            
                                            <span>
                                                <a href="<?= site_url('doctor/getdownloadPostFile/invoice_files/').$patientID; ?>" class="">
                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                </a>
                                            </span>
                                        </div>
                                        <?php }else{ ?>
                                        <div class="filesBackground" style="margin-top:0px;">
                                            <a href="<?= site_url('doctor/getdownloadPostFile/invoice_files/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                <span><img src="<?= site_url('assets/images/pdf-icon-grey.png') ?>"></span>
                                                <span class="text-grey">Empty</span>
                                                <span>
                                                    <img src="<?= site_url('assets/images/down-arrow-grey.png') ?>">
                                                </span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </td> -->
                               <td class="tblRow">
                                     <a href="<?= site_url('doctor/payment/viewPaymentHistory/').$patientID; ?>" title="Edit">
                                        <span class="infoIconSetting">
                                         <i style=" color: #7c4c42;font-size: 14px;" class="fa fa-money-check" aria-hidden="true"></i>
                                         <span style="color: #7c4c42;">Payment History</span></span>
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

 <!-- Modal -->
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
    <!-- END Modal -->

    
    <script type="text/javascript">
         //For closing The Model
        $('#modal-close').click(function(){
        UIkit.modal('#images_modal').hide();
        });
              //Image Preview Model
        $('.get-images').on('click', function(e){
        e.preventDefault();
        var patientID = $(this).data('id');
        var imageType = $(this).data('type');
        // var imageType = 'Intra Oral Images';
        var img_url = "<?php echo site_url();?>assets/uploads/images/";
        $.ajax({
        url:"<?php echo base_url();?>doctor/getPatientImagetype/",
        type: 'GET',
        data: {'id':patientID, 'imageType':imageType},
        dataType: 'json',
        success: function(response) {
        console.log(response);
                $('#show_images').html('');
                $.each(response,function(index,data){
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
                });
        },
        error: function () {
        alert('Data Not Deleted');
        }
        });
        });
    </script>