<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'document_id' => 1,
                'name' => 'IV. HARGA YANG DITERIMA PETANI',
            ],
            [
                'document_id' => 1,
                'name' => 'V. HARGA YANG DIBAYAR PETANI',
            ],
            [
                'document_id' => 2,
                'name' => 'IV. HARGA YANG DITERIMA PETANI',
            ],
            [
                'document_id' => 2,
                'name' => 'V. HARGA YANG DIBAYAR PETANI',
            ],
            [
                'document_id' => 3,
                'name' => 'IV. HARGA YANG DITERIMA PETANI',
            ],
            [
                'document_id' => 3,
                'name' => 'V. HARGA YANG DIBAYAR PETANI',
            ],
            [
                'document_id' => 4,
                'name' => 'IV. HARGA YANG DITERIMA PETANI',
            ],
            [
                'document_id' => 4,
                'name' => 'V. HARGA YANG DIBAYAR PETANI',
            ],
            [
                'document_id' => 5,
                'name' => 'IV. HARGA KONSUMEN DI PERDESAAN',
            ],
            [
                'document_id' => 6,
                'name' => 'IV. HARGA KONSUMEN DI PERDESAAN',
            ],
            [
                'document_id' => 7,
                'name' => 'IV. HARGA KONSUMEN DI PERDESAAN',
            ]
        ];
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
