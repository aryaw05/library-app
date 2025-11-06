<?php

namespace App\Exports;

use App\Models\BookLoan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class booksLoanLateExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   public function collection()
    {
          $loans = BookLoan::with(['book', 'student'])
            ->where('status', 'returned_late') 
            ->get();

        return $loans->map(function ($loan) {
            return [
                'judul_buku'   => $loan->book?->title ?? '-',
                'nama_siswa'  => $loan->student?->name ?? '-',
                'tanggal_pinjam' => $loan->loan_date ? Carbon::parse($loan->loan_date)->format('d-m-Y') : '-',
                'tanggal_jatuh_tempo' => $loan->due_date ? Carbon::parse($loan->due_date)->format('d-m-Y') : '-',
                't  anggal_kembali' => $loan->return_date ? Carbon::parse($loan->return_date)->format('d-m-Y') : '-',
                'status' => $loan->status,
            ];
        });
    }

    
    public function headings(): array
    {
        return [
            'Judul Buku',
            'Nama Siswa',
            'Tanggal Pinjam',
            'Tanggal Jatuh Tempo',
            'Tanggal Kembali',
            'Status',
        ];
    }
}
