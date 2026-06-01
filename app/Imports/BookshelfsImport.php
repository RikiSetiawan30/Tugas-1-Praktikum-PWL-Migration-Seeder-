<?php
namespace App\Imports;

use App\Models\Bookshelf;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookshelfsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Bookshelf([
            'code' => $row['kode'],
            'name' => $row['nama'],
        ]);
    }
}