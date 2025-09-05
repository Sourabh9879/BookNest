<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'description' => 'nullable|string',
            'language'    => 'nullable|string|max:100',
            'category'    => 'required|string|max:255', 
            'stock'       => 'required|integer|min:0',
        ]);

        $book = Book::create($request->all());

        return response()->json([
            'message' => 'Book added successfully',
            'data'    => $book
        ], 201);
    }
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $request->validate([
            'title'       => 'sometimes|required|string|max:255',
            'author'      => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'language'    => 'nullable|string|max:100',
            'category'    => 'sometimes|required|string|max:255',
            'stock'       => 'sometimes|required|integer|min:0',
        ]);

        $book->update($request->all());

        return response()->json([
            'message' => 'Book updated successfully',
            'data'    => $book
        ], 200);
    }
}
