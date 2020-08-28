<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryCollectionResource;
use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;

class APICategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return CategoryCollectionResource::collection($categories);
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
            'name' => "required|unique:categories"
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        $response = [
            'message' => 'Successfully added category',
            'category' => new CategoryResource($category)
        ];
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => "required|unique:categories,name," . $category->id
        ]);

        $category->update([
            'name' => $request->name
        ]);
        $response = [
            'message' => 'Successfully updated category',
            'category' => new CategoryResource($category)
        ];
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        if ($category->books->count() !== 0) {
            $response = [
                'message' => 'Cannot delete category with books.',
                'category' => new CategoryResource($category)
            ];

            return response($response, 403);
        }

        $category->delete();
        return [
            'message' => 'Succesfully deleted category'
        ];
    }
}
