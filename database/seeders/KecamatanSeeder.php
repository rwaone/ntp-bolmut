<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatans = collect([
            ['code' => '010', 'name' => 'SANGKUB'],
            ['code' => '020', 'name' => 'BINTAUNA'],
            ['code' => '030', 'name' => 'BOLANG ITANG TIMUR'],
            ['code' => '040', 'name' => 'BOLANG ITANG BARAT'],
            ['code' => '050', 'name' => 'KAIDIPANG'],
            ['code' => '060', 'name' => 'PINOGALUMAN'],
        ]);
        $kabupaten_id = Kabupaten::where('code', '7107')->value('id');
        if ($kabupaten_id === null) {
            throw new \Exception('Kabupaten with code 7107 not found');
        }
        $kecamatans->each(function ($kecamatan) use ($kabupaten_id) {
            $kecamatan['kabupaten_id'] = $kabupaten_id;
            Kecamatan::create($kecamatan);
        });
    }
}
