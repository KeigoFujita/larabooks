<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
