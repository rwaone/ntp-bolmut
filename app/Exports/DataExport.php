<?php

namespace App\Exports;

use App\Models\Data;
use App\Models\Response;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class DataExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function forYear(int $year)
    {
        $this->year = $year;
        return $this;
    }


    public function forMonth(int $month)
    {
        $this->month = $month;
        return $this;
    }

    public function forDocument(int $document)
    {
        $this->document = $document;
        return $this;
    }

    public function headings(): array
    {
        return
            [
                "desa_sampel",
                "responden",
                "response_id",
                "tahun",
                "bulan",
                "komoditas_usaha",
                "blok",
                "kelompok",
                "komoditas",
                "quality_id",
                "kualitas",
                "satuan",
                "harga",
            ];
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        // return Response::query()->whereYear('year', $this->year);
        return Data::query()->select("desas.name", "samples.respondent_name", "data.response_id", 'responses.year', 'responses.month', 'responses.commodities AS usaha', 'sections.name AS blok', 'groups.name AS kelompok', 'commodities.name AS komoditas','data.quality_id', 'qualities.name AS kualitas', 'qualities.satuan AS satuan', 'data.price AS harga')
            ->join('responses', 'responses.id', '=', 'data.response_id')
            ->join('samples', 'samples.id', '=', 'responses.sample_id')
            ->join('desas', 'desas.id', '=', 'samples.desa_id')
            ->join('qualities', 'qualities.id', '=', 'data.quality_id')
            ->join('commodities', 'commodities.id', '=', 'qualities.commodity_id')
            ->join('groups', 'groups.id', '=', 'commodities.group_id')
            ->join('sections', 'sections.id', '=', 'groups.section_id')
            ->where('responses.year', '=', $this->year)
            ->where('responses.month', '=', $this->month)
            ->where('responses.document_id', '=', $this->document);
    }
}
