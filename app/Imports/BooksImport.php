<?php
namespace App\Imports;

use App\Models\Book;
use App\Models\Category;
use App\Models\Bookshelf;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $category = Category::where('category', $row['kategori'])->first();
        $bookshelf = Bookshelf::where('name', $row['rak'])->first();

        return new Book([
            'title'        => $row['judul'],
            'author'       => $row['penulis'],
            'year'         => $row['tahun'],
            'publisher'    => $row['penerbit'],
            'city'         => $row['kota'],
            'category_id'  => $category?->id,
            'bookshelf_id' => $bookshelf?->id,
        ]);
    }
}