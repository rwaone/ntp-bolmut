<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
            <!-- Modal header -->

            <!-- Modal body -->
            <div class="p-6 space-y-4">
                <form class="flex flex-col space-y-3" method="POST" action="{{ url('master/wilayah/desa/store') }}">
                    @csrf
                    <div class="input-area hidden">
                        <label for="default-picker" class=" form-label">ID Desa</label>
                        <input id="iddesa" type="text" class="form-control pr-9" value="{{ $master_wilayah->id }}"
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
                    <div class="flex items-center justify-between space-x-4">
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Kode Kecamatan</label>
                            <input name="kecamatan_code" class="form-control py-2 flatpickr flatpickr-input active" value="{{$master_wilayah->kode_kec}}"
                                 type="text">

                        </div>
                        <div class="w-full hidden">
                            <label for="default-picker" class="form-label">ID Kecamatan</label>
                            <input name="kecamatan_id" class="form-control py-2 flatpickr flatpickr-input active" value="{{$master_wilayah->id_kec}}"
                                 type="text" readonly>

                        </div>
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Nama Kecamatan</label>
                            <input name="kecamatan_name" class="form-control py-2 flatpickr flatpickr-input active" value="{{$master_wilayah->kec}}"
                                 type="text">
                        </div>
                    </div>
                    <div class="flex items-center justify-between space-x-4">
                       
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Kode Desa</label>
                            <input name="desa_code" class="form-control py-2 flatpickr flatpickr-input active" value="{{$master_wilayah->code}}"
                                 type="text">

                        </div>
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Nama Desa</label>
                            <input name="desa_name" class="form-control py-2 flatpickr flatpickr-input active" value="{{$master_wilayah->name}}"
                                 type="text">
                        </div>
                    </div>

                 
                  

                    <div>
                        <label for="stat_pem" class="form-label">Status Pemerintahan</label>
                        <select name="stat_pem" id="stat_pem" class="form-control w-full mt-2">
                            <option selected="Selected" disabled="disabled" value="none"
                                class="select2 py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Select an option{{$master_wilayah->stat_pem}}</option>
                            <option value="DESA" {{$master_wilayah->stat_pem=='DESA'?'selected':''}}
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                DESA</option>
                            <option value="KELURAHAN" {{$master_wilayah->stat_pem=='KELURAHAN'?'selected':''}}
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                KELURAHAN</option>

                        </select>
                    </div>
                    <div class="flex items-center justify-end rounded-b dark:border-slate-600">
                        <button data-bs-dismiss="modal"
                            class="btn inline-flex justify-center text-white bg-black-500">Simpan</button>
                    </div>
            </div>

            </form>
        </div>
    </div>


    <script>
      
    </script>
</x-app-layout>
