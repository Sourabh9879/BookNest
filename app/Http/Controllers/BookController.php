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
}
