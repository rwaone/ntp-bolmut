<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use App\Http\Requests\StoreQualityRequest;
use App\Http\Requests\UpdateQualityRequest;
use App\Models\Commodity;
use Exception;
use Illuminate\Http\Request;

class QualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = Quality::query();
        $query->join('users as u', 'u.id', '=', 'qualities.created_by');
        $query->leftJoin('users as us', 'us.id', '=', 'qualities.reviewed_by');
        $forCount = $query->select(['qualities.*', 'u.name as createdBy', 'us.name as reviewedBy']);
        $countData = $forCount->count();
        $data = $query->paginate(10, ['*'], 'page', 1);
        // dd($query->get());
        $forCommodityId = Commodity::select(['id', 'group_id', 'name'])->get();
        $breadcrumbsItems = [
            [
                'name' => 'Master Kualitas',
                'url' => '/kualitas',
                'active' => true
            ],
        ];
        return view('master/kualitas/index', [
            'pageTitle' => 'Master Kualitas',
            'breadcrumbItems' => $breadcrumbsItems,
            'data' => $data,
            'countData' => $countData,
            'forCommodityId' => $forCommodityId,
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
     * @param  \App\Http\Requests\StoreQualityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQualityRequest $request)
    {
        //
        $validated = $request->validate($request->rules());
        $commodity = Commodity::where('id', $validated['commodity_id'])->first();
        if (!$commodity) throw new Exception('Tidak ada komoditas yang dimaksud');
        try {
            //code...
            if ($validated['id']) {
                $target = Quality::find($validated['id']);
                if ($target) {
                    $target->update([
                        'code' => $validated['code'],
                        'commodity_id' => $validated['commodity_id'],
                        'name' => $validated['name'],
                        'min_price' => $validated['min_price'],
                        'max_price' => $validated['max_price'],
                        'status' => $validated['status'],
                        'reviewed_by' => auth()->user()->id,
                    ]);
                    $message = 'Berhasil mengedit data kualitas';
                } else {
                    return response()->json([
                        'message' => 'Tidak ada kualitas yang dimaksud',
                    ], 500);
                }
            } else {
                unset($validated['id']);
                $validated['created_by'] = auth()->user()->id;
                $storeData = Quality::create($validated);
                $message = 'Berhasil menambahkan kualitas baru';
            }
            $html = $this->search($request);
            return response()->json([
                'message' => $message,
                'html' => $html,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'Gagal menambah/mengedit data',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function fetch(String $id)
    {
        $query = Quality::query();
        $data = $query->where('id', $id)->first();
        if (!$data) throw new Exception("Tidak ditemukan", 500);
        return response()->json($data);
    }

    public function search(Request $request)
    {
        $query = Quality::query();
        // dd($request);
        if ($request->paginated) $paginated = $request->paginated;
        else $paginated = 10;
        if ($request->currentPage) $currentPage = $request->currentPage;
        else $currentPage = 1;
        // dd($paginated, $currentPage);

        if (!empty($request->value)) {
            $filter = $request->value;
            $query->orWhere('qualities.name', 'like', '%' . $filter . '%');
            $query->orWhere('qualities.code', 'like', '%' . $filter . '%');
            $query->join('commodities', 'commodities.id', '=', 'qualities.commodity_id');
            $query->join('users as u', 'u.id', '=', 'qualities.created_by');
            $query->leftJoin('users as us', 'us.id', '=', 'qualities.reviewed_by');
            $query->orWhere('u.name', 'like', '%' . $filter . '%');
            $query->orWhere('us.name', 'like', '%' . $filter . '%');
            $query->orWhere('commodities.name', 'like', '%' . $filter . '%');
            $query->orWhere('min_price', 'like', '%' . $filter . '%');
            $query->orWhere('max_price', 'like', '%' . $filter . '%');
            $query->orWhere('qualities.status', 'like', '%' . $filter . '%');
            $query->orWhere('qualities.updated_at', 'like', '%' . $filter . '%');
        }
        $countData = $query->count();
        $query->select(['qualities.*', 'u.name as createdBy', 'us.name as reviewedBy']);
        $data = $query->paginate($paginated, ['*'], 'page', $currentPage);
        $html = view('master/kualitas/data-table-kualitas', compact('data'))->render();
        return response()->json([
            'countData' => $countData,
            'html' => $html,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function show(Quality $quality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function edit(Quality $quality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQualityRequest  $request
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQualityRequest $request, Quality $quality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        //
        $data = Quality::find($id);
        if ($data) {
            try {
                //code...
                $data->delete();
            } catch (\Throwable $th) {
                //throw $th;
                throw new Exception("Gagal Menghapus Data", 500);
            }
        }
        return;
    }
}
