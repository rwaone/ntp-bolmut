<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}

        <div class="md:flex justify-between items-center">
            <div>
            </div>
            <div class="flex flex-items items-center space-x-2">
                <select id="filter_doc" class="form-control select2">
                    <option>-- Pilih Document --</option>
                    @foreach ($documents as $doc)
                    <option value="{{ $doc->id }}">{{ $doc->name }}</option>
                    @endforeach
                </select>
                <select id="filter_sec" class="form-control select2">
                    <option>-- Pilih Section --</option>
                </select>
                <select id="filter_group" class="form-control select2">
                    <option>-- Pilih Group --</option>
                </select>
                <button class="btn inline-flex justify-center btn-sm btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 "
                    data-bs-toggle="modal" data-bs-target="#modalCreate">
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
                                    <table  class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 ">
    <thead class="bg-slate-200 dark:bg-slate-700">
        <tr>
            <th scope="col" class="table-th ">
                NO.
            </th>
            <th scope="col" class="table-th ">
                NAMA KOMODITAS
            </th>
            <th scope="col" class="table-th ">
                KODE KOMODITAS
            </th>
            <th scope="col" class="table-th ">
                KELOMPOK KOMODITAS
            </th>

            <th scope="col" class="table-th ">
                TERAKHIR DI-EDIT
            </th>
            <th scope="col" class="table-th ">
                EDIT/HAPUS
            </th>
        </tr>
        <tr>
            <td></td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="nama_komoditas" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="kode_komoditas" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="kelompok_komoditas" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="updated_at" />
            </td>
            <td class="px-2 py-1">
            </td>
        </tr>
    </thead>
    
    @include('master.komoditas.data-table-komoditas')
