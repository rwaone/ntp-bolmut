<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Http\Requests\StoreSampleRequest;
use App\Http\Requests\UpdateSampleRequest;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples = Sample::join('desas', 'samples.desa_id', 'desas.id')
            ->join('kecamatans', 'desas.kecamatan_id', 'kecamatans.id')
            ->select(
                'samples.id',
                'samples.respondent_name',
                'samples.desa_id',
                'desas.name as desa_name',
                'desas.code as desa_code',
                'kecamatans.id as kecamatan_id',
                'kecamatans.code as kecamatan_code',
                'kecamatans.name as kecamatan_name',
            )->paginate(10);
        $kecamatans = Kecamatan::all();

        // $master_wilayah = Desa::join('kecamatans','kecamatans.id','desas.kecamatan_id')
        // ->join('kabupatens','kabupatens.id','kecamatans.kabupaten_id')
        // ->paginate(10);
        $breadcrumbsItems = [
            [
                'name' => 'Master Sampel',
                'url' => '/master/samples',
                'active' => true
            ],
        ];

        return view('master/samples/index', [
            'pageTitle' => 'Master Sampel',
            'breadcrumbItems' => $breadcrumbsItems,
            'samples' => $samples, 'kecamatans' => $kecamatans

        ]);
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
     * @param  \App\Http\Requests\StoreSampleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSampleRequest $request)
    {
        try {
            //code...
            $validatedData = $request->validated();
            DB::beginTransaction();
            Sample::create($validatedData);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit(Sample $sample)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSampleRequest  $request
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSampleRequest $request)
    {
        try {
            //code...
            DB::beginTransaction();
            $validatedData = $request->validated();
            $sample = Sample::find($validatedData['id']);

            $newData = [
                'desa_id' => $validatedData['desa_id'],
                'respondent_name' => $validatedData['respondent_name'],
            ];
            $sample->update($newData);
            DB::commit();
            return response()->json([], 204);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sample $sample)
    {
        try {
            //code...
            DB::beginTransaction();
            $sample->delete();
            DB::commit();
            return response()->json([], 204);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
