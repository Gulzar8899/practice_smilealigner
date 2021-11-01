    <div id="page_content">
        <div id="page_content_inner">
            <br>
            <h1 class="headingSize patientMobile"><b>Business Developer Card</b></h1>
            <?php foreach($developer_data as $developerData): ?>
                <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="md-card-content" data-uk-grid-margin>
                            <div class="uk-width-large-10-10">

                            <div class="user_heading userDataBackground">
                                <div class="user_heading_avatar doctorViewImageSetting">
                                    <div class="thumbnail">
                                        <?php if($developerData->profile_image!=''){ ?>
                                            <img src="<?php echo base_url('assets/uploads/images/'. $developerData->profile_image); ?>" alt="user avatar"/><?= $developerData->first_name; ?>
                                        <?php } else{ ?>
                                            <img src="<?php echo base_url('assets/images/round-bg.png'); ?>" alt="user avatar" class="">
                                            <div class="marginprofilepicture" id="viewProfileText" style="margin-right:auto;margin-left: auto;margin-top: 15px;">
                                            <?php 
                                            $userName = $developerData->first_name;
                                            $lastName = $developerData->last_name;
                                            echo $userName[0].$lastName[0]; 
                                        ?></div>
                                        <?php } ?>
                                    </div>
                                </div><br><br><br><br>

                                <div class="user_heading_content doctorViewNameSetting">
                                    <h2 style="color:#6D3745 !important;" class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?= $developerData->first_name; ?><br><?= $developerData->last_name; ?></span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <ul id="" class="uk-margin">
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>developer ID</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $developerData->id; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Email ID</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $developerData->email; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Mobile No</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $developerData->phone_number; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Gender</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $developerData->gender; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Age</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $developerData->age; ?></span>
                                        </div>
                                    </div>
                                    <div id="Div1" class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Password</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>****************</span>
                                            <a id="Button1" type="button"> <span style="color: #6D3745 !important" class="material-icons" onclick="switchVisible();">visibility</span></a>
                                        </div>
                                    </div>
                                    <div id="Div2" class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Password</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $developerData->password; ?></span>
                                            <a id="Button1" type="button"> <span class="material-icons" onclick="switchVisible();">visibility</span></a>
                                            <!-- <input id="Button1" type="button" value="Click" onclick="switchVisible();"/> -->
                                        </div>
                                    </div>                                                                                                
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                    </div>
                                    <div class="viewButtoMobile uk-flex-s uk-flex-between" style="padding-right:35px;">
                                        <div  class=" mobileDBESetting">
                                            <a  class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deleteDeveloperByID('<?= $developerData->id;  ?>');">Delete</a>
                                        </div>
                                        <div class="uk-flex-s">
                                            <div class="uk-margin-small-right">
                                                <a class="md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('admin/businessdeveloper/developersList'); ?>">Back</a>
                                            </div>
                                            <div class="">
                                                <a class="md-btn editbtnBackground btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('admin/businessdeveloper/editDeveloper/').$developerData->id; ?>">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                       
                       <!--  <div class="uk-width-large-1-10" style="min-height: 1622px;">
                        </div> -->
                    </div>
                    </div>

                    </div>
                </div>
            <?php endforeach; ?>
      
        </div>
    </div>
    <script>
        function switchVisible() {
            if (document.getElementById('Div1')) {

                if (document.getElementById('Div1').style.display == 'none') {
                    document.getElementById('Div1').style.display = 'block';
                    document.getElementById('Div2').style.display = 'none';
                }
                else {
                    document.getElementById('Div1').style.display = 'none';
                    document.getElementById('Div2').style.display = 'block';
                }
            }
}
    </script>