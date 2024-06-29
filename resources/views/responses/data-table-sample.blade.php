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
                    {{ \Carbon\Carbon::createFromDate(null, $month)->formatLocalized('%b') }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        @if (!empty($data) && count($data) > 0)
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
                                $previousMonthStatus = $month === 1 ? 'C' : $value->{'month_' . ($month - 1)};
                                $buttonDisabled =
                                    $month !== 1 && ($previousMonthStatus !== 'C' && $previousMonthStatus !== 'W');
                            @endphp

                            @if ($status === 'B')
                                <div
                                    class="inline-flex w-full items-center justify-center bg-slate-500 text-white px-2 py-1">
                                    <p class="inline-block mr-2" title="Blank">B</p>
                                    @if (!$buttonDisabled)
                                        <button id="entri-{{ $value->id }}" title="Entri Data"
                                            class="inline-block update-pen mr-1 entri-btn" data-id="{{ $value->id }}"
                                            data-year="{{ $year }}" data-month="{{ $month }}">
                                            <iconify-icon icon="uil:pen"></iconify-icon>
                                        </button>
                                    @endif
                                </div>
                            @elseif ($status === '-')
                                <div class="inline-flex w-full items-center justify-center px-2 py-1">
                                    <p class="inline-block mr-2">-</p>
                                    @if (!$buttonDisabled)
                                        <button id="entri-{{ $value->id }}" title="Entri Data"
                                            class="inline-block update-pen mr-1 entri-btn" data-id="{{ $value->id }}"
                                            data-year="{{ $year }}" data-month="{{ $month }}">
                                            <iconify-icon icon="uil:pen"></iconify-icon>
                                        </button>
                                    @endif
                                </div>
                            @elseif ($status === 'E')
                                <div
                                    class="inline-flex w-full items-center justify-center bg-red-500 text-white px-2 py-1">
                                    <p class="inline-block mr-2" title="Error">E</p>
                                    @if (!$buttonDisabled)
                                        <button id="entri-{{ $value->id }}" title="Entri Data"
                                            class="inline-block update-pen mr-1 entri-btn"
                                            data-id="{{ $value->id }}" data-year="{{ $year }}"
                                            data-month="{{ $month }}">
                                            <iconify-icon icon="uil:pen"></iconify-icon>
                                        </button>
                                    @endif
                                </div>
                            @elseif ($status === 'C')
                                <div
                                    class="inline-flex w-full items-center justify-center bg-green-500 text-white px-2 py-1">
                                    <p class="inline-block mr-2" title="Clean">C</p>
                                    <button id="entri-{{ $value->id }}" title="Entri Data"
                                        class="inline-block update-pen mr-1 entri-btn" data-id="{{ $value->id }}"
                                        data-year="{{ $year }}" data-month="{{ $month }}">
                                        <iconify-icon icon="uil:pen"></iconify-icon>
                                    </button>
                                </div>
                            @elseif ($status === 'W')
                                <div
                                    class="inline-flex w-full items-center justify-center bg-orange-400 text-white px-2 py-1">
                                    <p class="inline-block mr-2" title="Warning">W</p>
                                    <button id="entri-{{ $value->id }}" title="Entri Data"
                                        class="inline-block update-pen mr-1 entri-btn" data-id="{{ $value->id }}"
                                        data-year="{{ $year }}" data-month="{{ $month }}">
                                        <iconify-icon icon="uil:pen"></iconify-icon>
                                    </button>
                                </div>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        @else
            <tr class="text-center even:bg-slate-50 dark:even:bg-slate-700">
                <td colspan="14">Data tidak ditemukan</td>
            </tr>
        @endif
    </tbody>
</table>
