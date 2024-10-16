<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Process the uploaded file
        // $import = new ResponseImport;

        // Return the import report to the user
        return Inertia::render('Import/index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.sample_id' => 'required|string|exists:samples,id',
            'responses.*.document_id' => 'required|exists:documents,id',
            'responses.*.month' => 'required',
            'responses.*.year' => 'required',
            'responses.*.petugas_id' => 'required',
            'responses.*.pengawas_id' => 'required',
            'responses.*.enumeration_date' => 'required',
            'responses.*.review_date' => 'required',
            'responses.*.commodities' => 'nullable',
            'responses.*.notes' => 'nullable',
        ]);
        foreach ($validatedData as $key => $value) {
            // cari apakah sudah ada data untuk 
            // sample_id, month, year
            // apabila ada maka update
            // jika tidak maka create
           
        }
        return response()->json($validatedData, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
