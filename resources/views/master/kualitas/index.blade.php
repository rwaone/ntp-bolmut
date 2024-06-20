<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}

        <div class="md:flex justify-between items-center">
            <div>
            </div>
            <div class="flex flex-wrap">

                <span class="flex items-center">
                    <input id="kualitas-search" name="search" type="text" class="form-control"
                        placeholder="Cari Kualitas">
                </span>
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
                                        @include('master.kualitas.data-table-kualitas')
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
                    value: document.getElementById('kualitas-search').value,
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
            const fetchData = async (cP, p) => {
                let data = document.getElementById('kualitas-search').value
                try {
                    const response = await axios.get('kualitas/search', {
                        params: {
                            value: data,
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
            document.getElementById('kualitas-search').addEventListener('input', (e) => {
                let data = e.target.value
                delayedFetchData()
            })
            const updateList = (data) => {
                $('#data-table-kualitas').html(data.html)
            }
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
