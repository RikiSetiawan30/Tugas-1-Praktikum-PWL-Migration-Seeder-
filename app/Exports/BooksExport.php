<?php
namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Book::with('category', 'bookshelf')->get()->map(function($book) {
            return [
                'id'        => $book->id,
                'title'     => $book->title,
                'author'    => $book->author,
                'year'      => $book->year,
                'publisher' => $book->publisher,
                'city'      => $book->city,
                'category'  => $book->category->category ?? '-',
                'bookshelf' => $book->bookshelf->name ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Judul', 'Penulis', 'Tahun', 'Penerbit', 'Kota', 'Kategori', 'Rak'];
    }
}