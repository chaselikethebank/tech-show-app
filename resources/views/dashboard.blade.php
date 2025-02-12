<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @php
        $works = Work::all();
        $technicians = Tech::all();
        $vehicles = Vehicle::all();
    @endphp


    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @include('works.index', compact('works', 'technicians', 'vehicles'))
            </div>
        </div>
    </div>
</x-app-layout>
