<style type="text/css">
    .buttons-colvis{
        display: none;
    }
</style>
<div id="page_content">
        <div id="page_content_inner">
            <br>
            <br>
            <h1 class="heading_a headingSize uk-margin-bottom patientMobile"><b>Documents</b></h1>
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

                    <div class="uk-width-medium-1-5 addPatientButton regularButtonAlignment">
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light buttonStyling" href="<?= site_url('doctor/document/addDocument') ?>">Add</a>
                        </div>
                        <!-- <a class="buttonAlignment " href="#"> 
                            <span class="material-icons filterIcon">
                                filter_alt
                                </span>
                        </a> -->
                        
                      <!--   <a class="buttonAlignment " href="#"> 
                            <span class="material-icons gridIconSetting">
                                grid_view
                            </span>
                        </a> -->

                    <div  style="margin-right: 14px;" class="dt_colVis_buttons buttonAlignment pritingButtonsSetting searchSetting"></div>

                    
                    <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                        <thead class="tableHeadingBorder">
                        <tr>
                            <th><b>Date</b></th>
                            <th><b>Patient</b></th>
                            <th><b>Document</b></th>
                            <th><b>Action</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for($i=0;$i<count($documents_data);$i++){ ?>
                            <tr>
                                <td><?= $documents_data[$i]['cur_date']; ?></td>
                                <td>
                                    <?php if($documents_data[$i]['pt_img']!=''){ ?>
                                        <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $documents_data[$i]['pt_img']); ?>" alt=""/> <?= $documents_data[$i]['pt_firstname']; ?>
                                    <?php } else{ ?>
                                        <div class="" style="display:flex;align-items:center;">
                                            <div id="profileImageUser"><?php 
                                            $userName = $documents_data[$i]['pt_firstname'];;
                                            $lastName = $documents_data[$i]['pt_lastname'];;
                                            echo $userName[0].$lastName[0]; 
                                            ?></div>
                                            <div style="padding:12px 3px;">
                                                <?= $documents_data[$i]['pt_firstname']; ?>
                                            </div>
                                        </div>

                                        <!-- <img class="md-user-image" src="<?= base_url(); ?>assets/admin/assets/img/avatars/avatar_01_tn.png" alt=""/> <?= $documents_data[$i]['pt_firstname']; ?> -->
                                    <?php } ?>

                                </td>
                                
                                <!-- Check Document Type -->
                                <?php if ($documents_data[$i]['file_type'] == 'Invoice' || $documents_data[$i]['file_type'] == 'Treatment Plan') { ?>

                                <td><img src="<?= site_url('assets/images/pdf-icon.svg') ?>">&nbsp; 
                                    <span><!-- <?= $documents_data[$i]['document_photos'][0]['img']; ?> --> File.pdf</span></td>

                                <?php }elseif($documents_data[$i]['file_type'] == 'STL File(3D File)'){ ?>

                                <td><img src="<?= site_url('assets/images/stl-icon.svg') ?>">&nbsp; 
                                    <!-- <span><?= $documents_data[$i]['document_photos'][0]['img']; ?></span> --> File.stl</td>

                                <?php }else{ ?>

                                <td>
                                    <?php if($documents_data[$i]['document_photos'][0]['img'] != ''){ ?>
                                    <img style="height: 59px;width: 59px;" class="" src="<?php echo base_url('assets/uploads/images/'. $documents_data[$i]['document_photos'][0]['img']); ?>" alt=""/>
                                     <?php } else{ ?>
                                        <div class="" style="display:flex;align-items:center;">
                                            <div class="marginprofilepicture" id="profileImageUser">D</div>
                                           
                                        </div>

                                        <!-- <img style="height: 34px;" class="md-user-image" src="<?php echo base_url('assets/images/round-bg.png'); ?>" alt=""/> -->
                                    <?php } ?>
                                </td>
                                <?php } ?>
                                <!--END Check Document Type -->
                                
                                <td>
                                    <a download="custom-filename.jpg" href="<?php echo base_url('assets/uploads/images/'. $documents_data[$i]['document_photos'][0]['img']); ?>" title="ImageName" style="margin-right: 8px;">
                                        <span class="infoIconSetting docs-icons-padding">
                                                <img src="<?php echo site_url('assets/images/download-arrow.svg'); ?>" class="icon-download">
                                            <!-- <span style="color: #7c4c42;">&nbspDownload</span> -->
                                        </span>
                                    </a>
                                     <a  href="#" title="Delete" onclick="deleteDocumentByID('<?= $documents_data[$i]['doc_id'];  ?>');" >
                                        <span class="infoIconSetting docs-icons-padding">
                                           <img src="<?php echo site_url('assets/images/delete-icon.svg'); ?>">
                                        </span>
                                    </a>
                                    
<!--                                     <a download="custom-filename.jpg" href="<?php echo base_url('assets/uploads/images/'. $documents_data[$i]['document_photos'][0]['img']); ?>" title="ImageName">
                                        <span class="material-icons" style="color:#71453C">file_download</span>
                                    </a>
                                    <a  href="#"><i class="material-icons btnDelete" onclick="deleteDocumentByID('<?= $documents_data[$i]['doc_id'];  ?>');" style="color: red;">delete</i></a> -->
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>