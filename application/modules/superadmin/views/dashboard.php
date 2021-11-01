<style>
    .loader_div{
        width:100%;
        height:100%
        position:fixed;
        background: rgba(0,0,0,.5);
        z-index: 0100;
    }
    .loader {
        border: 5px solid #f3f3f3;
        border-radius: 50%;
        border-top: 5px solid #3498db;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
        position: absolute;
        left:100%;
        margin-left:-50%;
        top:50%

    }

    .content_rows {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display:         flex;
        flex-wrap: wrap;
    }
    .content_rows > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<div class="loader_div " style="position:absolute;width:100%;height: 100%;margin:auto">
    <div class="loader"></div>
</div>
<div class="container">
    <div class="row border_bottom">
        <div class="col-sm-6 headings">SMILEALIGNERS ADMIN PANEL</div>
        <div class="col-sm-6 text-right" style="height: 67px"><a href="<?php echo base_url("superadmin/logout"); ?>" class="admin_logout">LOGOUT</a>
        </div>
    </div>
    <div class="row content_rows">
        <div class="col-sm-2 bordered-right"><br/><br/><br/>
            <ul class="nav nav-pills nav-stacked">
                <li><a data-toggle="tab" href="#view_orders_list">VIEW ORDERS</a></li>
                <li class="active"><a data-toggle="tab" href="#doctors_list">DOCTORS</a></li>
                <li><a data-toggle="tab" href="#change_password">Change Password</a></li>
            </ul>
        </div>
        <div class="col-sm-10 ">
            <div class="row">
                <div class="tab-content">
                    <div id="view_orders_list" class="tab-pane fade ">
                        <div class="row margin0" style="padding-top: 10px">
                            <div class="col-sm-6 ">
                                <div class="column_heading">ORDERS</div>
                            </div>
                            <div class="col-sm-6 padding0 text-right" style="padding-top: 6px;">
