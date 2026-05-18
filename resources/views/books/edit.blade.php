@extends('layouts.app')
@section('title', 'Edit Buku')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-xl font-semibold mb-6">Edit Buku</h1>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="title"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('title') border-red-400 @enderror"
                        value="{{ old('title', $book->title) }}">
                    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
                    <input type="text" name="author"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('author') border-red-400 @enderror"
                        value="{{ old('author', $book->author) }}">
                    @error('author')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                    <input type="number" name="year"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('year') border-red-400 @enderror"
                        value="{{ old('year', $book->year) }}">
                    @error('year')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penerbit</label>
                    <input type="text" name="publisher"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('publisher') border-red-400 @enderror"
                        value="{{ old('publisher', $book->publisher) }}">
                    @error('publisher')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kota</label>
                    <input type="text" name="city"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('city') border-red-400 @enderror"
                        value="{{ old('city', $book->city) }}">
                    @error('city')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('category_id') border-red-400 @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $book->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->category }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rak Buku</label>
                    <select name="bookshelf_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('bookshelf_id') border-red-400 @enderror">
                        <option value="">-- Pilih Rak --</option>
                        @foreach($bookshelfs as $shelf)
                            <option value="{{ $shelf->id }}" {{ old('bookshelf_id', $book->bookshelf_id) == $shelf->id ? 'selected' : '' }}>
                                {{ $shelf->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('bookshelf_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cover <span class="text-gray-400">(opsional)</span></label>
                    @if($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" class="h-16 mb-2 rounded">
                    @endif
                    <input type="file" name="cover" accept="image/*"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm @error('cover') border-red-400 @enderror">
                    @error('cover')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex gap-2 mt-6">
                <a href="{{ route('books.index') }}"
                   class="px-4 py-2 text-sm border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                <button type="submit"
                   class="px-4 py-2 text-sm bg-gray-800 text-white rounded-md hover:bg-gray-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection