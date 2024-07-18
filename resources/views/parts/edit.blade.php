<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Part: ') . $part->name }}
        </h2>
    </x-slot>

    <div class="py-3">
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
            <form action="{{ route('parts.update', $part->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="part_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Part
                            ID</label>
                        <input type="text" name="part_id" id="part_id" value="{{ $part->part_id }}" required
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                    </div>

                    <div>
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name" id="name" value="{{ $part->name }}" required
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                    </div>

                    <div>
                        <label for="description"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" id="description" rows="3"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">{{ $part->description }}</textarea>
                    </div>

                    <div>
                        <label for="wholesale_price"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Wholesale Price</label>
                        <input type="number" name="wholesale_price" id="wholesale_price"
                            value="{{ $part->wholesale_price }}" required step="0.01"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                    </div>

                    <div>
                        <label for="manufacturer"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Manufacturer</label>
                        <input type="text" name="manufacturer" id="manufacturer" value="{{ $part->manufacturer }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                    </div>
                </div>

                <div class="mt-6">
                    <x-button type="submit">Update Part</x-button>
                    <a href="{{ route('parts.index') }}"
                        class="ml-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
