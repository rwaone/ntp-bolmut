<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}

        <p>

            {{-- {{$master_wilayah}} --}}
        </p>
        <div class="md:flex justify-between items-center">

            <div class="flex flex-wrap ">
                <ul class="nav nav-pills flex items-center flex-wrap list-none pl-0 mr-4" id="pills-tabVertical"
                    role="tablist">
                    <li class="nav-item flex-grow text-center" role="presentation">



                    </li>
                </ul>
                <button class="btn inline-flex justify-center btn-white dark:bg-slate-700 dark:text-slate-300 m-1 ">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons-outline:filter"></iconify-icon>
                        <span>On Going</span>
                    </span>
                </button>
                <a href="{{ url('master/wilayah/create') }}"
                    class="btn inline-flex justify-center btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 ">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                        <span>Tambah Wilayah</span>
                    </span>
                </a>
            </div>
        </div>

        <div class="tab-content mt-6" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                <div class="tab-content">
                    <div class="card">
                        <div class="card-body px-6 rounded overflow-hidden">
                            <div class="overflow-x-auto -mx-6">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden ">
                                        <table
                                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 ">
                                            <thead class="bg-slate-200 dark:bg-slate-700">
                                                <tr>
                                                    <th scope="col" class="table-th ">
                                                        ID Desa
                                                    </th>

                                                    <th scope="col" class="table-th ">
                                                        Desa
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        Status Pemerintahan
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        Kecamatan
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        Kabupaten/Kota
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        Provinsi
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        ACTION
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                @foreach ($master_wilayah as $wilayah)
                                                    <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                        <td class="table-td">
                                                            <div
                                                                class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                                {{ $wilayah->kode_kabkot . $wilayah->kode_kec . $wilayah->code }}
                                                            </div>

                                                        </td>
                                                        <td class="table-td">
                                                            <div
                                                                class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                                {{ '[' . $wilayah->code . '] ' . $wilayah->name }}
                                                            </div>
                                                        </td>

                                                        <td class="table-td">
                                                            <div
                                                                class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                                {{ $wilayah->stat_pem }}
                                                            </div>
                                                        </td>
                                                        <td class="table-td">
                                                            <div
                                                                class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                                {{ '[' . $wilayah->kode_kec . '] ' . $wilayah->kec }}
                                                            </div>
                                                        </td>

                                                        </td>
                                                        <td class="table-td">
                                                            <div
                                                                class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                                {{ '[' . $wilayah->kode_kabkot . '] ' . $wilayah->kabkot }}
                                                            </div>
                                                        </td>
                                                        </td>
                                                        <td class="table-td">
                                                            <div
                                                                class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                                {{ '[7100] SULAWESI UTARA' }}
                                                            </div>
                                                        </td>

                                                        <td class="table-td">
                                                            <div class="dropstart relative">
                                                                <button class="inline-flex justify-center items-center"
                                                                    type="button" id="tableDropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2"
                                                                        icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul
                                                                    class="dropdown-menu min-w-max absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">

                                                                    <li>
                                                                        <a href={{ url('master/wilayah/edit/' . $wilayah->id) }}
                                                                            class="hover:bg-slate-900 dark:hover:bg-slate-600 dark:hover:bg-opacity-70 hover:text-white w-full border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm dark:text-slate-300 last:mb-0 cursor-pointer first:rounded-t last:rounded-b flex space-x-2 items-center capitalize rtl:space-x-reverse">
                                                                            <iconify-icon
                                                                                icon="clarity:note-edit-line"></iconify-icon>
                                                                            <span>Edit</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#desa-delete-confirm"
                                                                            data-value="{{ $wilayah->id }}"
                                                                            class="desa-delete hover:bg-slate-900 dark:hover:bg-slate-600 dark:hover:bg-opacity-70 hover:text-white w-full border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm dark:text-slate-300 last:mb-0 cursor-pointer first:rounded-t last:rounded-b flex space-x-2 items-center capitalize rtl:space-x-reverse">
                                                                            <iconify-icon
                                                                                icon="fluent:delete-28-regular"></iconify-icon>
                                                                            <span>Delete</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <x-table-pagination :paginatedData="$master_wilayah"></x-table-pagination>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal delete --}}
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
            id="desa-delete-confirm" tabindex="-1" aria-labelledby="disabled_backdrop" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                rounded-md outline-none text-current">
                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-danger-500">
                            <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                Hapus Wilayah </h3>
                            <button type="button"
                                class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                            dark:hover:bg-slate-600 dark:hover:text-white"
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
                        <div class="p-6 space-y-4">
                            <h6 class="text-base text-slate-900 dark:text-white leading-6">
                                Apakah anda yakin akan menghapus data ini?
                            </h6>
                            <p class="text-base text-slate-600 dark:text-slate-400 leading-6">
                                Oat cake ice cream candy chocolate cake apple pie. Brownie carrot cake candy canes. Cake
                                sweet roll cake cheesecake cookie chocolate cake liquorice.
                            </p>
                            <span id="desa-delete-id" class="hidden"></span>


                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">

                            <button data-bs-dismiss="modal"
                                class="btn inline-flex justify-center text-white bg-success-500">Batal</button>
                            <button id="hapus-confirm-button"
                                class="btn inline-flex justify-center text-white bg-danger-500">
                                <iconify-icon id="hapus-loading"
                                    class="text-xl spin-slow ltr:mr-2 rtl:ml-2 relative top-[1px] hidden"
                                    icon="line-md:loading-twotone-loop"></iconify-icon>
                                Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        @endpush

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const desaDeleteLinks = document.querySelectorAll(
                    '.desa-delete'
                );
                desaDeleteLinks.forEach(link => {
                    link.addEventListener('click', function(event) {
                        const dataValue = event.currentTarget.dataset.value;
                        const desaDeleteId = document.getElementById('desa-delete-id');
                        desaDeleteId.textContent = dataValue;

                    })
                });

                // hapus confirm 
                const hapusConfirmButton = document.getElementById('hapus-confirm-button')
                hapusConfirmButton.addEventListener('click', async () => {
                    const hapusLoading = document.getElementById('hapus-loading');
                    hapusLoading.classList.remove('hidden');
                    try {
                        const desaDeleteId = document.getElementById('desa-delete-id');
                        const response = await axios.delete(`/master/wilayah/${desaDeleteId.textContent}`);


                    } catch (error) {
                        console.log({
                            error
                        });
                    } finally {
                        hapusLoading.classList.add('hidden');
                        $('[data-bs-dismiss=modal]').click();
                        window.location.reload();

                    }
                })

            })
        </script>
</x-app-layout>
