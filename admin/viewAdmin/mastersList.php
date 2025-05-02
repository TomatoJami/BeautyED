<?php ob_start() ?>

<h2>Masters List</h2>

<div class="container" style="min-height:400px;">
    <div style="margin:20px;">
        <a class="btn btn-primary" href="masterAdd" role="button">Add master</a>
    </div>
    <div class="col-md-11">
        <table class="table table-bordered table-responsive">
            <tr>
                <th width="10%">ID</th>
                <th width="70%">Master Name</th>
                <th width="20%"></th>
            </tr>

            <?php

        foreach($arr as $row) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td><b>Name: </b> '.$row['name'].'<br>';
            echo '<td>
                    <a href="masterEdit?id='.$row['id'].'" class="btn btn-sm btn-primary">Edit</a> 
                    <a href="masterDelete?id='.$row['id'].'" class="btn btn-sm btn-danger">Delete</a>
                </td>';
            echo '</tr>';
        }


        ?>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php"; ?>