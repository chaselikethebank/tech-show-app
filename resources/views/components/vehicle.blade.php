<div
    class="  text-gray-600 dark:text-gray-400 p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">

    <h3>Make:
    {{-- <br /> --}}
    {{ $vehicle->make }}
    </h3>
    <h3> Model:
    {{-- <br /> --}}
    {{ $vehicle->model }}</h3>
    <p>Year:
    {{-- <br /> --}}
    {{ $vehicle->year }}</p>
    <div class="">
        <!-- Action Links -->
        {{-- <div class="flex mt-4 text-indigo-500 no-underline">
            <a href="{{ route('vehicles.show', $vehicle->id) }}" class="text-green-300 flex">
                Details
                <x-arrow />
            </a>
        </div> --}}
    </div>
</div>
