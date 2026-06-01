<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 5px 8px; text-align: left; }
        th { background-color: #f3f4f6; }
    </style>
</head>
<body>
    <h2>Daftar User</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NPM</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $i => $user)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $user->npm }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>