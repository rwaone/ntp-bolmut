<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}
       
        <a href="/master/wilayah" id="desa-edit-back"
            class="btn inline-flex justify-center btn-dark rounded-[25px]"> <span class="flex items-center">
                <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                    icon="material-symbols:keyboard-arrow-left"></iconify-icon>
                <span>Kembali</span> </span>
        </a>
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
            <!-- Modal header -->
            <!-- Modal body -->
            <div class="p-6 space-y-4">
                <form class="flex flex-col space-y-3" method="POST" action="{{ url('master/wilayah/store') }}">
                    @csrf
                    <div class="input-area">
                        <label for="default-picker" class=" form-label">ID Desa</label>
                        <input id="iddesa" type="text" class="form-control pr-9" placeholder="7107000000"
                            @readonly(true)>
                        <div class="relative">
                            <span id="nameErrorMsg" class="font-Inter text-sm text-danger-500 pt-2 hidden mt-1">This is
                                valid
                                state.</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between space-x-4">

                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Provinsi</label>
                            <input class="form-control py-2 flatpickr flatpickr-input active" id="default-picker"
                                value="SULAWESI UTARA" name="kode_prov" type="text" readonly="readonly">
                        </div>
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Kabupaten/Kota</label>
                            <input name="kode_kabkot" class="form-control py-2 flatpickr flatpickr-input active"
                                value="BOLAANG MONGONDOW UTARA" id="default-picker" type="text" readonly="readonly">
                        </div>
                    </div>
                    <div class="relative w-full">
                        <label for="kecamatan-input" class=" form-label">Kecamatan</label>
                        <input type="text" id="kecamatan-input" class="w-full p-2 border border-gray-300 rounded"
                            placeholder="Select an option" autocomplete="off" />
                        <input type="text" id="kecamatan-id" name="kecamatan_id"
                            class="w-full p-2 border border-gray-300 rounded hidden" />
                        <div id="kecamatan-options"
                            class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded shadow-lg hidden">
                            @foreach ($kecamatans as $kecamatan)
                                <div class="p-2 cursor-pointer hover:bg-gray-200" data-value="{{ $kecamatan->id }}">
                                    {{ $kecamatan->name }}</div>
                            @endforeach
                        </div>
                        <div class="mt-2 bg-white rounded ">
                            <button id="add-kecamatan-button" type="button"
                                class="btn inline-flex justify-center text-white bg-black-500">Tambah
                                Kecamatan</button>
                        </div>
                    </div>

                    <div id="new-kecamatan-container" class="flex items-center justify-between space-x-4 hidden">


                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Kode Kecamatan</label>
                            <input name="kecamatan_code" class="form-control py-2 flatpickr flatpickr-input active"
                                id="new-kecamatan-code" type="text">

                        </div>
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Nama Kecamatan</label>
                            <input name="kecamatan_name" class="form-control py-2 flatpickr flatpickr-input active"
                                id="new-kecamatan-name" type="text">

                        </div>
                        <div class="flex items-center justify-end rounded-b dark:border-slate-600">
                            <button id="new-kecamatan-apply" type="button"
                                class="btn inline-flex justify-center text-white bg-black-500">Terapkan</button>
                        </div>
                        <div class="flex items-center justify-end rounded-b dark:border-slate-600">
                            <button id="new-kecamatan-cancel" type="button"
                                class="btn inline-flex justify-center text-white bg-black-500">Batalkan</button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between space-x-4">


                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Kode Desa</label>
                            <input name="desa_code" class="form-control py-2 flatpickr flatpickr-input active"
                                id="default-picker" type="text">

                        </div>
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Nama Desa</label>
                            <input name="desa_name" class="form-control py-2 flatpickr flatpickr-input active"
                                id="default-picker" type="text">

                        </div>
                    </div>

                    <div>
                        <label for="stat_pem" class="form-label">Status Pemerintahan</label>
                        <select name="stat_pem" id="stat_pem" class="form-control w-full mt-2">
                            <option selected="Selected" disabled="disabled" value="none"
                                class="select2 py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Select an option</option>
                            <option value="DESA"
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                DESA</option>
                            <option value="KELURAHAN"
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                KELURAHAN</option>

                        </select>
                    </div>
                    <div class="flex items-center justify-end rounded-b dark:border-slate-600">
                        <button data-bs-dismiss="modal"
                            class="btn inline-flex justify-center text-white bg-black-500">Tambahkan</button>
                    </div>
            </div>

            </form>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const comboboxInput = document.getElementById('kecamatan-input');
            const comboboxValue = document.getElementById('kecamatan-id');
            const comboboxOptions = document.getElementById('kecamatan-options');
            const options = comboboxOptions.children;

            comboboxInput.addEventListener('focus', () => {
                comboboxOptions.classList.remove('hidden');
            });

            comboboxInput.addEventListener('blur', () => {
                setTimeout(() => comboboxOptions.classList.add('hidden'), 200);
            });

            Array.from(options).forEach(option => {
                option.addEventListener('click', () => {
                    comboboxInput.value = option.textContent.trim();
                    comboboxValue.value = option.getAttribute('data-value');
                    comboboxOptions.classList.add('hidden');
                    newKecamatanContainer.classList.add('hidden')
                });
            });

            comboboxInput.addEventListener('input', function() {
                const filter = comboboxInput.value.toLowerCase();
                Array.from(options).forEach(option => {
                    const text = option.getAttribute('data-value').toLowerCase();
                    if (text.includes(filter)) {
                        option.classList.remove('hidden');
                    } else {
                        option.classList.add('hidden');
                    }
                });
            });

            // menambahkan  kecamatan baru
            const newKecamatanContainer = document.getElementById('new-kecamatan-container');
            const newKecamatanApply = document.getElementById('new-kecamatan-apply');
            const newKecamatanCancel = document.getElementById('new-kecamatan-cancel');
            const newKecamatanName = document.getElementById('new-kecamatan-name');
            const addKecamatanButton = document.getElementById('add-kecamatan-button');

            addKecamatanButton.addEventListener('click', () => {
                newKecamatanContainer.classList.remove('hidden')
                comboboxInput.value = '';
                comboboxValue.value = '';

            })
            newKecamatanApply.addEventListener('click', () => {
                comboboxInput.value = newKecamatanName.value.trim().toUpperCase();
                newKecamatanName.value = newKecamatanName.value.trim().toUpperCase();
                comboboxValue.value = "";
                newKecamatanContainer.classList.add('hidden')
            })
            newKecamatanCancel.addEventListener('click', () => {
                newKecamatanContainer.classList.add('hidden')
            })
        });
    </script>
</x-app-layout>
