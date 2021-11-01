<?php $i = $start_id;
foreach ($orders as $order) { ?>
    <tr id="<?php echo $order->unique_id; ?>">
        <td>
            <div>
                <?php echo $i-- ; ?>
            </div>
        </td>
        <td>
            <div>
                <?php echo date('d/m/Y', strtotime($order->created_at))  ?>
            </div>
        </td>
        <td>
            <div><?php echo $order->first_name . " " . $order->middle_name . " " . $order->last_name ?></div>
        </td>
        <td>
            <div><?php echo $order->city; ?></div>
        </td>
        <td>
            <div>
                <select class="change_status">
                    <option selected <?php echo($order->status == "Order Received" ? "selected" : ""); ?>
                        value="Order Received">Order Received
                    </option>
                    <option <?php echo($order->status == "Processing" ? "selected" : ""); echo "selected"; ?>
                        value="Processing">Processing
                    </option>
                    <option <?php echo($order->status == "Dispatched" ? "selected" : ""); ?>
                        value="Dispatched">Dispatched
                    </option>
                    <option <?php echo($order->status == "Delivered" ? "selected" : ""); ?>
                        value="Delivered">Delivered
                    </option>
                </select>
            </div>
        </td>
        <td>
            <div>
                <button class="column_button show_order_details">VIEW DETAILS
                </button>
            </div>
        </td>
    </tr>
<?php } ?>