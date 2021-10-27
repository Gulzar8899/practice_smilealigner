<div id="page_content">
<div id="page_content_inner" class="view-payment-h">
   <br><br>
   <div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}">
      <div class="uk-width-medium-1-4">
         <div class="uk-panel">
            <h1 class="heading_a headingSize patientMobile uk-margin-bottom"><b>Payment History</b></h1>
         </div>
      </div>
      <div class="uk-width-medium-2-4 payment-top-btn-section" style="display: flex; justify-content: end;">


          <div class="uk-grid">
            <div class="uk-width-medium-1-4">
                
            </div>
            <div class="uk-width-medium-3-4" style="display: flex; justify-content: end;">
              
            </div>
              
          </div>

      </div>
      <div class="uk-width-medium-1-4">
         <div class="uk-panel"></div>
      </div>
   </div>
   <?php if ($this->session->flashdata('error')) { ?>
   <div class="uk-alert uk-alert-danger" data-uk-alert="">
      <a href="#" class="uk-alert-close uk-close"></a>
      <?php echo $this->session->flashdata('error'); ?>
   </div>
   <?php } if ($this->session->flashdata('success')) { ?>
   <script>jQuery(document).ready(function(){ w3_alert("<?php echo $this->session->flashdata('success'); ?>", "tick-green", "type"); });</script>
   <!--<div class="uk-alert uk-alert-success" data-uk-alert="">
      <a href="#" class="uk-alert-close uk-close"></a>
      <?php echo $this->session->flashdata('success'); ?>
      </div>-->
   <?php } ?>
   <div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}">
      <div class="uk-width-medium-3-4">
         <div class="uk-panel">
            <div class="md-card uk-margin-medium-bottom">
               <div class="md-card-content">

                  <form method="POST" id="payment-search-form" action="" enctype="multipart/form-data">
                     <div class="uk-grid-large" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                           <div class="uk-form-row bg-color">
                              <div class="uk-grid">
                                 <div class="uk-width-medium-2-5">

                                    <input type="hidden" name="patientID" value="<?= $singlePatient['pt_id'] ?>">
                                    <div style="display:flex;">
                                       <label><b>Date From:</b></label>
                                       <input type="date" name="date_from" class="md-input" required/>
                                    </div>
                                 </div>
                                 <div class="uk-width-medium-2-5">
                                    <label><b>Date To:</b></label>
                                    <input type="date" name="date_to" class="md-input" required/>
                                 </div>
                                 <div class="uk-width-medium-1-5 pay-btn-sec">
                                      <label style="color: #ededed !important;"><b>Date To:</b></label>

<button type="submit" name="submit" class="md-btn submitAlignment" href="#">Submit</button>
                                   <!--   <div class="uk-grid">
                                        <div class="uk-width-medium-3-4 uk-width-large-2-3">
                                  
                                        </div>
                                        <div class="uk-width-medium-1-4 uk-width-large-1-3">
                                        </div>
                                    </div> -->

                                    
                                 </div>
                              </div>


                           </div>
                        </div>
                    </div>
                  </form>


               
                  <div class="payement-tbl-list">
                      
                    <div class="md-card-content">

                              <div class="uk-grid-large">
                                  <div class="uk-width-medium-1-1">
                                    <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                                        <thead class="tableHeadingBorder">
                                        <tr>
                                            <th class="tblHeading"><b>Date</b></th>
                                            <th class="tblHeading"><b>Invoice#</b></th>
                                            <th class="tblHeading"><b>Bill Amount</b></th>
                                            <th class="tblHeading"><b>Deposit</b></th>
                                            <th class="tblHeading"><b>Deposit Type</b></th>
                                            <th class="tblHeading"><b>Action</b></th>
                                            <!-- <th class="tblHeading"><b></b></th> -->

                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($getAllPaymentListData as $paymentList): 
                                                $total_deposit_amount += $paymentList['deposit_amount'];
                                                
                                            ?>
                                            <tr>
                                               <td class="tblRow"><?= $paymentList['deposit_date']; ?></td> 
                                               <td class="tblRow"><?= $paymentList['invoice_no']; ?></td> 

                                            <?php if($paymentList['amount_type']=='payment'){ ?>

                                               <td class="tblRow"><?= $paymentList['payment_amount'] ?></td> 
                                               <td class="tblRow"><?= '-----' ?></td> 
                                               <td class="tblRow"><?= '-----' ?></td> 
                                               
                                            <?php }else{ ?>

                                               <td class="tblRow"><?= '------' ?></td> 
                                               <td class="tblRow"><?= $paymentList['deposit_amount'] ?></td> 
                                               <td class="tblRow"><?= $paymentList['deposit_type'] ?></td> 

                                            <?php } ?>
                                        
                                            <!--    <td class="tblRow">

                                                    <?php if($paymentList['amount_type'] == 'payment'){ ?>
                                                    <a href=""  onclick="editPaymentHistory('<?= $paymentList['id'] ?>')" data-uk-modal="{target:'#edit_payment'}" title="Edit"> 
                                                        <span class="infoIconSetting">
                                                         <i style=" color: #6D3745;font-size: 18px;" class="fa fa-edit" aria-hidden="true"></i>
                                                         <span style="color: #52575C;">&nbspEdit</span></span>
                                                    </a>
                                                    <?php }else{ ?>
                                                    <a href=""  onclick="editPaymentHistory('<?= $paymentList['id'] ?>')" data-uk-modal="{target:'#edit_deposit'}" title="Edit"> 
                                                        <span class="infoIconSetting">
                                                         <i style=" color: #6D3745;font-size: 18px;" class="fa fa-edit" aria-hidden="true"></i>
                                                         <span style="color: #52575C;">&nbspEdit</span></span>
                                                    </a>
                                                    <?php } ?>
                                                    <a  href="#" onclick="deletePaymentHistoryByID('<?= $paymentList['id'];  ?>','<?= $paymentList['amount_type'];  ?>');"  title="Delete">
                                                        <span class="infoIconSetting">
                                                           <i style=" color: red;font-size: 20px;" class="material-icons btnDelete" style="color: red;">delete</i>
                                                         <span style="color: #52575C;">&nbspDelete</span></span>
                                                    </a>
                                                </td> -->

                                            <?php 
                                                $patientID = $singlePatient['pt_id'];
                                                $paymentID = $paymentList['id'];
                                                $photosID = $paymentList['photos_id'];
                                                $amountType = $paymentList['amount_type'];

                                                $patientData = $paymentList['patient_photos']; 
                                                $invoice = array_search('Invoice', array_column($patientData, 'key'));
                                            ?>
                                            <td  class="tblRow" style="padding: 20px 0px 20px 10px !important;">
                                                  <?php if($paymentList['amount_type'] == 'payment'){ ?>
                                                <a class="get-images" data-id="<?php echo $paymentID; ?>" data-type="invoice">
                                                    <span class="infoIconSetting">
                                                    <i style=" color: #6D3745;font-size: 20px;" class="material-icons btnDelete">visibility</i>
                                                    <span style="color: #6D3745;">&nbsp;View</span></span>
                                                </a> &nbsp;&nbsp;&nbsp;
                                                <?php } ?>

                                                <?php
                                                    if($amountType == 'payment'){
                                                        if($invoice != null || $invoice === 0){
                                                    ?>
                                                    <a  href="<?= site_url('doctor/payment/getdownloadPostFile/invoice_files/').$photosID; ?>" title="Download">
                                                        <span class="infoIconSetting">
                                                           <!-- <i style=" color: red;font-size: 20px;" class="material-icons btnDelete" style="color: red;">delete</i> -->
                                                        <span style="font-size: 22px;">
                                                            <img src="<?php echo site_url('assets/images/down-arrow.svg'); ?>" class="icon-download">
                                                        </span>
                                                         <span style="color: #52575C;">&nbspDownload</span></span>
                                                    </a>
                                                    <?php }else{ ?>
                                                    <a  href="" title="Empty" class="disabled">
                                                        <span class="infoIconSetting">
                                                           <!-- <i style=" color: red;font-size: 20px;" class="material-icons btnDelete" style="color: red;">delete</i> -->
                                                        <span style="font-size: 22px;">
                                                            <img src="<?php echo site_url('assets/images/down-arrow-grey.png'); ?>">
                                                        </span>
                                                         <span class="text-grey">&nbspEmpty</span></span>
                                                    </a>
                                                    <?php } ?>
                                                <?php } ?>
                                               
                                            </td>
                                           
                                        </tr>
                                            
                                            <?php endforeach; ?>
                                            
                                        </tbody>
                                    </table>
                                  </div>
                              </div>
</div>

                  </div>



                  </div>
               </div>
            </div>
         </div>


         <div class="uk-width-medium-1-4">
            <div class="uk-panel">

                <div class="payment-sec-l">
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-1">
                            <div class="sec-one">
                                <h3>Patient Name:</h3>
                                <p class="patient-name"><?= $singlePatient['pt_firstname']." ".$singlePatient['pt_lastname'] ?></p>

                                <h3>Age:</h3>
                                <p><?= $singlePatient['pt_age'] ?></p>

                                <h3>Gender:</h3>
                                <p><?= $singlePatient['pt_gender'] ?></p>
                            </div>
                        </div>

                         <div class="uk-width-medium-1-1">
                            <div class="sec-two">
                                <h5>Total Bill Amount:</h5>
                                <h1>INR <?= $singlePatient['pt_cost_plan'] ?></h1>
                            </div>
                        </div>


                         <div class="uk-width-medium-1-1">
                            <div class="sec-two">
                                <h5>Total Deposit Amount:</h5>
                                <h1>INR <?= $total_deposit_amount ?></h1>
                            </div>
                        </div>


                         <div class="uk-width-medium-1-1">
                            <div class="sec-two">
                                <h5>Due Amount:</h5>
                                <h1>INR <?= $singlePatient['pt_cost_plan']-$total_deposit_amount ?></h1>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
         </div>


      </div>

   </div>
</div>


<?php 
    
    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
    $patient_id =  $uriSegments[5];
?>
<!--ADD PAYMENT MODEL-->
<div class="uk-modal" id="add_payment">
    <div class="uk-modal-dialog" style="background-image:url('<?php echo base_url('assets/images/model-header-bg.png'); ?>'); background-repeat: no-repeat;">

        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h2><b>Add Payment</b></h2>
                    </div>
                </div>
                <div class="modal-body">

                    <form method="POST" action="<?= site_url('admin/Payment/addPayment'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="patient_id" value="<?= $patient_id; ?>">
                        <input type="hidden" name="amount_type" value="payment">
                        <input type="hidden" name="invoice_no" value="<?= $payment->invoice_no + 1 ?>">
                        <input type="hidden" name="pt_cost_plan" value="<?= $singlePatient['pt_cost_plan'] ?>">

                        <div class="uk-grid">
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <label for="exampleFormControlFile1" class="payment_amount_label"><b>Add Payment Amount</b></label>
                                    <input type="text" name="payment_amount" class="md-input payment_amount" value="" />
                                </div>
                            </div>

                             <div class="uk-width-medium-1-1" style="margin:30px 0px;">

                                      <input  name="invoice_files[]" accept="application/pdf" class="user_files_images" type="file" multiple="">


                                <!-- <div class="uk-grid">
                                    <div class="uk-width-medium-1-6">
                                    <img type="file" style="padding: 0px 19px;" src="<?php echo base_url('assets/images/up-arrow.png'); ?>">
                                        
                                    </div>
                                    <div class="uk-width-medium-5-6" style="padding:6px 0px;">
                                       <p><b>Upload File</b></p>
                                        
                                    </div>

                                </div> -->
                                


                             <!--  -->

                            </div>


                        </div>
                      <!--   <br>
                        <br> -->
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-1">
                                <input class="btnNext" type="submit" name="next" id="add_payment_done" value="Add" >

                            </div>

                            <div class="uk-width-medium-1-1">
                                <input class="btnBack uk-modal-close" type="button" name="back" id="back" value="Close">

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END ADD PAYMENT MODEL-->

