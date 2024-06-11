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
                    <input id="komoditas-search" name="search" type="text" class="form-control"
                        placeholder="Cari Komoditas">
                </span>
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
                                        @include('master.komoditas.data-table-komoditas')
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
                    _token: '{{ csrf_token() }}'
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
        var tbody = document.querySelector('tbody')
        var rowsLength = tbody.rows.length
        var totalPages = Math.ceil({{ Js::from($countData) }} / 10)
        var list, currentPage, paginated, beforePage, showTheData
        document.getElementById('totalPages').textContent = {{ Js::from($countData) }}
        document.getElementById('currentPages').textContent = rowsLength
        const fetchData = () => {
            let data = document.getElementById('komoditas-search').value;
            return new Promise((resolve, reject) => {
                $.ajax({
                    type: 'GET',
                    url: 'komoditas/search',
                    data: {
                        value: data,
                        currentPage: currentPage,
                        paginated: paginated,
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
        const visiblePages = (curPage = 1) => {
            let pages = []
            let total = Number(totalPages)
            let current = Number(curPage)
            if (total <= 6) {
                for (let i = 1; i <= total; i++) {
                    pages.push(i);
                }
            } else {
                let threeMax = total - 2
                if (current <= 3 || current >= threeMax) {
                    for (let i = 1; i <= 3; i++) pages.push(i)
                    if (current <= 3) {
                        if (current == 3) {
                            pages.push(4)
                        }
                        pages.push('...')
                    }
                    if (current > 3 && current < threeMax) {
                        if (!(current - 1 == 3)) {
                            if (!(current - 2 == 3)) pages.push('...')
                            pages.push(current - 1)
                        }
                        pages.push(current)
                        if (!(current + 1 == threeMax)) {
                            pages.push(current + 1)
                            if (!(current + 2 == threeMax)) pages.push('...')
                        }
                    }
                    if (current >= threeMax) {
                        if (current == threeMax) {
                            pages.push('...')
                            pages.push(threeMax - 1)
                        } else {
                            pages.push('...')
                        }
                    }
                    for (let i = threeMax; i <= total; i++) pages.push(i)
                } else {
                    let firstPart = current - 2
                    let lastPart = current + 2
                    // console.log({
                    //     current,
                    //     firstPart,
                    //     lastPart
                    // })
                    pages.push('...')
                    for (let i = firstPart; i <= lastPart; i++) pages.push(i)
                    pages.push('...')
                }
            }
            // console.log(curPage, totalPages, pages)
            return pages;
        }
        const changePage = (before, node, index) => {
            let current = before
            let lasted = visiblePages(before).length
            // if (node < 1 || node > totalPages.value) return
            if (node == '...') {
                if (index == 1) {
                    node = Math.ceil(current / 2)
                } else if (index == lasted) {
                    let tempMid = current + 4
                    node = Math.ceil((current + tempMid) / 2)
                } else node = Math.ceil(totalPages / 2)
            }
            return node
        }
        const attachEventListener = () => {
            list = document.getElementById('paginationList').querySelectorAll('li')
            list.forEach((node, index) => {
                node.addEventListener('click', async (e, aIndex) => {
                    e.stopImmediatePropagation()
                    e.preventDefault()
                    currentPage = node.getAttribute('data-page')
                    // console.log(currentPage)
                    list.forEach((node) => {
                        node.querySelector('a').classList.remove('p-active')
                    })
                    if (!beforePage) beforePage = 1
                    if (currentPage == 'prev') {
                        currentPage = beforePage - 1
                        if (currentPage == 0) return
                    } else if (currentPage == 'next') {
                        currentPage = beforePage + 1
                        if (beforePage == totalPages) return
                    } else {
                        currentPage = changePage(beforePage, currentPage, index)
                    }
                    paginated = document.getElementById('showData').value
                    beforePage = currentPage
                    let html = await fetchData()
                    $('#data-table-komoditas').html(html)
                    generatePagination(currentPage)
                    activatePagination('not first init')
                    // console.log(currentPage)
                    // list[currentPage].querySelector('a').classList.add('p-active')
                    // list[currentPage].querySelector('a').classList.add('p-active')
                    document.getElementById('currentPages').textContent = document.querySelector(
                            'tbody')
                        .rows.length
                })
            })
        }
        const generatePagination = (curPage) => {
            const pagination = document.getElementById('paginationButton')
            pagination.innerHTML = ''
            const allPages = visiblePages(curPage)
            // for (let index = 1; index <= totalPages; index++) {
            allPages.forEach((index) => {
                const li = document.createElement('li')
                const a = document.createElement('a');
                li.classList.add('inline-block', 'li-pointer')
                li.setAttribute('data-page', index)
                a.textContent = index
                a.classList.add('flex', 'items-center', 'justify-center', 'w-6', 'h-6', 'bg-slate-100',
                    'dark:bg-slate-700', 'dark:hover:bg-black-500', 'text-slate-800', 'dark:text-white',
                    'rounded',
                    'mx-1', 'hover:bg-black-500', 'hover:text-white', 'text-sm', 'font-Inter',
                    'font-medium',
                    'transition-all', 'duration-300');
                // if (index === 1) a.classList.add('p-active')
                li.appendChild(a);
                pagination.appendChild(li)
            })
            attachEventListener()
        }

        const activatePagination = (value) => {
            list.forEach((node) => {
                if (value) {
                    let nodes = node.getAttribute('data-page')
                    if (nodes == currentPage) {
                        node.querySelector('a').classList.add('p-active')
                    }
                } else {
                    if (node.getAttribute('data-page') == 1) node.querySelector('a').classList.add('p-active')
                }
            })   
        }
        generatePagination()
        activatePagination()
        //previously place for list

        showTheData = document.getElementById('showData')
        showTheData.addEventListener('change', async (e) => {
            paginated = document.getElementById('showData').value
            let html = await fetchData()
            $('#data-table-komoditas').html(html)
            document.getElementById('currentPages').textContent = document.querySelector('tbody').rows.length
        })
        $('document').ready(() => {
            $('[data-bs-dismiss="modal"]').on('click', () => {
                $('#form-create')[0].reset();
            })
        })
        document.getElementById('komoditas-search').addEventListener('input', (e) => {
            let data = e.target.value
            delayedFetchData()
        })
        const updateList = (data) => {
            $('#data-table-komoditas').html(data)
        }
    </script>
</x-app-layout>
