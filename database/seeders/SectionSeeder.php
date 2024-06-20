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
                'title' => 'BLOK IV',
                'name' => 'IV. HARGA YANG DITERIMA PETANI',
            ],
            [
                'document_id' => 1,
                'title' => 'BLOK V',
                'name' => 'V. HARGA YANG DIBAYAR PETANI',
            ],
            [
                'document_id' => 2,
                'title' => 'BLOK IV',
                'name' => 'IV. HARGA YANG DITERIMA PETANI',
            ],
            [
                'document_id' => 2,
                'title' => 'BLOK V',
                'name' => 'V. HARGA YANG DIBAYAR PETANI',
            ],
            [
                'document_id' => 3,
                'title' => 'BLOK IV',
                'name' => 'IV. HARGA YANG DITERIMA PETANI',
            ],
            [
                'document_id' => 3,
                'title' => 'BLOK V',
                'name' => 'V. HARGA YANG DIBAYAR PETANI',
            ],
            [
                'document_id' => 4,
                'title' => 'BLOK IV',
                'name' => 'IV. HARGA YANG DITERIMA PETANI',
            ],
            [
                'document_id' => 4,
                'title' => 'BLOK V',
                'name' => 'V. HARGA YANG DIBAYAR PETANI',
            ],
            [
                'document_id' => 5,
                'title' => 'BLOK IV',
                'name' => 'IV. HARGA KONSUMEN DI PERDESAAN',
            ],
            [
                'document_id' => 6,
                'title' => 'BLOK IV',
                'name' => 'IV. HARGA KONSUMEN DI PERDESAAN',
            ],
            [
                'document_id' => 7,
                'title' => 'BLOK IV',
                'name' => 'IV. HARGA KONSUMEN DI PERDESAAN',
            ]
        ];
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
