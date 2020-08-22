<?php

namespace App\Http\Controllers\API;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookCollectionResource;
use App\Http\Resources\Book\BookResource;
use Illuminate\Http\Request;

class APIBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return BookCollectionResource::collection($books);
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
        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
