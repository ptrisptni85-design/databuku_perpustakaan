<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET /api/books
    public function index()
    {
        $books = Book::all();
        return response()->json([
            'success' => true,
            'data' => $books
        ]);
    }

    // POST /api/books
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|integer',
        ]);

        $book = Book::create($request->all());

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $book
        ], 201);
    }

    // GET /api/books/{id}
    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }

    // PUT /api/books/{id}
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'judul' => 'sometimes|required',
            'penulis' => 'sometimes|required',
            'tahun' => 'sometimes|required|integer',
        ]);

        $book->update($request->all());

        return response()->json([
            'message' => 'Data buku berhasil diupdate',
            'data' => $book
        ]);
    }

    // DELETE /api/books/{id}
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