<!--ADD DEPOSIT MODEL-->
<div class="uk-modal" id="add_deposit">
    <div class="uk-modal-dialog" style="background-image:url('<?php echo base_url('assets/images/model-header-bg.png'); ?>'); background-repeat: no-repeat;">

        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h2><b>Add Deposit</b></h2>
                    </div>
                </div>
                <div class="modal-body">

                    <form method="POST" action="<?= site_url('admin/Payment/addDeposit'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="patient_id" value="<?= $patient_id; ?>">
                        <input type="hidden" name="amount_type" value="deposit">
                        <input type="hidden" name="pt_amount_paid" value="<?= $singlePatient['pt_amount_paid'] ?>">

                        <div class="uk-grid">

                            <div class="uk-width-medium-1-1 deposit-type" style="margin:10px 0px;">
                                <label for="exampleFormControlFile1" class="deposit_amount_label"><b>Select Inovice No</b></label>
                                <div class="uk-button uk-form-select" data-uk-form-select style="width:100%; margin:5px 0px;" required>
                                    <span style="float: left;"></span>
                                    <i class="uk-icon-caret-down" style="float: right;"></i>
                                    <select name="invoice_no" required="">
                                            <option>Select Invoice No</option>
                                        <?php foreach($getAllPaymentList as $paymentList): 
                                            if($paymentList['amount_type'] == 'payment'){?>
                                            <option value="<?= $paymentList['invoice_no'] ?>"><?= $paymentList['invoice_no'] ?></option>
                                        <?php } endforeach; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <label for="exampleFormControlFile1" class="deposit_amount_label"><b>Add Deposit Amount</b></label>
                                    <input type="text" name="deposit_amount" class="md-input deposit_amount" value="" placeholder="Add Deposit Amount" />
                                </div>
                            </div>

                            <div class="uk-width-medium-1-1 deposit-type" style="margin:10px 0px;">
                                <label for="exampleFormControlFile1" class="deposit_amount_label"><b>Select Deposit Type</b></label>
                                <div class="uk-button uk-form-select" data-uk-form-select style="width:100%; margin:5px 0px;">
                                    <span style="float: left;"></span>
                                    <i class="uk-icon-caret-down" style="float: right;"></i>
                                    <select name="deposit_type">
                                        <option value="bank">Bank</option>
                                        <option value="cash">Cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                      <!--   <br>
                        <br> -->
                        <div class="uk-grid">
                           <div class="uk-width-medium-1-1">
                                <input class="btnNext" type="submit" name="next" id="add_payment_done" value="Add" >

                            </div>

                            <div class="uk-width-medium-1-1">
                                <input class="btnBack uk-modal-close" type="button" name="back" id="back" value="Close">

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END ADD DEPOSIT MODEL-->

<script type="text/javascript">
            var billAmount = <?= $singlePatient['pt_cost_plan'] ?>; 
           //submitting form
            $("#payemnt-search-form").submit(function (event) {

                // alert($("#payemnt-search-form").serialize());
                event.preventDefault();
                $.ajax({
                    url: "<?php echo base_url('doctor/Payment/searchDepositPayment'); ?>", //backend url
                    data: $("#payemnt-search-form").serialize(), //sending form data in a serialize way
                    type: "post",
                    async: false, //hold the next execution until the previous execution complete
                    dataType: 'json',
                    success: function (response) {

                       $('#dt_tableExport').find('tbody').empty();
                       $.each(response, function(key, value){
                        console.log(value); 
                        var invoice_no = Math.floor(Math.random() * 90000) + 10000;
                        $('#dt_tableExport').append('<tr> <td>' + value.deposit_date + '</td>  <td>' + invoice_no + '</td> <td>' + billAmount + '</td> <td>' + value.deposit_amount + '</td> <td>' + value.deposit_type + '</td> <td> N/A </td></tr>');
                        });
                    },
                    error: function ()
                    {
                        alert("error"); //error occurs
                    }
                });
            });
