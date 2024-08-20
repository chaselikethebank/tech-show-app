<?php use App\Helpers\StatusHelper; ?>

@if ($works->isEmpty())
    <p>No works available.</p>
@else
    <!-- Container for the grid layout -->
    <livewire:work-modal/>
    <div
        class="grid grid-cols-1 gap-3 p-3 bg-gray-200 bg-opacity-25 dark:bg-gray-800 md:grid-cols-3 lg:gap-8 lg:p-8">

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
            @foreach ($works as $work)
                <div class="flex items-center mt-4">
                    <div
                        class="w-4 h-4 rounded-full {{ match ($work->status) {
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

                    <p class="ml-1 leading-relaxed text-gray-500 text-based dark:text-gray-400">
                        {{ $work->customer->name ?? 'Unknown Customer' }}

                    </p>
                </div>
                <p class="ml-6 text-gray-500 ml- text-based dark:text-gray-400">
                {{$work->customer->phone ?? 'Unknown Phone'}}<br/>
                {{$work->customer->email ?? 'Unknown Email'}}<br/>
                    {{ $work->vehicle->year ?? 'Unknown Year' }}
                    {{ $work->vehicle->model ?? 'Unknown Vehicle' }}
                    {{ $work->vehicle->make ?? 'Unknown Make' }}<br/>
                    LP#: {{ $work->vehicle->license_plate ?? 'Unknown License Plate' }}<br/>
                    {{ $work->description }}<br/>
                    {{ $work->scheduled_at }}<br/>
                    Tech: {{ $work->tech->name ?? 'Unknown Technician' }}<br/>
                <div
                    class="p-2 {{ match ($work->status) {
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
                    {{ StatusHelper::getStatusLabel($work->status) }}
                </div>


                <!-- Conditional actions based on $work->status -->

                @if ($work->status === 'estimate')
                    <x-link-with-arrow :route="'estimate.create'" class="mt-2">
                        Send Estimate
                    </x-link-with-arrow>
                @elseif ($work->status === 'unassigned')
                    <x-link-with-arrow :route="'assign.technician'" class="mt-2">
                        Assign Technician
                    </x-link-with-arrow>
                @elseif ($work->status === 'edit_request')
                    <x-link-with-arrow :route="'edit.estimate'" class="mt-2">
                        Edit Estimate
                    </x-link-with-arrow>
                @endif
                </p>
            @endforeach
            <hr class="my-3" />
            <x-link-with-arrow :route="'works.create'" class="my-3">
                Start new Work Order
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
            @foreach ($works as $work)
                <div class="flex items-center mt-4">
                    <!-- Color indicator based on work status -->
                    <div class="w-4 h-4 {{ $work->status }} rounded-full">
                    </div>
                    <p class="ml-1 leading-relaxed text-gray-500 text-based dark:text-gray-400">
                        {{ $work->vehicle_description }}
                    </p>
                    <!-- Display Technician's Name -->
                    <a href="/" class="ml-6 text-gray-500 text-based dark:text-gray-400">Tech:
                        {{ $work->tech->name ?? 'Unknown' }}</a>
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
            @foreach ($works as $work)
                @if ($work->pending_payment)
                    <div>
                        <p class="mt-4 leading-relaxed text-gray-200 text-md dark:text-gray-200">
                            ${{ $work->pending_amount }} <br />
                        </p>
                        <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
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

