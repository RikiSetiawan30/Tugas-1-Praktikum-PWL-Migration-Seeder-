<?php
namespace App\Http\Controllers;

use App\Models\Bookshelf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookshelfsExport;
use Barryvdh\DomPDF\Facade\Pdf;

class BookshelfController extends Controller
{

    public function exportExcel()
    {
        return Excel::download(new BookshelfsExport, 'bookshelfs.xlsx');
    }

    public function exportPdf()
    {
        $bookshelfs = Bookshelf::all();
        $pdf = Pdf::loadView('pdf.bookshelfs', compact('bookshelfs'));
        return $pdf->download('bookshelfs.pdf');
    }

    public function index()
    {
        $bookshelfs = Bookshelf::latest()->paginate(10);
        return view('bookshelfs.index', compact('bookshelfs'));
    }

    public function create()
    {
        return view('bookshelfs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10|unique:bookshelfs,code',
            'name' => 'required|string|max:255',
        ]);

        Bookshelf::create($request->only('code', 'name'));

        return redirect()->route('bookshelfs.index')
            ->with('success', 'Rak buku berhasil ditambahkan!');
    }

    public function edit(Bookshelf $bookshelf)
    {
        return view('bookshelfs.edit', compact('bookshelf'));
    }

    public function update(Request $request, Bookshelf $bookshelf)
    {
        $request->validate([
            'code' => 'required|string|max:10|unique:bookshelfs,code,' . $bookshelf->id,
            'name' => 'required|string|max:255',
        ]);

        $bookshelf->update($request->only('code', 'name'));

        return redirect()->route('bookshelfs.index')
            ->with('success', 'Rak buku berhasil diupdate!');
    }

    public function destroy(Bookshelf $bookshelf)
    {
        $bookshelf->delete();

        return redirect()->route('bookshelfs.index')
            ->with('success', 'Rak buku berhasil dihapus!');
    }
}