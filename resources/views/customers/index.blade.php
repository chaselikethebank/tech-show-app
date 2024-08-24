<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tasks List') }}
        </h2>
    </x-slot>


    @if (session('success'))
        <div id="success-message" class="px-8 pt-3 mx-auto transition-opacity max-w-7xl duration-3000">
            <div class="px-4 py-2 text-green-600 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="py-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <x-link-with-arrow :route="'customers.create'" class="my-3">
                Create New Customer
            </x-link-with-arrow>

            @foreach ($customers as $customer)
                <div
                    class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <!-- Header Section -->
                    <div class="flex items-center mb-4">
                        <div class="relative flex-shrink-0 w-16 h-16">
                            <!-- Status Indicator Circle -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-16 h-16 rounded-full {{ match ($customer->status) {
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
                                <!-- Placeholder for a profile image or initial -->
                                <svg class="w-12 h-12 text-gray-500 dark:text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" fill="currentColor" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $customer->name }}</h2>
                            <p class="text-blue-500 dark:text-blue-400">
                                <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a>
                            </p>
                        </div>
                    </div>

                    <!-- Address and Contact Information -->
                    <div class="mb-4 text-gray-600 dark:text-gray-400">
                        <p class="font-medium">Address:</p>
                        <p>{{ $customer->address }}</p>
                        <p>{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</p>
                        <p>{{ $customer->country }}</p>

                        <p class="mt-2 font-medium">Phone:</p>
                        <p>{{ $customer->phone }}</p>

                        <p class="mt-2 font-medium">Notes:</p>
                        <p>{{ $customer->notes }}</p>
                    </div>

                    <!-- Timestamp Information -->
                    <div class="mb-4 text-gray-500 dark:text-gray-400">
                        <p class="font-medium">Created At:</p>
                        <p>
                            @if ($customer->created_at)
                                {{ $customer->created->format('M d, Y h:i A') }}
                            @else
                                Not Available
                            @endif
                        </p>

                        <p class="mt-2 font-medium">Updated At:</p>
                        <p>
                            @if ($customer->updated_at)
                                {{ $customer->updated_at->format('M d, Y h:i A') }}
                            @else
                                Not Available
                            @endif
                        </p>
                    </div>

                    <!-- Action Links -->
                    <div class="flex mt-4">
                        <a href="{{ route('customers.show', $customer) }}"
                            class="mr-4 text-blue-500 hover:underline">View Details</a>
                        <a href="{{ route('customers.edit', $customer) }}"
                            class="text-green-500 hover:underline">Edit</a>
                    </div>
                </div>
            @endforeach

            <a href="{{ route('customers.create') }}" class="text-blue-500 hover:underline">Create New Customer</a>
        </div>
    </div>

</x-app-layout>
