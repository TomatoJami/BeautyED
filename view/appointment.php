<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="public/appointment.css" rel="stylesheet"/>
</head>
<body>
    <div class="back-button d-md-flex ms-3">
        <a href="./"><img style="width: 40px; height: 40px;" src="images/back.png" alt=""></a>
    </div>
    <div class="d-flex flex-column min-vh-100">
        <div class="container-sm p-5 bg-white" style="width: 50%;">
            <h1 class="text-center">BeautyED</h1>
            <form method="POST" action='' id="appointment-form">
                <h3 class="mt-4 text-center">Choose specialist</h3>
                <div id="masters">
                <?php 
                if (empty($arrMasters)) {
                    echo '<p class="text-center">No specialist found</p>';
                } else {
                    foreach($arrMasters as $value) {
                        echo '<div class="appointment-item d-flex justify-content-between align-items-center mb-3">';
                        echo '<div class="appointment-details">';
                        echo '<p><strong>Master:</strong> '.$value['master_name'].'</p>';
                        echo '</div>';
                        echo '<button type="button" class="circle-btn btn-time" data-master-id="' . $value['master_id'] . '"></button>';
                        echo '</div>';
                    }
                }
                ?>
            </div>

            <h3 class="mt-4 text-center">Select date and time</h3>
            <input type="date" name="appointment_date" id="date-picker" required class="form-control mb-3" style="width: 80%; margin: 0 auto;">
            <select name="appointment_time" id="appointment_time" required class="form-control mb-3" style="width: 80%; margin: 0 auto;">
                <option value="">Select time</option>
            </select>

            <h3 class="mt-4 text-center">Select service</h3>
            <div id="services">
                <?php 
                if (empty($arrServices)) {
                    echo '<p class="text-center">No services found</p>';
                } else {
                    foreach($arrServices as $value) {
                        echo '<div class="appointment-item d-flex justify-content-between align-items-center mb-3">';
                        echo '<div class="appointment-details">';
                        echo '<p><strong>Service:</strong> '.$value['name'].'</p>';
                        echo '<p><strong>Price:</strong> '.$value['price'].'</p>';
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
                <button type="submit" class="btn btn-success" name="save">Confirm Appointment</button>
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
    </footer>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const masterButtons = document.querySelectorAll("[data-master-id]");
    const serviceButtons = document.querySelectorAll("[data-service-id]");
    const form = document.getElementById("appointment-form");
    const datePicker = document.getElementById("date-picker");
    const appointmentTimeSelect = document.getElementById("appointment_time");

    const today = new Date().toISOString().split('T')[0];
    datePicker.min = today;

    masterButtons.forEach((button) => {
        button.addEventListener("click", function () {
            masterButtons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");

            document.getElementById("master_id").value = this.dataset.masterId;

            appointmentTimeSelect.innerHTML = '<option value="">Select time</option>';

            if (datePicker.value) {
                loadAvailableTimes();
            }
        });
    });

    serviceButtons.forEach((button) => {
        button.addEventListener("click", function () {
            serviceButtons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");

            document.getElementById("service_id").value = this.dataset.serviceId;
        });
    });

    datePicker.addEventListener("change", function () {
        appointmentTimeSelect.innerHTML = '<option value="">Select time</option>';
        loadAvailableTimes();
    });

    function loadAvailableTimes() {
        const masterId = document.getElementById("master_id").value;
        const date = datePicker.value;

        if (!masterId || !date) return;

        fetch(`getAvaiableTimes.php?master_id=${masterId}&date=${date}`)
            .then(response => response.json())
            .then(times => {
                appointmentTimeSelect.innerHTML = '';
                if (times.length === 0) {
                    appointmentTimeSelect.innerHTML = '<option>No available times</option>';
                    return;
                }
                times.forEach(time => {
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    appointmentTimeSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching available times:', error);
            });
    }

    form.addEventListener("submit", function (event) {
        const date = datePicker.value;
        const time = appointmentTimeSelect.value;
        const masterId = document.getElementById("master_id").value;
        const serviceId = document.getElementById("service_id").value;

        if (!masterId || !serviceId || !date || !time) {
            event.preventDefault();
            alert("Please select a master, a service, date, and time.");
        }
    });
});

</script>

</body>
</html>
