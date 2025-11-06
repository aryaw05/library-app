<?php

namespace App\Exports;

use App\Models\Books;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          return Books::select( "title", "author" , 'year' , 'stock'  , 'category')->get();

    }

    
    public function headings(): array
    {
        return [
            'Judul Buku',
            'Penulis',
            'Tahun Terbit',
            'Stok',
            'Kategori',
        ];
    }
}
