<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Response;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
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
        return view('pemeriksaan/index', [
            'data' => null,
            'kabkot' => $kabkot,
            'tahun' => $years,
            'dokumen' => $documents,
        ]);
    }
}
