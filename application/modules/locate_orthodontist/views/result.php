
<div class="table-responsive">
    <table class="table text-left">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Clinic Name</th>
                <th>Doctor Name</th>
                <th>Speciality</th>
                <th>Address</th>
                <th>City</th>
                <th>Pincode</th>
                <th>Mobile</th>
                <th>Email</th>

            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($search as $s){?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $s->clinic_name?></td>
                    <td><?php echo $s->first_name." ".$s->middle_name." ".$s->last_name?></td>
                    <td><?php echo $s->speciality ?></td>
                    <td><?php echo $s->address ?></td>
                    <td><?php echo $s->city ?></td>
                    <td><?php echo $s->pincode ?></td>
                    <td><?php echo $s->mobile?></td>
                    <td><?php echo $s->email ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <?php if(count($search)<=0){?>
        <h4>No Orthodontist Available</h4>
    <?php }?>
</div>