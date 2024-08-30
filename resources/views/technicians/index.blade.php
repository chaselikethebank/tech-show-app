<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Technicians List') }}
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

            <x-link-with-arrow :route="'technicians.create'" class="my-3">
                Create New Technician
            </x-link-with-arrow>

            @foreach ($technicians as $technician)
                <div
                    class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="relative flex-shrink-0 w-16 h-16">
                            <!-- Profile Image Placeholder -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-16 h-16 rounded-full {{ match ($technician->status) {
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
                        </div>
                        <div class="ml-4">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $technician->name }}
                            </h2>
                            <div class="text-blue-500 dark:text-blue-400">
                                <p>
                                    <a href="mailto:{{ $technician->email }}">{{ $technician->email }}</a>
                                </p>
                                <p>
                                    <a href="tel:{{ $technician->phone }}" class="">{{ $technician->phone }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex mt-4">
                        <a href="{{ route('technicians.show', $technician) }}"
                            class="mr-4 text-blue-500 hover:underline">View Details</a>
                        <a href="{{ route('technicians.edit', $technician) }}"
                            class="text-green-500 hover:underline">Edit</a>
                    </div>
                </div>
            @endforeach

            {{-- <a href="{{ route('technicians.create') }}" class="text-blue-500 hover:underline">Create New Technician</a> --}}
        </div>
    </div>
</x-app-layout>