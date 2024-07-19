{{-- <div
    class="p-6 bg-white border-b border-gray-200 lg:p-8 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
    <x-application-logo class="block w-auto h-12" /> --}}

{{--
    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Welcome!
    </h1>

    <p class="mt-6 leading-relaxed text-gray-500 dark:text-gray-400">
        LFG
    </p>
</div>
--}}


<div class="grid grid-cols-1 gap-3 p-3 bg-gray-200 bg-opacity-25 dark:bg-gray-800 md:grid-cols-3 lg:gap-8 lg:p-8">


    <div>

        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                <polygon points="12,2 2,22 22,22" />
            </svg>


            <h2 class="text-xl font-semibold text-gray-900 ms-3 dark:text-white">
                <a href="https://laracasts.com">Estimates</a>
            </h2>
        </div>







        <p class="mt-4 leading-relaxed text-gray-500 ptext-sm dark:text-gray-400">
            Jeryy Sienfeld's 1986 Porche 911
            <x-link-with-arrow :route="'parts.create'">
                Push to work order
            </x-link-with-arrow>
        </p>


        <p class="mt-4 leading-relaxed text-gray-500 ptext-sm dark:text-gray-400">
            James Cameron's 2014 Bugatti
            <x-link-with-arrow :route="'parts.create'">
                Push to work order
            </x-link-with-arrow>
        </p>

        <hr class="my-3" />
        <x-link-with-arrow :route="'parts.create'" class="my-3">
            Build new estimate
        </x-link-with-arrow>
    </div>



    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                <circle cx="12" cy="12" r="10" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-900 ms-3 dark:text-white">
                <a href="https://laracasts.com">Work Orders</a>
            </h2>
        </div>




        <div class="flex items-center mt-4">
            <div class="w-4 h-4 bg-yellow-400 rounded-full">
            </div>
            <p class="ml-1 leading-relaxed text-gray-500 text-based dark:text-gray-400">
                1969 Mercedes-Benz 280SL
            </p>
        </div>
        <a href="/" class="ml-6 text-gray-500 text-based dark:text-gray-400">Tech's Name </a>
        <br />
        <x-link-with-arrow class="ml-6" :route="'parts.create'">
            Create invoice
        </x-link-with-arrow>



        <div class="flex items-center mt-4">
            <div class="w-4 h-4 bg-red-400 rounded-full">
            </div>
            <p class="ml-1 leading-relaxed text-gray-500 text-based dark:text-gray-400">
                1967 Jaguar E-Type
            </p>
        </div>
        <a href="/" class="ml-6 text-gray-500 text-based dark:text-gray-400">Tech's Name </a>
        <br />
        <x-link-with-arrow class="ml-6" :route="'parts.create'">
            Create invoice
        </x-link-with-arrow>

        <div class="flex items-center mt-4">
            <div class="w-4 h-4 bg-green-400 rounded-full">
            </div>
            <p class="ml-1 leading-relaxed text-gray-500 text-based dark:text-gray-400">
                1986 Porsche 911 Carrera
            </p>
        </div>
        <a href="/" class="ml-6 text-gray-500 text-based dark:text-gray-400">Tech's Name </a>
        <br />
        <x-link-with-arrow class="ml-6" :route="'parts.create'">
            Create invoice
        </x-link-with-arrow>

        <div class="flex items-center mt-4">
            <div class="w-4 h-4 bg-yellow-400 rounded-full">
            </div>
            <p class="ml-1 leading-relaxed text-gray-500 text-based dark:text-gray-400">
                1965 Ferrari 275 GTB
            </p>
        </div>
        <a href="/" class="ml-6 text-gray-500 text-based dark:text-gray-400">Tech's Name </a>
        <br />
        <x-link-with-arrow class="ml-6" :route="'parts.create'">
            Create invoice
        </x-link-with-arrow>

        <div class="flex items-center mt-4">
            <div class="w-4 h-4 bg-gray-400 rounded-full">
            </div>
            <p class="ml-1 leading-relaxed text-gray-500 text-based dark:text-gray-400">
                1973 BMW 3.0CS
            </p>
        </div>
        <a href="/" class="ml-6 text-gray-500 text-based dark:text-gray-400">Tech's Name </a>
        <br />
        <x-link-with-arrow class="ml-6" :route="'parts.create'">
            Create invoice
        </x-link-with-arrow>

        <div class="flex items-center mt-4">
            <div class="w-4 h-4 bg-blue-400 rounded-full">
            </div>
            <p class="ml-1 leading-relaxed text-gray-500 text-based dark:text-gray-400">
                1974 Alfa Romeo GTV
            </p>
        </div>
        <a href="/" class="ml-6 text-gray-500 text-based dark:text-gray-400">Tech's Name </a>
        <br />
        <x-link-with-arrow class="ml-6" :route="'parts.create'">
            Create invoice
        </x-link-with-arrow>

        <div class="mt-4 ">
            <hr class="my-3" />
            <x-link-with-arrow :route="'parts.create'">
                Something else?
            </x-link-with-arrow>
        </div>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                <rect x="4" y="4" width="16" height="16" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-900 ms-3 dark:text-white">
                <a href="https://laracasts.com">Pending Payment</a>
            </h2>
        </div>



        <div>
            <p class="mt-4 leading-relaxed text-gray-200 text-md dark:text-gray-200">
                $4,390.43 <br />
            </p>
            <p class="text-gray-500 eading-relaxed ptext-sm dark:text-gray-400">
                Jeryy Sienfeld's 1986 Porche 911 <br />
                <x-link-with-arrow class="" :route="'parts.create'">
                    Mark as paid
                </x-link-with-arrow>
            </p>
        </div>

        <div>
            <p class="mt-4 leading-relaxed text-gray-200 text-md dark:text-gray-200">
                $8,092.83 <br />
            </p>
            <p class="text-gray-500 eading-relaxed ptext-sm dark:text-gray-400">
                James Cameron's 2014 Bugatti <br />
                <x-link-with-arrow :route="'parts.create'">
                    View this invoice
                </x-link-with-arrow>

            </p>
            <div class="mt-4 ">
                <hr class="my-3" />
                <x-link-with-arrow :route="'parts.create'">
                    View all paid invoices
                </x-link-with-arrow>
            </div>
        </div>


    </div>


</div>
