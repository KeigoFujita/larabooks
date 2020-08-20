<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('book.index')
            ->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $authors    = Author::all();
        return view('book.create')
            ->with('categories', $categories)
            ->with('authors', $authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => "required|unique:books",
            'no_of_pages' => "required|min:1|max:100",
            'category_id' => "required",
            'authors' => "required"
        ]);

        $book = Book::create([
            'title' => $request->title,
            'no_of_pages' => $request->no_of_pages,
            'category_id' => $request->category_id
        ]);
        $book->authors()->attach($request->authors);
        session()->flash('success', 'Book added successfully!');
        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show')
            ->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors    = Author::all();
        return view('book.edit')
            ->with('book', $book)
            ->with('categories', $categories)
            ->with('authors', $authors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => "required|unique:books,title," . $book->id,
            'no_of_pages' => "required|min:1|max:100",
            'category_id' => "required",
            'authors' => "required"
        ]);

        $book->update([
            'title' => $request->title,
            'no_of_pages' => $request->no_of_pages,
            'category_id' => $request->category_id
        ]);
        $book->authors()->sync($request->authors);
        session()->flash('success', 'Book updated successfully!');
        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        session()->flash('success', 'Book deleted successfully!');
        return redirect(route('books.index'));
    }
}
