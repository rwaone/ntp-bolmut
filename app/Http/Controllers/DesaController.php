<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master_wilayah = Desa::paginate(10);
        // $master_wilayah = Desa::join('kecamatans','kecamatans.id','desas.kecamatan_id')
        // ->join('kabupatens','kabupatens.id','kecamatans.kabupaten_id')
        // ->paginate(10);
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
        // $master_wilayah = MasterWilayah::where('iddesa', $id)->first();
        // $kecamatan = MasterWilayah::select('kec', 'kode_kec')->groupBy('kec', 'kode_kec')->get();
        // $desa = MasterWilayah::select('desa', 'kode_desa')->groupBy('desa', 'kode_desa')->get();
        // $breadcrumbsItems = [
        //     [
        //         'name' => 'Ubah Master Wilayah',
        //         'url' => '/wilayah/ubah',
        //         'active' => true
        //     ],
        // ];

        // return view('master/wilayah-ubah', [
        //     'pageTitle' => 'Ubah Master Wilayah',
        //     'breadcrumbItems' => $breadcrumbsItems,
        //     'wilayah' => $master_wilayah,
        //     'kecamatan' => $kecamatan,
        //     // 'desa' => $desa
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDesaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDesaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDesaRequest  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDesaRequest $request, Desa $desa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        //
    }
}
