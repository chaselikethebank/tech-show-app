@php
    // Retrieve all works from the database
    $works = App\Models\Work::all();
@endphp

<!DOCTYPE html>
<html>
<head>
    <title>Works List</title>
</head>
<body>


    @if($works->isEmpty())
        <p>No works available.</p>
    @else
        <!-- Container for the grid layout -->
        <div class="grid grid-cols-1 gap-3 p-3 bg-gray-200 bg-opacity-25 dark:bg-gray-800 md:grid-cols-3 lg:gap-8 lg:p-8">

            <!-- Start of the Estimates section -->
            <div>
                <div class="flex items-center">
                    <!-- SVG icon for Estimates -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                        <polygon points="12,2 2,22 22,22" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-900 ms-3 dark:text-white">
                        <a href="https://laracasts.com">Estimates</a>
                    </h2>
                </div>
                <!-- Iterate over works and display estimates -->
                @foreach($works as $work)
                    <p class="mt-4 leading-relaxed text-gray-500 ptext-sm dark:text-gray-400">
                        {{ $work->description }}
                        <x-link-with-arrow :route="'parts.create'">
                            Push to work order
                        </x-link-with-arrow>
                    </p>
                @endforeach
                <hr class="my-3" />
                <x-link-with-arrow :route="'parts.create'" class="my-3">
                    Build new estimate
                </x-link-with-arrow>
            </div>
            <!-- End of the Estimates section -->

            <!-- Start of the Work Orders section -->
            <div>
                <div class="flex items-center">
                    <!-- SVG icon for Work Orders -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-900 ms-3 dark:text-white">
                        <a href="https://laracasts.com">Work Orders</a>
                    </h2>
                </div>
                <!-- Displaying works with colored indicators -->
                @foreach($works as $work)
                    <div class="flex items-center mt-4">
                        <!-- Color indicator based on work status -->
                        <div class="w-4 h-4 {{ $work->status_color }} rounded-full">
                        </div>
                        <p class="ml-1 leading-relaxed text-gray-500 text-based dark:text-gray-400">
                            {{ $work->vehicle_description }}
                        </p>
                        <!-- Placeholder for Tech's Name and Create invoice link -->
                        <a href="/" class="ml-6 text-gray-500 text-based dark:text-gray-400">Technician: {{ $work->tech->name ?? 'Unknown' }}</a>
                        <br />
                        <x-link-with-arrow class="ml-6" :route="'parts.create'">
                            Create invoice
                        </x-link-with-arrow>
                    </div>
                @endforeach
                <div class="mt-4">
                    <hr class="my-3" />
                    <x-link-with-arrow :route="'parts.create'">
                        Something else?
                    </x-link-with-arrow>
                </div>
            </div>
            <!-- End of the Work Orders section -->

            <!-- Start of the Pending Payment section -->
            <div>
                <div class="flex items-center">
                    <!-- SVG icon for Pending Payment -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                        <rect x="4" y="4" width="16" height="16" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-900 ms-3 dark:text-white">
                        <a href="https://laracasts.com">Pending Payment</a>
                    </h2>
                </div>
                <!-- Display pending payment details -->
                @foreach($works as $work)
                    @if($work->pending_payment)
                        <div>
                            <p class="mt-4 leading-relaxed text-gray-200 text-md dark:text-gray-200">
                                ${{ $work->pending_amount }} <br />
                            </p>
                            <p class="text-gray-500 eading-relaxed ptext-sm dark:text-gray-400">
                                {{ $work->description }} <br />
                                <x-link-with-arrow :route="'parts.create'">
                                    View invoice
                                </x-link-with-arrow>
                            </p>
                        </div>
                    @endif
                @endforeach
                <div class="mt-4">
                    <hr class="my-3" />
                    <x-link-with-arrow :route="'parts.create'">
                        View all paid invoices
                    </x-link-with-arrow>
                </div>
            </div>
            <!-- End of the Pending Payment section -->

        </div>
    @endif
</body>
</html>
