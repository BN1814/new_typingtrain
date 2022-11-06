<?php

namespace App\Imports;

use App\Models\Exercise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithheadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExercisesImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Exercise([
            //
            'level' => $row['level'],
            'level_name' => $row['level_name'],
            'data_level' => $row['data_level'],
        ]);
    }
    public function rules(): array {
        return [
            'level' => 'required|unique:exercises',
            '*.level' => 'required|unique:exercises',

            'level_name' => 'required|unique:exercises',
            '*.level_name' => 'required|unique:exercises',
        ];
    }
}
