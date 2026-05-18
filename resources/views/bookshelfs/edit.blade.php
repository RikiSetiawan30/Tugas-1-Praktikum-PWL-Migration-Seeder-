@extends('layouts.app')
@section('title', 'Edit Rak Buku')

@section('content')
<div class="max-w-lg">
    <h1 class="text-xl font-semibold mb-6">Edit Rak Buku</h1>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <form action="{{ route('bookshelfs.update', $bookshelf) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kode Rak</label>
                <input type="text" name="code"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('code') border-red-400 @enderror"
                    value="{{ old('code', $bookshelf->code) }}">
                @error('code')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Rak</label>
                <input type="text" name="name"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('name') border-red-400 @enderror"
                    value="{{ old('name', $bookshelf->name) }}">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex gap-2">
                <a href="{{ route('bookshelfs.index') }}"
                   class="px-4 py-2 text-sm border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                <button type="submit"
                   class="px-4 py-2 text-sm bg-gray-800 text-white rounded-md hover:bg-gray-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection