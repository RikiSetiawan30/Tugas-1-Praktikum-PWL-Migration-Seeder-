@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-xl font-semibold mb-6">Edit User</h1>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">NPM</label>
                    <input type="number" name="npm"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-gray-50 text-gray-500 cursor-not-allowed"
                        value="{{ $user->npm }}" disabled>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" name="first_name"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('first_name') border-red-400 @enderror"
                        value="{{ old('first_name', $user->first_name) }}">
                    @error('first_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="last_name"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('last_name') border-red-400 @enderror"
                        value="{{ old('last_name', $user->last_name) }}">
                    @error('last_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('username') border-red-400 @enderror"
                        value="{{ old('username', $user->username) }}">
                    @error('username')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('email') border-red-400 @enderror"
                        value="{{ old('email', $user->email) }}">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru <span class="text-gray-400">(opsional)</span></label>
                    <input type="password" name="password"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('password') border-red-400 @enderror">
                    @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400">
                </div>
            </div>

            <div class="flex gap-2 mt-6">
                <a href="{{ route('users.index') }}"
                   class="px-4 py-2 text-sm border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                <button type="submit"
                   class="px-4 py-2 text-sm bg-gray-800 text-white rounded-md hover:bg-gray-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection