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
use Illuminate\Support\Facades\DB;
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
        return view('responses/index', [
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
                'CASE WHEN MAX(CASE WHEN responses.month = 1 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 1 AND responses.year = ? THEN responses.status END) END AS month_1,
                        CASE WHEN MAX(CASE WHEN responses.month = 2 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 2 AND responses.year = ? THEN responses.status END) END AS month_2,
                        CASE WHEN MAX(CASE WHEN responses.month = 3 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 3 AND responses.year = ? THEN responses.status END) END AS month_3,
                        CASE WHEN MAX(CASE WHEN responses.month = 4 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 4 AND responses.year = ? THEN responses.status END) END AS month_4,
                        CASE WHEN MAX(CASE WHEN responses.month = 5 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 5 AND responses.year = ? THEN responses.status END) END AS month_5,
                        CASE WHEN MAX(CASE WHEN responses.month = 6 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 6 AND responses.year = ? THEN responses.status END) END AS month_6,
                        CASE WHEN MAX(CASE WHEN responses.month = 7 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 7 AND responses.year = ? THEN responses.status END) END AS month_7,
                        CASE WHEN MAX(CASE WHEN responses.month = 8 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 8 AND responses.year = ? THEN responses.status END) END AS month_8,
                        CASE WHEN MAX(CASE WHEN responses.month = 9 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 9 AND responses.year = ? THEN responses.status END) END AS month_9,
                        CASE WHEN MAX(CASE WHEN responses.month = 10 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 10 AND responses.year = ? THEN responses.status END) END AS month_10,
                        CASE WHEN MAX(CASE WHEN responses.month = 11 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 11 AND responses.year = ? THEN responses.status END) END AS month_11,
                        CASE WHEN MAX(CASE WHEN responses.month = 12 AND responses.year = ? THEN responses.status END) IS NULL THEN "-" ELSE MAX(CASE WHEN responses.month = 12 AND responses.year = ? THEN responses.status END) END AS month_12',
                [$request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun, $request->tahun]
            )
            ->where('samples.document_id', $request->dokumen)
            ->where('samples.desa_id', $request->desa)
            ->groupBy('samples.id', 'samples.document_id', 'samples.respondent_name')
            ->get();

        $year = $request->tahun;
        $html = view('responses/data-table-sample', compact('data', 'year'))->render();
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
            return redirect()->route('responses.edit', [
                'response' => $response,
            ]);
        } catch (\Throwable $th) {
            // Handle the exception
            throw $th;
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
            $qualities = $commodities->flatMap(function ($commodity) use ($response) {

                return $commodity->qualities->map(function ($quality) use ($response) {
                    $currentData = DB::table('data')->where('response_id', $response->id)
                        ->where('quality_id', $quality->id)
                        ->first();

                    if (!$currentData) {
                        $data = new Data([
                            'response_id' => $response->id,
                            'quality_id' => $quality->id,
                            'price' => 0,
                        ]);
                        $response->datas()->save($data);
                        $currentData = $data;
                    }
                    $price_prev = $this->getPreviousMonthPrice($response->sample_id, $response->month, $response->year, $quality->id);
                    $quality->price = $currentData->price;
                    $quality->data_id = $currentData->id;
                    $quality->price_prev = $price_prev;
                    return $quality;
                });

                // $id = $response->id;
                // return $commodity->qualities;
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
                'status' => $response['status'],

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
                'commodities.required' => 'Komoditas harus terisi',
            ];
            // dd($request->all());

            // Retrieve the response and its associated data records
            $response = Response::with('datas.quality.commodity')->findOrFail($request->input('response_id'));
            $dataRecords = $response->datas;

            // Update the response record
            $petugas_id = $request->input('petugas_id');
            $pengawas_id = $request->input('pengawas_id');
            $enumeration_date = $request->input('enumeration_date');
            $review_date = $request->input('review_date');
            $commodities = $request->input('commodities');
            $notes = $request->input('notes');

            $response->update([
                'petugas_id' => $request->has('petugas_id') ? $petugas_id : $response->petugas_id,
                'pengawas_id' => $request->has('pengawas_id') ? $pengawas_id : $response->pengawas_id,
                'enumeration_date' => $request->has('enumeration_date') ? $enumeration_date : $response->enumeration_date,
                'review_date' => $request->has('review_date') ? $review_date : $response->review_date,
                'commodities' => $request->has('commodities') ? $commodities : $response->commodities,
                'notes' => $request->has('notes') ? $notes : $response->notes,
            ]);
            $warnings = [];

            // Update the data records
            foreach ($dataRecords as $data) {
                $quality = $data->quality;
                $commodity = $quality->commodity;
                $dataId = $data->id;
                $priceKey = $dataId . '-price';

                // Check if the '-price' key exists in the request
                if (array_key_exists($priceKey, $request->all())) {
                    $value = $request->input($priceKey);
                    $notNull = $value > 0 && !is_null($value);

                    // Validate price range based on quality
                    if ($notNull && $quality && ($value < $quality->min_price || $value > $quality->max_price)) {
                        $warnings[] = [
                            'id' => $dataId,
                            'message' => "Harga untuk kualitas '{$quality->name}' harus antara {$quality->min_price} dan {$quality->max_price}",
                        ];
                    }

                    // Validate price change based on commodity

                    $data->price = $value;
                    $data->save();
                } else {
                    // Validate price range based on quality
                    $value = $data->price;
                    $notNull = $value > 0 && !is_null($value);
                    if ($notNull && $quality && ($value < $quality->min_price || $value > $quality->max_price)) {
                        $warnings[] = [
                            'id' => $dataId,
                            'message' => "Harga untuk kualitas '{$quality->name}' harus antara {$quality->min_price} dan {$quality->max_price}",
                        ];
                    }
                }
            }

            // Retrieve the updated response data from the database
            $updatedResponse = Response::with('datas')->findOrFail($request->input('response_id'));

            // Validate the updated response data
            $validator = Validator::make($updatedResponse->toArray(), [
                'petugas_id' => 'required',
                'pengawas_id' => 'required',
                'enumeration_date' => 'required|date',
                'review_date' => 'required|date',
                'commodities' => 'required|string',
                'notes' => 'nullable|string',
                'data.*.price' => 'nullable|numeric',
            ], $customMessages);

            if ($validator->fails()) {
                // Roll back the changes made to the database
                $response->update([
                    'status' => 'E'
                ]);

                $errors = $validator->errors()->toArray();

                // Customize the error messages for specific fields
                $customErrors = [];
                foreach ($errors as $field => $messages) {
                    if ($field === 'commodities') {
                        $customErrors[] = [
                            'id' => $field,
                            'message' => 'Komoditas harus terisi',
                        ];
                    } else {
                        foreach ($messages as $message) {
                            $customErrors[] = [
                                'id' => $field,
                                'message' => $message,
                            ];
                        }
                    }
                }

                return response()->json(['errors' => $customErrors, 'warnings' => $warnings], 422);
            } elseif (!empty($warnings)) {
                $response->update([
                    'status' => 'W'
                ]);
                return response()->json(['warnings' => $warnings, 'errors' => []], 201);
            } else {
                $response->update([
                    'status' => 'C'
                ]);
                return response()->json(['warnings' => [], 'errors' => [], 'message' => 'Data berhasil disimpan dengan status clean'], 201);
            }
        } catch (Throwable $th) {
            throw $th;
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
        // dd($previousResponse);
        if ($previousResponse) {
            $previousData = $previousResponse->datas->where('quality_id', $qualityId)->first();
            return $previousData ? $previousData->price : null;
        }

        return null;
    }
}
