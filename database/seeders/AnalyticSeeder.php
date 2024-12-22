<?php

namespace Database\Seeders;

use App\Models\Analytic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnalyticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $analytics = [
            [
                'month' => 01,
                'year' =>   2024,
                'it' => 105.91,
                'ib' => 103.55,
                'ntp' => 102.28,
                'ntup' => 103.38,
            ],            
            [
                'month' => 02,
                'year' =>   2024,
                'it' => 107.44,
                'ib' => 103.66,
                'ntp' => 103.64,
                'ntup' => 104.39,
            ],
            [
                'month' => 03,
                'year' =>   2024,
                'it' => 107.51,
                'ib' => 104.62,
                'ntp' => 102.76,
                'ntup' => 104.68,
            ],
            [
                'month' => 04,
                'year' =>   2024,
                'it' => 107.56,
                'ib' => 104.78,
                'ntp' => 102.66,
                'ntup' => 104.85,
            ],
            [
                'month' => 05,
                'year' =>   2024,
                'it' => 107.75,
                'ib' => 105.10,
                'ntp' => 102.53,
                'ntup' => 104.61,
            ],
            [
                'month' => 06,
                'year' =>   2024,
                'it' => 107.51,
                'ib' => 105.83,
                'ntp' => 101.59,
                'ntup' => 104.34,
            ]
        ];
        Analytic::insert($analytics);
    }
}
