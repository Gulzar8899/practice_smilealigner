<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<style type="text/css">
    .box-drag-drop-heading{
        /*border: 1px solid #e6e6e6;*/
        margin: 0px;
        padding: 20px;
        /*border-radius: 15px 15px 0px 0px;*/
    }

    .box-drag-drop-box-bg{
        border: 1px solid #e6e6e6;
        border-radius: 15px;
    }

    .box-choose-file{
        color: white;
        padding: 10px 20px;
        background-color: #07B32E;
        border-radius: 8px;
    }

    .file_drag_area_bottom{
        background-color: rgba(109, 55, 69, 0.15);
        border-radius: 0px 0px 14px 14px;
        padding: 20px;
    }

    .file_drag_area  
   {  
        border-top: 1px solid #e6e6e6;
        /* border-radius: 15px 15px 0px 0px; */
        /* width: 600px; */
        height: 400px;
        /* border: 2px #ccc; */
        line-height: 400px;
        text-align: center;
        font-size: 24px;
   }  
   .file_drag_over{  
        color:#000;  
        border-color:#000;  
   }  

   .browse-file{
        padding: 10px 35px;
        background-color: #07B32E;
        border-radius: 8px;
        color: white;
        box-shadow: none;
        border: 0px;
   }

   .upload-stl-bg{
        background-color: #F5F5F5;
        padding: 20px;
        border-radius: 9px;
   }

</style>
 <style type="text/css">

.custom-input-radio-btn {
    -webkit-appearance: none;
    height: 27px;
    width: 15%;
    border-radius: 50%;
    outline: none;
    border: 1px solid #A0A4A8;
}
.custom-input-radio-btn:before {
    content: '';
    display: block;
    width: 100%;
    height: 100%;
    /* margin: 20% auto; */
    border-radius: 50%;
    background-color: white;
}
.custom-input-radio-btn:checked {
    border-color: #56BB6D;
}

.custom-input-radio-btn:checked:before {
    width: 60%;
    height: 60%;
    background: #56BB6D;
    margin: 20% auto;
}
</style>


