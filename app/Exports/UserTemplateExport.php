<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserTemplateExport implements FromArray, WithHeadings
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
            'userid',
            'name',
            'lname',
            'email',
            'role',
            'password',
        ];
    }
}
