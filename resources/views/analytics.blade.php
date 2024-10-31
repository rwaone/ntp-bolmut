<x-app-layout>
    <div class="space-y-8">
        <div>
            <div class=" mb-6">
                <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
            </div>
            <x-slot name="head"></x-slot>
        </div>

        <div class="space-y-5">

            <!-- START:: GROUP CHART 4 -->
            <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-3">
                <div class="bg-warning-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                        <img src="images/all-img/shade-1.png" alt="" draggable="false"
                            class="w-full h-full object-contain">
                    </div>
                    <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                        Nilai Tukar Petani (NTP)
                    </span>
                    <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                        102
                    </span>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <div class="flex-none text-xl text-primary-500">
                            <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                        </div>
                        <div class="flex-1 text-sm">
                            <span class="block mb-[2px] text-primary-500">
                                25.67%
                            </span>
                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                Dari bulan sebelumnya (m to m)
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-info-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                        <img src="images/all-img/shade-2.png" alt="" draggable="false"
                            class="w-full h-full object-contain">
                    </div>
                    <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                        Nilai Tukar Usaha Pertanian (NTUP)
                    </span>
                    <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                        104
                    </span>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <div class="flex-none text-xl text-primary-500">
                            <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                        </div>
                        <div class="flex-1 text-sm">
                            <span class="block mb-[2px] text-primary-500">
                                8.67%
                            </span>
                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                Dari bulan sebelumnya (m to m)
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-primary-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                        <img src="images/all-img/shade-3.png" alt="" draggable="false"
                            class="w-full h-full object-contain">
                    </div>
                    <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                        Indeks harga yang dibayar petani (IB)
                    </span>
                    <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                        101
                    </span>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <div class="flex-none text-xl text-primary-500">
                            <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                        </div>
                        <div class="flex-1 text-sm">
                            <span class="block mb-[2px] text-primary-500">
                                1.67%
                            </span>
                            <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                Dari bulan sebelumnya (m to m)
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-success-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                    <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                        <img src="images/all-img/shade-4.png" alt="" draggable="false"
                            class="w-full h-full object-contain">
                    </div>
                    <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                        Indeks harga yang diterima petani (IT)
                    </span>
                    <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                        110
                    </span>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <div class="flex-none text-xl text-primary-500">
                            <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                        </div>
                        <div class="flex-1 text-sm">
                            <span class="block mb-[2px] text-primary-500">
                                11.67%
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
                    <h4 class="card-title">Nilai NTP dan NTUP
                    </h4>
                </header>
                <div class="card-body px-6 pb-6">
                    <div id="areaSpaline"></div>
                </div>
            </div>
            <!-- end single card -->

        </div>
    </div>

    @push('scripts')
        @vite(['resources/js/custom/chart-active.js'])
    @endpush

</x-app-layout>