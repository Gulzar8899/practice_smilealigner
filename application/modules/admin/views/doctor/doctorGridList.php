<div id="page_content">
    <div id="page_content_inner">
        <br><br>
        
        <div class="uk-form-row">
            <div class="uk-grid">
                <div class="uk-width-medium-1-5">
                    <h1 class="heading_a headingSize patientMobile uk-margin-bottom"><b>Doctors</b></h1>
                </div>
                <div class="uk-width-medium-2-5">
                    <form method="POST" id="doctor-search" action="" enctype="multipart/form-data">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-form-row">
                                <div class="uk-grid">
                                    <div class="uk-width-3-6 uk-width-medium-4-6">
                                        <input type="hidden" name="patientID" value="<?= $singlePatient['pt_id'] ?>">
                                        <div style="display:flex;">
                                            <label><b>Search Doctor:</b></label>
                                            <input type="text" id="search_doctor_name" name="doctor_name" value="" class="md-input"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-3-6 uk-width-medium-2-6 pay-btn-sec">
                                        
                                        <!-- <label style="color:#ededed;"><b>Date To:</b></label> -->
                                        <button type="submit" name="submit" class="md-btn buttonStyling" href="#">Search</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
                <div class=" doctorGridMargin uk-width-medium-2-5">
                    <a class=" gridAddDoctor md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light buttonStyling" href="<?= site_url('admin/doctor/addDoctor'); ?>">Add</a>
                    <a class="buttonAlignment btn-list" href="<?= site_url('admin/doctors'); ?>">
                        <img src="<?php echo base_url('assets/admin/assets/img/list-icon.svg') ?>">
                    </a>
                    <a class="buttonAlignment btn-grid" href="<?= site_url('admin/doctor/doctorGridList'); ?>">
                        <img src="<?php echo base_url('assets/admin/assets/img/grid-icon-active.svg') ?>">
                    </a>
                </div>
            </div>
        </div>
        <div class="uk-grid">
            <div class="uk-width-medium-1-1">
                
            </div>
        </div>
        <div id="doctor-grid-list" class="uk-grid uk-margin-medium-top" data-uk-grid="{gutter: 30}">
            <?php foreach($accepted_users as $doctorList): ?>
            <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3">
                <div class="md-card md-card-hover-img" style="">
                    <div class="uk-text-center uk-position-relative card-inside-p" style="">
                        <?php if($doctorList->profile_image!=''){ ?>
                        <a href="<?= site_url('admin/doctor/viewDoctor/').$doctorList->id; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $doctorList->profile_image); ?>"></a>
                        <?php } else{ ?>
                        <center><a href="<?= site_url('admin/doctor/viewDoctor/').$doctorList->id; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/images/round-bg.png'); ?>"><div class="marginprofilepicture" id="doctorGripText">
                            <?php
                            $userName = $doctorList->first_name;
                            $lastName = $doctorList->last_name;
                            echo $userName[0].$lastName[0];
                        ?></div></img></a></center>
                        <?php } ?>
                        <!-- <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/> -->
                    </div>
                    <div>
                        <h4 class="heading_c">
                        <center><?= $doctorList->first_name; ?></center>
                        <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#6D3745;">Email: </b><?= $doctorList->email; ?></span></center>
                        <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">Mobile No: </b><?= $doctorList->phone_number; ?></span></center>
                        <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">GST No: </b><?= $doctorList->gst_no; ?></span></center>
                        </h4>
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

            var url = "<?php echo base_url('admin/doctor/viewDoctor/'); ?>";
            var img_url = "<?php echo base_url('assets/uploads/images/'); ?>";
            var img_url_static = "<?php echo base_url('assets/images/round-bg.png'); ?>";
            
            $("#doctor-search").submit(function (event) {
                // alert($("#search_doctor_name").serialize());
                var doctorName = $("#search_doctor_name").serialize();
                event.preventDefault();
                
                if(doctorName != ''){
                    $.ajax({
                    url: "<?php echo base_url('admin/Doctor/searchDoctor'); ?>", //backend url
                    data: $("#doctor-search").serialize(), //sending form data in a serialize way
                    type: "post",
                    async: false, //hold the next execution until the previous execution complete
                    dataType: 'json',
                    success: function (response) {

                        console.log(response);
                       // $('#dt_tableExport').find('tbody').empty();

                       // location.reload(true);
                       $('#doctor-grid-list').html('');

                       // $("#doctor-grid").css({"position": "relative", "margin-left": "-20px", "height": "573.264px"});
                       $.each(response, function(key, value){
                        console.log(value.profile_image); 

                        var str = value.first_name + value.last_name;
                        var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
                        var acronym = matches.join(''); // JSON



                        if(value.user_type_id == 2 && value.is_active == 1){
                            if(value.profile_image != '' && value.profile_image != null){
                            $("#doctor-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.profile_image+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.first_name+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#6D3745;">Email: </b>'+value.email+'</span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">Mobile No: </b><?=$doctorList->phone_number; ?></span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">GST No: </b>'+value.gst_no+'</span></center> </h4> </div></div></div>');
                            }else{

                                $("#doctor-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.first_name+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#6D3745;">Email: </b>'+value.email+'</span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">Mobile No: </b><?=$doctorList->phone_number; ?></span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">GST No: </b>'+value.gst_no+'</span></center> </h4> </div></div></div>');

                            }
                        }



                        });
                    },
                    error: function ()
                    {   

                       $('#doctor-grid-list').html('');

                        $("#doctor-grid-list").append('<div style="height:30px !important;" class="uk-width-small-1-1"><div class="md-card-hover-img"> <div class="uk-text-center uk-position-relative"> No Record Found </div></div></div>');

                        // alert("error"); //error occurs
                    }
                });
                }else{
                    $.ajax({
                    url: "<?php echo base_url('admin/Doctor/getAllDoctor'); ?>", //backend url
                    data: $("#doctor-search").serialize(), //sending form data in a serialize way
                    type: "post",
                    async: false, //hold the next execution until the previous execution complete
                    dataType: 'json',
                    success: function (response) {

                        console.log(response);
                       // $('#dt_tableExport').find('tbody').empty();

                       // location.reload(true);
                       $('#doctor-grid-list').html('');

                       // $("#doctor-grid").css({"position": "relative", "margin-left": "-20px", "height": "573.264px"});
                       $.each(response, function(key, value){
                        console.log(value.profile_image); 

                        var str = value.first_name + value.last_name;
                        var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
                        var acronym = matches.join(''); // JSON



                        if(value.user_type_id == 2 && value.is_active == 1){
                            if(value.profile_image != '' && value.profile_image != null){
                            $("#doctor-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.profile_image+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.first_name+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#6D3745;">Email: </b>'+value.email+'</span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">Mobile No: </b><?=$doctorList->phone_number; ?></span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">GST No: </b>'+value.gst_no+'</span></center> </h4> </div></div></div>');
                            }else{

                                $("#doctor-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.first_name+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#6D3745;">Email: </b>'+value.email+'</span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">Mobile No: </b><?=$doctorList->phone_number; ?></span></center> <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#6D3745;">GST No: </b>'+value.gst_no+'</span></center> </h4> </div></div></div>');

                            }
                        }



                        });
                    },
                    error: function ()
                    {   

                       $('#doctor-grid-list').html('');

                        $("#doctor-grid-list").append('<div style="height:30px !important;" class="uk-width-small-1-1"><div class="md-card-hover-img"> <div class="uk-text-center uk-position-relative"> No Record Found </div></div></div>');

                        // alert("error"); //error occurs
                    }
                });
                }
                


            });
</script>