</table>
                                    </div>
                                </div>
                            </div>
                            <div class=" flex flex-wrap items-center justify-between space-x-2 py-4">
                                <div class="flex">
                                    <div class="flex-1 text-sm font-medium text-slate-600 dark:text-slate-300">
                                        <span>Menampilkan<span class="mx-1" id="currentPages"></span>dari<span
                                                class="mx-1" id="totalPages"></span></span>
                                    </div>
                                    <select type="text" name="showData" id="showData"
                                        class="ml-4 flex-none text-center text-sm font-medium">
                                        <option value="10" selected>10</option>
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="card-text h-full space-y-10">
                                    <ul class="list-none" id="paginationList">
                                        <li class="inline-block" data-page="prev">
                                            <a href="#"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800
                                        dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all
                                        duration-300 relative top-[2px] pl-2">
                                                <iconify-icon
                                                    icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                                            </a>
                                        </li>
                                        <span id="paginationButton"></span>
                                        <li class="inline-block" data-page="next">
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
        const update = (value) => {
            const errorMessageList = document.querySelectorAll('.error-message')
            errorMessageList.forEach((error) => {
                error.textContent = ''
            })
            $.ajax({
                type: 'GET',
                url: 'komoditas/fetch/' + value,
                success: (result) => {
                    $('#hidden-id').val(result.id);
                    $('#name').val(result.name);
                    $('#code').val(result.code);
                    $('#group_id').val(result.group_id);

                },
                error: (error) => {
                    console.log(error.responseJSON.errors)
                    let errors = error.responseJSON.errors
                    Object.keys(errors).forEach((error) => {
                        let errorElement = document.getElementById(`error-${error}`)
                        if (errorElement) errorElement.textContent = errors[error][
                            0
                        ]
                    })
                }
            })
        }
        document.addEventListener('DOMContentLoaded', () => {
            var tbody = document.querySelector('tbody')
            var rowsLength = tbody.rows.length
            var totalPages = Math.ceil({{ Js::from($countData) }} / 10)
            var list, currentPage, paginated, beforePage, showTheData
            $('#button-create').on('click', (e) => {
                e.preventDefault();
                let data = $('#form-create').serialize();
                document.getElementById('paginationList').querySelectorAll('li').forEach((node) => {
                    if (node.querySelector('a').classList.contains('p-active')) currentPage =
                        node.getAttribute('data-page')
                })
                paginated = document.getElementById('showData').value
                let addedData = new URLSearchParams({
                    value: document.getElementById('nama_komoditas').value,
                    currentPage: (currentPage) ? currentPage : 1,
                    paginated: paginated,
                })
                const combinedData = `${data}&${addedData}`
                const errorMessageList = document.querySelectorAll('.error-message')
                errorMessageList.forEach((error) => {
                    error.textContent = ''
                })
                $.ajax({
                    type: 'POST',
                    url: 'komoditas/store',
                    // data: data,
                    data: combinedData,
                    success: async (result) => {
                        // console.log(result.html.original.html)
                        $('#data-table-komoditas').html(result.html.original.html)
                        $('#form-create')[0].reset();
                        $('[data-bs-dismiss="modal"]').click();
                        document.getElementById('totalPages').textContent = result.html.original
                            .countData
                        document.getElementById('currentPages').textContent = document
                            .querySelector('tbody').rows.length
                        generatePagination(currentPage)
                        activatePagination('not first init')
                    },
                    error: (error) => {
                        console.log(error.responseJSON.errors)
                        let errors = error.responseJSON.errors
                        Object.keys(errors).forEach((error) => {
                            let errorElement = document.getElementById(`error-${error}`)
                            if (errorElement) errorElement.textContent = errors[error][
                                0
                            ]
                        })
                    }
                })
            })

            $('#button-delete').on('click', (e) => {
                e.preventDefault();
                $.ajax({
                    type: 'DELETE',
                    url: 'komoditas/delete/' + $('#hidden-id').val(),
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: async (result) => {
                        let html = await fetchData()
                        $('#data-table-komoditas').html(html.html)
                        $('#form-create')[0].reset();
                        $('[data-bs-dismiss="modal"]').click();
                        document.getElementById('totalPages').textContent = html.countData
                        document.getElementById('currentPages').textContent = document
                            .querySelector('tbody').rows.length
                        generatePagination(currentPage)
                        activatePagination('not first init')
                    },
                    error: (error) => {
                        console.error(error);
                    }
                })
            })

            document.getElementById('totalPages').textContent = {{ Js::from($countData) }}
            document.getElementById('currentPages').textContent = rowsLength
            var section_id = '',document_id = '', group_id = ''
            document.getElementById('filter_doc').addEventListener('change', (e) => {
                document_id = e.target.value
                if (isNaN(document_id)) {
                    document_id = ''
                    delayedFetchData()
                    return
                }
                delayedFetchData()
                if (document_id) {
                    $.ajax({
                        type:'GET',
                        url: '/fetch-section/' + document_id,
                        success: (response) => {
                            let select = $('#filter_sec');
                            select.html('<option value="">-- Pilih Section --</option>');
                            // Loop through response data and append options
                            response.data.forEach((item) => {
                                select.append(`<option value="${item.id}">${item.name}</option>`);
                            });
                            select.trigger('change'); 
                        },error: (jqXHR, textStatus, errorThrown) => {
            console.error("Error fetching sections:", errorThrown);
        }
                    })
                }
            })
            document.getElementById('filter_sec').addEventListener('change', (e) => {
                section_id = e.target.value
                if (isNaN(section_id)) {
                    section_id = ''
                    delayedFetchData()
                    return
                }
                delayedFetchData()
                if (section_id) {
                    $.ajax({
                        type:'GET',
                        url: '/fetch-group/' + section_id,
                        success: (response) => {
                            let select = $('#filter_group');
                            select.html('<option value="">-- Pilih Group --</option>');
                            // Loop through response data and append options
                            response.data.forEach((item) => {
                                select.append(`<option value="${item.id}">${item.name}</option>`);
                            });
                            select.trigger('change'); 
                        },error: (jqXHR, textStatus, errorThrown) => {
            console.error("Error fetching sections:", errorThrown);
        }
                    })
                }
            })
            document.getElementById('filter_group').addEventListener('change', (e) => {
                group_id = e.target.value
                if (isNaN(group_id)) {
                    group_id = ''
                    delayedFetchData()
                    return
                }
                delayedFetchData()
            })
            const fetchData = (cP, p) => {
            let nama_komoditas = document.getElementById('nama_komoditas').value
                let kode_komoditas = document.getElementById('kode_komoditas').value
                let kelompok_komoditas = document.getElementById('kelompok_komoditas').value
                let updated_at = document.getElementById('updated_at').value
                return new Promise((resolve, reject) => {
                    $.ajax({
                        type: 'GET',
                        url: 'komoditas/search',
                        data: {
                            ArrayFilter: {
                                document_id:document_id,
                                section_id:section_id,
                                group_id:group_id,
                                nama_komoditas:nama_komoditas,
                                kode_komoditas:kode_komoditas,
                                kelompok_komoditas:kelompok_komoditas,
                                updated_at:updated_at
                            },
                            currentPage: cP,
                            paginated: p,
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
            window.fetchForPagination = fetchData
            window.targetView = document.getElementById('data-table-komoditas')
            startObserving(window.targetView)
            const delayedFetchData = debounce(async () => {
                currentPage = 1
                let fetchedData = await fetchData()
                updateList(fetchedData)
                document.getElementById('totalPages').textContent = fetchedData.countData
                generatePagination(currentPage)
                activatePagination()
                document.getElementById('currentPages').textContent = document
                    .querySelector('tbody').rows.length
            })
            //THE ORIGINAL OF PAGINATION

            generatePagination(currentPage = null)
            activatePagination()
            //previously place for list

            showTheData = document.getElementById('showData')
            showTheData.addEventListener('change', async (e) => {
                document.getElementById('paginationList').querySelectorAll('li').forEach((node) => {
                    if (node.querySelector('a').classList.contains('p-active')) currentPage =
                        node.getAttribute('data-page')
                })
                paginated = document.getElementById('showData').value
                let html = await fetchData(currentPage, paginated)
                $('#data-table-komoditas').html(html.html)
                document.getElementById('totalPages').textContent = html.countData
                document.getElementById('currentPages').textContent = document
                    .querySelector('tbody').rows.length
                generatePagination(currentPage)
                activatePagination('not first init')
            })
            $('document').ready(() => {
                $('[data-bs-dismiss="modal"]').on('click', () => {
                    $('#form-create')[0].reset();
                })
            })
            // document.getElementById('komoditas-search').addEventListener('input', (e) => {
            //     let data = e.target.value
            //     delayedFetchData()
            // })
            document.querySelectorAll('.group-search').forEach((element) => {
                element.addEventListener('input', (e) => {
                    delayedFetchData()
                })
            })
            const updateList = (data) => {
                $('#data-table-komoditas').replaceWith(data.html)
            }
            const changeOnDocument = () => {
                window.targetView.querySelectorAll('.price-attributes').forEach((node) => {
                    node.textContent = formatNumber(node.textContent.trim())
                })
            }
            changeOnDocument()
            window.changeOnDocument = changeOnDocument
        })
    </script>
</x-app-layout>
