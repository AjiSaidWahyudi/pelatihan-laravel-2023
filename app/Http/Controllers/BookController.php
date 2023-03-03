<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'author' => 'required|min:3',
            'location' => 'required',
            'year' => 'required|max:4',
            'publisher' => 'required'
        ]);
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'location' => $request->location,
            'year' => $request->year,
            'publisher' => $request->publisher
        ]);
        // dd($book);
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'author' => 'required|min:3',
            'location' => 'required',
            'year' => 'required|max:4',
            'publisher' => 'required'
        ]);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'location' => $request->location,
            'year' => $request->year,
            'publisher' => $request->publisher
        ]);
        // dd($book);
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
