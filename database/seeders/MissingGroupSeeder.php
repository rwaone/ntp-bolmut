<?php

namespace Database\Seeders;

use App\Models\Commodity;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissingGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groupsId = [19,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,88,89,90,91,92,93,94,95,96,97,98,99,99,100,101,102,103,104,105,106,107,108,109,110,111];
        $commodities = Commodity::whereIn('id', $groupsId)->get();
        $commodities->destroy();
    }
}
