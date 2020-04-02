<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function authors(){
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_genres');
    }
}
