<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET /api/books
    public function index()
    {
        return Book::all();
    }

    // POST /api/books
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|integer',
        ]);

        return Book::create($request->all());
    }

    // GET /api/books/{id}
    public function show($id)
    {
        return Book::findOrFail($id);
    }

    // PUT /api/books/{id}
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->update($request->all());

        return $book;
    }

    // DELETE /api/books/{id}
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $book
        ], 201);

        return response()->json([
        'message' => 'Detail data buku',
        'data' => $book
        ], 200);

        return response()->json([
        'message' => 'Data buku berhasil diupdate',
        'data' => $book
        ], 200);
    }
}
