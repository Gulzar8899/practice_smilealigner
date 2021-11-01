<!-- main sidebar -->
    <aside style="margin-top: 98px;" id="sidebar_main">        
        <div class="menu_section">
            <ul>
                <?php
                    $dashboardList = array("index");
                    $dashboardListClass = in_array($this->router->fetch_method(), $dashboardList) ? "current_section" : "";
                ?>
                <li class="<?php echo $dashboardListClass; ?>">
                    <a href="<?= site_url('treatmentplanner'); ?>">
                        <span class="menu_icon"><i class="material-icons">dashboard</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                </li>
               <li class="<?php echo $patientListingClass; ?>" title="Patients">
                        <a href="<?= site_url('treatmentplanner/Patient/patientListing'); ?>">
                            <span class="menu_icon"><i class="material-icons">accessible</i></span>
                            <span class="menu_title">Patients List</span>
                        </a>
                </li>
                <li class="<?php echo $profileListClass; ?>">
                    <a href="<?= site_url('treatmentplanner/profile'); ?>">
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