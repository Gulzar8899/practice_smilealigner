<?php $uncompleted_doctor_data = $this->session->userdata('uncompleted_doctor_data');
$session_data = $this->session->userdata('doctor_data');
if(!isset($session_data)){
?>
<div class="mobile_fixed_button text-center" >
    <div class="col2 client ">PATIENTS</div>
    <div class="col2 doctor ">DOCTOR</div>
</div>
<?php }?>
<div class="ubea-section-overflow black-shade">
    <footer id="ubea-footer" role="contentinfo">
        <div class="ubea-container ">
                <div class="row">
                    <div class="col-xs-12 ">
                        <h2  class="title-bold font-white footer_head" style="margin-left: 15px">
                            SmileAligners
                        </h2>
                        <br/>
                        <div class="col-xs-10 col-md-3 footer-col-centered ">
                            <div class="jumbotron">

                                <p class="footer_pstyle">
                                    SmileAligners straightens teeth using a
                                    serias of invisible aligners that are
                                    digitally made to your teeths.
                                    SmileAligners virtual 3D software moves
                                    the teeth to its final position. As you
                                    replace each aligners every week, your
                                    teeth will move gradually towards the
                                    final projected position as prescribed.
                                </p>
                            </div>
                        </div>
                        <div class=" col-md-3 col-xs-6" >
                            <div class="jumbotron">
                                <ul class="footer-li" style="padding: 0 ">
                                    <li><a href="<?php echo base_url('aboutus'); ?>">ABOUT US</a></li>
                                    <li><a href="<?php echo base_url('services'); ?>">SERVICES</a></li>
                                    <li><a href="<?php echo base_url('locate_orthodontist'); ?>">LOCATE AN ORTHODONTIST</a></li>
                                    <li><a href="<?php echo base_url('faqs'); ?>">FAQs</a></li>
                                    <li><a href="<?php echo base_url('gallery'); ?>">Smile Gallery</a></li>
                                    <li><a href="<?php echo base_url('contactus'); ?>">CONTACT</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-md-3 col-xs-6"  style="padding: 0 ">
                            <div class="jumbotron">
                                <h6 class="font-white" style="font-size:17px">CONTACT US</h6>
                                <p class="footer_pstyle">
                                    Laxmi Niwas, <br/>
                                    1<sup>st</sup> Floor, Near FabIndia,
                                    <br/>18<sup>th</sup> Road, Khar West,
                                    <br/>Mumbai -400052
                                </p>
                            </div>
                        </div>

                        <div class=" col-xs-12 col-md-3 col-md-offset-0 footer_locate" > <!---- 007 code  xs--10--to--12 ---------->
                            <div class="jumbotron text-center">
                                <div class=" text-left font-white footer_headings" style="padding-bottom: 10px">LOCATE AN ORTHODONTIST</div>
                                <form action="#" method="post" id="search_orthodontist">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="locate_orthodontist_serch" placeholder="Enter Pincode" style="height: 35px; background: white;">
                                        <span class="input-group-btn">
                                        <button class="btn btn-sm" style=" color:black;height: 35px; padding: 0 10px;background:#FF5126;color: #FFF;" >SEARCH</button>
                                    </span>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-xs-12 text-left" style="padding: 20px 10px 0;">
                                        <ul class="ubea-social-icons">
                                            <li><a href="#"><i class="icon-facebook-with-circle"></i></a></li>
                                            <li><a href="#"><i class="icon-linkedin-with-circle"></i></a></li>
                                            <li><a href="#"><i class="icon-youtube-with-circle"></i></a></li>
                                            <li><a href="#"><i class="icon-google-with-circle"></i></a></li>
                                            <li><a href="#"><i class="icon-instagram-with-circle"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </footer>
</div>
</div>

