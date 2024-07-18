<div {{ $attributes->merge(['class' => '']) }}>
    <a href="{{ route($route) }}"
        class="inline-flex items-center text-sm font-semibold text-green-700 dark:text-green-300">
        {{ $slot }}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ms-1 fill-gray-900 dark:fill-gray-600">
            <path fill-rule="evenodd"
                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                clip-rule="evenodd" />
        </svg>
    </a>
</div>
