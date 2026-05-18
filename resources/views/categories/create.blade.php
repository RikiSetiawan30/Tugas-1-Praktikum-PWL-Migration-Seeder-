@extends('layouts.app')
@section('title', 'Tambah Kategori')

@section('content')
<div class="card" style="max-width: 500px;">
    <div class="card-header"><h5 class="mb-0">Tambah Kategori</h5></div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror"
                    value="{{ old('category') }}" placeholder="Masukkan nama kategori">
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection