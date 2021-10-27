<?php
$session_data = $this->session->userdata('doctor_data');
$uncompleted_doctor_data = $this->session->userdata('uncompleted_doctor_data');
?>
<style type="text/css">
    .control-label{
        color: #FFF;
        font-size: 16px;
    }
    .form-control{
        background-color: #FFF;
        font-size: 16px;
    }
    .form_heading{
        color: #FFF;
    }
    .sub_heading{
        font-weight: 600;
        font-size:16px;
        color:#FFF;
    }
    .info-type{
        padding-top: 10px;
        font-weight: 600;
        font-size:22px;
        color:#FFF;
    }
    .question{
        color: #FFF;
        font-size: 18px;
        /*font-weight: 600;*/
    }
    .options label{
        color: #FFF;
        font-size: 16px;
    }
    .options h4{
        color: #FFF;
    }
    .btn-primary{
        border: 2px solid #FFF !important;
    }
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active{
        background: grey;
    }
</style>
<div class="banner" data-section="home"
     style="background: url(<?php echo base_url('assets/images/new/in_banner_03.jpg'); ?>)">
    <div class="page_name">REQUIREMENT</div>
    <div class="function_name">SMILEALIGNERS > MY REQUIREMENT</div>
</div>
<div class="orange-shade" style="padding-bottom: 80px;">
    <div class="container text-center">
        <div class="home_headings">Treatment Planning</div>
        <div class="sub_heading">Send us the requirement through this order form and your order will be proccessed.</div>
        <hr style="border-top:2px solid #9b9b9b"/>

        <div class="form_container">
            <?php
            function append_subcategories($question_options, $option)
            {
                $id = $option->parent_option_id;
                if (isset($question_options[$option->parent_option_id])) {
                    if (isset($question_options[$option->parent_option_id]['sub_categories'][$option->option_id])) {
                        array_push($question_options[$id]['sub_categories'][$option->option_id], (array)$option);
                    } else {
                        $question_options[$option->parent_option_id]['sub_categories'][$option->option_id] = (array)$option;
                    }
                } else {
                    if (is_array($question_options)) {
                        foreach ($question_options as $key => $qo) {
                            $question_options[$key] = append_subcategories($qo, $option);
                        }
                    }
                }
                // print_r($question_options);
                return $question_options;
            }

            function print_sub_cates($options, $level, $q_id)
                //function print_sub_cates($options, $level, $q_id, $key)
            {

                foreach ($options as $option) {
                    echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $level)
                    ?>
                    <input type="checkbox" name="question_<?php echo $q_id; ?>[]"
                           value="<?php echo $option['option_id'] ?>"><?php echo $option['option'] ?><br/>
                    <div>
                        <?php if (isset($option['sub_categories'])) {
                            print_sub_cates($option['sub_categories'], ++$level, $q_id);
                            // print_sub_cates($option['sub_categories'], ++$level, $q_id . "_" . $option['option_id']);
                            --$level;
                        } ?>
                    </div>
                <?php } ?>
            <?php } ?>
            <form name="treatment" id="treatment">

                <!----------- doctor form fields start ----------------->
                <?php if (!isset($session_data)) { ?>
                    <div class="row">
                        <div class="col-sm-8 col-centered row">
                            <div class="info-type">Doctor Information</div>
                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_fname">First Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dr_fname" name="dr_fname"
                                               placeholder="First Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_mname">Middle Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dr_mname" name="dr_mname"
                                               placeholder="Middle Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_lname">Last Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dr_lname" name="dr_lname"
                                               placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_lname">Speciality:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dr_speciality" name="dr_speciality"
                                               placeholder="Speciality">
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_email">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dr_email" name="dr_email"
                                               placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_mobile">Mobile:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dr_mobile" name="dr_mobile"
                                               placeholder="Mobile">
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_clinic_name">Clinic name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dr_clinic_name" name="dr_clinic_name"
                                               placeholder="Clinic Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_address">Address:</label>
                                    <div class="col-sm-10">
                                        <textarea id="dr_address" name="dr_address" placeholder="Address"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_city">City:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dr_city" name="dr_city"
                                               placeholder="City">
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="dr_pincode">Pincode:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dr_pincode" name="dr_pincode"
                                               placeholder="Pincode">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr style="border-top:2px solid #9b9b9b"/>
                    <!----------- doctor form fields ends ----------------->
                <?php } ?>

                <div class="row">
                    <div class="col-sm-8 col-centered row">
                        <div class="info-type">Patient Information</div>
                        <div class="row">&nbsp;
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Patient Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="patient_name" name="patient_name"
                                           placeholder="Patient Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">&nbsp;
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Patient Age:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="patient_age" name="patient_age"
                                           placeholder="Patient Age">
                                </div>
                            </div>
                        </div>

                        <div class="row">&nbsp;
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Sex:</label>
                                <div class="col-sm-10">
                                    <!--                                <input type="text" class="form-control" id="patient_sex" name="patient_sex" placeholder="Patient Sex">-->
                                    <select id="patient_sex" name="patient_sex"
                                            style="width:100%;padding:5px 15px;font-size: 14px;">
                                        <option>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="addr">Address</label>
                                <div class="col-sm-10">
                                    <textarea id="addr" name="addr" placeholder="Address" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $i = 1;
                foreach ($questions as $question) {
                    $categories = array(); ?>
                    <div class="row question_row">
                        <div class="col-sm-8 col-centered">
                            <?php echo($i == 1 ? '<div class="form_heading">Order Form</div>' : '') ?>
                            <div class="question"><?php echo $i . ". " . $question->question ?></div>
                            <div class="options">
                                <div class="row">
                                    <?php $options = (array)json_decode('[' . $question->sub_options . ']');
                                    $question_options = array();
                                    foreach ($options as $option) {
                                        if (!in_array($option->category, $categories)) {
                                            array_push($categories, $option->category);
                                        }
                                        if ($option->category == '') {
                                            $option->category = "no-cats";
                                        }
                                        if ($option->parent_option_id == 0) {
                                            $question_options[$option->category][$option->option_id] = (array)$option;
                                        } else {
                                            $question_options[$option->category] = append_subcategories($question_options[$option->category], $option);
                                        }
                                    }
                                    foreach ($question_options as $key => $cats) {
                                        if ($key == 'no-cats') {
                                            foreach ($cats as $option) {
                                                ?>
                                                <div class="col-sm-3">
                                                    <label class="checkbox-inline">
                                                        <!--<input type="checkbox"
                                                               name="question_<?php /*echo $question->id . "_" . $key */ ?>[]"
                                                               id="question_<?php /*echo $question->id . "_" . $key */ ?>[]"
                                                               value="<?php /*echo $option['option_id'] */ ?>"><?php /*echo $option['option'] */ ?>
                                                        <br/>-->
                                                        <input type="checkbox"
                                                               name="question_<?php echo $question->id ?>[]"
                                                               id="question_<?php echo $question->id ?>[]"
                                                               value="<?php echo $option['option_id'] ?>"><?php echo $option['option'] ?>
                                                        <br/>
                                                        <div>
                                                            <?php if (isset($option['sub_categories'])) {
                                                                print_sub_cates($option['sub_categories'], 1, $question->id);
                                                               // print_sub_cates($option['sub_categories'], 1, $question->id . "_" . $option['option_id'], $key);
                                                            } ?>
                                                        </div>

                                                    </label>
                                                </div>

                                            <?php }
                                        } else {
                                            $count = count($question_options);
                                            $cols = 12 / $count;
                                            $size = "col-sm-" . $cols;
                                            echo "<div class=" . $size . "><h4>" . $key . "</h4>";
                                            foreach ($cats as $option) {
                                                ?>
                                                <div class="col-sm-12">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox"
                                                               name="question_<?php echo $question->id ?>[]"
                                                               value="<?php echo $option['option_id'] ?>"><?php echo $option['option'] ?>
                                                        <br/>
                                                        <!--<input type="checkbox"
                                                               name="question_<?php /*echo $question->id . "_" . $key */ ?>[]"
                                                               value="<?php /*echo $option['option_id'] */ ?>"><?php /*echo $option['option'] */ ?>
                                                        <br/>-->
                                                        <div>
                                                            <?php if (isset($option['sub_categories'])) {
                                                                print_sub_cates($option['sub_categories'], 1, $question->id);
                                                            } ?>
                                                        </div>
                                                    </label>
                                                </div>
                                            <?php }
                                            echo "</div>";
                                        }
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control comment" rows="3" id="comment_<?php echo $question->id ?>"
                                              name="comment_<?php echo $question->id ?>"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="option-seprator"/>
                    <?php $i++;
                } ?>
                <div class="col-sm-8 col-centered row">
                    <button type="submit" class="btn btn-primary submit_button ">Submit</button>
                    <img src="<?php echo base_url("assets/images/loader.gif"); ?>" class="hide submit_loader">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <br/>
<br/>
<br/>
<br/>
<br/> -->
<!------------- form success pop up ------------------- -->
<div class="modal fade" id="form-success-popup" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Message</h4>
            </div>
            <div class="modal-body">
                <p class="form-success-msg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .question_row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }

    .question_row > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }

    #treatment input.form-control {
        height: 30px;
        font-size: 14px;
        opacity: 1;
        width: 100%;
    }

    .control-label {
        font-size: 15px;
    }
