<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $petugass = [
            ['name' => 'Roronoa Zoro', 'nip' => '1998101320211001', 'jabatan' => 'Pencacah'],
            ['name' => 'Mihawk', 'nip' => '1998101320211001', 'jabatan' => 'Pengawas'],
        ];
        foreach ($petugass as $petugas) {
            # code...
            Petugas::create($petugas);
        }
    }
}
