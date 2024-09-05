<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Part Details: ') . $part->name }}
        </h2>
    </x-slot>

    <div class="p-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 overflow-hidden bg-white shadow-xl dark:bg-gray-800 dark:text-gray-300 sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300">Part ID: {{ $part->part_id }}</h3>
                <p class="mt-2"><strong>Name:</strong> {{ $part->name }}</p>
                <p class="mt-2"><strong>Description:</strong> {{ $part->description }}</p>
                <p class="mt-2"><strong>Wholesale Price:</strong> ${{ number_format($part->wholesale_price, 2) }}</p>
                <p class="mt-2"><strong>Manufacturer:</strong> {{ $part->manufacturer }}</p>
            </div>

            <div class="mt-6">


                <a href="{{ route('parts.edit', $part->id) }}"
                    class="inline-flex items-center text-sm font-semibold text-green-700 dark:text-green-300">
                    Edit this part
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        class="w-5 h-5 ms-1 fill-gray-900 dark:fill-gray-600">
                        <path fill-rule="evenodd"
                            d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <x-link-with-arrow :route="'parts.index'" class="my-3">
                    Back to the parts list
                </x-link-with-arrow>
            </div>
        </div>
    </div>
</x-app-layout>
