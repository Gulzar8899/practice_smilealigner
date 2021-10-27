<?php $i = $start_id;
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