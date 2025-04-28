<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='public/account.css' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <div class="d-md-flex ms-3">
            <a href="./"><img style="width: 40px; height: 40px; object-fit: contain;" src="images/back.png" alt=""></a>
        </div>
        
        <div class="container-sm p-5 bg-white rounded-3 container-account" style="width: 50%;">
            <?php
            echo '<h1 class="text-center">Hello, '.$_SESSION["name"].'</h1>';
            echo '<p class="text-center">Mail: '.$_SESSION["email"].'</p>';
            echo '<p class="text-center">Phone: '.$_SESSION["phone"].'</p>';
            ?>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <a href="accountEditForm.php" class="btn btn-warning text-white me-2">Change data</a>
                <a href="accountDeleteForm.php" class="btn btn-danger me-2">Delete account</a>
            </div>
            <h3 class="mt-4 text-center">Your appointments</h3>
            <?php 
            if (empty($arr)) {
                echo '<p class="text-center">No appointments found</p>';
            } else {
                foreach($arr as $value) {
                    echo '<div class="appointment-item d-flex justify-content-between align-items-center mb-3   ">';
                    echo '<div class="appointment-details">';
                    echo '<p><strong>Service:</strong> '.$value['service_name'].'</p>';
                    echo '<p><strong>Master:</strong> '.$value['master_name'].'</p>';
                    echo '<p><strong>Date & Time:</strong> '.$value['dateTime'].'</p>';
                    echo '</div>';
                    echo '<form method="POST" action="account.php">';
                    echo '<input type="hidden" name="appointment_id" value="' . $value['appointment_id'] . '">';
                    echo '<button type="submit" class="btn btn-danger" name="delete_appointment">Delete</button>';
                    echo '</form>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <footer class="footer mt-auto text-center text-lg-start text-white bg-dark ">
            <div class="container p-3 pb-0">
                <section class="">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="mb-4 font-weight-bold">
                                BeautyED
                            </h6>
                            <p>
                                A leading premium beauty salon
                                right from the heart of Paris!
                            </p>
                            <a href="/BeautyEd/" style="color: white;">Website</a>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <h6 class="text-uppercase font-weight-bold">NARVA</h6>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p><i class="fas fa-home mr-3"></i> Astri Keskus Tallinna mnt 41, Narva 3. korrus</p>
                                    <p><i class="fas fa-phone mr-3"></i> +372 6555272</p>
                                </div>
                                <div class="col-6">
                                    <p><i class="fas fa-envelope mr-3"></i> narva@beautyed.ee</p>
                                    <p><i class="fas fa-print mr-3"></i> LAHTIOLEKUAJAD: E-L: 10:00 — 20:00 P: 10:00 — 18:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> 
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
