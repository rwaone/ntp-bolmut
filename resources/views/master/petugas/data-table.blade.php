<table id="data-table-petugas" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 ">
    <thead class="bg-slate-200 dark:bg-slate-700">
        <tr>
            <th scope="col" class="table-th ">
                NO.
            </th>
            <th scope="col" class="table-th ">
                NAMA
            </th>
            <th scope="col" class="table-th ">
                NIP
            </th>
            <th scope="col" class="table-th ">
                JABATAN
            </th>
            <th scope="col" class="table-th ">
                EDIT/HAPUS
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        @if (count($officers) == 0)
            <tr>
                <td colspan="5" class="text-center">Data tidak ditemukan</td>
            </tr>
        @else
            @foreach ($officers as $key => $value)
                <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                    <td class="table-td">
                        {{ $startingIndex + $key }}
                    </td>
                    <td class="table-td">
                        <div class="flex space-x-3 items-center text-left rtl:space-x-reverse">
                            <div class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                {{ $value->name }}
                            </div>
                        </div>
                    </td>
                    <td class="table-td">
                        <div class="flex space-x-3 items-center text-left rtl:space-x-reverse">
                            <div class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                {{ $value->nip }}
                            </div>
                        </div>
                    </td>
                    <td class="table-td">
                        <div class="flex space-x-3 items-center text-left rtl:space-x-reverse">
                            <div class="flex-1 font-medium text-sm leading-4 whitespace-nowrap">
                                {{ $value->jabatan }}
                            </div>
                        </div>
                    </td>
                    <td class="table-td">
                        <a title="Update Data" class="update-pen mr-1 edit-btn" data-id="{{ $value->id }}"
                            data-bs-toggle="modal" data-bs-target="#modalCreate">
                            <iconify-icon icon="uil:pen"></iconify-icon>
                        </a>
                        <a title="Delete Data" class="update-pen delete-btn" data-id="{{ $value->id }}"
                            data-bs-toggle="modal" data-bs-target="#modalDelete">
                            <iconify-icon style="color: red" icon="mdi:delete"></iconify-icon>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
