<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET /api/books
    public function index()
    {
        return response()->json([
            'message' => 'Daftar buku',
            'data' => Book::all()
        ], 200);
    }

    // POST /api/books
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|integer',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $book
        ], 201);
    }

    // GET /api/books/{id}
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return response()->json([
            'message' => 'Detail data buku',
            'data' => $book
        ], 200);
    }

    // PUT /api/books/{id}
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->update($request->all());

        return response()->json([
            'message' => 'Data buku berhasil diupdate',
            'data' => $book
        ], 200);
    }

    // DELETE /api/books/{id}
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}
