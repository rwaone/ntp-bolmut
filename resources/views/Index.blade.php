<x-app-layout>
    <div class="space-y-8">
        <div>
            <div class=" mb-6">
                <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
            </div>

            <x-slot name="head"></x-slot>

        </div>

        <div class="grid grid-cols-12 gap-5 mb-5">
            <div class="col-span-12">
                <div class="bg-no-repeat bg-cover bg-center p-4 rounded-[6px] relative"
                    style="background-image: url(images/all-img/widget-bg-1.png)">
                    <div>
                        <div class="text-large font-medium text-slate-900 mb-2">
                            Selamat Datang di Aplikasi Pengolahan Data Harga Perdesaan (NTP)
                        </div>
                        <p class="text-sm text-slate-800">
                            Kabupaten Bolaang Mongondow Utara
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex sm:space-x-4 space-x-2 sm:justify-start items-center rtl:space-x-reverse">
            <button
                class="btn leading-0 inline-flex justify-center bg-white text-slate-700 dark:bg-slate-800 dark:text-slate-300 !font-normal">
                <span class="flex items-center">
                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light"
                        icon="heroicons-outline:calendar"></iconify-icon>
                    <span>Weekly</span>
                </span>
            </button>
            <button
                class="btn leading-0 inline-flex justify-center bg-white text-slate-700 dark:bg-slate-800 dark:text-slate-300 !font-normal">
                <span class="flex items-center">
                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light"
                        icon="heroicons-outline:filter"></iconify-icon>
                    <span>Select Date</span>
                </span>
            </button>
        </div>

        <div class="grid grid-cols-12 gap-5">
            <div class="lg:col-span-8 col-span-12">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="legend-ring">
                            <div id="monentri-hd-barchart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 col-span-12">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title">Progres HD Bulan Ini</h4>
                        <div class="relative">
                            <div class="dropdown relative">
                                <button class="text-xl text-center block w-full " type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span
                                        class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                                    rounded dark:text-slate-400">
                                        <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                                    </span>
                                </button>
                                <ul
                                    class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                            Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                            Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                            Last Year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                    <div class="card-body p-6">
                        <div id="radial-hd-bar"></div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 col-span-12">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="legend-ring">
                            <div id="monentri-hkd-barchart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 col-span-12">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title">Progres HKD Bulan Ini</h4>
                        <div class="relative">
                            <div class="dropdown relative">
                                <button class="text-xl text-center block w-full " type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span
                                        class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                                    rounded dark:text-slate-400">
                                        <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                                    </span>
                                </button>
                                <ul
                                    class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                            Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                            Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                            Last Year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                    <div class="card-body p-6">
                        <div id="radial-hkd-bar"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            sessionStorage.setItem("mon_hd", JSON.stringify(@json($mon_hd)));
            sessionStorage.setItem("mon_hkd", JSON.stringify(@json($mon_hkd)));
        </script>
    @endpush

</x-app-layout>
