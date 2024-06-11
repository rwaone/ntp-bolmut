<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
            <!-- Modal header -->

            <!-- Modal body -->
            <div class="p-6 space-y-4">
                <form class="flex flex-col space-y-3">
                    <div class="input-area">
                        <label for="default-picker" class=" form-label">ID Desa</label>
                        <input id="iddesa" type="text" class="form-control pr-9" placeholder="Username"
                            value="{{ $wilayah->iddesa }}" @disabled(true)>
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
                                name="kode_prov" value="{{ $wilayah->prov }}" type="text" readonly="readonly">
                        </div>
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Kabupaten/Kota</label>
                            <input name="kode_kabkot" class="form-control py-2 flatpickr flatpickr-input active"
                                id="default-picker" value="{{ $wilayah->kabkot }}" type="text" readonly="readonly">
                        </div>
                    </div>
                    <div class="flex items-center justify-between space-x-4">

                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Kecamatan</label>
                            {{-- <input class="form-control py-2 flatpickr flatpickr-input active" id="default-picker"
                                value="" type="text" readonly="readonly"> --}}
                            <select name="kode_kec" class="form-control py-2 flatpickr flatpickr-input active">
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatan as $item_kecamatan)
                                    <option value="{{ $item_kecamatan->kode_kec }}"
                                        {{ $wilayah->kode_kec == $item_kecamatan->kode_kec ? 'selected="selected"' : '' }}>
                                        {{ '[' . $item_kecamatan->kode_kec . '] ' . $item_kecamatan->kec }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Desa</label>
                            {{-- <input class="form-control py-2 flatpickr flatpickr-input active" id="default-picker"
                                value="" type="text" readonly="readonly"> --}}
                            <select name="kode_desa" id="kode_desa"
                                class="form-control py-2 flatpickr flatpickr-input active">
                                <option value="">Pilih Desa</option>
                                {{-- @foreach ($desa as $item_desa)
                                    <option value="{{ $item_desa->kode_desa }}"
                                        {{ $wilayah->kode_desa == $item_desa->kode_desa ? 'selected="selected"' : '' }}>
                                        {{ '[' . $item_desa->kode_desa . '] ' . $item_desa->desa }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                    </div>
                    <div>
                        <label for="stat_pem" class="form-label">Status Pemerintahan</label>
                        <select name="stat_pem" id="stat_pem" class="form-control w-full mt-2">
                            <option selected="Selected" disabled="disabled" value="none"
                                class="select2 py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Select an option</option>
                            <option value="DESA" {{ $wilayah->stat_pem == 'DESA' ? 'selected="selected"' : '' }}
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                DESA</option>
                            <option value="KELURAHAN"
                                {{ $wilayah->stat_pem == 'KELURAHAN' ? 'selected="selected"' : '' }}
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                KELURAHAN</option>

                        </select>
                    </div>

                    <div class="flex items-center justify-end rounded-b dark:border-slate-600">
                        <button data-bs-dismiss="modal"
                            class="btn inline-flex justify-center text-white bg-black-500">Update</button>
                    </div>
                </form>
            </div>
        </div>

        @push('scripts')
            <script>
                console.log("ss");
            </script>
        @endpush
</x-app-layout>
