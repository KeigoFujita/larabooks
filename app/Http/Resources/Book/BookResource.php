<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->title,
            'no_of_pages' => $this->no_of_pages,
            'created_at' => $this->created_at->format('M d, Y'),
            'category' => $this->category->name,
            'authors' => AuthorResource::collection($this->authors)
        ];
    }
}
