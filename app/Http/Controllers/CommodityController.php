<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Http\Requests\StoreCommodityRequest;
use App\Http\Requests\UpdateCommodityRequest;
use App\Models\Group;
use Exception;
use Illuminate\Http\Request;

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
        $query = Commodity::query();
        $countData = $query->count();
        $data = Commodity::paginate(10, ['*'], 'page', 1);
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
            'countData' => $countData,
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
                    $message = 'Berhasil mengedit data komoditas';
                } else {
                    return response()->json([
                        'message' => 'Tidak ada data tersebut',
                    ], 500);
                }
            } else {
                unset($validated['id']);
                $storeData = Commodity::create($validated);
                $message = 'Berhasil menambahkan komoditas baru';
            }
            $html = $this->fetchData($request);
            return response()->json([
                'message' => $message,
                'html' => $html,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'Gagal Menambah/Mengedit Data',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function fetchData()
    {
        $query = Commodity::query();
        $data = $query->get();
        return view('master/komoditas/data-table-komoditas', compact('data'))->render();
    }

    public function search(Request $request)
    {
        $query = Commodity::query();

        if ($request->paginated) $paginated = $request->paginated;
        else $paginated = 10;
        if ($request->currentPage) $currentPage = $request->currentPage;
        else $currentPage = 1;

        if (!empty($request->value)) {
            $filter = $request->value;
            $query->orWhere('commodities.name', 'like', '%' . $filter . '%');
            $query->orWhere('code', 'like', '%' . $filter . '%');
            $query->join('groups', 'groups.id', '=', 'commodities.group_id');
            $query->orWhere('groups.name', 'like', '%' . $filter . '%');
            $query->orWhere('min_change', 'like', '%' . $filter . '%');
            $query->orWhere('max_change', 'like', '%' . $filter . '%');
            $query->orWhere('commodities.updated_at', 'like', '%' . $filter . '%');
        }
        $countData = $query->count();
        $query->select(['commodities.*']);
        $data = $query->paginate($paginated, ['*'], 'page', $currentPage);
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
    public function destroy(String $id)
    {
        //
        $data = Commodity::find($id);
        if ($data) {
            try {
                //code...
                $data->delete();
            } catch (\Throwable $th) {
                //throw $th;
                throw new Exception("Gagal Menghapus Data", 500);
            }
        }
        return $this->fetchData($id);
    }
}