<div id="page_content">
    <div id="page_content_inner" class="page_content-p">
        <br>
        <br>
        <h1 class="heading_b headingSize uk-margin-bottom patientMobile"><b>Add New Scan</b></h1>
        <br />            
        


    <form method="POST" action="<?= site_url('doctor/submitScan'); ?>" enctype="multipart/form-data">

        <input type="hidden" id="patientID" name="patientID">

        <div class="uk-grid">
            <div class="uk-width-medium-1-2">
                   <div class="md-input-wrapper">
                        <label class="label-p" for="scan_title"><b>Title</b><span class="req">*</span></label>
                        <input type="text" name="scan_title" id="scan_title" class="md-input demoInputBox input-border" placeholder="Title" style="border-radius: 0px !important;">
                        <span class="md-input-bar"></span>
                   </div>
            </div>
        </div>

        <div class="uk-grid">
            <div class="uk-width-medium-1-2">
                  <div class="uk-form-row parsley-row scanImpression">
                    <div class="uk-flex">
                        <span class="uk-flex uk-flex-middle">
                            <input style="height: 20px; width:20px;" class="custom-input-radio-btn" type="radio" name="scan_type" value="individual" id="individual">
                            <label for="individual">&nbsp;&nbsp;Individual</label>&nbsp;&nbsp;&nbsp;
                        </span>
                       <span class="uk-flex uk-flex-middle">
                            <input style="height: 20px; width:20px;" class="custom-input-radio-btn"  type="radio" name="scan_type" value="composite" id="composite">
                        <label for="composite">&nbsp;&nbsp;Composite</label>
                       </span>
                    </div>

                </div>
            </div>
        </div>

        <div id="show_individual" style="display:none;">
            Individual
        </div>

        <div id="show_composite" style="display:none;">
            composite
        </div>

        <div class="uk-grid">
            <div class="uk-width-medium-1-1 uk-margin-medium-bottom">
                <h3>Images Intra Oral</h3>
            </div>


            <div class="uk-width-medium-1-5">
                <img class="border-radius-15p" src="<?php echo base_url('assets/images/img_5.jpg');  ?>">
            </div>
            <div class="uk-width-medium-1-5">
                <img class="border-radius-15p" src="<?php echo base_url('assets/images/img_5.jpg');  ?>">
            </div>
            <div class="uk-width-medium-1-5">
                <img class="border-radius-15p" src="<?php echo base_url('assets/images/img_5.jpg');  ?>">
            </div>
 
            <div class="uk-width-medium-2-5">

                    <div class="box-drag-drop-box-bg" style="padding: 42px 22px;">
                        <div class="uk-grid" style="position:relative;">
                            <div class="uk-width-medium-3-5">
                                <div data-type="intra_file" ondrop="upload_file(event)" ondragover="return false">
                                    <input id="drop_intra_file" name="drop_intra_file[]" class="" type="file" multiple="" style="display: none;" >
                                    <img src="<?php  echo base_url('assets/images/drag-image-icon.svg'); ?>">
                                    <p>Drag & Drop Your Files Here</p>
                                </div>
                            </div>
                            <div class="uk-width-medium-2-5">
                                  <div class="image-upload uk-flex uk-flex-center">
                                    <label for="intra_file" class="uk-flex">
                                        <span class="browse browse-file" data-select-type="intra_file" onclick="file_explorer(event);" style="margin-top:2px;margin-left:5px;padding: 10px 15px; position: absolute; bottom: 0; right: 0;">Choose File</span>
                                    </label>

                                    <input id="intra_file" name="intra_file[]" class="" type="file" multiple="" style="display: none;" >
                                </div>
                            </div>
                        </div>
                    </div>

            </div> 


        </div>


        <div class="uk-grid">
            <div class="uk-width-medium-1-2">
                <div class="box-drag-drop-box-bg">
                
                    
                        <div data-type="stl_file" ondrop="upload_file(event)"  ondragover="return false">
                            <h3 class="box-drag-drop-heading text-center">Upload File</h3>
                            <div class="file_drag_area">
                                 <img src="<?php echo base_url('assets/images/upload-drag-drop-icon.svg'); ?>">
                            </div>
                            <input id="drop_stl_file" name="drop_stl_file[]" class="" type="file" multiple="" style="display: none;" > 
                         </div>

                        <div class="image-upload file_drag_area_bottom uk-flex uk-flex-center">
                            <label for="selectfile" class="uk-flex">
                                <span class="browse browse-file" data-select-type="stl_file" onclick="file_explorer(event);" style="margin-top:2px;margin-left:5px;">Choose File</span>
                            </label>

                            <input id="stl_file" name="stl_file[]" class="" type="file" multiple="" style="display: none;" >
                        </div>
                    
               
                </div>
            </div>
        </div>
         <div id="uploaded_file">
        </div>



        <div class="uk-width-1-1">
            <input style="float: right;margin-right: 10px;height:40px;" class="md-btn md-btn-primary btnNext" type="submit" name="next" id="next" value="Create">
        </div>
    </form>
          

    </div>
</div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 


<script type="text/javascript">

    $(document).ready(function(){
     
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='scan_type']:checked").val();

          // alert(radioValue);

            if(radioValue == 'individual'){
                $('#show_composite').hide();
                $('#show_individual').show();
            }else if(radioValue == 'composite'){
                $('#show_individual').hide();
                $('#show_composite').show();
            }
          
        });
   
    });
</script>
        

<<!-- script type="text/javascript">
    
function displayRadioValue() {
    // alert();

        if($('#individual').prop('checked') == true){
        alert('individual is checked');
        //do something
    }
    else
    { 
        alert('checkbox is checked');
    }
    if ($('#composite').prop('checked') == true) {
    alert('composite is checked');
    }   
}


