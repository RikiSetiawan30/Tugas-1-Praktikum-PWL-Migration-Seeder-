<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Perpustakaan</h1>
            <p class="text-sm text-gray-500 mt-1">Silakan login untuk melanjutkan</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <form action="/login" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('email') border-red-400 @enderror"
                        placeholder="email@example.com">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400"
                        placeholder="••••••••">
                </div>
                <button type="submit"
                    class="w-full px-4 py-2 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">
                    Login
                </button>
            </form>
        </div>
    </div>

    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({ icon: 'error', title: 'Gagal!', text: '{{ session('error') }}' });
        });
    </script>
    @endif

</body>
</html>