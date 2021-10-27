<style>
    .second-portion {
        margin-top: 50px;
    }

    @import "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css";
    @import "http://fonts.googleapis.com/css?family=Roboto:400,500";

    .box > .icon {
        text-align: center;
        position: relative;
    }

    .box > .icon > .image {
        position: relative;
        z-index: 2;
        margin: auto;
        width: 88px;
        height: 88px;
        border: 8px solid white;
        line-height: 88px;
        border-radius: 50%;
        vertical-align: middle;
    }

    .box > .icon:hover > .image {
        background: #333;
    }

    .box > .icon > .image > i {
        font-size: 36px !important;
        color: #fff !important;
    }

    .box > .icon:hover > .image > i {
        color: white !important;
    }

    .box > .icon > .info {
        margin-top: -24px;
        background: rgba(0, 0, 0, 0.04);
        padding: 15px 0 10px 0;
        min-height: 100px;
    }

    .box > .icon:hover > .info {
        background: rgba(0, 0, 0, 0.04);
        border-color: #e0e0e0;
        color: white;
    }

    .box > .icon > .info > h3.title {
        font-family: "Unit Slab Regular", serif;;
        /*font-family: "Robot", sans-serif !important;*/
        font-size: 17px;
        font-weight: 700;
        margin-top:15px
    }

    .box > .icon > .info > p {
        font-family: "Unit Slab Bold", serif;;
        /*font-family: "Robot", sans-serif !important;*/
        font-size: 16px;
        line-height: 1.5em;
        margin: 10px;
    }

    .box > .icon:hover > .info > h3.title, .box > .icon:hover > .info > p, .box > .icon:hover > .info > .more > a {
        color: #222;
    }

    .box > .icon > .info > .more a {
        font-family: "Unit Slab Regular", serif;;
        /*font-family: "Robot", sans-serif !important;*/
        font-size: 12px;
        color: #222;
        line-height: 12px;
        text-transform: uppercase;
        text-decoration: none;
    }

    .box > .icon:hover > .info > .more > a {
        color: #fff;
        padding: 6px 8px;
        background-color: #63B76C;
    }

    .box .space {
        height: 30px;
    }

    @media only screen and (max-width: 768px) {
        .second-portion {
            margin-top: 25px;
        }
    }
    /*---------- 007 code  ----------- */
    @media (max-width:1024px) and (min-width:768px){
        .address-info > div{
            width:33.33333% !important;
        }
        .address-info > div .info{
            min-height: 153px !important;
        }
    }
    /*---------- 007 code  ----------- */
</style>
<div class="banner" data-section="home" style="background: url(<?php echo base_url('assets/images/new/in_banner_04.jpg'); ?>)">
    <div class="page_name">CONTACT</div>
    <div class="function_name">SMILE ALIGNERS > CONTACT</div>
</div>
<br/>
<br/>
<br/>
    <div class="ubea-section" id="ubea-services" data-section="about">
        <div class="ubea-container">
            <div class="row">
                <div class="col-md-7 "><!---------- 007 code change 8--to--7   ----------------->
                    <div class="home_headings text-left">We are here</div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.7981052627624!2d72.82971665001814!3d19.07261233702648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c90c53ea6ed1%3A0xf27cdda53d70565b!2sLaxmi+Niwas!5e0!3m2!1sen!2sin!4v1509701791657"
                        width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-5"><!---------- 007 code change 4--to--5   ----------------->
                    <?php echo $form_view;?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="second-portion">
                        <div class="row address-info">
                            <!-- Boxes de Acoes -->
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="box">
                                    <div class="icon">
                                        <div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <h3 class="title">MAIL & WEBSITE</h3>
                                            <p>
                                                contact@smilealign.in
                                                <br>
                                                www.smilealigners.in

                                            </p>

                                        </div>
                                    </div>
                                    <div class="space"></div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="box">
                                    <div class="icon">
                                        <div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <h3 class="title">CONTACT</h3>
                                            <p>
                                                (+91)-022 26059987
                                                <br>
                                                (+91)-98923 10989


                                            </p>
                                        </div>
                                    </div>
                                    <div class="space"></div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="box">
                                    <div class="icon">
                                        <div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <h3 class="title">ADDRESS</h3>
                                            <p>
                                               Laxmi Niwas,
                                                1st Floor,Near Fabindia,<br/>
                                                18th Road, Khar West,
                                                Mumbai - 400052.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="space"></div>
                                </div>
                            </div>
                            <!-- /Boxes de Acoes -->

                            <!--My Portfolio  dont Copy this -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br/>
