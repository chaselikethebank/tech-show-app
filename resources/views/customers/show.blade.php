<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div id="success-message" class="px-8 pt-3 mx-auto transition-opacity max-w-7xl duration-3000">
            <div class="px-4 py-2 text-green-600 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="p-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="flex mt-4 text-indigo-500 no-underline ">
                <a href="{{ route('customers.index', $customer) }}" class="mr-4 text-blue-500  flex items-center">
                    <x-arrow />
                    <span>Back to All Customers</span>

                </a>
            </div>

            <div class="space-y-6 py-3"></div>

            <!-- Display Customer Information -->
            <div
                class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center mb-4">
                    <div class="relative flex-shrink-0 w-16 h-16">
                        <!-- Status Indicator Circle -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-16 h-16 rounded-full opacity-75
                                {{ match ($work->status ?? '') {
                                    'estimate' => 'bg-gray-500',
                                    'sent_estimate' => 'bg-blue-500',
                                    'unassigned' => 'bg-gray-400',
                                    'assigned' => 'bg-yellow-500',
                                    'inProgress' => 'bg-yellow-400',
                                    'pending' => 'bg-orange-500',
                                    'done' => 'bg-green-500',
                                    'edit_request' => 'bg-gray-600',
                                    'sublet' => 'bg-blue-400',
                                    'recall' => 'bg-red-500',
                                    default => 'bg-gray-300',
                                } }}">
                            </div>
                        </div>
                        <!-- Profile Image Placeholder -->
                        <div class="w-12 h-12 overflow-hidden bg-gray-200 rounded-full dark:bg-gray-700">
                            <svg class="w-12 h-12 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" fill="currentColor" />
                            </svg>
                        </div>
                    </div>

                    <div class="ml-4">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $customer->name }}</h2>
                        <div class="text-blue-500 dark:text-blue-400">
                            <p>
                                <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a>
                            </p>
                            <p>
                                <a href="tel:{{ $customer->phone }}" class="ml-2">{{ $customer->phone }}</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Address and Contact Information -->
                <div class="mb-4 text-gray-600 dark:text-gray-400">
                    <p class="font-medium">Address:</p>
                    <p>{{ $customer->address }}</p>
                    <p>{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</p>
                    <p>{{ $customer->country }}</p>

                    <p class="mt-2 font-medium">Company:</p>
                    <p>{{ $customer->company }}</p>

                    <p class="mt-2 font-medium">Notes:</p>
                    <p>{{ $customer->notes }}</p>
                </div>

                <!-- Timestamp Information -->
                <div class="mb-4 text-gray-500 dark:text-gray-400">
                    <p class="font-medium">Created At:</p>
                    <p>{{ $customer->created_at }}</p>
                    @if ($customer->updated_at)
                        <p class="mt-2 font-medium">Updated At:</p>
                        <p>{{ $customer->updated_at }}</p>
                    @endif
                </div>

                <!-- Action Links -->
                <div class="flex mt-4 text-indigo-500 no-underline">
                    <a href="{{ route('customers.edit', $customer) }}" class="text-green-300 flex">
                        Edit
                        <x-arrow />
                    </a>
                </div>



            </div>
            <!-- Vehicles -->
            <div class="">
                <span class="flex">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-white">{{ $customer->name }}'s
                        Vehicles
                        <button type="button" id="openVehicleModal"
                            class="px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            + Create New Vehicle +
                        </button>

                        {{-- MODAL START --}}
                        {{-- <x-vehicle-modal :customerName="$customer->name" /> --}}
                        <div id="vehicleModal" class="fixed inset-0 z-10 hidden overflow-y-auto"
                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div
                                class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                                    aria-hidden="true"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">&#8203;</span>
                                <div
                                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                            Create A New Vehicle {{ $customer->name }}
                                        </h3>
                                        <div class="mt-2">
                                            <form id="newVehicleForm" method="post">
                                                @csrf
                                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                    <div>
                                                        <label for="make"
                                                            class="block text-sm font-medium text-gray-700">Make</label>
                                                        <input type="text" name="make" id="make"
                                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                    </div>
                                                    <div>
                                                        <label for="model"
                                                            class="block text-sm font-medium text-gray-700">Model</label>
                                                        <input type="text" name="model" id="model"
                                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                    </div>
                                                    <div>
                                                        <label for="year"
                                                            class="block text-sm font-medium text-gray-700">Year</label>
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
                        {{-- MODAL END --}}
                        {{-- TOAST  --}}
                        <div id="toast"
                            class="fixed top-0 right-0 m-4 px-4 py-2 bg-green-500 text-white rounded-md hidden">Vehicle
                            added successfully!</div>
                        {{-- TOAST END --}}
                        <script>
                            document.addEventListener('DOMContentLoaded', (event) => {
                                const openVehicleModalBtn = document.getElementById('openVehicleModal');
                                const closeVehicleModalBtn = document.getElementById('closeVehicleModal');
                                const saveVehicleBtn = document.getElementById('saveVehicle');
                                const vehicleModal = document.getElementById('vehicleModal');
                                const newVehicleForm = document.getElementById('newVehicleForm');
                                const toast = document.getElementById('toast');

                                openVehicleModalBtn.addEventListener('click', () => {
                                    vehicleModal.classList.remove('hidden');
                                });

                                closeVehicleModalBtn.addEventListener('click', () => {
                                    vehicleModal.classList.add('hidden');
                                });

                                saveVehicleBtn.addEventListener('click', (e) => {
                                    e.preventDefault();
                                    const formData = new FormData(newVehicleForm);
                                    formData.append('customer_id', {{ $customer->id }});

                                    fetch("{{ route('works.store.vehicle', $customer->id) }}", {
                                            method: 'POST',
                                            body: formData,
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                    .getAttribute('content'),
                                                'Accept': 'application/json'
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(vehicleData => {
                                            if (vehicleData.success) {
                                                vehicleModal.classList.add('hidden');
                                                newVehicleForm.reset();
                                            }
                                        })
                                        .catch(error => console.error('Error:', error))
                                        .finally(() => {
                                            vehicleModal.classList.add('hidden');
                                            newVehicleForm.reset();
                                        });
                                });
                            });
                        </script>
                    </h2>
                </span>
                @foreach ($vehicles as $vehicle)
                    <x-vehicle :vehicle="$vehicle" />
                @endforeach
            </div>

        </div>

    </div>

</x-app-layout>
