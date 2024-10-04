<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Desa::join('kecamatans', 'desas.kecamatan_id', 'kecamatans.id')
            ->join('kabupatens', 'kecamatans.kabupaten_id', 'kabupatens.id')
            ->select(
                'desas.*',
                'kecamatans.code as kode_kec',
                'kecamatans.name as kec',
                'kabupatens.code as kode_kabkot',
                'kabupatens.name as kabkot'
            );

        $kecamatan = $request->query('kecamatan_name');
        $desa = $request->query('desa_name');
        $stat_pem = $request->query('stat_pem');

        if ($kecamatan) {
            $query->where('kecamatans.name', 'like', '%' . $kecamatan . '%');
        }

        if ($desa) {
            $query->where('desas.name', 'like', '%' . $desa . '%');
        }
        if ($stat_pem) {
            $query->where('desas.stat_pem', 'like', '%' . $stat_pem . '%');
        }

        $master_wilayah = $query->paginate(10);


        $breadcrumbsItems = [
            [
                'name' => 'Master Wilayah',
                'url' => '/wilayah',
                'active' => true
            ],
        ];

        return view('master/wilayah/index', [
            'pageTitle' => 'Master Wilayah',
            'breadcrumbItems' => $breadcrumbsItems,
            'master_wilayah' => $master_wilayah

        ]);
    }
    public function edit($id)
    {

        $kecamatans = Kecamatan::all();

        $master_wilayah = Desa::where('desas.id', $id)
            ->join('kecamatans', 'desas.kecamatan_id', 'kecamatans.id')
            ->join('kabupatens', 'kecamatans.kabupaten_id', 'kabupatens.id')
            ->select('desas.*', 'kecamatans.id as id_kec', 'kecamatans.code as kode_kec', 'kecamatans.name as kec', 'kabupatens.id as id_kabkot', 'kabupatens.code as kode_kabkot', 'kabupatens.name as kabkot')
            ->first();
        $breadcrumbsItems = [
            [
                'name' => 'Master Wilayah',
                'url' => '/wilayah',
                'active' => true
            ],
        ];

        return view('master/wilayah/edit', [
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

        return view('master/wilayah/create', [
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

        return redirect('master/wilayah', 302)->with('message', 'berhasil menambahkan wilayah baru');
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
    public function update(UpdateDesaRequest $request)
    {
        $validatedData = $request->validated();
        //code...


        // insert new kecamatan\
        try {
            //code...
            $desa_data = [
                'kecamatan_id' => $validatedData['kecamatan_id'],
                'code' => $validatedData['desa_code'],
                'name' => $validatedData['desa_name'],
                'stat_pem' => $validatedData['stat_pem'],
            ];


            $kecamatan_data = [
                'code' => $validatedData['kecamatan_code'],
                'name' => $validatedData['kecamatan_name'],

            ];
            DB::beginTransaction();
            Kecamatan::where('id', $validatedData['kecamatan_id'])->update($kecamatan_data);

            Desa::where('id', $validatedData['desa_id'])->update($desa_data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json([]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        $desa->delete();
        return response()->json($desa, 200);
    }

    public function fetch_by_kecamatan(String $id)
    {
        $desas = Desa::where('kecamatan_id', $id)->get();
        return response()->json($desas, 200);
    }
    public function fetch(Request $request)
    {
        $kecamatan_id = $request->query('kecamatan_id');
        if ($kecamatan_id) {
            $desas = Desa::where('kecamatan_id', $kecamatan_id)->get();
            return response()->json($desas, 200);
        }
    }
}
