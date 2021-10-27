<?php
/*echo "<pre>";
print_r($_SESSION);
die;*/
?>

<div class="banner" data-section="home"
     style="background: url(<?php echo base_url('assets/images/banner/my_account_banner.jpg'); ?>);background-position: 0 -14px;">
    <div class="page_name">PROFILE</div>
    <div class="function_name">SMILE ALIGNERS > MY ACCOUNT</div>
</div>
<div class="container text-center">
    <div class="ubea-section" id="ubea-services" data-section="about">
        <div class="ubea-container">
            <div class="row">
                <div class="col-md-12 text-justify pad-zero">

                    <div class="tab">
                        <button class="tablinks active" onclick="openTab(event, 'my-profile')">My Profile</button>
                        <button class="tablinks" onclick="openTab(event, 'change-password')">Change Password</button>
                    </div>

                    <div id="my-profile" class="tabcontent" style="display: block;">
                        <h3>My Profile</h3>
                        <div class="row">
                        <form name="profile" id="profile">
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="fname">First Name:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo $doc_details['first_name'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="mname">Middle Name:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" value="<?php echo $doc_details['middle_name'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="lname">Last Name:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo $doc_details['last_name'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="speciality">Speciality:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <input type="text" class="form-control" disabled id="speciality" name="speciality" placeholder="Speciality" value="<?php echo $doc_details['speciality'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $doc_details['email'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="mobile">Mobile:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" value="<?php echo $doc_details['mobile'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cli_name">Clinic name:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <input type="text" class="form-control" id="cli_name" name="cli_name" placeholder="Clinic Name" value="<?php echo $doc_details['clinic_name'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="address">Address:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <textarea class="form-control" id="address" name="address" placeholder="Address"><?php echo $doc_details['address'];?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="city">City:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $doc_details['city'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pincode">Pincode:</label>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php echo $doc_details['pincode'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 ">&nbsp;</div>
                                <div class="col-sm-10" style="margin-bottom:20px">
                                    <button type="submit" class="btn btn-success right" name="submit" id="submit">SUBMIT</button>
                                    <button type="reset" class="btn btn-primary right" name="reset" id="reset">CANCEL</button>
                                </div>
                            </div>
                            <div id="#profile_status"></div>
                        </form>
                        </div>
                    </div>

                    <div id="change-password" class="tabcontent">
                        <h3>Change Password</h3>
                        <div class="row">
                            <form name="password" id="password">

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="old">Old Password:</label>
                                    <div class="col-sm-10" style="margin-bottom:20px">
                                        <input type="password" class="form-control" id="old" name="old" placeholder="OLD PASSWORD" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="new">New Password:</label>
                                    <div class="col-sm-10" style="margin-bottom:20px">
                                        <input type="password" class="form-control" id="new" name="new" placeholder="NEW PASSWORD" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="confirm">Confirm Password:</label>
                                    <div class="col-sm-10" style="margin-bottom:20px">
                                        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="CONFIRM PASSWORD" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 ">&nbsp;</div>
                                    <div class="col-sm-10" style="margin-bottom:20px">
                                        <button type="submit" class="btn btn-success right" name="submit" id="submit">SUBMIT</button>
                                        <button type="reset" class="btn btn-primary right" name="reset" id="reset">CANCEL</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="password_status"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Dinesh Code ends-->
<br/>
<br/>
<br/>
<br/>
<br/>
<!--Dinesh added on 04-02-2018-->
<script>
    function openTab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>