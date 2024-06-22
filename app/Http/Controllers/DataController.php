<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Http\Requests\StoreDataRequest;
use App\Http\Requests\UpdateDataRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataRequest $request)
    {
        $data = $request->validated();

        try {
            //code...
            $createdData = Data::create($data);


            return response()->json(['message' => 'berhasil menambahkan data'], 201);
        } catch (\Exception $ex) {
            return response()->json($ex, 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataRequest  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataRequest $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        try {
            //code...
            DB::beginTransaction();
            $data->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function fetch(Request $request)
    {
        $sectionId = $request->query('sectionId');
        $responseId = $request->query('responseId');
        $isChange = $request->query('isChange');
        $data = Data::join('qualities', 'data.quality_id', 'qualities.id')
            ->join('commodities', 'qualities.commodity_id', 'commodities.id')
            ->join('groups', 'commodities.group_id', 'groups.id')
            ->join('sections', 'groups.section_id', 'sections.id')
            ->join('responses', 'data.response_id', 'responses.id')
            ->select('qualities.id as quality_id', 'qualities.commodity_id', 'commodities.name as commodity_name', 'qualities.name as quality_name', 'qualities.code as quality_code', 'qualities.satuan', 'groups.id as group_id', 'data.*');

        if ($sectionId) {
            $data->where('sections.id', $sectionId);
        }
        if ($responseId) {
            $data->where('data.response_id', $responseId);
        }

        // get prev price by id data and assign to current data
        // get sample with bys 

        // get prev response
        // get quality
        // get prev data

        $data = $data->get();
        if ($isChange == '1') {
        }
        return response()->json($data, 200);
    }
}