</script>
<!-- END Shipping Modal With Ajax Call -->

  <!-- Modal -->
        <div class="uk-modal uk-close-btn" id="images_modal">
            <div class="uk-modal-dialog ">
                <div class="uk-modal-header">
                    <h5 class="uk-modal-title">
                    <div class="img-preview-heading">
                    </div>
                    <button id="modal-close" class="uk-close uk-close-btn" style="font-size: 25px; float:right;top: 2%;right: 2%;position: absolute;" type="button" uk-close></button>
                    </h5>
                </div>
                <div class="modal-body" style="height :100%; overflow-y:auto;">
                    <div class="uk-grid" id="show_images">
                        <!--  <div  class="uk-width-medium-1-4" >
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    <!-- END Modal -->

  <script type="text/javascript">
         //For closing The Model
        $('#modal-close').click(function(){
        UIkit.modal('#images_modal').hide();
        });
              //Image Preview Model
        $('.get-images').on('click', function(e){
        e.preventDefault();
        var paymentID = $(this).data('id');
        var imageType = $(this).data('type');
        // var imageType = 'Intra Oral Images';
        var img_url = "<?php echo site_url();?>assets/uploads/images/";
        $.ajax({
        url:"<?php echo base_url();?>doctor/Payment/getPatientImagetype/",
        type: 'GET',
        data: {'id':paymentID, 'imageType':imageType},
        dataType: 'json',
        success: function(response) {
       console.log(response);
                $('#show_images').html('');
                $.each(response,function(index,data){
                    if(data['key'] == 'Intra Oral Images' ||data['key'] == 'OPG Images' ||data['key'] == 'Lateral C Images' ){
                        $('.img-preview-heading').text( "Intra Oral/ OPG/ Lateral C Images" );
                        $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                    }else if(data['key'] == 'Scans'){
                        $('.img-preview-heading').text( "Scans Images" );
                        $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                    }else if(data['key'] == 'Treatment Plan'){
                        $('.img-preview-heading').text( "Treatment Plan File" );
                        var html = '<div style="margin-top: 20px;"  class="uk-width-medium-3-6">'
                            html += '   <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1634213394583_50-0" data-fileindex="0" data-template="pdf" title="'+data['img']+'">'
                            html += '       <div class="kv-file-content">'
                            html += '           <embed class="kv-preview-data file-preview-pdf" src="'+img_url+data['img']+'" type="application/pdf" style="width:100%;height:160px;">'
                            html += '       </div>'
                            html += '       <div class="file-thumbnail-footer">'
                            html += '           <div class="file-footer-caption" title="'+data['img']+'">'
                            html += '               <div class="file-caption-info">'+data['img']+'</div>'
                            html += '               <div class="file-size-info"> <samp>(114.02 KB)</samp></div>'
                            html += '           </div>'   
                            html += '           <div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-plus-sign text-warning"></i></div>'
                            html += '           <div class="file-actions">'
                            html += '               <div class="file-footer-buttons">'
                            html += '                   <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>'
                            html += '               </div>'
                            html += '           </div>'
                            html += '           <div class="clearfix"></div>'
                            html += '       </div>'
                            html += '   </div>'
                            html += '</div>';
                        $('#show_images').append(html);
                        
                    }else if(data['key'] == 'IPR'){
                        $('.img-preview-heading').text( "IPR Images" );
                        $('#show_images').append('<div style="margin-top: 20px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                    }else if(data['key'] == 'Invoice'){
                        $('.img-preview-heading').text( "Invoice File" );
                        var html = '<div style="margin-top: 20px;"  class="uk-width-medium-3-6">'
                            html += '   <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1634213394583_50-0" data-fileindex="0" data-template="pdf" title="'+data['img']+'">'
                            html += '       <div class="kv-file-content">'
                            html += '           <embed class="kv-preview-data file-preview-pdf" src="'+img_url+data['img']+'" type="application/pdf" style="width:100%;height:160px;">'
                            html += '       </div>'
                            html += '       <div class="file-thumbnail-footer">'
                            html += '           <div class="file-footer-caption" title="'+data['img']+'">'
                            html += '               <div class="file-caption-info">'+data['img']+'</div>'
                            html += '               <div class="file-size-info"> <samp>(114.02 KB)</samp></div>'
                            html += '           </div>'   
                            html += '           <div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-plus-sign text-warning"></i></div>'
                            html += '           <div class="file-actions">'
                            html += '               <div class="file-footer-buttons">'
                            html += '                   <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>'
                            html += '               </div>'
                            html += '           </div>'
                            html += '           <div class="clearfix"></div>'
                            html += '       </div>'
                            html += '   </div>'
                            html += '</div>';
                        $('#show_images').append(html);
                    }
                    
                    UIkit.modal('#images_modal').show();
                    // location.reload(true);
                });
        },
        error: function () {
        alert('Data Not Deleted');
        }
        });
        });
    </script>
<!-- END Shipping Modal With Ajax Call -->
