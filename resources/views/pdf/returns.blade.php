<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pengembalian</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 5px 8px; text-align: left; }
        th { background-color: #f3f4f6; }
    </style>
</head>
<body>
    <h2>Daftar Pengembalian</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Peminjam</th>
                <th>Buku</th>
                <th>Denda</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($returns as $i => $ret)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $ret->loanDetail->loan->user->first_name ?? '-' }} {{ $ret->loanDetail->loan->user->last_name ?? '' }}</td>
                <td>{{ $ret->loanDetail->book->title ?? '-' }}</td>
                <td>{{ $ret->charge ? 'Ya' : 'Tidak' }}</td>
                <td>Rp {{ number_format($ret->amount, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>