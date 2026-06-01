@extends('layouts.app')
@section('title', 'Buku')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold">Daftar Buku</h1>
    <div class="flex gap-2">
        <a href="{{ route('books.export-pdf') }}" class="px-4 py-2 bg-gray-600 text-white text-sm rounded-md hover:bg-gray-500">Export PDF</a>
        <a href="{{ route('books.export-excel') }}" class="px-4 py-2 bg-gray-600 text-white text-sm rounded-md hover:bg-gray-500">Export Excel</a>
        <a href="{{ route('books.create') }}" class="px-4 py-2 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">Tambah</a>
    </div>
</div>

<div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="min-w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="px-4 py-3 text-left text-gray-600 font-medium">#</th>
                <th class="px-4 py-3 text-left text-gray-600 font-medium">Judul</th>
                <th class="px-4 py-3 text-left text-gray-600 font-medium">Penulis</th>
                <th class="px-4 py-3 text-left text-gray-600 font-medium">Tahun</th>
                <th class="px-4 py-3 text-left text-gray-600 font-medium">Kategori</th>
                <th class="px-4 py-3 text-left text-gray-600 font-medium">Rak</th>
                <th class="px-4 py-3 text-left text-gray-600 font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($books as $i => $book)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-500">{{ $books->firstItem() + $i }}</td>
                <td class="px-4 py-3 font-medium">{{ $book->title }}</td>
                <td class="px-4 py-3">{{ $book->author }}</td>
                <td class="px-4 py-3">{{ $book->year }}</td>
                <td class="px-4 py-3">{{ $book->category->category ?? '-' }}</td>
                <td class="px-4 py-3">{{ $book->bookshelf->name ?? '-' }}</td>
                <td class="px-4 py-3 flex gap-2">
                    <a href="{{ route('books.edit', $book) }}"
                       class="px-3 py-1 text-xs border border-gray-300 rounded hover:bg-gray-100">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1 text-xs border border-red-300 text-red-600 rounded hover:bg-red-50 btn-delete">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-4 py-6 text-center text-gray-400">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $books->links() }}</div>

@push('scripts')
<script>
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');
            Swal.fire({
                title: 'Yakin hapus?',
                text: 'Data tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1f2937',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
</script>
@endpush
@endsection