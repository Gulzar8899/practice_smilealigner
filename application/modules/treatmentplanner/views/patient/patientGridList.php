<div id="page_content">
    <div id="page_content_inner">
        <br><br>
        
        <div class="uk-form-row">
            <div class="uk-grid">
                <div class="uk-width-medium-2-5">
                    <h1 class="heading_a patientMobile headingSize uk-margin-bottom"><b>Patients</b></h1>
                </div>
                <div class="uk-width-medium-1-5">
                    
                </div>
                 <div class="uk-width-medium-2-5">
                    <form method="POST" id="patient-search" action="" enctype="multipart/form-data">
                        <div class="" data-uk-grid-margin>
                            <div class="uk-form-row">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-4-6">
                                        <input type="hidden" name="patientID" value="<?= $singlePatient['pt_id'] ?>">
                                            <div class="uk-inline">
                                                <label><img src="<?php echo base_url('assets/images/sm-search-icon.svg') ?>"> &nbsp;&nbsp;<span class="label-grey">Search Patient here...</span></label>
                                                <input style="border-bottom: 1px solid #000000;" type="text" id="search_patient_name" name="patient_name" class="md-input"/>
                                            </div>
                                    </div>
                                    <div class="uk-width-medium-2-6 pay-btn-sec">
                                        
                                        <!-- <label style="color:#ededed;"><b>Date To:</b></label> -->
                                        <button type="submit" name="submit" class="md-btn buttonStyling uk-margin-small-top" href="#">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>



        <ul id="filter" class="uk-subnav uk-subnav-pill custom-tab-design">
            <li class="uk-active" data-uk-filter=""><a href="#">All Patients<hr></a></li>
            <li data-uk-filter="filter-a"><a href="#">New Patients<hr></a></li>
            <li data-uk-filter="filter-b"><a href="#">Approved<hr></a></li>
        </ul>

        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 tm-grid-heights" data-uk-grid="{gutter: 20, controls: '#filter'}" style="position: relative; margin-left: -20px; height: 394.444px;">

               <?php foreach($patientList as $patientData): ?>
                    <div data-uk-filter="filter-a" data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 20px; padding-bottom: 20px; top: 0px; opacity: 1; left: 0px;">
                        <div class="uk-panel-box md-card md-card-hover-img" style="padding: 40px 0px 40px; border: 1px solid #A0A4A8 !important">
                               <div class="" style="">
                     <div class="uk-text-center uk-position-relative card-inside-p" style="">
                        <?php if($patientData['pt_img']!=''){ ?>
                        <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>"></a>
                        <?php } else{ ?>
                        <center>
                           <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>">
                              <img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/images/round-bg.png'); ?>">
                              <div class="marginprofilepicture" id="patientGripText">
                                 <?php
                                    $userName = $patientData['pt_firstname'];
                                    $lastName = $patientData['pt_lastname'];
                                    echo $userName[0].$lastName[0];
                                    ?>
                              </div>
                              </img>
                           </a>
                        </center>
                        <?php } ?>
                        <!-- <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/> -->
                     </div>
                     <div>
                        <h4 class="heading_c">
                           <center><?= $patientData['pt_firstname']; ?></center>
                           <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email:</b> <?= $patientData['pt_email'];  ?></span></center>
                           <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Treatment Plan: </b><?= substr($patientData['pt_treatment_plan'] , 0, 10); ?></span></center>
                           <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b><?php if(!empty($patientData['type_of_treatment'])){echo $patientData['type_of_treatment'];}else{echo '- - -';} ?></span></center>
                           <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Status </b><span class="status-green"><b>Approved</b></span></span></center>
                        </h4>
                     </div>
                  </div>
                        </div>
                </div>
               <?php endforeach; ?>

               <?php foreach($patientList as $patientData): ?>
                 <div data-uk-filter="filter-b" data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 20px; padding-bottom: 20px; top: 0px; opacity: 1; left: 210.66px;">
                        <div class="uk-panel-box md-card md-card-hover-img" style="padding: 40px 0px 40px; border: 1px solid #A0A4A8 !important">

                               <div class="" style="">
                     <div class="uk-text-center uk-position-relative card-inside-p" style="">
                        <?php if($patientData['pt_img']!=''){ ?>
                        <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>"></a>
                        <?php } else{ ?>
                        <center>
                           <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>">
                              <img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/images/round-bg.png'); ?>">
                              <div class="marginprofilepicture" id="patientGripText">
                                 <?php
                                    $userName = $patientData['pt_firstname'];
                                    $lastName = $patientData['pt_lastname'];
                                    echo $userName[0].$lastName[0];
                                    ?>
                              </div>
                              </img>
                           </a>
                        </center>
                        <?php } ?>
                        <!-- <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/> -->
                     </div>
                     <div>
                        <h4 class="heading_c">
                           <center><?= $patientData['pt_firstname']; ?></center>
                           <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email:</b> <?= $patientData['pt_email'];  ?></span></center>
                           <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Treatment Plan: </b><?= substr($patientData['pt_treatment_plan'] , 0, 10); ?></span></center>
                           <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b><?php if(!empty($patientData['type_of_treatment'])){echo $patientData['type_of_treatment'];}else{echo '- - -';} ?></span></center>
                           <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Status </b><span class="status-green"><b>Approved</b></span></span></center>
                        </h4>
                     </div>
                  </div>

                        </div>
                </div>
               <?php endforeach; ?>
                
        </div>

          
    </div>
