<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}
        <div class="md:flex justify-end items-center">

            @php
                $properties = [
                    ['value' => 'kecamatan_name', 'label' => 'Kecamatan'],
                    ['value' => 'desa_name', 'label' => 'Desa'],
                    ['value' => 'document_name', 'label' => 'Nama Dokumen'],
                    ['value' => 'respondent_name', 'label' => 'Responden'],
                ];
                $query = request()->query();
            @endphp
            <x-filter-table :properties="$properties" :query="$query"></x-filter-table>

            <button data-bs-toggle="modal" data-bs-target="#sampel-create-modal"
                class="btn inline-flex justify-center btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 ">
                <span class="flex items-center">
                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                    <span>Tambah Sampel</span>
                </span>
            </button>
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
                                                    ID Sampel
                                                </th>

                                                <th scope="col" class="table-th ">
                                                    Nama Responden
                                                </th>
                                                <th scope="col" class="table-th ">
                                                    Tipe Dokumen
                                                </th>
                                                <th scope="col" class="table-th ">
                                                    Jenis Dokumen
                                                </th>
                                                <th scope="col" class="table-th ">
                                                    Desa </th>
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
                                            @foreach ($samples as $sample)
                                                <tr class="even:bg-slate-50 dark:even:bg-slate-700">

                                                    <td class="table-td">
                                                        <div
                                                            class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                            {{ $sample->id }}
                                                        </div>
                                                    </td>
                                                    <td class="table-td">
                                                        <div
                                                            class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                            {{ $sample->respondent_name }}
                                                        </div>
                                                    </td>
                                                    <td class="table-td">
                                                        <div
                                                            class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                            {{ $sample->document_type }}
                                                        </div>
                                                    </td>
                                                    <td class="table-td">
                                                        <div
                                                            class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                            {{ $sample->document_name }}
                                                        </div>
                                                    </td>
                                                    <td class="table-td">
                                                        <div
                                                            class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                            {{ '[' . $sample->desa_code . '] ' . $sample->desa_name }}
                                                        </div>
                                                    </td>

                                                    <td class="table-td">
                                                        <div
                                                            class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                            {{ '[' . $sample->kecamatan_code . '] ' . $sample->kecamatan_name }}
                                                        </div>
                                                    </td>

                                                    </td>
                                                    <td class="table-td">
                                                        <div
                                                            class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                            [7107] BOLAANG MONGONDOW UTARA
                                                        </div>
                                                    </td>

                                                    <td class="table-td">
                                                        <div
                                                            class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                            [7100] SULAWESI UTARA
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
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#sample-edit-modal"
                                                                        data-value="{{ $sample }}"
                                                                        class="sample-edit hover:bg-slate-900 dark:hover:bg-slate-600 dark:hover:bg-opacity-70 hover:text-white w-full border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm dark:text-slate-300 last:mb-0 cursor-pointer first:rounded-t last:rounded-b flex space-x-2 items-center capitalize rtl:space-x-reverse">
                                                                        <iconify-icon
                                                                            icon="clarity:note-edit-line"></iconify-icon>
                                                                        <span>Edit</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#sample-delete-confirm"
                                                                        data-value="{{ $sample->id }}"
                                                                        class="sample-delete hover:bg-slate-900 dark:hover:bg-slate-600 dark:hover:bg-opacity-70 hover:text-white w-full border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm dark:text-slate-300 last:mb-0 cursor-pointer first:rounded-t last:rounded-b flex space-x-2 items-center capitalize rtl:space-x-reverse">
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
                        <x-table-pagination :paginatedData="$samples"></x-table-pagination>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('master.samples.create')
    @include('master.samples.edit')
    {{-- @include('master.samples.delete') --}}

    @push('scripts')
    @endpush

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sampleDeleteLinks = document.querySelectorAll(
                '.sample-delete'
            );
            sampleDeleteLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    const dataValue = event.currentTarget.dataset.value;
                    const sampleDeleteId = document.getElementById('sample-delete-id');
                    sampleDeleteId.textContent = dataValue;

                })
            });

            // hapus confirm 
            

            // edit
            const editSampleLinks = document.querySelectorAll('.sample-edit');
            editSampleLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    const dataValue = JSON.parse(event.currentTarget.dataset.value);
                    console.log({
                        dataValue
                    });
                    const form = document.getElementById('edit-sample-form');
                    for (const key in dataValue) {
                        if (dataValue.hasOwnProperty(key)) {
                            const input = form.querySelector(`[name="${key}"]`);
                            if (input) {
                                input.value = dataValue[key];
                            }
                        }
                    }
                })
            })

        })
    </script>
</x-app-layout>
