<table id="data-table-komoditas" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 ">
    <thead class="bg-slate-200 dark:bg-slate-700">
        <tr>
            <th scope="col" class="table-th ">
                No.
            </th>
            <th scope="col" class="table-th ">
                Dokumen
            </th>
            <th scope="col" class="table-th ">
                Bagian
            </th>
            <th scope="col" class="table-th ">
                Nama Grup
            </th>
            <th scope="col" class="table-th ">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        @foreach ($groups as $key => $group)
            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                <td class="table-td">
                    {{ $loop->iteration }}
                </td>
                <td class="table-td">
                    {{ $group->section->document->name }}
                </td>
                <td class="table-td">
                    {{ $group->section->name }}
                </td>
                <td class="table-td">
                    {{ $group->name }}
                </td>
                <td class="table-td">
                    <a title="Update Data" class="update-pen mr-1" onclick="update({{ $group->id }})"
                        data-bs-toggle="modal" data-bs-target="#modalUpdate">
                        <iconify-icon icon="uil:pen"></iconify-icon>
                    </a>
                    <a title="Delete Data" class="update-pen" onclick="deleteConfirm({{ $group->id }})"
                        data-bs-toggle="modal" data-bs-target="#modalDelete">
                        <iconify-icon style="color: red" icon="mdi:delete"></iconify-icon>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
