<table id="data-table-komoditas" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 ">
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
                PERUBAHAN MINIMUM (%)
            </th>
            <th scope="col" class="table-th ">
                PERUBAHAN MAKSIMUM (%)
            </th>
            <th scope="col" class="table-th ">
                TERAKHIR DI-EDIT
            </th>
            <th scope="col" class="table-th ">
                EDIT/HAPUS
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        @foreach ($data as $key => $value)
            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                <td class="table-td">
                    {{ $key + 1 }}
                </td>
                <td class="table-td">
                    {{ $value->name }}
                </td>
                <td class="table-td">
                    {{ $value->code }}
                </td>
                <td class="table-td">
                    {{ $value->group_id }}
                </td>
                <td class="table-td">
                    {{ $value->min_change }}
                </td>
                <td class="table-td">
                    {{ $value->max_change }}
                </td>
                <td class="table-td">
                    {{ $value->updated_at }}
                </td>
                <td class="table-td">
                    <a title="Update Data" class="update-pen mr-1" onclick="update({{ $value->id }})"
                        data-bs-toggle="modal" data-bs-target="#modalCreate">
                        <iconify-icon icon="uil:pen"></iconify-icon>
                    </a>
                    <a title="Delete Data" class="update-pen" onclick="update({{ $value->id }})"
                        data-bs-toggle="modal" data-bs-target="#modalDelete">
                        <iconify-icon style="color: red" icon="mdi:delete"></iconify-icon>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
