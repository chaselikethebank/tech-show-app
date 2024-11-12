<!-- resources/views/works/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-100">
            {{ __('Works') }}
        </h2>
    </x-slot>
    <div class="p-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden   shadow-xl   sm:rounded-lg">
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- @php
                          dump($vehicles);
                    @endphp --}}
                    </h3>
                    <form action="{{ route('works.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div
                            class="
                       {{-- grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 --}}
                        space-y-6
                       ">
                            <!-- Form Inputs -->
                            <div class="space-y-4">

                                <div class="flex justify-between">
                                    <label for="customer"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Customer
                                    </label>
                                </div>
                                <select name="customer" id="customer"
                                    class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                    <option value="">Select a customer</option>

                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div>
                                    <label for="vehicle"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select
                                        Vehicle
                                        <button type="button" id="openVehicleModal"
                                            class="px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                            {{ !$customers->isEmpty() ? '' : 'hidden' }}>
                                            + Create New Vehicle +
                                        </button>
                                    </label>
                                    <select name="vehicle" id="vehicle"
                                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                        <option value="">Select a vehicle</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="status"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                    <select name="status" id="status"
                                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-start mt-6 mb-5 space-x-4">
                            <button type="submit" class='pb-4'>
                                <x-link-with-arrow :route="'dashboard'" type="button">
                                    Create Workflow
                                </x-link-with-arrow>
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Vehicle Modal -->
    <div id="vehicleModal" class="fixed inset-0 z-10 hidden overflow-y-auto" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                        Create A New Vehicle {{ $customer->name }}
                    </h3>
                    <div class="mt-2">
                        <form id="newVehicleForm" method="post" action="{{ route('works.store.vehicle') }}">
                            @csrf
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="make" class="block text-sm font-medium text-gray-700">Make</label>
                                    <input type="text" name="make" id="make"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                                    <input type="text" name="model" id="model"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                                    <input type="number" name="year" id="year"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="saveVehicle"
                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                    </button>
                    <button type="button" id="closeVehicleModal"
                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log('DOM fully loaded and parsed');

        const customerSelect = document.getElementById('customer');
        const vehicleSelect = document.getElementById('vehicle');
        const openVehicleModalBtn = document.getElementById('openVehicleModal');
        const closeVehicleModalBtn = document.getElementById('closeVehicleModal');
        const saveVehicleBtn = document.getElementById('saveVehicle');
        const vehicleModal = document.getElementById('vehicleModal');
        const newVehicleForm = document.getElementById('newVehicleForm');

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
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
                    option.textContent = `${vehicleData.vehicle.make} ${vehicleData.vehicle.model} (${vehicleData.vehicle.year})`;
                    vehicleSelect.appendChild(option);
                    vehicleSelect.value = vehicleData.vehicle.id;

                    // Close modal and reset form
                    vehicleModal.classList.add('hidden');
                    newVehicleForm.reset();
                } else {
                    alert('Vehicle Alert: ' + vehicleData.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
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
            document.getElementById('modal-title').innerText = `Create A New Vehicle ${this.options[this.selectedIndex].text}`;

            if (customerId) {
                fetch(`/get-vehicles?customer_id=${customerId}`)
                    .then(response => response.json())
                    .then(data => {
                        vehicleSelect.innerHTML = '<option value="">Select a vehicle</option>';
                        data.forEach(vehicle => {
                            var option = document.createElement('option');
                            option.value = vehicle.id;
                            option.textContent = `${vehicle.make} ${vehicle.model} (${vehicle.year})`;
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
</script>


</x-app-layout>


{{-- <div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer
        Approval</label>
    <div class="flex items-center space-x-4">
        <div>
            <input type="radio" value="1" name="customer_approval" id="customer_approval_yes"
                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
            <label for="customer_approval_yes" class="ml-2 text-gray-700 dark:text-gray-300">Yes</label>
        </div>
        <div>
            <input type="radio" value="0" name="customer_approval" id="customer_approval_no" checked
                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
            <label for="customer_approval_no" class="ml-2 text-gray-700 dark:text-gray-300">No</label>
        </div>
    </div>

    <div>
        <label for="technician"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Technician</label>
        <select name="technician" id="technician"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
            <option value="">Technician</option>
            <!-- Add technician options here -->
        </select>
    </div>

    <div>
        <label for="description"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
        <textarea name="description" id="description" rows="3" wire:model='description'
            class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white"
            placeholder="What is to be done?"></textarea>
    </div>

    <div>
        <label for="scheduled_at"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Scheduled
            At</label>
        <input type="datetime-local" name="scheduled_at" id="scheduled_at"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
    </div>

    <div>
        <label for="started_at"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Started
            At</label>
        <input type="datetime-local" name="started_at" id="started_at"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
    </div>

    <div>
        <label for="completed_at"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Completed
            At</label>
        <input type="datetime-local" name="completed_at" id="completed_at"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
    </div>

    <div>
        <label for="estimated_cost"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estimated
            Cost</label>
        <input type="number" name="estimated_cost" id="estimated_cost"
            class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
    </div>

    <div>
        <label for="final_cost"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Final
            Cost</label>
        <input type="number" name="final_cost" id="final_cost"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
    </div>
</div>
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Turnaround
        Time</label>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div>
            <label for="turnaround_weeks"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Weeks</label>
            <input type="number" name="turnaround_weeks" id="turnaround_weeks"
                class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
        </div>
        <div>
            <label for="turnaround_days"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Days</label>
            <input type="number" name="turnaround_days" id="turnaround_days"
                class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
        </div>
        <div>
            <label for="turnaround_hours"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hours</label>
            <input type="number" name="turnaround_hours" id="turnaround_hours"
                class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
        </div>
    </div>
</div>

<div class="space-y-4">
    <div>
        <label for="notes"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
        <textarea name="notes" id="notes"
            class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white"
            placeholder="What is special about this?"></textarea>
    </div>

    <div>
        <label for="recall_notes"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Recall
            Notes</label>

        <textarea name="recall_notes" id="recall_notes"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Recal notes</textarea>
    </div>


    <label for="customer_feedback"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer
        Feedback</label>
    <textarea name="customer_feedback" id="customer_feedback"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Customer Feedback</textarea>
</div>

<div>
    <label for="service_description"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service
        Description</label>
    <textarea name="service_description" id="service_description"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Service Description</textarea>
</div>

<div>
    <label for="service_duration"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estimated
        Labor (Hours)</label>
    <input type="number" name="service_duration" id="service_duration"
        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
</div>

<div>
    <label for="additional_costs"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Additional
        Costs</label>
    <textarea name="additional_costs" id="additional_costs"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" placeholder="Additional Costs"></textarea>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quality
        Assurance Check Performed</label>
    <div class="flex items-center space-x-4">
        <div>
            <input type="radio" value="1" name="quality_assurance_check"
                id="quality_assurance_check_yes"
                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
            <label for="quality_assurance_check_yes" class="ml-2">Yes</label>
        </div>
        <div>
            <input type="radio" value="0" name="quality_assurance_check"
                id="quality_assurance_check_no" checked
                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
            <label for="quality_assurance_check_no" class="ml-2">No</label>
        </div>
    </div>
</div>

<div>
    <label for="post_service_follow_up"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Post Service
        Follow Up</label>
    <input type="datetime-local" name="post_service_follow_up" id="post_service_follow_up"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
</div>

<div>
    <label for="service_warranty"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service
        Warranty</label>
    <textarea name="service_warranty" id="service_warranty"
        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white"
        placeholder="Additional Costs"></textarea>
</div>

<div>
    <label for="customer_signature_image"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer
        Signature Image</label>
    <input type="file" name="customer_signature_image" id="customer_signature_image"
        class="block w-full mt-1 text-gray-700 border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:text-gray-300" />
</div>

<div>
    <label for="service_photos"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service
        Photos</label>
    <textarea name="service_photos" id="service_photos"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Service Photos links</textarea>
</div>

<div>
    <label for="referral_source"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Referral
        Source</label>
    <textarea name="referral_source" id="referral_source"
        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">Referral Source</textarea>
</div>

<div>
    <label for="follow_up_actions"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Follow Up
        Actions</label>
    <select name="follow_up_actions" id="follow_up_actions"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
        <option value="none">None</option>
        <option value="call">Call</option>
        <option value="email">Email</option>
        <option value="text">Text</option>
    </select>
</div>


--}}



{{--
<div>
        <label for="color"
            class="block text-sm font-medium text-gray-700">Color</label>
        <input type="text" name="color" id="color"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>
    <div>
        <label for="vin" class="block text-sm font-medium text-gray-700">VIN</label>
        <input type="text" name="vin" id="vin"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>
    <div>
        <label for="license_plate" class="block text-sm font-medium text-gray-700">License
            Plate</label>
        <input type="text" name="license_plate" id="license_plate"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>
</div>
<div class="mt-4">
    <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
    <textarea name="notes" id="notes" rows="3"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
</div>
 --}}