<!--                                <div class="col-sm-6 padding0 col-right">-->
<!--                                    <div class="form-group order_wise">-->
<!--                                        <label for="sel1">VIEW BY:</label>-->
<!--                                        <select class="form-control" id="order_wise_list">-->
<!--                                            <option>1</option>-->
<!--                                            <option>2</option>-->
<!--                                            <option>3</option>-->
<!--                                            <option>4</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <div class="row margin0">
                            <div class="table-responsive">
                                <table class="table order_table text-left" cellpadding="0" cellspacing="10px">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div>NO</div>
                                        </th>
                                        <th>
                                            <div>ORDER DATE</div>
                                        </th>
                                        <th>
                                            <div>ORDER ID</div>
                                        </th>
                                        <th>
                                            <div>DOCTORS NAME</div>
                                        </th>
                                        <th>
                                            <div>LOCATION</div>
                                        </th>
                                        <th>
                                            <div>STATUS</div>
                                        </th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="order_tbody">
                                    <?php $i = $total_orders;

                                    foreach ($orders as $order) { ?>
                                        <tr id="<?php echo $order->unique_id; ?>">
                                            <td>
                                                <div>
                                                    <?php echo $i-- ; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div><?php echo date('d/m/Y', strtotime($order->created_at))  ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo $order->unique_id ; ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo ucfirst($order->first_name . " " . $order->middle_name . " " . $order->last_name) ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo $order->city; ?></div>
                                            </td>
                                            <td>
                                                <div>
                                                    <select class="change_status" style="font-size: 12px; height: 20px;">
                                                        <option <?php echo($order->status == "Order Received" ? "selected" : "") ?>
                                                            value="Order Received">Order Received
                                                        </option>
                                                        <option <?php echo($order->status == "Processing" ? "selected" : "") ?>
                                                            value="Processing">Processing
                                                        </option>
                                                        <option <?php echo($order->status == "Dispatched" ? "selected" : "") ?>
                                                            value="Dispatched">Dispatched
                                                        </option>
                                                        <option <?php echo($order->status == "Delivered" ? "selected" : "") ?>
                                                            value="Delivered">Delivered
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-right " style="padding: 0">
                                                    <button class="column_button show_order_details">VIEW DETAILS
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <ul class="pagination" style="margin-left: 10px">
                                    <?php
                                    $pages = $total_orders/10+($total_orders%10==0?0:1);
                                    for($i=1;$i<=$pages;$i++){?>
                                        <li><a href="#" class="order_pagination" data="<?php echo $i;?>"><?php echo $i?></a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="doctors_list" class="tab-pane fade in active">
                        <div class="row margin0" style="padding-top: 10px">
                            <div class="col-sm-6 ">
                                <div class="column_heading">DOCTORS</div>
                            </div>
                            <div class="col-sm-6 padding0" style="    padding-top: 6px;">
                                <div class="col-sm-6 padding0">
<!--                                    <div class="form-group order_wise">-->
<!--                                        <label for="sel1">VIEW BY:</label>-->
<!--                                        <select class="form-control" id="order_wise_list">-->
<!--                                        </select>-->
<!--                                    </div>-->
                                </div>
                                <div class="col-sm-3 padding0">
                                    <!--                                    <button class="column_button">EDIT DOCTORS</button>-->
                                </div>
                                <div class="col-sm-3 padding0 text-right">
                                    <button class="column_button" data-toggle="modal"
                                            data-target="#add_new_doctor_modal">ADD DOCTORS
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row margin0">
                            <div class="table-responsive">
                                <table class="table doctor_table text-left" cellpadding="0" cellspacing="10px">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <div>NO</div>
                                        </th>
                                        <th>
                                            <div>FIRST NAME</div>
                                        </th>
                                        <th>
                                            <div>MIDDLE NAME</div>
                                        </th>
                                        <th>
                                            <div>LAST NAME</div>
                                        </th>
                                        <th>
                                            <div>MOBILE NUMBER</div>
                                        </th>
                                        <th>
                                            <div>EMAIL ID</div>
                                        </th>
                                        <th>
                                            <div>SPECIALITY</div>
                                        </th>
                                        <th>
                                            <div>Address</div>
                                        </th>
                                        <th>
                                            <div>City</div>
                                        </th>
                                        <th>
                                            <div>Pincode</div>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="doctors_table_tbody">
                                    <?php $i = $total_doctors;
                                    foreach ($doctors as $doctor) { ?>
                                        <tr doctor_id="<?php echo $doctor->id;?>">
                                            <td><a href="#" class="edit_doctor"><i class="fa fa-pencil"></i></a></td>
                                            <td>
                                                <div>
                                                    <?php echo $i--; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div><?php echo ucfirst($doctor->first_name); ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo ucfirst($doctor->middle_name); ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo ucfirst($doctor->last_name); ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo $doctor->mobile; ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo $doctor->email; ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo ucfirst($doctor->speciality); ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo ucfirst($doctor->address); ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo ucfirst($doctor->city); ?></div>
                                            </td>
                                            <td>
                                                <div><?php echo $doctor->pincode; ?></div>
                                            </td>
                                            <td>
                                                <a href="#" class="delete_doc" title="Delete Doctor"><i class="fa fa-close"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                                <ul class="pagination" style="margin-left: 10px">
                                    <?php
                                    $dr_pages = $total_doctors/10+($total_doctors%10==0?0:1);
                                    for($i=1;$i<=$dr_pages;$i++){?>
                                        <li><a href="#" class="doctor_pagination" data="<?php echo $i;?>"><?php echo $i?></a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="change_password" class="tab-pane fade ">
                        <div class="row margin0" style="padding-top: 10px">
                            <div class="col-sm-6 ">
                                <div class="column_heading">CHANGE PASSWORD</div>
                            </div>
                            <div class="col-sm-6 padding0 text-right" style="padding-top: 6px;">

                            </div>
                        </div>
                        <div class="row margin0">
                            <div class="table-responsive">
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
</div>

<!-- Add New Doctor Modal -->
<div id="add_new_doctor_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Doctor</h4>
            </div>
            <div class="modal-body" style="padding: 20px 50px;background: #fff;">
                <form id="add_new_doctor">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3" for="first_name">First Name <sup
                                    class="required_field">*</sup></label>
                            <div class="col-sm-9 input-group">
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                       placeholder="Enter First Name" value="">
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3" for="middle_name">Middle Name</label>
                            <div class="col-sm-9 input-group">
                                <input type="text" class="form-control" id="middle_name" name="middle_name"
                                       placeholder="Enter Middle Name" value="">
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3" for="last_name">Last Name</label>
                            <div class="col-sm-9 input-group">
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                       placeholder="Enter Last Name" value="">
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3" for="mobile_no">Mobile Number <sup
                                    class="required_field">*</sup></label>
                            <div class="col-sm-9 input-group">
                                <input type="number" class="form-control" id="mobile_no" name="mobile_no"
                                       placeholder="Enter Mobil Number" value="">
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3" for="email">Email address <sup
                                    class="required_field">*</sup></label>
                            <div class="col-sm-9 input-group">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Enter Email" value="">
                            </div>
                        </div>
                    </div>
                    <br/>
                    <!--                    <div class="row">-->
                    <!--                        <div class="form-group">-->
                    <!--                            <label class="col-sm-3" for="speciality">Speciality <sup-->
                    <!--                                    class="required_field">*</sup></label>-->
                    <!--                            <div class="col-sm-9 input-group">-->
                    <!--                                <input type="text" class="form-control" id="speciality" name="speciality"  placeholder="Enter Speciality" value="Dentist">-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <br/>-->
                    <!--                    <div class="row">-->
                    <!--                        <div class="form-group">-->
                    <!--                            <label class="col-sm-3" for="location">Location <sup-->
                    <!--                                    class="required_field">*</sup></label>-->
                    <!--                            <div class="col-sm-9 input-group">-->
                    <!--                                -->
                    <!--                                <input type="text" class="form-control" id="location" name="location"  placeholder="Enter Location" value="Mumbai">-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <br/>
                    <div class="row">
                        <button type="submit" class="btn btn-default">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add New Doctor Modal End -->

<!--order view_details-->
<div id="order_view_details" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order Details</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div id="doctor_edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Doctor Information</h4>
            </div>
            <div class="modal-body">
                <div class="loader text-center">
                    <img style="width:50px;" src="<?php echo base_url("assets/images/preloader.gif");?>"><br/>
                    Please Wait Fatching Data...
                </div>
                <div class="form_container hide" style="padding: 0 25px">
                    <form role="form" id="edit_doctor_profile">
                        <input type="hidden" id="doctor_id" name="doctor_id">
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-eye-open"></span> Clinic name</label>
                            <input type="text" class="form-control" name="edit_clinic_name" id="edit_clinic_name"
                                   placeholder="Enter Clinic Name"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-eye-open"></span> First Name</label>
                            <input type="text" class="form-control" name="edit_first_name" id="edit_first_name"
                                   placeholder="Enter First Name"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-eye-open"></span> Middle Name</label>
                            <input type="text" class="form-control" name="edit_middle_name" id="edit_middle_name"
                                   placeholder="Enter Middle Name"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-eye-open"></span> Last Name</label>
                            <input type="text" class="form-control" name="edit_last_name" id="edit_last_name"
                                   placeholder="Enter Last Name"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="doctor_username"><span class="glyphicon glyphicon-user"></span> Email</label>
                            <input type="email" class="form-control" id="edit_email" name="edit_email"
                                   placeholder="Enter email" value="">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-eye-open"></span> Mobile</label>
                            <input type="text" class="form-control" name="edit_mobile" id="edit_mobile" placeholder="Enter Mobile"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-eye-open"></span> Speciality</label>
                            <input type="text" class="form-control" name="edit_speciality" id="edit_speciality"
                                   placeholder="Enter Speciality"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-eye-open"></span> Address</label>
                            <input type="text" class="form-control" name="edit_address" id="edit_address" placeholder="Enter Address"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-eye-open"></span> City</label>
                            <input type="text" class="form-control" name="edit_city" id="edit_city" placeholder="Enter City"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-eye-open"></span> Pincode</label>
                            <input type="text" class="form-control" name="edit_pincode" id="edit_pincode" placeholder="Enter Pincode"
                                   value="">
                        </div>
                        <div class="profile_error text text-danger"></div>
                        <button type="submit" class="btn btn-block" style="background:#73cde1;color: white; "><span
                                    class="fa fa-off"></span> Update Info
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>