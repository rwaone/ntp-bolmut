<script>
    document.addEventListener('DOMContentLoaded', function() {
        const comboboxInput = document.getElementById('kecamatan-edit-input');
        const comboboxValue = document.getElementById('kecamatan-edit-id');
        const comboboxOptions = document.getElementById('kecamatan-edit-options');
        const options = comboboxOptions.children;

        comboboxInput.addEventListener('focus', () => {
            comboboxOptions.classList.remove('hidden');
        });

        comboboxInput.addEventListener('blur', () => {
            setTimeout(() => comboboxOptions.classList.add('hidden'), 200);
        });
        const fetchDesaByKecamatan = async (kecamatanId) => {
            try {
                const {
                    data
                } = await axios.get(`/master/wilayah/desa/fetch-by-kecamatan/${kecamatanId}`);

                const desaOptionElement = document.getElementById('desa-edit-options');
                desaOptionElement.innerHTML = "";
                data.forEach(desa => {
                    const desaOption =
                        `<div class="desa-edit-option p-2 cursor-pointer hover:bg-gray-200" data-value="${desa.id}">${desa.name}</div>`;
                    desaOptionElement.innerHTML += desaOption;
                })
            } catch (error) {
                console.log({
                    error
                });
            } finally {
                desaAddEvent()

            }
        };
        Array.from(options).forEach(option => {
            option.addEventListener('click', () => {
                const dataValue = option.getAttribute('data-value');
                comboboxInput.value = option.textContent.trim();
                comboboxValue.value = dataValue;
                comboboxOptions.classList.add('hidden');
                fetchDesaByKecamatan(dataValue);
                // ambil data desa berdasarkan kecamatan


            });


        });

        comboboxInput.addEventListener('input', function() {
            const filter = comboboxInput.value.toLowerCase();
            Array.from(options).forEach(option => {
                const text = option.textContent.toLowerCase();
                if (text.includes(filter)) {
                    option.classList.remove('hidden');
                } else {
                    option.classList.add('hidden');
                }
            });
        });
        comboboxInput.addEventListener('keydown', (event) => {
            console.log("pressed", event.key);
            if (event.key !== 'Enter') return
            const dataValue = option.getAttribute('data-value');
            comboboxInput.value = option.textContent.trim();
            comboboxValue.value = dataValue;
            comboboxOptions.classList.add('hidden');
            // ambil data desa berdasarkan kecamatan


        });

        const desaAddEvent = () => {
            const desaInput = document.getElementById('desa-edit-input');
            const desaValue = document.getElementById('desa-edit-id');
            const desaOptions = document.getElementById('desa-edit-options');
            const desaOptionsChildren = document.querySelectorAll('.desa-edit-option');
            // console.log('asux');

            desaInput.addEventListener('focus', () => {
                desaOptions.classList.remove('hidden');
            });

            desaInput.addEventListener('blur', () => {
                setTimeout(() => desaOptions.classList.add('hidden'), 200);
            });
            Array.from(desaOptionsChildren).forEach(option => {
                option.addEventListener('click', () => {
                    const dataValue = option.getAttribute('data-value');
                    desaInput.value = option.textContent.trim();
                    desaValue.value = dataValue;
                    desaOptions.classList.add('hidden');
                    // ambil data desa berdasarkan kecamatan


                });
                option.addEventListener('keydown', (event) => {
                    if (event.key !== 'Enter') return
                    const dataValue = option.getAttribute('data-value');
                    desaInput.value = option.textContent.trim();
                    desaValue.value = dataValue;
                    desaOptions.classList.add('hidden');
                    // ambil data desa berdasarkan kecamatan


                });
            });

            desaInput.addEventListener('input', function() {
                const filter = desaInput.value.toLowerCase();
                Array.from(desaOptionsChildren).forEach(option => {
                    const text = option.textContent.toLowerCase();
                    if (text.includes(filter)) {
                        option.classList.remove('hidden');
                    } else {
                        option.classList.add('hidden');
                    }
                });
            });



        }

        // create 
        const editConfirmButton = document.getElementById('edit-confirm-button');
        editConfirmButton.addEventListener('click', async () => {
            const editLoading = document.getElementById('edit-loading')
            const editIcon = document.getElementById('edit-icon')

            editLoading.classList.remove('hidden')
            editIcon.classList.add('hidden')
            try {
                const editSampleForm = document.getElementById('edit-sample-form')
                const sampleFormData = new FormData(editSampleForm);
                const responses = await axios.patch(`/master/samples/update`, sampleFormData, {
                    headers: {
                        "Content-Type": "application/json"
                    },
                })
                window.location.reload();
            } catch (error) {
                console.log({
                    error
                });
            } finally {
                editLoading.classList.add('hidden')
                editIcon.classList.remove('hidden')
                // window.location.reload()

            }
        })

        const editButton = document.querySelectorAll('.edit-sample');
        editButton.forEach(item => {
            console.log({
                item
            });
            item.addEventListener('click', (event) => {
                const dataValue = event.currentTarget.data.value;
                console.log({
                    dataValue
                });
            });
        })

    });
