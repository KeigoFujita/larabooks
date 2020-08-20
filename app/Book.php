<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = ['title', 'no_of_pages', 'category_id'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function is_author($id)
    {
        return in_array($id, $this->authors->pluck('id')->toArray());
    }
}
