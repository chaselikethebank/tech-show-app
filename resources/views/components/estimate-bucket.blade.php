<!-- resources/views/components/estimate-bucket.blade.php -->

@props(['works', 'technicians', 'vehicles'])

<div>
    <!-- Container for Estimates section -->
    <div>
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Estimates</h2>
        @foreach ($works as $work)
            @if ($work->status === 'estimate')
                <!-- Your code to display the estimate -->
                <div>
                    <p>{{ $work->customer->name ?? 'Unknown Customer' }}</p>
                    <p>{{ $work->vehicle->year ?? 'Unknown Year' }} {{ $work->vehicle->model ?? 'Unknown Model' }}</p>
                    <p>{{ $work->description }}</p>
                    <!-- Example for assigning technician -->
                    @if ($work->status === 'unassigned')
                        <button @click="open = true" class="text-blue-500 hover:underline">
                            Assign Technician
                        </button>
                        <!-- Modal for assigning technician -->
                        <div x-show="open" @click.outside="open = false" class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50">
                            <div class="w-1/3 p-6 bg-white rounded-lg shadow-lg">
                                <h3 class="mb-4 text-lg font-semibold">Assign Technician</h3>
                                <form method="POST" action="{{ route('assign.technician', $work->id) }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="technician_id" class="block text-sm font-medium text-gray-700">Select Technician</label>
                                        <select id="technician_id" name="technician_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                            @foreach ($technicians as $technician)
                                                <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="button" @click="open = false" class="px-4 py-2 text-white bg-gray-500 rounded-md">Cancel</button>
                                        <button type="submit" class="px-4 py-2 ml-3 text-white bg-blue-500 rounded-md">Assign</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
</div>
