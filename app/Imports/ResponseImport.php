<?php

namespace App\Imports;

use App\Models\Response;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResponseImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $importReport =[];

    public function model(array $row)
    {
                // Validation rules for each row
        $validator = Validator::make($row, [
            'column1' => 'required|string',
            'column2' => 'required|integer',
            // Add more rules
        ]);

        if ($validator->fails()) {
            // Collect failed row details
            $this->importReport[] = [
                'row' => $row,
                'status' => 'failed',
                'errors' => $validator->errors()->all()
            ];
        } else {
            // Collect successful row details and save it
            $this->importReport[] = [
                'row' => $row,
                'status' => 'success'
            ];

            // Store the validated data into the database
            return new Response([
                'column1' => $row['column1'],
                'column2' => $row['column2'],
                // Add more columns
            ]);
        }

    }
}
