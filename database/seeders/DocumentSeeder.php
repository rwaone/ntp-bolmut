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
                'type' => 'HD',
                'code' => 'HD-1',
                'name' => 'Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan',
            ],
            [
                'type' => 'HD',
                'code' => 'HD-3',
                'name' => 'Survei Harga Produsen Perdesaan Subsektor Perkebunan Rakyat',
            ],
            [
                'type' => 'HD',
                'code' => 'HD-4',
                'name' => 'Survei Harga Produsen Perdesaan Subsektor Peternakan',
            ],
            [
                'type' => 'HD',
                'code' => 'HD-5.1',
                'name' => 'Survei Harga Produsen Perdesaan Subsektor Perikanan Tangkap',
            ],
            [
                'type' => 'HKD',
                'code' => 'HKD-1',
                'name' => 'Survei Harga Konsumen Perdesaan Kelompok Makanan',
            ],
            [
                'type' => 'HKD',
                'code' => 'HKD-2.1',
                'name' => 'Survei Harga Konsumen Perdesaan Kelompok Non Makanan (Konstruksi, Jasa, dan Transportasi)',
            ],
            [
                'type' => 'HKD',
                'code' => 'HKD-2.2',
                'name' => 'Survei Harga Konsumen Perdesaan Kelompok Non Makanan (Aneka Perlengkapan Rumah Tangga dan Lainnya)',
            ],
        ];
        foreach ($docs as $doc) {
            Document::create($doc);
        }
    }
}
