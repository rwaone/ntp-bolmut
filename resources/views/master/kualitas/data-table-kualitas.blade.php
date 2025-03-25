
    <tbody id="data-table-kualitas" class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        @foreach ($data as $key => $value)
            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                <td class="table-td">
                    {{ $key + 1 }}
                </td>
                <td class="table-td">
                    {{ $value->commodity->name }}
                </td>
                <td class="table-td">
                    {{ $value->name }}
                </td>
                <td class="table-td">
                    {{ $value->code }}
                </td>
                <td class="table-td">
                    {{ $value->satuan }}
                </td>
                <td class="table-td change-attributes">
                    {{ $value->min_price }}
                </td>
                <td class="table-td change-attributes">
                    {{ $value->max_price }}
                </td>
                <td class="table-td">
                    {{ $value->status }}
                </td>
                <td class="table-td">
                    {{ $value->createdBy }} - {{ $value->reviewedBy ? $value->reviewedBy : 'Belum direview' }}
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