<br/>
<br/>
<style>
    .form-control {
        height: 35px;
    }

    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        font-size: 14px;
    }

    ::-moz-placeholder { /* Firefox 19+ */
        font-size: 14px;
    }

    :-ms-input-placeholder { /* IE 10+ */
        font-size: 14px;
    }

    :-moz-placeholder { /* Firefox 18- */
        font-size: 14px;
    }
</style>
<script>
    // 007 code strt
    $(document).on("submit", "#contactform", function (e) {
        e.preventDefault();
        $(".error_msg").html("");
        $(".error_msg").css("display","block");
        var name = $("#name").val()
        var comname = $("#comname").val()
        var email = $("#email").val()
        var mobile = $("#mobile").val()
        var msg = $("#enq").val()
        if(name !=="" && email !==""){
            $(".error_msg").html("");
            $(".error_msg").css("display","block");
            $.ajax({
                url: url + "contactus/contactform",
                type: "POST",
                data: {name: name, comname: comname,email:email,mobile:mobile,msg:msg},
                dataType: "JSON",
                success: function (data) {
                    if(data.success == true){
                        $(".error_msg").removeClass("label-danger");
                        $(".error_msg").addClass("label-success");
                        $(".error_msg").html(data.message);
                        setTimeout(function() { $(".error_msg").hide(); }, 5000);
                        document.getElementById("contactform").reset();
                    }else{
                        $(".error_msg").removeClass("label-success");
                        $(".error_msg").addClass("label-danger");
                        $(".error_msg").html(data.message);
                        setTimeout(function() { $(".error_msg").hide(); }, 5000);
                    }
                }
            });
        }else{
            $(".error_msg").removeClass("label-success");
            $(".error_msg").addClass("label-danger");
            $(".error_msg").html("Plaese fill the above information.");
            setTimeout(function() { $(".error_msg").hide(); }, 5000);
        }
        return false;
    });
    //007 code end


    // 007 code strt
    $(document).on("submit", "#doctor_contactform", function (e) {
        e.preventDefault();
        $(".error_msg").html("");
        $(".error_msg").css("display","block");
        var topic = $("#topic").val();

        var msg = $("#enq").val();
        if(topic !=="" && topic !==""){
            $(".error_msg").html("");
            $(".error_msg").css("display","block");
            $.ajax({
                url: url + "contactus/doctor_contactform",
                type: "POST",
                data: {topic: topic, msg:msg},
                dataType: "JSON",
                success: function (data) {
                    if(data.success == true){
                        $(".error_msg").removeClass("label-danger");
                        $(".error_msg").addClass("label-success");
                        $(".error_msg").html(data.message);
                        setTimeout(function() { $(".error_msg").hide(); }, 5000);
                        document.getElementById("doctor_contactform").reset();
                    }else{
                        $(".error_msg").removeClass("label-success");
                        $(".error_msg").addClass("label-danger");
                        $(".error_msg").html(data.message);
                        setTimeout(function() { $(".error_msg").hide(); }, 5000);
                    }
                }
            });
        }else{
            $(".error_msg").removeClass("label-success");
            $(".error_msg").addClass("label-danger");
            $(".error_msg").html("Plaese fill the above information.");
            setTimeout(function() { $(".error_msg").hide(); }, 5000);
        }
        return false;
    });
    //007 code end
</script>








