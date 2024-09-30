<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create New Customer') }}
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

            <form method="POST" action="{{ route('customers.store') }}" class="space-y-6">
                @csrf

                <!-- Customer Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                           required>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                           class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('phone')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}"
                           class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('address')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- City, State, Zip -->
                <div class="flex space-x-4">
                    <div class="w-full">
                        <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                        <input type="text" id="city" name="city" value="{{ old('city') }}"
                               class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        @error('city')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300">State</label>
                        <input type="text" id="state" name="state" value="{{ old('state') }}"
                               class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        @error('state')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="zip" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Zip Code</label>
                        <input type="text" id="zip" name="zip" value="{{ old('zip') }}"
                               class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        @error('zip')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Country -->
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Country</label>
                    <input type="text" id="country" name="country" value="{{ old('country') }}"
                           class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('country')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company -->
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company</label>
                    <input type="text" id="company" name="company" value="{{ old('company') }}"
                           class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('company')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
                    <textarea id="notes" name="notes" rows="4"
                              class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('customers.index') }}" class="text-blue-500 hover:underline">Cancel</a>
                    {{-- <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Create Customer') }}
                    </button> --}}
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-green-300">
                        Create Customer
                        <x-arrow :route="'customers.index'" class="ml-2" />
                    </button>
                </div>
            </form>

        </div>
    </div>

</x-app-layout>
