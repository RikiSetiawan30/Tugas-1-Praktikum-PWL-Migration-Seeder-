<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Peminjaman</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 5px 8px; text-align: left; }
        th { background-color: #f3f4f6; }
    </style>
</head>
<body>
    <h2>Daftar Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Peminjam</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $i => $loan)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $loan->user->first_name ?? '-' }} {{ $loan->user->last_name ?? '' }}</td>
                <td>{{ $loan->loanDetails->map(fn($d) => $d->book->title ?? '-')->implode(', ') }}</td>
                <td>{{ $loan->loan_at }}</td>
                <td>{{ $loan->return_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>