<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Parts List') }}
        </h2>
    </x-slot>

    <div class="p-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="px-4 py-2 mb-4 text-red-600 bg-red-100 border border-red-400 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <x-link-with-arrow :route="'parts.create'" class="my-3">
                Create a new part
            </x-link-with-arrow>

            <div class="overflow-x-auto bg-white shadow-xl dark:bg-gray-800 dark:text-gray-300 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">
                                Part ID</th>
                            <th
                                class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">
                                Name</th>
                            <th
                                class="hidden px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300 sm:table-cell">
                                Description</th>
                            <th
                                class="hidden px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300 sm:table-cell">
                                Manufacturer</th>
                            <th
                                class="hidden px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300 sm:table-cell">
                                Wholesale Price</th>
                            <th
                                class="hidden px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300 sm:table-cell">
                                Sale Price</th>
                            <th
                                class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($parts as $part)
                            <tr class="flex flex-col sm:table-row">
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-950">{{ $part->part_id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-950">{{ $part->name }}</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 sm:table-cell dark:text-gray-950">
                                    <span class="block overflow-hidden w-36 " title="{{ $part->description }}">
                                        {{ Str::limit($part->description, 40, '...') }}
                                    </span>
                                </td>

                                <td class="hidden px-6 py-4 text-sm text-gray-900 sm:table-cell dark:text-gray-950">
                                    {{ $part->manufacturer, 15, '...' }}</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 sm:table-cell dark:text-gray-950">
                                    {{ $part->wholesale_price }}</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 sm:table-cell dark:text-gray-950">
                                    {{ $part->wholesale_price * 2 + 0.01 }}</td>
                                <td class="flex flex-col px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <a href="{{ route('parts.show', $part->id) }}"
                                        class="text-blue-900 dark:text-blue-600 hover:underline">
                                        View
                                    </a>
                                    <a href="{{ route('parts.edit', $part->id) }}"
                                        class="text-purple-900 dark:text-purple-600 hover:underline">
                                        Edit
                                    </a>
                                    <form action="{{ route('parts.destroy', $part->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-900 dark:text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
