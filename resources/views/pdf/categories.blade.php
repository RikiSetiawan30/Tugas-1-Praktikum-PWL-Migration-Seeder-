<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kategori</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px 10px; text-align: left; }
        th { background-color: #f3f4f6; }
    </style>
</head>
<body>
    <h2>Daftar Kategori</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $i => $cat)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $cat->category }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>