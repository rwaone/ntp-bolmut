<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="modalCreate" tabindex="-1" aria-labelledby="modalCreate" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                        rounded-md outline-none text-current">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                    <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                        Tambah Komoditas
                    </h3>
                    <button type="button"
                        class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                    dark:hover:bg-slate-600 dark:hover:text-white"
                        data-bs-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                            11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-4">
                    <form id="form-create">
                        @csrf
                        <input hidden class="hiddenInput" id="hidden-id" name="id">
                        <div class="label-area mb-3">
                            <label for="group_id" class="form-label">Kelompok Komoditas</label>
                            <select id="group_id" name="group_id" class="form-control select2">
                                <option disabled selected>-- Pilih Kelompok Komoditas --</option>
                                @foreach ($forGroupId as $item)
                                    <option value="{{ $item->id }}">{{ $item->section->document->code . ' - '. $item->section->title. ' - '. $item->name  }}</option>
                                @endforeach
                            </select>
                            <div id="error-group_id" class="error-message mt-2 text-sm text-red-600 dark:text-red-500">
                            </div>
                        </div>
                        <div class="label-area mb-3">
                            <label for="name" class="form-label">Nama Komoditas</label>
                            <input id="name" name="name" type="text" class="form-control"
                                placeholder="Nama Komoditas">
                            <div id="error-name" class="error-message mt-2 text-sm text-red-600 dark:text-red-500">
                            </div>
                        </div>
                        <div class="label-area mb-3">
                            <label for="code" class="form-label">Kode Komoditas</label>
                            <input id="code" name="code" type="text" class="form-control"
                                placeholder="Kode Komoditas">
                            <div id="error-code" class="error-message mt-2 text-sm text-red-600 dark:text-red-500">
                            </div>
                        </div>

                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                    <button class="btn inline-flex justify-center btn-success" id="button-create">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="modalDelete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                        rounded-md outline-none text-current">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                    <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                        Hapus Komoditas
                    </h3>
                    <button type="button"
                        class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                    dark:hover:bg-slate-600 dark:hover:text-white"
                        data-bs-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                            11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-4">
                    <div class="label-area mb-3">
                        <label for="name" class="form-label">Apakah Anda yakin akan menghapus data ini?</label>
                    </div>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                    <button class="btn inline-flex justify-center btn-danger" id="button-delete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
