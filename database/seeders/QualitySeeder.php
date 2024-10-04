<?php

namespace Database\Seeders;

use App\Models\Quality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class QualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file_name = 'public/seeders/qualities.csv';
        if (Storage::exists($file_name)) {
            $csv_data = Storage::get($file_name);
        } else {
            $csv_data = file_get_contents($file_name);
        }
        $lines = preg_split("/\r\n|\n|\r/", $csv_data);
        $rows = array_map('str_getcsv', $lines);
        $headers = array_shift($rows);
        // dd($lines);
        foreach ($rows as $row) {
            $quality = new Quality(
                [
                    'code' => $row[0],
                    'commodity_id' => $row[1],
                    'name' => $row[2],
                    'satuan' => $row[3],
                    'status' => $row[6],
                ]
            );
            if (strlen($row[4]) > 0) {
                $quality->min_price = $row[4];
            }
            if (strlen($row[5]) > 0) {

                $quality->max_price = $row[5];
            }
            $quality->save();
        }
    }
}
