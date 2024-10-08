<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        {{-- <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" /> --}}
        {{-- </div> --}}

        <div class="card xl:col-span-2">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Multiple Column</div>
                    </div>
                </header>
                <div class="card-text h-full ">
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-7">
                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Kabupaten/Kota</label>
                                <select id="filter-kabkot" name="filter-kabkot" class="form-control">
                                    <option disabled selected>-- Pilih Kabupaten/Kota --</option>
                                    @foreach ($kabkot as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Kecamatan</label>
                                <select id="filter-kec" name="filter-kec" class="form-control">
                                    <option disabled selected>-- Pilih Kecamatan --</option>
                                </select>
                            </div>
                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Desa</label>
                                <select id="filter-desa" name="filter-desa" class="form-control">
                                    <option disabled selected>-- Pilih Desa --</option>
                                </select>
                            </div>
                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Tahun</label>
                                <select id="filter-tahun" name="filter-tahun" class="form-control">
                                    <option disabled selected>-- Pilih Tahun --</option>
                                    @foreach ($tahun as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Jenis Dokumen</label>
                                <select id="filter-dokumen" name="filter-dokumen" class="form-control">
                                    <option disabled selected>-- Pilih Jenis Dokumen --</option>
                                    @foreach ($dokumen as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button id="response-index" class="btn inline-flex justify-center btn-success">Cari</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                <div class="tab-content">
                    <div class="card">
                        <div class="card-body px-6 rounded overflow-hidden">
                            <div class="overflow-x-auto -mx-6">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden">
                                        @include('pemeriksaan.data-table-sample')
                                    </div>
                                </div>
                            </div>
                            <div class=" flex flex-wrap items-center justify-between space-x-2 py-4">
                                <div class="flex">
                                    <div class="flex-1 text-sm font-medium text-slate-600 dark:text-slate-300">
                                        <span>Menampilkan<span class="mx-1" id="currentPages"></span>dari<span
                                                class="mx-1" id="totalPages"></span></span>
                                    </div>
                                    <select type="text" name="showData" id="showData"
                                        class="ml-4 flex-none text-center text-sm font-medium">
                                        <option value="10" selected>10</option>
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="card-text h-full space-y-10">
                                    <ul class="list-none" id="paginationList">
                                        <li class="inline-block" data-page="prev">
                                            <a href="#"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 relative top-[2px] pl-2">
                                                <iconify-icon
                                                    icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                                            </a>
                                        </li>
                                        <span id="paginationButton"></span>
                                        <li class="inline-block" data-page="next">
                                            <a href="#"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 relative top-[2px]">
                                                <iconify-icon
                                                    icon="material-symbols:arrow-forward-ios-rounded"></iconify-icon>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            const appPage = document.querySelector('.app-wrapper')
            appPage.classList.add('collapsed')
            appPage.classList.remove('extend')

            document.querySelector('#filter-kabkot').addEventListener('change', async (e) => {
                let kabkot = e.target.value
                try {
                    const response = await axios.get('/fetch-kec/' + kabkot)
                    const kecList = response.data
                    const kecFilter = document.querySelector('#filter-kec')
                    kecFilter.innerHTML = '<option disabled selected>-- Pilih Kecamatan --</option>'

                    kecList.forEach((kec) => {
                        const option = document.createElement('option')
                        option.value = kec.id
                        option.textContent = kec.code + ' - ' + kec.name
                        kecFilter.appendChild(option)
                    })
                } catch (error) {
                    console.error(error)
                }
            })
            document.getElementById('filter-kec').addEventListener('change', async (e) => {
                let kecId = e.target.value
                try {
                    const response = await axios.get('/fetch-desa/' + kecId)
                    const desaList = response.data
                    const desaFilter = document.querySelector('#filter-desa')
                    desaFilter.innerHTML = '<option disabled selected>-- Pilih Desa --</option>'
                    desaList.forEach((desa) => {
                        const option = document.createElement('option')
                        option.value = desa.id
                        option.textContent = desa.code + ' - ' + desa.name
                        desaFilter.appendChild(option)
                    })
                } catch (error) {
                    console.error(error)
                }
            })
            document.getElementById('response-index').addEventListener('click', async (e) => {
                e.preventDefault();

                const kabkotSelect = document.getElementById('filter-kabkot');
                const kecSelect = document.getElementById('filter-kec');
                const desaSelect = document.getElementById('filter-desa');
                const tahunSelect = document.getElementById('filter-tahun');
                const dokumenSelect = document.getElementById('filter-dokumen');

                const kabkotValue = kabkotSelect.value;
                const kecValue = kecSelect.value;
                const desaValue = desaSelect.value;
                const tahunValue = tahunSelect.value;
                const dokumenValue = dokumenSelect.value;

                const defaultKabkotOption = kabkotSelect.options[0].text;
                const defaultKecOption = kecSelect.options[0].text;
                const defaultDesaOption = desaSelect.options[0].text;
                const defaultTahunOption = tahunSelect.options[0].text;
                const defaultDokumenOption = dokumenSelect.options[0].text;

                clearErrors();

                let hasError = false;

                if (kabkotValue === defaultKabkotOption) {
                    showError('filter-kabkot', 'Kabupaten/Kota tidak boleh kosong.');
                    hasError = true;
                }

                if (kecValue === defaultKecOption) {
                    showError('filter-kec', 'Kecamatan tidak boleh kosong.');
                    hasError = true;
                }

                if (desaValue === defaultDesaOption) {
                    showError('filter-desa', 'Desa tidak boleh kosong.');
                    hasError = true;
                }

                if (tahunValue === defaultTahunOption) {
                    showError('filter-tahun', 'Tahun tidak boleh kosong.');
                    hasError = true;
                }

                if (dokumenValue === defaultDokumenOption) {
                    showError('filter-dokumen', 'Tipe dokumen tidak boleh kosong.');
                    hasError = true;
                }

                if (hasError) {
                    return;
                }

                let data = {
                    _token: '{{ csrf_token() }}',
                    desa: desaValue,
                    tahun: tahunValue,
                    dokumen: dokumenValue,
                };

                try {
                    const response = await axios.get('/responses/fetchSample', {
                        params: data,
                    });
                    const html = response.data.html;
                    document.getElementById('data-table-sample').innerHTML = html;
                    attachBtnListener();
                } catch (error) {
                    console.error(error);
                }
            });
        })

        function showError(fieldId, errorMessage) {
            const errorElement = document.createElement('div');
            errorElement.classList.add('error-message', 'text-red-600', 'dark:text-red-500');
            errorElement.textContent = errorMessage;

            const fieldElement = document.getElementById(fieldId);
            fieldElement.parentNode.appendChild(errorElement);
        }

        function clearErrors() {
            const errorElements = document.querySelectorAll('.error-message');
            errorElements.forEach((element) => {
                element.remove();
            });
        }

        function attachBtnListener() {
            document.querySelectorAll('.entri-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    var sampleId = this.getAttribute('data-id');
                    var year = this.getAttribute('data-year');
                    var month = parseInt(this.getAttribute('data-month'));

                    if (!this.disabled) {
                        submitForm(sampleId, year, month);
                    }
                });
            });
        }

        function submitForm(sampleId, year, month) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/responses/create';

            var sampleIdInput = document.createElement('input');
            sampleIdInput.type = 'hidden';
            sampleIdInput.name = 'sample_id';
            sampleIdInput.value = sampleId;
            form.appendChild(sampleIdInput);

            var yearInput = document.createElement('input');
            yearInput.type = 'hidden';
            yearInput.name = 'year';
            yearInput.value = year;
            form.appendChild(yearInput);

            var monthInput = document.createElement('input');
            monthInput.type = 'hidden';
            monthInput.name = 'month';
            monthInput.value = month;
            form.appendChild(monthInput);

            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</x-app-layout>
