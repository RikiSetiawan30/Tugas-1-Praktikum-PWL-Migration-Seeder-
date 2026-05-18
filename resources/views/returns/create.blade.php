@extends('layouts.app')
@section('title', 'Tambah Pengembalian')
@section('content')
<div class="max-w-lg">
    <h1 class="text-xl font-semibold mb-6">Tambah Pengembalian</h1>
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <form action="{{ route('returns.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Detail Peminjaman</label>
                <select name="loan_detail_id" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm @error('loan_detail_id') border-red-400 @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach($loanDetails as $detail)
                        <option value="{{ $detail->id }}" {{ old('loan_detail_id') == $detail->id ? 'selected' : '' }}>
                            {{ $detail->loan->user->first_name ?? '-' }} - {{ $detail->book->title ?? '-' }}
                        </option>
                    @endforeach
                </select>
                @error('loan_detail_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Denda</label>
                <select name="charge" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                    <option value="0" {{ old('charge') == '0' ? 'selected' : '' }}>Tidak</option>
                    <option value="1" {{ old('charge') == '1' ? 'selected' : '' }}>Ya</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Denda (Rp)</label>
                <input type="number" name="amount" value="{{ old('amount', 0) }}" min="0"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm @error('amount') border-red-400 @enderror">
                @error('amount')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex gap-2">
                <a href="{{ route('returns.index') }}" class="px-4 py-2 text-sm border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                <button type="submit" class="px-4 py-2 text-sm bg-gray-800 text-white rounded-md hover:bg-gray-700">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection