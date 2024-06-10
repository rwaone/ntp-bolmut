<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupatens = [
            [
                'code' => '7107',
                'name' => 'BOLAANG MONGONDOW UTARA'
            ]
        ];
        Kabupaten::insert($kabupatens);
    }
}
