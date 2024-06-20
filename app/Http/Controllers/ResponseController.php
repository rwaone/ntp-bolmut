<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
use App\Models\Document;
use App\Models\Quality;
use App\Models\Sample;
use App\Models\Kabupaten;
use App\Models\Section;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = Response::query();
        // $data = $query->get();
        // $year = Response::distinct()->pluck('year');
        $currentYear = date("Y");
        $years = [
            $currentYear - 1,
            $currentYear,
            $currentYear + 1
        ];
        $kabkot = Kabupaten::get();
        $documents = Document::get();
        return view('response/index', [
            'data' => null,
            'kabkot' => $kabkot,
            'tahun' => $years,
            'dokumen' => $documents,
        ]);
    }

    public function fetchSample(Request $request)
    {
        // dd($request);
        // $data = Sample::leftJoin('responses as r', 'r.sample_id', '=', 'samples.id')
        //     ->where('desa_id', $request->desa)
        //     ->where('samples.document_id', $request->dokumen)
        //     ->select([
        //         'r.*',
        //         'respondent_name as nama_responden'
        //     ])
        //     ->get();

        $data = Sample::select('samples.id', 'samples.respondent_name', 'samples.document_id')
            ->leftJoin('responses', 'responses.sample_id', '=', 'samples.id')
            ->selectRaw('CASE WHEN MAX(CASE WHEN responses.month = 1 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 1 THEN responses.status END) END AS month_1,
                         CASE WHEN MAX(CASE WHEN responses.month = 2 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 2 THEN responses.status END) END AS month_2,
                         CASE WHEN MAX(CASE WHEN responses.month = 3 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 3 THEN responses.status END) END AS month_3,
                         CASE WHEN MAX(CASE WHEN responses.month = 4 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 4 THEN responses.status END) END AS month_4,
                         CASE WHEN MAX(CASE WHEN responses.month = 5 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 5 THEN responses.status END) END AS month_5,
                         CASE WHEN MAX(CASE WHEN responses.month = 6 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 6 THEN responses.status END) END AS month_6,
                         CASE WHEN MAX(CASE WHEN responses.month = 7 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 7 THEN responses.status END) END AS month_7,
                         CASE WHEN MAX(CASE WHEN responses.month = 8 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 8 THEN responses.status END) END AS month_8,
                         CASE WHEN MAX(CASE WHEN responses.month = 9 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 9 THEN responses.status END) END AS month_9,
                         CASE WHEN MAX(CASE WHEN responses.month = 10 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 10 THEN responses.status END) END AS month_10,
                         CASE WHEN MAX(CASE WHEN responses.month = 11 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 11 THEN responses.status END) END AS month_11,
                         CASE WHEN MAX(CASE WHEN responses.month = 12 THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 12 THEN responses.status END) END AS month_12')
            ->groupBy('samples.id', 'samples.document_id', 'samples.respondent_name')
            ->get();
            
        

        // if ($data) {
        // foreach ($data as $key => $value) {
        //     # code...
        //     $check = Response::join('documents', 'documents.id', '=', 'responses.document_id')
        //         ->join('users as petugas', 'petugas.id', '=', 'responses.petugas_id')
        //         ->join('users as pengawas', 'pengawas.id', '=', 'responses.pengawas_id')
        //         ->join('users as creator', 'creator.id', '=', 'responses.created_by')
        //         ->join('users as reviewer', 'reviewer.id', '=', 'responses.reviewed_by')
        //         ->where('sample_id', $value->id)
        //         ->select([
        //             'documents.type as tipe_dokumen',
        //             'responses.*',
        //             'petugas.name as petugas',
        //             'pengawas.name as pengawas',
        //             'creator.name as creator',
        //             'reviewer.name as reviewer', 
        //         ])
        //         ->first();
        //     $value->response = ($check) ? 'Sudah' : 'Belum';
        //     $value->response_updatedAt = ($check) ? $check->updated_at : 'Belum';
        //     $value->tipe_dokumen = ($check) ? $check->tipe_dokumen : 'Belum';
        //     $value->petugas = ($check) ? $check->petugas : 'Belum';
        //     $value->pengawas = ($check) ? $check->pengawas : 'Belum';
        //     $value->creator = ($check) ? $check->creator : 'Belum';
        //     $value->reviewer = ($check) ? $check->reviewer : 'Belum';
        // }
        // }
        $html = view('response/data-table-sample', compact('data'))->render(); 
        return response()->json([
            'html' => $html,
            'data' => $data,
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
    * Store the initial entry details and redirect to the data entry form.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function storeInitialResponse()
    {
        // return;
        try {
            // Validate the request data
            // $validatedData = $request->validate([
            //     'sample_id' => 'required|exists:samples,id',
            //     'year' => 'required|digits:4|integer|min:2000|max:' . (date('Y')),
            //     'month' => 'required|digits:2|integer|between:1,12',
            // ]);
            
            // Check if a response already exists for the given month, year, and sample
            $existingResponse = Response::where('sample_id', '9c5493c2-2dcc-465e-9c66-7834b253bea5')
            ->where('month', 1)
            ->where('year', 2024)
            ->first();
            

            if ($existingResponse != null) {
                // If a response already exists, redirect to the existing response's data entry form
                //Catatan : Belum menghandle kondisi jika sudah entri sebagian
                
                return redirect()->route('response.edit', [
                   'response' => $existingResponse,
                ]);
            }

            $sample = Sample::findOrFail('9c5493c2-2dcc-465e-9c66-7834b253bea5');

            
            // Create a new response record
            $response = Response::create([
                'document_id' => $sample->document_id,
                'sample_id' => '9c5493c2-2dcc-465e-9c66-7834b253bea5',
                'month' => '1',
                'year' => '2024',
                // Add any other necessary data
            ]);

            // Redirect to the data entry form with the response ID and necessary data
            return redirect()->route('response.edit', [
                'response' => $response,
                
            ]);

            // // Redirect to the data entry form
            // return redirect()->route('surveys.data.create');
        } catch (\Throwable $th) {
            // Handle the exception
            throw $th;
            
            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Store or update the remaining response fields and price data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeResponseData(Request $request, Response $response)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'petugas_id' => 'required|exists:users,id',
                'pengawas_id' => 'nullable|exists:users,id',
                'enumeration_date' => 'required|date',
                // Add any other validation rules for additional fields
            ]);

            // Update the response with the validated data
            $response->update($validatedData);

            // Store or update the price data in the "data" table
            $priceData = $request->input('price_data', []);
            $existingData = $response->data->keyBy('quality_id');
            $errorQualityData = [];

            // Get the previous month's response data
            $previousMonth = $response->month === 1 ? 12 : $response->month - 1;
            $previousYear = $response->month === 1 ? $response->year - 1 : $response->year;
            $previousResponse = Response::where('sample_id', $response->sample_id)
                ->where('month', $previousMonth)
                ->where('year', $previousYear)
                ->first();
            $previousPriceData = $previousResponse ? $previousResponse->data->keyBy('quality_id') : collect();

            foreach ($priceData as $qualityId => $price) {
                $quality = Quality::findOrFail($qualityId);
                $commodity = $quality->commodity;

                // Check if the price is within the min_price and max_price of the quality
                if ($price < $quality->min_price || $price > $quality->max_price) {
                    $errorQualityData[] = [
                        'quality_id' => $qualityId,
                        'error' => "Harga harus berada pada rentang {$quality->min_price} sampai {$quality->max_price}",
                    ];
                    continue;
                }

                // Check if the price change from the previous month is within the min_change and max_change of the commodity
                if ($previousPriceData->has($qualityId)) {
                    $previousPrice = $previousPriceData[$qualityId]->price;
                    $priceChange = abs($price - $previousPrice);
                    $minChange = $commodity->min_change ?? 0;
                    $maxChange = $commodity->max_change ?? PHP_INT_MAX;

                    if ($priceChange < $minChange || $priceChange > $maxChange) {
                        $errorQualityData[] = [
                            'quality_id' => $qualityId,
                            'error' => "Perubahan harga harus berada pada rentang {$minChange} sampai {$maxChange}",
                        ];
                        continue;
                    }
                }

                if ($existingData->has($qualityId)) {
                    // Update the existing record
                    $existingData[$qualityId]->price = $price;
                    $existingData[$qualityId]->save();
                } else {
                    // Create a new record
                    $response->data()->create([
                        'quality_id' => $qualityId,
                        'price' => $price,
                    ]);
                }
            }

            // Delete any remaining records that are not present in the new price data
            $existingData->each(function ($data) {
                $data->delete();
            });

            // Redirect with a success message and error quality data
            return redirect()->route('surveys.index')
                ->with('success', 'Response data stored successfully.')
                ->with('errorQualityData', $errorQualityData);
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResponseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResponseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit(Response $response)
    {
        try {
            // Get the sample model
            $sample = Sample::findOrFail($response->sample_id);

            // Get the document model based on the sample's document_id
            $document = Document::findOrFail($sample->document_id);

            // Get the sections associated with the document
            $sections = $document->sections()->with('groups.commodities.qualities')->get();

            // Get the groups associated with the sections
            $groups = $sections->flatMap(function ($section) {
                return $section->groups;
            });

            // Get the commodities associated with the groups
            $commodities = $groups->flatMap(function ($group) {
                return $group->commodities;
            });

            // Get the qualities associated with the commodities
            $qualities = $commodities->flatMap(function ($commodity) {
                return $commodity->qualities;
            });
            
             // Check if a response exists for the previous month
            $previousMonth = $response->month === 1 ? 12 : $response->month - 1;
            $previousYear = $response->month === 1 ? $response->year - 1 : $response->year;
            $previousResponse = Response::where('sample_id', $response->sample_id)
                ->where('month', $previousMonth)
                ->where('year', $previousYear)
                ->first();

            // If a previous response exists, get the selected qualities and prices from it
            $selectedQualities = [];
            $previousPrices = [];
            if ($previousResponse) {
                $selectedQualities = $previousResponse->data->pluck('quality_id')->toArray();
                $previousPrices = $previousResponse->data->mapWithKeys(function ($item) {
                    return [$item->quality_id => $item->price];
                })->toArray();
            }
            
            // Redirect to the data entry form with the response ID and necessary data
            return view('response/edit', [
                'response' => $response,
                'sample' => $sample,
                'document' => $document,
                'sections' => $sections,
                'groups' => $groups,
                'commodities' => $commodities,
                'qualities' => $qualities,
                'selectedQualities' => $selectedQualities,
                'previousPrices' => $previousPrices,
            ]);

        } catch (\Throwable $th) {
            // Handle the exception
            throw $th;
            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResponseRequest  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResponseRequest $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}