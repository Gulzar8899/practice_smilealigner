<?php foreach($doctor_data as $doctorData): ?>
    <div id="page_content">
        <div id="page_content_inner">
            <br>
        <h1 class="patientMobile"><b>Profile for Dr. <?= $doctorData->first_name; ?></b></h1>
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a themeTextColor">User Details and Preferences</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">                                    
                                <label>Login and Primary Email</label>
                                <input type="text" class="md-input" value="<?= $doctorData->email; ?>" />
                            </div>
                            <div class="uk-form-row">
                                <label>Passsword</label>
                                <input type="password" class="md-input"  value="<?= $doctorData->password; ?>" />
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-3">
                                    <label for="switch_demo_1" class="inline-label">Service offline</label>
                            <input type="checkbox" data-switchery checked id="switch_demo_1" />
                        </div>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="message">Message (20 chars min, 100 max)</label><textarea class="md-input autosize_init" name="message" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." style="overflow-x: hidden; overflow-wrap: break-word; height: 217px;" data-parsley-id="32"><?= $doctorData->billing_address; ?></textarea><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="danger">
                                  <p class="textAlignment"><strong>Note!</strong><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium</p>
                                </div>
                            </div> 
                        </div>
                    </div>
                                   </div>
            </div>
             <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class=" themeTextColor heading_a">Default Shipping Address</h3>
                              <div style="margin-top: 15px;" class="uk-form-row">
                                <div class="uk-width-medium-5-5">
                               <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="message">Message (20 chars min, 100 max)</label><textarea class="md-input autosize_init" name="message" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." style="overflow-x: hidden; overflow-wrap: break-word; height: 217px;" data-parsley-id="32"><?= $doctorData->shipping_address; ?></textarea><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                            </div>
                                <div style="margin-top: 15px;" class="uk-width-medium-5-5">
                                    <div class="uk-width-large-2-10">
                                            <a style="padding-left: 200px; padding-right: 200px;"class="md-btn borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="#">AddNew</a>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a themeTextColor">Default payer Address</h3>
                            
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="message">Message (20 chars min, 100 max)</label><textarea class="md-input autosize_init" name="message" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." style="overflow-x: hidden; overflow-wrap: break-word; height: 217px;" data-parsley-id="32"></textarea><span class="md-input-bar"></span></div>
                                    
                                </div>
                                 <div style="margin-top: 15px;" class="uk-width-medium-5-5">
                                    <div class="uk-width-large-2-10">
                                            <a style="padding-left: 200px; padding-right: 200px; color:white;"class="md-btn  themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="#">Update</a>
                                        </div>
                                </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    