<x-app-layout>
    <x-slot name="head">
        <style type="text/css">
            .update-pen {
                cursor: pointer;
            }
        </style>
    </x-slot>
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
                                        @include('master.komoditas.data-table-komoditas')
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


        @include('master.komoditas.modal')
    </div>

    @push('scripts')
    @endpush
    <script type="text/javascript">
        $('#button-create').on('click', (e) => {
            e.preventDefault();
            let data = $('#form-create').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('komoditas.store') }}',
                data: data,
                success: (result) => {
                    // console.log(result)
                    $('#data-table-komoditas').html(result)
                    // $('#modalCreate').modal('hide')
                    $('#form-create')[0].reset();
                    $('[data-bs-dismiss="modal"]').click();
                },
                error: (error) => {
                    console.error(error)
                }
            })
        })
        const update = (value) => {
            $.ajax({
                type: 'GET',
                url: 'komoditas/fetch/' + value,
                success: (result) => {
                    $('#hidden-id').val(result.id);
                    $('#name').val(result.name);
                    $('#code').val(result.code);
                    $('#group_id').val(result.group_id);
                    $('#min_change').val(result.min_change);
                    $('#max_change').val(result.max_change);
                },
                error: (error) => {
                    console.error(error)
                }
            })
        }
        $(document).ready(() => {
            $('[data-bs-dismiss="modal"]').on('click', () => {
                $('#form-create')[0].reset();
            })
        })
        // document.getElementById('button-create').addEventListener('click', (e) => {
        //     e.preventdefault();
        //     let data = document.getElementById('form-create').serialize();
        //     console.log(data)
        // })
    </script>
</x-app-layout>
