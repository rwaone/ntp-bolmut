let method = "POST";
const urlParts = window.location.href.split("/");
const currentRoute = urlParts[urlParts.length - 1];

export function handleFormSubmit(
    form,
    paginationData,
    modalTitle,
    dismissModalElement,
    errorElements
) {
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Clear errors
        errorElements.forEach(function (element) {
            element.innerHTML = "";
        });

        const formData = new FormData(form);

        const url =
            method === "PUT"
                ? `/${currentRoute}/${formData.get("id")}`
                : `/${currentRoute}`;

        if (method === "PUT") {
            formData.append("_method", "PUT");
        }

        axios({
            method: "POST",
            url: url,
            data: formData,
        })
            .then(function (response) {
                // Handle the successful response
                form.reset();
                fetchAndRenderData(
                    paginationData.current_page,
                    paginationData.per_page,
                    paginationData,
                    modalTitle,
                    form
                );

                // If the element exists, trigger a click event on it
                if (dismissModalElement) {
                    dismissModalElement.click();
                }
            })
            .catch(function (error) {
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
}

export function deleteItem(
    petugas,
    dismissModalDelete,
    paginationData,
    pageSize,
    tableContainer,
    modalTitle,
    form
) {
    // console.log(paginationData);
    // Send an Axios DELETE request to delete the item
    axios
        .delete(`/${currentRoute}/${petugas}`)
        .then(function (response) {
            // Handle the successful response
            axios
                .get(
                    `/${currentRoute}/table?page=${paginationData.current_page}&size=${pageSize}`
                )
                .then(function (tableResponse) {
                    // Update the table container with the new table data
                    tableContainer.innerHTML = tableResponse.data.html;

                    // Update the pagination data
                    paginationData.data = tableResponse.data.data;
                    paginationData.current_page =
                        tableResponse.data.current_page;
                    paginationData.last_page = tableResponse.data.last_page;
                    paginationData.total = tableResponse.data.total;
                    paginationData.per_page = tableResponse.data.per_page;

                    // Check if the current page is now empty
                    if (
                        paginationData.data.length === 0 &&
                        paginationData.current_page > 1
                    ) {
                        // Navigate to the previous page
                        fetchAndRenderData(
                            paginationData.current_page - 1,
                            pageSize,
                            paginationData,
                            modalTitle,
                            form
                        );
                    } else {
                        // Render the pagination links
                        renderPagination(
                            paginationData,
                            pageSize,
                            modalTitle,
                            form
                        );
                        attachEditBtnListeners(modalTitle, form);
                    }
                })
                .catch(function (error) {
                    console.error("Error fetching table data:", error);
                });
        })
        .catch((error) => {
            console.error("Error deleting item:", error);
        });

    // If the element exists, trigger a click event on it
    if (dismissModalDelete) {
        dismissModalDelete.click();
    }
}

export function displayErrors(errors) {
    for (const field in errors) {
        const errorMessages = errors[field];
        const errorElement = document.getElementById(`${field}-error`);

        if (errorElement) {
            let errorHtml = "";
            errorMessages.forEach(function (message) {
                errorHtml += `<p class="mt-2 text-sm text-red-600 dark:text-red-500"> ${message} </p>`;
            });
            errorElement.innerHTML = errorHtml;
        }
    }
}

export function attachEditBtnListeners(modalTitle, form) {
    document.querySelectorAll(".edit-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
            setModalTitle("edit", modalTitle);
            populateFormFields(btn.dataset.id, form);
        });
    });
}

export function setModalTitle(action) {
    if (action === "edit") {
        modalTitle.textContent = "Edit Petugas";
        method = "PUT";
    } else {
        modalTitle.textContent = "Tambah Petugas";
        method = "POST";
    }
}

