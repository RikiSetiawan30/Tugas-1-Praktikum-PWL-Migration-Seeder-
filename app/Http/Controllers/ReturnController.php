<?php
namespace App\Http\Controllers;

use App\Models\ReturnModel;
use App\Models\LoanDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReturnsExport;
use Barryvdh\DomPDF\Facade\Pdf;

class ReturnController extends Controller
{

    public function exportExcel()
    {
        return Excel::download(new ReturnsExport, 'returns.xlsx');
    }

    public function exportPdf()
    {
        $returns = ReturnModel::with('loanDetail.book', 'loanDetail.loan.user')->get();
        $pdf = Pdf::loadView('pdf.returns', compact('returns'));
        return $pdf->download('returns.pdf');
    }

    public function index()
    {
        $returns = ReturnModel::with('loanDetail.book', 'loanDetail.loan.user')->latest()->paginate(10);
        return view('returns.index', compact('returns'));
    }

    public function create()
    {
        $loanDetails = LoanDetail::with('book', 'loan.user')
            ->where('is_return', false)->get();
        return view('returns.create', compact('loanDetails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'loan_detail_id' => 'required|exists:loan_detail,id',
            'charge'         => 'required|boolean',
            'amount'         => 'required|integer|min:0',
        ]);

        ReturnModel::create($request->only('loan_detail_id', 'charge', 'amount'));

        LoanDetail::find($request->loan_detail_id)->update(['is_return' => true]);

        return redirect()->route('returns.index')->with('success', 'Pengembalian berhasil dicatat!');
    }

    public function edit(ReturnModel $return)
    {
        $loanDetails = LoanDetail::with('book', 'loan.user')->get();
        return view('returns.edit', compact('return', 'loanDetails'));
    }

    public function update(Request $request, ReturnModel $return)
    {
        $request->validate([
            'charge' => 'required|boolean',
            'amount' => 'required|integer|min:0',
        ]);

        $return->update($request->only('charge', 'amount'));

        return redirect()->route('returns.index')->with('success', 'Pengembalian berhasil diupdate!');
    }

    public function destroy(ReturnModel $return)
    {
        LoanDetail::find($return->loan_detail_id)->update(['is_return' => false]);
        $return->delete();
        return redirect()->route('returns.index')->with('success', 'Data pengembalian dihapus!');
    }
}