<x-app-layout>
    <div class="space-y-8">
        <div>
            <div class=" mb-6">
                <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
            </div>
            <x-slot name="head"></x-slot>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-6">
                <div class="card">
                    <form action="{{ route('export.get') }}" method="post">
                        @csrf
                        <div class="card-body flex flex-col p-6">
                            <div class="card-text h-full space-y-4">
                                <div class="input-area">
                                    <label for="yearSelect" class="form-label">Tahun</label>
                                    <select id="yearSelect" class="form-control " name="year" required>
                                        <option value="" class="dark:bg-slate-700" disabled selected>Pilih Tahun
                                        </option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" class="dark:bg-slate-700">
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-area">
                                    <label for="monthSelect" class="form-label">Bulan</label>
                                    <select id="monthSelect" class="form-control " name="month" required>
                                        <option value="" class="dark:bg-slate-700" disabled selected>Pilih Bulan
                                        </option>
                                        @foreach ($months as $month)
                                            <option value="{{ $month->id }}" class="dark:bg-slate-700">
                                                {{ $month->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-area">
                                    <label for="documentSelect" class="form-label">Dokumen</label>
                                    <select id="documentSelect" class="form-control " name="document_id" required>
                                        <option value="" class="dark:bg-slate-700" disabled selected>Pilih Dokumen
                                        </option>
                                        @foreach ($documents as $document)
                                            <option value="{{ $document->id }}" class="dark:bg-slate-700">
                                                {{ $document->code . ' - ' . $document->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button id="exportButton"
                                    class="btn flex justify-center btn-dark ml-auto " type="submit">Ekspor</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="space-y-5">

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
                    <h4 class="card-title">Series data NTP dan NTUP
                    </h4>
                </header>
                <div class="card-body px-6 pb-6">
                    <div id="series-chart"></div>
                </div>
            </div>
            <!-- end single card -->

        </div> --}}
    </div>

    @push('scripts')
        {{-- <script>
            const tokens = '{{ csrf_token() }}'
            const url_export = new URL("{{ route('export.get') }}")

            function filterData() {
                let filter = {}

                filter['year'] = $(`#yearSelect`).val()
                filter['month'] = $(`#monthSelect`).val()
                filter['document'] = $(`#documentSelect`).val()
                return filter
            }

            function validateFilter() {
                if ($(`#yearSelect`).val() == '') {
                    return false
                } else if ($(`#monthSelect`).val() == '') {
                    return false
                } else if ($(`#documentSelect`).val() == '') {
                    return false
                }
                return true
            }

            $('#exportButton').click(function() {
                if (validateFilter()) {
                    sessionStorage.setItem("filterData", JSON.stringify(filterData()))
                    fetchData()
                } else {
                    window.showToastr('warning', 'Isian filter tidak boleh kosong')
                }
            })

            function fetchData(filter) {
                $('.loader').removeClass('d-none');
                $.ajax({
                    type: 'POST',
                    url: url_export.href,
                    data: {
                        filter: filter,
                        _token: tokens,
                    },

                    success: function(result) {
                        console.log(result)

                        $.each(result.messages, function(index, message) {
                            window.showToastr(message['type'], message['text'])
                        })

                        $('.loader').addClass('d-none')
                    },
                });
            }
        </script> --}}
        {{-- @vite(['resources/js/custom/analytics-chart.js']) --}}
    @endpush

</x-app-layout>
