<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">

    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/" class="text-lg font-semibold text-gray-800">Perpustakaan</a>
                <div class="flex gap-6 text-sm items-center">
                    <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-900">Kategori</a>
                    <a href="{{ route('bookshelfs.index') }}" class="text-gray-600 hover:text-gray-900">Rak Buku</a>
                    <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-gray-900">Buku</a>
                    <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900">Users</a>
                    <a href="{{ route('loans.index') }}" class="text-gray-600 hover:text-gray-900">Peminjaman</a>
                    <a href="{{ route('returns.index') }}" class="text-gray-600 hover:text-gray-900">Pengembalian</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <x-alert />
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>