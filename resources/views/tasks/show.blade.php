<!-- resources/views/tasks/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Task Details') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-white sm:rounded-lg">
                <div class="p-6">
                    <p><strong>ID:</strong> {{ $task->id }}</p>
                    <p><strong>Description:</strong> {{ $task->description }}</p>
                    <p><strong>Created At:</strong> {{ $task->created_at }}</p>
                    <p><strong>Updated At:</strong> {{ $task->updated_at }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
