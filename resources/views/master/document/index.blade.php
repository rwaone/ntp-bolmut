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
                    <input id="dokumen-search" name="search" type="text" class="form-control" placeholder="Cari Dokumen">
                </span>

                <button class="btn inline-flex justify-center btn-sm btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 "
                    data-bs-toggle="modal" data-bs-target="#modalCreate">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                        <span>Tambah Dokumen</span>
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
                                        <div id="tableContainer">
                                            @include('master.document.data-table')
                                        </div>
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
                                {{-- <div id="paginationContainer"></div> --}}
                                <div class="card-text h-full space-y-10">
                                    <ul class="list-none" id="paginationList">
                                        <li class="inline-block" data-page="prev">
                                            <button id="prevLink"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800 dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all duration-300 relative top-[2px] pl-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-slate-100 disabled:dark:hover:bg-slate-700">
                                                <iconify-icon
                                                    icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                                            </button>
                                        </li>
                                        <span id="paginationButton"></span>
                                        <li class="inline-block" data-page="next">
                                            <button id="nextLink"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800 dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all duration-300 relative top-[2px] disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-slate-100 disabled:dark:hover:bg-slate-700">
                                                <iconify-icon
                                                    icon="material-symbols:arrow-forward-ios-rounded"></iconify-icon>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('master.document.modal')
    </div>

    @push('scripts')
    @endpush
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-petugas');
            const modal = document.getElementById('modalCreate');
            const modalTitle = document.getElementById('modalTitle');
            const tableContainer = document.getElementById('tableContainer');
            const dismissModalElement = document.querySelector('[data-bs-dismiss="modal"]');
            const dismissModalDelete = document.getElementById('closeModalDelete');
            const errorElements = document.querySelectorAll('.error-message');
            const deleteButtons = document.querySelectorAll('.delete-btn');
            let pageSize = 10; // Initial page size
            const deleteModal = document.getElementById('modalDelete');
            const confirmDeleteButton = deleteModal.querySelector('#button-delete');
            const paginationData = {
                data: @json($documents),
                current_page: @json($current_page),
                last_page: @json($last_page),
                total: @json($total),
                per_page: @json($per_page),
            };

            renderPagination(paginationData, pageSize, modalTitle, form);

            const searchInput = document.getElementById('dokumen-search');
            const debouncedSearch = debounce(function() {
                fetchAndRenderData(1, pageSize, paginationData, modalTitle, form, searchInput.value);
            }, 500); // Adjust the delay (300ms) as needed

            searchInput.addEventListener('input', debouncedSearch);

            const showDataSelect = document.getElementById('showData');
            showDataSelect.addEventListener('change', function() {
                pageSize = parseInt(this.value);
                fetchAndRenderData(1, pageSize, paginationData, modalTitle, form);
            });

            deleteModal.addEventListener('show.bs.modal', (event) => {
                const button = event.relatedTarget;
                const itemId = button.getAttribute('data-id');
                confirmDeleteButton.dataset.id = itemId;
                // console.log(itemId);
            });

            confirmDeleteButton.addEventListener('click', () => {
                const itemId = confirmDeleteButton.dataset.id;
                deleteItem(itemId, dismissModalDelete, paginationData, pageSize, tableContainer,
                    modalTitle, form);
            });

            //reset form if modal closed
            dismissModalElement.addEventListener('click', () => {
                form.reset();
                setModalTitle('create', modalTitle);
                const existingIdField = form.querySelector('input[name="id"]');
                if (existingIdField) {
                    existingIdField.remove();
                }
            });

            handleFormSubmit(form, paginationData, modalTitle, dismissModalElement,
                errorElements);

            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    // console.log('Edit button clicked:', btn.dataset.id);
                    setModalTitle('edit', modalTitle);
                    populateFormFields(btn.dataset.id, form);
                });
            });
        });
    </script>


</x-app-layout>
