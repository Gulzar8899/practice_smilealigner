    <div id="page_content">
        <div id="page_content_inner">
            <br>
            <br>
           
        <!-- <h1 class="primary-color">Profile</h1> -->
        <form method="POST" action="<?= site_url('doctor/updateProfile'); ?>">
            <?php foreach($doctor_data as $doctorData): ?>
                <h1 class="patientMobile"><b>Profile</b></h1>
                <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                <div class="md-card cardMobile">
                    <div class="">
                       
                        <!-- <h3 class="patientMobile"><b>User Details</b></h3> -->
                        <!-- <h3 class="patientMobile"><b>Profile for Dr. <?= $doctorData->first_name; ?></b></h3> -->

                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">

                                <div class="uk-form-row" style="padding: 0px 30px; margin: 10px 0px; border-bottom: 1px solid #e0e0e0;">      
                                     <h3 class="heading_a mb-3p themeTextColor marginHeadingProfile"><b>User Details</b></h3>
                                     <h4 class="mb-2p"><b>Name</b></h4>
                                     <p class="mt-2p" style=""> Mr. <?= $doctorData->first_name; ?></p>
                                </div>
                                <div class="uk-form-row" style="padding: 0px 30px; margin: 10px 0px; border-bottom: 1px solid #e0e0e0;">                                    
                                    <!-- <label>Login and Primary Email</label> -->
                                    <h4 class="mb-2p"><b>Email</b></h4>
                                     <p class="mt-2p" style=""> Mr. <?= $doctorData->email; ?></p>

                                    <!-- <input type="text" name="email" class="md-input" value="<?= $doctorData->email; ?>" disabled /> -->
                                </div>
                                <div class="uk-form-row" style="padding: 0px 30px; margin: 10px 0px;  border-bottom: 1px solid #e0e0e0;">
                                    <h4 class="mb-2p"><b>Passsword</b></h4>

                                    <!-- <label>Passsword</label> -->
                                    <input style="border: 0px;" type="password" class="md-input"  value="<?= $doctorData->password; ?>" />
                                </div>
                               
                            </div>
                          
                        </div>
                    </div>

                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-right" style="margin: 40px -21px;">
                            <a href="http://localhost/smilealigners/treatmentplanner/createPlan" class="md-btn buttonStyling accept-btn deposit-btn" style="background-color:#56BB6D !important;">Update
                            </a>
                        </div>
                    </div>

                </div>
                
                
            <?php endforeach; ?>


        </div>
    </div>    