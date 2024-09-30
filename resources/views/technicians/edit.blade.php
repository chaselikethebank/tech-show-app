<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Technician') }}
        </h2>
    </x-slot>

    <div class="p-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="flex mt-4 text-indigo-500 no-underline">
                <a href="{{ route('technicians.index', $technician) }}" class="mr-4 text-blue-500  flex items-center">
                    <span>Back to Technicians</span>
                    <x-arrow />
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('technicians.update', $technician) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="mb-4 ">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $technician->name) }}"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $technician->email) }}"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Phone</label>
                    <input id="phone" type="text" name="phone" value="{{ old('phone', $technician->phone) }}"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                </div>

                <div class="mb-4">
                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Notes</label>
                    <textarea id="notes" name="notes"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                        rows="4">{{ old('notes', $technician->notes) }}</textarea>
                </div>

                <div class="flex justify-end">

                    <button type="submit"
                        class="px-4 py-2  text-green-300">
                        <div class="flex  ">
                        Submit Update  <x-arrow /></div>
                    </button>

                     <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium  text-green-300">
                       {{ __('Update Technician') }} <x-arrow  />
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
