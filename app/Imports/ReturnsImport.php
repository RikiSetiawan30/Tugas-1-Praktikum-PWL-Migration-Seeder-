<?php
namespace App\Imports;

use App\Models\ReturnModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReturnsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new ReturnModel([
            'loan_detail_id' => $row['id'],
            'charge'         => $row['denda'] === 'Ya' ? 1 : 0,
            'amount'         => $row['jumlah'],
        ]);
    }
}