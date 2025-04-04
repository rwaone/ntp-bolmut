<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analytic;

class AnalyticsController extends Controller
{
    public function index()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Analytics',
                'url' => '/analytics',
                'active' => true
            ],
        ];

        $this_month = date('m');
        $this_year = date('Y');

        $index_data = $this->getIndexData(2024, '06');
        $index_series = $this->getIndexSeries(2024);
        // dd($index_data);


        return view('analytics', [
            'pageTitle' => 'Analytics',
            'breadcrumbItems' => $breadcrumbsItems,
            'index_series' => $index_series,
            'index_data' => $index_data,
            'this_year' => $this_year,
            'this_month' => $this_month,
        ]);
    }

    public function filter($year, $month)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Analytics',
                'url' => '/analytics',
                'active' => true
            ],
        ];

        $index_data = $this->getIndexData($year, $month);
        $index_series = $this->getIndexSeries($year);


        return view('analytics', [
            'pageTitle' => 'Analytics',
            'breadcrumbItems' => $breadcrumbsItems,
            'index_series' => $index_series,
            'index_data' => $index_data,
        ]);
    }

    private function getIndexSeries($year)
    {

        $ntp_array = Analytic::where('year', $year)->pluck('ntp')->toArray();
        $ntup_array = Analytic::where('year', $year)->pluck('ntup')->toArray();
        // dd([$ntp_array]);

        $ntp = (object) array(
            'name' => "NTP",
            'data' => $ntp_array
        );

        $ntup = (object) array(
            'name' => "NTUP",
            'data' => $ntup_array
        );

        $index_series = array($ntp, $ntup);

        return $index_series;
    }

    private function getIndexData($year, $month)
    {

        $current_data = Analytic::where('year', 'like', "%" . (int)$year . "%")
            ->where('month', 'like', "%" . (int)$month . "%")
            ->first();
        // dd([$current_data, $year, $month]);
        $prev_month = $month - 1;
        $previous_data = Analytic::where('year', 'like', "%" . (int)$year . "%")->where('month', 'like', "%" . (int) $prev_month . "%")->first();
        $index_data = ['current_data' => $current_data, 'previous_data' => $previous_data];

        return $index_data;
    }
}
