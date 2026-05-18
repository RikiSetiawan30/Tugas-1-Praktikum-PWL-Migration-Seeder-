@extends('layouts.app')
@section('title', 'Edit Pengembalian')
@section('content')
<div class="max-w-lg">
    <h1 class="text-xl font-semibold mb-6">Edit Pengembalian</h1>
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <form action="{{ route('returns.update', $return) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Detail Peminjaman</label>
                <input type="text"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-gray-50 text-gray-500"
                    value="{{ $return->loanDetail->loan->user->first_name ?? '-' }} - {{ $return->loanDetail->book->title ?? '-' }}" disabled>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Denda</label>
                <select name="charge" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                    <option value="0" {{ old('charge', $return->charge) == '0' ? 'selected' : '' }}>Tidak</option>
                    <option value="1" {{ old('charge', $return->charge) == '1' ? 'selected' : '' }}>Ya</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Denda (Rp)</label>
                <input type="number" name="amount" value="{{ old('amount', $return->amount) }}" min="0"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
            </div>
            <div class="flex gap-2">
                <a href="{{ route('returns.index') }}" class="px-4 py-2 text-sm border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                <button type="submit" class="px-4 py-2 text-sm bg-gray-800 text-white rounded-md hover:bg-gray-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection