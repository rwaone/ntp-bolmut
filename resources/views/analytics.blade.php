<x-app-layout>
    <div class="space-y-8">
        <div>
            <div class=" mb-6">
                <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
            </div>
            <x-slot name="head"></x-slot>
            <div class="flex sm:space-x-4 space-x-2 sm:justify-start items-center rtl:space-x-reverse">
                <div class="dropdown relative">
                    <button class="btn inline-flex justify-center  bg-white items-center" type="button"
                        id="primaryDropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light"
                            icon="heroicons-outline:calendar"></iconify-icon>
                        {{ $index_data['current_data']->year }}
                        <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2"
                            icon="ic:round-keyboard-arrow-down"></iconify-icon>
                    </button>
                    <ul class="dropdown-menu min-w-max absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none"
                        style="">
                        <li> <a href="#"
                                class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                2024</a> </li>
                    </ul>
                </div>
                <div class="dropdown relative">
                    <button class="btn inline-flex justify-center  bg-white items-center" type="button"
                        id="primaryDropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light"
                            icon="heroicons-outline:filter"></iconify-icon>
                        {{ $index_data['current_data']->month }}
                        <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2"
                            icon="ic:round-keyboard-arrow-down"></iconify-icon>
                    </button>
                    <ul class="dropdown-menu min-w-max absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none"
                        style="">
                        <li> <a href="{{ route('analytics.filter', [2024, '06']) }}"
                                class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                06</a> </li>
                        <li> <a href="{{ route('analytics.filter', [2024, '05']) }}"
                                class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                05</a> </li>
                        <li> <a href="{{ route('analytics.filter', [2024, '04']) }}"
                                class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                04</a> </li>
                        <li> <a href="{{ route('analytics.filter', [2024, '03']) }}"
                                class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                dark:hover:text-white">
                                03</a> </li>
                        <li> <a href="{{ route('analytics.filter', [2024, '02']) }}"
                                class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                dark:hover:text-white">
                                02</a> </li>
                        <li> <a href="{{ route('analytics.filter', [2024, '01']) }}"
                                class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                dark:hover:text-white">
                                01</a> </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="space-y-5">

            <!-- START:: GROUP CHART 4 -->
            <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-3">
                <div class="bg-warning-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                        <img src="{{ url('images/all-img/shade-1.png') }}" alt="" draggable="false"
                            class="w-full h-full object-contain">
                    </div>
                    <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                        Nilai Tukar Petani (NTP)
                    </span>
                    <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                        {{ $index_data['current_data']->ntp }}
                    </span>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <div class="flex-none text-xl text-primary-500">
                            <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                        </div>
                        <div class="flex-1 text-sm">
                            <span class="block mb-[2px] text-primary-500">
                                {{ round((100 * ($index_data['current_data']->ntp - $index_data['previous_data']->ntp)) / $index_data['previous_data']->ntp, 2) }}%
                            </span>
                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                Dari bulan sebelumnya (m to m)
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-info-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                        <img src="{{ url('images/all-img/shade-2.png') }}" alt="" draggable="false"
                            class="w-full h-full object-contain">
                    </div>
                    <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                        Nilai Tukar Usaha Pertanian (NTUP)
                    </span>
                    <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                        {{ $index_data['current_data']->ntup }}
                    </span>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <div class="flex-none text-xl text-primary-500">
                            <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                        </div>
                        <div class="flex-1 text-sm">
                            <span class="block mb-[2px] text-primary-500">
                                {{ round((100 * ($index_data['current_data']->ntup - $index_data['previous_data']->ntup)) / $index_data['previous_data']->ntup, 2) }}%
                            </span>
                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                Dari bulan sebelumnya (m to m)
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-primary-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                        <img src="{{ url('images/all-img/shade-3.png') }}" alt="" draggable="false"
                            class="w-full h-full object-contain">
                    </div>
                    <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                        Indeks harga yang dibayar petani (IB)
                    </span>
                    <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                        {{ $index_data['current_data']->ib }}
                    </span>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <div class="flex-none text-xl text-primary-500">
                            <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                        </div>
                        <div class="flex-1 text-sm">
                            <span class="block mb-[2px] text-primary-500">
                                {{ round((100 * ($index_data['current_data']->ib - $index_data['previous_data']->ib)) / $index_data['previous_data']->ib, 2) }}%
                            </span>
                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                Dari bulan sebelumnya (m to m)
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-success-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                        <img src="{{ url('images/all-img/shade-4.png') }}" alt="" draggable="false"
                            class="w-full h-full object-contain">
                    </div>
                    <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                        Indeks harga yang diterima petani (IT)
                    </span>
                    <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                        {{ $index_data['current_data']->it }}
                    </span>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <div class="flex-none text-xl text-primary-500">
                            <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                        </div>
                        <div class="flex-1 text-sm">
                            <span class="block mb-[2px] text-primary-500">
                                {{ round((100 * ($index_data['current_data']->it - $index_data['previous_data']->it)) / $index_data['previous_data']->it, 2) }}%
                            </span>
                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                Dari bulan sebelumnya (m to m)
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END:: GROUP CHART 4 -->

            <div class="card">
                <header class=" card-header">
                    <h4 class="card-title">Series data NTP dan NTUP
                    </h4>
                </header>
                <div class="card-body px-6 pb-6">
                    <div id="series-chart"></div>
                </div>
            </div>
            <!-- end single card -->

        </div>
    </div>

    @push('scripts')
        <script>
            sessionStorage.setItem("index_series", JSON.stringify(@json($index_series)));
        </script>
    @endpush

</x-app-layout>
