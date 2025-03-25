<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use App\Http\Requests\StoreQualityRequest;
use App\Http\Requests\UpdateQualityRequest;
use App\Models\Commodity;
use App\Models\Document;
use App\Models\Group;
use App\Models\Section;
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
        $commodities = Commodity::get();
        $sections = Section::get();
        $documents = Document::get();
        $groups = Group::get();
        $query->leftJoin('users as u', 'u.id', '=', 'qualities.created_by');
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
            'sections' => $sections,
            'documents' => $documents,
            'groups' => $groups,
            'commodities' => $commodities,
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

        $query->leftJoin('users as u', 'u.id', '=', 'qualities.created_by');
        $query->leftJoin('users as us', 'us.id', '=', 'qualities.reviewed_by');
        if ($request->ArrayFilter) {
            $filter = $request->ArrayFilter;
            if (!empty($filter['document_id']) || !empty($filter['section_id']) || !empty($filter['group_id']) || !empty($filter['nama_komoditas'])) {
                $query->join('commodities', 'commodities.id', '=', 'qualities.commodity_id')
                    ->join('groups', 'groups.id', '=', 'commodities.group_id')
                    ->join('sections', 'sections.id', '=', 'groups.section_id');
            }
            if (!empty($filter['document_id'])) {
                $query->join('documents', 'documents.id', '=', 'sections.document_id');
                $query->where('documents.id', $filter['document_id']);
            }
            if (!empty($filter['section_id'])) {
                $query->where('sections.id', $filter['section_id']);
            }
            if (!empty($filter['group_id'])) {
                $query->where('commodities.group_id', $filter['group_id']);
            }
            if (!empty($filter['commodity_id'])) {
                $query->where('qualities.commodity_id', $filter['commodity_id']);
            }
            if (!empty($filter['nama_komoditas'])) {
                $query->where('commodities.name', 'like', '%' . $filter['nama_komoditas'] . '%');
            }
            if (!empty($filter['kualitas'])) {
                $query->where('qualities.name', 'like', '%' . $filter['kualitas'] . '%');
            }
            if (!empty($filter['kode_kualitas'])) {
                $query->where('qualities.code', 'like', '%' . $filter['kode_kualitas'] . '%');
            }
            if (!empty($filter['satuan'])) {
                $query->where('qualities.satuan', 'like', '%' . $filter['satuan'] . '%');
            }
            if (!empty($filter['min_price'])) {
                $query->where('qualities.min_price', 'like', '%' . $filter['min_price'] . '%');
            }
            if (!empty($filter['max_price'])) {
                $query->where('qualities.max_price', 'like', '%' . $filter['max_price'] . '%');
            }
            if (!empty($filter['create_review'])) {
                $query->where(function ($q) use ($filter) {
                    $q->where('us.name', 'like', '%' . $filter['create_review'] . '%')
                        ->orWhere('u.name', 'like', '%' . $filter['create_review'] . '%');
                });
            }
            if (!empty($filter['updated_at'])) {
                $query->where('qualities.updated_at', 'like', '%' . $filter['updated_at'] . '%');
            }
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

    public function fetchQualities(Request $request)
    {
        try {
            $sectionId = $request->query('sectionId');
            $query = Quality::join('commodities', 'qualities.commodity_id', 'commodities.id')
                ->join('groups', 'commodities.group_id', 'groups.id')
                ->join('sections', 'groups.section_id', 'sections.id')
                ->select('qualities.id as quality_id', 'qualities.commodity_id', 'commodities.name as commodity_name', 'qualities.name as quality_name', 'qualities.code as quality_code', 'qualities.satuan', 'groups.id as group_id');
            if (strlen($sectionId) > 0) {
                $query->where('sections.id', $sectionId);
            }


            $qualities = $query->get();
            return response()->json($qualities, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
