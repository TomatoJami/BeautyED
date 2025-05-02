<?php ob_start() ?>

<h2>Appointments List</h2>

<div class="container" style="min-height:400px;">
    <div style="margin:20px;">
        <a class="btn btn-primary" href="appointmentAdd" role="button">Add appointment</a>
    </div>
    <div class="col-md-11">
        <table class="table table-bordered table-responsive">
            <tr>
                <th width="10%">ID</th>
                <th width="70%">Appointment Data</th>
                <th width="20%"></th>
            </tr>

            <?php

        foreach($arr as $row) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td><b>User: </b> '.$row['username'].'<br>';
            echo '<b>Service: </b><i>'.$row['servicename'].'</i><br>';
            echo '<b>Master: </b><i>'.$row['mastername'].'</i><br>';
            echo '<b>Date: </b><i>'.$row['dateTime'].'</i></td>';
            echo '<td>
                    <a href="appointmentEdit?id='.$row['id'].'" class="btn btn-sm btn-primary">Edit</a> 
                    <a href="appointmentDelete?id='.$row['id'].'" class="btn btn-sm btn-danger">Delete</a>
                </td>';
            echo '</tr>';
        }


        ?>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php"; ?>