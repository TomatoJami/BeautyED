<?php ob_start(); ?>

<div class='content' style="min-height:400px;">
<div class='col-md-11'>
    <h2>Appointment Delete </h2>
<?php
    if(isset($test)) {
        if($test==true) {
?>
        <div class='alert alert-info'>
            <strong>Entry deleted. </strong><a href="appointmentsList"> Appointments list</a>
        </div>
<?php
        } else if($test==false) {
?>
        <div class="alert alert-warning">
            <strong>Error deleting entry! </strong><a href="appointmentsList"> Appointments list</a>
        </div>
<?php
        }
    } else {
?>
        <form method="POST" action="appointmentDeleteResult?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <table class="table table-bordered">
            <tr>
                <td>Appointment user</td>
                <td><textarea type="text" name="user_id" class="form-control" required readonly ><?php echo $detail['username']; ?></textarea></td>
            </tr>
            </tr>
            <tr>
                <td>Appointment service</td>
                <td>
                    <select name="idService" class="form-control" disabled>
                        <?php
                            foreach($arr_services as $row) {
                                echo '<option value="'.$row['service_id'].'"';
                                    if($row['service_id']==$detail['service_id']) echo 'selected';
                                echo '>'.$row['service'].'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Appointment master</td>
                <td>
                    <select name="idMaster" class="form-control" disabled>
                        <?php
                            foreach($arr_masters as $row) {
                                echo '<option value="'.$row['master_id'].'"';
                                    if($row['master_id']==$detail['master_id']) echo 'selected';
                                echo '>'.$row['master'].'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Appointment date</td>
                <td><textarea type="text" name="dateTime" class="form-control" required readonly><?php echo $detail['dateTime']; ?></textarea></td>
            </tr>
            <tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="save">
                        <span class="glyphicon glyphicon-plus"></span> Delete
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