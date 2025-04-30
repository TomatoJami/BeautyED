<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">
    <h2>Master Add </h2>
    <?php
    if (isset($test)) {
        if ($test == true) {
?>            
        <div class="alert alert-info">
            <strong>Entry added. </strong><a href="mastersList">Masters list</a>
        </div>
        <?php
        }

        else if ($test == false) {
            ?>
            <div class="alert alert-warning">
                <strong>Error adding entry!</strong><a href="mastersList">Masters list</a>
            </div>
        <?php
        }
    }
    else {
        ?>
        <form method="POST" action="masterAddResult" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Master name</td>
                    <td><input type="text" name="name" class="form-control" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="save">
                            <span class="glyphicon glyphicon-plus"></span> Save
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