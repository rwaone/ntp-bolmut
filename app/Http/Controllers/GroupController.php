<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Section;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Commodity;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        $groups = Group::all();
        $breadcrumbsItems = [
            [
                'name' => 'Master Grup',
                'url' => '/groups',
                'active' => true
            ],
        ];
        return view('group.index', [
            'pageTitle' => 'Master Grup',
            'breadcrumbItems' => $breadcrumbsItems,
            'groups' => $groups,
            'sections' => $sections,
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
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        $validated = $request->validate($request->rules());
        if(Group::create($validated)){
            return redirect('groups')->with('notif',  'Data telah berhasil disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {        
        try {
            $data = $group;
        } catch (\Throwable $th) {
            throw new Exception("Tidak ditemukan", 500);
        }
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $validated = $request->validate($request->rules());
        if($group->update($validated)){
            return redirect('groups')->with('notif',  'Data telah berhasil disimpan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $commodities = Commodity::where('group_id', $group->id)->get();
        if($commodities->isEmpty())
        {
            $group->delete();
            return redirect('groups')->with('notif',  'Data berhasil dihapus!');
        } else {
            return redirect('groups')->with('notif',  'Data gagal dihapus, masih ada komoditas di grup ini!');
        }
    }
}
