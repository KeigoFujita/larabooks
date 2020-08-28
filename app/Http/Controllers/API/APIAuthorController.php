<?php

namespace App\Http\Controllers\API;

use App\Author;
use App\Http\Controllers\Controller;
use App\Http\Resources\Author\AuthorCollectionResource;
use App\Http\Resources\Author\AuthorResource;
use Illuminate\Http\Request;

class APIAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return AuthorCollectionResource::collection($authors);
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

        $author = Author::create([
            'name' => $request->name
        ]);

        $response = [
            'message' => 'Author created successfully',
            'author' => new AuthorResource($author)
        ];
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
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
        $response = [
            'message' => 'Author updated successfully',
            'author' => new AuthorResource($author)
        ];
        return $response;
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
            $response = [
                'message' => 'Cannot delete author with books',
                'author' => new AuthorResource($author)
            ];

            return response($response, 403);
        }

        $author->delete();

        $response = [
            'message' => 'Author deleted successfully',
        ];
        return $response;
    }
}
