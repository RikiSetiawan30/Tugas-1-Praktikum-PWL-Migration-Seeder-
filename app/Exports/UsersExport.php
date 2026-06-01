<?php
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::select('npm', 'username', 'first_name', 'last_name', 'email', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['NPM', 'Username', 'First Name', 'Last Name', 'Email', 'Dibuat'];
    }
}