</div>

<script type="text/javascript">
            // var billAmount = <?= $singlePatient['pt_cost_plan'] ?>; 
           //submitting form

           var url = "<?php echo base_url('treatmentplanner/patient/viewPatient/'); ?>";
           var img_url = "<?php echo base_url('assets/uploads/images/'); ?>";
           var img_url_static = "<?php echo base_url('assets/images/'); ?>";
            $("#patient-search").submit(function (event) {

                // alert($("#search_patient_name").serialize());
                var patientName = $("#search_patient_name").serialize();
                event.preventDefault();
               
                if(patientName != ''){
                    $.ajax({
                        url: "<?php echo base_url('treatmentplanner/Patient/searchPatient'); ?>", //backend url
                        data: $("#patient-search").serialize(), //sending form data in a serialize way
                        type: "post",
                        async: false, //hold the next execution until the previous execution complete
                        dataType: 'json',
                        success: function (response) {

                            console.log(response);
                           // $('#dt_tableExport').find('tbody').empty();

                           // location.reload(true);
                           $('#patient-grid-list').html('');

                           // $("#doctor-grid").css({"position": "relative", "margin-left": "-20px", "height": "573.264px"});
                           $.each(response, function(key, value){
                            console.log(value.pt_img); 

                            var str = value.pt_firstname + value.pt_lastname;
                            var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
                            var acronym = matches.join(''); // JSON



                                if(value.pt_img != ''){
                                $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Treatment Plan: </b><?=$doctorList->pt_treatment_plan; ?></span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center> </h4> </div></div></div>');
                                }else{

                                    $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Treatment Plan: </b><?=$doctorList->pt_treatment_plan; ?></span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center> </h4> </div></div></div>');

                                }



                            });
                        },
                        error: function ()
                        {   

                           $('#patient-grid-list').html('');

                            $("#patient-grid-list").append('<div style="height:30px !important;" class="uk-width-small-1-1"><div class="md-card-hover-img"> <div class="uk-text-center uk-position-relative"> No Record Found </div></div></div>');

                            // alert("error"); //error occurs
                        }
                    });
                }else{
                      $.ajax({
                        url: "<?php echo base_url('treatmentplanner/Patient/getAllPatient'); ?>", //backend url
                        data: $("#patient-search").serialize(), //sending form data in a serialize way
                        type: "post",
                        async: false, //hold the next execution until the previous execution complete
                        dataType: 'json',
                        success: function (response) {

                            console.log(response);
                           // $('#dt_tableExport').find('tbody').empty();

                           // location.reload(true);
                           $('#patient-grid-list').html('');

                           // $("#doctor-grid").css({"position": "relative", "margin-left": "-20px", "height": "573.264px"});
                           $.each(response, function(key, value){
                            console.log(value.pt_img); 

                            var str = value.pt_firstname + value.pt_lastname;
                            var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
                            var acronym = matches.join(''); // JSON



                                if(value.pt_img != ''){
                                $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Treatment Plan: </b><?=$doctorList->pt_treatment_plan; ?></span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center> </h4> </div></div></div>');
                                }else{

                                    $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Treatment Plan: </b><?=$doctorList->pt_treatment_plan; ?></span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center> </h4> </div></div></div>');

                                }



                            });
                        },
                        error: function ()
                        {   

                           $('#patient-grid-list').html('');

                            $("#patient-grid-list").append('<div style="height:30px !important;" class="uk-width-small-1-1"><div class="md-card-hover-img"> <div class="uk-text-center uk-position-relative"> No Record Found </div></div></div>');

                            // alert("error"); //error occurs
                        }
                    });
                }
            });
</script>