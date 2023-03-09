<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Stock;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();
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
            'publisher' => 'required',
            'cover' => 'required|mimes:jpg'
        ]);
        $file = $request->file('cover');
        $namafile = $file->getClientOriginalName();
        $tujuan_upload = 'cover';
        $file->move($tujuan_upload, $namafile);
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'location' => $request->location,
            'year' => $request->year,
            'publisher' => $request->publisher,
            'cover' => $namafile
        ]);
        // dd($book);
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }

    public function addStock(Request $request, $id)
    {
        $validated = $request->validate([
            'no_code' => 'required|unique:stock,no_code',
            'arrived' => 'required|date'
        ]);
        $book = Book::find($id);
        $stock = new Stock;
        $stock->book_id = $book->id;
        $stock->no_code = $request->no_code;
        $stock->arrived = $request->arrived;
        $stock->save();
        return redirect()->route('book.show', $book);
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
        if ($request->file('cover')) {
            $validated = $request->validate([
                'cover' => 'required|mimes:jpg'
            ]);
            $file = $request->file('cover');
            $namafile = $file->getClientOriginalName();
            $tujuan_upload = 'cover';
            \File::delete('cover/'.$book->cover);
            $file->move($tujuan_upload, $namafile);
            $book->update([
                'cover' => $namafile
            ]);
        }
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
        \File::delete('cover/'.$book->cover);
        $book->delete();
        return redirect()->route('book.index');
    }
}
