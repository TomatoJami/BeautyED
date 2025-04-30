<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">

    <h2>Appointment Add </h2>
    <?php
    if (isset($test)) {
        if ($test == true) {
?>            
        <div class="alert alert-info">
            <strong>Entry added. </strong><a href="appointmentsList"> Appointments list</a>
        </div>
        <?php
        }

        else if ($test == false) {
            ?>
            <div class="alert alert-warning">
                <strong>Error adding entry!</strong><a href="appointmentsList"> Appointments list</a>
            </div>
        <?php
        }
    }
    else {
        ?>
        <form method="POST" action="appointmentAddResult" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Appointment user</td>
                    <td>
                        <select name="idUser" class="form-control" >
                            <?php
                                foreach($arr_users as $row) {
                                    echo '<option value="'.$row['user_id'].'">'.$row['username'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Appointment service</td>
                    <td>
                        <select name="idService" class="form-control" >
                            <?php
                                foreach($arr_services as $row) {
                                    echo '<option value="'.$row['service_id'].'">'.$row['service'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Appointment master</td>
                    <td>
                        <select name="idMaster" class="form-control" >
                            <?php
                                foreach($arr_masters as $row) {
                                    echo '<option value="'.$row['master_id'].'">'.$row['master'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Appointment date</td>
                    <td><input type="date" name="date" class="form-control" required>
                    <select name="time" class="form-control" required>
                        <option value="">Select time</option>
                        <?php
                        $start_hour = 10;
                        $end_hour = 19;

                        for ($hour = $start_hour; $hour <= $end_hour; $hour++) {
                            foreach ([0, 30] as $minute) {
                                $time = sprintf("%02d:%02d", $hour, $minute);
                                echo "<option value=\"$time\">$time</option>";
                            }
                        }
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="save">
                            <span class="glyphicon glyphicon-plus"></span> Save
                        </button>
                        <a href="appointmentsList" class="btn btn-large btn-success">
                            <i class="glyphicon glyphicon-backward"></i> &nbsp;Back to list
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>