<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Petugas::paginate(10);
        $startingIndex = ($officers->currentPage() - 1) * $officers->perPage() + 1;
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
            'current_page' => $officers->currentPage(),
            'last_page' => $officers->lastPage(),
            'total' => $officers->total(),
            'per_page' => $officers->perPage(),
            'startingIndex' => $startingIndex,
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
    public function edit($id)
    {
        $petugas = Petugas::find($id);

        if ($petugas) {
            return response()->json($petugas, 200);
        } else {
            return response()->json(['message' => 'Petugas not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetugasRequest  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetugasRequest $request, $id)
    {
        $method = $request->method();

        if ($request->isMethod('PUT')) {
            try {
                // Validate the request data
                $validatedData = $request->validated();

                // Find the petugas record or throw an exception
                $petugas = Petugas::findOrFail($id);

                // Check if the data is validated
                if ($validatedData) {
                    // Update the petugas record
                    $petugas->update($validatedData);

                    return response()->json([
                        'message' => 'Petugas updated successfully',
                        'data' => $petugas
                    ], 201);
                } else {
                    // Return an error response if data is not validated
                    return response()->json(['error' => 'Invalid data provided.']);
                }
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                // Handle the case when the petugas record is not found
                return response()->json(['error' => 'Petugas not found.'], 404);
            } catch (\Exception $e) {
                // Log the exception message or details
                Log::error('Error updating petugas: ' . $e->getMessage());

                // Return an error response
                return response()->json(['error' => 'An error occurred while updating the petugas.'], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        $petugas->delete();

        return response()->json([
            'message' => 'Petugas deleted successfully.'
        ], 200);
    }

    public function getTableData(Request $request)
    {
        $pageSize = $request->query('size', 10);
        $searchQuery = $request->query('search', '');
        $officers = Petugas::where('name', 'like', "%$searchQuery%")
            ->orWhere('nip', 'like', "%$searchQuery%")
            ->orWhere('jabatan', 'like', "%$searchQuery%")
            ->paginate($pageSize);

        $startingIndex = ($officers->currentPage() - 1) * $officers->perPage() + 1;

        return response()->json([
            'html' => view('master.petugas.data-table', compact('officers', 'startingIndex'))->render(),
            'data' => $officers->items(),
            'current_page' => $officers->currentPage(),
            'last_page' => $officers->lastPage(),
            'total' => $officers->total(),
            'per_page' => $officers->perPage(),
        ]);
    }

    public function getPengawas()
    {
        $daftar_pengawas = Petugas::where('jabatan', 'Pengawas')->get();
        return response()->json($daftar_pengawas, 200,);
    }
    public function getPencacah()
    {
        $daftar_pencacah = Petugas::where('jabatan', 'Pencacah')->get();
        return response()->json($daftar_pencacah, 200,);
    }
    public function fetch(Request $request)
    {
        try {
            //code...
            $daftar_petugas = Petugas::get();
            return response()->json($daftar_petugas,200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"something was wrong"],500);
            //throw $th;
        }
    }
}
