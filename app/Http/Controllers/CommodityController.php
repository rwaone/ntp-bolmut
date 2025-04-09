<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Http\Requests\StoreCommodityRequest;
use App\Http\Requests\UpdateCommodityRequest;
use App\Models\Document;
use App\Models\Group;
use App\Models\Quality;
use App\Models\Section;
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
        $sections = Section::get();
        $documents = Document::get();
        $groups = Group::get();
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
            'sections' => $sections,
            'documents' => $documents,
            'groups' => $groups,
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
        // dd($request);
        try {
            //code...
            if ($validated['id']) {
                $target = Commodity::find($validated['id']);
                if ($target) {
                    $target->update([
                        'code' => $validated['code'],
                        'group_id' => $validated['group_id'],
                        'name' => $validated['name'],
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
            // $html = $this->fetchData($request);
            // dd($message);
            $html = $this->search($request);
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
        if ($request->ArrayFilter) {
            $filter = $request->ArrayFilter;
            if (!empty($filter['document_id']) || !empty($filter['section_id']) || !empty($filter['kelompok_komoditas'])) {
                $query->join('groups', 'groups.id', '=', 'commodities.group_id')
                      ->join('sections', 'sections.id', '=', 'groups.section_id');
            }
            if (!empty($filter['document_id'])) {
                $query->join('documents', 'documents.id', '=', 'sections.document_id');
                $query->where('documents.id',$filter['document_id']);
            }
            if (!empty($filter['section_id'])) {
                $query->where('sections.id', $filter['section_id'] );
            }
            if (!empty($filter['group_id'])) {
                $query->where('commodities.group_id', $filter['group_id']);
            }
            if (!empty($filter['nama_komoditas'])) {
                $query->where('commodities.name', 'like', '%' . $filter['nama_komoditas'] . '%');
            }
            if (!empty($filter['kode_komoditas'])) {
                $query->where('commodities.code', 'like', '%' . $filter['kode_komoditas'] . '%');
            }
            if (!empty($filter['kelompok_komoditas'])) {
                $query->join('groups', 'groups.id', '=', 'commodities.group_id');
                $query->where('groups.name', 'like', '%' . $filter['kelompok_komoditas'] . '%');
            }
            if (!empty($filter['updated_at'])) {
                $query->where('commodities.updated_at', 'like', '%' . $filter['updated_at'] . '%');
            }
        }
        $countData = $query->count();
        $query->select(['commodities.*']);
        $data = $query->paginate($paginated, ['*'], 'page', $currentPage);
        $html = view('master/komoditas/data-table-komoditas', compact('data'))->render();
        return response()->json([
            'countData' => $countData,
            'html' => $html,
        ]);
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
        $qualities = Quality::where('commodity_id', $id)->get();
        if ($qualities->isEmpty()) {
            try {
                //code...
                $data->delete();
            } catch (\Throwable $th) {
                //throw $th;
                throw new Exception("Gagal Menghapus Data, masih ada data kualitas di komoditas ini", 500);
            }
        }
        return $this->fetchData($id);
    }
}
