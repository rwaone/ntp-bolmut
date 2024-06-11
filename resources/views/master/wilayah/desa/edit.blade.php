<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}
        <div class="flex items-center space-x-2">


            <a href="/master/wilayah/desa" id="desa-edit-back" class="p-2 bg-white text-bold"><iconify-icon
                    icon="material-symbols:keyboard-arrow-left"></iconify-icon>KEMBALI</a>
        </div>
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
            <!-- Modal header -->

            <!-- Modal body -->

            <div class="p-6 space-y-4">
                <form id="edit-desa-form" class="flex flex-col space-y-3">
                    @csrf
                    <div class="input-area hidden">
                        <label for="desa_id" class=" form-label">ID Desa</label>
                        <input id="desa_id" name="desa_id" type="text" class="form-control pr-9"
                            value="{{ $master_wilayah->id }}" @readonly(true)>
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
                    <div class="flex items-center justify-between space-x-4">
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Kode Kecamatan</label>
                            <input name="kecamatan_code" class="form-control py-2 flatpickr flatpickr-input active"
                                value="{{ $master_wilayah->kode_kec }}" type="text">

                        </div>
                        <div class="w-full hidden">
                            <label for="default-picker" class="form-label">ID Kecamatan</label>
                            <input name="kecamatan_id" class="form-control py-2 flatpickr flatpickr-input active"
                                value="{{ $master_wilayah->id_kec }}" type="text" readonly>

                        </div>
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Nama Kecamatan</label>
                            <input name="kecamatan_name" class="form-control py-2 flatpickr flatpickr-input active"
                                value="{{ $master_wilayah->kec }}" type="text">
                        </div>
                    </div>
                    <div class="flex items-center justify-between space-x-4">

                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Kode Desa</label>
                            <input name="desa_code" class="form-control py-2 flatpickr flatpickr-input active"
                                value="{{ $master_wilayah->code }}" type="text">

                        </div>
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Nama Desa</label>
                            <input name="desa_name" class="form-control py-2 flatpickr flatpickr-input active"
                                value="{{ $master_wilayah->name }}" type="text">
                        </div>
                    </div>




                    <div>
                        <label for="stat_pem" class="form-label">Status Pemerintahan</label>
                        <select name="stat_pem" id="stat_pem" class="form-control w-full mt-2">
                            <option selected="Selected" disabled="disabled" value=""
                                class="select2 py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Pilih Status Pemerintahan</option>
                            <option value="DESA" {{ $master_wilayah->stat_pem == 'DESA' ? 'selected' : '' }}
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                DESA</option>
                            <option value="KELURAHAN" {{ $master_wilayah->stat_pem == 'KELURAHAN' ? 'selected' : '' }}
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                KELURAHAN</option>

                        </select>
                    </div>
                    <div class="flex items-center justify-end rounded-b dark:border-slate-600">
                        <button id="edit-desa-submit-button"
                            class="btn inline-flex justify-center text-white bg-black-500"
                            type="button">Simpan</button>
                    </div>
            </div>

            </form>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('edit-desa-form');
            const editDesaSubmitButton = document.getElementById('edit-desa-submit-button');

            editDesaSubmitButton.addEventListener('click', async function() {
                editDesaSubmitButton.textContent = "Loading...";
                const formData = new FormData(form);
                const response = await axios.patch('/master/wilayah/desa/update', formData, {
                    headers: {
                        "Content-Type": "application/json"
                    },
                });
                let backUrl = document.getElementById('desa-edit-back').getAttribute('href');
                window.location.href = backUrl;
            });



        });
    </script>
</x-app-layout>
