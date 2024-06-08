<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                <h3 class="text-base font-medium text-white dark:text-white capitalize">
                    Edit Project
                </h3>
                <button type="button"
                    class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                                dark:hover:bg-slate-600 dark:hover:text-white"
                    data-bs-dismiss="modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-4">
                <form class="flex flex-col space-y-3">
                    <div class="input-area">
                        <div class="relative">
                            <input id="name" type="text" class="form-control pr-9" placeholder="Username"
                                value={{ $wilayah->iddesa }}>
                        </div>
                        <span id="nameErrorMsg" class="font-Inter text-sm text-danger-500 pt-2 hidden mt-1">This is
                            valid
                            state.</span>
                    </div>
                    <div class="flex items-center justify-between space-x-4">
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">Start Date</label>
                            <input class="form-control py-2 flatpickr flatpickr-input active" id="default-picker"
                                value="" type="text" readonly="readonly">
                        </div>
                        <div class="w-full">
                            <label for="default-picker" class=" form-label">End Date</label>
                            <input class="form-control py-2 flatpickr flatpickr-input active" id="default-picker"
                                value="" type="text" readonly="readonly">
                        </div>
                    </div>
                    <div>
                        <label for="basicSelect" class="form-label">Assignee</label>
                        <select name="basicSelect" id="basicSelect" class="form-control w-full mt-2">
                            <option selected="Selected" disabled="disabled" value="none"
                                class="select2 py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Select an option</option>
                            <option value="option1"
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Jhon Doe</option>
                            <option value="option2"
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Jhon Smith</option>
                            <option value="option3"
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Grane Smith</option>
                        </select>
                    </div>
                    <div>
                        <label for="basicSelect" class="form-label">Tag</label>
                        <select name="basicSelect" id="basicSelect" class="form-control w-full mt-2">
                            <option selected="Selected" disabled="disabled" value="none"
                                class="select2 py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Select an option</option>
                            <option value="option1"
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Admin</option>
                            <option value="option2"
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                Dashboard</option>
                            <option value="option3"
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                User Friendly</option>
                        </select>
                    </div>
                    <div>
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="flex items-center justify-end rounded-b dark:border-slate-600">
                        <button data-bs-dismiss="modal"
                            class="btn inline-flex justify-center text-white bg-black-500">Update</button>
                    </div>
                </form>
            </div>
        </div>

        @push('scripts')
        @endpush
</x-app-layout>
