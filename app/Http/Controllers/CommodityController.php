<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Http\Requests\StoreCommodityRequest;
use App\Http\Requests\UpdateCommodityRequest;

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
