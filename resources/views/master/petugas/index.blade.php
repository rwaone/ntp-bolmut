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
                        placeholder="Cari Petugas">
                </span>

                <button class="btn inline-flex justify-center btn-sm btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 "
                    data-bs-toggle="modal" data-bs-target="#modalCreate">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                        <span>Tambah Petugas</span>
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
                                            @include('master.petugas.data-table')
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
                                            <a href="#" id="prevLink"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800 dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all duration-300 relative top-[2px] pl-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-slate-100 disabled:dark:hover:bg-slate-700">
                                                <iconify-icon
                                                    icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                                            </a>
                                        </li>
                                        <span id="paginationButton"></span>
                                        <li class="inline-block" data-page="next">
                                            <a href="#" id="nextLink"
                                                class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800 dark:text-white rounded mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all duration-300 relative top-[2px] disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-slate-100 disabled:dark:hover:bg-slate-700">
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

        @include('master.petugas.modal')
    </div>

    @push('scripts')
    @endpush
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-petugas');
            const modal = document.getElementById('modalCreate');
            const tableContainer = document.getElementById('tableContainer');
            const dismissModalElement = document.querySelector('[data-bs-dismiss="modal"]');
            const dismissModalDelete = document.getElementById('closeModalDelete');
            const errorElements = document.querySelectorAll('.error-message');
            const deleteButtons = document.querySelectorAll('.delete-btn');
            let method = 'POST';
            let pageSize = 10; // Initial page size
            const deleteModal = document.getElementById('modalDelete');
            const confirmDeleteButton = deleteModal.querySelector('#button-delete');
            const paginationData = {
                data: @json($officers),
                current_page: @json($current_page),
                last_page: @json($last_page),
                total: @json($total),
                per_page: @json($per_page),
            };
        }

        renderPagination(paginationData);

        const searchInput = document.getElementById('komoditas-search');
        const debouncedSearch = debounce(function() {
            fetchAndRenderData(1, pageSize, searchInput.value);
        }, 300); // Adjust the delay (300ms) as needed

        searchInput.addEventListener('input', debouncedSearch);

        const showDataSelect = document.getElementById('showData'); showDataSelect.addEventListener('change',
            function() {
                pageSize = parseInt(this.value);
                fetchAndRenderData(1, pageSize);
            });

        deleteModal.addEventListener('show.bs.modal', (event) => {
            const button = event.relatedTarget;
            const itemId = button.getAttribute('data-id');
            confirmDeleteButton.dataset.id = itemId;
            // console.log(itemId);
        });

        confirmDeleteButton.addEventListener('click', () => {
            const itemId = confirmDeleteButton.dataset.id;
            deleteItem(itemId);
        });

        function deleteItem(petugas) {
            // Send an Axios DELETE request to delete the item
            axios.delete(`/petugas/${petugas}`)
                .then(function(response) {
                    // Handle the successful response
                    axios.get(`/petugas/table?page=${paginationData.current_page}&size=${pageSize}`)
                        .then(function(tableResponse) {
                            // Update the table container with the new table data
                            tableContainer.innerHTML = tableResponse.data.html;

                            // Update the pagination data
                            paginationData.data = tableResponse.data.data;
                            paginationData.current_page = tableResponse.data.current_page;
                            paginationData.last_page = tableResponse.data.last_page;
                            paginationData.total = tableResponse.data.total;
                            paginationData.per_page = tableResponse.data.per_page;

                            // Check if the current page is now empty
                            if (paginationData.data.length === 0 && paginationData.current_page >
                                1) {
                                // Navigate to the previous page
                                fetchAndRenderData(paginationData.current_page - 1, pageSize);
                            } else {
                                // Render the pagination links
                                renderPagination(paginationData);
                                attachEditBtnListeners();
                            }
                        })
                        .catch(function(error) {
                            console.error('Error fetching table data:', error);
                        });
                })
                .catch(error => {
                    console.error('Error deleting item:', error);
                });

            // If the element exists, trigger a click event on it
            if (dismissModalDelete) {
                dismissModalDelete.click();
            }
        }

        //reset form if modal closed
        dismissModalElement.addEventListener('click', () => {
            form.reset();
            setModalTitle('create');
            const existingIdField = form.querySelector('input[name="id"]');
            if (existingIdField) {
                existingIdField.remove();
            }
        });

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            errorElements.forEach(function(element) {
                element.innerHTML = '';
            });
            //Clear errors
            const formData = new FormData(form);
            // console.log(formData.get('name'));
            const url = method === 'PUT' ? `/petugas/${formData.get('id')}` : '/petugas';
            if (method === 'PUT') {
                formData.append('_method', 'PUT');
            }


            axios({
                    method: 'POST',
                    url: url,
                    data: formData,
                })
                .then(function(response) {
                    // Handle the successful response
                    form.reset();
                    fetchAndRenderData(paginationData.current_page);
                    // If the element exists, trigger a click event on it
                    if (dismissModalElement) {
                        dismissModalElement.click();
                    }
                })
                .catch(function(error) {
                    // Handle the error
                    if (error.response.status === 422) {
                        // Validation errors
                        const errors = error.response.data.errors;
                        displayErrors(errors);
                    } else {
                        console.error(error);
                    }
                });
        });

        function displayErrors(errors) {
            for (const field in errors) {
                const errorMessages = errors[field];
                const errorElement = document.getElementById(`${field}-error`);

                if (errorElement) {
                    let errorHtml = '';
                    errorMessages.forEach(function(message) {
                        errorHtml +=
                            `<p class="mt-2 text-sm text-red-600 dark:text-red-500"> ${message} </p>`;
                    });
                    errorElement.innerHTML = errorHtml;
                }
            }
        }

        function attachEditBtnListeners() {
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    setModalTitle('edit');
                    populateFormFields(btn.dataset.id);
                });
            });
        }

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                // console.log('Edit button clicked:', btn.dataset.id);
                setModalTitle('edit');
                populateFormFields(btn.dataset.id);
            });
        });

        // Function to set the modal title
        function setModalTitle(action) {
            if (action === 'edit') {
                modalTitle.textContent = 'Edit Petugas';
                method = 'PUT';
            } else {
                modalTitle.textContent = 'Tambah Petugas';
                method = 'POST';
            }
        }

        function populateFormFields(id) {
            // Make an AJAX request to fetch the record data
            // Remove any existing id input field

            axios.get(`/petugas/${id}/edit`)
                .then(response => {
                    const data = response.data;
                    // Create and append the id input field
                    const idField = document.createElement('input');
                    idField.type = 'hidden';
                    idField.name = 'id';
                    idField.value = data.id;
                    form.appendChild(idField);
                    // Populate the form fields with the record data
                    const formData = new FormData();

                    formData.append('id', data.id);
                    formData.append('nip', data.nip);
                    formData.append('name', data.name);
                    formData.append('jabatan', data.jabatan);

                    // console.log('FormData:', formData); // Log the FormData object

                    for (const [key, value] of formData.entries()) {
                        const input = form.elements[key];
                        if (input) {
                            input.value = value;
                            // console.log(`Field ${key}: ${value}`); // Log the form field values
                        }
                    }
                    // ... (populate other form fields)
                })
                .catch(error => {
                    console.error('Error fetching record data:', error);
                });
        }

        //Handle pagination and search
        function fetchAndRenderData(page = 1, size = pageSize, searchQuery = '') {
            axios.get(`/petugas/table?page=${page}&size=${size}&search=${searchQuery}`)
                .then(function(tableResponse) {
                    // Update the table container with the new table data
                    tableContainer.innerHTML = tableResponse.data.html;

                    // Update the pagination data
                    paginationData.data = tableResponse.data.data;
                    paginationData.current_page = tableResponse.data.current_page;
                    paginationData.last_page = tableResponse.data.last_page;
                    paginationData.total = tableResponse.data.total;
                    paginationData.per_page = tableResponse.data.per_page;

                    // Render the pagination links
                    renderPagination(paginationData);
                    attachEditBtnListeners();
                })
                .catch(function(error) {
                    console.error('Error fetching table data:', error);
                });
        }

        function renderPagination(data) {
            const prevLink = document.getElementById('prevLink');
            const nextLink = document.getElementById('nextLink');
            const paginationButton = document.getElementById('paginationButton');
            const currentPagesSpan = document.getElementById('currentPages');
            const totalPagesSpan = document.getElementById('totalPages');


            // Clear existing page links
            paginationButton.innerHTML = '';

            // Update current and total pages
            currentPagesSpan.textContent =
                `${data.current_page * data.per_page - data.per_page + 1} - ${Math.min(data.current_page * data.per_page, data.total)}`;
            totalPagesSpan.textContent = data.total;

            // Disable/enable previous link
            if (data.current_page === 1) {
                prevLink.classList.add('disabled');
                prevLink.removeEventListener('click', handlePrevClick);
            } else {
                prevLink.classList.remove('disabled');
                prevLink.addEventListener('click', handlePrevClick);
            }

            // Render page links
            for (let i = 1; i <= data.last_page; i++) {
                const pageLink = document.createElement('li');
                pageLink.classList.add('inline-block');

                const pageLinkAnchor = document.createElement('a');
                pageLinkAnchor.href = '#';
                pageLinkAnchor.textContent = i;
                pageLinkAnchor.classList.add(
                    'flex',
                    'items-center',
                    'justify-center',
                    'w-6',
                    'h-6',
                    'bg-slate-100',
                    'dark:bg-slate-700',
                    'dark:hover:bg-black-500',
                    'text-slate-800',
                    'dark:text-white',
                    'rounded',
                    'mx-1',
                    'hover:bg-black-500',
                    'hover:text-white',
                    'text-sm',
                    'font-Inter',
                    'font-medium',
                    'transition-all',
                    'duration-300'
                );

                if (i === data.current_page) {
                    pageLinkAnchor.classList.add('p-active', 'cursor-not-allowed');
                } else {
                    pageLinkAnchor.addEventListener('click', () => handlePaginationClick(i));
                }

                pageLink.appendChild(pageLinkAnchor);
                paginationButton.appendChild(pageLink);
            }

            // Disable/enable next link
            if (data.current_page === data.last_page) {
                nextLink.classList.add('disabled');
                nextLink.removeEventListener('click', handleNextClick);
            } else {
                nextLink.classList.remove('disabled');
                nextLink.addEventListener('click', handleNextClick);
            }
        }

        function handlePrevClick() {
            fetchAndRenderData(paginationData.current_page - 1);
        }

        function handleNextClick() {
            fetchAndRenderData(paginationData.current_page + 1);
        }

        function handlePaginationClick(page) {
            fetchAndRenderData(page);
        }

        function debounce(func, delay) {
            let timeoutId;
            return function(...args) {
                clearTimeout(timeoutId);
                timeoutId = setTimeout(() => {
                    func.apply(this, args);
                }, delay);
            };
        }

        });
    </script>


</x-app-layout>
