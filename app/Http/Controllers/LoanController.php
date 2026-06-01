<?php
namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanDetail;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LoansExport;
use Barryvdh\DomPDF\Facade\Pdf;

class LoanController extends Controller
{

    public function exportExcel()
    {
        return Excel::download(new LoansExport, 'loans.xlsx');
    }

    public function exportPdf()
    {
        $loans = Loan::with('user', 'loanDetails.book')->get();
        $pdf = Pdf::loadView('pdf.loans', compact('loans'));
        return $pdf->download('loans.pdf');
    }

    public function index()
    {
        $loans = Loan::with('user', 'loanDetails.book')->latest()->paginate(10);
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $users = User::orderBy('first_name')->get();
        $books = Book::orderBy('title')->get();
        return view('loans.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_npm'  => 'required|exists:users,npm',
            'loan_at'   => 'required|date',
            'return_at' => 'required|date|after:loan_at',
            'book_ids'  => 'required|array|min:1',
            'book_ids.*'=> 'exists:books,id',
        ]);

        $loan = Loan::create($request->only('user_npm', 'loan_at', 'return_at'));

        foreach ($request->book_ids as $book_id) {
            LoanDetail::create([
                'loan_id' => $loan->id,
                'book_id' => $book_id,
                'is_return' => false,
            ]);
        }

        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit(Loan $loan)
    {
        $users = User::orderBy('first_name')->get();
        $books = Book::orderBy('title')->get();
        $selectedBooks = $loan->loanDetails->pluck('book_id')->toArray();
        return view('loans.edit', compact('loan', 'users', 'books', 'selectedBooks'));
    }

    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'user_npm'  => 'required|exists:users,npm',
            'loan_at'   => 'required|date',
            'return_at' => 'required|date|after:loan_at',
            'book_ids'  => 'required|array|min:1',
            'book_ids.*'=> 'exists:books,id',
        ]);

        $loan->update($request->only('user_npm', 'loan_at', 'return_at'));

        $loan->loanDetails()->delete();
        foreach ($request->book_ids as $book_id) {
            LoanDetail::create([
                'loan_id' => $loan->id,
                'book_id' => $book_id,
                'is_return' => false,
            ]);
        }

        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil diupdate!');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
}