<div class="modal fade" id="doctor_login_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:#FF5126;padding:1px 15px 1px 15px;">
                <button type="button" class="close" data-dismiss="modal" style="background:#FF5126">&times;</button>
                <div style="background:#FF5126 " class="home_headings"><span class="glyphicon glyphicon-lock"></span> LOGIN</div>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form" id="doctor_login">
                    <div class="form-group">
                        <label for="doctor_username"><span class="glyphicon glyphicon-user"></span> Username</label>
                        <input type="email" class="form-control" id="doctor_username" name="doctor_username"
                               placeholder="Enter email" style="height: 37px;">
                    </div>
                    <div class="form-group">
                        <label for="doctor_password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                        <input type="password" class="form-control" style="height: 37px;" name="doctor_password" id="doctor_password"
                               placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" id="forgot_link" data-toggle="modal" data-target="#forgot_password_modal"><label><span class="glyphicon glyphicon-eye-open"></span> Forgot Password ?</label></a>
                    </div>
                    <div class="doctor_login_error text text-danger"></div>
                    <button style="background:#FF5126;width: 100%;border:0;color:white;" type="submit" class="btn login_button btn-block"><span
                           class="glyphicon glyphicon-off"></span> LOGIN
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="forgot_password_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:#FF5126;padding:1px 15px 1px 15px;">
                <button type="button" class="close" data-dismiss="modal" style="background:#FF5126">&times;</button>
                <div style="background:#FF5126 " class="home_headings"><span class="glyphicon glyphicon-lock"></span> Forgot Password ?</div>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form" id="forget_password">
                    <div class="form-group">
                        <label for="doctor_username"><span class="glyphicon glyphicon-user"></span> Username</label>
                        <input type="email" class="form-control" id="doctor_username" name="doctor_username"
                               placeholder="Enter email" style="height: 37px;">
                    </div>

                    <div id="forgot_error"></div>
                    <button style="background:#FF5126;width: 100%;border:0;color:white;" type="submit" class="btn login_button btn-block"><span
                                class="glyphicon glyphicon-off"></span> GET PASSWORD
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="doctor_profile_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:15px 15px 0 15px;">

                <h4><span class="glyphicon glyphicon-lock"></span> Profile</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form" id="doctor_profile">
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-eye-open"></span> Clinic name</label>
                        <input type="text" class="form-control" name="clinic_name" id="clinic_name"
                               placeholder="Enter Clinic Name"
                               value="<?php echo @$uncompleted_doctor_data['clinic_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-eye-open"></span> First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name"
                               placeholder="Enter First Name"
                               value="<?php echo @$uncompleted_doctor_data['first_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-eye-open"></span> Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" id="middle_name"
                               placeholder="Enter Middle Name"
                               value="<?php echo @$uncompleted_doctor_data['middle_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-eye-open"></span> Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name"
                               placeholder="Enter Last Name"
                               value="<?php echo @$uncompleted_doctor_data['last_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="doctor_username"><span class="glyphicon glyphicon-user"></span> Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Enter email" value="<?php echo @$uncompleted_doctor_data['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-eye-open"></span> Mobile</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile"
                               value="<?php echo @$uncompleted_doctor_data['mobile']; ?>">
                    </div>
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-eye-open"></span> Speciality</label>
                        <input type="text" class="form-control" name="speciality" id="speciality"
                               placeholder="Enter Speciality"
                               value="<?php echo @$uncompleted_doctor_data['speciality']; ?>">
                    </div>
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-eye-open"></span> Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address"
                               value="<?php echo @$uncompleted_doctor_data['address']; ?>">
                    </div>
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-eye-open"></span> City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter City"
                               value="<?php echo @$uncompleted_doctor_data['city']; ?>">
                    </div>
                    <div class="form-group">
                        <label><span class="glyphicon glyphicon-eye-open"></span> Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter Pincode"
                               value="<?php echo @$uncompleted_doctor_data['pincode']; ?>">
                    </div>
                    <div class="profile_error text text-danger"></div>
                    <button type="submit" class="btn btn-success btn-block"><span
                            class="glyphicon glyphicon-off"></span> Update Info
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <!--                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span-->
                <!--                        class="glyphicon glyphicon-remove"></span> Cancel-->
                <!--                </button>-->
                <p><a href="<?php echo base_url("home/logout"); ?>" id="doctor_logout_button"
                      class="btn-warning navbar-btn doctor_logout_button" style="padding:10px">Logout</a></li></p>

            </div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
<script>
    var url = "<?php echo base_url();?>";
</script>

