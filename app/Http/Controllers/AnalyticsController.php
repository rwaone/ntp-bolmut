<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        $index_series = $this->getIndexSeries();

        return view('analytics', [
            'pageTitle' => 'Analytics',
            'breadcrumbItems' => $breadcrumbsItems,
            'index_series' => $index_series
        ]);
    }

    private function getIndexSeries()
    {
        
        $ntp = (object) array('name'=> "NTP",
        'data' => [101, 105, 103, 100, 106, 112, 102, 100, 107]);

        $ntup = (object) array('name'=> "NTUP",
        'data' => [98, 104, 103, 98, 102, 110, 101, 100, 104]);

        $index_series = array($ntp, $ntup);

        return $index_series;
    }
}
