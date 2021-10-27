    <div id="page_content">
        <div id="page_content_inner">
            <br><br>
            
            <div class="uk-form-row">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <h1 class="heading_a headingSize patientMobile uk-margin-bottom"><b>Business Developers</b></h1>
                    </div>
                    <div class=" doctorGridMargin uk-width-medium-1-2">
                        <a class=" gridAddDoctor md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light buttonStyling" href="<?= site_url('admin/businessdeveloper/addDeveloper'); ?>">Add</a>
                        <a class="buttonAlignment btn-list" href="<?= site_url('admin/businessdeveloper/developersList'); ?>"> 
                            <img src="<?php echo base_url('assets/admin/assets/img/list-icon.svg') ?>">
                        </a>
                        <a class="buttonAlignment btn-grid" href="<?= site_url('admin/businessdeveloper/developersGrid'); ?>">
                            <img src="<?php echo base_url('assets/admin/assets/img/grid-icon-active.svg') ?>">
                        </a>
                    </div>
                </div>
            </div>
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 hierarchical_show mt-3 grid-list uk-margin-medium-top" data-uk-grid="{gutter: 20, controls: '#products_sort'}">
                <?php foreach($accepted_users as $doctorList): ?>
                    <div data-product-name="Et quis.">
                        <div class="md-card md-card-hover-img">
                            <div class="uk-text-center uk-position-relative">
                                <?php if($doctorList->profile_image!=''){ ?>
                                    <a href="<?= site_url('admin/businessdeveloper/viewDeveloper/').$doctorList->id; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $doctorList->profile_image); ?>"></a>
                                <?php } else{ ?>
                                        <center><a href="<?= site_url('admin/businessdeveloper/viewDeveloper/').$doctorList->id; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/images/round-bg.png'); ?>"><div class="marginprofilepicture" id="profileText">
                                            <?php 
                                            $userName = $doctorList->first_name;
                                            $lastName = $doctorList->last_name;
                                            echo $userName[0].$lastName[0]; 
                                        ?></div></img></a></center>
                                <?php } ?>
                                <!-- <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/> -->
                            </div>
                            <div>
                                <h4 class="heading_c">
                                    <center><?= $doctorList->first_name; ?></center>
                                    <center><span class="sub-heading" ><b style="color:#71453C;">Email:</b> <?= $doctorList->email; ?></span></center>
                                    <center><span class="sub-heading"><b style="color:#71453C;">Mobile No: </b><?= $doctorList->phone_number; ?></span></center>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>