<?php
namespace App\Exports;

use App\Models\Bookshelf;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookshelfsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Bookshelf::select('id', 'code', 'name', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Kode', 'Nama', 'Dibuat'];
    }
}