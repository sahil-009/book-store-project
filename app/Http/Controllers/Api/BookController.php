<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Get all books
    public function index()
    {
        $books = Book::with('author')->get();
        return response()->json($books);
    }

    // Create new book
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->all());
        $book->load('author');
        return response()->json($book, 201);
    }

    // Get single book
    public function show($id)
    {
        $book = Book::with('author')->find($id);
        
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        
        return response()->json($book);
    }

    // Update book
    public function update(UpdateBookRequest $request, $id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        
        $book->update($request->all());
        $book->load('author');
        return response()->json($book);
    }

    // Delete book
    public function destroy($id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
