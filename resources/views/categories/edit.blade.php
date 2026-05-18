@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')
<div class="max-w-lg">
    <h1 class="text-xl font-semibold mb-6">Edit Kategori</h1>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                <input type="text" name="category"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('category') border-red-400 @enderror"
                    value="{{ old('category', $category->category) }}">
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex gap-2">
                <a href="{{ route('categories.index') }}"
                   class="px-4 py-2 text-sm border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                <button type="submit"
                   class="px-4 py-2 text-sm bg-gray-800 text-white rounded-md hover:bg-gray-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection