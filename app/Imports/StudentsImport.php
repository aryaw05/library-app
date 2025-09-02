<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'nis'        => $row['nis'],
            'name'       => $row['nama'],
            'class'      => $row['kelas'],
            'gender'     => $row['gender'] ?? null,
            'birth_date' => $row['tanggal_lahir'] ?? null,
            'address'    => $row['alamat'] ?? null,
            'phone'      => $row['no_telepon'] ?? null,
            'email'      => $row['email'] ?? null,
        ]);
    }
}
