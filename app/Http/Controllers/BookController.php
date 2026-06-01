<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Bookshelf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BooksExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\BooksImport;

class BookController extends Controller
{

    public function importExcel(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,xls,csv']);
        Excel::import(new BooksImport, $request->file('file'));
        return redirect()->route('books.index')->with('success', 'Data berhasil diimport!');
    }

    public function exportExcel()
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }

    public function exportPdf()
    {
        $books = Book::with('category', 'bookshelf')->get();
        $pdf = Pdf::loadView('pdf.books', compact('books'));
        return $pdf->download('books.pdf');
    }

    public function index()
    {
        $books = Book::with('category', 'bookshelf')->latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('category')->get();
        $bookshelfs = Bookshelf::orderBy('name')->get();
        return view('books.create', compact('categories', 'bookshelfs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'author'       => 'required|string|max:255',
            'year'         => 'required|digits:4|integer',
            'publisher'    => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'bookshelf_id' => 'required|exists:bookshelfs,id',
            'cover'        => 'nullable|image|max:2048',
        ]);

        $data = $request->except('cover');

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Book::create($data);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('category')->get();
        $bookshelfs = Bookshelf::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories', 'bookshelfs'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'author'       => 'required|string|max:255',
            'year'         => 'required|digits:4|integer',
            'publisher'    => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'bookshelf_id' => 'required|exists:bookshelfs,id',
            'cover'        => 'nullable|image|max:2048',
        ]);

        $data = $request->except('cover');

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}