function deleteDoctorByID(recordID) 
{   
    // alert(recordID);
        w3_warning('Are you sure?', recordID, 'users', 'admin/doctor/deleteDoctorByID');
    
}
function deletePlannerByID(recordID) 
{   
        w3_warning('Are you sure?', recordID, 'users', 'admin/treatmentplanner/deletePlannerByID');
    
}
function deleteDeveloperByID(recordID) 
{   
        w3_warning('Are you sure?', recordID, 'users', 'admin/businessdeveloper/deleteDeveloperByID');
    
}

function deletePaymentHistoryByID(recordID, type) 
{   
    // alert(type);
    if(type == 'payment'){
        w3_warning('Are you sure?', recordID, 'payments', 'admin/Payment/deletePaymentHistoryByID');

    }else{
        w3_warning('Are you sure?', recordID, 'payments', 'admin/Payment/deleteDepositPaymentHistoryByID');

    }
    
}

function deleteShippingAddressByID(recordID) 
{   
    // alert(recordID);
    // $('#edit-shipping-model').hide();
    w3_warning('Are you sure?', recordID, 'shipping_address', 'admin/doctor/deleteShippingAddress');
    
}


function deleteDoctorShippingAddressByID(recordID) 
{   
    // alert(recordID);
    // $('#edit-shipping-model').hide();
    w3_warning('Are you sure?', recordID, 'shipping_address', 'doctor/deleteShippingAddress');
    
}


function deleteTreatmentAddressByID(recordID) 
{   
    // alert(recordID);
    // $('#edit-shipping-model').hide();
    w3_warning('Are you sure?', recordID, 'shipping_address', 'admin/Treatmentplanner/deleteTreatmentAddress');
    
}

function deletePatientByID(recordID) 
{

    // w3_warning('Are you sure?', recordID, 'patients', 'admin/patient/deletePatientByID');
    sweetAlertConformation(function(confirm)
    {
        if(confirm)
        {
            var table_name = 'patients';
            $.ajax({
                type : "post",
                url  : site_url + "admin/patient/deletePatientByID",
                data : {
                   recordID: recordID,table_name:table_name
                },
                beforeSend: function() {
                    $(".btnDelete").append('<i class="fa fa-spinner fa-spin">');
                    $(".btnDelete").attr("disabled",true);
                },
                success   : function(r)
                {
                    var r = JSON.parse(r);
                    if(r.type.trim() == "error")
                    {
                        $(".btnDelete").attr("disabled",false);
                    }
                    showSweetAlertPatient(r.type, r.message);
                }
           });
        }
    }, "You want to delete record");
}
function deleteDocumentByID(recordID) 
{
    w3_warning('Are you sure?', recordID, 'documents', 'admin/document/deleteDocumentByID');
    /*sweetAlertConformation(function(confirm)
    {
        if(confirm)
        {
            var table_name = 'documents';
            $.ajax({
                type : "post",
                url  : site_url + "admin/document/deleteDocumentByID",
                data : {
                   recordID: recordID,table_name:table_name
                },
                beforeSend: function() {
                    $(".btnDelete").append('<i class="fa fa-spinner fa-spin">');
                    $(".btnDelete").attr("disabled",true);
                },
                success   : function(r)
                {
                    var r = JSON.parse(r);
                    if(r.type.trim() == "error")
                    {
                        $(".btnDelete").attr("disabled",false);
                    }
                    showSweetAlert(r.type, r.message);
                }
           });
        }
    }, "You want to delete record");*/
}


//w3 popup function
function w3_alert(title, icon, type, color = '#56BB6D'){
    jQuery('.w3-popup').remove();
    var btn_func = '';
    if(type == 'delete'){
        btn_func = 'onClick="window.location.reload();"';
    }
    if(icon == "tick-green"){
        icons = '<lottie-player src="https://assets3.lottiefiles.com/packages/lf20_kwaiqmk8.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"    autoplay></lottie-player>';
    }else if(icon == "tick-red"){
        icons = '<lottie-player src="https://assets3.lottiefiles.com/packages/lf20_FkPtfD.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"    autoplay></lottie-player>';
    }else{
        color = "#FF6565";
        icons = '<lottie-player src="https://assets1.lottiefiles.com/packages/lf20_PLsXq6.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"    autoplay></lottie-player>';
    }
    var w3popup_html = '<div class="w3-popup"><div class="w3-popupbox"><div class="w3-popup-head"><h1>'+title+'</h1></div> <div class="w3-popup-body">'+icons+'</div><div class="w3-popup-footer"><button id="close-w3popup" style="background-color: '+color+'" '+btn_func+'>Done</button></div></div></div>';
    jQuery('body').append(w3popup_html);
    
}

jQuery(document).on('click', '#close-w3popup', function(){
    jQuery('.w3-popup').remove();
});


function w3_warning(title, id, table, url){
    jQuery('.w3-popup').remove();
    btn_func = 'onClick="w3_delete_record(true, '+id+', \''+table+'\', \''+url+'\')"';
    var w3popup_html = '<div class="w3-popup"><div class="w3-popupbox"><div class="w3-popup-head"><h1>'+title+'</h1></div> <div class="w3-popup-body"><img src="http://smilealigners.in/assets/images/delete.svg"></div><div class="w3-popup-footer"><button id="close-w3popup" style="background-color: #FF0000" '+btn_func+'>Yes</button><button id="close-w3popup" style="background-color: #6D3745">No</button></div></div></div>';
    jQuery('body').append(w3popup_html);
}

function w3_delete_record(confirm, id , table = '', url = ''){
    
    // alert(site_url + url);

    // console.log(site_url + "admin/document/deleteDocumentByID"+'(('+table+'))))))');
    
    var recordID = id;
    if(confirm === true)
        {
            
            var table_name = table;
            $.ajax({
                type : "post",
                url  : site_url + url,
                data : {
                   recordID: recordID,table_name:table_name
                },
                beforeSend: function() {
                    $(".btnDelete").append('<i class="fa fa-spinner fa-spin">');
                    $(".btnDelete").attr("disabled",true);
                },
                success   : function(r)
                {
                    console.log('==='+r);
                    var r = JSON.parse(r);
                    if(r.type.trim() == "error")
                    {
                        $(".btnDelete").attr("disabled",false);
                    }
                    w3_alert(r.message, 'tick-red', 'delete', '#FF6565');
                }
           });
        }
}