export function populateFormFields(id, form) {
    axios
        .get(`/${currentRoute}/${id}/edit`)
        .then((response) => {
            const data = response.data;
            // Create and append the id input field
            const idField = document.createElement("input");
            idField.type = "hidden";
            idField.name = "id";
            idField.value = data.id;
            form.appendChild(idField);
            // Populate the form fields with the record data
            const formData = new FormData();

            formData.append("id", data.id);

            const formElements = form.elements;
            for (let i = 0; i < formElements.length; i++) {
                const element = formElements[i];
                if (element.name && data.hasOwnProperty(element.name)) {
                    formData.append(element.name, data[element.name]);
                }
            }

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
        .catch((error) => {
            console.error("Error fetching record data:", error);
        });
}

let prevLinkClickHandler, nextLinkClickHandler;
export function renderPagination(data, pageSize, modalTitle, form) {
    const prevLink = document.getElementById("prevLink");
    const nextLink = document.getElementById("nextLink");
    const paginationButton = document.getElementById("paginationButton");
    const currentPagesSpan = document.getElementById("currentPages");
    const totalPagesSpan = document.getElementById("totalPages");

    // Clear existing page links
    paginationButton.innerHTML = "";

    // Update current and total pages
    if (data.total > 0) {
        currentPagesSpan.textContent = `${
            data.current_page * data.per_page - data.per_page + 1
        } - ${Math.min(data.current_page * data.per_page, data.total)}`;
    } else {
        currentPagesSpan.textContent = "0";
    }

    totalPagesSpan.textContent = data.total;

    // Remove existing event listeners
    if (prevLinkClickHandler) {
        prevLink.removeEventListener("click", prevLinkClickHandler);
    }
    if (nextLinkClickHandler) {
        nextLink.removeEventListener("click", nextLinkClickHandler);
    }

    // Disable/enable previous link
    if (data.current_page === 1) {
        prevLink.classList.add("cursor-not-allowed");
    } else {
        prevLink.classList.remove("cursor-not-allowed");
        // Attach event listener to the previous link
        prevLinkClickHandler = () =>
            handlePrevClick(data, pageSize, modalTitle, form);
        prevLink.addEventListener("click", prevLinkClickHandler);
    }

    // Render page links
    const maxPagesToShow = 5; // Maximum number of page links to show
    const maxPagesBeforeCurrentPage = Math.floor(maxPagesToShow / 2);
    const maxPagesAfterCurrentPage = Math.ceil(maxPagesToShow / 2) - 1;

    let startPage = Math.max(data.current_page - maxPagesBeforeCurrentPage, 1);
    let endPage = Math.min(startPage + maxPagesToShow - 1, data.last_page);

    if (endPage - startPage < maxPagesToShow - 1) {
        startPage = Math.max(endPage - maxPagesToShow + 1, 1);
    }

    if (startPage > 1) {
        const pageLink = document.createElement("li");
        pageLink.classList.add("inline-block");

        const pageLinkButton = document.createElement("button");
        pageLinkButton.textContent = "1";
        pageLinkButton.classList.add(
            "flex",
            "items-center",
            "justify-center",
            "w-6",
            "h-6",
            "bg-slate-100",
            "dark:bg-slate-700",
            "dark:hover:bg-black-500",
            "text-slate-800",
            "dark:text-white",
            "rounded",
            "mx-1",
            "hover:bg-black-500",
            "hover:text-white",
            "text-sm",
            "font-Inter",
            "font-medium",
            "transition-all",
            "duration-300"
        );
        pageLinkButton.addEventListener("click", () =>
            handlePaginationClick(1, pageSize, data, modalTitle, form)
        );

        pageLink.appendChild(pageLinkButton);
        paginationButton.appendChild(pageLink);

        if (startPage > 2) {
            const ellipsisLink = document.createElement("li");
            ellipsisLink.classList.add("inline-block");

            const ellipsisButton = document.createElement("button");
            ellipsisButton.textContent = "...";
            ellipsisButton.classList.add(
                "flex",
                "items-center",
                "justify-center",
                "w-6",
                "h-6",
                "bg-slate-100",
                "dark:bg-slate-700",
                "dark:hover:bg-black-500",
                "text-slate-800",
                "dark:text-white",
                "rounded",
                "mx-1",
                "hover:bg-black-500",
                "hover:text-white",
                "text-sm",
                "font-Inter",
                "font-medium",
                "transition-all",
                "duration-300",
                "cursor-default"
            );

            ellipsisLink.appendChild(ellipsisButton);
            paginationButton.appendChild(ellipsisLink);
        }
    }

    for (let i = startPage; i <= endPage; i++) {
        const pageLink = document.createElement("li");
        pageLink.classList.add("inline-block");

        const pageLinkButton = document.createElement("button");
        pageLinkButton.textContent = i;
        pageLinkButton.classList.add(
            "flex",
            "items-center",
            "justify-center",
            "w-6",
            "h-6",
            "bg-slate-100",
            "dark:bg-slate-700",
            "dark:hover:bg-black-500",
            "text-slate-800",
            "dark:text-white",
            "rounded",
            "mx-1",
            "hover:bg-black-500",
            "hover:text-white",
            "text-sm",
            "font-Inter",
            "font-medium",
            "transition-all",
            "duration-300"
        );

        if (i === data.current_page) {
            pageLinkButton.classList.add("p-active", "cursor-not-allowed");
        } else {
            pageLinkButton.addEventListener("click", () =>
                handlePaginationClick(i, pageSize, data, modalTitle, form)
            );
        }

        pageLink.appendChild(pageLinkButton);
        paginationButton.appendChild(pageLink);
    }

    if (endPage < data.last_page) {
        const ellipsisLink = document.createElement("li");
        ellipsisLink.classList.add("inline-block");

        const ellipsisButton = document.createElement("button");
        ellipsisButton.textContent = "...";
        ellipsisButton.classList.add(
            "flex",
            "items-center",
            "justify-center",
            "w-6",
            "h-6",
            "bg-slate-100",
            "dark:bg-slate-700",
            "dark:hover:bg-black-500",
            "text-slate-800",
            "dark:text-white",
            "rounded",
            "mx-1",
            "hover:bg-black-500",
            "hover:text-white",
            "text-sm",
            "font-Inter",
            "font-medium",
            "transition-all",
            "duration-300",
            "cursor-default"
        );

        ellipsisLink.appendChild(ellipsisButton);
        paginationButton.appendChild(ellipsisLink);

        const pageLink = document.createElement("li");
        pageLink.classList.add("inline-block");

        const pageLinkButton = document.createElement("button");
        pageLinkButton.textContent = data.last_page;
        pageLinkButton.classList.add(
            "flex",
            "items-center",
            "justify-center",
            "w-6",
            "h-6",
            "bg-slate-100",
            "dark:bg-slate-700",
            "dark:hover:bg-black-500",
            "text-slate-800",
            "dark:text-white",
            "rounded",
            "mx-1",
            "hover:bg-black-500",
            "hover:text-white",
            "text-sm",
            "font-Inter",
            "font-medium",
            "transition-all",
            "duration-300"
        );
        pageLinkButton.addEventListener("click", () =>
            handlePaginationClick(
                data.last_page,
                pageSize,
                data,
                modalTitle,
                form
            )
        );

        pageLink.appendChild(pageLinkButton);
        paginationButton.appendChild(pageLink);
    }

    // Disable/enable next link
    if (data.current_page === data.last_page) {
        nextLink.classList.add("cursor-not-allowed");
    } else {
        nextLink.classList.remove("cursor-not-allowed");
        // Attach event listener to the next link
        nextLinkClickHandler = () =>
            handleNextClick(data, pageSize, modalTitle, form);
        nextLink.addEventListener("click", nextLinkClickHandler);
    }
}

export function handlePrevClick(paginationData, pageSize, modalTitle, form) {
    fetchAndRenderData(
        paginationData.current_page - 1,
        pageSize,
        paginationData,
        modalTitle,
        form
    );
}

export function handleNextClick(paginationData, pageSize, modalTitle, form) {
    fetchAndRenderData(
        paginationData.current_page + 1,
        pageSize,
        paginationData,
        modalTitle,
        form
    );
}

export function handlePaginationClick(
    page,
    pageSize,
    paginationData,
    modalTitle,
    form
) {
    fetchAndRenderData(page, pageSize, paginationData, modalTitle, form);
}

export function fetchAndRenderData(
    page = 1,
    size = pageSize,
    paginationData,
    modalTitle,
    form,
    searchQuery = ""
) {
    // console.log('fck');
    axios
        .get(
            `/${currentRoute}/table?page=${page}&size=${size}&search=${searchQuery}`
        )
        .then(function (tableResponse) {
            // Update the table container with the new table data
            tableContainer.innerHTML = tableResponse.data.html;

            // Update the pagination data
            paginationData.data = tableResponse.data.data;
            paginationData.current_page = tableResponse.data.current_page;
            paginationData.last_page = tableResponse.data.last_page;
            paginationData.total = tableResponse.data.total;
            paginationData.per_page = tableResponse.data.per_page;

            // Render the pagination links
            renderPagination(paginationData, size, modalTitle, form);
            attachEditBtnListeners(modalTitle, form);
        })
        .catch(function (error) {
            console.error("Error fetching table data:", error);
        });
}

export function debounceSearch(func, delay) {
    let timeoutId;
    return function (...args) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
}
