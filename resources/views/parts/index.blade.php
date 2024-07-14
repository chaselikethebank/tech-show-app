<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Parts List') }}
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
            <x-button class='my-3'>
                <a href="{{ route('parts.create') }}">Create New Part</a>
            </x-button>
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 dark:text-gray-300 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                Part ID
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                Name
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                Description
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                Wholesale Price
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                Manufacturer
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($parts as $part)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-gray-950">
                                    {{ $part->part_id }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-gray-950">
                                    {{ $part->name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-gray-950">
                                    {{ $part->description }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-gray-950">
                                    ${{ number_format($part->wholesale_price, 2) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-gray-950">
                                    {{ $part->manufacturer }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <a href="{{ route('parts.show', $part->id) }}"
                                        class="mr-2 text-blue-900 dark:text-blue-600 hover:underline">View</a>
                                    <a href="{{ route('parts.edit', $part->id) }}"
                                        class="mr-2 text-purple-900 dark:text-purple-600 hover:underline">Edit</a>
                                    <form action="{{ route('parts.destroy', $part->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-900 dark:text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // Fade out the success message after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.opacity = '0';
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 1000);
                }
            }, 3000);
        });
    </script>
</x-app-layout>
