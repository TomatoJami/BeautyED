<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="public/appointment.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body">
            <div class="container-fluid">
                <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mynavbar"
                aria-controls="mynavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto d-flex align-items-center">
                        <li class="nav-item">
                            <h3><a class="text-black text-decoration-none" href="./">BeautyED</a></h3>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="feedback"><?= $t['feedback'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacts"><?= $t['contacts'] ?></a>
                        </li>
                        <?php
                        if (isset($_SESSION['sessionId'])) {
                            if ($_SESSION['role'] == 'admin') {
                                echo '<li class="nav-item">';
                                echo    '<a class="nav-link" href="admin/">' . $t['adminpanel'] . '</a>';
                                echo '</li>';
                            }
                        }
                        ?>
                    </ul>
                    <ul class="navbar-nav d-flex align-items-center">
                        <?php
                        if (isset($_SESSION['sessionId'])) {
                            if ($lang == 'en') {
                                echo '<a href="?lang=rus" class="me-2">';
                                echo    '<img src="images/russianflag.jpg" alt="Russian" style="width:30px; height:20px;" />';
                                echo '</a>';
                            } else {
                                echo '<a href="?lang=en" class="me-2">';
                                echo    '<img src="images/americanflag.jpg" alt="English" style="width:30px; height:20px;" />';
                                echo '</a>';
                            }                           
                            echo '<a class="me-2" href="account"><img style="width: 40px; height: 40px; border-radius: 50%;" src="images/avatar.jpg" class="profile-image"></a>';
                            echo '<form action="logout" method="POST" style="display: inline;">
                                    <button type="submit" class="btn btn-outline-dark me-2">' . $t['logout'] . '</button>
                                 </form>';
                        } else {
                            if ($lang == 'en') {
                                echo '<a href="?lang=rus" class="me-2">';
                                echo    '<img src="images/russianflag.jpg" alt="Русский" style="width:30px; height:20px;" />';
                                echo '</a>';
                            } else {
                                echo '<a href="?lang=en" class="me-2">';
                                echo    '<img src="images/americanflag.jpg" alt="English" style="width:30px; height:20px;" />';
                                echo '</a>';
                            }                            
                            echo '<a href="login" class="btn btn-outline-dark me-2 buttons-nav">' . $t['login'] . '</a>';
                            echo '<a href="register" class="btn btn btn-dark me-2 buttons-nav">' . $t['register'] . '</a>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="d-flex flex-column min-vh-100">
        <div class="appointment-container container-sm">
            <h1 class="text-center">BeautyED</h1>
            <form method="POST" action='' id="appointment-form">
                <h3 class="mt-4 text-center"><?= $t['chooseSpecialist'] ?></h3>
                <div id="masters">
                    <?php 
                    if (empty($arrMasters)) {
                        echo '<p class="text-center">'.$t['specialistFound'].'</p>';
                    } else {
                        foreach($arrMasters as $value) {
                            echo '<div class="appointment-item d-flex justify-content-between align-items-center mb-3">';
                            echo '<div class="appointment-details">';
                            echo '<p><strong>' . $t['master'] . ':</strong> '.$value['master_name'].'</p>';
                            echo '</div>';
                            echo '<button type="button" class="circle-btn btn-time" data-master-id="' . $value['master_id'] . '"></button>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>

                <h3 class="mt-4 text-center"><?= $t['selectDateAndTime'] ?></h3>
                
                <input type="date" name="appointment_date" autocomplete="off" readonly id="date-picker" class="form-control mb-3" placeholder="<?= $t['selectDate'] ?>"/>

                <select name="appointment_time" id="appointment_time" required class="form-control mb-3">
                    <option value=""><?= $t['selectTime'] ?></option>
                </select>

                <h3 class="mt-4 text-center"><?= $t['selectService'] ?></h3>
                <div id="services">
                    <?php 
                    if (empty($arrServices)) {
                        echo '<p class="text-center">' . $t['serviceFound'] . '</p>';
                    } else {
                        foreach($arrServices as $value) {
                            echo '<div class="appointment-item d-flex justify-content-between align-items-center mb-3">';
                            echo '<div class="appointment-details">';
                            echo '<p><strong>' . $t['service'] . ':</strong> '.$value['name'].'</p>';
                            echo '<p><strong>' . $t['price'] . ':</strong> '.$value['price'].'</p>';
                            echo '</div>';
                            echo '<button type="button" class="circle-btn btn-time" data-service-id="' . $value['service_id'] . '"></button>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>

                <input type="hidden" name="master_id" id="master_id" />
                <input type="hidden" name="service_id" id="service_id" />

                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-success" name="save"><?= $t['confirmAppointment'] ?></button>
                </div>
            </form>
        </div>
    </div>

    <footer class="text-center text-lg-start text-white bg-dark">
        <div class="container p-3 pb-0">
            <section class="">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="mb-4 font-weight-bold">
                        BeautyED
                        </h6>
                        <p>
                            <?= $t['content'] ?>
                        </p>
                        <a href="" style="color: white;"><?= $t['website'] ?></a>
                    </div>

                    <hr class="w-100 clearfix d-md-none" />

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <h6 class="text-uppercase font-weight-bold"><?= $t['narva'] ?></h6>
                        </div>
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fas fa-home mr-3"></i> <?= $t['adress'] ?></p>
                            <p><i class="fas fa-phone mr-3"></i> +372 6555272</p>
                        </div>
                        <div class="col-6">
                            <p><i class="fas fa-envelope mr-3"></i> narva@beautyed.ee</p>
                            <p><i class="fas fa-print mr-3"></i>  <?= $t['opening_hours'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    </footer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="js/appointment.js"></script>
    <script>
        flatpickr("#date-picker", {
            minDate: "today",
            dateFormat: "Y-m-d",
            allowInput: true,
        });
    </script>
</body>
</html>
