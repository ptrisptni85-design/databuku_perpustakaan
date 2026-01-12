<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
             'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'status' => 'required|string'
        ]);

        $loan = Loan::create([
           'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => $request->loan_date,
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Buku berhasil dipinjam',
            'data' => $loan
        ], 201);
    }

    public function returnBook($id)
    {
        $loan = Loan::findOrFail($id);

        $loan->update([
            'return_date' => now(),
            'status' => 'dikembalikan'
        ]);

        return response()->json([
            'message' => 'Buku berhasil dikembalikan',
            'data' => $loan
        ]);
    }
}
