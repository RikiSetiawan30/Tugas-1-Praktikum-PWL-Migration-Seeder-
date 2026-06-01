<?php
namespace App\Exports;

use App\Models\ReturnModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReturnsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ReturnModel::with('loanDetail.book', 'loanDetail.loan.user')->get()->map(function($ret) {
            return [
                'id'       => $ret->id,
                'peminjam' => $ret->loanDetail->loan->user->first_name ?? '-',
                'buku'     => $ret->loanDetail->book->title ?? '-',
                'charge'   => $ret->charge ? 'Ya' : 'Tidak',
                'amount'   => $ret->amount,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Peminjam', 'Buku', 'Denda', 'Jumlah'];
    }
}