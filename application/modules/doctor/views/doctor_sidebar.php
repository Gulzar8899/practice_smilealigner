<!-- main sidebar -->
    <aside style="margin-top: 98px;" id="sidebar_main">        
        <div class="menu_section">
            <ul>
                <?php
                    $dashboardList = array("index");
                    $dashboardListClass = in_array($this->router->fetch_method(), $dashboardList) ? "current_section" : "";
                ?>
                <li class="<?php echo $dashboardListClass; ?>">
                    <a href="<?= site_url('doctor'); ?>">
                        <span class="menu_icon"><i class="material-icons">dashboard</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                </li>
                <?php 
                    $patients = array("patientList","addPatient","editPatient","viewPatient","documentList","addDocument","patientGridList");
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
                            $patientListing = array("patientList","addPatient","editPatient","viewPatient","patientGridList");
                            $patientListingClass = in_array($this->router->fetch_method(), $patientListing) ? "act_item" : "";
                        ?>
                        <li class="<?php echo $patientListingClass; ?>" title="Patients">
                            <a href="<?= site_url('doctor/patientList'); ?>">
                                <span class="menu_icon"><i class="material-icons">accessible</i></span>
                                <span class="menu_title">Patients List</span>
                            </a>
                        </li>
                        <?php
                            $documentList = array("documentList","addDocument");
                            $documentListClass = in_array($this->router->fetch_method(), $documentList) ? "act_item" : "";
                        ?>
                        <li class="<?php echo $documentListClass; ?>" title="Documents">
                            <a href="<?= site_url('doctor/document/documentList'); ?>">
                                <span class="menu_icon"><i class="material-icons">description</i></span>
                                <span class="menu_title">Documents</span>
                            </a>
                        </li>

                        <?php
                            $PaymentList = array("paymentList","viewPaymentHistory");
                            $paymentListClass = in_array($this->router->fetch_method(), $PaymentList) ? "act_item" : "";
                        ?>
                        <li class="<?php echo $paymentListClass; ?>" title="Payment">
                            <a href="<?= site_url('doctor/payment/paymentList'); ?>">
                                <span class="menu_icon"><i style="color: #757575; padding: 0px 5px;" class="fa fa-money-check"></i></span>
                                <span class="menu_title">Payment</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php
                    $profile = array("profile");
                    $profileListClass = in_array($this->router->fetch_method(), $profile) ? "current_section" : "";
                ?>
                <li class="<?php echo $profileListClass; ?>">
                    <a href="<?= site_url('doctor/profile'); ?>">
                        <span class="menu_icon"><i class="material-icons">person</i></span>
                        <span class="menu_title">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('login/logout'); ?>">
                        <span class="menu_icon"><i class="material-icons">logout</i></span>
                        <span class="menu_title">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside><!-- main sidebar end -->