<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Todos List') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @foreach ($todos as $todo)
                <x-todo-item :todo="$todo" />
            @endforeach
        </div>
    </div>
</x-app-layout>
