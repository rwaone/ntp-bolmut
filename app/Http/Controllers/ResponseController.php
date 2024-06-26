<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
use App\Models\Commodity;
use App\Models\Data;
use App\Models\Desa;
use App\Models\Document;
use App\Models\Kabupaten;
use App\Models\Quality;
use App\Models\Sample;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Throwable;

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
        $data = Sample::select('samples.id', 'samples.respondent_name', 'samples.document_id')
            ->leftJoin('responses', 'responses.sample_id', '=', 'samples.id')
            ->selectRaw(
                'CASE WHEN MAX(CASE WHEN responses.month = 1 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 1 AND responses.year = ? THEN responses.status END) END AS month_1,
                        CASE WHEN MAX(CASE WHEN responses.month = 2 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 2 AND responses.year = ? THEN responses.status END) END AS month_2,
                        CASE WHEN MAX(CASE WHEN responses.month = 3 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 3 AND responses.year = ? THEN responses.status END) END AS month_3,
                        CASE WHEN MAX(CASE WHEN responses.month = 4 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 4 AND responses.year = ? THEN responses.status END) END AS month_4,
                        CASE WHEN MAX(CASE WHEN responses.month = 5 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 5 AND responses.year = ? THEN responses.status END) END AS month_5,
                        CASE WHEN MAX(CASE WHEN responses.month = 6 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 6 AND responses.year = ? THEN responses.status END) END AS month_6,
                        CASE WHEN MAX(CASE WHEN responses.month = 7 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 7 AND responses.year = ? THEN responses.status END) END AS month_7,
                        CASE WHEN MAX(CASE WHEN responses.month = 8 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 8 AND responses.year = ? THEN responses.status END) END AS month_8,
                        CASE WHEN MAX(CASE WHEN responses.month = 9 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 9 AND responses.year = ? THEN responses.status END) END AS month_9,
                        CASE WHEN MAX(CASE WHEN responses.month = 10 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 10 AND responses.year = ? THEN responses.status END) END AS month_10,
                        CASE WHEN MAX(CASE WHEN responses.month = 11 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 11 AND responses.year = ? THEN responses.status END) END AS month_11,
                        CASE WHEN MAX(CASE WHEN responses.month = 12 AND responses.year = ? THEN responses.status END) IS NULL THEN "B" ELSE MAX(CASE WHEN responses.month = 12 AND responses.year = ? THEN responses.status END) END AS month_12',
                [$request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun]
            )
            ->where('samples.document_id', $request->dokumen)
            ->where('samples.desa_id', $request->desa)
            ->groupBy('samples.id', 'samples.document_id', 'samples.respondent_name')
            ->get();

        $year = $request->tahun;
        $html = view('response/data-table-sample', compact('data', 'year'))->render();
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
    public function storeInitialResponse(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'sample_id' => 'required|exists:samples,id',
                'year' => 'required|digits:4|integer|min:2000|max:' . (date('Y')),
                'month' => 'required|digits_between:1,2|integer|between:1,12',
            ]);

            // Check if a response already exists for the given month, year, and sample
            $existingResponse = Response::where('sample_id', $request->sample_id)
                ->where('month', $request->month)
                ->where('year', $request->year)
                ->first();

            if ($existingResponse != null) {
                // If a response already exists, redirect to the existing response's data entry form
                //Catatan : Belum menghandle kondisi jika sudah entri sebagian
                return redirect()->route('responses.edit', [
                    'response' => $existingResponse,
                ]);
            }

            $sample = Sample::findOrFail($request->sample_id);

            // Create a new response record
            $response = Response::create([
                'document_id' => $sample->document_id,
                'sample_id' => $request->sample_id,
                'month' => $request->month,
                'year' => $request->year,
                // Add any other necessary data
            ]);

            // Redirect to the data entry form with the response ID and necessary data
            return redirect()->route('response.edit', [
                'response' => $response,
            ]);
        } catch (\Throwable $th) {
            // Handle the exception
            throw $th;
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

            $bulanText = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];

            $bulan = $response->month;
            $nama_bulan = $bulanText[$bulan];
            $tahun = $response->year;
            $desa_response = Desa::with('kecamatan.kabupaten')->findOrFail($sample->desa_id);

            $desa = $desa_response;
            $kecamatan = $desa->kecamatan;
            $kabupaten = $kecamatan->kabupaten;

            $nama_desa = $desa->name;
            $kode_desa = $desa->code;

            $nama_kecamatan = $kecamatan->name;
            $kode_kecamatan = $kecamatan->code;

            $nama_kabupaten = $kabupaten->name;
            $kode_kabupaten = $kabupaten->code;

            $blok1 = [
                'bulan' => $bulan,
                'nama_bulan' => $nama_bulan,
                'tahun' => $tahun,
                'nama_desa' => $nama_desa,
                'kode_desa' => $kode_desa,
                'nama_kecamatan' => $nama_kecamatan,
                'kode_kecamatan' => $kode_kecamatan,
                'nama_kabupaten' => $nama_kabupaten,
                'kode_kabupaten' => $kode_kabupaten
            ];

            $new_response = [

                'petugas_id' => $response['petugas_id'],
                'id' => $response['id'],
                'pengawas_id' => $response['pengawas_id'],
                'enumeration_date' => $response['enumeration_date'],
                'review_date' => $response['review_date'],
                'respondent_name' => $response['sample']['respondent_name'],
                'desa_name' => $nama_desa,
                'commodities' => $response['commodities'],
                'notes' => $response['notes'],

            ];

            // Redirect to the data entry form with the response ID and necessary data
            return Inertia::render('Document/Edit', [
                'response' => $new_response,
                'sample' => $sample,
                'sections' => $sections,
                'groups' => $groups,
                'qualities' => $qualities,
                'blok1' => $blok1,
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
    public function update(Request $request)
    {
        try {
            // Define custom validation error messages
            $customMessages = [
                'petugas_id.required' => 'Pencacah harus terisi',
                'pengawas_id.required' => 'Pengawas harus terisi',
                'enumeration_date.required' => 'Tanggal pencacahan harus terisi',
                'review_date.required' => 'Tanggal pemeriksaan harus terisi',
                'komoditas.required' => 'Komoditas harus terisi',
            ];

            // Validate the incoming request data
            // $validator = Validator::make($request->all(), [
            //     'petugas_id' => 'required|exists:users,id',
            //     'pengawas_id' => 'required|exists:users,id',
            //     'enumeration_date' => 'required|date',
            //     'review_date' => 'required|date',
            //     'respondent_name' => 'required|string',
            //     'desa_name' => 'required|string',
            //     'komoditas' => 'required|string',
            //     'notes' => 'nullable|string',
            //     '*.price' => 'nullable|numeric',
            // ], $customMessages);

            // $validatedData = $validator->validated();
            $validatedData = $request->all();
            $errors = [];

            // Find the response record based on the request data
            // $response = Response::where('response_id', $request->input('response_id'))
            // ->where('month', $request->input('month'))
            // ->where('year', $request->input('year'))
            // ->firstOrFail();
            $response = Response::findOrFail($request->input('response_id'));


            // Update the response record
            $response->update([
                'petugas_id' => $validatedData['petugas_id'] ?? null,
                'pengawas_id' => $validatedData['pengawas_id'] ?? null,
                'enumeration_date' => $validatedData['enumeration_date'] ?? null,
                'review_date' => $validatedData['review_date'] ?? null,
                'commodities' => $validatedData['commodities'] ?? null,
                'notes' => $validatedData['notes'] ?? null,
            ]);

            // Update the data records
            // dd($request->all());
            foreach ($validatedData as $key => $value) {
                if (str_contains($key, '-price')) {
                    $dataId = explode('-', $key)[0];
                    // dd($dataId);
                    $data = Data::where('id', $dataId)->first();
                    // dd($data);

                    // $quality = Quality::find($data->quality_id);
                    // $commodity = Commodity::find($quality->commodity_id);

                    // Validate price range based on quality
                    // if ($quality && ($value < $quality->min_price || $value > $quality->max_price)) {
                    //     $errors[] = [
                    //         'id' => $dataId,
                    //         'message' => "Harga untuk kualitas '{$quality->name}' harus antara {$quality->min_price} dan {$quality->max_price}",
                    //     ];
                    // }

                    // Validate price change based on commodity
                    // if ($commodity) {
                    //     $previousMonthPrice = $this->getPreviousMonthPrice($response->sample_id, $response->month, $response->year, $data->quality_id);
                    //     $change = ($previousMonthPrice - $value) / 100;

                    //     if ($change < 0 && abs($change) > abs($commodity->min_change)) {
                    //         $errors[] = [
                    //             'id' => $dataId,
                    //             'message' => "Perubahan harga negatif untuk komoditas '{$commodity->name}' tidak boleh melebihi {$commodity->min_change}%",
                    //         ];
                    //     } elseif ($change > 0 && $change > $commodity->max_change) {
                    //         $errors[] = [
                    //             'id' => $dataId,
                    //             'message' => "Perubahan harga positif untuk komoditas '{$commodity->name}' tidak boleh melebihi {$commodity->max_change}%",
                    //         ];
                    //     }
                    // }

                    $data->price = $value;
                    // dd($data);
                    $data->save();
                }
            }

            // // Handle validation errors for required fields
            // $validator->errors()->add('values', []);
            // foreach ($validator->errors()->get('values.*') as $key => $messages) {
            //     foreach ($messages as $message) {
            //         $errors[] = [
            //             'id' => $key,
            //             'message' => $message,
            //         ];
            //     }
            // }

            if (!empty($errors)) {
                $response->update([
                    'status' => 'E'
                ]);
                return response()->json(['errors' => $errors], 422);
            } else {
                $response->update([
                    'status' => 'C'
                ]);
                return response()->json(['message' => 'Data berhasil disimpan dengan status clean'], 201);
            }
        } catch (Throwable $th) {
            throw $th;
            // return response()->json(['error' => $e->getMessage()], 500);
        }
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

    private function getPreviousMonthPrice($sampleId, $month, $year, $qualityId)
    {
        $previousMonth = $month === 1 ? 12 : $month - 1;
        $previousYear = $month === 1 ? $year - 1 : $year;

        $previousResponse = Response::where('sample_id', $sampleId)
            ->where('month', $previousMonth)
            ->where('year', $previousYear)
            ->first();

        if ($previousResponse) {
            $previousData = $previousResponse->data->where('quality_id', $qualityId)->first();
            return $previousData ? $previousData->price : null;
        }

        return null;
    }
}