<!-- jQuery -->
<script src="<?php echo base_url("assets/js/jquery.min.js?" . time()) ?>"></script>
<script src="<?php echo base_url("assets/superadmin/js/jquery.validate.min.js?" . time()) ?>"></script>
<!-- jQuery Easing -->
<script src="<?php echo base_url("assets/js/jquery.easing.1.3.js?" . time()) ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url("assets/js/bootstrap.min.js?" . time()) ?>"></script>
<!-- Waypoints -->
<script src="<?php echo base_url("assets/js/jquery.waypoints.min.js?" . time()) ?>"></script>
<!-- Carousel -->
<script src="<?php echo base_url("assets/js/owl.carousel.min.js?" . time()) ?>"></script>
<!-- countTo -->
<script src="<?php echo base_url("assets/js/jquery.countTo.js?" . time()) ?>"></script>
<!-- Flexslider -->
<script src="<?php echo base_url("assets/js/jquery.flexslider-min.js?" . time()) ?>"></script>
<!-- Magnific Popup -->
<script src="<?php echo base_url("assets/js/jquery.magnific-popup.min.js?" . time()) ?>"></script>
<script src="<?php echo base_url("assets/js/magnific-popup-options.js?" . time()) ?>"></script>

<script src="<?php echo base_url("assets/js/jquery.fancybox.min.js?" . time()) ?>"></script>
<script src="<?php echo base_url("assets/js/imagesloaded.pkgd.min.js?" . time()) ?>"></script>
<script src="<?php echo base_url("assets/js/isotope.pkgd.min.js?" . time()) ?>"></script>

<!-- Main -->
<script src="<?php echo base_url("assets/js/main.js?" . time()) ?>"></script>
<script>
    <?php
    if ($this->router->fetch_class() == "home") {?>
        $("#home").addClass("active-page");
    <?php }
    if ($this->router->fetch_class() == "aboutus") {?>
        $("#aboutus").addClass("active-page");
    <?php }
    if ($this->router->fetch_class() == "faqs") {?>
        <!--treeview js for faqs page-->
        $("#faqs").addClass("active-page");
        // $('.treeview').treeView();
    <?php }
    if ($this->router->fetch_class() == "contactus") {?>
        $("#contactus").addClass("active-page");
    <?php }
    if ($this->router->fetch_class() == "locate_orthodontist") {?>
        $("#locate_orthodontist").addClass("active-page");
    <?php }
    if ($this->router->fetch_class() == "requirement") {?>
        $("#requirement").addClass("active-page");
    <?php }
    if ($this->router->fetch_class() == "services") {?>
        $("#services").addClass("active-page");
    <?php }
    if ($this->router->fetch_class() == "gallery") {?>
        $("#gallery").addClass("active-page");
    <?php } ?>
