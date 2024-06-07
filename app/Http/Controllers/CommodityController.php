<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Http\Requests\StoreCommodityRequest;
use App\Http\Requests\UpdateCommodityRequest;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Komoditas',
                'url' => '/commodities',
                'active' => true
            ],
        ];

        $tableData = [
            [
                'id' => 1,
                'age' => 82,
                'first_name' => "Dorelle",
                'last_name' => "Harling",
                'email' => "dharling0@rediff.com",
                'gender' => "Female",
                'phone' => "232(152)707-0110",
                'ccupation' => "Financial Advisor"
            ],
            [
                'id' => 2,
                'age' => 89,
                'first_name' => "Bendicty",
                'last_name' => "Llewellin",
                'email' => "bllewellin1@example.com",
                'gender' => "Male",
                'phone' => "420(169)218-1769",
                'ccupation' => "Marketing Assistant"
            ],
            [
                'id' => 3,
                'age' => 28,
                'first_name' => "Remy",
                'last_name' => "Carbry",
                'email' => "rcarbry2@prlog.org",
                'gender' => "Polygender",
                'phone' => "86(958)204-4491",
                'ccupation' => "Mechanical Systems Engineer"
            ],
            [
                'id' => 4,
                'age' => 20,
                'first_name' => "Bernardo",
                'last_name' => "Hacun",
                'email' => "bhacun3@xinhuanet.com",
                'gender' => "Male",
                'phone' => "86(974)709-5254",
                'ccupation' => "Research Assistant IV"
            ],
            [
                'id' => 5,
                'age' => 2,
                'first_name' => "Emelia",
                'last_name' => "Garstang",
                'email' => "egarstang4@miitbeian.gov.cn",
                'gender' => "Female",
                'phone' => "55(644)175-6748",
                'ccupation' => "Business Systems Development Analyst"
            ],
            [
                'id' => 6,
                'age' => 98,
                'first_name' => "Dian",
                'last_name' => "Dopson",
                'email' => "ddopson5@examiner.com",
                'gender' => "Female",
                'phone' => "51(186)560-8480",
                'ccupation' => "Cost Accountant"
            ],
            [
                'id' => 7,
                'age' => 17,
                'first_name' => "Coretta",
                'last_name' => "Ponter",
                'email' => "cponter6@loc.gov",
                'gender' => "Female",
                'phone' => "1(941)734-6255",
                'ccupation' => "Budget/Accounting Analyst II"
            ]
        ];

        return view('commodity.index', [
            'pageTitle' => 'Komoditas ',
            'breadcrumbItems' => $breadcrumbsItems,
            'tableData' => $tableData,
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commodity $commodity)
    {
        //
    }
}
