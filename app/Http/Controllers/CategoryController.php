<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoriesExport;
use Barryvdh\DomPDF\Facade\Pdf;
class CategoryController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }

    public function exportPdf()
    {
        $categories = Category::all();
        $pdf = Pdf::loadView('pdf.categories', compact('categories'));
        return $pdf->download('categories.pdf');
    }

    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        Category::create($request->only('category'));

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $category->update($request->only('category'));

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}