<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rak Buku</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px 10px; text-align: left; }
        th { background-color: #f3f4f6; }
    </style>
</head>
<body>
    <h2>Daftar Rak Buku</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookshelfs as $i => $shelf)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $shelf->code }}</td>
                <td>{{ $shelf->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>