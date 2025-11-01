<?php

namespace App\Imports;

use App\Models\Student;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{   
    

   use Importable, SkipsFailures;
    public function model(array $row)
    {
         $tanggal = null;

    if (!empty($row['tanggal_lahir'])) {
        if (is_numeric($row['tanggal_lahir'])) {
            // Format tanggal Excel
            $tanggal = Date::excelToDateTimeObject($row['tanggal_lahir'])->format('Y-m-d');
        } else {
            // Format teks manual (12/08/2004 atau 2004-08-12)
            try {
                $tanggal = Carbon::parse($row['tanggal_lahir'])->format('Y-m-d');
            } catch (\Exception $e) {
                $tanggal = null;
            }
        }
    }
        return new Student([
            'nis'        => $row['nis'],
            'name'       => $row['nama'],
            'class'      => $row['kelas'],
            'gender'     => $row['jenis_kelamin'] ?? null,
            'birth_date' => $tanggal,
            'address'    => $row['alamat'] ?? null,
            'phone'      => $row['no_telepon'] ?? null,
            'email'      => $row['email'] ?? null,
        ]);
    }

     public function rules(): array
    {
        return [
            '*.nis'            => 'required|numeric|unique:students,nis',
            '*.nama'           => 'required|string',
            '*.kelas'          => 'required|string',
            '*.jenis_kelamin'  => 'nullable|string',
            '*.tanggal_lahir'  => 'nullable',
            '*.alamat'         => 'nullable|string',
            '*.email'          => 'nullable|email',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.nis.required' => 'Kolom NIS wajib diisi.',
            '*.nis.unique' => 'NIS sudah terdaftar.',
            '*.nis.numeric' => 'Kolom NIS harus berupa angka.',
            '*.nama.required' => 'Kolom Nama wajib diisi.',
            '*.tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            '*.kelas.required' => 'Kolom Kelas wajib diisi.',
            '*.email.email' => 'Format email tidak valid.',
        ];
    }   
}
