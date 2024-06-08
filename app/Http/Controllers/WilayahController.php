<?php

namespace App\Http\Controllers;

use App\Models\MasterWilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index()
    {
        $master_wilayah = MasterWilayah::paginate(10);
        $breadcrumbsItems = [
            [
                'name' => 'Master Wilayah',
                'url' => '/wilayah',
                'active' => true
            ],
        ];

        return view('master/wilayah', [
            'pageTitle' => 'Master Wilayah',
            'breadcrumbItems' => $breadcrumbsItems,
            'master_wilayah' => $master_wilayah
        ]);
    }
    public function edit($id)
    {
        $master_wilayah = MasterWilayah::where('iddesa', $id)->first();
        $breadcrumbsItems = [
            [
                'name' => 'Ubah Master Wilayah',
                'url' => '/wilayah/ubah',
                'active' => true
            ],
        ];

        return view('master/wilayah-ubah', [
            'pageTitle' => 'Ubah Master Wilayah',
            'breadcrumbItems' => $breadcrumbsItems,
            'wilayah' => $master_wilayah
        ]);
    }
}
