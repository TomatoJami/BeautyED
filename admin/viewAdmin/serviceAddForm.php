<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">

    <h2>Service Add </h2>
    <?php
    if (isset($test)) {
        if ($test == true) {
?>            
        <div class="alert alert-info">
            <strong>Entry added. </strong><a href="servicesList">Services list</a>
        </div>
        <?php
        }

        else if ($test == false) {
            ?>
            <div class="alert alert-warning">
                <strong>Error adding entry!</strong><a href="servicesList">Services list</a>
            </div>
        <?php
        }
    }
    else {
        ?>
        <form method="POST" action="serviceAddResult" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Service name in english</td>
                    <td><input type="text" name="eng_name" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Service name in russian</td>
                    <td><input type="text" name="rus_name" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Service description in english</td>
                    <td><textarea rows="5" name="eng_description" class="form-control" required></textarea></td>
                </tr>
                <tr>
                    <td>Service description in russian</td>
                    <td><textarea rows="5" name="rus_description" class="form-control" required></textarea></td>
                </tr>
                <tr>
                    <td>Service price</td>
                    <td><textarea type="text" name="price" class="form-control" required></textarea></td>
                </tr>
                <tr>
                    <td>Service type</td>
                    <td>
                        <select name="idServiceType" class="form-control" required>
                            <?php
                                foreach($arr as $row) {
                                    echo '<option value="'.$row['id'].'">'.$row['eng_type'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="save">
                            <span class="glyphicon glyphicon-plus"></span> Save
                        </button>
                        <a href="servicesList" class="btn btn-large btn-success">
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