<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Resources\Json\JsonResource;

class BookCollectionResource extends JsonResource
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
            'href' => route('api.books.show', $this->id)
        ];
    }
}
