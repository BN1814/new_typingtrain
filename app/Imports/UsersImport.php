<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithheadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Hash;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //
            'userid' => $row['userid'],
            'name' => $row['name'],
            'lname' => $row['lname'],
            'email' => $row['email'],
            'role' => $row['role'],
            'password' => Hash::make($row['password']),
        ]);
    }

    public function rules(): array {
        return [
            'email' => 'required|email|unique:users',
            '*.email' => 'required|email|unique:users',
        ];
    }
}
