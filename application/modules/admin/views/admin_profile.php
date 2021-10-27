    <div id="page_content">
        <div id="page_content_inner">
            <br>
        <h1 class="patientMobile"><b>Profile</b></h1>
            <form method="post" action="<?= site_url('admin/updateProfile'); ?>">
                <?php foreach($adminProfile as $adminData): ?>
                    <input type="hidden" name="adminID" value="<?= $adminData->id; ?>">
                    <div class="md-card removeSpacing">
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="uk-alert uk-alert-danger" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } if ($this->session->flashdata('success')) { ?>
                            <div class="uk-alert uk-alert-success" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>
                        <div class="md-card-content">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                        <label>Full Name</label>
                                        <input type="text" name="first_name" class="md-input" value="<?= $adminData->first_name; ?>" required/>
                                    </div>
                                </div>
                                 <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Change Password</label>
                                        <input type="text" name="password" class="md-input" value="<?= $adminData->password; ?>" required/>
                                    </div>
                                </div>
                                 <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Email</label>
                                        <input type="email" name="email" class="md-input" value="<?= $adminData->email; ?>" required/>
                                    </div>
                                </div>
                                 <div class="uk-grid" data-uk-grid-margin>
                                 <div class="uk-width-medium-1-1 adminProfileUpdate">
                                        <button type="submit" name="submit" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#">Update</button>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
    