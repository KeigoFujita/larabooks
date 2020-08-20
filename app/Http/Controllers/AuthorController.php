<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();

        return view('author.index')
            ->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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
            'name' => "required|unique:authors"
        ]);

        Author::create([
            'name' => $request->name
        ]);
        session()->flash('success', 'Author created successfully!');
        return redirect(route('authors.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit')
            ->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => "required|unique:authors,name," . $author->id
        ]);

        $author->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'Author updated successfully!');
        return redirect(route('authors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {

        if ($author->books->count() !== 0) {
            session()->flash('danger', 'Cannot remove author with books!');
            return redirect(route('authors.index'));
        }

        $author->delete();
        session()->flash('success', 'Author deleted successfully!');
        return redirect(route('authors.index'));
    }
}
