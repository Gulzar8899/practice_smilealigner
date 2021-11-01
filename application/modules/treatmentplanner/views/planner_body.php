   
   <style>
       body::-webkit-scrollbar {
    width: 1em;
}

body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
   </style>
    <div id="page_content">
        <div id="page_content_inner" style="margin-top: 10px;">
            <br> <br>
            <h1 class="heading_a headingSize uk-margin-bottom patientMobile" style="text-align: center;"><b>Treatment Planner Dashboard</b></h1>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            $('.clickme').on('click',function(){
                $id = $(this).attr('data-id');
                $.ajax({
                                    url: '<?php echo base_url(); ?>doctor/update_status',
                                    method: 'POST',
                                    data: {
                                        'document_id': $id
                                    },
                                    success: function(remote_response) {
                                        console.log(remote_response);
                                    }
                                });
               
            })
        })
    </script>