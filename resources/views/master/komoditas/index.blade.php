<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}

        <div class="md:flex justify-between items-center">
            <div>
            </div>
            <div class="flex flex-wrap">
                
                <button class="btn inline-flex justify-center btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 "
                    data-bs-toggle="modal" data-bs-target="#modalCreate">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                        <span>Tambah Komoditas</span>
                    </span>
                </button>
            </div>
        </div>

        <div class="tab-content mt-3" id="pills-tabContent">
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
                                                        NAME
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        CODE
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        GROUP ID
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        MIN_CHANGE
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        MAX_CHANGE
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        UPDATE_AT
                                                    </th>
                                                    <th scope="col" class="table-th ">
                                                        EDIT/HAPUS
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                @foreach ($data as $key => $value)
                                                    <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                        <td class="table-td">
                                                            <div
                                                                class="flex space-x-3 items-center text-left rtl:space-x-reverse">
                                                                <div
                                                                    class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                                                    {{ $value->name }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="table-td">
                                                            <span class="block date-text">{{ $value->code }}</span>
                                                        </td>
                                                        <td class="table-td">
                                                            <span class="block date-text">{{ $value->group_id }}</span>
                                                        </td>
                                                        <td class="table-td">
                                                            {{ $value->min_change }}
                                                        </td>
                                                        <td class="table-td">
                                                            {{ $value->max_change }}
                                                        </td>
                                                        <td class="table-td">
                                                            {{ $value->updated_at }}
                                                        </td>
                                                        <td class="table-td">

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class=" flex flex-wrap items-center justify-between space-x-2 py-4">
                                <div>
                                    <div class="text-sm font-medium text-slate-600 dark:text-slate-300">Go
                                        <input type="text"
                                            class="form-control !inline-block border max-w-[50px] px-2 py-2 text-center mr-2 "
                                            value="1">
                                        <span>Page 1 of 1</span>
                                    </div>
                                </div>
                                <div class="card-text h-full space-y-10">
                                    <ul class="list-none">
                                        <li class="inline-block">
                                            <a href="#"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 relative top-[2px] pl-2">
                                                <iconify-icon
                                                    icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                                            </a>
                                        </li>
                                        <li class="inline-block">
                                            <a href="#"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 p-active">
                                                1</a>
                                        </li>
                                        <li class="inline-block">
                                            <a href="#"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 ">
                                                2</a>
                                        </li>
                                        <li class="inline-block">
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


        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
            id="modalCreate" tabindex="-1" aria-labelledby="modalCreate" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
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
                                <div class="label-area mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Nama Komoditas">
                                </div>
                                <div class="label-area mb-3">
                                    <label for="code" class="form-label">Code</label>
                                    <input id="code" name="code" type="text" class="form-control"
                                        placeholder="Kode Komoditas">
                                </div>
                                <div class="label-area mb-3">
                                    <label for="group_id" class="form-label">Group</label>
                                    {{-- <input id="group_id" name="group_id" type="text" class="form-control mb-3"
                                        placeholder="Kelompok Komoditas"> --}}
                                    <select id="group_id" name="group_id" class="form-control select2">
                                        <option disabled selected>-- Pilih Kelompok Komoditas --</option>
                                        @foreach ($forGroupId as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="label-area mb-3">
                                    <label for="min_change" class="form-label">Harga Minimum????</label>
                                    <input id="min_change" name="min_change" type="text" class="form-control"
                                        placeholder="Harga Minimum">
                                </div>
                                <div class="label-area mb-3">
                                    <label for="max_change" class="form-label">Harga Maksimum???</label>
                                    <input id="max_change" name="max_change" type="text" class="form-control"
                                        placeholder="Harga Maksimum">
                                </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <div class="btn inline-flex justify-center btn-success" id="button-create">Simpan</div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
    <script type="text/javascript">
        $('#button-create').on('click', () => {
            let data = $('#form-create').serialize();
            // console.log(data);
            $.ajax({
                type: 'POST',
                url: '{{ route('komoditas.store') }}',
                data: data,
                // data: {
                //     data: data,
                //     _token: '{{ csrf_token() }}'
                // },
                success: (result) => {
                    console.log(result)
                },
                error: (error) => {
                    console.error(error)
                }
            })
        })
        // document.getElementById('button-create').addEventListener('click', (e) => {
        //     e.preventdefault();
        //     let data = document.getElementById('form-create').serialize();
        //     console.log(data)
        // })
    </script>
</x-app-layout>
