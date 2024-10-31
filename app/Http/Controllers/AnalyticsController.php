<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {        
        $breadcrumbsItems = [
            [
                'name' => 'Analytics',
                'url' => '/analytics',
                'active' => true
            ],
        ];
        

        return view('analytics', [
            'pageTitle' => 'Analytics',
            'breadcrumbItems' => $breadcrumbsItems,
        ]);
    }
}
