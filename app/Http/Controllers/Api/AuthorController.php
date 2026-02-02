<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Get all authors
    public function index()
    {
        $authors = Author::withCount('books')->get();
        return response()->json($authors);
    }

    // Create new author
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->all());
        return response()->json($author, 201);
    }

    // Get single author
    public function show($id)
    {
        $author = Author::with('books')->find($id);
        
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        
        return response()->json($author);
    }

    // Update author
    public function update(UpdateAuthorRequest $request, $id)
    {
        $author = Author::find($id);
        
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        
        $author->update($request->all());
        return response()->json($author);
    }

    // Delete author
    public function destroy($id)
    {
        $author = Author::find($id);
        
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        
        $author->delete();
        return response()->json(['message' => 'Author deleted successfully']);
    }
}
