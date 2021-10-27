<div id="page_content">
    <div id="page_content_inner">
        <br>
        <h1 class="headingSize patientMobile"><b>Add Documents</b></h1>
        <div class="md-card">
            <div class="md-card-content">
                <form method="POST" action="<?= site_url('doctor/document/submitDocument'); ?>" enctype="multipart/form-data">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3 uk-width-large-1-2">
                            <select id="select_demo_1" name="patientID" data-md-selectize>
                                <option value=""><b>Select</b></option>
                                   <?php foreach($patient_data as $patientData){?>
                                 <option value="<?= $patientData['pt_id']; ?>"><?= $patientData['pt_firstname']; ?></option>
                               <?php }?>
                                    </select>
                                </div>
                                 <div class="uk-width-medium-1-3 uk-width-large-1-2">
                            <select id="select_demo_2" name="fileType" data-md-selectize>
                                        <option value=""><b>File Type</b></option>
                                        <option value="Intra Oral Images">Intra Oral Images</option>
                                        <option value="OPG Images">OPG Images</option>
                                        <option value="Lateral C Images">Lateral Ceph. Images</option>
                                        <option value="STL File(3D File)">STL File(3D File)</option>
                                        <option value="Scans">Scans Images</option>

                                    </select>
                                </div>
                              </div>
                               <!--  <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <div class="parsley-row">
                                        <label for="exampleFormControlFile1"><b>Description</b></label><br><br>
                                            <textarea placeholder="lorem ipsum" class="md-input" name="des" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>
                                        </div>
                                    </div>
                                </div> -->
                                </div>
                        <div class="uk-grid" style="margin-top:20px;">
                            <div class="uk-width-1-1">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>Upload File</b></div>
                                         <div class="panel-body">
                                               <input id="input-fa-1" name="document_img[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                        </div>
                                    </div>
                                 </div> 
                              </div>
                                <!--   <div style="margin-bottom: 31px !important;" class="uk-form-row">
                            <div class="uk-width-medium-1-2">
                                <br>
                                <label for="lastName" class="form-label"><b>Profile Picture</b></label>
                                <br>
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 54% !important;" alt="user avatar"/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="doctor_img" id="user_edit_avatar_control">
                                        </span>
                                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                    </div>                                    
                                </div>
                                <br>
                                <label for="lastName" class="form-label">Upload Profile Photo</label>
                                
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div> -->
                            </div>
                            <div class="uk-width-medium-1-1 documentAddbutton">
                                <button type="submit" name="submit" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#">Add</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>