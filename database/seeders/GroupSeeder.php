<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $groups = [
            [
                'section_id' => 1,
                'name' => 'GABAH',
            ],
            [
                'section_id' => 1,
                'name' => 'PALAWIJA',
            ],
            [
                'section_id' => 2,
                'name' => 'BIBIT PADI',
            ],
            [
                'section_id' => 2,
                'name' => 'BIBIT PALAWIJA',
            ],
            [
                'section_id' => 2,
                'name' => 'PUPUK SUBSIDI',
            ],
            [
                'section_id' => 2,
                'name' => 'PUPUK NON SUBSIDI',
            ],
            [
                'section_id' => 2,
                'name' => 'OBAT-OBATAN',
            ],
            [
                'section_id' => 2,
                'name' => 'BIAYA SEWA',
            ],
            [
                'section_id' => 2,
                'name' => 'TRANSPORTASI',
            ],
            [
                'section_id' => 2,
                'name' => 'BARANG MODAL',
            ],
            [
                'section_id' => 2,
                'name' => 'PENGELUARAN LAIN',
            ],
            [
                'section_id' => 2,
                'name' => 'UPAH BURUH',
            ],
        ];
        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
