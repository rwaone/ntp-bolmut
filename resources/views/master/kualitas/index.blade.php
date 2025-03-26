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
                <select id="filter_commodity" class="form-control select2">
                    <option>-- Pilih Commodity --</option>
                    
                </select>
                <button class="btn inline-flex justify-center btn-sm btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 "
                    data-bs-toggle="modal" data-bs-target="#modalCreate">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                        <span>Tambah Kualitas</span>
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
                KUALITAS
            </th>
            <th scope="col" class="table-th ">
                KODE KUALITAS
            </th>
            <th scope="col" class="table-th ">
                SATUAN
            </th>
            <th scope="col" class="table-th ">
                HARGA MINIMUM (Rp)
            </th>
            <th scope="col" class="table-th ">
                HARGA MAKSIMUM (Rp)
            </th>
            <th scope="col" class="table-th ">
                STATUS
            </th>
            </th>
            <th scope="col" class="table-th ">
                DIBUAT - DIREVIEW
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
                <input class="form-control group-search" id="kualitas" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="kode_kualitas" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="satuan" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="min_price" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="max_price" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="status" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="create_review" />
            </td>
            <td class="px-2 py-1">
                <input class="form-control group-search" id="updated_at" />
            </td>
            <td class="px-2 py-1">
            </td>
        </tr>
    </thead>
                                        @include('master.kualitas.data-table-kualitas')
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
        @include('master.kualitas.modal')
    </div>

    @push('scripts')
    @endpush
    <script type="text/javascript">
        const update = async (value) => {
            const errorMessageList = document.querySelectorAll('.error-message')
            errorMessageList.forEach((error) => {
                error.textContent = ''
            })
            try {
                const response = await axios.get('kualitas/fetch/' + value)
                $('#hidden-id').val(response.data.id);
                $('#name').val(response.data.name);
                $('#code').val(response.data.code);
                $('#satuan').val(response.data.satuan);
                $('#commodity_id').val(response.data.commodity_id);
                $('#min_price').val(response.data.min_price);
                $('#max_price').val(response.data.max_price);
                $('#status').val(response.data.status);
            } catch (error) {
                console.log(error.response.data.errors)
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
            var tbody = document.querySelector('tbody')
            var rowsLength = tbody.rows.length
            var totalPages = Math.ceil({{ Js::from($countData) }} / 10)
            var list, currentPage, paginated, beforePage, showTheData
            $('#button-create').on('click', async (e) => {
                e.preventDefault();
                let min_price = $('#min_price').val()
                let max_price = $('#max_price').val()
                min_price = setNumberPrice(min_price)
                max_price = setNumberPrice(max_price)
                $('#min_price').val(min_price)
                $('#max_price').val(max_price)
                let data = $('#form-create').serialize();
                // console.log(data)
                document.getElementById('paginationList').querySelectorAll('li').forEach((node) => {
                    if (node.querySelector('a').classList.contains('p-active')) currentPage =
                        node.getAttribute('data-page')
                })
                paginated = document.getElementById('showData').value
                let addedData = new URLSearchParams({
                    value: document.getElementById('kualitas').value,
                    currentPage: (currentPage) ? currentPage : 1,
                    paginated: paginated,
                })
                const combinedData = `${data}&${addedData}`
                const errorMessageList = document.querySelectorAll('.error-message')
                errorMessageList.forEach((error) => {
                    error.textContent = ''
                })
                try {
                    const response = await axios.post('kualitas/store', combinedData)
                    // console.log(response)
                    $('#data-table-kualitas').html(response.data.html.original.html)
                    $('#form-create')[0].reset();
                    $('[data-bs-dismiss="modal"]').click();
                    document.getElementById('totalPages').textContent = response.data.html.original
                        .countData
                    document.getElementById('currentPages').textContent = document
                        .querySelector('tbody').rows.length
                    generatePagination(currentPage)
                    activatePagination('not first init')
                } catch (error) {
                    // console.log(error)
                    let errors = error.response.data.errors
                    Object.keys(errors).forEach((error) => {
                        let errorElement = document.getElementById(`error-${error}`)
                        if (errorElement) errorElement.textContent = errors[error][
                            0
                        ]
                    })
                }
            })

            //delete
            document.getElementById('button-delete').addEventListener('click', async (e) => {
                e.preventDefault()
                try {
                    const response = await axios.delete('kualitas/delete/' +
                        document.getElementById('hidden-id').value, {
                            params: {
                                _token: '{{ csrf_token() }}'
                            }
                        }
                    )
                    let html = await fetchData()
                    $('#data-table-kualitas').html(html.html)
                    $('#form-create')[0].reset();
                    $('[data-bs-dismiss="modal"]').click();
                    document.getElementById('totalPages').textContent = html.countData
                    document.getElementById('currentPages').textContent = document
                        .querySelector('tbody').rows.length
                    generatePagination(currentPage)
                    activatePagination('not first init')
                } catch (error) {
                    console.error(error)
                }
            })


            document.getElementById('totalPages').textContent = {{ Js::from($countData) }}
            document.getElementById('currentPages').textContent = rowsLength
            var section_id = '',document_id = '', group_id = '', commodity_id = ''
            document.getElementById('filter_doc').addEventListener('change', (e) => {
                document_id = e.target.value
                if (isNaN(document_id)) {
                    document_id = ''
                    delayedFetchData()
                    return
                }
                delayedFetchData()
                if(document_id) {
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
                if (group_id) {
                    $.ajax({
                        type:'GET',
                        url: '/fetch-commodity/' + group_id,
                        success: (response) => {
                            let select = $('#filter_commodity');
                            select.html('<option value="">-- Pilih Commodity --</option>');
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
            document.getElementById('filter_commodity').addEventListener('change', (e) => {
                commodity_id = e.target.value
                if (isNaN(commodity_id)) {
                    commodity_id = ''
                    delayedFetchData()
                    return
                }
                delayedFetchData()
            })
            const fetchData = async (cP, p) => {
                let nama_komoditas = document.getElementById('nama_komoditas').value
                let kualitas = document.getElementById('kualitas').value
                let kode_kualitas = document.getElementById('kode_kualitas').value
                let satuan = document.getElementById('satuan').value
                let min_price = document.getElementById('min_price').value
                let max_price = document.getElementById('max_price').value
                let status = document.getElementById('status').value
                let create_review = document.getElementById('create_review').value
                let update_at = document.getElementById('updated_at').value
                
                try {
                    const response = await axios.get('kualitas/search', {
                        params: {
                            ArrayFilter: {
                                document_id:document_id,
                                section_id:section_id,
                                group_id:group_id,
                                commodity_id:commodity_id,
                                nama_komoditas:nama_komoditas,
                                kualitas:kualitas,
                                kode_kualitas:kode_kualitas,
                                satuan:satuan,
                                min_price:min_price,
                                max_price:max_price,
                                status:status,
                                create_review:create_review,
                                update_at:update_at
                            },
                            currentPage: cP,
                            paginated: p,
                        }
                    })
                    return response.data
                } catch (error) {
                    return error.response.data.errors
                }
            }
            window.fetchForPagination = fetchData
            window.targetView = document.getElementById('data-table-kualitas')
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
            generatePagination()
            activatePagination()
            showTheData = document.getElementById('showData')
            showTheData.addEventListener('change', async (e) => {
                document.getElementById('paginationList').querySelectorAll('li').forEach((node) => {
                    if (node.querySelector('a').classList.contains('p-active')) currentPage =
                        node.getAttribute('data-page')
                })
                paginated = document.getElementById('showData').value
                let html = await fetchData(currentPage, paginated)
                $('#data-table-kualitas').html(html.html)
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
            const updateList = (data) => {
                $('#data-table-kualitas').replaceWith(data.html)
            }
            document.querySelectorAll('.group-search').forEach((element) => {
                element.addEventListener('input', (e) => {
                    delayedFetchData()
                })
            })
            const changeOnDocument = () => {
                window.targetView.querySelectorAll('.price-attributes').forEach((node) => {
                    node.textContent = formatThreeDigit(node.textContent)
                })
                window.targetView.querySelectorAll('.status-attributes').forEach((node) => {
                    let value = node.textContent
                    if (value == 1) node.textContent = 'DIPAKAI'
                    else node.textContent = 'TIDAK DIPAKAI'
                })
            }
            changeOnDocument()
            window.changeOnDocument = changeOnDocument
        })
    </script>
</x-app-layout>
