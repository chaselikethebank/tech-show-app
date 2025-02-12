<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{--
    @php
        dd($works);
    @endphp --}}

    <div class="flex flex-col gap-4 md:flex-row">
        <!-- Estimate Bucket -->
        <div class="w-full p-4 bg-white rounded-lg shadow-md md:w-1/3">
            <h2 class="mb-2 text-lg font-bold">Estimate</h2>
            @foreach ($works as $work)
                @if (in_array($work->status, ['estimate', 'sent_estimate', 'unassigned']))
                    <div class="p-4 mb-4 bg-gray-100 rounded-lg shadow-sm">
                        <h3 class="font-bold text-md">{{ $work->customer->name }}</h3>
                        <p>Technician: {{ $work->technician->name }}</p>
                        <p>Description: {{ $work->description }}</p>
                        <p>Contact Number: {{ $work->customer->phone }}</p>
                        <p>Email: {{ $work->customer->email }}</p>
                        <p>Estimated Cost: {{ $work->estimated_cost }}</p>
                        <div class="flex items-center">
                            <div class="w-4 h-4 mr-2 rounded-full {{ $work->getStatusColor() }}"></div>
                            <p>Status: {{ $work->status }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Production Bucket -->
        <div class="w-full p-4 bg-white rounded-lg shadow-md md:w-1/3">
            <h2 class="mb-2 text-lg font-bold">Production</h2>
            @foreach ($works as $work)
                @if (in_array($work->status, ['assigned', 'inProgress', 'edit_request', 'sublet', 'recall']))
                    <div class="p-4 mb-4 bg-gray-100 rounded-lg shadow-sm">
                        <h3 class="font-bold text-md">{{ $work->customer->name }}</h3>
                        {{-- <div class="tasks">
                            <h4 class="font-bold text-lg mt-4">Tasks:</h4>
                            @foreach ($work->tasks as $task)
                                <div class="task-item p-4 mb-4 bg-white rounded-lg shadow-sm">
                                    <h5 class="text-md font-bold">{{ $task->title }}</h5>

                                    <!-- Display technicians assigned to this task -->
                                    <p>Technicians:
                                        @if ($task->technicians->isNotEmpty())
                                            @foreach ($task->technicians as $technician)
                                                {{ $technician->name }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            No Technicians Assigned
                                        @endif
                                    </p>

                                    <p>Status: {{ $task->status }}</p>
                                </div>
                            @endforeach
                        </div> --}}
                        <p>Description: {{ $work->description }}</p>
                        <p>Contact Number: {{ $work->customer->phone }}</p>
                        <p>Email: {{ $work->customer->email }}</p>
                        <p>Estimated Cost: {{ $work->estimated_cost }}</p>
                        <div class="flex items-center">
                            <div class="w-4 h-4 mr-2 rounded-full {{ $work->getStatusColor() }}"></div>
                            <p>Status: {{ $work->status }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Completed Bucket -->
        <div class="w-full p-4 bg-white rounded-lg shadow-md md:w-1/3">
            <h2 class="mb-2 text-lg font-bold">Completed</h2>
            @foreach ($works as $work)
                @if (in_array($work->status, ['done', 'pending']))
                    <div class="p-4 mb-4 bg-gray-100 rounded-lg shadow-sm">
                        <h3 class="font-bold text-md">{{ $work->customer->name }}</h3>
                        {{-- <p>Technician: {{ $work->technician->name }}</p> --}}
                        <p>Description: {{ $work->description }}</p>
                        <p>Contact Number: {{ $work->customer->phone }}</p>
                        <p>Email: {{ $work->customer->email }}</p>
                        <p>Estimated Cost: {{ $work->estimated_cost }}</p>
                        <div class="flex items-center">
                            <div class="w-4 h-4 mr-2 rounded-full {{ $work->getStatusColor() }}"></div>
                            <p>Status: {{ $work->status }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

</x-app-layout>
