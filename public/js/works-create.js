        document.addEventListener('DOMContentLoaded', (event) => {
            const customerSelect = document.getElementById('customer');
            const openVehicleModalBtn = document.getElementById('openVehicleModal');

            // Hide button initially if no customer is selected
            openVehicleModalBtn.style.display = customerSelect.value ? 'inline' : 'none';

            // Toggle button visibility based on customer selection
            customerSelect.addEventListener('change', function() {
                openVehicleModalBtn.style.display = this.value ? 'inline' : 'none';
            });
        });
        document.addEventListener('DOMContentLoaded', (event) => {
            console.log('DOM fully loaded and parsed');

            const customerSelect = document.getElementById('customer');
            const vehicleSelect = document.getElementById('vehicle');
            const openVehicleModalBtn = document.getElementById('openVehicleModal');
            const closeVehicleModalBtn = document.getElementById('closeVehicleModal');
            const saveVehicleBtn = document.getElementById('saveVehicle');
            const vehicleModal = document.getElementById('vehicleModal');
            const newVehicleForm = document.getElementById('newVehicleForm');
            const toast = document.getElementById('toast');

            // Open modal
            openVehicleModalBtn.addEventListener('click', () => {
                vehicleModal.classList.remove('hidden');
            });

            // Close modal
            closeVehicleModalBtn.addEventListener('click', () => {
                vehicleModal.classList.add('hidden');
            });

            // Save new vehicle
            saveVehicleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const formData = new FormData(newVehicleForm);
                formData.append('customer_id', customerSelect.value);

                fetch('/vehicles', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(vehicleData => {
                        if (vehicleData.success) {
                            // Add new vehicle to the dropdown
                            const option = document.createElement('option');
                            option.value = vehicleData.vehicle.id;
                            option.textContent =
                                `${vehicleData.vehicle.make} ${vehicleData.vehicle.model} (${vehicleData.vehicle.year})`;
                            vehicleSelect.appendChild(option);
                            vehicleSelect.value = vehicleData.vehicle.id;

                            // Close modal and reset form
                            vehicleModal.classList.add('hidden');
                            newVehicleForm.reset();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Vehicle Alert: ' + vehicleData.message);
                    })
                    .finally(() => {
                        // Ensure modal closes and form resets in case of error as well
                        vehicleModal.classList.add('hidden');
                        newVehicleForm.reset();
                    });
            });

            // Existing customer change event listener
            customerSelect.addEventListener('change', function() {
                var customerId = this.value;
                document.getElementById('modal-title').innerText =
                    `Create A New Vehicle ${this.options[this.selectedIndex].text}`;

                if (customerId) {
                    fetch(`/get-vehicles?customer_id=${customerId}`)
                        .then(response => response.json())
                        .then(data => {
                            vehicleSelect.innerHTML = '<option value="">Select a vehicle</option>';
                            data.forEach(vehicle => {
                                var option = document.createElement('option');
                                option.value = vehicle.id;
                                option.textContent =
                                    `${vehicle.make} ${vehicle.model} (${vehicle.year})`;
                                vehicleSelect.appendChild(option);
                            });
                            vehicleSelect.disabled = false;
                        });
                } else {
                    vehicleSelect.innerHTML = '<option value="">Select a vehicle</option>';
                    vehicleSelect.disabled = true;
                }
            });

            // Initialize vehicleSelect as disabled
            vehicleSelect.disabled = true;
        });
