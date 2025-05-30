<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard</title>
            <link href="public/css/bootstrap.css" rel="stylesheet">
            <link href="public/css/mystyle.css" rel="stylesheet">
            <link rel="stylesheet" href="public/css/font-awesome.min.css">

            <script src="public/js/jquery.min.js"></script>
            <script src="public/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="public/js/ajaxupload.3.5.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">

                <?php
                    if(isset($_SESSION["userId"]) && $_SESSION["sessionId"])
                    {
                    ?>
        <div class="header clearfix">
        <nav class="navbar navbar-default">
        <div class="container-fluid">
                        <div class="container-fluid">
                                                        <?php 
                echo '<ul class="nav nav-pills pull-right">
                <li role="button">'.$_SESSION["name"].
                '<a href="logout" style="display: inline;">Logout <i class="fa fa-sign-out"></i>
                </a></li></ul>'; ?>
                        </div>
                <?php 
                if(isset($_SESSION["role"]) && $_SESSION["role"]=="admin"){

                    echo '<h4><a href="../" target=_blank>WEB SITE </a>';
                    echo '  &#187 <a href="./">Start Admin</a>';
                    echo '  &#187 <a href="servicesList">Services</a>';
                    echo '  &#187 <a href="mastersList">Masters</a>';
                    echo '  &#187 <a href="appointmentsList">Appointments</a>';
                    
                    echo ' </h4>';
                } else {
                    echo '<h4>You have no rights!</h4>';
                }
                ?>

            </div>
            </nav>
            </div>
                <?php
                }
                ?>

            <div id="content" style="paddint-top: 20px; ">

                    <?php echo $content; ?>

          </div>
          <footer class="footer">
            <p>&copy; 2025 Design Admin Dashboard<i class="fa fa-child"></i></p>
          </footer>
        </div>
    </body>
</html>