</style>

<script>
    $(document).ready(function () {

        $("#treatment").submit(function (e) {
            var no_answer = 0;
            var goto_id = "";
            $('#treatment input:checkbox:enabled').each(function () {
                nam = $(this).attr('name');
                if (!$(':checkbox[name="' + nam + '"]:checked').length) {
                    // console.log(nam + ' group not checked');
                    if (goto_id == "") {
                        goto_id = nam;
                    }
                    no_answer++;
                }
            });
            var scroll = 0;
            if ($("#patient_name").val() == "") {
                alert("Please Enter Patient Name")
                scroll++;
                $('html, body').animate({
                    scrollTop: $("#patient_name").offset().top - 100
                }, 2000);
                $("#patient_name").focus();
                /* --------007 code new line---------------------*/
                return false;
            } else if ($("#patient_age").val() == "") {
                alert("Please Enter Patient Age")
                if (scroll == 0) {
                    scroll++;
                    $('html, body').animate({
                        scrollTop: $("#patient_age").offset().top - 100
                    }, 2000);
                }
                $("#patient_age").focus();
                /* --------007 code new line---------------------*/
                return false;
            } else if ($("#addr").val() == "") {
                alert("Please Enter Patient Address")
                if (scroll == 0) {
                    scroll++;
                    $('html, body').animate({
                        scrollTop: $("#addr").offset().top - 100
                    }, 2000);
                }
                $("#addr").focus();
                /* --------007 code new line---------------------*/
                return false;
            }
            e.preventDefault();
            var formData = $('#treatment').serialize();
            // console.log(formData);              /* console.log data : name and age and comment from 1 to 13 */
            // return;
            $(".submit_loader").removeClass("hide");
            $(".submit_button").css("background-color", 'gray');
            $(".submit_button").prop('disabled', true);
            $.ajax({
                url: "requirement/check_requirement",
                type: "POST",
                data: formData,
                dataType: "JSON",
                success: function (data) {
                    $(".submit_button").prop('disabled', false);
                    $(".submit_loader").addClass("hide");
                    $(".submit_button").css("background-color", '#FF5126');
                    console.log(data);
                    if (data.success == true) {
                        $('#treatment')[0].reset();
                        //$('input[type="checkbox"]')
                        $('.form-success-msg').text("Your Requirement Submitted.");
                        $('#form-success-popup').modal("show");
                        //   window.location=window.location;
                    } else {
//                        $('.form-success-msg').text("Something went wrong. Please try again");
                        $('.form-success-msg').text(data.message);
                        $('#form-success-popup').modal("show");
                    }
                }, error: function () {
                    $(".submit_button").prop('disabled', false);
                    $(".submit_loader").addClass("hide");
                    $(".submit_button").css("background-color", '#FF5126');
                }
            });
            return false;
        })
    })
</script>




