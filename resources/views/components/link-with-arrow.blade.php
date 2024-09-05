<div {{ $attributes->merge(['class' => '']) }}>
    <a href="{{ route($route) }}"
        class="inline-flex items-center text-sm font-semibold text-green-700 dark:text-green-300">
        {{ $slot }}
         <x-arrow />
    </a>
</div>
