<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docs = [
            [
                'type' => 'HD1',
                'name' => 'Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan',
            ],
            [
                'type' => 'HD2',
                'name' => 'Survei Harga Produsen Perdesaan Subsektor Hortikultura',
            ],
            [
                'type' => 'HK1',
                'name' => 'Survei Harga Konsumen Perdesaan Subsektor Tanaman Pangan',
            ],
            [
                'type' => 'HK2',
                'name' => 'Survei Harga Konsumen Perdesaan Subsektor Hortikultura',
            ],
        ];
        foreach ($docs as $doc) {
            Document::create($doc);
        }
    }
}
