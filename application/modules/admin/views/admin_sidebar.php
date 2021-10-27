<!-- main sidebar -->
    <aside style="margin-top: 98px;" id="sidebar_main">        
        <div class="menu_section">
            <ul>
                <?php
                    $doctorList = array("index","addDoctor","editDoctor","viewDoctor","doctorGridList","doctorList","doctors");
                    $doctorListClass = in_array($this->router->fetch_method(), $doctorList) ? "current_section" : "";
                ?>
                <?php $router =  $this->router->fetch_method();
                if($router == 'index'){?>
                <li class="<?php echo $doctorListClass; ?>">
                <?php } else{?>
                <li class=""><?php }?>
                    <a href="<?= base_url('admin'); ?>">
                        <span class="menu_icon"><i class="material-icons">dashboard</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                </li>
                 <?php if($router == 'doctors'){?>
                <li class="<?php echo $doctorListClass; ?>">
                <?php } else{?>
                <li class=""><?php }?>
                    <a href="<?= base_url('admin/doctors'); ?>">
                        <span class="menu_icon"><i class="material-icons">person</i></span>
                        <span class="menu_title">Doctors</span>
                    </a>
                </li>
                <?php 
                    $patients = array("patientListing","addPatient","editPatient","documentList","addDocument","patientGridList");
                    $patientsClass = in_array($this->router->fetch_method(), $patients) ? "active" : "";
                    $activePatientsClass = in_array($this->router->fetch_method(), $patients) ? "submenu_trigger act_section current_section" : "";
                ?>
                <li class="<?php echo $activePatientsClass; ?>">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">accessible</i></span>
                        <span class="menu_title">Patients</span>
                    </a>
                    <ul>
                        <?php
                            $patientListing = array("patientListing","addPatient","editPatient","patientGridList");
                            $patientListingClass = in_array($this->router->fetch_method(), $patientListing) ? "act_item" : "";
                        ?>
                        <li class="<?php echo $patientListingClass; ?>" title="Patients">
                            <a href="<?= base_url('admin/patient/patientListing'); ?>">
                                <span class="menu_icon"><i class="material-icons">accessible</i></span>
                                <span class="menu_title">Patients List</span>
                            </a>
                        </li>
                        <?php
                            $documentList = array("documentList","addDocument");
                            $documentListClass = in_array($this->router->fetch_method(), $documentList) ? "act_item" : "";
                        ?>
                        <li class="<?php echo $documentListClass; ?>" title="Documents">
                            <a href="<?= base_url('admin/document/documentList'); ?>">
                                <span class="menu_icon"><i class="material-icons">description</i></span>
                                <span class="menu_title">Documents</span>
                            </a>
                        </li>

                         <?php
                            $PaymentList = array("paymentList","viewPaymentHistory");
                            $paymentListClass = in_array($this->router->fetch_method(), $PaymentList) ? "act_item" : "";
                        ?>
                        <li class="<?php echo $paymentListClass; ?>" title="Payment">
                            <a href="<?= base_url('admin/payment/paymentList'); ?>">
                                <span class="menu_icon"><i style="color: #757575; padding: 0px 5px;" class="fa fa-money-check"></i></span>
                                <span class="menu_title">Payment</span>
                            </a>
                        </li>


                    </ul>
                </li>                
                <li title="Invoices">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">credit_card</i></span>
                        <span class="menu_title">Financial Activities</span>
                    </a>
                </li>
                <?php
                    $regReq = array("regReq","viewRegistration");
                    $regReqListClass = in_array($this->router->fetch_method(), $regReq) ? "current_section" : "";
                ?>
                <li  class="<?php echo $regReqListClass; ?>">
                    <a href="<?= base_url('admin/regReq'); ?>">
                        <span class="menu_icon"><i class="material-icons">account_circle</i></span>
                        <span class="menu_title">Registration Requests</span>
                    </a>
                </li>
                <li title="Scrum Board">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">email</i></span>
                        <span class="menu_title">Email</span>
                    </a>
                </li>
                <li title="Snippets">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">phone_iphone</i></span>
                        <span class="menu_title">SMS</span>
                    </a>
                </li>
                <li title="User Profile">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">public</i></span>
                        <span class="menu_title">Website</span>
                    </a>
                </li>
                <?php 
                    $planners = array("treatment_planners", "business_developers", "view", "addPlanner","edit", "plannersList");
                    $plannersClass = in_array($this->router->fetch_method(), $planners) ? "active" : "";
                    $activeplannersClass = in_array($this->router->fetch_method(), $planners) ? "submenu_trigger act_section current_section" : "";
                ?>
                <li class="<?php echo $activeplannersClass; ?>">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">groups</i></span>
                        <span class="menu_title">Human Resources</span>
                    </a>
                    <ul>
                        <?php
                            $plannerListing = array("treatment_planners", "view", "addPlanner","edit", "plannersList");
                            $plannerListingClass = in_array($this->router->fetch_method(), $plannerListing) ? "act_item" : "";
                        ?>
                        <li class="<?php echo $plannerListingClass; ?>" title="Treatment Planners">
                            <a href="<?= base_url('admin/treatment_planners'); ?>">
                                <span class="menu_icon"><i class="material-icons">person</i></span>
                                <span class="menu_title">Treatment Planners</span>
                            </a>
                        </li>

                        <?php
                            $developerListing = array("business_developers", "viewDeveloper", "addDeveloper","editDeveloper", "developersList");
                            $developerListingClass = in_array($this->router->fetch_method(), $developerListing) ? "act_item" : "";
                        ?>
                        <li class="<?php echo $developerListingClass; ?>" title="Business Developers">
                            <a href="<?= base_url('admin/business_developers'); ?>">
                                <span class="menu_icon"><i class="material-icons">person</i></span>
                                <span class="menu_title">Business Developer</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php 
                    $settings = array("settings", "import");
                    $settingsClass = in_array($this->router->fetch_method(), $settings) ? "active" : "";
                    $activesettingsClass = in_array($this->router->fetch_method(), $settings) ? "submenu_trigger act_section current_section" : "";
                ?>
                <li class="<?php echo $activesettingsClass; ?>">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">settings</i></span>
                        <span class="menu_title">Settings</span>
                    </a>
                    <ul>
                        <li title="Bulk Import">
                            <a href="<?= base_url('admin/setting/import'); ?>">
                                <span class="menu_icon"><i class="material-icons">file_upload</i></span>
                                <span class="menu_title">Bulk Import</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
                    $profile = array("profile");
                    $profileListClass = in_array($this->router->fetch_method(), $profile) ? "current_section" : "";
                ?>
                <li class="<?php echo $profileListClass; ?>">
                    <a href="<?= base_url('admin/profile'); ?>">
                        <span class="menu_icon"><i class="material-icons">person</i></span>
                        <span class="menu_title">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('login/logout'); ?>">
                        <span class="menu_icon"><i class="material-icons">logout</i></span>
                        <span class="menu_title">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside><!-- main sidebar end -->