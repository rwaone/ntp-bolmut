<x-app-layout>
    <div class="space-y-8">
        <div>
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>

        <div class="grid xl:grid-cols-1 grid-cols-1 gap-5">
            <!-- BEGIN: Striped Tables -->
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">Striped Rows
                    </h4>
                </header>
                <div class="card-body px-6 pb-6">
                    <div class="overflow-x-auto -mx-6">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                    <thead class="bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class=" table-th ">
                                                ID
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                First name
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Email
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($tableData as $item)
                                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                            <td class="table-td">{{ $item['age'] }}</td>
                                            <td class="table-td">{{ $item['first_name'] }}</td>
                                            <td class="table-td ">{{ $item['email'] }}</td>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Striped Tables -->
        </div>

        

    @push('scripts')

    @endpush
</x-app-layout>
