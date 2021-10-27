$(document).ready(function(){
    $("#profile").validate({
        rules: {
            fname: {
                required: true
            },

            mname: {
                required: true
            },

            lname: {
                required: true
            },

            spaciality: {
                required: true
            },
            email: {
                required: true,
                email:true
            },
            mobile: {
                required: true,
                number:true,
                maxlength:10
            },
            cli_name: {
                required: true
            },
            address: {
                required: true
            },
            city: {
                required: true
            },
            pincode: {
                required: true
            }
        },
        messages: {
            fname: {
                required: 'First name required'
            },

            mname: {
                required: 'Middle name required'
            },

            lname: {
                required: 'Last name required'
            },

            spaciality: {
                required: 'Speciality required'
            },
            email: {
                required: 'Email required',
                email:true
            },
            mobile: {
                required: 'Mobile required',
                number:true,
                maxlength:10
            },
            cli_name: {
                required: 'Clinic Name required'
            },
            address: {
                required: 'Address required'
            },
            city: {
                required: 'City required'
            },
            pincode: {
                required: 'Pincode required'
            }

        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.form-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function () {
            var formData = $("#profile").serialize();
            $.ajax({
                url: url + "my_account/update_profile",
                type: "POST",
                data: formData,
                dataType: "JSON",
                success: function (data) {
                    if (data.success) {
                        location.reload(true);
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

    $("#password").validate({
        rules: {
            new: {
                required: true,
                minlength:6
            },

            confirm: {
                required: true,
                equalTo: "#new",
                minlength:6
            },

            old: {
                required: true
            },
        },
        messages: {
            new: {
                required: 'Please enter new password'
            },

            confirm: {
                required: 'Please enter new password again',
                equalTo: "New and confirm password must be same"
            },

            old: {
                required: 'Please enter your current password',
                equalTo: "#password"
            },
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.form-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },

        submitHandler: function (form,event) {
            event.preventDefault();

            var formData = $("#password").serialize();
            $.ajax({
                url: url + "my_account/update_password",
                type: "POST",
                data: formData,
                dataType: "JSON",
                success: function (data) {
                    $('#password_status').html(data.msg);

                    if (data.status) {
                        $('#password_status').removeClass('error_msg');
                        $('#password_status').addClass('success_msg');
                    } else {
                        $('#password_status').addClass('error_msg');
                        $('#password_status').removeClass('success_msg');
                    }
                }

            });

        }
    });
})