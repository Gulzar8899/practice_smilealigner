<div id="page_content">
    <div id="page_content_inner">
        <br>
        <h1 class="patientMobile"><b>Bulk Import</b></h1>
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
            <div class="uk-width-large-5-10">
                <div class="md-card borderSetting">
                    <div class="md-card-content" data-uk-grid-margin>

                            <h3>Import Patient</h3>
                            <form role="form" action="<?= site_url('admin/setting/importPatientInfo'); ?>" class="clearfix" method="post" enctype="multipart/form-data"> 
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1"> Choose File</label>
                                    <br>
                                    <input type="file" class="form-control" placeholder="" name="file" required="" accept=".xls, .xlsx ,.csv">
                                    <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                    <input type="hidden" name="tablename" value="patients">
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="submit" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="uk-width-large-5-10">
                <div class="md-card borderSetting">
                    <div class="md-card-content" data-uk-grid-margin>

                            <h3>Import Doctors</h3>
                            <form role="form" action="<?= site_url('admin/setting/importDoctorInfo'); ?>" class="clearfix" method="post" enctype="multipart/form-data"> 
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1"> Choose File</label>
                                    <br>
                                    <input type="file" class="form-control" placeholder="" name="file" required="" accept=".xls, .xlsx ,.csv">
                                    <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                    <input type="hidden" name="tablename" value="patients">
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="submit" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>