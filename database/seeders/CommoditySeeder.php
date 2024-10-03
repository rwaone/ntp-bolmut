<?php

namespace Database\Seeders;

use App\Models\Commodity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commodities = [
            [
                'group_id' => 1,
                'name' => 'Gabah Kering Giling (GKG)',
            ],
            [
                'group_id' => 1,
                'name' => 'Gabah Kering Panen (GKP)',
            ],
            [
                'group_id' => 1,
                'name' => 'Gabah Kualitas Rendah',
            ],
            [
                'group_id' => 1,
                'name' => 'Gabah Ketan Kering Giling',
            ],
            [
                'group_id' => 1,
                'name' => 'Gabah Ketan Kering Panen',
            ],
            [
                'group_id' => 2,
                'name' => 'Jagung',
            ],
            [
                'group_id' => 2,
                'name' => 'Kacang Hijau',
            ],
            [
                'group_id' => 2,
                'name' => 'Kacang Kedelai',
            ],
            [
                'group_id' => 2,
                'name' => 'Kacang Tanah',
            ],
            [
                'group_id' => 2,
                'name' => 'Ubi Kayu',
            ],
            [
                'group_id' => 2,
                'name' => 'Ubi Jalar',
            ],
            [
                'group_id' => 2,
                'name' => 'Talas',
            ],
            [
                'group_id' => 3,
                'name' => 'Bibit Padi',
            ],
            [
                'group_id' => 3,
                'name' => 'Benih Padi',
            ],
            [
                'group_id' => 4,
                'name' => 'Jagung',
            ],
            [
                'group_id' => 4,
                'name' => 'Kacang Tanah',
            ],
            [
                'group_id' => 4,
                'name' => 'Kacang Kedelai',
            ],
            [
                'group_id' => 4,
                'name' => 'Kacang Hijau',
            ],
            [
                'group_id' => 4,
                'name' => 'Ubi Kayu',
            ],
            [
                'group_id' => 4,
                'name' => 'Ubi Jalar',
            ],
            [
                'group_id' => 4,
                'name' => 'Talas',
            ],
            [
                'group_id' => 5,
                'name' => 'Urea',
            ],
            [
                'group_id' => 5,
                'name' => 'Super Phosphate',
            ],
            [
                'group_id' => 5,
                'name' => 'Zwavalezure Ammoniak (ZA)',
            ],
            [
                'group_id' => 5,
                'name' => 'Nitrogen Phosphate Kalium (NPK)',
            ],
            [
                'group_id' => 5,
                'name' => 'Petroganik',
            ],
            [
                'group_id' => 6,
                'name' => 'Urea',
            ],
            [
                'group_id' => 6,
                'name' => 'Triple Super Phosphate',
            ],
            [
                'group_id' => 6,
                'name' => 'Super Phosphate',
            ],
            [
                'group_id' => 6,
                'name' => 'Zwavalezure Amoniak (ZA)',
            ],
            [
                'group_id' => 6,
                'name' => 'Kalium Chloride (KCL)',
            ],
            [
                'group_id' => 6,
                'name' => 'Nitrogen Phosphate Kalium (NPK)',
            ],
            [
                'group_id' => 6,
                'name' => 'Pupuk Kandang',
            ],
            [
                'group_id' => 6,
                'name' => 'Kapur',
            ],
            [
                'group_id' => 6,
                'name' => 'Pupuk Kompos',
            ],
            [
                'group_id' => 6,
                'name' => 'Zat Perangsang Tumbuh (ZPT)',
            ],
            [
                'group_id' => 6,
                'name' => 'Garam',
            ],
            [
                'group_id' => 6,
                'name' => 'Petroganik',
            ],
            [
                'group_id' => 7,
                'name' => 'Insektisida (Pembasmi Serangga)',
            ],
            [
                'group_id' => 7,
                'name' => 'Fungisida (Pembasmi Jamur)',
            ],
            [
                'group_id' => 7,
                'name' => 'Herbisida (Pembasmi Gulma)',
            ],
            [
                'group_id' => 7,
                'name' => 'Rodentisida (Pembasmi Hewan Pengerat)',
            ],
            [
                'group_id' => 7,
                'name' => 'Bakterisida (Pembasmi Bakteri)',
            ],
            [
                'group_id' => 7,
                'name' => 'Akarisida (Pembasmi Tungau)',
            ],
            [
                'group_id' => 7,
                'name' => 'Moluskisida (Pembasmi Keong)',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Tanah Ladang',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Tanah Sawah',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Garu dan Ternak',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Traktor Tangan',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Bajak',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Penyemprotan Hama',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Gerobak',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Tresher/Alat Perontok',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Pompa Air',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Genset',
            ],
            [
                'group_id' => 8,
                'name' => 'Sewa Mesin Pemangkas',
            ],
            [
                'group_id' => 9,
                'name' => 'Ongkos Angkut',
            ],
            [
                'group_id' => 9,
                'name' => 'Bensin',
            ],
            [
                'group_id' => 9,
                'name' => 'Solar',
            ],
            [
                'group_id' => 9,
                'name' => 'Oli',
            ],
            [
                'group_id' => 9,
                'name' => 'Ban Luar Motor',
            ],
            [
                'group_id' => 9,
                'name' => 'Ban Dalam Motor',
            ],
            [
                'group_id' => 9,
                'name' => 'Ban Luar Sepeda',
            ],
            [
                'group_id' => 9,
                'name' => 'Ban Dalam Sepeda',
            ],
            [
                'group_id' => 9,
                'name' => 'Ban Luar Mobil',
            ],
            [
                'group_id' => 9,
                'name' => 'Ban Dalam Mobil',
            ],
            [
                'group_id' => 9,
                'name' => 'Tarif Servis Sepeda',
            ],
            [
                'group_id' => 9,
                'name' => 'Tarif Servis Motor',
            ],
            [
                'group_id' => 9,
                'name' => 'Tarif Servis Mobil',
            ],
            [
                'group_id' => 9,
                'name' => 'Tarif Pulsa Ponsel',
            ],
            [
                'group_id' => 9,
                'name' => 'Onderdil Motor',
            ],
            [
                'group_id' => 9,
                'name' => 'Rantai Motor',
            ],
            [
                'group_id' => 10,
                'name' => 'Tampah/Nyiru',
            ],
            [
                'group_id' => 10,
                'name' => 'Karung',
            ],
            [
                'group_id' => 10,
                'name' => 'Keranjang',
            ],
            [
                'group_id' => 10,
                'name' => 'Ani-Ani/Ketam',
            ],
            [
                'group_id' => 10,
                'name' => 'Cangkul',
            ],
            [
                'group_id' => 10,
                'name' => 'Gunting',
            ],
            [
                'group_id' => 10,
                'name' => 'Arit/Sabit',
            ],
            [
                'group_id' => 10,
                'name' => 'Garu',
            ],
            [
                'group_id' => 10,
                'name' => 'Traktor Tangan',
            ],
            [
                'group_id' => 10,
                'name' => 'Tresher',
            ],
            [
                'group_id' => 10,
                'name' => 'Golok',
            ],
            [
                'group_id' => 10,
                'name' => 'Parang',
            ],
            [
                'group_id' => 10,
                'name' => 'Bajak',
            ],
            [
                'group_id' => 10,
                'name' => 'Garpu',
            ],
            [
                'group_id' => 10,
                'name' => 'Pisau',
            ],
            [
                'group_id' => 10,
                'name' => 'Linggis',
            ],
            [
                'group_id' => 10,
                'name' => 'Ember',
            ],
            [
                'group_id' => 10,
                'name' => 'Pompa Air',
            ],
            [
                'group_id' => 10,
                'name' => 'Terpal',
            ],
            [
                'group_id' => 10,
                'name' => 'Kereta Dorong',
            ],
            [
                'group_id' => 10,
                'name' => 'Sprayer',
            ],
            [
                'group_id' => 10,
                'name' => 'Kored/Pembersih Rumput',
            ],
            [
                'group_id' => 10,
                'name' => 'Kapak',
            ],
            [
                'group_id' => 10,
                'name' => 'Mesin Pemotong Rumput',
            ],
            [
                'group_id' => 10,
                'name' => 'Selang',
            ],
            [
                'group_id' => 10,
                'name' => 'Shading Net',
            ],
            [
                'group_id' => 10,
                'name' => 'Pipa',
            ],
            [
                'group_id' => 10,
                'name' => 'Sekop',
            ],
            [
                'group_id' => 10,
                'name' => 'Tas Noken',
            ],
            [
                'group_id' => 10,
                'name' => 'Tangki',
            ],
            [
                'group_id' => 11,
                'name' => 'Biaya Pengairan Lahan',
            ],
            [
                'group_id' => 11,
                'name' => 'Minyak Tanah',
            ],
            [
                'group_id' => 11,
                'name' => 'Plastik Transparan',
            ],
            [
                'group_id' => 11,
                'name' => 'Bambu',
            ],
            [
                'group_id' => 11,
                'name' => 'Kawat',
            ],
            [
                'group_id' => 11,
                'name' => 'Kayu Balok',
            ],
            [
                'group_id' => 11,
                'name' => 'Aki',
            ],
            [
                'group_id' => 11,
                'name' => 'Tali',
            ],
            [
                'group_id' => 11,
                'name' => 'Paku',
            ],
            [
                'group_id' => 11,
                'name' => 'Batu Asah',
            ],
            [
                'group_id' => 11,
                'name' => 'Tarif Servis Traktro',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Mencangkul',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Membajak',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Penanaman',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Merambet/Menyiangi',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Pemanenan',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Pemupukan',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Penyemprotan/OPT',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Perontokan',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Pengeringan',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Mencabut Bibit',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Pemipilan',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Penyemaian/Penebaran Benih',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Penjarangan',
            ],
            [
                'group_id' => 12,
                'name' => 'Upah Pikul/Angkut',
            ],
        ];

        foreach ($commodities as $commoditiy) {
            Commodity::create($commoditiy);
        }
    }
}
