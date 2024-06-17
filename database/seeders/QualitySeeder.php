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
            [
                'commodity_id' => 47,
                'name' => 'Surplus',
                'satuan' => '1 Ha/Th'
            ],
            [
                'commodity_id' => 47,
                'name' => 'Sedang',
                'satuan' => '1 Ha/Th'
            ],
            [
                'commodity_id' => 47,
                'name' => 'Minus',
                'satuan' => '1 Ha/Th'
            ],
            [
                'commodity_id' => 48,
                'name' => 'Surplus',
                'satuan' => '1 Ha/Th'
            ],
            [
                'commodity_id' => 48,
                'name' => 'Sedang',
                'satuan' => '1 Ha/Th'
            ],
            [
                'commodity_id' => 48,
                'name' => 'Minus',
                'satuan' => '1 Ha/Th'
            ],
            [
                'commodity_id' => 49,
                'name' => 'Dengan Orang',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 50,
                'name' => 'Kubota',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 51,
                'name' => 'Dengan Orang',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 51,
                'name' => 'Tanpa Orang',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 52,
                'name' => 'Dengan Orang',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 52,
                'name' => 'Tanpa Orang',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 53,
                'name' => 'Baik',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 54,
                'name' => 'Baik',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 55,
                'name' => 'Baik',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 56,
                'name' => 'Tanpa Orang',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 57,
                'name' => 'Tanpa Orang',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 58,
                'name' => 'Mobil Pickup',
                'satuan' => '5 Km'
            ],
            [
                'commodity_id' => 58,
                'name' => 'Motor Ojek',
                'satuan' => '5 Km'
            ],
            [
                'commodity_id' => 59,
                'name' => 'Premium',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 59,
                'name' => 'Pertalite',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 59,
                'name' => 'Pertamax',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 59,
                'name' => 'Campuran',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 60,
                'name' => 'Solar',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 60,
                'name' => 'Dexlite',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 60,
                'name' => 'Pertamina Dex',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 60,
                'name' => 'Bio Solar',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 61,
                'name' => 'Mesran',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 62,
                'name' => 'Swallow',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 62,
                'name' => 'IRC',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 63,
                'name' => 'Swallow',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 64,
                'name' => 'Swallow',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 65,
                'name' => 'Good Year',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 66,
                'name' => 'IRC',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 67,
                'name' => 'Servis Sepeda',
                'satuan' => '1 Kali'
            ],
            [
                'commodity_id' => 68,
                'name' => 'Servis Motor',
                'satuan' => '1 Kali'
            ],
            [
                'commodity_id' => 69,
                'name' => 'Servis Mobil',
                'satuan' => '1 Kali'
            ],
            [
                'commodity_id' => 70,
                'name' => 'Telkomsel',
                'satuan' => '1 Paket'
            ],
            [
                'commodity_id' => 71,
                'name' => 'Onderdil',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 72,
                'name' => 'Rantai Motor',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 73,
                'name' => 'Sedang',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 74,
                'name' => 'Goni 50 Kg',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 74,
                'name' => 'Plastik 50 Kg',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 75,
                'name' => 'Plastik',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 75,
                'name' => 'Bambu',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 76,
                'name' => 'Lengkap',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 77,
                'name' => 'Pandai Besi',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 77,
                'name' => 'Pabrik',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 78,
                'name' => 'Pabrik',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 79,
                'name' => 'Dgn Gagang',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 80,
                'name' => 'Lengkap',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 81,
                'name' => 'Kubota',
                'satuan' => '1 Unit'
            ],
            [
                'commodity_id' => 82,
                'name' => 'Lokal',
                'satuan' => '1 Unit'
            ],
            [
                'commodity_id' => 82,
                'name' => 'Impor',
                'satuan' => '1 Unit'
            ],
            [
                'commodity_id' => 83,
                'name' => 'Pandai Besi',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 84,
                'name' => 'Pandai Besi',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 85,
                'name' => 'Lengkap',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 86,
                'name' => 'Lengkap',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 87,
                'name' => 'Mata',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 88,
                'name' => 'Pandai Besi',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 89,
                'name' => 'Plastik Diameter 30 cm',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 90,
                'name' => 'Pompa Air',
                'satuan' => '1 Unit'
            ],
            [
                'commodity_id' => 91,
                'name' => 'Terpal',
                'satuan' => '1 Meter'
            ],
            [
                'commodity_id' => 92,
                'name' => 'Kereta Dorong',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 93,
                'name' => 'Sprayer',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 94,
                'name' => 'Kored',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 95,
                'name' => 'Pandai Besi',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 96,
                'name' => 'Baru',
                'satuan' => '1 Unit'
            ],
            [
                'commodity_id' => 97,
                'name' => 'Selang',
                'satuan' => '1 Meter'
            ],
            [
                'commodity_id' => 98,
                'name' => 'Shading Net',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 99,
                'name' => 'Pipa',
                'satuan' => '1 Meter'
            ],
            [
                'commodity_id' => 100,
                'name' => 'Pandai Besi',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 101,
                'name' => 'Tas Noken',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 102,
                'name' => 'Tangki',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 103,
                'name' => '-',
                'satuan' => '1 Ha/Th'
            ],
            [
                'commodity_id' => 104,
                'name' => 'Eceran',
                'satuan' => '1 Liter'
            ],
            [
                'commodity_id' => 105,
                'name' => '-',
                'satuan' => '1 Meter'
            ],
            [
                'commodity_id' => 106,
                'name' => '-',
                'satuan' => '1 Meter'
            ],
            [
                'commodity_id' => 107,
                'name' => '-',
                'satuan' => '1 Gulung'
            ],
            [
                'commodity_id' => 108,
                'name' => '-',
                'satuan' => '1 Batang'
            ],
            [
                'commodity_id' => 109,
                'name' => '-',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 110,
                'name' => 'Nilon',
                'satuan' => '1 Meter'
            ],
            [
                'commodity_id' => 110,
                'name' => 'Rafia',
                'satuan' => '1 Gulung'
            ],
            [
                'commodity_id' => 111,
                'name' => '-',
                'satuan' => '1 Ons'
            ],
            [
                'commodity_id' => 112,
                'name' => '-',
                'satuan' => '1 Buah'
            ],
            [
                'commodity_id' => 113,
                'name' => '-',
                'satuan' => '1 Kali'
            ],
            [
                'commodity_id' => 114,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 114,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 114,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 115,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 115,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 115,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 116,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 116,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 116,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 117,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 117,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 117,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 118,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 118,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 118,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 119,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 119,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 119,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 120,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 120,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 120,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 121,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 121,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 121,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 122,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 122,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 122,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 123,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 123,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 123,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 124,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 124,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 124,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 125,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 125,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 125,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 126,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 126,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 126,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
            [
                'commodity_id' => 127,
                'name' => 'Laki-Laki',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 127,
                'name' => 'Perempuan',
                'satuan' => '1 Hari'
            ],
            [
                'commodity_id' => 127,
                'name' => 'Borongan',
                'satuan' => '1 Ha'
            ],
        ];

        foreach ($qualities as $quality){
            Quality::create($quality);
        }
    }
}