</script>
<script>
    $(document).ready(function(){
        $(window).trigger("resize");
    })
    function login_modal (e) {
        e.preventDefault();
        alert();
        $("#doctor_login_modal").modal();
    };
    $("#active_profile").click(function (e) {
        e.preventDefault();
        $("#doctor_profile_modal").modal();
    });
    $("#doctor_profile").validate({
        submitHandler: function () {
            $(".profile_error").html('');
            var formData = $("#doctor_profile").serialize();
            $.ajax({
                url: url + "/home/update_profile",
                type: "POST",
                data: formData,
                dataType: "JSON",
                success: function (data) {
                    if (data.success) {
                        window.location = window.location;
                        $("#top_menu_bar li:nth-child(3)").after('<li><a href="' + url + 'requirement" >Requirement</a></li>');
                        $("#top_menu_bar li:last-child").remove();
                        $("#top_menu_bar li:last-child").after('<li ><a href="<?php echo base_url("home/logout");?>" id="doctor_logout_button" class="doctor_logout_button btn-warning navbar-btn" style="padding:10px">Logout</a></li>');
                        $("#doctor_profile_modal").modal("hide");
                    } else {
                        $(".profile_error").html(data.message);
                    }
                }

            });
        }
    });
    $("#doctor_login").validate({
        submitHandler: function () {
            $(".doctor_login_error").html('');
            var formData = $("#doctor_login").serialize();
            $.ajax({
                url: url + "/home/check_login",
                type: "POST",
                data: formData,
                dataType: "JSON",
                success: function (data) {
                    if (data.success) {
                        window.location = window.location;
                        $("#top_menu_bar li:nth-child(3)").after('<li><a href="' + url + 'requirement" >Requirement</a></li>');
                        $("#top_menu_bar li:last-child").remove();
                        $("#top_menu_bar li:last-child").after('<li ><a href="<?php echo base_url("home/logout");?>" id="doctor_logout_button" class="doctor_logout_button btn-warning navbar-btn" style="padding:10px">Logout</a></li>');
                        $("#doctor_login_modal").modal("hide");
                    } else {
                        if (data.values != null || data.values != undefined) {
//                                'window.location = window.location;
//                                $("#top_menu_bar li:last-child").remove();
//                                $("#top_menu_bar li:last-child").after(' <li ><a href="#" id="active_profile" class="btn-warning navbar-btn" style="padding:10px">Complete Profile</a></li>');
                            $("#doctor_login_modal").modal("hide");
                            setTimeout(function () {
//                                    $("#doctor_profile_modal").modal("show");
                                $('#doctor_profile_modal').modal({backdrop: 'static', keyboard: false})
                            }, 500);

                            $("#address").val(data.values.address);
                            $("#city").val(data.values.city);
                            $("#clinic_name").val(data.values.clinic_name);
                            $("#email").val(data.values.email);
                            $("#first_name").val(data.values.first_name);
                            $("#last_name").val(data.values.last_name);
                            $("#middle_name").val(data.values.middle_name);
                            $("#mobile").val(data.values.mobile);
                            $("#pincode").val(data.values.pincode);
                            $("#speciality").val(data.values.speciality);
                        }
                        $(".doctor_login_error").html(data.message);
                    }
                }, error: function () {
                }
            })
        }
    });
    $(document).on("submit","#search_orthodontist",function(e){
        e.preventDefault();
        window.location = url+"/locate_orthodontist?pincode="+$("#locate_orthodontist_serch").val();
        return false;
    });
    $(window).resize(function(){
        //if($(document).width()<=1024){
        if($(document).width()<=5020){
            $(".headerlogo").attr("src","<?php echo base_url("assets/images/new/smilealign_logo_01.png")?>")
        }else{
            $(".headerlogo").attr("src","<?php echo base_url("assets/images/new/smilealign_logo_02.png")?>")
        }
    });

    $('#doctor_login_modal').on('shown', function () {

    });
    $('#doctor_login_modal').on('hidden.bs.modal', function () {
        $(".js-ubea-nav-toggle").removeClass("active");
    });

    $('#doctor_login_modal').on('shown.bs.modal', function(e) {
        $(".js-ubea-nav-toggle").removeClass("active");
    });
    $(".client").on("click",function(){
        window.location = url+"locate_orthodontist"
    });
    $(".doctor").on("click",function(){
        <?php if (!isset($session_data)) { ?>
            $('#doctor_login_modal').modal("show");
        <?php }else { ?>
        window.location = url+"orders_list";
        <?php }?>
    });
    $(document).on("click",'.dropdown-toggle',function(e) {
        e.preventDefault();
        if($(this).parent().children(".dropdown-menu").is(":visible")){
            $(this).parent().children(".dropdown-menu").hide()
        }else{
            $(this).parent().children(".dropdown-menu").show()
        }
    });



    $("#forget_password").validate({
        submitHandler: function () {
            $("#forgot_error").html('');
            var formData = $("#forget_password").serialize();
            $.ajax({
                url: url + "/home/send_password",
                type: "POST",
                data: formData,
                dataType: "JSON",
                success: function (data) {
                    if (data.success) {
                        $("#forgot_error").html(data.message);
                        setTimeout(function () {
                            $("#forgot_password_modal").modal("hide");
                            window.location = window.location;
                        }, 5000);

                    } else {

                        $("#forgot_error").html(data.message);
                    }
                }, error: function () {
                }
            })
        }
    });
</script>
<!--<script src="http://vjs.zencdn.net/6.4.0/video.js"></script>-->
<?php
if($this->router->fetch_class()=='my_account')
{
    ?>
    <script src="<?php echo base_url('assets/js/my_account.js')?>"></script>
<?php
}
?>
</body>
</html>