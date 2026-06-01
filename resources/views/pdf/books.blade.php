<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buku</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 5px 8px; text-align: left; }
        th { background-color: #f3f4f6; }
    </style>
</head>
<body>
    <h2>Daftar Buku</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Rak</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $i => $book)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->category->category ?? '-' }}</td>
                <td>{{ $book->bookshelf->name ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>