</script>


<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="sample-edit-modal" tabindex="-1" aria-labelledby="disabled_backdrop" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
    rounded-md outline-none text-current">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600">
                <h3 class="text-xl font-medium dark capitalize">
                    Ubah Sampel </h3>
                <button type="button"
                    class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                dark:hover:bg-slate-600 dark:hover"
                    data-bs-dismiss="modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                        11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-4">

                <!-- Modal header -->
                <!-- Modal body -->
                <div class="p-6 space-y-4">
                    <form id="edit-sample-form" class="flex flex-col space-y-3" method="POST"
                        action="{{ url('master/sample/store') }}">
                        @csrf

                        <div class="input-area">
                            <label for="edit-id" class=" form-label">ID</label>
                            <input id="edit-id" name="id" type="text" class="form-control pr-9"
                                placeholder="7107000000" @readonly(true)>
                            <div class="relative">
                                <span id="nameErrorMsg" class="font-Inter text-sm text-danger-500 pt-2 hidden mt-1">This
                                    is
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
                                    value="BOLAANG MONGONDOW UTARA" id="default-picker" type="text"
                                    readonly="readonly">
                            </div>
                        </div>
                        <div class="relative w-full">
                            <label for="kecamatan-edit-input" class=" form-label">Kecamatan</label>
                            <input type="text" id="kecamatan-edit-input" name="kecamatan_name"
                                class="w-full p-2 border border-gray-300 rounded" placeholder="Select an option"
                                autocomplete="off" />
                            <input type="text" id="kecamatan-edit-id" name="kecamatan_id"
                                class="w-full p-2 border border-gray-300 rounded hidden" />
                            <div id="kecamatan-edit-options"
                                class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded shadow-lg hidden">
                                @foreach ($kecamatans as $kecamatan)
                                    <div class="p-2 cursor-pointer hover:bg-gray-200" data-value="{{ $kecamatan->id }}">
                                        {{ $kecamatan->name }}</div>
                                @endforeach
                            </div>

                        </div>
                        <div class="relative w-full">
                            <label for="desa-edit-input" class=" form-label">Desa</label>
                            <input type="text" id="desa-edit-input" name="desa_name"
                                class="w-full p-2 border border-gray-300 rounded" placeholder="Select an option"
                                autocomplete="off" />
                            <input type="text" id="desa-edit-id" name="desa_id"
                                class="w-full p-2 border border-gray-300 rounded hidden" />
                            <div id="desa-edit-options"
                                class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded shadow-lg hidden">
                                {{-- @foreach ($desas as $desa)
                                            <div class="p-2 cursor-pointer hover:bg-gray-200"
                                                data-value="{{ $desa->id }}">
                                                {{ $desa->name }}</div>
                                        @endforeach --}}
                            </div>

                        </div>
                        <x-select-search :datas="$documents" name="document"></x-select-search>
                        <div class="relative w-full">
                            <label for="nama-responden" class="form-label">Nama Responden</label>
                            <input type="text" name="respondent_name"
                                class="w-full p-2 border border-gray-300 rounded" placeholder="NAMA RESPONDEN"
                                autocomplete="off">
                        </div>
                </div>

                </form>


            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">

                <button data-bs-dismiss="modal"
                    class="btn btn-light inline-flex justify-center bg-light-500 text-dark"><iconify-icon
                        class="text-xl spin-slow ltr:mr-2 rtl:ml-2 relative top-[1px]"
                        icon="material-symbols:cancel"></iconify-icon>Batal</button>
                <button id="edit-confirm-button"
                    class="btn btn-success inline-flex justify-center bg-green-700 text-white-300">
                    <iconify-icon id="edit-loading"
                        class="text-xl spin-slow ltr:mr-2 rtl:ml-2 relative top-[1px] hidden"
                        icon="line-md:loading-twotone-loop"></iconify-icon>
                    <iconify-icon id="edit-icon" class="text-xl spin-slow ltr:mr-2 rtl:ml-2 relative top-[1px]"
                        icon="material-symbols:check"></iconify-icon>
                    Simpan</button>
            </div>

        </div>
    </div>
</div>
