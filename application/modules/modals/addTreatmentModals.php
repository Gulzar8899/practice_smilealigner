<!-- Add Treatment Add Address Modal -->
<div class="uk-modal" id="add-treatment-address-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h4 class="primary-color"><b>Add Treatment Address</b></h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="createTreatmentAddress">
                    <!-- <form method="POST" action="<?= site_url('admin/Treatmentplanner/addTreatmentAddress'); ?>"> -->

                        <?php $length = 10; // echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length); ?>
                        <input type="hidden" id="treatmentID" name="treatmentID" value="<?= substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length); ?>">
                        
                         <div class="uk-form-row">
                            <div class="uk-grid">
                                
                              <!--   <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Street Address*</b></label>
                                    <input type="text" name="shipping_streetaddress" class="md-input input-border" placeholder="Enter Street Address" required/>
                                </div> -->
                                <div class="uk-width-medium-1-2">
                                     <label for="exampleFormControlFile1">
                                        <b>Country*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;" class="shipping_country_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_country" class="shipping_country" onChange="getShippingStates(this);">
                                            <option>Select</option>
                                            <?php foreach($countries as $country): ?>
                                                <option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>"><?= $country->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="exampleFormControlFile1">
                                        <b>State*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;" class="shipping_state_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_state" class="shipping_state" onChange="getShippingCities(this);">
                                            <option>Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                
                                <div class="uk-width-medium-1-1">
                                     <label for="exampleFormControlFile1">
                                        <b>City*</b></label>
                                    <div class="uk-button uk-form-select custom-uk-select" data-uk-form-select>
                                        <span style="float: left;" class="shipping_city_s"></span>
                                        <i class="uk-icon-caret-down custom-uk-selectDropIcon"></i>
                                        <select name="shipping_city" class="shipping_city">
                                            <option>Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                   
                                   <div class="collapse uk-margin-small-top" id="featuresData">
                                        <!-- <label for="exampleFormControlFile1"><b>Arches to be treated</b></label><br> -->
                                        <div class="row">
                                            <div style="" class="demo-checkbox col-md-12 uk-margin-small-top">
                                                <div class="col-md-2 pl-0" style="margin-bottom:8px; display: inline-flex;align-items: center;">
                                                    <input name="checkAll" value="1" type="checkbox" id="checkAll" class="chk-col-green">
                                                    <label class="label-grey uk-flex uk-flex-top" for="checkAll">&nbsp;&nbsp;&nbsp;Check All</label>
                                                </div>
                                                                   
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                      <!--   <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Post Code*</b></label>
                                    <input type="text" name="shipping_zipcode" class="md-input input-border" placeholder="Enter Post Code" required/>
                                </div>
                            </div>
                        </div> -->



                        <br>
                        <br>

                        <div class="viewButtoMobile uk-flex uk-flex-end" style="justify-content: end;">
                           <!--  <div  class=" mobileDBESetting">
                                <a  class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deleteDoctorByID('<?= $doctorData->id;  ?>');">Delete</a>
                            </div> -->
                            <div class="uk-flex">
                                <div class="uk-margin-small-right">
                                   <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;">
                                </div>
                                <div class="">
                                  <button style="padding-left: 30px !important; padding-right: 30px !important; border-radius: 8px;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit" name="next" id="next">Add</button>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Add Treatment Add Address Modal -->




