<?php
namespace App\Imports;

use App\Models\Loan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LoansImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Loan([
            'user_npm'  => $row['npm'],
            'loan_at'   => $row['tanggal_pinjam'],
            'return_at' => $row['tanggal_kembali'],
        ]);
    }
}