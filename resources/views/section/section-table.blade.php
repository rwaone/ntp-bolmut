<table id="data-table-section" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 ">
    <thead class="bg-slate-200 dark:bg-slate-700">
        <tr>
            <th scope="col" class="table-th ">
                No.
            </th>
            <th scope="col" class="table-th ">
                Dokumen
            </th>
            <th scope="col" class="table-th ">
                Nomor Blok
            </th>
            <th scope="col" class="table-th ">
                Nama Blok
            </th>
            <th scope="col" class="table-th ">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        @foreach ($sections as $key => $section)
            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                <td class="table-td">
                    {{ $loop->iteration }}
                </td>
                <td class="table-td">
                    {{ $section->document->name }}
                </td>
                <td class="table-td">
                    {{ $section->title }}
                </td>
                <td class="table-td">
                    {{ $section->name }}
                </td>
                <td class="table-td">
                    <a title="Update Data" class="update-pen mr-1" onclick="update({{ $section->id }})"
                        data-bs-toggle="modal" data-bs-target="#modalUpdate">
                        <iconify-icon icon="uil:pen"></iconify-icon>
                    </a>
                    <a title="Delete Data" class="update-pen" onclick="deleteConfirm({{ $section->id }})"
                        data-bs-toggle="modal" data-bs-target="#modalDelete">
                        <iconify-icon style="color: red" icon="mdi:delete"></iconify-icon>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
