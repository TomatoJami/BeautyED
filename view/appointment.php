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
    <div class="back-button d-md-flex ms-3">
        <a href="./"><img style="width: 40px; height: 40px;" src="images/back.png" alt=""></a>
    </div>
    <div class="d-flex flex-column min-vh-100">
        <div class="container-sm p-5 bg-white" style="width: 50%;">
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
                
                <input type="date" name="appointment_date" id="date-picker" class="form-control mb-3" style="width: 80%; margin: 0 auto" placeholder="<?= $t['selectDate'] ?>"/>
                <select name="appointment_time" id="appointment_time" required class="form-control mb-3" style="width: 80%; margin: 0 auto;">
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

                <div class="text-center">
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
