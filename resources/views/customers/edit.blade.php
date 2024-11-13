<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div id="success-message" class="px-8 pt-3 mx-auto transition-opacity max-w-7xl duration-3000">
            <div class="px-4 py-2 text-green-600 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="p-3">


        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex mt-4 text-indigo-500 no-underline">
                <a href="{{ route('customers.show', $customer) }}" class="mr-4 text-blue-500  flex items-center">
                    <span>Back to Customer</span>
                    <x-arrow />
                </a>
            </div>

            <form method="POST" action="{{ route('customers.update', $customer) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Customer Name -->
                <div>
                    <label for="name"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $customer->name) }}"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                        required>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('phone')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                    <input type="text" id="address" name="address"
                        value="{{ old('address', $customer->address) }}"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('address')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- City, State, Zip -->
                <div class="flex space-x-4">
                    <div class="w-full">
                        <label for="city"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                        <input type="text" id="city" name="city" value="{{ old('city', $customer->city) }}"
                            class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        @error('city')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="state"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">State</label>
                        <input type="text" id="state" name="state"
                            value="{{ old('state', $customer->state) }}"
                            class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        @error('state')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="zip" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Zip
                            Code</label>
                        <input type="text" id="zip" name="zip" value="{{ old('zip', $customer->zip) }}"
                            class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        @error('zip')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Country -->
                <div>
                    <label for="country"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Country</label>
                    <input type="text" id="country" name="country"
                        value="{{ old('country', $customer->country) }}"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('country')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company -->
                <div>
                    <label for="company"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company</label>
                    <input type="text" id="company" name="company"
                        value="{{ old('company', $customer->company) }}"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('company')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
                    <textarea id="notes" name="notes" rows="4"
                        class="block w-full px-3 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">{{ old('notes', $customer->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <!-- Action Links -->
                    <div class=" ">
                    </div>


                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium  text-green-300">
                       {{ __('Update Customer') }} <x-arrow  />
                    </button>

                      {{-- <button type="submit"
                        class="inline-flex items-center   ">
                        <x-link-with-arrow :route="'customers.index'" class="my-3">
                             {{ __('Update Customer') }}
                        </x-link-with-arrow>
                    </button>
                </div> --}}
            </form>

        </div>
    </div>

</x-app-layout>
