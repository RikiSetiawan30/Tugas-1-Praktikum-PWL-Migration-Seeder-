<?php
namespace App\Exports;

use App\Models\Loan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoansExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Loan::with('user', 'loanDetails.book')->get()->map(function($loan) {
            return [
                'id'       => $loan->id,
                'npm'      => $loan->user_npm,
                'peminjam' => $loan->user ? $loan->user->first_name . ' ' . $loan->user->last_name : '-',
                'buku'     => $loan->loanDetails->map(fn($d) => $d->book->title ?? '-')->implode(', '),
                'loan_at'  => $loan->loan_at,
                'return_at'=> $loan->return_at,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'NPM', 'Peminjam', 'Buku', 'Tanggal Pinjam', 'Tanggal Kembali'];
    }
}