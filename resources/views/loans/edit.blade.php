@extends('layouts.app')
@section('title', 'Edit Peminjaman')
@section('content')
<div class="max-w-2xl">
    <h1 class="text-xl font-semibold mb-6">Edit Peminjaman</h1>
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <form action="{{ route('loans.update', $loan) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Peminjam</label>
                <select name="user_npm" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                    @foreach($users as $user)
                        <option value="{{ $user->npm }}" {{ old('user_npm', $loan->user_npm) == $user->npm ? 'selected' : '' }}>
                            {{ $user->npm }} - {{ $user->first_name }} {{ $user->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pinjam</label>
                    <input type="date" name="loan_at" value="{{ old('loan_at', $loan->loan_at) }}"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kembali</label>
                    <input type="date" name="return_at" value="{{ old('return_at', $loan->return_at) }}"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Buku</label>
                <div class="border border-gray-300 rounded-md p-3 max-h-48 overflow-y-auto space-y-1">
                    @foreach($books as $book)
                    <label class="flex items-center gap-2 text-sm cursor-pointer">
                        <input type="checkbox" name="book_ids[]" value="{{ $book->id }}"
                            {{ in_array($book->id, old('book_ids', $selectedBooks)) ? 'checked' : '' }}>
                        {{ $book->title }} - {{ $book->author }}
                    </label>
                    @endforeach
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('loans.index') }}" class="px-4 py-2 text-sm border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                <button type="submit" class="px-4 py-2 text-sm bg-gray-800 text-white rounded-md hover:bg-gray-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection