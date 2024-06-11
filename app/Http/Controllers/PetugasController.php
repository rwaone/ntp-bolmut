<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;
use Illuminate\Support\Facades\Log;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Petugas::all();
        // dd($officers);
        $breadcrumbsItems = [
            [
                'name' => 'Petugas',
                'url' => '/petugas',
                'active' => true
            ],
        ];

        return response()->view('master/petugas/index', [
            'pageTitle' => 'Master Petugas',
            'breadcrumbItems' => $breadcrumbsItems,
            'officers' => $officers,
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
     * @param  \App\Http\Requests\StorePetugasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetugasRequest $request)
    {
         // Validate the request data
         $validatedData = $request->validated();

         try {
            // Create a new Petugas record
            $petugas = Petugas::create($validatedData);

            // Return a response
            return response()->json([
                'message' => 'Petugas created successfully',
                'data' => $petugas
            ], 201);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error creating Petugas: ' . $e->getMessage());

            // Return an error response
            return response()->json([
                'message' => 'An error occurred while creating the Petugas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetugasRequest  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetugasRequest $request, Petugas $petugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        //
    }

    public function getTableData()
    {
        $officers = Petugas::all();
        // dd($officers);
        return view('master.petugas.data-table', compact('officers'))->render();
    }
}
