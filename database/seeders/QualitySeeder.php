<?php

namespace Database\Seeders;

use App\Models\Quality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualities = [
            [
                'commodity_id' => 1,
                'name' => 'Ciherang',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 1,
                'name' => 'Ciliwung',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 1,
                'name' => 'Cisadane',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 1,
                'name' => 'IR 36',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 1,
                'name' => 'IR 64',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 2,
                'name' => 'Ciherang',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 2,
                'name' => 'Ciliwung',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 2,
                'name' => 'Cisadane',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 2,
                'name' => 'IR 36',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 2,
                'name' => 'IR 64',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 3,
                'name' => 'Ciherang',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 3,
                'name' => 'Ciliwung',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 3,
                'name' => 'Cisadane',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 3,
                'name' => 'IR 36',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 3,
                'name' => 'IR 64',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 4,
                'name' => 'Putih',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 4,
                'name' => 'Hitam',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 5,
                'name' => 'Putih',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 5,
                'name' => 'Hitam',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 6,
                'name' => 'Ontongan Muda',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 6,
                'name' => 'Ontongan Tua',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 6,
                'name' => 'Pipilan Kuning',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 6,
                'name' => 'Pipilan Putih',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 7,
                'name' => 'Kering',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 8,
                'name' => 'Hitam',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 8,
                'name' => 'Putih',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 9,
                'name' => 'Belum Kupas',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 9,
                'name' => 'Dikupas',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 10,
                'name' => 'Pahit',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 10,
                'name' => 'Tidak Pahit',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 11,
                'name' => 'Merah',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 11,
                'name' => 'Putih',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 11,
                'name' => 'Ungu',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 12,
                'name' => 'Biasa',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 12,
                'name' => 'Ketan',
                'satuan' => '100 Kg'
            ],
            [
                'commodity_id' => 13,
                'name' => 'Cisadane',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 13,
                'name' => 'IR-36',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 13,
                'name' => 'IR-64',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 14,
                'name' => 'Cisadane',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 14,
                'name' => 'IR-36',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 14,
                'name' => 'IR-64',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 15,
                'name' => 'Dua Tongkol',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 16,
                'name' => 'Baik',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 17,
                'name' => 'Baik',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 18,
                'name' => 'Baik',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 19,
                'name' => 'Baik',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 20,
                'name' => 'Baik',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 21,
                'name' => 'Baik',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 22,
                'name' => 'Urea',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 23,
                'name' => 'SP 36',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 24,
                'name' => 'ZA',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 25,
                'name' => 'NPK',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 26,
                'name' => 'Petroganik',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 27,
                'name' => 'PUSRI',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 27,
                'name' => 'Gresik',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 28,
                'name' => 'TSP',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 29,
                'name' => 'SP 36',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 30,
                'name' => 'ZA',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 31,
                'name' => 'KCL',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 32,
                'name' => 'NPK',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 33,
                'name' => 'Pupuk Kandang',
                'satuan' => '20 Kg'
            ],
            [
                'commodity_id' => 34,
                'name' => 'Kapur',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 35,
                'name' => 'Kompos',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 36,
                'name' => 'Buah',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 37,
                'name' => 'Daun',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 38,
                'name' => 'Garam',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 39,
                'name' => 'Petroganik',
                'satuan' => '1 Kg'
            ],
            [
                'commodity_id' => 40,
                'name' => 'Basudin',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 40,
                'name' => 'Furadan',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 41,
                'name' => 'Baycor',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 42,
                'name' => 'DMA-6',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 42,
                'name' => 'Gramoxon',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 43,
                'name' => 'Fumarin',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 44,
                'name' => 'Agrimycin',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 44,
                'name' => 'Scoor',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 45,
                'name' => 'Tedion',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 46,
                'name' => 'Moluskisida',
                'satuan' => '1 Liter'
            ],
        ];

        foreach ($qualities as $quality){
            Quality::create($quality);
        }
    }
}
