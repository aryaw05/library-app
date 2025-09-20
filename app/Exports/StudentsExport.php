<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          return Student::select( "name", "nis" , 'class' , 'gender' ,'address' , 'birth_date' , 'email' , 'phone' )->get();

    }

    
    public function headings(): array
    {
        return [
            'Nama Siswa',
            'NIS',
            'Kelas',
            'Jenis Kelamin',
            'Alamat',
            'Tanggal Lahir',
            'Email',
            'No HP',
        ];
    }
}
