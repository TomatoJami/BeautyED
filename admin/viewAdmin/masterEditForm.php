<?php ob_start(); ?>

<div class='content' style="min-height:400px;">
<div class='col-md-11'>
    <h2>Master Edit </h2>
<?php
    if(isset($test)) {
        if($test==true) {
?>
        <div class='alert alert-info'>
            <strong>Entry changed. </strong><a href="mastersList"> Master list</a>
        </div>
<?php
        } else if($test==false) {
?>
        <div class="alert alert-warning">
            <strong>Record modification error! </strong><a href="mastersList"> Master list</a>
        </div>
<?php
        }
    } else {
?>
        <form method="POST" action="masterEditResult?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Master name in english</td>
                    <td><input type="text" name="eng_name" class="form-control" required value="<?php echo $detail['eng_name']; ?>"></td>
                </tr>
                <tr>
                    <td>Master name in russian</td>
                    <td><input type="text" name="rus_name" class="form-control" required value="<?php echo $detail['rus_name']; ?>"></td>
                </tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="save">
                            <span class="glyphicon glyphicon-plus"></span> Change
                        </button>
                        <a href="mastersList" class="btn btn-large btn-success">
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