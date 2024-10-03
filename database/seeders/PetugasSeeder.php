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
            ['name' => 'Lastrie Ponongoa, S.T., M.Si.', 'jabatan' => 'Pengawas'],
            ['name' => 'Tety Resilia Pontoh, S.E., M.M.', 'jabatan' => 'Pengawas'],
            ['name' => 'Zulkan Pohonto, S.Pt.', 'jabatan' => 'Pengawas'],
            ['name' => 'Nirwan Husin, S.P.', 'jabatan' => 'Pengawas'],
            ['name' => 'Ikbal Darisa, S.P.', 'jabatan' => 'Pengawas'],
            ['name' => 'Fitria Alkatiri, S.Kom.', 'jabatan' => 'Pengawas'],

            // pencacah
            ['name' => 'Mulwirad Paputungan', 'jabatan' => 'Pencacah'],
            ['name' => 'Romi Korompot', 'jabatan' => 'Pencacah'],
            ['name' => 'Erwin Pontoh', 'jabatan' => 'Pencacah'],
            ['name' => 'Ridwan Manangin, SP', 'jabatan' => 'Pencacah'],
            ['name' => 'Andi Syhadan Terwo, S.Tr.P.', 'jabatan' => 'Pencacah'],
            ['name' => 'Husni Halid, S.T.P.', 'jabatan' => 'Pencacah'],
            ['name' => 'Imam Hidayat, S.P.', 'jabatan' => 'Pencacah'],
            ['name' => 'Haiqal Bastian Rivai, S.T.P.', 'jabatan' => 'Pencacah'],
            ['name' => 'Muhammad Muhlisin, S.Pt.', 'jabatan' => 'Pencacah'],
            ['name' => 'Fiking Talibo, S.Si.', 'jabatan' => 'Pencacah'],
            ['name' => 'Rukmana Pontoh, S.P.', 'jabatan' => 'Pencacah'],
            ['name' => 'Kardilia Lauma', 'jabatan' => 'Pencacah'],
            ['name' => 'Dinda', 'jabatan' => 'Pencacah'],
            ['name' => 'Finka Pontoh', 'jabatan' => 'Pencacah'],
        ];
        foreach ($petugass as $petugas) {
            # code...
            Petugas::create($petugas);
        }
    }
}