</script> -->

 <script>  

    $(document).ready(function () {
        resetForms();
    });

    function resetForms() {
        for (i = 0; i < document.forms.length; i++) {
            document.forms[i].reset();
        }
    }

    var fileobj;
    function upload_file(e) {
        
        e.preventDefault();

        var type = e.target.getAttribute("data-type");
        alert(type);

        var form_data = new FormData();
        var files_list = e.dataTransfer.files;  

        

        if(type == 'intra_file'){
            var drop_intra_file = document.getElementById('drop_intra_file');
            drop_intra_file.files = e.dataTransfer.files;
        }

        if(type == 'stl_file'){
            var stl_file = document.getElementById('drop_stl_file');
            stl_file.files = e.dataTransfer.files;
        }

        //here you can get all files
        // var scan_file = document.getElementById('dropSelectfile');
        // scan_file.files = e.dataTransfer.files;

        for (var i=0; i< files_list.length;i++){
          form_data.append('file[]', files_list[i]);
        }
        
        ajax_file_upload(form_data, type);
    }

    function file_explorer(e) {

        var type = e.target.getAttribute("data-select-type");
        // alert(type);

        var form_data = new FormData();
        
        if(type == 'stl_file'){

            document.getElementById('stl_file').onchange = function() {
            for (var i=0; i< this.files.length;i++){
                form_data.append('file[]', document.getElementById('stl_file').files[i]);
                // console.log(fileobj.name);
            }
                ajax_file_upload(form_data);
            };

        }else if(type == 'intra_file'){
             document.getElementById('intra_file').onchange = function() {
            for (var i=0; i< this.files.length;i++){
                form_data.append('file[]', document.getElementById('intra_file').files[i]);
                // console.log(fileobj.name);
            }
                ajax_file_upload(form_data);
            };
        }
        
    }


    function ajax_file_upload(form_data, type) {
        if(form_data != undefined) {
        
          $.ajax({

            type: 'POST',
            url: 'upload',
            contentType: false,
            processData: false,
            data: form_data,

            success:function(data) {
              //alert(response);
              console.log(data);
                $('#uploaded_file').append(data); 

                // var file_name = $('#file_name').text();
                // $('#scan_file').val(file_name);
                // console.log(patientID);

                // $('#selectfile').val();
              // $(".success").html(response);
              // $('#selectfile').val('');
              // $('.myFiles').load(document.URL +  ' .myFiles');

            }

          });
        }
    }




 // $(document).ready(function(){  
 //      $('.file_drag_area').on('dragover', function(){  
 //           $(this).addClass('file_drag_over');  
 //           return false;  
 //      });  
 //      $('.file_drag_area').on('dragleave', function(){  
 //           $(this).removeClass('file_drag_over');  
 //           return false;  
 //      });  
 //      $('.file_drag_area').on('drop', function(e){  
 //           e.preventDefault();  
 //           $(this).removeClass('file_drag_over');  
 //           var formData = new FormData();  
 //           var files_list = e.originalEvent.dataTransfer.files;  
 //           //console.log(files_list);  
 //           // alert(files_list);
 //           // alert(base_url+"doctor/upload/");
 //           for(var i=0; i<files_list.length; i++)  
 //           {  
 //                formData.append('file[]', files_list[i]);  
 //           }  
 //           console.log(formData);  
 //           $.ajax({  
 //                url: "upload",  
 //                method:"POST",  
 //                data:formData,  
 //                contentType:false,  
 //                cache: false,  
 //                processData: false,  
 //                success:function(data){  
 //                     $('#uploaded_file').append(data);  
 //                }  
 //           })  
 //      });  
 // });  

 // // // PDF FILE UPLOAD
 //    $(document).ready(function(e) {


 //        $("#scan_files").change(function(e){
          
 //            e.preventDefault();
 //            var fileName = e.target.files[0].name;
 //            var file_data = $('#scan_files').prop('files')[0];   
 //            var form_data = new FormData();                  
 //            form_data.append('file', file_data);

 //           //  for(var i=0; i<file_data.length; i++)  
 //           // {  
 //           //      form_data.append('file[]', file_data[i]);  
 //           // }  

 //           alert(form_data);
 //            $.ajax({                
 //                type: "POST",
 //                url: base_url+"doctor/document/upload",
 //                data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
 //                contentType: false, // The content type used when sending data to the server.
 //                cache: false, // To unable request pages to be cached
 //                processData: false, // To send DOMDocument or non processed data file it is set to false
 //                success: function(data) {
 //                    $('#uploaded_file').append(data);  

 //                },
 //                error: function(data) {
 //                    $("#msg").html(
 //                    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong.</div>'
 //                    );
 //                }
 //            });
 //        });
 //    });

 </script>  
