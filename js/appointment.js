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