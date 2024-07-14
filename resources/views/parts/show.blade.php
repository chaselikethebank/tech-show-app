<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Part Details: ') . $part->name }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 overflow-hidden bg-white shadow-xl dark:bg-gray-800 dark:text-gray-300 sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300">Part ID: {{ $part->part_id }}</h3>
                <p class="mt-2"><strong>Name:</strong> {{ $part->name }}</p>
                <p class="mt-2"><strong>Description:</strong> {{ $part->description }}</p>
                <p class="mt-2"><strong>Wholesale Price:</strong> ${{ number_format($part->wholesale_price, 2) }}</p>
                <p class="mt-2"><strong>Manufacturer:</strong> {{ $part->manufacturer }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('parts.edit', $part->id) }}" class="text-blue-600 hover:underline">Edit Part</a>
                <a href="{{ route('parts.index') }}"
                    class="ml-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300">Back to
                    Parts List</a>
            </div>
        </div>
    </div>
</x-app-layout>
