<?php

namespace App\Http\Resources\Author;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorCollectionResource extends JsonResource
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
            'name' => $this->name,
            'no_of_books' => $this->books->count(),
            'created_at' => $this->created_at->format('M d, Y'),
            'href' => route('api.authors.show', $this->id)
        ];
    }
}
