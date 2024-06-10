<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Http\Requests\StoreCommodityRequest;
use App\Http\Requests\UpdateCommodityRequest;
use App\Models\Group;
use Exception;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Commodity::all();
        $forGroupId = Group::all();
        $breadcrumbsItems = [
            [
                'name' => 'Master Komoditas',
                'url' => '/komoditas',
                'active' => true
            ],
        ];
        return view('master/komoditas/index', [
            'pageTitle' => 'Master Komoditas',
            'breadcrumbItems' => $breadcrumbsItems,
            'data' => $data,
            'forGroupId' => $forGroupId,
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
     * @param  \App\Http\Requests\StoreCommodityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommodityRequest $request)
    {
        //
        $validated = $request->validate($request->rules());
        try {
            //code...
            if ($validated['id']) {
                $target = Commodity::find($validated['id']);
                if ($target) {
                    $target->update([
                        'code' => $validated['code'],
                        'group_id' => $validated['group_id'],
                        'name' => $validated['name'],
                        'min_change' => $validated['min_change'],
                        'max_change' => $validated['max_change']
                    ]);
                } else {
                    return response()->json(['Gagal Update']);
                }
            } else $storeData = Commodity::create($validated);
            // $html = view('master/komoditas/index', compact('data'))->render();
            $data = Commodity::get();
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th);
        }
        return view('master/komoditas/data-table-komoditas', compact('data'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function show(Commodity $commodity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(Commodity $commodity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommodityRequest  $request
     * @param  \App\Models\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommodityRequest $request, Commodity $commodity)
    {
        //
    }
    public function fetch(String $id)
    {
        try {
            //code...
            $data = Commodity::where('id', $id)->first();
        } catch (\Throwable $th) {
            //throw $th;
            throw new Exception("Tidak ditemukan", 500);
        }
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commodity $commodity)
    {
        //
    }
}
