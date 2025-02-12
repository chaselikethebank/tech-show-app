<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Technician Details') }}
        </h2>
    </x-slot>

    <div class="p-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="flex mt-4 text-indigo-500 no-underline ">
                <a href="{{ route('technicians.index', $technician) }}" class="flex items-center mr-4 text-blue-500">
                    <span>Back to Technicians</span>
                    <x-arrow />
                </a>
            </div>

            <div class="py-3 space-y-6"></div>
            <!-- Technician Details -->
            <div
                class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $technician->name }}</h2>
                <div class="text-blue-500 dark:text-blue-400">
                    <p>
                        <a href="mailto:{{ $technician->email }}">{{ $technician->email }}</a>
                    </p>
                    <p>
                        <a href="tel:{{ $technician->phone }}">{{ $technician->phone }}</a>
                    </p>
                </div>
                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $technician->notes }}</p>
            </div>

            <!-- Works List -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Assigned Works</h3>
                @if ($technician->works->isEmpty())
                    <p class="mt-4 text-gray-600 dark:text-gray-400">No works assigned to this techniciannician.</p>
                @else
                    @foreach ($technician->works as $work)
                        <div
                            class="p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $work->title }}</h4>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $work->description }}</p>
                            <div class="mt-2">
                                <span class="px-3 py-1 text-sm font-medium rounded-full {{ $work->getStatusColor() }}">
                                    {{ ucfirst($work->status) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
