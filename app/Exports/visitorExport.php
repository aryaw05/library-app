<?php

namespace App\Exports;

use App\Models\BookLoan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class visitorExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $loans = BookLoan::with(['book', 'student'])->get();

        return $loans->map(function ($loan) {
            return [
                'nama_siswa'          => $loan->student?->name ?? '-',
                'judul_buku'          => $loan->book?->title ?? '-',
                'tanggal_pinjam'      => $loan->loan_date 
                                           ? Carbon::parse($loan->loan_date)
                                           ->format('d-m-Y')
                                           : '-',
                'tanggal_jatuh_tempo' => $loan->due_date 
                                           ? Carbon::parse($loan->due_date)->format('d-m-Y')
                                           
                                           : '-',
                'tanggal_kembali'     => $loan->return_date 
                                           ? Carbon::parse($loan->return_date)->format('d-m-Y') 
                                           : '-',
                'status'              => $loan->status,
                'created_at'          => $loan->created_at 
                                           ? Carbon::parse($loan->created_at)
                                           ->timezone('Asia/Jakarta')->format('d-m-Y H:i:s') 
                                           : '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Buku Dipinjam',
            'Tanggal Pinjam',
            'Tanggal Jatuh Tempo',
            'Tanggal Kembali',
            'Status',
            'Tanggal Mengunjungi',
        ];
    }
}
