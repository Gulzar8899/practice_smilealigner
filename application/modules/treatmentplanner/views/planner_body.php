   
   <style>
       body::-webkit-scrollbar {
    width: 1em;
}

body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
   </style>
    <div id="page_content">
        <div id="page_content_inner" style="margin-top: 30px;">
            <div class="row block-stats">
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>treatmentplanner/patient/patientListing?plan_type=accepted_plans">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M30 20a6 6 0 1 0-10 4.46V32l4-1.894L28 32v-7.54A5.98 5.98 0 0 0 30 20zm-4 8.84l-2-.947l-2 .947v-3.19a5.888 5.888 0 0 0 4 0zM24 24a4 4 0 1 1 4-4a4.005 4.005 0 0 1-4 4z" fill="currentColor"/><path d="M25 5h-3V4a2.006 2.006 0 0 0-2-2h-8a2.006 2.006 0 0 0-2 2v1H7a2.006 2.006 0 0 0-2 2v21a2.006 2.006 0 0 0 2 2h9v-2H7V7h3v3h12V7h3v5h2V7a2.006 2.006 0 0 0-2-2zm-5 3h-8V4h8z" fill="currentColor"/></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        echo count($patientsAcceptedPlans);
                                    ?>
                                    </h3>
                                    <p>Accepted</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>

                <!-- Rejected -->
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>treatmentplanner/patient/patientListing?plan_type=rejected_plans">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M7 15.75c0-.966.784-1.75 1.75-1.75h6.5c.967 0 1.75.784 1.75 1.75v1.5A1.75 1.75 0 0 1 15.25 19h-6.5A1.75 1.75 0 0 1 7 17.25v-1.5zm1.75-.25a.25.25 0 0 0-.25.25v1.5c0 .138.112.25.25.25h6.5a.25.25 0 0 0 .25-.25v-1.5a.25.25 0 0 0-.25-.25h-6.5z" fill="currentColor"/><path d="M17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.476 3.024a.5.5 0 0 0 0 .707l1.77 1.77l-1.767 1.766a.5.5 0 1 0 .707.708L17.5 7.208l1.77 1.769a.5.5 0 1 0 .707-.707L18.208 6.5l1.772-1.77a.5.5 0 0 0-.707-.707L17.5 5.794l-1.77-1.77a.5.5 0 0 0-.707 0z" fill="currentColor"/><path d="M18.495 12.924a6.459 6.459 0 0 0 1.5-.42v7.24a2.25 2.25 0 0 1-2.096 2.245l-.154.005h-11.5A2.25 2.25 0 0 1 4 19.898l-.005-.154V4.246A2.25 2.25 0 0 1 6.091 2l.154-.005h6.569a6.52 6.52 0 0 0-1.08 1.5H6.246a.75.75 0 0 0-.743.648l-.007.102v15.498c0 .38.282.693.648.743l.102.007h11.5a.75.75 0 0 0 .743-.648l.007-.102v-6.82z" fill="currentColor"/></g></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        echo count($patientsRejectedPlans);
                                    ?>
                                    </h3>
                                    <p>Rejected</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>

                <!-- Modify -->
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>treatmentplanner/patient/patientListing?plan_type=modify_plans">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.17l-.59.59l-.58.58V4h16v12zm-9-4h2v2h-2zm0-6h2v4h-2z" fill="currentColor"/></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        echo count($patientsModifyPlans);
                                    ?>
                                    </h3>
                                    <p>Modify</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>

                <!-- Pending -->
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>treatmentplanner/patient/patientListing?plan_type=pending_plans">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><circle cx="9" cy="16" r="2" fill="currentColor"/><circle cx="23" cy="16" r="2" fill="currentColor"/><circle cx="16" cy="16" r="2" fill="currentColor"/><path d="M16 30a14 14 0 1 1 14-14a14.016 14.016 0 0 1-14 14zm0-26a12 12 0 1 0 12 12A12.014 12.014 0 0 0 16 4z" fill="currentColor"/></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        echo count($patientsPendingPlans);
                                    ?>
                                    </h3>
                                    <p>Pending</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
               
            </div>
            <br> <br>

           
        </div>
    </div>
    