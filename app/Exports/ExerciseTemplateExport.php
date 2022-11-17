<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExerciseTemplateExport implements FromArray, WithHeadings
{
    /**
     * @return array
     */
    public function array(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'level',
            'level_name',
            'data_level',
        ];
    }
}
