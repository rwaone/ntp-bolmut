<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::paginate(10);
        $startingIndex = ($documents->currentPage() - 1) * $documents->perPage() + 1;
        // dd($documents);
        $breadcrumbsItems = [
            [
                'name' => 'Document',
                'url' => '/document',
                'active' => true
            ],
        ];

        return response()->view('master/document/index', [
            'pageTitle' => 'Master Dokumen',
            'breadcrumbItems' => $breadcrumbsItems,
            'documents' => $documents,
            'current_page' => $documents->currentPage(),
            'last_page' => $documents->lastPage(),
            'total' => $documents->total(),
            'per_page' => $documents->perPage(),
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
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
       // Validate the request data
       $validatedData = $request->validated();

       try {
          // Create a new Document record
          $document = Document::create($validatedData);

          // Return a response
          return response()->json([
              'message' => 'Document created successfully',
              'data' => $document
          ], 201);
      } catch (\Exception $e) {
          // Log the error
          Log::error('Error creating Document: ' . $e->getMessage());

          // Return an error response
          return response()->json([
              'message' => 'An error occurred while creating the Document',
              'error' => $e->getMessage()
          ], 500);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);
    
        if ($document) {
            return response()->json($document, 200);
        } else {
            return response()->json(['message' => 'Document not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, $id)
    {
        $method = $request->method();

        if ($request->isMethod('PUT')) {
            try {
                // Validate the request data
                $validatedData = $request->validated();

                // Find the Document record or throw an exception
                $documents = Document::findOrFail($id);

                // Check if the data is validated
                if ($validatedData) {
                    // Update the Document record
                    $documents->update($validatedData);

                    return response()->json([
                        'message' => 'Document updated successfully',
                        'data' => $documents
                    ], 201);
                } else {
                    // Return an error response if data is not validated
                    return response()->json(['error' => 'Invalid data provided.']);
                }
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                // Handle the case when the Document record is not found
                return response()->json(['error' => 'Document not found.'], 404);
            } catch (\Exception $e) {
                // Log the exception message or details
                \Log::error('Error updating Document: ' . $e->getMessage());

                // Return an error response
                return response()->json(['error' => 'An error occurred while updating the Document.'], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return response()->json([
            'message' => 'Document deleted successfully.'
        ], 200);
    }
    public function getTableData(Request $request)
    {
        $pageSize = $request->query('size', 10);
        $searchQuery = $request->query('search', '');
        $documents = Document::where('name', 'like', "%$searchQuery%")
                    ->orWhere('type', 'like', "%$searchQuery%")
                    ->paginate($pageSize);

        $startingIndex = ($documents->currentPage() - 1) * $documents->perPage() + 1;

        return response()->json([
            'html' => view('master.document.data-table', compact('documents', 'startingIndex'))->render(),
            'data' => $documents->items(),
            'current_page' => $documents->currentPage(),
            'last_page' => $documents->lastPage(),
            'total' => $documents->total(),
            'per_page' => $documents->perPage(),
        ]);
    }
}
