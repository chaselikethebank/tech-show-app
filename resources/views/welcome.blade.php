<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">

                <div
                    class="grid grid-cols-1 gap-3 p-3 bg-gray-200 bg-opacity-25 dark:bg-gray-800 md:grid-cols-3 lg:gap-8 lg:p-8">
                    <div class="col-span-3">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome to <span
                                class="text-blue-600">Pit Stop</span>!</h1>
                        <p class="mt-4 leading-relaxed text-gray-500 text-lg dark:text-gray-400">Your one-stop shop for
                            all your shop maintenance needs.</p>
                    </div>
                    <div class="col-span-2">
                        <div class="flex items-center">
                            <svg xmlns="(link unavailable)" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                                <rect x="4" y="4" width="16" height="16" />
                            </svg>
                            <h2 class="text-xl font-semibold text-gray-900 ms-3 dark:text-white">Manage Your Shop</h2>
                        </div>
                        <p class="mt-4 leading-relaxed text-gray-500 text-md dark:text-gray-400">Easily track your
                            customers, jobs, and invoices with our intuitive dashboard.</p>
                        <ul class="list-disc mt-4 ml-4 text-gray-500 text-md dark:text-gray-400">
                            <li>Assign jobs to technicians</li>
                            <li>Track job status and progress</li>
                            <li>Generate invoices and track payments</li>
                        </ul>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <svg xmlns="(link unavailable)" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                                <circle cx="12" cy="12" r="10" />
                            </svg>
                            <h2 class="text-xl font-semibold text-gray-900 ms-3 dark:text-white">Get Started</h2>
                        </div>
                        <div class="mt-4">

                            <div class="mt-4">
                                <a href="{{ route('register') }}">
                                    <x-button
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Register
                                    </x-button>
                                </a>
                                <a href="{{ route('login') }}">
                                    <x-button
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                        Login
                                    </x-button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
