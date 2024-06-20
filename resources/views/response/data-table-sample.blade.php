<table id="data-table-sample" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 ">
    <thead class="bg-slate-200 dark:bg-slate-700">
        <tr>
            <th scope="col" class="table-th ">
                NO.
            </th>
            <th scope="col" class="table-th ">
                NAMA RESPONDEN
            </th>
            @foreach (range(1, 12) as $month)
                <th scope="col" class="table-th" style="text-align: center;">
                    {{ \Carbon\Carbon::createFromDate(null, $month)->formatLocalized('%b') }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        @if ($data)
            @foreach ($data as $key => $value)
                <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                    <td class="table-td">
                        {{ $key + 1 }}
                    </td>
                    <td class="table-td">
                        {{ $value->respondent_name }}
                    </td>
                    @foreach (range(1, 12) as $month)
                        <td class="text-center">
                            @php
                                $status = $value->{'month_' . $month};
                            @endphp
                            @if ($status === 'B')
                                <div
                                    class="inline-flex w-full items-center justify-center bg-slate-400 text-white px-2 py-1">
                                    <p class="inline-block mr-2" title="Blank">B</p>
                                    <a title="Update Data" class="inline-block update-pen mr-1 edit-btn"
                                        data-id="{{ $value->id }}" data-bs-toggle="modal"
                                        data-bs-target="#modalCreate">
                                        <iconify-icon icon="uil:pen"></iconify-icon>
                                    </a>
                                </div>
                            @elseif ($status === 'E')
                                <div
                                    class="inline-flex w-full items-center justify-center bg-red-500 text-white px-2 py-1">
                                    <p class="inline-block mr-2" title="Blank">E</p>
                                    <a title="Update Data" class="inline-block update-pen mr-1 edit-btn"
                                        data-id="{{ $value->id }}" data-bs-toggle="modal"
                                        data-bs-target="#modalCreate">
                                        <iconify-icon icon="uil:pen"></iconify-icon>
                                    </a>
                                </div>
                            @elseif ($status === 'C')
                                <div
                                    class="inline-flex w-full items-center justify-center bg-green-500 text-white px-2 py-1">
                                    <p class="inline-block mr-2" title="Blank">C</p>
                                    <a title="Update Data" class="inline-block update-pen mr-1 edit-btn"
                                        data-id="{{ $value->id }}" data-bs-toggle="modal"
                                        data-bs-target="#modalCreate">
                                        <iconify-icon icon="uil:pen"></iconify-icon>
                                    </a>
                                </div>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        @else
            <tr class="text-center even:bg-slate-50 dark:even:bg-slate-700">
                <td colspan="14">Data Tidak Ada</td>
            </tr>
        @endif
    </tbody>
</table>
