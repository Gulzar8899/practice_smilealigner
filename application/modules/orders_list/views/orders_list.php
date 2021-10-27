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
<!--<div class="banner" data-section="home" style="background: #eee;color:black">
    <div class="page_name">ORDERS LIST</div>
    <div class="function_name">SMILE ALIGNERS > ORDER LIST</div>
</div>-->

<div class="container text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <h1>My Orders List</h1>
    <div id="view_orders_list" class="">
        <div class="row margin0" style="padding-top: 10px">
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
                            <div>UNIQUE ID</div>
                        </th>
                        <th>
                            <div>ORDER DATE</div>
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
                    <tbody>
                    <?php $i=1; foreach($orders as $order){ ?>
                        <tr id="<?php echo $order->unique_id; ?>">
                            <td>
                                <div><?php echo  $i++;?></div>
                            </td>
                            <td>
                                <div><?php echo $order->unique_id; ?></div>
                            </td>
                            <td>
                                <div><?php echo date("m-d-Y h:i", strtotime($order->created_at))?></div>
                            </td>
                            <td>
                                <div><?php echo $order->first_name." ".$order->middle_name." ".$order->last_name?></div>
                            </td>
                            <td>
                                <div><?php echo $order->city; ?></div>
                            </td>
                            <td>
                                <div><?php echo $order->status; ?></div>
                            </td>
                            <td>
                                <div class="text-right">
                                    <button class="column_button show_order_details" style="font-size: 14px;
    letter-spacing: 1px;
    border: 1px solid;">VIEW DETAILS</button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
<script>

    $(document).on("click",".show_order_details",function(){
        $(".loader_div").show();
        $.ajax({
            url:url+"orders_list/get_question_answers",
            type:"post",
            data:{unique_id:$(this).closest("tr").attr("id")},
            dataType:"JSON",
            success:function(data){
                $(".loader_div").hide();
                if(data.success){
                    $("#order_view_details .modal-body").html(data.value)
                    $("#order_view_details").modal("show");
                }else{
                    alert("Something went wrong");
                }
            },error:function(e){
                $(".loader_div").hide();
            }
        })
    });
</script>