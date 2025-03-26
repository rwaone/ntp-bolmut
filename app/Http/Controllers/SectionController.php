<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Document;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        $sections = Section::all();
        $breadcrumbsItems = [
            [
                'name' => 'Master Bagian',
                'url' => '/sections',
                'active' => true
            ],
        ];
        return view('section.index', [
            'pageTitle' => 'Master Bagian',
            'breadcrumbItems' => $breadcrumbsItems,
            'documents' => $documents,
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
     * @param  \App\Http\Requests\StoreSectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {        
        // dd($request);
        $validated = $request->validate($request->rules());
        if(Section::create($validated)){
            return redirect('sections')->with('notif',  'Data telah berhasil disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        try {
            $data = $section;
        } catch (\Throwable $th) {
            throw new Exception("Tidak ditemukan", 500);
        }
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSectionRequest  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {     
        $validated = $request->validate($request->rules());
        if($section->update($validated)){
            return redirect('sections')->with('notif',  'Data telah berhasil disimpan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        if($section->delete())
        {
            return redirect('sections')->with('notif',  'Data berhasil dihapus!');
        }

    }
}
