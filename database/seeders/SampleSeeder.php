<?php

namespace Database\Seeders;

use App\Models\Sample;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $samples = [
            [
                'desa_id' => '1',
                'document_id' => '1',
                'respondent_name' => 'Uchiha'
            ],
            [
                'desa_id' => '1',
                'document_id' => '2',
                'respondent_name' => 'Uzumaki'
            ],
        ];
        foreach ($samples as $sample) {
            # code...
            Sample::create($sample);
        }
    }
}
