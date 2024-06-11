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

                <span class="flex items-center">
                    <input id="komoditas-search" name="search" type="text" class="form-control" placeholder="Cari Komoditas">
                </span>
                <button class="btn inline-flex justify-center btn-sm btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 " data-bs-toggle="modal" data-bs-target="#modalCreate">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                        <span>Tambah Komoditas</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
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
                                <div class="flex">
                                    <div class="flex-1 text-sm font-medium text-slate-600 dark:text-slate-300">
                                        <span>Menampilkan<span class="mx-1" id="currentPages"></span>dari<span class="mx-1" id="totalPages"></span></span>
                                    </div>
                                    <select type="text" name="showData" id="showData" class="ml-4 flex-none text-center">
                                        <option value="10" selected>10</option>
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="card-text h-full space-y-10">
                                    <ul class="list-none">
                                        <li class="inline-block">
                                            <a href="#" class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 relative top-[2px] pl-2">
                                                <iconify-icon icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                                            </a>
                                        </li>
                                        <span id="paginationButton"></span>
                                        <li class="inline-block">
                                            <a href="#" class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 relative top-[2px]">
                                                <iconify-icon icon="material-symbols:arrow-forward-ios-rounded"></iconify-icon>
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
        <!-- <li class="inline-block">
            <a href="#" class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 p-active">
                1</a>
        </li>
        <li class="inline-block">
            <a href="#" class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 ">
                2</a>
        </li> -->

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
                url: 'komoditas/store',
                data: data,
                success: (result) => {
                    $('#data-table-komoditas').html(result.html)
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
        $('#button-delete').on('click', (e) => {
            e.preventDefault();
            $.ajax({
                type: 'DELETE',
                url: 'komoditas/delete/' + $('#hidden-id').val(),
                data: {
                    _token: '{{csrf_token()}}'
                },
                success: (result) => {
                    $('#data-table-komoditas').html(result.html)
                    $('#form-create')[0].reset();
                    $('[data-bs-dismiss="modal"]').click();
                },
                error: (error) => {
                    console.error(error);
                }
            })
        })
        let tbody = document.querySelector('tbody')
        let rowsLength = tbody.rows.length
        let totalPages = Math.ceil(rowsLength / 10)
        $('#totalPages').text(rowsLength)
        $('#currentPages').text(rowsLength)
        const generatePagination = () => {
            const pagination = document.getElementById('paginationButton')
            pagination.innerHTML = ''
            for (let index = 1; index <= totalPages; index++) {
                const li = document.createElement('li')
                const a = document.createElement('a');
                li.classList.add('inline-block')
                a.textContent = index
                a.classList.add('flex', 'items-center', 'justify-center', 'w-6', 'h-6', 'bg-slate-100', 'dark:bg-slate-700', 'dark:hover:bg-black-500', 'text-slate-800', 'dark:text-white', 'rounded', 'mx-1', 'hover:bg-black-500', 'hover:text-white', 'text-sm', 'font-Inter', 'font-medium', 'transition-all', 'duration-300');
                if (index === 1) a.classList.add('p-active')
                li.appendChild(a);
                pagination.appendChild(li)
            }
        }
        generatePagination()
        $('document').ready(() => {
            $('[data-bs-dismiss="modal"]').on('click', () => {
                $('#form-create')[0].reset();
            })
        })
        const fetchData = () => {
            let data = document.getElementById('komoditas-search').value;
            return new Promise((resolve, reject) => {
                $.ajax({
                    type: 'GET',
                    url: 'komoditas/search',
                    data: {
                        value: data
                    },
                    success: function(response) {
                        resolve(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        reject(errorThrown);
                    },
                })
            })
        }

        const debounce = (func, delay = 400) => {
            let timeoutId;
            return function(...args) {
                clearTimeout(timeoutId);
                timeoutId = setTimeout(() => {
                    func.apply(this, args);
                }, delay);
            };
        }
        const delayedFetchData = debounce(async () => {
            let fetchedData = await fetchData()
            updateList(fetchedData)
        })
        document.getElementById('komoditas-search').addEventListener('input', (e) => {
            let data = e.target.value
            delayedFetchData()
        })
        const updateList = (data) => {
            $('#data-table-komoditas').html(data)
        }
        // document.getElementById('button-create').addEventListener('click', (e) => {
        //     e.preventdefault();
        //     let data = document.getElementById('form-create').serialize();
        //     console.log(data)
        // })
    </script>
</x-app-layout>