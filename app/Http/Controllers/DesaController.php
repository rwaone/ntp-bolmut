<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master_wilayah = Desa::join('kecamatans', 'desas.kecamatan_id', 'kecamatans.id')
            ->join('kabupatens', 'kecamatans.kabupaten_id', 'kabupatens.id')
            ->select(
                'desas.*',
                'kecamatans.code as kode_kec',
                'kecamatans.name as kec',
                'kabupatens.code as kode_kabkot',
                'kabupatens.name as kabkot'
            )
            ->paginate(10);
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

        return view('master/wilayah/desa/index', [
            'pageTitle' => 'Master Wilayah',
            'breadcrumbItems' => $breadcrumbsItems,
            'master_wilayah'=>$master_wilayah

        ]);
    }
    public function edit($id)
    {
       
        $kecamatans = Kecamatan::all();
        
        $master_wilayah = Desa::where('desas.id',$id)
        ->join('kecamatans','desas.kecamatan_id','kecamatans.id')
        ->join('kabupatens','kecamatans.kabupaten_id','kabupatens.id')
        ->select('desas.*','kecamatans.id as id_kec','kecamatans.code as kode_kec','kecamatans.name as kec','kabupatens.id as id_kabkot','kabupatens.code as kode_kabkot','kabupatens.name as kabkot')
        ->first();
        $breadcrumbsItems = [
            [
                'name' => 'Master Wilayah',
                'url' => '/wilayah',
                'active' => true
            ],
        ];

        return view('master/wilayah/desa/edit', [
            'pageTitle' => 'Master Wilayah',
            'breadcrumbItems' => $breadcrumbsItems,
            'kecamatans' => $kecamatans,
            'master_wilayah' => $master_wilayah,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $kecamatans = Kecamatan::all();
        $breadcrumbsItems = [
            [
                'name' => 'Master Wilayah',
                'url' => '/wilayah',
                'active' => true
            ],
        ];

        return view('master/wilayah/desa/create', [
            'pageTitle' => 'Master Wilayah',
            'breadcrumbItems' => $breadcrumbsItems,
            'kecamatans' => $kecamatans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDesaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDesaRequest $request)
    {
        $validatedData = $request->validated();

        if (isset($validatedData['kecamatan_id'])) {
            try {
                //code...
                $desa = [
                    'kecamatan_id' => $validatedData['kecamatan_id'],
                    'code' => $validatedData['desa_code'],
                    'name' => $validatedData['desa_name'],
                    'stat_pem' => $validatedData['stat_pem'],
                ];
                DB::beginTransaction();
                Desa::create($desa);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
        } else {
            // insert new kecamatan\
            try {
                //code...
                $kecamatanData = [
                    'code' => $validatedData['kecamatan_code'],
                    'name' => $validatedData['kecamatan_name'],
                    'kabupaten_id' => 1

                ];
                DB::beginTransaction();
                $kecamatan = Kecamatan::create($kecamatanData);
                $desa = [
                    'kecamatan_id' => $kecamatan->id,
                    'code' => $validatedData['desa_code'],
                    'name' => $validatedData['desa_name'],
                    'stat_pem' => $validatedData['stat_pem'],
                ];
                Desa::create($desa);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
        }

        return redirect('master/wilayah/desa',302)->with('message','berhasil menambahkan wilayah baru');
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
